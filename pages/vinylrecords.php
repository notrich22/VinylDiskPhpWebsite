<form method="post" action="index.php?page=2">
    <label for="Artist" >Artist</label>
    <input type="text" id="artist" name="artist"/><br>
    <label for="title" > Title</label>
    <input type="text" id="title" name="title"/><br>
    <label for="genre" > Genre</label>
    <input type="text" id="genre" name="genre"/><br>
    <label for="year" >Year</label>
    <input type="year" id="year" name="year"/><br>
    <button> Add </button>
</form>

<!-- вывод существующих строк -->
<h2>Rows:</h2>
<ul>
    <?php
    // получим все записи и выведем в список
    $connection = $connection = MySqlDbService::getMySqlConnection('root', 'root');
    $rows = MySqlDbService::selectAllVinylRecords($connection);
    foreach ($rows as $row) {
        echo '<li>'.$row.'</li>';
    }
    ?>
</ul>

<!-- обработчик добавления данных -->
<?php
if (isset($_POST['artist']) && isset($_POST['title']) && $_POST['year'] && isset($_POST['genre'])) {
    // добавляем данные
    $connection = MySqlDbService::getMySqlConnection('root', 'root');
    MySqlDbService::insertVinylDisk($_POST['title'], $_POST['artist'],$_POST['year'],$_POST['genre'], $connection);
    header('Location: /');
}
?>