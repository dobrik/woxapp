<?php

namespace Controllers;

use Phalcon\Mvc\Controller;
use Validation\RegisterValidation;
use Validation\AuthValidation;
use Models\Users;

class UsersController extends Controller
{

    /**
     *
     * Регистрация юзера
     *
     * @return mixed
     */
    public function register()
    {
        $data = $this->request->getJsonRawBody();

        //проверяем ключ приложения
        $validation = new RegisterValidation();
        $messages = $validation->validate($data);
        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]); //отдаем первую ошибку
            return $this->response;
        }

        $user = new Users();
        $success = $user->registerUser($data);

        if ($success === true) {

            $_response = ['token' => $user->token];
            if (strcmp($data->key, USER_APP_KEY) === 0) {
                $_response['user_id'] = $user->id;
            } else {
                $_response['driver_id'] = $user->id;
            }
            $this->redis->save($user->id, $user->token);
            //возвращаем данные
            $this->response->setJsonContent($_response);
        } else {
            $this->response->setJsonContent(['Error' => array_shift($user->getMessages())->getMessage()]);
        }
        return $this->response;
    }

    /**
     *
     * Авторизация. по телефону и паролю.
     *
     * @return mixed
     */
    public function auth()
    {
        $data = $this->request->getJsonRawBody();

        $validation = new AuthValidation();
        $messages = $validation->validate($data);

        if ($messages->count() > 0) {
            $this->response->setJsonContent(['Error' => $messages->offsetGet(0)->getMessage()]);
            return $this->response;
        }

        $current_user = Users::findFirst(['phone = :phone: AND password = :password:', 'bind' => ['phone' => $data->phone, 'password' => $data->password]]);

        if ($current_user === false) {
            $this->response->setJsonContent(['Error' => 'User not found']);
        }else{
            $this->response->setJsonContent(
                [
                    'user_id' => $current_user->id,
                    'token' => $current_user->token,
                    'user_status' => $current_user->user_status,
                ]
            );
        }


        return $this->response;
    }
}