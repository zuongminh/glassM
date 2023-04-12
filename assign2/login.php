<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="styles.css">
   <title>Login</title>
</head>

<body>


   <?php
   //Khởi động session
   session_start();
   //B1
   
   $connect = mysqli_connect("localhost", "root", "", "vuatrochoi");
   if ($connect) {
      echo "  ";
   } else {
      echo "Who r you ?";
   }

   if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
      //B3: Thực thi truy vấn
      $result = mysqli_query($connect, $sql);
      //B4: Nhận kết quả truy vấn và xử lý
      $count_rows = mysqli_num_rows($result);
      if ($count_rows == 0) {
         echo "<script>alert('Sai tên người dùng hoặc mật khẩu') </script>";
      } else {
         echo "<script>window.open('index.php','_self')</script>";
         $_SESSION['username'] = $username;
      }
   }

   ?>

   <form method="POST" action="">
      <section>
         <h2 class="title">Login</h2>

         <label for="username">username or email</label>
         <input type="text" id="username" name="username">
         <label for="password">password</label>
         <input type="password" id="password" name="password">
         <button type="submit" name="login">login</button>
         <div>
            <a href="#" target="_blank" rel="noopener">forgot password</a>

            <a href="signup.php">sign up</a>
         </div>


      </section>
   </form>




</body>

</html>