<?php 
include "../pages/template/header.php";
session_start();
?>
<link href="../style/game.css" type="text/css" rel="stylesheet">
<main>

    <?php if (!$_SESSION['Game'] && !$_SESSION['end']) { ?>
        <h2>ИГРА</h2>
        <p>
            Эта игра проверит ваши знания словарных слов.
            Слева будут расположены кнопки, по нажатии на которые
            будет воспроизводиться слово, которое вам надо записать.
            По завершению будут выведены ваши результаты.
        </p>
        <a href="gamePages/GameStatus.php">Начать игру</a>

    <?php } if($_SESSION['Game']) { ?>
        <h2><?= $_SESSION['Game'] ?></h2>
        <div class="gamefield" id="gamefield">
            <form>
                <?php for($i= 1; $i<= 10; $i++) { ?>
                <li>
                    <div class="number"><?= $i ?></div>
                    <div class="left"><div class="rect"></div></div>
                    <div class="right"><div class="input" id="<?= $i ?>"><input type="text" value=""></div></div>
                </li>
                <?php } ?>
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