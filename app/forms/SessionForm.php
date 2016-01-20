<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;

use Phalcon\Validation\Validator\Identical;

class SessionForm extends Form
{
    public function initialize()
    {
        //email
        $email = new Text('email', array(
            'placeholder' => 'Email'
        ));
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Введите Ваш E-mail'
            ))
        ));

        $this->add($email);

        //password

        $password = new Password('password', array(
            'placeholder' => 'Password'
        ));
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Введите пароль'
            ))
        ));

        $password->clear();

        $this->add($password);

        // CSRF
        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));

        $csrf->clear();

        $this->add($csrf);

        $this->add(new Submit('go', array(
            'class' => 'btn btn-success'
        )));

    }

    public function message($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}