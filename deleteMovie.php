<?php
include_once("config.php");

$id= $_GET['id'];
$sql="DELETE FROM movies WHERE id=:id";
$izbrisi=$conn->prepare($sql);
$izbrisi->bindParam(':id',$id);
$izbrisi->execute();

header('Location:dashboardMovie.php');
?>