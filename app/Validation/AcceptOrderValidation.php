<?php

namespace Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;

class AcceptOrderValidation extends Validation
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
            'order_id',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );
    }
}