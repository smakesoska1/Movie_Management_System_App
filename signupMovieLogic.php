<?php

include_once('config.php');

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pomocni_password=$_POST['password'];
    $password=password_hash($pomocni_password,PASSWORD_DEFAULT);
    $pomocni_confirm=$_POST['confirm_password'];
    $confirm_password=password_hash($pomocni_confirm,PASSWORD_DEFAULT);


    if(empty($name)  || empty($username) || empty($email) || empty($password) || empty($confirm_password)) { 
            echo '<script type="text/javascript">';
            echo ' alert("You need to fill all registration fields.")';  //not showing an alert box.
            echo '</script>';
            echo '<script>window.location.href = "signupMovie.php";</script>'; // Reload the registration page
            exit; // Terminate script execution
    }else{
        $sql="SELECT username FROM users WHERE username=:username";

        $pomocni=$conn->prepare($sql);
        $pomocni->bindParam(':username',$username);
        $pomocni->execute();

        if($pomocni->rowCount()>0){
            echo "Ovaj username vec postoji, izaberite neki drugi";
        }else{
            $sql="INSERT INTO users (name,username,email,password,confirm_password) VALUES 
            (:name,:username,:email,:password,:confirm_password)";
            
            $insert=$conn->prepare($sql);
            $insert->bindParam(':name',$name);
            $insert->bindParam(':username',$username);
            $insert->bindParam(':email',$email);
            $insert->bindParam(':password',$password);
            $insert->bindParam(':confirm_password',$confirm_password);

            $insert->execute();

            echo "Podaci su uspjesno sacuvani";
            header("refresh:2; url=loginMovie.php");
        }
    }
}

?>