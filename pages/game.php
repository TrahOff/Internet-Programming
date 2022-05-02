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
            Слева будет расположена кнопка. Нажмите на неё,
            и слушая диктант записывайте слова.
            По завершению будут выведены ваши результаты. УДАЧИ!
        </p>
        <a href="gamePages/GameStatus.php">Начать игру</a>

    <?php } if($_SESSION['Game']) { ?>
        <h2><?= $_SESSION['Game']; ?></h2>
        <div class="gamefield" id="gamefield">
        <?php if ($_SESSION['i'] < 10) { ?>
        <p>Включайте записи слов и записывайте их в поля</p> 
            <form class="try"  action="gamePages/nextGamePage.php" method="post" enctype="multipart/form-data">
                    <audio id="<?= $_SESSION['play'][$_SESSION['i']]['sound_id'] ?>">
                        <source type="audio/wav" src=" <?= $_SESSION['play'][$_SESSION['i']]['sound_name'] ?> "/>
                    </audio>
                    <li>
                        <div class="num"><?= $_SESSION['i']+1 ?></div>
                        <div class="rect" onclick="play(<?= $_SESSION['play'][$_SESSION['i']]['sound_id'] ?>);"></div>
                        <div class="input">
                            <input type="text" class="in" id= "<?= $_SESSION['play'][$_SESSION['i']]['sound_id'] ?>" name="word">
                        </div>
                    </li>
                    <button type="submit" name="submit">Следующее слово</button>  
            </form>
        <?php } else { ?>
            <p>Игра завершена</p>
            <a href="gamePages/EndGame.php" onclick="resaudio(<?= $_SESSION['wrong'] ?>, <?= $_SESSION['correct'] ?>);">
                подвести итоги игры
            </a>
        <?php } ?>  
        </div> 

    <?php } if($_SESSION['end']) { ?>
        <h2><?= $_SESSION['end'] ?></h2>
        <p>Надеюсь, вам понравилось проходить нашу игру =). Вот ваши результаты.</p>
        <div class="results">
            <?php for ($i = 0; $i < 10; $i++) {
                if (!empty($_SESSION['word'][$i])) { ?> 
                    <div class="<?= $_SESSION['class'][$i] ?>"><?= $_SESSION['word'][$i] ?></div>
                <?php } else { ?>
                    <div class="false">——————</div>
                <?php } ?>
            <?php } ?>
        </div>
        <a href="gamePages/restart.php">Покинуть игру</a>
        <?php if($_SESSION['wrong'] >= $_SESSION['correct']) { ?>
            <audio id="bad">
                <source type="audio/wav" src="../audio/badresult.mp3"/>
            </audio>
                <script>
                    let audio = document.getElementById("bad");
                    audio.play();
                    audio.volume = 0.5;
                </script>
            <?php } else { ?>
                <audio id="good">
                    <source type="audio/wav" src="../audio/goodresult.mp3"/>
                </audio>
                <script>
                    let audio = document.getElementById("good");
                    audio.play();
                    audio.volume = 0.5;
                </script>
            <?php } ?>
    <?php } ?>
    
    <script src="../scripts/game.js"></script>
    
</main>
<?php include "../pages/template/footer.php"?>