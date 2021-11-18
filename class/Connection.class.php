<?php
class Connection
{
    public function __construct() {
        try {
            return new PDO("mysql:host=localhost;dbname=projeto_meeta;", "root", "");
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }
}
