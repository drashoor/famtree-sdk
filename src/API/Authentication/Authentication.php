<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/18/2019
 * Time: 2:22 PM
 */

namespace FamtreeV3\API\Authentication;

use FamtreeV3\API\Client;

class Authentication extends Client
{
    public function login($username, $password)
    {
        return self::post('api/user/sign-in/web', [
            'client_id' => config("famtree.client_id"),
            'client_secret' => config("famtree.client_secret"),
            'username' => $username,
            'password' => $password
        ]);
    }

    public function logout()
    {
        return self::get('api/user/logout');
    }
}
