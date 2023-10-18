<?php
// Conectar a la base de datos utilizando MySQLi
$mysqli = new mysqli('localhost', 'root', 'root', 'moviesite');

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Unable to connect. Check your connection parameters: ' . $mysqli->connect_error);
}

// Crear la tabla de opiniones (reviews)
$query = 'CREATE TABLE reviews (
    review_movie_id INTEGER UNSIGNED NOT NULL, 
    review_date     DATE             NOT NULL, 
    reviewer_name   VARCHAR(255)     NOT NULL, 
    review_comment  VARCHAR(255)     NOT NULL, 
    review_rating   TINYINT UNSIGNED NOT NULL  DEFAULT 0, 
    KEY (review_movie_id)
)';
if ($mysqli->query($query) === false) {
    die('Error creating table: ' . $mysqli->error);
}

// Insertar nuevos datos en la tabla de opiniones (reviews)
$query = <<<ENDSQL
INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
VALUES 
    (1, "2008-09-23", "John Doe", "I thought this was a great movie
    Even though my girlfriend made me see it against my will.", 4),
    (1, "2008-09-23", "Billy Bob", "I liked Eraserhead better.", 2),
    (1, "2008-09-28", "Peppermint Patty", "I wish I'd have seen it
    sooner!", 5),
    (2, "2008-09-23", "Marvin Martian", "This is my favorite movie. I
    didn't wear my flair to the movie but I loved it anyway.", 5),
    (3, "2008-09-23", "George B.", "I liked this movie, even though I
    thought it was an informational video from my travel agent.", 3)
ENDSQL;
if ($mysqli->query($query) === false) {
    die('Error inserting data: ' . $mysqli->error);
}

echo 'Movie database successfully updated!';
?>
