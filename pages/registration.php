<h3>Registration Form</h3>
<?php
if(!isset($_POST['reg-btn']))
{
    ?>
    <!-- форма регистрации -->
    <form action="index.php?page=4" method="post">
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
        <!-- повторение пароля -->
        <div class="form-group">
            <label for="confirm-pass">Confirm Password:</label>
            <input type="password" class="form-control" name="confirm-pass"
                   minlength="3" maxlength="30" required>
        </div>
        <!-- email -->
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary" name="reg-btn">Register</button>
    </form>
    <?php
}
else
{
    // вызов функции регистрации
    $registerResult = register($_POST['login'],$_POST['pass'],$_POST['email']);
    if ($registerResult["result"]) {
        echo 'Successful';
    } else {
        echo 'Unsuccessful: '.$registerResult["msg"];
    }
}
?>