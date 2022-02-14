<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>BookShare-Homepage</title>
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
<style>
body {
  font-family: Arial;
  margin: 0;
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>

</head>

<body>
    
<?php include "header.php";
?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">
<div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

<!-- Slide 1 -->
<div class="carousel-item active">
<div class="carousel-container">
<h2 class="animate__animated animate__fadeInDown">Welcome to <span>BookShare</span></h2>
<p class="animate__animated animate__fadeInUp">Most students in Singapore use assessment books, course notes or online resources for use in their learning in their educations. <br></p>
<a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
</div>
</div>

<!-- Slide 2 -->
<div class="carousel-item">
<div class="carousel-container">
<h2 class="animate__animated animate__fadeInDown">The Issue</h2>
<p class="animate__animated animate__fadeInUp">Currently pre- and post-secondary institution continue using physical books and notes.<br>
    The problem is once students finish using these books or notes, they will mostly likely be collecting dust at home while some will be sold or donated to their friends who need it.</p>
<a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
</div>
</div>

<!-- Slide 3 -->
<div class="carousel-item">
<div class="carousel-container">
<h2 class="animate__animated animate__fadeInDown">Our goal</h2>
<p class="animate__animated animate__fadeInUp">  Our platform aim is to reduce paper waste and promote the idea of sharing school materials through selling or donating!</p>
<a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
</div>
</div>

<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
<span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
</a>

<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
<span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
</a>

</div>
</section><!-- End Hero -->

<main id="main">
 <?php
            include "db_helper.php";
  
            $select = "select * from items_list"; ?>   
  
    <div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="form"> 
                <i class="fa fa-search"></i> <form class="d-flex justify-content-center" action="index.php" method="post">
                <input name="search" id="search" type="text" class="form-control form-input" placeholder="Search anything...">
                <input type="submit" class="btn btn-primary" value="Search">
                </form>
                <span class="left-pan"><i class="fa fa-microphone"></i></span> 
            </div>
        </div>
    </div>
</div>

<!-- ======= Services Section ======= -->
<section class="services">
<div class="container">

<div class="row">
     <?php
     if(isset($_POST['search'])) {
         $search=$_POST['search'];
         $select="SELECT * FROM `items_list` WHERE item_name LIKE '%". $search ."%' OR description LIKE '%". $search ."%'";
     }
            $conn = OpenCon();
            $items = mysqli_query($conn, $select);
            if(mysqli_num_rows($items) > 0){
                while($rows = mysqli_fetch_array($items, MYSQLI_ASSOC)){ ?>
    
    <div class="col-lg-3" data-aos="fade-up">
    <div class="icon-box icon-box-pink">
    <div class="icon"><i class="bx bxl-dribbble"></i></div>
    <h4 class="title"><?php echo $rows['item_name']; ?></h4>
    <p class="description"><?php echo $rows['description']; ?></p>
    <p class="description">$<?php echo $rows['price']; ?></p>
    </div>
    </div>
            <?php }} ?>

    <!-- Container for the image gallery -->
    <div class="container">

        <!-- Full-width images with number text -->
        <div class="mySlides">
            <div class="numbertext">1 / 6</div>
            <img src="assets\img\Type of books\img_woods_wide.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 6</div>
            <img src="assets\img\Type of books\img_5terre_wide.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 6</div>
            <img src="assets\img\Type of books\img_mountains_wide.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 6</div>
            <img src="assets\img\Type of books\img_lights_wide.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">5 / 6</div>
            <img src="assets\img\Type of books\img_nature_wide.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">6 / 6</div>
            <img src="assets\img\Type of books\img_snow_wide.jpg" style="width:100%">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <!-- Image text -->
        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <!-- Thumbnail images -->
        <div class="row">
            <div class="column">
                <img class="demo cursor" src="assets\img\Type of books\img_woods.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
            </div>
            <div class="column">
                <img class="demo cursor" src="assets\img\Type of books\img_5terre.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
            </div>
            <div class="column">
                <img class="demo cursor" src="assets\img\Type of books\img_mountains.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
            </div>
            <div class="column">
                <img class="demo cursor" src="assets\img\Type of books\img_lights.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
            </div>
            <div class="column">
                <img class="demo cursor" src="assets\img\Type of books\img_nature.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
            </div>
            <div class="column">
                <img class="demo cursor" src="assets\img\Type of books\img_snow.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
            </div>
        </div>
    </div>
    <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
    </script>


</div>

</div>

</section><!-- End Services Section -->

<!-- ======= Why Us Section ======= -->
<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
<div class="container">

<div class="row">
<div class="col-lg-6 video-box">
    <br>
<iframe width="560" height="315" src="https://www.youtube.com/embed/xThlceHTduw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>
<br>
</div>

<div class="col-lg-6 d-flex flex-column justify-content-center p-5">

<div class="icon-box">
<div class="icon"><i class="bx bx-fingerprint"></i></div>
<h4 class="title"><a href="">Save trees!</a></h4>
<p class="description">Since the beginning, trees have furnished us with two of life’s essentials, food and oxygen. As we evolved, they provided additional necessities such as shelter, medicine, and tools. Today, their value continues to increase and more benefits of trees are being discovered as their role expands to satisfy the needs created by our modern lifestyles.</p>
</div>

<div class="icon-box">
<div class="icon"><i class="bx bx-gift"></i></div>
<h4 class="title"><a href="">Why?</a></h4>
<p class="description">Trees have supported and sustained life throughout our existence. They have a wide variety of practical and commercial uses. Wood was the very first fuel, and is still used for cooking and heating by about half of the world’s population. Trees provide timber for building construction, furniture manufacture, tools, sporting equipment, and thousands of household items. Wood pulp is used to make paper.</p>
</div>

</div>
</div>

</div>
</section><!-- End Why Us Section -->



</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

<div class="footer-newsletter">
<div class="container">
<div class="row">
<div class="col-lg-6">
<h4>Our Newsletter</h4>
<p>Get the latest news about our BookShare platform</p>
</div>
<div class="col-lg-6">
<form action="" method="post">
<input type="email" name="email"><input type="submit" value="Subscribe">
</form>
</div>
</div>
</div>
</div>

<div class="footer-top">
<div class="container">
<div class="row">

<div class="col-lg-3 col-md-6 footer-links" href="index.php">
<h4>Useful Links</h4>
<ul>
<li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="forum.php">Forum</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="team.php">Team</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="about.php">About Us</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact us</a></li>
</ul>
</div>

<div class="col-lg-3 col-md-6 footer-links">
<h4>Our Services</h4>
<ul>
<li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
<li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
</ul>
</div>

<div class="col-lg-3 col-md-6 footer-contact">
<h4>Contact Us</h4>
<p>
             Singapore Polytechnic <br>
             500 Dover Rd, <br>
             Singapore 139651 <br><br>
<strong>Phone:</strong> +65 91452848<br>
<strong>Email:</strong> bookshare_info@gmail.com<br>
</p>

</div>

<div class="col-lg-3 col-md-6 footer-info">
<h3>About BookShare</h3>
<p> Our platform aim is to reduce paper waste and promote the idea of sharing school materials through selling or donating!</p>
<div class="social-links mt-3">
<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
</div>
</div>

</div>
</div>
</div>

<div class="container">
<div class="copyright">
        &copy; Copyright <strong><span>BookShare</span></strong>. All Rights Reserved
</div>
<div class="credits">
<!-- All the links in the footer should remain intact. -->
<!-- You can delete the links only if you purchased the pro version. -->
<!-- Licensing information: https://bootstrapmade.com/license/ -->
<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
</div>
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
