<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
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

        <div class="card">
            <div class="header">
                <h4>Shopping Bag total :
                    <span id="tot">
                        10.00
                    </span>$
                </h4>
            </div>
            <div class="product">
                <div>
                    <div class="op">
                        <span class="remove">X</span>
                        <i class="fas fa-heart"></i>
                    </div>
                </div>
                <div>

                    <?php
            
                    $product_id = $_GET['product_id'];
                    $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $product_price = $row['product_price'];
                        $product_image = $row['product_image'];
                        $product_description = $row['product_description'];
                        echo "
       
                    <img class='img' src='img/$product_image'>
                </div>
                <div class='disc'>
                    <div class='name'>$product_name</div>
            

                </div>
                
                <div>
                    <h4 class='price'>
                    $product_price$
                    </h4>
                    <h4 class='pu'>54</h4>

                </div>

            </div>
  
        </div>
        
    </div>       
        ";
                    }
                    ?>

    </body>