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
    <form class="d-flex justify-content-center" action="index.php" method="post">
        <input name="search" type="text" class="d-flex justify-content-center" placeholder="Search">
        <input type="submit" class="btn btn-primary" value="Search">
    </form>

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
<h4 class="title"><a href="">Lorem Ipsum</a></h4>
<p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
</div>

<div class="icon-box">
<div class="icon"><i class="bx bx-gift"></i></div>
<h4 class="title"><a href="">Nemo Enim</a></h4>
<p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
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
