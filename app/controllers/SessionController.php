<?php

class SessionController extends ControllerBase
{
    public function indexAction()
    {
        $form = new SessionForm();
        $this->view->form = $form;
    }

    private function _registerSession(Users $user)
    {
        $this->session->set('auth',array(
                'id'  =>$user->id,
                'name'=>$user->name
            ));
    }

    public function startAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = Users::findFirstByEmail($email);
            if ($user) {
                if ($this->security->checkHash($password, $user->password)) {
                } else {
                    $user = false;
                }
            }

            if ($user != false) {
                $this->_registerSession($user);
                $this->flash->success('Welcome ' . $user->name);
                return $this->dispatcher->forward(array(
                    'controller' => 'index',
                    'action'     => 'index'
                ));
            } else {

                $this->flash->error('Неправильный E-mail/пароль');
                return $this->dispatcher->forward(array(
                    'controller' => 'session',
                    'action' => 'index'
                ));
            }
        }

    }

    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('До свидания!');
        return $this->forward('index');

    }

}