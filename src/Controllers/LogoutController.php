<?php

namespace Jazzlevit\RecmanTest\Controllers;

use Jazzlevit\RecmanTest\Services\FlashMessages;

class LogoutController extends BasicController
{

    public function logout()
    {
        $this->authorizationRequired();

        if ($this->isPost()) {
            session_destroy();

            session_start();
            FlashMessages::addMessage('User logout successfully.');

            $this->redirect('/index');
        }

        FlashMessages::addMessage('Something went wrong.', FlashMessages::TYPE_ERROR);
        $this->redirect('/index');
    }

}