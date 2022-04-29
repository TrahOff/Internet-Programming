<?php 
include "../pages/template/header.php";
session_start();
?>
<link href="../style/game.css" type="text/css" rel="stylesheet">
<main>
<audio id="audio">
    <source type="audio/wav" src="../audio/game/dictation.wav"/>
</audio>
<audio id="bad">
    <source type="audio/wav" src="../audio/game/badresult.mp3"/>
</audio>
<audio id="good">
    <source type="audio/wav" src="../audio/game/goodresult.mp3"/>
</audio>
    <?php if (!$_SESSION['Game'] && !$_SESSION['end']) { ?>
        <h2>ИГРА</h2>
        <p>
            Эта игра проверит ваши знания словарных слов.
            Слева будет расположена кнопка. Нажмите на неё,
            и слушая диктант записывайте слова.
            По завершению будут выведены ваши результаты. УДАЧИ!
        </p>
        <a href="gamePages/GameStatus.php">Начать игру</a>

    <?php } if($_SESSION['Game']) { ?>
        <h2><?= $_SESSION['Game'] ?></h2>
        <div class="gamefield" id="gamefield">
        <p>Включите запись диктанта и запишите слова. Запись специально искажена, для усложнения задания</p> 
            <form>        
                <li>
                    <div class="rect" onclick="play();"></div>
                    <div class="input"><textarea id="answers"></textarea></div>
                </li>
            </form>
            <input id="result" type="button" onclick="result();" value="Завершить"/>
        </div>
        <script src="../scripts/game.js"></script> 

    <?php } if($_SESSION['end']) { ?>
        <h2><?= $_SESSION['end'] ?></h2>
        <p>Надеюсь, вам понравилось проходить нашу игру =)</p>
        <a href="gamePages/restart.php">Покинуть игру</a>
        
    <?php } ?>

</main>
<?php include "../pages/template/footer.php"?>