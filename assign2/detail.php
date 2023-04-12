<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="details.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel=“stylesheet” href=“https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css”>
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
        if (isset($_SESSION['username'])) {

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
            <a href='cart.php'><i class="fas fa-shopping-bag"></i></a>

        </div>
    </header>

    <body>
        <div class="container">


            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE product_id = '$id'";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];
                $product_description = $row['product_description'];
                echo "
       
                <div class='product'>
                <div class='product-image'>           
                <img src='img/$product_image' />
                </div>
                <div class='product-info'> 
                <h3  class='product-name'>$product_name</h3>
                <p class='product-price'>$ $product_price</p>
                <p class='product-description'>$product_description</p>
                <div class='ic'>
                <i class='fa fa-truck'></i>  
                <h4>Free Shipping Over $69.00.</h4>
                <i class='fa fa-globe'></i> 
                <h4>7 Day Money Back Guarentee.</h4>
                </div>
                <a  href='cart.php?product_id=$product_id' class='product-button'>Add to cart</a>

              
                        
                </div>
                </div>       
                ";
            }
            ?>


            <?php
            
            $status="";
            if (isset($_POST['product_id']) && $_POST['product_id']!=""){
            $product_id = $_POST['product_id'];
            $result = mysqli_query($con,"SELECT * FROM `products` WHERE `product_id`='$product_id'");
            while ($row = mysqli_fetch_assoc($result)) {

                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_price = $row['product_price'];
                $product_image = $row['product_image'];
                $product_description = $row['product_description'];
                

            $cartArray = array(
            $name=>array(
            'product_id'=>$product_id,
            'product_name'=>$product_name,
            'product_price'=>$price,
            'quantity'=>1,
            'product_image'=>$product_image)
            );

            if(empty($_SESSION["shopping_cart"])) {
            $_SESSION["shopping_cart"] = $cartArray;
            $status = "<div class='box'>Product is added to your cart!</div>";
            }else{
            $array_keys = array_keys($_SESSION["shopping_cart"]);
            if(in_array($code,$array_keys)) {
            $status = "<div class='box' style='color:red;'>
                Product is already added to your cart!</div>";
            } else {
            $_SESSION["shopping_cart"] = array_merge(
            $_SESSION["shopping_cart"],
            $cartArray
            );
            $status = "<div class='box'>Product is added to your cart!</div>";
            }

            }
            }}
            
            ?>




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