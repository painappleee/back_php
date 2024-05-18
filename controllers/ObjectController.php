<?php
require_once "BaseTotoroTwigController.php";

class ObjectController extends BaseTotoroTwigController {

    public function getTemplate() : string{
        if (isset($_GET['show'])){
            if ($_GET['show']=='info'){ 
                $template = 'info.twig';
            }elseif ($_GET['show']=='image'){
                $template = 'image.twig';
            }
        }else{
            $template = "_object.twig";
        } 
        return $template;
    }

    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->prepare("SELECT * FROM totoro_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();

        $context['description'] = $data['description'];
        $context['title'] = $data['title'];
        $context['image_url'] = "/totoro-object/".$data['id']."?show=image";
        $context['info_url'] = "/totoro-object/".$data['id']."?show=info";
        
       

        if (isset($_GET['show'])){
            if ($_GET['show']=='info'){        
                $context['is_info'] = true;
                $context['info'] = $data['info'];                

            }elseif ($_GET['show']=='image'){
                $context['image']= $data['image'];
                $context['is_image'] = true;
                $context['image_alt'] = $data['title'];
            }
        }

        

        return $context;
    }
}