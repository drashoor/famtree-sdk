<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/18/2019
 * Time: 12:27 PM
 */

namespace FamtreeV3\API\Country;

use FamtreeV3\API\Client;

class Country extends Client
{
    public function countries()
    {
        return self::get('api/user/countries');
    }
}
