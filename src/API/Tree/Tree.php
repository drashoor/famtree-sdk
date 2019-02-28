<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/18/2019
 * Time: 12:27 PM
 */

namespace FamtreeV3\API\Tree;

use FamtreeV3\API\Client;

class Tree extends Client
{
    public function extendedTree($member = '')
    {
        return self::get("api/user/family/tree/$member");
    }

    public function adminExtendedTree($member)
    {
        return self::get("api/admin/family-requests/tree/$member");
    }
}
