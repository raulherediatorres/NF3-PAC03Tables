<?php
// Conectar a la base de datos utilizando MySQLi
$mysqli = new mysqli('localhost', 'root', 'root', 'moviesite');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Unable to connect. Check your connection parameters: ' . $mysqli->connect_error);
}

// Insertar tres nuevas opiniones en la tabla de opiniones (reviews)
$query = <<<ENDSQL
INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
VALUES 
    (4, "2023-10-18", "Alice", "I loved this movie! It's a must-watch.", 5),
    (5, "2023-10-18", "Bob", "This movie was a masterpiece.", 4),
    (6, "2023-10-18", "Charlie", "Not my favorite, but it had its moments.", 3)
ENDSQL;

if ($mysqli->query($query) === false) {
    die('Error inserting data: ' . $mysqli->error);
}

echo 'Three new reviews added successfully!';
?>
