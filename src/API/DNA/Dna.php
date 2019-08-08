<?php
/**
 * Created by PhpStorm.
 * User: Digital 2
 * Date: 2/18/2019
 * Time: 12:27 PM
 */

namespace FamtreeV3\API\DNA;

use FamtreeV3\API\Client;

class Dna extends Client
{
    public function changeStatus(int $orderId, $data)
    {
        return self::patch("api/admin/dna-requests/$orderId", $data);
    }

    public function returnShipment(int $orderId, $data)
    {
        return self::patch("api/admin/dna-requests/$orderId/return-shipment", $data);
    }

    public function cancel(int $orderId, $data)
    {
        return self::patch("api/admin/dna-requests/$orderId/cancel", $data);
    }
}
