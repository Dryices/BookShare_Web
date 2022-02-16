<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BookShare-Contact</title>
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

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>List item</h2>
          <ol>
             <li><a class="" href="index.php">Home</a></li>
            <li>List item</li>
          </ol>
        </div>

      </div>
    </section><!-- End Contact Section -->
     <div class="col-md-6 offset-md-3 mt-5">
        <form accept-charset="UTF-8" action="uploadItem.php" method="post" target="_blank" enctype="multipart/form-data">
          <div class="formdrop">
            <label for="itemName">Item name</label>
            <input type="text" name="itemName" id="itemName" class="form-control" placeholder="Enter listing name" required="required">
          </div>
            <br>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="0" name="price"  id="price"  class="form-control" placeholder="Enter listing price" required="required">
          </div>
            <br>
             <div class="form-group mt-3">
                 <label for="itemDescription">Item description</label>
                <textarea type="text" class="form-control" name="description" id="description" rows="5" placeholder="Enter a brief description of the item" required="required"></textarea>
              </div>
          <br>
          <div class="form-group mt-3">
            <label class="mr-2">Upload an image:</label>
            <input type="file" accept="image/*" onchange="loadFile(event)" name="imageToUpload" id="imageToUpload">
           <div>
            <img id="output"/>
           </div>
            
          </div>
          <br>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
          <br>
        </form>
         
         <br>
    </div> 
    

  

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

  <!-- Template Main JS File. -->
  <script src="assets/js/main.js"></script>
  <!-- For image preview-->
  <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

</body>
</html>