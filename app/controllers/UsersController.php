<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use Validation\RegisterValidation;
use Validation\AuthValidation;
use Models\Users;

class UsersController extends Controller
{
    public function register()
    {
        $data = $this->request->getJsonRawBody();

        //проверяем ключ приложения
        $validation = new RegisterValidation();
        $messages = $validation->validate($data);
        if($messages->count() > 0){
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]); //отдаем первую ошибку
            return $this->response;
        }

        //генерим токен длиной 36 символов
        $random = new \Phalcon\Security\Random();
        $token = $random->hex(18);

        $query = 'INSERT INTO Models\Users (username, phone, password, token, country_id) VALUES (:username:, :phone:, :password:, :token:, :country_id:)';

        $_data = [
            'username'      => $data->username,
            'phone'         => $data->phone,
            'password'      => md5($data->password),
            'token'         => $token,
            'country_id'    => $data->country_id
        ];

        //пишем юзера в БД
        $status = $this->modelsManager->executeQuery($query, $_data);

        if($status->success() === true){
            $user_id = $status->getModel()->id;

            $_response = ['token' => $token];
            if(strcmp($data->key, USER_APP_KEY) === 0){
                $_response['user_id'] = $user_id;
            }else{
                $_response['driver_id'] = $user_id;
            }

            //возвращаем данные
            $this->response->setJsonContent($_response);

        }else{
            $this->response->setJsonContent(['Error' => 'Incorrect parameters of method']);
        }
        return $this->response;
    }

    public function auth()
    {
        $data = $this->request->getJsonRawBody();

        $validation = new AuthValidation();
        $messages = $validation->validate($data);

        if($messages->count() > 0){
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]);
            return $this->response;
        }

        $current_user = Auth::find(['phone' => $data->phone, 'password' => $data->password]);

        var_dump($current_user);
        exit();



        $this->response->setJsonContent(
            [
                'status' => 'ERROR',
                'messages' => $data,
            ]
        );

        return $this->response;
    }
}