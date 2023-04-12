<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
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
            <a href="index.php">
                <img id="logo" src="img/logo.png" alt="Logo">
            </a>
        </div>
        <nav class=" nav">
            <ul>
                <li><a href="#">about us</a></li>
                <div class="dropdown">
                    <li><a href="#">Collection</a></li>
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

        </div>
    </header>


    <div class="content">
        <!-- Body that contains list and picture of products and their prices -->

        <div class="grid">


            <?php

            $sql = "select * from products";
            //B3: Thực thi truy vấn
            $result = mysqli_query($connect, $sql);
            //Đưa kết quả vào mảng liên kết
            
            while ($row_product = mysqli_fetch_array($result)) {
                //Hiển thị lần lượt từng sản phẩm
                $product_id = $row_product['product_id'];
                $product_name = $row_product['product_name'];
                $product_price = $row_product['product_price'];
                $product_image = $row_product['product_image'];
                echo "

       <div class='product'>
       <a href='detail.php?id=$product_id'><img src='img/$product_image' /> </a>
       <div class='product-info'> 
       <h3>$product_name</h3>
       <p>$ $product_price</p>

       </div>
       </div>       
       ";

            }
            ?>
        </div>
    </div>





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