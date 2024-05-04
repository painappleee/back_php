<?php
require_once "ObjectController.php"; 

class ObjectInfoController extends ObjectController{
    public $template = "info.twig";

    public function getContext() : array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT info, id FROM totoro_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();

        $context['is_info'] = true;
        $context['info'] = $data['info'];
        

        return $context;
    }
}
?>