<?php
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";

$context = []; 
$menu = [
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Мэй",
        "url" => "/may",
    ],
    [
        "title" => "Тоторо",
        "url" => "/totoro",
    ]
];



if ($url == "/") {
    $template = "main.twig";
    $title = "Главная";
    $context['text']="Вы на главной лесной полянке. Выберите куда пойти!";
    $context['image']= "/images/forest.gif";
    $context['image_alt'] = "forest";

} elseif (preg_match("#^/may#",$url)) {
    $template = "_object.twig";
    $title = "Мэй";

    $context['image_url'] = "/may/image";
    $context['info_url'] = "/may/info";
    $context['text']="Вы попали в уютный деревенский домик. Поиграйте с малышкой Мэй!";

    if (preg_match("#^/may/image#",$url)){

        $template = "image.twig";
        $context['image']= "/images/may.gif";
        $context['is_image'] = true;
        $context['image_alt'] = "may";

    }
    elseif(preg_match("#^/may/info#",$url)){
        $template = "may_info.twig";
        $context['is_info'] = true;
    }

} elseif (preg_match("#^/totoro#",$url)) {

    $template = "_object.twig";
    $title = "Тоторо";

    $context['image_url'] = "/totoro/image";
    $context['info_url'] = "/totoro/info";
    $context['text']="Вы среди ветвей огромного камфорного дерева. Не разбудите Тоторо!";

    if (preg_match("#^/totoro/image#",$url)){
        $template = "image.twig";
        $context['image']= "/images/totoro.gif";
        $context['is_image'] = true;
        $context['image_alt'] = "totoro";
    }
    elseif(preg_match("#^/totoro/info#",$url)){
        $context['is_info'] = true;
        $template = "totoro_info.twig";
    }
}

$context['title'] = $title;
$context['menu'] = $menu; 
    
echo $twig->render($template,$context);
?>
