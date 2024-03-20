<?php

namespace Jazzlevit\RecmanTest\Controllers;

use Jazzlevit\RecmanTest\Services\FlashMessages;

class BasicController
{
    protected function render($view, $data = [], $layout = 'basic')
    {

        ob_start();
        require_once __DIR__ . '/../Views/layouts/' . $layout . '.php';
        $layout = ob_get_clean();


        ob_start();
        require_once __DIR__ . '/../Views/' . $view . '.php';
        $view = ob_get_clean();

         echo preg_replace('/{{\s*content\s*}}/', $view, $layout);
    }

    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

    protected function getPostData()
    {
        $data = [];

        if ($this->isPost() === false) {
            return $data;
        }

        foreach ($_POST as $key => $value) {
            $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $data;
    }

    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }


    protected function authorizationRequired()
    {
        if (empty($_SESSION['user'])) {
            FlashMessages::addMessage('This page requires authorization.', FlashMessages::TYPE_ERROR);

            $this->redirect('/login');
        }
    }

    protected function authorizationOnlyForGuests()
    {
        if (!empty($_SESSION['user'])) {
            FlashMessages::addMessage('This page only for guests.', FlashMessages::TYPE_ERROR);

            $this->redirect('/login');
        }
    }
}