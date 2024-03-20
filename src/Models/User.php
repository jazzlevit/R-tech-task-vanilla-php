<?php

namespace Jazzlevit\RecmanTest\Models;

use PDO;

class User extends BaseModel
{
    private $id;
    private $first_name;
    private $last_name;
    private $mobile_phone;
    private $email;
    private $password;

    private function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setFirstName($first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setLastName($last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setMobilePhone($mobile_phone): self
    {
        $this->mobile_phone = $mobile_phone;

        return $this;
    }

    public function getMobilePhone(): string
    {
        return $this->mobile_phone;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword($password): self
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    private function setRawPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    public static function findByEmail($email)
    {
        $query = 'SELECT * FROM users WHERE email = ?';

        $stmt = Database::getInstance()->prepare($query);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $model = new self();

            $model->initiateUser($user);
            $model->setId($user['id']);
            $model->setRawPassword($user['password']);

            return $model;
        }

        return null;
    }

    public function initiateUser($data)
    {
        $this
            ->setFirstName($data['first_name'])
            ->setLastName($data['last_name'])
            ->setEmail($data['email']);

        return $this;
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function save()
    {
        $query = 'INSERT INTO users(
            first_name,
            last_name,
            email,
            mobile_phone,
            password
        ) VALUES (?, ?, ?, ?, ?)';

        $stmt = Database::getInstance()->prepare($query);

        return $stmt->execute([
            $this->first_name,
            $this->last_name,
            $this->email,
            $this->mobile_phone,
            $this->password,
        ]);
    }

    public function login($password)
    {
        if ($this->verifyPassword($password)) {
            $_SESSION['user']['id'] = $this->getId();
            $_SESSION['user']['full_name'] = $this->getFullName();
            $_SESSION['user']['email'] = $this->getEmail();

            return true;
        }

        return false;
    }
}