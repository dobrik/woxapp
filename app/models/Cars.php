<?php

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Models\Users;

class Cars extends Model
{

    public $id, $status_id, $driver_id, $color, $direction,
        $reg_number, $year, $brand, $model, $currency,
        $planting_costs, $car_photo, $costs_per_1, $car_lat, $car_lon;

    public function initialize()
    {
        $this->setSource('cars');

        $this->belongsTo(
            'driver_id',
            'Models\Users',
            'id',
            [
                'alias' => 'CarDriver'
            ]
        );
    }

}
