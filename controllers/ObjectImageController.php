<?php
require_once "ObjectController.php"; 

class ObjectImageController extends ObjectController {
    public $template = "image.twig"; 

    public function getContext() : array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT image, id, title FROM totoro_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
       
        $context['image']= $data['image'];
        $context['is_image'] = true;
        $context['image_alt'] = $data['title'];

        return $context;
    }
}
?>