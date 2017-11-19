<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use Models\Users;
use Models\Cars;
use Validation\GetMapValidation;

class MapController extends Controller
{
    public function showAll()
    {
        $data = $this->request->getQuery();
        $validation = new GetMapValidation();
        //проверяем все ли данные пришли
        $messages = $validation->validate($data);
        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]); //отдаем первую ошибку
            return $this->response;
        }

        $user = Users::findFirstByToken($data['access_token']);
        if ($user === false) {
            $this->response->setJsonContent(['Error' => 'Invalid access token: ' . $data['access_token']]);
            return $this->response;
        }

        $cars = Cars::find();

        $cars_array = [];
        foreach ($cars as $car) {
            $cars_array[] = [
                'id' => $car->id,
                'driver_id' => $car->driver_id,
                'status' => $car->status_id,
                'color' => $car->color,
                'direction' => $car->direction,
                'yer' => $car->year,
                'brand' => $car->brand,
                'model' => $car->model,
                'currency' => $car->currency,
                'planting_costs' => $car->planting_costs,
                'driver_phone' => $car->getCarDriver()->phone,
                'car_photo' => $car->car_photo,
                'costs_per_1' => $car->costs_per_1,
                'location' => [
                    'lat' => $car->car_lat,
                    'lan' => $car->car_lon,
                ]
            ];
        }
        $this->response->setJsonContent(['cars' => $cars_array]);
        return $this->response;
    }
}