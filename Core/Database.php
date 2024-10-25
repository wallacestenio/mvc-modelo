<?php

namespace Core;

class Database {
    private static ?\PDO $instance = null;
    
    public static function getInstance(): \PDO {
        if (self::$instance === null) {
            $dbPath = dirname(__DIR__) . "/database.sqlite";
            self::$instance = new \PDO("sqlite:$dbPath");
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}