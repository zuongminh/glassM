<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="styles.css">
   <title>Sign Up</title>
</head>

<body>

   <?php
   include("connect.php");
   ?>

   <?php

   if (isset($_POST['register'])) {

      $fullname = $_POST['fullname'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $sql = "INSERT INTO  users values(null,'$username','$password','$fullname')";
      //B3: Thực thi truy vấn
      $result = mysqli_query($connect, $sql);
      //B4: Nhận kết quả truy vấn và xử lý
   
      if ($result) {
         
         echo "<script>alert('Welcome to GlassM family')</script>
         <script>window.open('index.php','_self')</script>";
      } else {
         echo " The system is broken, please try later";
      }
   }

   ?>

   <form method="POST" action="">
      <section>
         <h2 class="title">Sign up</h2>

         <label for="fullname">full name</label>
         <input type="text" id="fullname" name="fullname">

         <label for="username">username or email</label>
         <input type="text" id="username" name="username">

         <label for="password">password</label>
         <input type="password" id="password" name="password">

         <button type="submit" name="register">Sign Up</button>
         <div>
            <a href="login.php" >Already have an account?</a>
         </div>


      </section>
   </form>




</body>

</html>