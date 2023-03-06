<?php
// константы
define('USERS', 'pages/users.txt');  // путь к файлу с данными пользователей

// вспомогательный функции

// функция регистрации пользователя
function register($name, $pass, $email)
{
    // 1. выполняем экранирование параметров и сохраняем в переменные
    $name=trim(htmlspecialchars($name));
    $pass=trim(htmlspecialchars($pass));
    $email=trim(htmlspecialchars($email));

    // 2. проверка на не пустой
    if($name =='' || $pass =='' || $email =='')
    {
        return ["result" => false, "msg" => "Empty name or pass or email"];
    }

    // 3. проверка на длину
    if(strlen($name) < 3 || strlen($name) > 30 || strlen($pass) < 3 || strlen($pass) > 30)
    {
        return ["result" => false, "msg" => "Invalid name or pass len (allow from 3 to 30)"];
    }

    $users = USERS;
    // 4. работа с файлом - проверим нет ли пользователя с таким именем
    $file=fopen($users,'a+');
    while($line=fgets($file, 128))
    {
        $readname=substr($line, 0, strpos($line,':'));
        if($readname == $name)
        {
            return  ["result" => false, "msg" => "User already exists"];
        }
    }

    // 5. добавить нового пользователя
    $line=$name.':'.md5($pass).':'.$email."\r\n";
    fputs($file,$line);
    fclose($file);

    return  ["result" => true, "msg" => "Ok"];
}

function login($login, $pass){
    $login=trim(htmlspecialchars($login));
    $pass=md5(trim(htmlspecialchars($pass)));
    $users = USERS;
    $file=fopen($users,'a+');
    while($line=fgets($file, 128))
    {
        $line=trim($line);
        $userdata= explode(":", $line);
        if($userdata[0].":".$userdata[1] == $login.":".$pass)
        {
            return ["result" => True];
        }
    }
    return  ["result" => false, "msg" => "Wrong user data"];
}
function logout(){
    setcookie("logged_in", False, time()-3600);
    setcookie("succ_logged_out", True, time()+1);
    header("Location: index.php");
}