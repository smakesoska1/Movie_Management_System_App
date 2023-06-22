<?php
include_once("config.php");

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['password'];

    $sql="UPDATE users SET name=:name,username=:username,
    email=:email,password=:password,confirm_password=:confirm_password WHERE id=:id";
    $prep=$conn->prepare($sql);
    $prep->bindParam(':id',$id);
    $prep->bindParam(':name',$name);
    $prep->bindParam(':username',$username);
    $prep->bindParam(':email',$email);
    $prep->bindParam(':password',$password);
    $prep->bindParam(':confirm_password',$confirm_password);

    $prep->execute();
    header("Location:dashboardMovie.php");
}
?>