<?php

namespace Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;

class GetMapValidation extends Validation
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
            'lat',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );

        $this->add(
            'lng',
            new PresenceOf(
                [
                    'message' => 'Incorrect parameters of method',
                ]
            )
        );
    }
}