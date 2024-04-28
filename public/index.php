<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"  rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fa-solid fa-umbrella"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/may">Мэй</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/totoro">Тотторо</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php 
        $url = $_SERVER["REQUEST_URI"];

        if ($url == "/") {
            require "../views/main.php";
        } elseif (preg_match("#^/may#",$url)) {
            require "../views/may.php";
        } elseif (preg_match("#^/totoro#",$url)) {
            require "../views/totoro.php";
        } 
        ?>

    </div>
</body>
</html>
