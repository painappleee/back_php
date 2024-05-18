<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once '../middlewares/LoginRequiredMiddleware.php';
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/SearchController.php";
require_once "../controllers/TotoroObjectCreateController.php";
require_once "../controllers/TotoroTypeCreateController.php";
require_once "../controllers/TotoroObjectDeleteController.php";
require_once "../controllers/TotoroObjectUpdateController.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader,["debug"=> true]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost:3307;dbname=totorodb;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/totoro-object/(?<id>\d+)", ObjectController::class);  
$router->add("/search", SearchController::class);
$router->add("/createCharacter", TotoroObjectCreateController::class) 
        ->middleware(new LoginRequiredMiddleware());
$router->add("/createType", TotoroTypeCreateController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->add("/totoro-object/(?P<id>\d+)/delete", TotoroObjectDeleteController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->add("/totoro-object/(?P<id>\d+)/edit", TotoroObjectUpdateController::class)
        ->middleware(new LoginRequiredMiddleware());

$router->get_or_default(Controller404::class);



?>
