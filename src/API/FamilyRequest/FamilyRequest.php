<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/18/2019
 * Time: 12:27 PM
 */

namespace FamtreeV3\API\FamilyRequest;

use FamtreeV3\API\Client;

class FamilyRequest extends Client
{
    public function requests()
    {
        return self::get('api/user/family/applicants');
    }

    public function suggestions()
    {
        return self::get('api/user/family/related-suggestions');
    }

    public function ignore(int $member)
    {
        return self::patch("api/user/family/applicants/$member/ignore");
    }

    public function accept(int $member, array $data)
    {
        return self::patch("api/user/family/applicants/$member/accept", $data);
    }
}
