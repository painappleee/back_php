<?php
//require_once "TwigBaseController.php"; 

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";    

    public function getContext() : array
    {
        $context = parent::getContext();

        /*$context['text']="Вы на главной лесной полянке. Выберите куда пойти!";
        $context['image']= "/images/forest.gif";
        $context['image_alt'] = "forest";*/
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

        $query = $this->pdo->query("SELECT * FROM totoro_objects");
        
        $context['totoro_objects'] = $query->fetchAll();


        return $context;
    }
}
?>