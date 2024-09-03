<?php
    $connect = mysqli_connect('localhost','root','','tastyfooddb');

    if(!$connect){
        die('Could not connect'. mysqli_connect_error());
    }

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM userdetails WHERE UserEmail='$email'";
        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result) == 1){
            $user = mysqli_fetch_assoc($result);
            if($password==$user['UserPassword']){
                $_SESSION['email']= $user['email'];

                echo "<script>alert('Login Successfully');</script>";
                echo "<script>window.location.href='Home_Page.php';</script>";
                exit(); 
            }else{
                echo "<script>alert('Invalid email or password');</script>";
                echo "<script>window.location.href='login page.html';</script>";
            }
    }
   

    }
     mysqli_close($connect);
?>