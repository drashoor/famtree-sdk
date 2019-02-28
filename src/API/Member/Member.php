<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/18/2019
 * Time: 12:27 PM
 */

namespace FamtreeV3\API\Tree;

use FamtreeV3\API\Client;

class Member extends Client
{
    public function find($member = '', $simple = true)
    {
        return self::get("api/user/member/$member?simple=$simple");
    }

    public function addOptions(int $member)
    {
        return self::get("api/user/relations/available/$member");
    }
}
