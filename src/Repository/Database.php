<?php

namespace App\Repository;

class Database {
    public static function getConnection() {
        return new \PDO("mysql:host=localhost;dbname=symfony_course", "root", "1234");
    }
}