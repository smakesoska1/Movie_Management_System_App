<?php
include_once("config.php");

if (isset($_GET['query'])) {
  $searchQuery = $_GET['query'];

  // Prepare the SQL statement to search for movies
  $sql = "SELECT * FROM movies WHERE movie_name LIKE :searchQuery";
  $selectMovie = $conn->prepare($sql);
  $selectMovie->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
  $selectMovie->execute();

  $movies_data = $selectMovie->fetchAll();

  // Return the movies data as JSON response
  header('Content-Type: application/json');
  echo json_encode($movies_data);
}
?>