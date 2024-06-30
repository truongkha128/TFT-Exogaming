<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\ResponseCache\CacheProfiles\BaseCacheProfile;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;

class CacheProfile extends BaseCacheProfile
{
    public function shouldCacheRequest(Request $request): bool
    {
        if ($request->ajax()) {
            return false;
        }

        if ($this->isRunningInConsole()) {
            return false;
        }

        return $request->isMethod('get');
    }

    public function shouldCacheResponse(Response $response): bool
    {
        if (! $this->hasCacheableResponseCode($response)) {
            return false;
        }

        if (! $this->hasCacheableContentType($response)) {
            return false;
        }

        return true;
    }

    public function hasCacheableResponseCode(Response $response): bool
    {
        if ($response->isSuccessful()) {
            return true;
        }

        if ($response->isRedirection()) {
            return true;
        }

        return false;
    }

    public function hasCacheableContentType(Response $response): bool
    {
        $contentType = $response->headers->get('Content-Type', '');

        if (Str::startsWith($contentType, 'text')) {
            return true;
        }

        if (Str::contains($contentType, 'application/json')) {
            return true;
        }

        return false;
    }

    public function useCacheNameSuffix(Request $request): string
    {
        $agent = new Agent();
        if ($agent->isMobile()) {
            $string = 'mobile';
        }
        else {
            $string = 'desktop';
        }

        $lang = session('locale', 'vi');
        $string = $string . '-'. $lang;

        if (Auth::check()) {
            return Auth::id() . '_'. $string;
        }

        return $string;
    }

}
