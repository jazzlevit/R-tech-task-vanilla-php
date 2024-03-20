<?php

namespace Jazzlevit\RecmanTest\Controllers;

use Jazzlevit\RecmanTest\Services\FlashMessages;

class LogoutController extends BasicController
{

    public function logout()
    {
        session_destroy();

        FlashMessages::addMessage('User logout successfully.');

        $this->redirect('/index');
    }

}