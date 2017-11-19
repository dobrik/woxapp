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
    }
}