<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/19/2019
 * Time: 9:38 AM
 */

namespace FamtreeV3\API;

use FamtreeV3\API\Authentication\Authentication;
use FamtreeV3\API\Country\Country;
use FamtreeV3\API\FamilyRequest\FamilyRequest;
use FamtreeV3\API\Tree\Member;
use FamtreeV3\API\Tree\Tree;

class Famtree
{
    public function authentication()
    {
        return new Authentication();
    }

    public function familyRequests()
    {
        return new FamilyRequest();
    }

    public function tree()
    {
        return new Tree();
    }

    public function member()
    {
        return new Member();
    }

    public function country()
    {
        return new Country();
    }
}
