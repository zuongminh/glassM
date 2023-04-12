<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>GlassM</title>
</head>

<body>

<?php
include("connect.php");
?>


    <header>
    <?php
      session_start();
      if(isset($_SESSION['username'])){
        
        echo "<button class='session'>Welcome,{$_SESSION['username']}</button>";
      }
      ?>
        <div class="logo">
              <img id="logo" src="img/logo.png" onclick="location.reload();">
        </div>
        <nav class=" nav">
            <ul>
                <li><a href="#">about us</a></li>
                <div class="dropdown">
                    <li><a href="collections.php">Collection</a></li>
                    <div class="sub_dropdown">
                        <?php
                
                        // Fetch data from database
                        $sql = "SELECT * FROM collection";
                        $result = mysqli_query($connect, $sql);

                        // Create sub-dropdown list
                        while ($row = mysqli_fetch_assoc($result)) {
                            $collection_id = $row['collection_id'];
                            $collection_name = $row['collection_name'];
                            echo "<a href='product.php?collection_id=$collection_id'>$collection_name</a>
                            ";
                        }


                        ?>

                        
                    </div>
                </div>

                <li><a href="#">shop</a></li>
                <li><a href="#">service</a></li>
            </ul>
        </nav>

        <form class="search_form" action="search.php" method="get">
            <input type="text" placeholder="Search" name="search" data-validate="required">
        </form>
        <div class="icons">
            <a href='login.php'><i class="fas fa-user"></i></a>
            <i class="fas fa-shopping-bag"></i>
            <a href='setting.php'><i class="fa fa-cog"></i></a>
        </div>
        
    </header>

    <!-- Banner section -->
    <!-- About section -->
    <div class='content'>
    <img src="img/wall.jpg" >
    </div>

        <div class="product">
            <!-- A product item -->
            <img src="https://cdn.shopify.com/s/files/1/0448/3081/8454/files/RESIZE.webp?v=1669987184" >
        
    </div>


</body>

<footer>
    <div class="footer">
        <div class="footer_container">
            <div>
                <h3>Brand</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                </ul>
            </div>

            <div>
                <h3>Customer Service</h3>
                <ul>
                    <li><a href="#">Tax</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Exchanges/Returns</a></li>
                    <li><a href="#">Track Your Order</a></li>
                </ul>
            </div>


        </div>
    </div>
</footer>

</html>