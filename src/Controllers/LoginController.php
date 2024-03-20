<?php

namespace Jazzlevit\RecmanTest\Controllers;

use Jazzlevit\RecmanTest\Models\User;
use Jazzlevit\RecmanTest\Services\FlashMessages;
use Jazzlevit\RecmanTest\Validators\LoginValidator;

class LoginController extends BasicController
{

    public function login()
    {
        $this->authorizationOnlyForGuests();

        $data = $this->getPostData();

        // show form
        if (empty($data)) {
            $this->render('login');
            return;
        }

        $validator = new LoginValidator();
        $errors = $validator->validate($data);
        $data['errors'] = $errors;
        if ($errors) {
            $this->render('login', $data);
            return;
        }

        $userModel = new User();
        $user = $userModel->findByEmail($data['email']);

        if ($user->login($data['password']) === false) {
            $data['errors']['email'] = 'Wrong email or password.';
            $this->render('login', $data);
            return;
        }

        FlashMessages::addMessage('User logged in successfully.');
        $this->redirect('/index');
    }

}