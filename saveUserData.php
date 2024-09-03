<?php
    $connect = mysqli_connect('localhost','root','','tastyfooddb');

    if(!$connect){
        die('Could not connect: '. mysqli_connect_error());
    }

    if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password'])){
        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];

        $sql = "INSERT INTO userdetails (UserName,UserEmail,UserPassword) VALUES ('$name','$email','$password')";

        if(mysqli_query($connect,$sql)){
            echo "<script>alert('New User Registered Successfully');</script>";
            echo "<script>window.location.href='login page.html';</script>";
            exit(); 
         }else{
            echo "Error: ".$sql."<br>".mysqli_error($connect);
         }
    }
    mysqli_close($connect);
?>