<?php

namespace Jazzlevit\RecmanTest\Controllers;

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
        foreach ($_POST as $key => $value) {
            $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $data;
    }
}