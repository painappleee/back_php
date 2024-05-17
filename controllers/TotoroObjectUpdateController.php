<?php
class TotoroObjectUpdatecontroller extends BaseTotoroTwigController{
    public $title = "Редактирование информации о персонаже";
    public $template = "totoro_object_update.twig";

    public function get(array $context){

        $id = $this->params['id'];

        $sql=<<<EOL
SELECT * FROM totoro_objects WHERE id = :id
EOL;

        $query = $this->pdo->prepare($sql);
        $query -> bindValue("id", $id);
        $query -> execute();

        $data = $query->fetch();

        $context['object'] = $data;

        parent::get($context);

    }
    

    public function post(array $context){
        $id = $this->params['id'];

        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

       

        $sql1="
UPDATE totoro_objects 
SET title = :title, 
    image = :image,
    description = :description,
    info = :info,
    type = :type
WHERE id = :id";

    $sql2="
UPDATE totoro_objects 
SET title = :title, 
    description = :description,
    info = :info,
    type = :type
WHERE id = :id";

    $tmp_name = $_FILES['image']['tmp_name'];

        if ($tmp_name!=""){
            $name = $_FILES['image']['name'];
            move_uploaded_file($tmp_name, "../public/media/$name");
            $image_url = "/media/$name";
            $query = $this->pdo->prepare($sql1);
            $query->bindValue("image", $image_url);

        }
        else{
            $query = $this->pdo->prepare($sql2);
        }

        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("id", $id);
        $query->execute();

        $context['message']='Данные о персонаже успешно изменены.';
        $context['id'] = $id;

        $this->get($context);

    }
}

?>