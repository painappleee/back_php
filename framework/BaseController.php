<?php
abstract class BaseController {

    public PDO $pdo; 
    public array $params;

    public function setParams(array $params){
        $this->params = $params;
    }

    public function setPDO(PDO $pdo) { 
        $this->pdo = $pdo;
    }

    public function getTemplate(): string {
        return "";
    }

    public function getContext(): array {
        return [];
    }
    
    public function process_response(){
        session_set_cookie_params(60*60*10);
        session_start();

        $method = $_SERVER['REQUEST_METHOD'];
        $context = $this->getContext();
        if ($method == 'GET'){
            $this->get($context);
        }
        elseif ($method=='POST'){
            $this->post($context);
        }
    }

    public function get(array $context){}
    public function post(array $context){}

}