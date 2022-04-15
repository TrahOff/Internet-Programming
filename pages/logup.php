<?php
include "../pages/template/header.php";
if($_SESSION['user']){
    header('location: profile.php');
}
?>
<?php session_start()?>
    <link href="../style/login.css" type="text/css" rel="stylesheet">

    <main>
        <?php if (!$_SESSION['massage']) { ?>
        <div class="enter">
            <div class="form">
                <div class="form-panel">
                    <div class="form-header">
                        <h1>Регистрация</h1>
                    </div>
                    <div class="form-content">
                        <form method="post" action="template/signup.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Имя пользователя</label>
                                <input type="text" id="regname" name="user_name" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" id="regpassword" name="user_password" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="check">Повторите пароль</label>
                                <input type="password" id="regcpassword" name="check" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="cpassword">Аватар</label>
                                <input type="file" id="avatar" name="user_avatar" required="required"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup">Зарегестрироваться</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php }
            else{ ?>
                <div class="enter">
                    <div class="form">
                        <div class="form-panel">
                            <div class="form-header">
                                <h1>Ошибка регистрации</h1>
                            </div>
                            <div class="form-content">
                                <form method="post" action="../pages/logup.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label ><?php echo $_SESSION['massage'] ?></label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="repeat">повторить попытку</button>
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
<?php include "template/footer.php"?>