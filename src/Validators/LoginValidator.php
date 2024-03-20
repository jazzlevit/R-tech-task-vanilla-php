<?php

namespace Jazzlevit\RecmanTest\Validators;
use Jazzlevit\RecmanTest\Models\User;

class LoginValidator extends BasicValidator
{
    public function validate($data = [])
    {
        $this->validateEmail($data['email'] ?? null);
        $this->validatePassword($data['password'] ?? null);

        return $this->getErrors();
    }

    public function validateEmail($value): void
    {
        if (empty($value)) {
            $this->errors['email'] = 'Email is required';

            return;
        }

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Email is invalid';
        }

        $userModel = new User();
        $user = $userModel->findByEmail($value);
        if (empty($user)) {
            $this->errors['email'] = 'Wrong email or password.';
        }
    }

    private function validatePassword($value): void
    {
        if (empty($value)) {
            $this->errors['password'] = 'Password is required';
        }
    }

}