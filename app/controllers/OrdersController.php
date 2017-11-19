<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use Models\Users;
use Models\Routes;
use Models\Orders;
use Validation\AddOrderValidation;
use Validation\AcceptOrderValidation;
use Validation\SetOrderStatusValidation;

class OrdersController extends Controller
{
    public function addOrder()
    {
        $data = $this->request->getJsonRawBody();
        $validation = new AddOrderValidation();
        //проверяем все ли данные пришли
        $messages = $validation->validate($data);

        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]);
            return $this->response;
        }

        //ищем юзера по токену
        $user = Users::findFirstByToken($data->access_token);
        if ($user === false) {
            $this->response->setJsonContent(['Error' => 'Invalid access token: ' . $data->access_token]);
            return $this->response;
        }

        //ищем водилу по id
        $driver = Users::findFirst($data->driver_id);
        if ($driver === false) {
            $this->response->setJsonContent(['Error' => 'User id not found']);
            return $this->response;
        }

        //пишем заказ в БД
        $order = new Orders();
        $result = $order->createOrder($data, $user, $driver);
        if ($result === false) {
            $this->response->setJsonContent(['Error' => 'Unknown error']);
            return $this->response;
        }

        //$this->gearman->doBackground('new_order_notify_driver', $order->serialize());

        $this->response->setJsonContent([
            'order_id' => $order->id,
            'order_status_id' => $order->status_id ? null : 0,
            'order_status' => 'Ожидает ответ водителя'
        ]);

        return $this->response;
    }

    public function acceptOrder()
    {
        $data = $this->request->getJsonRawBody();
        $validation = new AcceptOrderValidation();
        //проверяем все ли данные пришли
        $messages = $validation->validate($data);
        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]);
            return $this->response;
        }

        $user = Users::findFirstByToken($data->access_token);
        if ($user === false) {
            $this->response->setJsonContent(['Error' => 'Invalid access token: ' . $data->access_token]);
            return $this->response;
        }

        $order = Orders::findFirst([
            'driver_id = :driver_id: AND id  = :id:',
            'bind' => [
                'driver_id' => $user->id,
                'id' => $data->order_id
            ]]);

        if ($order !== false) {
            $order->status_id = 1;
            $order->save();

            //$this->gearman->doBackground('order_accepted_notify_user', $order->serialize()); //отправляем нотификацию юзеру, что заказ принят
        }
    }

    public function rejectOrder()
    {
        $data = $this->request->getJsonRawBody();
        $validation = new AcceptOrderValidation();
        //проверяем все ли данные пришли
        $messages = $validation->validate($data);
        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]);
            return $this->response;
        }

        $user = Users::findFirstByToken($data->access_token);
        if ($user === false) {
            $this->response->setJsonContent(['Error' => 'Invalid access token: ' . $data->access_token]);
            return $this->response;
        }

        $order = Orders::findFirst([
            'driver_id = :driver_id: AND id  = :id:',
            'bind' => [
                'driver_id' => $user->id,
                'id' => $data->order_id
            ]]);

        if ($order !== false) {
            $order->delete();

            //$this->gearman->doBackground('order_rejected_notify_user', $order->serialize()); //отправляем нотификацию юзеру, что заказ отменен
        }
    }

    public function setOrderStatus()
    {
        $data = $this->request->getJsonRawBody();
        $validation = new SetOrderStatusValidation();
        $messages = $validation->validate($data);
        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]);
            return $this->response;
        }

        $user = Users::findFirstByToken($data->access_token);
        if ($user === false) {
            $this->response->setJsonContent(['Error' => 'Invalid access token: ' . $data->access_token]);
            return $this->response;
        }

        $order = Orders::findFirstById($data->order_id);

        $is_driver = false;
        if ($user->id === $order->driver_id) {
            $is_driver = true;
        }

        if ($is_driver === true) {
            if ($data->order_status_id != 1 && $data->order_status_id != 5 && $data->order_status_id == ($order->status_id + 1)) {
                $order->status_id = $data->order_status_id;
                $order->save();
                if ($data->order_status_id == 4) {
                    $order->saveFactRoute($data->fact_route);
                }

                //тут наверно далжно быть пуш уведомление
                $this->response->setJsonContent(['Success' => 1]);
                return $this->response;
            }
        } else {
            if ($order->status_id <= 2 && $order->status_id >= 1 && $data->order_status_id == 6) {
                $order->status_id = 6;
                $order->save();
                //тут наверно тоже
                $this->response->setJsonContent(['Success' => 1]);
                return $this->response;
            }
        }
    }
}