<?php
require_once "TwigBaseController.php"; 

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";    

    public function getContext() : array
    {
        $context = parent::getContext();

        $context['text']="Вы на главной лесной полянке. Выберите куда пойти!";
        $context['image']= "/images/forest.gif";
        $context['image_alt'] = "forest";

        return $context;
    }
}
?>