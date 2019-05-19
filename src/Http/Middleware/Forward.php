<?php

namespace FamtreeV3\Http\Middleware;

use Closure;
use FamtreeV3\Classes\ErrorParser;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

class Forward
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $prefix = false)
    {
        $class = (Route::current()->getController());
        $method = Route::current()->getActionMethod();
        if (method_exists($class, 'before' . ucfirst($method))) {
            $before = Closure::fromCallable([$class, 'before' . ucfirst($method)]);
            $request = $before($request);
        }

        $client = new Client(['base_uri' => config('famtree.app_url')]);

        try {
            $header = ($request->header());
            $prefix = $prefix === false ? '' : ($prefix ? config("famtree.user_prefix") : config("famtree.user_prefix"));

            unset($header['content-type']);
            $result = $client->__call($request->method(), [
                $prefix . '/' . implode('/', $request->segments()), [
                    'form_params' => $request->post(),
                    'query' => $request->query(),
                    'headers' => array_merge($header, \FamtreeV3\API\Client::getHeaders())
                ]
            ]);
        } catch (\Exception $exception) {
            $error = new ErrorParser($exception);
            return $error->handle();
        }

        $request = $request->merge(['response' => json_decode((string)$result->getBody(), true)]);

        return $next($request);
    }
}