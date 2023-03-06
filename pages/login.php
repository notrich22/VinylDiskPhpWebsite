<h3>Login Form</h3>
<?php
if(!isset($_POST['log-btn']))
{
    ?>
    <!-- форма регистрации -->
    <form action="index.php?page=5" method="post">
        <!-- логин -->
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login"
                   minlength="3" maxlength="30" required>
        </div>
        <!-- пароль -->
        <div class="form-group">
            <label for="pass">Password:</label>
            <input type="password" class="form-control" name="pass"
                   minlength="3" maxlength="30" required>
        </div>
        <button type="submit" class="btn btn-primary" name="log-btn">Log in</button>
    </form>
    <?php
}
else
{
    // вызов функции регистрации
    $loginResult = login($_POST['login'],$_POST['pass']);
    if ($loginResult["result"]) {
        setcookie("logged_in", True, time()+60*1800);
        echo "Successfully logged in!";
    } else {
        echo 'Unsuccessful: '.$loginResult["msg"];
    }
    header("Location: index.php");
}
?>