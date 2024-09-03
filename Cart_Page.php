<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="cart_page.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inika:wght@400;700&family=Outfit:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inika:wght@400;700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Outfit:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inika:wght@400;700&family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Kavoon&family=Outfit:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inika:wght@400;700&family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
<nav>
    <div class="logo">
        <a href="Home_Page.php"><img src="Images/Web Logo.png" alt=""></a>
        <h2>Tasty Foods</h2>  
    </div>

    <div class="navbar_sections">
        <ul>
            <a href="Home_Page.php"><li>Home</li></a>
            <a href="Menu_Page.php"><li>Menu</li></a>
            <a href="About_Page.html"><li>About</li></a>
            <a href="Reviews_Page.php"><li>Reviews</li></a>
        </ul>
    </div>

    <div class="cart_signin">
        <a href="Cart_Page.php"><img src="Images/cart_icon.png" alt=""></a>
        <div class="vertical-line"></div>
        <a href="login page.html"><button>Sign in</button></a>
    </div>
</nav>

<div class="cart-items">
    <div class="item-table">
        <table>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>

            <?php
            $connect = mysqli_connect("localhost", "root", "", "tastyfooddb");
            $result = mysqli_query($connect, "SELECT * FROM cart");

            $total = 0;
            while ($row = mysqli_fetch_array($result)) {
                $total_price = $row['price'] * $row['quantity'];
                $total += $total_price;
                echo '<tr>';
                echo '<td>' . $row['food_name'] . '</td>';
                echo '<td>Rs.' . $row['price'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>Rs.' . $total_price . '</td>';
                echo '<td>';
                echo '<form action="remove_from_cart.php" method="POST">';
                echo '<input type="hidden" id="food_name" name="food_name" value="' . $row['food_name'] . '">';
                echo '<button type="submit" class="remove-button">x</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }

            mysqli_close($connect);
            ?>
        </table>
    </div>

    <div class="cart-totals">
        <h2>Cart Totals</h2>
        <table>
            <tr>
                <td>Sub Total</td>
                <td>Rs.<?php echo $total; ?></td>
            </tr>

            <tr>
                <td>Delivery Fee</td>
                <td>Rs.300</td>
            </tr>

            <tr>
                <td><b>Total</b></td>
                <td>Rs.<?php echo $total + 300; ?></td>
            </tr>
        </table>

        <a href="DeliveryInformationPage.php"><button>PROCEED TO CHECKOUT</button></a>
    </div>
</div>

<footer>
    <div class="top-footer">
        <div class="first_part">
            <img src="Images/Web Logo.png" alt="">
        </div>

        <div class="second_part">
            <h2>Tasty Foods</h2>
            <p>Tasty Foods is dedicated to offering the best and most flavorful dishes to our customers. Our primary goal is to deliver high-quality food paired with exceptional service, ensuring every customer enjoys a delightful dining experience.</p>
            <div class="social_icons">
                <a href="https://web.facebook.com/"><img src="Images/fb.png" alt=""></a>
                <a href="https://web.whatsapp.com/"><img src="Images/whatsapp.png" alt=""></a>
                <a href="https://www.instagram.com/"><img src="Images/instagram.png" alt=""></a>
            </div>
        </div>

        <div class="third_part">
            <h2>Get In Touch</h2>
            <div class="contact-option">
                <img src="Images/phone.png" alt="">
                <a href=""><p>+94 762218776</p></a>
            </div>

            <div class="contact-option">
                <img src="Images/email.png" alt="">
                <a href=""><p>tastyfoods@gmail.com</p></a>
            </div>
        </div>

        <div class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31687.082218480275!2d79.94478957841486!3d6.9043202062227245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256d59601df81%3A0x31a1dd96e8d49ba!2sMalabe!5e0!3m2!1sen!2slk!4v1724070619832!5m2!1sen!2slk" width="600" height="450" style="border: 2px solid black" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
