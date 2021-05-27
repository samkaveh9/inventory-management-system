<?php

class Connection
{

    protected $db;
    protected $host = "localhost";
    protected $dbName = "project";
    protected $username = "root";
    protected $password = "";


    public function __construct()
    {
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName,$this->username,$this->password,$options);
    }



}