<?php
require_once "BaseTotoroTwigController.php";

class TotoroTypeCreateController extends BaseTotoroTwigController{

    public $template = "totoro_type_create.twig";


    public function getContext(): array
    {
        $context = parent::getContext();
        $context['title'] = "Добавление типа";

        return $context;
    }

    public function get(array $context){

        parent::get($context);
    }

    public function post(array $context){
        $type = $_POST['type'];


        $sql = <<<EOL
INSERT INTO totoro_types(type)
VALUES( :type)
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("type", $type);


        $query->execute();

        $this->get($context);
    }
}

?>