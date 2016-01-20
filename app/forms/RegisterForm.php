<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;

class RegisterForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        //name

        $name = New Text('name');
        $name->setLabel('Представьтесь или напишите название Вашего приюта:');
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Обязательное поле'
            ))
        ));
        $this->add($name);


        //email

        $email = new Text('email');
        $email->setLabel('Введите Ваш E-mail:');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'Обязательное поле'
            )),
            new Email(array(
                'message' => 'Введите правильный E-mail'
            ))
        ));

        $this->add($email);


        //Phone

        $number = new Text('number');
        $number->setLabel('Напишите телефон, по которому с Вами можно связаться:');
        $number->addValidators(array(
            new PresenceOf(array(
                'message' => 'Обязательное поле'
            ))
        ));

        $this->add($number);

        //password

        $password = new Password('password');
        $password->setLabel('Придумайте пароль:');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Обязательно поле'
            )),
            new StringLength(array(
                'min' => 8,
                'messageMinimum' => 'Слишком короткий, минимум - 8 символов'
            )),
            new Confirmation(array(
                'message' => 'Пароль не подтвержден',
                'with' => 'confirmPassword'
            ))
        ));

        $this->add($password);


        // Confirm Password
        $confirmPassword = new Password('confirmPassword');
        $confirmPassword->setLabel('Подтвердите пароль:');
        $confirmPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'The confirmation password is required'
            ))
        ));
        $this->add($confirmPassword);



        // CSRF

        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));
        $this->add($csrf);


        // Sign Up

        $this->add(new Submit('Sign Up', array(
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