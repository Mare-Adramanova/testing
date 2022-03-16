<?php

$db = new class() extends PDO {
    public function __construct(){
        $config 	= file_get_contents('config/db.json');
        $config_obj = json_decode($config);
        
        $connection_string = $config_obj->database->connection_sting;
        $username = $config_obj->database->username;
        $password = $config_obj->database->password;

       
        parent::__construct($connection_string,$username, $password);

        
    }
};

define('ROOT_URL', '/ScandiwebTest/');