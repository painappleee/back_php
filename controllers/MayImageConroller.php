<?php
require_once "MayController.php"; 

class MayImageController extends MayController {
    public $template = "image.twig"; 

    public function getContext() : array
    {
        $context = parent::getContext();
       
        $context['image']= "/images/may.gif";
        $context['is_image'] = true;
        $context['image_alt'] = "may";

        return $context;
    }
}
?>