<?php
require_once "TotoroController.php"; 

class TotoroImageController extends TotoroController{
    public $template = "image.twig"; 

    public function getContext() : array
    {
        $context = parent::getContext();
       
        $context['image']= "/images/totoro.gif";
        $context['is_image'] = true;
        $context['image_alt'] = "totoro";

        return $context;
    }
}
?>