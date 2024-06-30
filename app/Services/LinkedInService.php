<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use DB;
use Illuminate\Support\Facades\Config;
use App\Repositories\Contracts\NewsRepository;
use Illuminate\Support\Facades\Storage;

class LinkedInService
{
    protected $linkedin_client_id;
    protected $linkedin_secret;
    protected $linkedin_callback;
    protected $linkedin_scopes;
    protected $linkedin_company_id;
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->linkedin_client_id = config('linkedin.apps.client_id');
        $this->linkedin_secret = config('linkedin.apps.secret');
        $this->linkedin_callback = config('linkedin.apps.callback');
        $this->linkedin_scopes = config('linkedin.apps.scopes');
        $this->linkedin_company_id = config('linkedin.apps.company_id');
        $this->newsRepository = $newsRepository;
    }

    public function getAuthorizationUrl()
    {
        // Build the LinkedIn authorization URL
        $url = "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$this->linkedin_client_id}&redirect_uri={$this->linkedin_callback}&scope={$this->linkedin_scopes}";
        
        return $url;
    }

    public function handleLinkedInCallback($user, $request)
    {
        $linkedinPostData = $request->session()->pull('linkedin_post_data');
        $action = $linkedinPostData['post_action'];
        $code = $request['code'];

        if ($code) {
            
            $tokenData = $this->exchangeCodeForAccessToken($code);
            $accessToken = $tokenData['access_token'];

            //save refresh token
            $user->linkedin_refresh_token = $tokenData['refresh_token'];
            $user->save();

            if ($action == "store") {
                return $this->post($accessToken, $linkedinPostData);
            } 

            if ($action == "update") {
                $linkedinDelete = $this->delete($accessToken, $linkedinPostData['linkedin_post_id']);
                if ($linkedinDelete) {
                    $this->post($accessToken, $linkedinPostData);
                }
            }
        }
    }

    private function exchangeCodeForAccessToken($authorizationCode)
    {
        $client = new Client();

        $response = $client->post('https://www.linkedin.com/oauth/v2/accessToken', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $authorizationCode,
                'redirect_uri' => $this->linkedin_callback, // Update this line
                'client_id' => $this->linkedin_client_id,
                'client_secret' => $this->linkedin_secret,
            ],
        ]);
        return json_decode($response->getBody(), true);
    }

    public function post($accessToken, $linkedinPostData)
    {
        try {
            $url = 'https://api.linkedin.com/v2/ugcPosts';
            $text = $linkedinPostData['post_title'] ."\n". $linkedinPostData['post_description'];
            $slug = $linkedinPostData['post_slug'];
            $id = $linkedinPostData['post_id'];
            $thumbnails = $linkedinPostData['post_thumbnails'];
            $thumbnailsUrl = '';

            if ($slug == "news") {
                $data = $this->newsRepository->where('id', $id)->with('websites')->first();
                $link = $data->websites ? $data->websites[0]->draft_news_url.$id."&lang=".$linkedinPostData['post_language'] : "";
            }
                
            if ($thumbnails) {
                $thumbnailsUrl = Storage::disk(config('voyager.storage.disk'))->url($thumbnails) ? : '';
            }
            $postData = [
                'author' => "urn:li:organization:".$this->linkedin_company_id,
                'lifecycleState' => 'PUBLISHED',
                'specificContent' => [
                    'com.linkedin.ugc.ShareContent' => [
                        'shareCommentary' => [
                            'text' => $text,
                        ],
                        'shareMediaCategory' => 'ARTICLE',
                        'media' => [
                            [
                                'status' => 'READY',
                                'originalUrl' => $link,
                                "title" => [
                                    "attributes" => [],
                                    "text" => $link,
                                ],
                                'thumbnails' => $thumbnailsUrl ?[
                                    [
                                        "url" => $thumbnailsUrl
                                    ]
                                ] : [],
                                
                            ],
                        ],
                    ],
                ],
                'visibility' => [
                    'com.linkedin.ugc.MemberNetworkVisibility' => 'PUBLIC',
                ],
            ];

            $client = new Client();

            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'Content-Type' => 'application/json',
                    "X-Restli-Protocol-Version" => "2.0.0",
                ],
                'json' => $postData,
            ]);
            $body = json_decode($response->getBody(), true);
            $headers = $response->getHeaders();
            $statusCode = $response->getStatusCode();
            if ($statusCode == 201) {
                if (isset($body['id']) || isset($headers['x-restli-id'][0])) {
                    $linkedin_post_id = $body ? $body['id'] : $headers['x-restli-id'][0];
                    DB::table($slug)->where('id', $id)->update(['linkedin_post_id' => $linkedin_post_id]);
                    return redirect()->route("voyager.{$slug}.index")->with([
                        'message'    => __('voyager::generic.successfully_added_new'),
                        'alert-type' => 'success',
                    ]);;
                }    
            }
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
        
    }

    public function getLinkedInInfo($accessToken)
    {
        $url = 'https://api.linkedin.com/v2/userinfo';

        $client = new Client();

        $response = $client->get($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
        ]);

        $body = json_decode($response->getBody(), true);
        if (isset($body['sub'])) 
            return $body['sub'];
    }
    
    public function refreshToken($user)
    {
        $refreshToken = $user->linkedin_refresh_token;

        if ($refreshToken) {
            try {
                $client = new Client();
                $response = $client->post('https://www.linkedin.com/oauth/v2/accessToken', [
                    'form_params' => [
                        'grant_type' => 'refresh_token',
                        'client_id' => $this->linkedin_client_id,
                        'client_secret' => $this->linkedin_secret,
                        'refresh_token' => $refreshToken,
                    ],
                ]);
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    $body = $response->getBody()->getContents();
                    $data = json_decode($body, true);
                    $newAccessToken = $data['access_token'];
                    $newRefreshToken = $data['refresh_token'];
                    
                    //save refresh token
                    $user->linkedin_refresh_token = $newRefreshToken;
                    $user->save();

                    return $newAccessToken;
                } else {
                    return false;
                }
            } catch (\Exception $e) {
                logger($e->getMessage());
                return false;
            }
        }
        else {
            return false;
        }
    }

    // public function edit($accessToken, $linkedinPostData)
    // {
        // $url = 'https://api.linkedin.com/v2/posts/urn:li:share:7150792467460550656/';
        // $text = $linkedinPostData['post_description'] ."\n". $linkedinPostData['post_content'];
        // $slug = $linkedinPostData['post_slug'];
        // $id = $linkedinPostData['post_id'];

        // if ($slug == "news") {
        //     $data = $this->newsRepository->where('id', $id)->with('websites')->first();
        //     if ($data) {
        //         $linkedin_post_id = $data->linkedin_post_id;
                // if ($linkedin_post_id) {
                //     if (preg_match('/(\d+)$/', $linkedin_post_id, $matches)) {
                //         $linkedin_post_id = $matches[0];
                //     } else {
                //         //can't get id
                //         return redirect()->route("voyager.{$slug}.index");
                //     }
                // }
    //             $url = $url.$linkedin_post_id;
    //         }
           
    //     }
       
    //     $postData = [
    //         'patch' => [
    //             '$set' => [
    //                 'commentary' => 'Update to the post',
    //                 'contentCallToActionLabel' => 'LEARN_MORE',
    //             ],
    //         ],
    //     ];

    //     $client = new Client();

    //     $response = $client->post($url, [
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . $accessToken,
    //             'Content-Type' => 'application/json',
    //             'X-RestLi-Method' => 'PARTIAL_UPDATE',
    //             'X-Restli-Protocol-Version' => '2.0.0',
    //         ],
    //         'json' => $postData,
    //     ]);
    //     $body = json_decode($response->getBody(), true);
    //     $responseBody = $response->getBody()->getContents();

    //     dd($responseBody);
    //     $statusCode = $response->getStatusCode();
    //     if ($statusCode == 201) {
    //         if (isset($body['id'])) {
    //             DB::table($slug)->where('id', $id)->update(['linkedin_post_id' => $body['id']]);
    //             return redirect()->route("voyager.{$slug}.index")->with([
    //                 'message'    => __('voyager::generic.successfully_added_new'),
    //                 'alert-type' => 'success',
    //             ]);;
    //         }    
    //     }
    // }

    public function delete($accessToken, $linkedin_post_id)
    {   
        try {
            $client = new Client();
            $response = $client->delete('https://api.linkedin.com/v2/ugcPosts/' . urlencode($linkedin_post_id), [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    "X-Restli-Protocol-Version" => "2.0.0",            
                ],
            ]);
    
            // Check the response status and handle accordingly
            $statusCode = $response->getStatusCode();
            if ($statusCode === 204) {
                return true;
                // Post successfully deleted
            } else {
                return false;
                // Handle other status codes
            }
        } catch (\Exception $e) {
            logger($e->getMessage());
            return false;
        }
      
    }
}
