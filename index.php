<?php
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';
$default = [
    'controller'=>'product',
    'method'=>'getAllProducts',
    'id'=>''
];
//$params = $_GET;
$params = isset($_GET['parameters']) ?
          explode("/", $_GET['parameters']) :
          [];



 //print_r($params);
 
// if(isset($params[0]) && $params[0] === 'api'){
//     require_once('api/index.php');
//     $api = new APIController;
    
//     $method = $params[1];

//     require('includes/globals.php');
//     require('includes/general_functions.php');

//     if(method_exists($api, $method)){
//         $api->$method($params);
//     }

//     die;
// }
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
//echo($filename_controller);
if(file_exists($filename_controller) && file_exists($filename_model)){

    require('includes/globals.php');
   // require('includes/general_functions.php');
    
    /////da se napravi aftentikacija treba da se kreira nov file i da se includne da se naoga vo includes i da se vika general_functions.php
    // require_authentication() ? success() : reject();
    

    require($filename_controller);
    require($filename_model);
    
    $object = new $controller;
    //print_r($object);
    if(method_exists($object, $method)){
        $object->$method($id);
    }
    else{
        echo 'metodot ne postoi';
    }
    
}
else{
    echo "controller or method do not exsist";
} ?>


