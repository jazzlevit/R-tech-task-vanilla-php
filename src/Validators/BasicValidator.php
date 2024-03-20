<?php

namespace Jazzlevit\RecmanTest\Validators;

abstract class BasicValidator
{
    protected $errors = [];

    public abstract function validate($data = []);

    public function getErrors()
    {
        return $this->errors;
    }
}