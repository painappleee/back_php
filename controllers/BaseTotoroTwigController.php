<?php
class BaseTotoroTwigController extends TwigBaseController{


    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("SELECT * FROM totoro_types ORDER BY 1");
        $types = $query->fetchAll();
        $context['types'] = $types;

        if (!isset($_SESSION['urls'])){
            $_SESSION['urls']=[];
        }
        else{
            if (count($_SESSION['urls'])>9)
                unset($_SESSION['urls'][9]);
        }
        array_unshift($_SESSION['urls'], isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : ""); 

        $context["urls"] = isset($_SESSION['urls']) ? $_SESSION['urls'] : "";
        
        return $context;
    }
}

?>