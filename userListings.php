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

        <main id="main">
            <!-- ======= Blog Section ======= -->
            <section class="breadcrumbs">
                <div class="container">

                    <div class="d-flex justify-content-between align-items-center">
                        <h2>My listings</h2>

                        <ol>
                            <li><a class="" href="index.php">Home</a></li>
                            <li>My listings</li>
                        </ol>
                    </div>

                </div>
            </section><!-- End Blog Section -->
            <?php
            include "db_helper.php";

            $select = "select * from items_list";
            ?>   
            
            <!-- profile picture -->
            <div class="text-center">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="profilepic.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="500" height="500" class="rounded-circle">
                </a>
            </li>  
            </div>

            <div class="container">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <div class="form"> 
                            <i class="fa fa-search"></i> <form class="d-flex justify-content-center" action="index.php" method="post">
                                <input name="search" type="text" class="form-control form-input" placeholder="Search anything...">
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
                        if (isset($_POST['search'])) {
                            $search = $_POST['search'];
                            $select = "SELECT * FROM `items_list` WHERE item_name LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%'";
                        }
                        $conn = OpenCon();
                        $items = mysqli_query($conn, $select);
                        if (mysqli_num_rows($items) > 0) {
                            while ($rows = mysqli_fetch_array($items, MYSQLI_ASSOC)) {
                                ?>

                                <div class="col-lg-3" data-aos="fade-up">
                                    <div class="icon-box icon-box-pink">
                                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                        <h4 class="title"><?php echo $rows['item_name']; ?></h4>
                                        <p class="description"><?php echo $rows['description']; ?></p>
                                        <p class="description">$<?php echo $rows['price']; ?></p>
                                    </div>
                                </div>
    <?php }
} ?>

                    </div>

                </div>

            </section><!-- End Services Section -->



        </main><!-- End #main -->

<?php include 'footer.php'; ?>

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
