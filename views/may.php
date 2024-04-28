<?php
    $is_image = $url == '/may/image';
    $is_info = $url == '/may/info';
?>


<h1>Мэй</h1>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?= $is_image ? "active" : '' ?>" aria-current="page" href="/may/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/may/info">Описание</a>
  </li>
</ul>

<hr>

<?php 
    if ($is_image) {
        require "may_image.php";
    } elseif ($is_info) {
        require "may_info.php";
    }
    else{
        echo "<p>Вы попали в уютный деревенский домик. Поиграйте с малышкой Мэй!</p>";
    }
?>


