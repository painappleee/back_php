<?php
require_once "BaseTotoroTwigController.php"; 

class MainController extends BaseTotoroTwigController {  

    public function getTemplate(): string
    {
        $template = "main.twig";
        return $template;
    }

    public function getContext() : array
    {
        $context = parent::getContext();

        $context['description']="Вы на главной лесной полянке. Выберите куда пойти!";
                /*вы маленькая мяв  нет вы нет вы ^-^

                вы более маленький но! 1ВЫ меньше

                да

                я меньше маленькая нет

                я вас ***** мяу  мяу мяу мяу мяу мяу мяу*5

                мяу^5 Вы очень^100 маленький а вы тю^8(+90deg)+1
                хочю в лег0
                и я хочу 
                чтобы вы в лего
                я тоже хочю шьтобы я в легогогогогого ситииии подкавер
                там есть ЧЕЕЕЕЕЙЗ МАККЕЙН андеркавер так иг(маленькая р)а называетцса

                маленькая не знала она каждый раз так говоит

                ᓚᘏᗢ
                
                мяяяу*/


        if (isset($_GET['type'])){
            $query = $this->pdo->prepare("SELECT * FROM totoro_objects WHERE type=:type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
            $context['title'] = $_GET['type'];
        }else{
            $query = $this->pdo->query("SELECT * FROM totoro_objects");
            $context['title'] = "Главная";
        }    
        
        $context['totoro_objects'] = $query->fetchAll();


        return $context;
    }
}
?>