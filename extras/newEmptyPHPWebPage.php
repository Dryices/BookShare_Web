<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forum</title>
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include "db_helper.php";
        echo "<div class='container'>";
        $select = "select * from forum";
        $conn = OpenCon();
        $posts = mysqli_query($conn, $select);
        if(mysqli_num_rows($posts) > 0){
            while($rows = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
                $username = $rows[username];
                echo "<div class='border'>";
                echo "<h3 class=''>". $username."</h3>";
                echo "<p>".$rows[timestamp]."</p>";
                echo "<p>".$rows[content]."</p>";
            }
        }else{
            echo "<p>No Posts Yet</p>";
        }
        echo "</div>";
        ?>
    </body>
</html>
