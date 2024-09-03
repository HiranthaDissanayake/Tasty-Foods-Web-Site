<?php
// Database connection
$connect = mysqli_connect("localhost", "root", "", "tastyfooddb");
if (!$connect) {
    die("Could not connect: " . mysqli_connect_error());
}

// Getting the POST data
if (isset($_POST['food_name']) && isset($_POST['price'])) {
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];

    // Check if the food item already exists in the cart
    $check_sql = "SELECT * FROM cart WHERE food_name = '$food_name'";
    $result = mysqli_query($connect, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        // If the food item exists, update the quantity and total price
        $row = mysqli_fetch_assoc($result);
        $new_quantity = $row['quantity'] + 1;
        $new_total_price = $row['price'] + $price;

        $update_sql = "UPDATE cart SET quantity = '$new_quantity' WHERE food_name = '$food_name'";
        if (mysqli_query($connect, $update_sql)) {
            echo "<script>alert('Cart updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update cart');</script>";
        }
    } else {
        // If the food item does not exist, insert it into the cart
        $sql = "INSERT INTO cart (food_name, price, quantity) VALUES ('$food_name', '$price', 1)";
        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('Added to cart successfully');</script>";
        } else {
            echo "<script>alert('Failed to add to cart');</script>";
        }
    }
}

// Redirect back to the menu page
echo "<script>window.location.href='Menu_Page.php';</script>";

// Closing the database connection
mysqli_close($connect);
?>
