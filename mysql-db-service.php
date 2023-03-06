<?php

    class MySqlDbService {
        
        // 1. статический метод установки соединения
        public static function getMySqlConnection($user, $password, $host="localhost", $database="vinyl_db") {
            // подключение к СУБД
            $connection = mysqli_connect($host, $user, $password, $database);
            if (!$connection) {
                // ошибка
                throw new Exception(''.mysqli_connect_error());
            }
            return $connection;
        }


        // 3. добавление с параметризированным запросом
        // КАК ДЕЛАТЬ НУЖНО
        public static function insertVinylDisk($title, $artist_id, $year, $genre, $connection) {
            // 1. сформировать строку запроса
            $query = 'INSERT INTO vinyl_db.vinyl (title, artist_id, year, genre) 
                        VALUES (?, ?, ?, ?);';
            // 2. делаем из запроса выражение с параметрами
            $stmt = $connection->prepare($query);
            // 3. привязываем параметры
            $stmt->bind_param('siis', $title, $artist_id, $year, $genre);
            // 4. выполняем
            $result = $stmt->execute();
            // 5. Проверяем результат
            if (!$result) {
                throw new Exception('Bad insert');
            }

        }

        // 4. получение всех записей
        public static function selectAllVinylRecords($connection) {
            $query = 'SELECT V.id, A.name, V.title, V.year, V.artist_id, V.genre 
                        FROM vinyl_db.artist as A 
                        LEFT JOIN vinyl_db.vinyl as V 
                        ON V.artist_id = A.id
                        WHERE A.name IS NOT NULL AND (V.title IS NOT NULL OR V.year IS NOT NULL OR V.artist_id IS NOT NULL OR V.genre IS NOT NULL);
                         ';
            $res = mysqli_query($connection, $query);
            $result_arr = [];
            while ($row = mysqli_fetch_array($res))
            {
                array_push($result_arr, $row['id']." - ".$row['name'].' - '.$row['title'].' - '.$row['year'].' - '.$row['genre']);
            }
            return $result_arr;
        }
        public static function insertArtist($name, $connection) {
            // 1. сформировать строку запроса
            $query = 'INSERT INTO vinylrecords SET name = '.$name.';';
            // 2. делаем из запроса выражение с параметрами
            $stmt = $connection->prepare($query);
            // 3. привязываем параметры
            $stmt->bind_param('ss', $name);
            // 4. выполняем
            $result = $stmt->execute();
            // 5. Проверяем результат
            if (!$result) {
                throw new Exception('Bad insert');
            }
        }

        // 4. получение всех записей
        public static function selectAllArtists($connection) {
            $query = 'SELECT * FROM artist';
            $res = mysqli_query($connection, $query);
            $result_arr = [];
            while ($row = mysqli_fetch_array($res))
            {
                array_push($result_arr, $row['id'].' - '.$row['name']);
            }
            return $result_arr;
        }

    }