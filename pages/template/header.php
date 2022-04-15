<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TrahOff</title>
    <link href="../../style/main.css" type="text/css" rel="stylesheet">
    <link href="../../style/footindex.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../../scripts/main.js"></script>
</head>
<body>
<div class="site_name">
    <marquee>ЛИЧНЫЙ САЙТ TRAHOFF'А</marquee>
</div>
<header>
    <nav class="clearfix">
        <ul class="clearfix">
            <li><a href="../../index.html">Главная</a></li>
            <li><a href="../../pages/resume.php">Резюме</a>
                <ul>
                    <li><a href="../../pages/resume.php#study">Образование</a></li>
                    <li><a href="../../pages/resume.php#sport">Спорт</a></li>
                    <li><a href="../../pages/resume.php#hobby">Увлечение</a></li>
                </ul>
            </li>
            <li><a href="../../pages/gallery.php">Галерея</a></li>
            <li><a href="../../pages/works.php">Работы</a></li>
            <li><a href="../../pages/game.php">Игра</a></li>
            <?php if($_SESSION['user']) {
                if ($_SESSION['user']['user_name'] != 'TrahOff') { ?>
                <li><a href='../../pages/profile.php'><?= $_SESSION['user']['user_name'] ?></a>
                    <ul>
                        <li><a href="../../pages/template/change_password.php">сменить пароль</a></li>
                        <li><a href="../../pages/template/change_avatar.php">Сменить аватар</a></li>
                        <li><a href="../../pages/template/delete_user.php">удалить профиль</a></li>
                        <li><a href="../../pages/template/logout.php">Выйти</a></li>
                    </ul>
                </li>
            <?php } else {?>
                <li><a href='../pages/profile.php'><?= $_SESSION['user']['user_name'] ?></a>
                    <ul>
                        <li><a href="../../pages/template/change_password.php">сменить пароль</a></li>
                        <li><a href="../../pages/template/change_avatar.php">Сменить аватар</a></li>
                        <li><a href="../../pages/template/logout.php">Выйти</a></li>
                    </ul>
                </li>
            <?php } }else{ ?>
            <li><a href="../pages/login.php">Войти</a></li>
            <?php } ?>
        </ul>
        <a href="#" id="pull">Меню</a>
    </nav>
</header>