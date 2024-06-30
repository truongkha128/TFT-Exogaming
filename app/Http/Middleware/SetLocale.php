<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (! $request->session()->has('locale')) {
            $request->session()->put('locale', config('voyager.multilingual.default'));
        }
        app('view')->composer('*', function ($view) {
            $pageGroup = 1;
            if (app('request')->route()) {
                $action = app('request')->route()->getAction();
                $controller = class_basename($action['controller']);
                $arrPageGroupByController = [
                        '1' => [
                            'HomepageController'
                        ],
                        '2' => [
                            'HomepageController@tierList',
                        ],
                        '3' => [
                            'HomepageController@guides',
                            'HomepageController@comps'
                        ],
                        '4' => [
                            'HomepageController@learn',
                            'HomepageController@encounters',
                            'HomepageController@items',
                            'HomepageController@champions',
                            'HomepageController@augments',
                            'HomepageController@newPlayer',
                            'HomepageController@traits',
                            'HomepageController@returnPlayer',
                        ],
                        
                ];
                foreach ($arrPageGroupByController as $key => $item) {
                    if (in_array($controller, $item)) {
                        $pageGroup = $key;
                    }
                }
                list($controller, $action) = explode('@', $controller);
                
                $view->with(compact('controller', 'action', 'pageGroup'));
            } else {
                $view->with(compact('pageGroup'));
            }
        });
        return $next($request);
    }
}
