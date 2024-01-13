<?php
// require_once('controller/home_controller.php');
// require_once('controller/user_controller.php');
// $home_controller = new home_controller();
// $user_controller = new user_controller();
// //$user_controller->show_register_page();
// //$user_controller->show_login_page();
// $home_controller->show_home_page();



// Autoload classes
spl_autoload_register(function ($class) {
    include 'controller/' . $class . '.php';
    //include 'models/' . $class . '.php';
});

// Simple Router
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);
$id = '';
$controllerName =($uri[2] ?? 'home') ?: 'home';
$controllerName .= '_controller';

$action = $uri[2] ?? 'home';

if (isset($uri[3]) && $uri[2]=="user") {
    $action = $uri[3] ?? 'home';
}elseif(isset($uri[3]) && $uri[2]=="admin"){
    $action = $uri[3] ?? 'home';
}
elseif(isset($uri[3])){
    $id = $uri[3];
}

$action = $action ? 'show_' . $action . '_page' : 'show_home_page';

if (!class_exists($controllerName)) {
    die('Controller not found');
}

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    echo $action;
    die('Action not found');
}
if($id){
    $controller->$action($id);
}else{
    $controller->$action();
}
error_log("URI: " . print_r($uri, true));
error_log("Controller Name: " . $controllerName);
error_log("Action: " . $action);

?>