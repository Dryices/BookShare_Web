<?php session_start();?>
<!-- Link this header file to all pages -->
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-dark">
<div class="container d-flex justify-content-between align-items-center">

<div class="logo">
<h1 class="text-light"><a href="index.php"><span>BookShare</span></a></h1>
<!-- Uncomment below if you prefer to use an image logo -->
<!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
</div>

<nav id="navbar" class="navbar">
    <ul>
        
         
        <li style="color: white; font-weight: bold"><?php
            if (isset($_SESSION['username'])) {
                echo "<a href=userListings.php>" . $_SESSION['username'] . "</a>";
            } else {
                //currently this is being printed out so there must be something were doing wrong with the sessions
                echo "<div>Not Logged In</div>";
            }
            ?>
        </li>
        <li><a href="index.php">Home</a></li>
        <li><a href="listitem.php">List Item</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li class="dropdown"><a href="#"><span>Resources</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="team.php">Team</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </li>
        <li><a href="loginregister.php">Login/Register</a></li>
        <li><a href="logout_process.php">Logout</a></li>
    </ul>
<i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

</div>
</header><!-- End Header -->