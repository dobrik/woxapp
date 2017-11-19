<?php

namespace Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;

class AddOrderValidation extends Validation
{
    public function initialize()
    {
        $this->add(
            'access_token',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );

        $this->add(
            'driver_id',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );

        $this->add(
            'car_id',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );

        $this->add(
            'user_location',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );

        $this->add(
            'country_id',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );
    }
}