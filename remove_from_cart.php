<?php
// Database connection
$connect = mysqli_connect("localhost", "root", "", "tastyfooddb");
if (!$connect) {
    die("Could not connect: " . mysqli_connect_error());
}

// Getting the POST data
if (isset($_POST['food_name'])) {
    $food_item = $_POST['food_name'];

    // Prepare and execute the delete statement
    $query = "DELETE FROM cart WHERE food_name = '$food_item'";

    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Food item removed from cart');</script>";
    } else {
        echo "<script>alert('Failed to remove food item');</script>";
    }
}

// Redirect back to the cart page
echo "<script>window.location.href='Cart_Page.php';</script>";

// Closing the database connection
mysqli_close($connect);
?>
