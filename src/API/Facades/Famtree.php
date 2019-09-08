<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/28/2019
 * Time: 12:58 PM
 */

namespace FamtreeV3\API\Facades;

use Illuminate\Support\Facades\Facade;

class Famtree extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \FamtreeV3\API\Famtree::class;
    }

}