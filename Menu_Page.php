<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu_page.css">
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
    <title>Menu Page</title>
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

    <div class="header"></div>
    <h2 class="page-header"><span>Tasty</span> Food Menu</h2>
    
    <!-- Food Type Navigation Bar -->
    <div class="bar1">
        <a href="Menu_Page.php?type=Rice">Rice</a>
        <a href="Menu_Page.php?type=Kottu">Kottu</a>
        <a href="Menu_Page.php?type=Pasta">Pasta</a>
        <a href="Menu_Page.php?type=Biriyani">Biriyani</a>
        <a href="Menu_Page.php?type=Drink">Drinks</a>
        <form action="Menu_Page.php" method="get">
            <input type="text" name="search" id="search" class="searchBar" placeholder="Search here...">
            <button type="submit" class="searchButton">Search</button>
        </form>
    </div>
    
    <!-- Content Section -->
    <div class="content">
        <?php
        $connect = mysqli_connect("localhost", "root", "", "tastyfooddb");
        if (!$connect) {
            die("Could not connect: " . mysqli_connect_error());
        }

        $search_query = isset($_GET['search']) ? $_GET['search'] : '';
        if ($search_query) {
            $foods_sql = "SELECT * FROM allfoods WHERE FoodName LIKE ?";
            $search_query = '%' . $search_query . '%';
            $stmt = mysqli_prepare($connect, $foods_sql);
            mysqli_stmt_bind_param($stmt, "s", $search_query);
        } else {
            $type = isset($_GET['type']) ? $_GET['type'] : 'Rice';
            $foods_sql = "SELECT * FROM allfoods WHERE Type = ?";
            $stmt = mysqli_prepare($connect, $foods_sql);
            mysqli_stmt_bind_param($stmt, "s", $type);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<div class="section">';
                echo '<h3>' . $row['FoodName'] . '</h3>';
                echo '<p>' . $row['Description'] . '</p>';
                echo '<h4>Rs. ' . $row['Price'] . '</h4>';
                echo '<div class="portions">';
                echo '<div class="portion" style="font-family:Poppins, sans-serif;">' . $row['Size'] . '</div>';
                echo '</div>';
        
                // Form to add the item to the cart
                echo '<form action="add_to_cart.php" method="POST">';
                echo '<input type="hidden" id="food_name" name="food_name" value="' . $row['FoodName'] . '">';
                echo '<input type="hidden" id="price" name="price" value="' . $row['Price'] . '">';
                echo '<button type="submit" class="addButton"></button>';
                echo '</form>';
        
                echo '</div>';
            }
        } else {
            echo '<p>No food items available for this category or search criteria.</p>';
        }

        mysqli_close($connect);
        ?>
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

    <script>
        function addToCart(foodName, price) {
        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                food_name: foodName,
                price: price
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Added to cart');
            } else {
                alert('Failed to add to cart');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}

    </script>
</body>
</html>
