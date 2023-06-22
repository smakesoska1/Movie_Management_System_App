<?php

include_once("config.php");

$user_id=$_SESSION['id'];
$movies_id=$_POST['id'];

$nr_tickets=$_POST['nr_tickets'];
$date=$_POST['date'];
$time=$_POST['time'];

$sql="INSERT INTO bookings (user_id,movies_id,nr_tickets,date,time) 
VALUES (:user_id,:movies_id,:nr_tickets,:date,:time)";

$insertBooking=$conn->prepare($sql);
$insertBooking->bindParam(":user_id",$user_id);
$insertBooking->bindParam(":movies_id",$movies_id);
$insertBooking->bindParam(":nr_tickets",$nr_tickets);
$insertBooking->bindParam(":date",$date);
$insertBooking->bindParam(":time",$time);

$insertBooking->execute();
header("Location:home.php");
?>