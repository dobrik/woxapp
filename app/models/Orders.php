<?php

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
use Models\Users;

class Orders extends Model
{

    public $id, $user_lat, $user_lon, $car_id, $country, $status_id, $region, $driver_id, $start_time;

    public function initialize()
    {
        $this->setSource('orders');

        $this->hasMany(
            'id',
            'Models\OrderRoutes',
            'order_id',
            [
                'alias' => 'OrderRoutes'
            ]
        );
    }

    public function createOrder($data, Users $user, Users $driver)
    {
        $order_data = [
            'user_id' => $data->passanger_id,
            'user_lat' => $data->user_location[0],
            'user_lon' => $data->user_location[1],
            'car_id' => $data->car_id,
            'driver_id' => $data->driver_id,
            'country_id' => $data->country_id,
            'pass_phone' => $data->pass_phone,
            'region_id' => $data->region_id,
            'start_time' => $data->start_time,
            'pass_count' => $data->pass_count,
            'comment' => $data->comment,
        ];

        $result = $this->create($order_data);

        if ($result === false) {
            return false;
        } else {
            foreach ($data->route_points as $key => $route_point) {
                $OrderRoutes = new OrderRoutes();
                $route_point->order_id = $this->id;
                $result = $OrderRoutes->create((array)$route_point);
                if ($result === false) {
                    return false;
                }
            }
        }
        return true;
    }
}
