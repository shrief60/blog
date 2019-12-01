<?php

use Jenssegers\Agent\Agent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('api')) {
    function api($array = [], $status = 200)
    {
        return response()->json($array, $status);
    }
}

if (!function_exists('css')) {
    function css($path)
    {
        $path ='/' . $path;

        if (isIE() && file_exists(public_path("/css/$path-ie.css"))) {
            return '<link rel="stylesheet" href="' . asset("/css/$path-ie.css") . '">';
        }
        return '<link rel="stylesheet" href="' . asset("/css/$path.css") . '">';
    }
}

if (!function_exists('js')) {
    function js($path)
    {
        return "<script src=" . asset("/js/$path.js") . "></script>";
    }
}



if (!function_exists('locale')) {
    function locale()
    {
        return app()->getLocale();
    }
}

if (!function_exists('direction')) {
    function direction()
    {
        return locale() == 'ar' ? 'left' : 'right';
    }
}



if (!function_exists('currentUser')) {
    function currentUser()
    {
        if (!is_null(request()->user())) {
            return request()->user();
        }

        $guards = array_keys(config('auth.guards'));

        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                return auth()->guard($guard)->user();
            }
        }
    }
}







if (!function_exists('isIE')) {
    function isIE()
    {
        $agent = new Agent();
        return $agent->isIe();
    }
}


if (!function_exists('smart_response')) {

    /**
     * Return JSON if the request is coming from API
     * If the request is comming using HTTP request, i.e. web, it will return the view (blade)
     *
     * @param Array $data array containing the data to be passed to view or api
     * @param String $view Blade File Name relative to resources/views
     * @param Number $statusCode HTTP Status Code (100:500)
     * @return Response
     **/
    function smart_response($view = null, $data = [], $statusCode = 200)
    {
        $isAjax = request()->ajax();
        $isValidView = !is_null($view) && view()->exists($view);

        if ($isAjax) {
            // API Calls
            return api($data, $statusCode);
        } elseif ($isValidView) {
            // Returning Views
            return view($view, $data);
        } else {
            // Redirects
            return redirect()->back();
        }
    }
}


if (!function_exists('paginate')) {
    function paginate($data = [], $itemsPerPage = 15)
    {
        $data = $data instanceof Collection ? $data->toArray() : (array) $data;

        $page = (isset(request()->page) && !is_null(request()->page)) ? intval(request()->page) : 1;

        $perPage = $itemsPerPage;

        $offset = ($page * $perPage) - $perPage;

        $entries =  new LengthAwarePaginator(
            array_slice($data, $offset, $perPage, true),
            count($data),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return $entries;
    }
}



if (!function_exists('isExternalLink')) {
    function isExternalLink($url)
    {
        return preg_match("%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu", $url);
    }
}