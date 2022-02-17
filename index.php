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
        
        
        
     <section id="blog" class="blog d-flex justify-content-center">
   
               
                  <br>
            <?php
            include "db_helper.php";
            echo "<div class='container'>";
            $image = "select * from announcements order by RAND() LIMIT 1";
             $conn = OpenCon();
            $posts = mysqli_query($conn, $image);
            if(mysqli_num_rows($posts) > 0){
                $i = 0;
                while($rows = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
                    ?>
                    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
                        <div class="container">
<div class="text-center">
                     <img src="<?php echo $rows['imagepath']; ?>" height="200" width="200" alt="image of item"/>
                     <p>Sell your books at a low price!</p>
</div></div>
                    </section>           
                  <?php }
              } ?>
         
    </section><!-- End Blog Section -->

            


        <main id="main">
            <?php
           

            $select = "select * from items_list";
            ?>   

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
                        if (isset($_POST['search'])) {
                            $search = $_POST['search'];
                            $select = "SELECT * FROM `items_list` WHERE item_name LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%'";
                        }
                        $conn = OpenCon();
                        $items = mysqli_query($conn, $select);
                        if (mysqli_num_rows($items) > 0) {
                            while ($rows = mysqli_fetch_array($items, MYSQLI_ASSOC)) {
                                ?>

                                <div class="col-lg-3" data-aos="fade-up" >
                                        <div class="icon-box icon-box-pink" >
                                        <img src="<?php echo $rows['image_path']; ?>" height="200" width="200" alt="image of item"/>
                                        <h4 class="title"><?php echo $rows['username']; ?></h4>
                                        <h3 class="title"><?php echo $rows['item_name']; ?></h3>
                                        <p class="description"><?php echo $rows['description']; ?></p>
                                        <p class="description">$<?php echo $rows['price']; ?></p>
                                        <?php echo "<a href='bookdetail.php?id=".$rows['id']."'>Details</a>" ; ?>
                                    </div>
                                    
                                </div>
                            <?php
                            }
                        }
                        ?>

</div>
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
