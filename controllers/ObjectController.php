<?php

class ObjectController extends TwigBaseController {
    public $template = "_object.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT description, id, title FROM totoro_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();

        $context['description'] = $data['description'];
        $context['title'] = $data['title'];
        $context['image_url'] = "/totoro-object/".$data['id']."/image";
        $context['info_url'] = "/totoro-object/".$data['id']."/info";

        return $context;
    }
}