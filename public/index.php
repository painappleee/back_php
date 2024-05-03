<?php
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/MayController.php";
require_once "../controllers/MayImageConroller.php";
require_once "../controllers/MayInfoController.php";
require_once "../controllers/TotoroController.php";
require_once "../controllers/TotoroImageController.php";
require_once "../controllers/TotoroInfoController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$controller = new Controller404($twig);



if ($url == "/") {
    $controller = new MainController($twig);
}elseif (preg_match("#^/may/image#",$url)){
    $controller = new MayImageController($twig); 
}elseif(preg_match("#^/may/info#",$url)){
    $controller = new MayInfoController($twig);
}elseif (preg_match("#^/may#",$url)) {
    $controller = new MayController($twig);    
}
elseif (preg_match("#^/totoro/image#",$url)){
    $controller = new TotoroImageController($twig);
}elseif(preg_match("#^/totoro/info#",$url)){
    $controller = new TotoroInfoController($twig);
}elseif (preg_match("#^/totoro#",$url)) {
    $controller = new TotoroController($twig); 
}

if ($controller) {
    $controller->get();
}

?>
