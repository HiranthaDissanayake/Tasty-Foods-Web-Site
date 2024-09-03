<?php
    $connect = mysqli_connect('localhost','root','','tastyfooddb');
    if(!$connect){
        die('Could not connect: '. mysqli_connect_error());
    }

    if(isset($_POST['name']) && isset($_POST['comment'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO userreviews (userName,userComment) VALUES ('$name','$comment')";

        if(mysqli_query($connect,$sql)){
            echo "<script>alert('Thank You For Your Review');</script>";

            echo "<script>window.location.href='Reviews_Page.php';</script>";
            exit(); 
        }else{
            echo "Error: ".$sql."<br>".mysqli_error($connect);
        }

    }

    // Fetch all reviews from the database
    $reviews_sql = "SELECT * FROM userreviews";
    $result = mysqli_query($connect, $reviews_sql);
    $reviews = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $reviews[] = $row;
        }
    }

    mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="reviews_page.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kavoon&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
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

    <h2 class="heading">Customer Reviews</h2>

    <div class="slideshow-container">
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
            <div class="Slide-container">
                <div class="slide-content">
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-content">
                                <h2 class="name"><?php echo htmlspecialchars($review['userName']); ?></h2>
                                <p class="description"><?php echo htmlspecialchars($review['userComment']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: white;text-align: center;font-size: 3vh;font-family: Poppins, sans-serif;">No reviews yet. Be the first to leave a review!</p>
        <?php endif; ?>

        <!-- Navigation buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    

    <div class="add-review">
        <h4>Add your reviews here</h4>
        <form action="Reviews_Page.php" method="post">
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            <textarea  id="comment" name="comment" placeholder="your comment" required></textarea><br>
            <button type="submit">Submit</button>
        </form> 
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31687.082218480275!2d79.94478957841486!3d6.9043202062227245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256d59601df81%3A0x31a1dd96e8d49ba!2sMalabe!5e0!3m2!1sen!2slk!4v1724070619832!5m2!1sen!2slk" width="600" height="450"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <hr>
        <div class="bottom-footer">
            <p>Copyright 2024 © tastyfoods.com - All Right Reserved</p>
        </div>
        
    </footer>

    <script src="ReviewPageJs.js"></script>
</body>
</html>