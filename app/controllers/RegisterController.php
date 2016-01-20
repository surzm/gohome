<?php



class RegisterController extends ControllerBase
{

    public function indexAction()
    {
        $form = new RegisterForm();
        if ($this->request->isPost())
        {
            if ($form->isValid($this->request->getPost()) != false)
            {
                $user = new Users;

                $user->assign(array(
                    'name'     => $this->request->getPost('name', 'striptags'),
                    'email'    => $this->request->getPost('email'),
                    'number'   => $this->request->getPost('number'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'telephone'=> $this->request->getPost('telephone')
                ));

                if ($user->save())
                {
                    return $this->dispatcher->forward(array(
                        'controller' => 'index',
                        'action'     => 'index'
                    ));
                }

                $this->flash->error($user->getMessages());
            }
        }
        $this->view->form = $form;

    }
}