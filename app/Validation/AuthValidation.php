<?php

namespace Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;

class AuthValidation extends Validation
{
    public function initialize()
    {
        $this->add(
            'key',
            new AppKeyValidator(
                [
                    'message' => 'Invalid application key',
                ]
            )
        );

        $this->add(
            'password',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );

        $this->add(
            'phone',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );
    }
}