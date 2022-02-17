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

$userid = $_SESSION['user_id'];

if (isset($_FILES['file'])) {
    $conn = OpenCon();
    $errors = array();
    
        $targetDir = "profilepics/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $r = setProfilePic($targetFilePath, $userid, $conn);
            
            if ($r)
            {
                header("Location: userListings.php?status=$userid");
                CloseCon($conn);
                exit();
            }
            else
            {
                header("Location: userListings.php?status=fail");
                CloseCon($conn);
                exit();
            }
        } else {
            $r = setProfilePic("default.png", $userid, $dbc);
            
            if ($r)
            {
                header("Location: userListings.php?status=fail&pic=default");
                CloseCon($conn);
                exit();
            }
            else
            {
                header("Location: userListings.php?status=fail&pic=fail");
                CloseCon($conn);
                exit();
            }
        }
    }
    else
    {
        header ("Location: userListings.php");
        exit();
    }

?>