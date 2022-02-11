<?php

// route collection
$routes = [
    'home' => 'main@index',
    'store' => 'main@store',
    'cart' => 'store@cart'
];

// define default
$default = 'home';

// verify if default exists in querry string
if(isset($_GET['a'])){
    // verify if default exists in routes
    if(!key_exists($_GET['a'], $routes)){
        $default = 'home';
    } else {
        $default = $_GET['a'];
    }
}

// deals with route definition
$pieces = explode('@',$routes[$default]);
$controller = 'core\\controller\\' . ucfirst($pieces[0]);
$method = $pieces[1];

$ctr = new $controller();
$ctr->$method();

/* acess is possible by passing the route name as a url parameter:
http://store.loc/index.php?a=shop
*/
