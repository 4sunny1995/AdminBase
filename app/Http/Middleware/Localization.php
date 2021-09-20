<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Cookie;
use Session;

use Illuminate\Support\Facades\Log;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
    */
    /*
      public function handle($request, Closure $next)
      {

          if (session()->has('locale')) {
              App::setLocale(session()->get('locale'));
          }
          return $next($request);
      }
    */

    public function handle($request, Closure $next)
    {


        if(Session::has('locale'))
        {
            App::setlocale(Session::get('locale'));
        }

        // Get cookie locale
        $aLocalization = json_decode(Cookie::get('service_locale'),true);

        //$locale = trim(strtolower($request->input('locale')));
        $locale = isset($aLocalization['locale']) ? $aLocalization['locale'] : '';

        if($locale != '')
        {
            $this->setLocale($locale,true);
        }
        else
        {
            if($aLocalization == null)
            {

                $this->setLocale(\Config::get('app.locale'),false);
            }
            else
            {
                if(isset($aLocalization['locale']))
                {
                    Log::info("==== 3 ==");
                    if (in_array($aLocalization['locale'], ['en', 'es', 'ja','vi', 'ko','id', 'th'])) {
                        app()->setLocale($aLocalization['locale']);
                    }
                    else
                    {
                        $this->setLocale(\Config::get('app.locale'),true);
                    }
                }
            }
        }


        return $next($request);

    }

    function setLocale($locale,$bSwitch){

        $language = "English";
        switch ($locale) {
            case 'en':  $language="English"; break;
            case 'es':  $language="Español"; break;
            case 'ja':  $language="日本語" ; break;
            case 'vi':  $language="Tiếng việt"; break;
            case 'ko':  $language="한국어" ; break;
            case 'id':  $language="Bahasa Indonesia"; break;
            case 'th':  $language="ภาษาไทย" ; break;

            default: break;
        }


        if($bSwitch)
        {

            if (! in_array($locale, ['en', 'es', 'ja','vi', 'ko','id', 'th'])) {
                $locale = 'en';
            }

        }

        $aLocalization = [
            'locale' => $locale,
            'language' => $language,
            'default' => \Config::get('app.locale')
        ];


         //   Set cookie not be encrypted
         //   'name', 'value', $minutes, $path, $domain, $secure = false, $httpOnly = false
         //   $secure = false and $httpOnly = false to javascript client can get value

        Cookie::queue("service_locale", json_encode($aLocalization), \Config::get('app.cookie_expired'),'/','',false,false);
        // app()->setLocale($locale);
        App::setLocale($locale);
    }

}
