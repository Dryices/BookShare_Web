<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Login/Register</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/loginregister.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body >
    
     <?php include "header.php";
?>
    
  <div class="containers" >
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/img/loginregister/books.png" alt="">
        <div class="text">
          <span class="text-1"> “Nature is painting for us, day after day, pictures of infinite beauty.”<br>-John Ruskin</span>
          <span class="text-2"><br>Let's play our part by reusing books and school materials!</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="assets/img/loginregister/trees.png" alt="">
        <div class="text">
          <span class="text-1">Resell your used books and school materials!</span>
          <span class="text-2">Let's get started!</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="login_process.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sign Up now</label></div>
            </div>
        </form>
            <?php
            if (isset($_GET['loginerror']))
            {
                $loginerror = $_GET['loginerror'];
                echo "<p>Please fill in your " . $loginerror . "</p>";
            }
            if (isset($_GET['loginerror1']))
            {
                $loginerror1 = $_GET['loginerror1'];
                echo "<p>Please fill in your " . $loginerror1 . "</p>";
            }
            ?>
      </div>
        <div class="signup-form">
          <div class="title">Sign Up</div>
          <form action="connect.php" method='post'>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" id='username' name="username" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" id='email' name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id='password' name="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" id='submit' name="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
