<?php

// Include the database configuration file  
include 'db_helper.php';
//Prompt user to log in
session_start();
while(!isset($_SESSION['username'])){ 
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Please log in to list an item');
    window.location.href='loginregister.php';
    </script>");
  exit();
}

$user = $_SESSION['user_id'];

$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "bookshare";
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error() );

if (isset($_FILES['file'])) {
        $targetDir = "itemImages";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $stmt = $conn->prepare("UPDATE user_accounts SET profile_picture = ? WHERE id = ?"); 
            $stmt->bind_param("ss", $fileName, $user);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
        } else {
            $fileName = "default.png";
            $stmt = $conn->prepare("UPDATE user_accounts SET profile_picture = ? WHERE id = ?"); 
            $stmt->bind_param("ss", $fileName, $user);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
        }
    }
    exit();

?>