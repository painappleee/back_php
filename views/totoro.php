
<?php
    $is_image = $url == '/totoro/image';
    $is_info = $url == '/totoro/info';
?>

<h1>Тоторо</h1>
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link <?= $is_image ? "active" : '' ?>" aria-current="page" href="/totoro/image">Картинка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/totoro/info">Описание</a>
    </li>
</ul>
<hr>

<?php 
    if ($is_image) {
        require "totoro_image.php";
    } elseif ($is_info) {
        require "totoro_info.php";
    }
    else{
        echo "<p>Вы среди ветвей огромного камфорного дерева. Не разбудите Тоторо!</p>";
    }
?>