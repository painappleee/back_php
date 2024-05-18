<?php

class LoginRequiredMiddleware extends BaseMiddleware{
    public function apply(BaseController $controller, array $context)
    {

        $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
        $password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
        $sql = <<<EOL
SELECT * FROM totoro_users
    WHERE username = :user
EOL;
        
    $query = $controller->pdo->prepare($sql);
        
    $query->bindValue("user", $user);
    $query->execute();
                
    $valid = $query->fetch();

    if (!isset($valid['password']) || $password!=$valid['password']){
        header('WWW-Authenticate: Basic realm="Totoro objects"');
        http_response_code(401);
        exit; 
    }
       
    
    }
}

?>