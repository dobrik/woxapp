<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use Models\Users;
use Models\Routes;
use Models\Orders;
use Validation\AddOrderValidation;

class OrdersController extends Controller
{
    public function addOrder()
    {
        $data = $this->request->getJsonRawBody();
        $validation = new AddOrderValidation();
        $messages = $validation->validate($data);

        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]); //отдаем первую ошибку
            return $this->response;
        }

        $user = Users::findFirstByToken($data->access_token);
        if ($user === false) {
            $this->response->setJsonContent(['Error' => 'Invalid access token: ' . $data->access_token]);
        }

        $Orders = new Orders();

        $result = $Orders->createOrder($data);

    }
}