

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home_page.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Great+Primer+SC&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kavoon&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <script>
        
        let currentIndex = 0;

        function changeBackground() {
            const middleDiv = document.querySelector('.middle');
            middleDiv.style.backgroundImage = `url(${images[currentIndex]})`;
            currentIndex = (currentIndex + 1) % images.length;
        }

        // Change background every 5 seconds (5000 milliseconds)
        setInterval(changeBackground, 5000);

        // Initial load
        changeBackground();

    </script>
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

    <div class="Container">
    <div class="middle">
    <div class="transparent-box">
        <h1 style="color: white;">
            <span style="color: #E5B141;padding: 20px;">ORDER YOUR<br>
                <span style="color: #E5B141;padding: 20px;">FAVOURITE FOODS HERE</span>
            </span>
        </h1>
        <br>
        <p>
        "Order your favorite foods easily from our Tasty Foods website! Enjoy a wide selection of delicious meals delivered straight to your door with just a few clicks." <br> Whether you're in the mood for a hearty breakfast, a quick lunch, or a special dinner, you can browse our menu, customize your order, and have your favorite foods delivered straight to your door.        </p>
        <br>
        <a href="Menu_Page.php">
            <button class="b3">View Menu</button>
        </a>
    </div>
</div>
            <div class="catagory">
                <h2 class="cata">OUR CATAGORIES</h2>
                <div class="top-foods">
                    <div class="content1">
                        <a href="Menu_Page.php?type=Rice"><img src="images1/fri.jpg"  alt=""></a>
                        <a href="Menu_Page.php?type=Rice"><div class="texts" style="left: 6vh;">Rice</div></a>
                    </div>
                    <div class="content1">
                        <a href="Menu_Page.php?type=Kottu"><img src="images1/kothuu.jpeg"  alt=""></a>
                        <a href="Menu_Page.php?type=Kottu"><div class="texts">Kottu</div></a>
                    </div>
                    <div class="content1">
                        <a href="Menu_Page.php?type=Biriyani"><img src="images1/buriyani2.jpeg"  alt=""></a>
                        <a href="Menu_Page.php?type=Biriyani"><div class="texts" style="left: 2.3vh;">Biriyani</div></a>
                    </div>
                    <div class="content1">
                        <a href="Menu_Page.php?type=Pasta"><img src="images1/pasta2.jpeg"  alt=""></a>
                        <a href="Menu_Page.php?type=Pasta"><div class="texts">Pasta</div></a>
                    </div>
                    <div class="content1">
                        <a href="Menu_Page.php?type=Drink"><img src="images1/drinks2.jpg"  alt=""></a>
                        <a href="Menu_Page.php?type=Drink"><div class="texts">Drinks</div></a>
                    </div>

                </div>
            </div>
            <hr class="hr1">
    </div>

    <div class="text">TOP MEALS</div>
    <div class="content">
    <?php
    $connect = mysqli_connect("localhost","root","","tastyfooddb");

    if(!$connect){
        die("Could not connect". mysqli_connect_error());
    }

    $foods_sql = "SELECT * FROM allfoods LIMIT 10";
    $result = mysqli_query($connect, $foods_sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<div class="section">';
                echo '<h3>' . $row['FoodName'] . '</h3>';
                echo '<p>' . $row['Description'] . '</p>';
                echo '<h4>Rs. ' . $row['Price'] . '</h4>';
                echo '<h5 style="font-family: Poppins, sans-serif;">Type:  ' . $row['Type'] . '</h5>';
                echo '<div class="portions">';
                echo '<div class="portion" style="font-family:Poppins, sans-serif;">' . $row['Size'] . '</div>';
                echo '</div>';
        
                // Form to add the item to the cart
                echo '<form action="add_to_cart.php" method="POST">';
                echo '<input type="hidden" id="food_name" name="food_name" value="' . $row['FoodName'] . '">';
                echo '<input type="hidden" id="price" name="price" value="' . $row['Price'] . '">';
                echo '<button type="submit" name="add_to_cart" class="addButton"></button>';
                echo '</form>';
        
                echo '</div>';
            }
        }

        mysqli_close($connect);
    ?>
    </div>

                <div class="button-con">
                    <a href="Menu_Page.php"><button class="b1">MORE</button></a>
                </div>


    <footer>
        <div class="top-footer">
            <div class="first_part">
                <img src="Images/Web Logo.png" alt="">
            </div>
    
            <div class="secont_part">
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
            </div>
        </div>
        <hr>
        <div class="bottom-footer">
            <p>Copyright 2024 © tastyfoods.com - All Right Reserved</p>
        </div>
        
    </footer>

</body>

</html>