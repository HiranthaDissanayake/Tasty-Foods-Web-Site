<?php
    $connect = mysqli_connect('localhost','root','','tastyfooddb');

    if(!$connect){
        die('Could not connect: '. mysqli_connect_error());
    }

    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['contact'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $contact =$_POST['contact'];

        $sql = "INSERT INTO orders (FirstName,LastName,Email,Address,City,Contact) VALUES ('$first_name','$last_name','$email','$address','$city','$contact')";

        if(mysqli_query($connect,$sql)){
            echo "<script>alert('Your Order Placed Successfull');</script>";
            echo "<script>window.location.href='DeliveryInformationPage.php';</script>";
            exit(); 
         }else{
            echo "Error: ".$sql."<br>".mysqli_error($connect);
         }
    }
    mysqli_close($connect);
?>