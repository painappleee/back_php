<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/ObjectImageController.php";
require_once "../controllers/ObjectInfoController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader,["debug"=> true]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost:3307;dbname=totorodb;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/totoro-object/(?<id>\d+)", ObjectController::class); 
$router->add("/totoro-object/(?<id>\d+)/info", ObjectInfoController::class); 
$router->add("/totoro-object/(?<id>\d+)/image", ObjectImageController::class); 

$router->get_or_default(Controller404::class);



?>
