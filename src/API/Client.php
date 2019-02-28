<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/18/2019
 * Time: 12:12 PM
 */

namespace FamtreeV3\API;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\UnauthorizedException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    public static function post($route, $parameters = [])
    {
        return self::send("post", $route, $parameters);
    }

    public static function get($route, $parameters = [])
    {
        return self::send("get", $route, $parameters);
    }

    public static function patch($route, $parameters = [])
    {
        return self::send("patch", $route, $parameters);
    }

    private static function send($func, $route, $parameters = [])
    {
        try {
            $data["form_params"] = $parameters;
            $data["headers"] = self::getHeaders();
            return self::getResult((new \GuzzleHttp\Client())->$func(config("famtree.app_url") . "/" . $route, $data));
        } catch (ClientException  $exception) {
            if ($exception->getCode() == 403) {
                //may be due to client id,secret
                //or user is not a family admin
                throw new UnauthorizedException("unauthorized to access famtree api");
            }

            throw $exception;
        }
    }

    private static function getHeaders()
    {
        return [
            "Authorization" => Session::get("oauth.token_type") . " " . Session::get("oauth.access_token"),
            "Accept" => "application/json",
            "App-Version" => "web",
            "Agent" => "web"
        ];
    }

    private static function getResult(ResponseInterface $response)
    {
        return json_decode((string)$response->getBody(), true);
    }
}
