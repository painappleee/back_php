<?php
require_once "BaseTotoroTwigController.php";

class SearchController extends BaseTotoroTwigController{
    public function getTemplate(): string
    {
        $template = "search.twig";

        return $template;
    }

    public function getContext(): array
    {
        $context = parent::getContext();
        $context['title'] = "Поиск";

        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $info = isset($_GET['info']) ? $_GET['info'] : '';

        $sql = <<<EOL
SELECT id, title, info
FROM totoro_objects
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
    AND (:type = '' OR type=:type) 
        AND (:info = '' OR info like CONCAT('%', :info, '%'))
EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->execute();

        $context['objects'] = $query->fetchAll();

        return $context;
    }
}

?>