<?php
require_once "BaseTotoroTwigController.php";

class TotoroObjectCreateController extends BaseTotoroTwigController{

    public $template = "totoro_object_create.twig";


    public function getContext(): array
    {
        $context = parent::getContext();
        $context['title'] = "Добавление персонажа";

        return $context;
    }

    public function get(array $context){

        parent::get($context);
    }

    public function post(array $context){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";


        $sql = <<<EOL
INSERT INTO totoro_objects(title, description, type,
info,image)
VALUES(:title, :description, :type, :info, :image_url)
EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);

        $query->execute();

        $context['message']='Персонаж успешно добавлен';
        $context['id'] = $this->pdo->lastInsertId();

        $this->get($context);
    }
}

?>