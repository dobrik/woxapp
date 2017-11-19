<?php

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;

class Routes extends Model
{

    public $id, $order_id, $lat, $lon;

    public function initialize()
    {
        $this->setSource('routes');
    }
    
}
