<?php

namespace Validation;

use Phalcon\Validation;

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
    }
}