<?php

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Models\Users;

class OrderFactRoutes extends Model
{

    public function initialize()
    {
        $this->setSource('order_routes_fact');
    }
}
