<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;

class Users extends Model
{
    public function validation()
    {
        $this->validate(new UniquenessValidator(array(
            'field' => 'email',
            'message' => 'Аккаунт с такой почтой уже существует'
        )));

        $this->validate(new EmailValidator(array(
            'field'  => 'email'
        )));

        if ($this->validationHasFailed() == true)
        {
            return false;
        }
    }


}