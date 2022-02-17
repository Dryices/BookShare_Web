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
        <link href="assets/css/imagegallery.css" rel="stylesheet">
        
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
            


            <!-- ======= Services Section ======= -->
            <section class="services">
                <div class="container">

                    <div class="row">
                        <?php
                        include "db_helper.php";
                        $select = "select * from items_list WHERE id = $_GET[id]";
                        $conn = OpenCon();
                        $items = mysqli_query($conn, $select);
                        if (mysqli_num_rows($items) > 0) {
                            while ($rows = mysqli_fetch_array($items, MYSQLI_ASSOC)) {
                                ?>

                                <div class="col-xl-12" data-aos="fade-up" >
                                    <div class="icon-box icon-box-pink" >
                                        <img src="<?php echo $rows['image_path']; ?>" height="200" width="200" alt="image of item"/>
                                        <h1 class="title"><?php echo $rows['item_name']; ?></h1>
                                        <p class="description"><?php echo $rows['description']; ?></p>
                                        <p class="description">$<?php echo $rows['price']; ?></p>
                                       
                                    </div>

                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                    
                    
                    <div class="row" >
                            <div id="paypal-button-container-P-7YF52428BY641674SMIEMUWI" class="text-center"></div>
                            <script src="https://www.paypal.com/sdk/js?client-id=AebQTHYqSrLkzSBiQeRGNDnx5jxbhSpRGU5-4Ekvi_QLRErQZhD9hezg_MZdMYOoyBJOgo_lpT-wJLt1&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                            <script>
                              paypal.Buttons({
                                  style: {
                                      shape: 'pill',
                                      color: 'gold',
                                      layout: 'horizontal',
                                      label: 'subscribe'
                                  },
                                  createSubscription: function(data, actions) {
                                    return actions.subscription.create({
                                      /* Creates the subscription */
                                      plan_id: 'P-7YF52428BY641674SMIEMUWI'
                                    });
                                  },
                                  onApprove: function(data, actions) {
                                    alert(data.subscriptionID); // You can add optional success message for the subscriber here
                                  }
                              }).render('#paypal-button-container-P-7YF52428BY641674SMIEMUWI'); // Renders the PayPal button
                            </script>
                        </div>

                    
                    
                </div>

            </section><!-- End Services Section -->

            


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
