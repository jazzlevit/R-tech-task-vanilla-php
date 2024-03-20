<?php

namespace Jazzlevit\RecmanTest\Models;

use PDO;

class Database {
    private static $instance;
    private $pdo;

    private function __construct() {
        // Database connection parameters
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $username = DB_USER;
        $password = DB_PASS;

        // Establish a PDO connection
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function prepare($query) {
        return $this->pdo->prepare($query);
    }

    public function execute($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        return $stmt;
    }

    public function fetch($query, $params = [], $fetchStyle = PDO::FETCH_ASSOC) {
        $stmt = $this->execute($query, $params);

        return $stmt->fetch($fetchStyle);
    }
}
