<?php
    session_start();
    require_once("connect.php");

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    if($user != "" && $pass != ""){
        $sqlUser = "SELECT * FROM user WHERE nama_user = '$user'";
        $sqlEmail = "SELECT * FROM user WHERE email = '$user'";
        $resUser = mysqli_query($con, $sqlUser);
        $resEmail = mysqli_query($con, $sqlEmail);
        if(mysqli_num_rows($resUser) > 0){
            $sqlPass = "SELECT * FROM user WHERE pass_user = '$pass'";
            $cPass = mysqli_query($con, $sqlPass);
            if(mysqli_num_rows($cPass) > 0){
                $row = mysqli_fetch_assoc($cPass);
                $_SESSION["name"] = $row["nickname_user"];
                $_SESSION["user"] = $row["nama_user"];
                header("location: index2.php?err=2");
            }else {
                header("location: index2.php?err=4");
            }
        }else if(mysqli_num_rows($resEmail) > 0){
            $sqlPass = "SELECT * FROM user WHERE password = '$pass'";
            $cPass = mysqli_query($con, $sqlPass);
            if(mysqli_num_rows($cPass) > 0){
                $getname = "SELECT name FROM user WHERE email ='$user'";
                $name = mysqli_query($con, $getname);
                $_SESSION["name"] = $name;
                header("location: index2.php?err=2");
            }else {
                header("location: index2.php?err=4");
            }
        }else {
            header("location: index2.php?err=3");
        }
    }else {
        header("location: index2.php?err=1");
    }
?>