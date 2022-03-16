<?php

$default = [
    'controller'=>'product',
    'method'=>'getAllProducts',
    'id'=>''
];

$params = isset($_GET['parameters']) ?
          explode("/", $_GET['parameters']) :
          [];



 
if(count($params) == 0){
    $controller = $default['controller'];
        $method = $default['method'] ;
        $id = $default['id'];
}

switch(count($params)){
    case 0:
        $controller = $default['controller'];
        $method = $default['method'] ;
        $id = $default['id'];
        
        break;
    case 1:
        $controller = $params[0];
        $method = $default['method'] ;
        $id = $default['id'];

       break;  
    case 2:
        $controller = $params[0];
        $method = $params[1];
        $id = $default['id'];
       break;    
    case 3:
       $controller = $params[0];
       $method = $params[1];
       $id = $params[2];
        break;
}


$filename_controller = 'controllers/'. ucfirst($controller).'.php';
$filename_model = 'models/'. ucfirst($controller).'.php';

if(file_exists($filename_controller) && file_exists($filename_model)){

    require('includes/globals.php');

    require($filename_controller);
    require($filename_model);
    
    $object = new $controller;
    
    if(method_exists($object, $method)){
        $object->$method($id);
    }
    else{
        echo 'method does not exist';
    }
    
}
else{
    echo "controller or method do not exsist";
} ?>


