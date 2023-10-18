<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'moviesite');

if ($mysqli->connect_error) {
    die('Unable to connect. Check your connection parameters: ' . $mysqli->connect_error);
}

// Alter the movie table to include running time, cost, and takings fields
$query = 'ALTER TABLE movie ADD COLUMN (
    movie_running_time TINYINT UNSIGNED NULL,
    movie_cost         DECIMAL(4,1)     NULL,
    movie_takings      DECIMAL(4,1)     NULL)';
if ($mysqli->query($query) === FALSE) {
    die('Error in ALTER TABLE query: ' . $mysqli->error);
}

// Insert new data into the movie table for each movie
$query = 'UPDATE movie SET
        movie_running_time = 101,
        movie_cost = 81,
        movie_takings = 242.6
    WHERE
        movie_id = 1';
if ($mysqli->query($query) === FALSE) {
    die('Error in UPDATE query: ' . $mysqli->error);
}

$query = 'UPDATE movie SET
        movie_running_time = 89,
        movie_cost = 10,
        movie_takings = 10.8
    WHERE
        movie_id = 2';
if ($mysqli->query($query) === FALSE) {
    die('Error in UPDATE query: ' . $mysqli->error);
}

$query = 'UPDATE movie SET
        movie_running_time = 134,
        movie_cost = NULL,
        movie_takings = 33.2
    WHERE
        movie_id = 3';
if ($mysqli->query($query) === FALSE) {
    die('Error in UPDATE query: ' . $mysqli->error);
}

echo 'Movie database successfully updated!';
?>
