<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BookShare-Blog</title>
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

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>

          <ol>
             <li><a class="" href="index.php">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog d-flex justify-content-center">
      <div class="row container" data-aos="fade-up">
          <div class="col-lg-8">
              <div class="entries">
                  <form action="listPost.php" >
        <input type="submit" class="btn btn-primary" value="Add post">
    </form>
            <?php
            include "db_helper.php";
            echo "<div class='container'>";
            $select = "select * from forum";
            $conn = OpenCon();
            $posts = mysqli_query($conn, $select);
            if(mysqli_num_rows($posts) > 0){
                while($rows = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
                    echo$uniqueid=$rows['id'];?>
            <article class="entry">


              <h2 class="entry-title">
                <a href="blog-single.html"><?php echo $rows['title']; ?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><a href="blog-single.html"><i class="bi bi-person"></i><?php echo $rows['username']; ?></a></li>
                  <li class="d-flex align-items-center"><a href="blog-single.html"><i class="bi bi-clock"></i><a href="blog-single.html"><time datetime="2020-01-01"><?php echo $rows['timestamp']; ?></time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p><?php echo $rows['content']; ?></p>
                <div class="read-more">
                  <?php echo "<a href='forumComments.php?id=".$rows['id']."'>Reply</a>" ; ?>
                </div>
              </div>
               

            </article><!-- End blog entry -->
            <?php } } ?>
            </div>
          </div><!-- End blog entries list -->
          </div>
          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form name="searchPost" id="searchPost" action="index.php" method="post">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

             
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <?php include 'footer.php';?>

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