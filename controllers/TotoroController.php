<?php
require_once "TwigBaseController.php"; 

class TotoroController extends TwigBaseController {
    public $template = "_object.twig";
    public $title = "Тоторо";

    public function getContext() : array
    {
        $context = parent::getContext();

        $context['image_url'] = "/totoro/image";
        $context['info_url'] = "/totoro/info";
        $context['text']="Вы среди ветвей огромного камфорного дерева. Не разбудите Тоторо!";

        return $context;
    }
}
?>
