<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<!-- подключение класса для работы с БД -->
<?php include_once('./mysql-db-service.php'); ?>
<?php include_once('pages/functions.php'); ?>
<div class="container">
    <header class="col-sm-12 col-md-12 col-lg-12">
    </header>
    <div class="row">
        <nav class="col-sm-12 col-md-12 col-lg-12">
            <?php include_once("./pages/menu.php")?>
        </nav>
    </div>
    <div class="row">
        <section class="col-sm-12 col-md-12 col-lg-12">

        </section>
    </div>
</div>
<?php if (isset($_GET["page"])){
    $page = $_GET["page"];
    switch ($page){
        case "1":
            include_once("pages/home.php");
            break;
        case "2":
            include_once("pages/vinylrecords.php");
            break;
        case "3":
            include_once("pages/artists.php");
            break;
        case "4":
            include_once("pages/registration.php");
            break;
        case "5":
            include_once("pages/login.php");
            break;
        case "6":
            include_once("pages/logout.php");
            break;
        default:
            include_once("pages/home.php");
            break;

    }
}else{
    include_once("pages/home.php");
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>

