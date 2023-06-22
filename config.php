<?php
session_start();
$host="localhost";
$username="root";
$password="";
$dbname="moviebaza";
$port="3308"; //samo ja pisem

try{
    $conn=new PDO("mysql:host=$host;dbname=$dbname;port=$port",$username,$password);
}catch(Exception $e){
    echo "Problem sa povezivanjem sa bazom podataka";
}

?>