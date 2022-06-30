<?php

namespace app\config;

class Database {

    private $host;
    private $username;
    private $password;
    private $database;


    public function getHost(){
        return $this->host;
    }
    public function setHost($host){
        $this->host = $host;
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function getDatabase(){
        return $this->database;
    }
    public function setDatabase($database){
        $this->database = $database;
    }

    public function connectPDO(){
        $this->setHost(DB_HOST);
        $this->setUsername(DB_USER);
        $this->setPassword(DB_PASSWORD);
        $this->setDatabase(DB_DATABASE);

        try {
            $connection = new \PDO('mysql:host='.$this->getHost().';dbname='.$this->getDatabase(),
                $this->getUsername(),
                $this->getPassword());
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $connection;
    }

}