<?php
require_once "MayController.php"; 

class MayInfoController extends MayController {
    public $template = "may_info.twig"; 

    public function getContext() : array
    {
        $context = parent::getContext();
        
        $context['is_info'] = true;

        return $context;
    }
}
?>