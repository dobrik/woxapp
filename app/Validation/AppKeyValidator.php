<?php

namespace Validation;

use Phalcon\Validation;
use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;

class AppKeyValidator extends Validator
{
    public function validate(Validation $validator, $attribute)
    {
        $value = $validator->getValue($attribute);

        if (strcmp($value, DRIVER_APP_KEY) !== 0 && strcmp($value, USER_APP_KEY) !== 0) {
            $message = $this->getOption('message');

            if (!$message) {
                $message = 'Invalid app key';
            }

            $validator->appendMessage(
                new Message($message, $attribute)
            );

            return false;
        }

        return true;
    }
}