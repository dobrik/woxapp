<?php

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Mvc\Model\Message;
use Phalcon\Security\Random;
use Phalcon\Validation\Validator\Uniqueness;

class Users extends Model
{

    public $id;
    public $username;
    public $phone;
    public $token;

    public function initialize()
    {
        $this->setSource('users');
    }

    public function registerUser($data)
    {
        //генерим токен длиной 36 символов
        $random = new Random();
        $token = $random->hex(18);

        $_data = [
            'username' => $data->username,
            'phone' => $data->phone,
            'password' => md5($data->password),
            'token' => $token,
            'country_id' => $data->country_id
        ];

        return $this->save($_data);
    }

    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'phone',
            new Uniqueness(
                [
                    'message' => 'User already exists',
                ]
            )
        );

        return $this->validate($validator);
    }

}
