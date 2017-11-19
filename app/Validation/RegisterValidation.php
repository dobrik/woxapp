<?php

namespace Validation;

use Phalcon\Validation;

class RegisterValidation extends Validation
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