<?php

namespace Jazzlevit\RecmanTest\Controllers;

use Jazzlevit\RecmanTest\Models\User;
use Jazzlevit\RecmanTest\Services\FlashMessages;
use Jazzlevit\RecmanTest\Validators\RegistrationValidator;

class RegistrationController extends BasicController
{
    public function register()
    {
        $this->authorizationOnlyForGuests();

        $data = $this->getPostData();

        // show form
        if (empty($data)) {
            $this->render('registration');
            return;
        }

        $validator = new RegistrationValidator();
        $errors = $validator->validate($data);
        $data['errors'] = $errors;

        if ($errors) {
            $this->render('registration', $data);
            return;
        }

        $user = new User();
        $user
            ->setFirstName($data['first_name'])
            ->setLastName($data['last_name'])
            ->setEmail($data['email'])
            ->setMobilePhone($data['mobile_phone'])
            ->setPassword($data['password']);

        $user->save();


        FlashMessages::addMessage('You have been registered successfully. Please log in.');
        $this->redirect('/index.php');
    }

}