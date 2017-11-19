<?php

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;

class Orders extends Model
{

    public $id, $cur_lat, $cur_lon, $car_id, $country, $region, $route_id, $driver_id, $created_at;

    public function initialize()
    {
        $this->setSource('orders');
    }

    public function createOrder($data)
    {

    }
}
