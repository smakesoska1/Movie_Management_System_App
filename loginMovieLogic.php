<?php

require 'config.php';

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    if(empty($username) || empty($password)){
        echo "Popunite oba polja";
        header("refresh:2; url=loginMovie.php");
    }else{
        $sql="SELECT * FROM users WHERE username=:username";
        $insertSql=$conn->prepare($sql);
        $insertSql->bindParam(':username',$username);
        $insertSql->execute();

        $data=$insertSql->fetch();

        if($data==false){
            echo "Username ne postoji";
        }else{
            if($password===$data['password']){
                $_SESSION['id']=$data['id'];
                $_SESSION['username']=$data['username'];
                $_SESSION['email']=$data['email'];
                $_SESSION['name']=$data['name'];
                $_SESSION['is_admin']=$data['is_admin'];
                header('Location:dashboardMovie.php');
            }else{
                echo "Password nije validan";
            }
        }

    }
}
?>