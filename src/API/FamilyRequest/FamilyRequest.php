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

    public function adminAccept(int $verifyFamily, $data)
    {
        return self::patch("api/admin/family-requests/accept/$verifyFamily", $data);
    }

    public function adminReject(int $verifyFamily)
    {
        return self::patch("api/admin/family-requests/reject/$verifyFamily");
    }

    public function adminRedirect(int $verifyFamily, $data)
    {
        return self::patch("api/admin/family-requests/redirect/$verifyFamily", $data);
    }

    public function adminSuggestions(int $verifyFamily)
    {
        return self::get("api/admin/family-requests/suggestions/$verifyFamily");
    }

    public function adminChange(int $verifyFamily, $data)
    {
        return self::patch("api/admin/family-requests/change/$verifyFamily", $data);
    }
}
