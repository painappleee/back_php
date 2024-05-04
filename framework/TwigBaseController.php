<?php
require_once "BaseController.php"; 

class TwigBaseController extends BaseController {
    public $title = ""; 
    public $template = "";     
    protected \Twig\Environment $twig; 
    
    public function setTwig($twig) {
        $this->twig = $twig;
    }

    public function getContext() : array
    {
        $context = parent::getContext();
        $context['title'] = $this->title; 
        $context['menu'] = [
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
        

        return $context;
    }

    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}