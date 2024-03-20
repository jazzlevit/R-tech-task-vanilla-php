<?php

namespace Jazzlevit\RecmanTest\Validators;

use Jazzlevit\RecmanTest\Models\User;

class RegistrationValidator extends BasicValidator
{
    public function validate($data = [])
    {
        $this->validateFirstName($data['first_name'] ?? null);
        $this->validateLastName($data['last_name'] ?? null);
        $this->validateEmail($data['email'] ?? null);
        $this->validateMobilePhone($data['mobile_phone'] ?? null);
        $this->validatePassword($data['password'] ?? null);
        $this->validatePasswordConfirmation(
            $data['password'] ?? null,
            $data['repeat_password'] ?? null
        );

        return $this->getErrors();
    }

    private function validateFirstName($value): void
    {
        if (empty($value)) {
            $this->errors['first_name'] = 'First name is required';

            return;
        }

        if (mb_strlen($value) > 128) {
            $this->errors['first_name'] = 'First name is max 128 characters';
        }
    }

    private function validateLastName($value): void
    {
        if (empty($value)) {
            $this->errors['last_name'] = 'Last name is required';

            return;
        }

        if (mb_strlen($value) > 128) {
            $this->errors['last_name'] = 'Last name is max 128 characters';
        }
    }

    private function validateEmail($value): void
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
        if (!empty($user)) {
            $this->errors['email'] = 'Email already registered.';
        }
    }

    private function validateMobilePhone($value): void
    {
        if (empty($value)) {
            $this->errors['mobile_phone'] = 'Mobile phone is required';

            return;
        }

        if (mb_strlen($value) > 20) {
            $this->errors['mobile_phone'] = 'Mobile phone is max 20 characters';
        }

        // TODO add more mobile phone validations
    }

    private function validatePassword($value): void
    {
        if (empty($value)) {
            $this->errors['password'] = 'Password is required';

            return;
        }

        if (mb_strlen($value) < 8) {
            $this->errors['password'] = 'Password is too short, min 8 characters';
        }

        // TODO add more password validations
    }

    private function validatePasswordConfirmation($password, $repeatPassword): void
    {
        if ($password !== $repeatPassword) {
            $this->errors['repeat_password'] = 'Repeat password and password don\'t match';
        }
    }
}