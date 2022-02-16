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
            <?php
            include "db_helper.php";

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

                                <div class="col-lg-3" data-aos="fade-up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <div class="icon-box icon-box-pink" >
                                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                        <img src="<?php echo $rows['image_path']; ?>" alt="stupidyiquan"/>
                                        <h4 class="title"><?php echo $rows['item_name']; ?></h4>
                                        <p class="description"><?php echo $rows['description']; ?></p>
                                        <p class="description">$<?php echo $rows['price']; ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>

                        <!-- Container for the image gallery --> <!<!-- testing new gallery -->
                        
                        <div class="container">
                            <div class="mySlides">
                                <div class="numbertext" >1 / 6</div>
                                <img src="assets\img\Type of books\img_woods_wide.jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="assets\img\Type of books\img_woods.jpg">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">2 / 6</div>
                                <img src="assets\img\Type of books\img_5terre_wide.jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="assets\img\Type of books\img_5terre.jpg">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">3 / 6</div>
                                <img src="assets\img\Type of books\img_mountains_wide.jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="assets\img\Type of books\img_mountains.jpg">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">4 / 6</div>
                                <img src="assets\img\Type of books\img_lights_wide.jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="assets\img\Type of books\img_lights.jpg">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">5 / 6</div>
                                <img src="assets\img\Type of books\img_nature_wide.jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="assets\img\Type of books\img_nature.jpg">
                            </div>

                            <div class="mySlides">
                                <div class="numbertext">6 / 6</div>
                                <img src="assets\img\Type of books\img_snow_wide.jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="assets\img\Type of books\img_snow.jpg">
                            </div>

                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>

                            <div class="caption-container">
                                <p id="caption"></p>
                            </div>
                            <br>
                            <br>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <!--<img id="correspondingimg" alt="alt"/>-->
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

                  <h4 class="title"><?php echo $rows['item_name']; ?></h4>
                  <p class="description"><?php echo $rows['description']; ?></p>
                  <p class="description">$<?php echo $rows['price']; ?></p>
              </div>
              <?php
          }
      }
      ?>

        <div class="col-md-12 text-center"> <!--<!-- paypayl is inside -->
            <div id="paypal-button-container-P-7YF52428BY641674SMIEMUWI"></div>
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
      <div class="modal-footer">

          <div class="col-md-12 text-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
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

var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body img')
  //getElementById(correspondingimg)

  modalTitle.textContent = 'New message to ' + recipient
  modalBodyInput.src =  recipient
})
                        </script>

    </body>

</html>
