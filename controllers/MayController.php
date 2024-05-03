<?php
require_once "TwigBaseController.php"; 

class MayController extends TwigBaseController {
    public $template = "_object.twig";
    public $title = "Мэй";    

    public function getContext() : array
    {
        $context = parent::getContext();

        $context['image_url'] = "/may/image";
        $context['info_url'] = "/may/info";
        $context['text']="Вы попали в уютный деревенский домик. Поиграйте с малышкой Мэй!";

        return $context;
    }
}
?>