<?php
require_once "TotoroController.php"; 

class TotoroInfoController extends TotoroController{
    public $template = "totoro_info.twig";


    public function getContext() : array
    {
        $context = parent::getContext();

        $context['is_info'] = true;

        return $context;
    }
}
?>