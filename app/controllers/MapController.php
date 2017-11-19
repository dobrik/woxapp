<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use Models\Users;
use Models\Routes;
use Models\Orders;
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



    }
}