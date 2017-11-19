<?php

namespace Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Mvc\Model\Message;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\InclusionIn;

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

    /*public function validation()
    {

        if ($this->validationHasFailed() === true) {
            return false;
        }
    }*/

}
