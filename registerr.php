<?php

include 'connect.php';

if(isset($_POST['Register'])) {
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);

    $checkUsername="SELECT * FROM users WHERE username='$username'";
    $result=$conn->query($checkUsername);
    if($result->num_rows > 0) {
        echo "Username already exists! Choose another!";
    }
    else {
        $insertQuery="INSERT INTO users(name, username, password)
                        VALUES ('$name', '$username', '$password')";
        if($conn->query($insertQuery)==TRUE) {
            header("location: login.php");
        }
        else {
            echo "Error: ".$conn->error;
        }
    }
}

if(isset($_POST['Login'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=$conn->query($sql);
    if($result->num_rows > 0) {
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['username']=$row['username'];
        $_SESSION['role']=$row['role'];
        header("Location: home.php");
        exit();
    }
    else {
        echo "Not Found! Incorrect username or password!";
    }
}

?>