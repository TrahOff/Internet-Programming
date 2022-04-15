<?php
include "../pages/template/header.php";

if($_SESSION['user']){
    header('location: profile.php');
}
else{
?>
<?php session_start() ?>
    <link href="../style/login.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../scripts/login.js"></script>
    <main>
        <?php if (!$_SESSION['massage']) { ?>
        <div class="enter">
            <div class="form">
                <div class="form-panel one">
                    <div class="form-header">
                        <h1>Вход</h1>
                    </div>
                    <div class="form-content">
                        <form action="template/signin.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Имя пользователя</label>
                                <input type="text" id="username" name="user_name" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" id="password" name="user_password" required="required"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit">Войти</button>
                            </div>
                            <div class="register">
                                <a href="../pages/logup.php">Нет аккаунта?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <div class="enter">
                <div class="form">
                    <div class="form-panel">
                        <div class="form-header">
                            <h1>Ошибка входа</h1>
                        </div>
                        <div class="form-content">
                            <form method="post" action="../pages/login.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label ><?php echo $_SESSION['massage'] ?></label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="repeat">повторить попытку</button>
                                </div>
                                <div class="register">
                                    <a href="../pages/template/change_password.php">забыли пароль?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php }
        unset($_SESSION['massage']);
        ?>

    </main>
<?php } ?>
<?php include "template/footer.php"?>