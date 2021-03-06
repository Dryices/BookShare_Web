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

$username = $_SESSION['username'];
 
// If file upload form is submitted  
if(isset($_POST["submit"])){ 
    $dbc = OpenCon();
    mysqli_set_charset($dbc, 'utf8');
    $errors = array(); 
    
    if(empty($_POST["itemName"]))
    {
        $errors[] = 'noitemname.';
    }
    else
    {
        $item_name = mysqli_real_escape_string($dbc, trim($_POST['itemName']));
    }
    
    if(empty($_POST["description"]))
    {
        $errors[] = 'nodescription.';
    }
    else
    {
        $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    }
    //i dunno if we want the description to be compulsory
    //$description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    
    if(empty($_POST["price"]))
    {
        $errors[] = 'noprice';
    }
    else
    {
        $price = mysqli_real_escape_string($dbc, trim($_POST['price']));
    }
    
    if(isset($_FILES["imageToUpload"])) { 
        // Get file info 
        $fileName = basename($_FILES["imageToUpload"]["name"]); 
        //set directory to store image in
        $target_dir = "itemImages/";
        $target_file = $target_dir . $fileName;
        
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION); 
        
        //stores image in images/items/ folder i think cannot test until have the ui i think
        //then stores the file path as a string in sql database later
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) 
        {
            echo "The file ". $fileName . " has been uploaded.";
        } 
        else 
        {
            $errors[] = "fileuploaderror";
        }
        // Allow certain file formats 
        /*
        //thiss one is get the image in bytes(i think) then store in sql database as blob
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); //the thing to upload
        }else{ 
            $errors[] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        }
        */
    }else{ 
        $errors[] = 'Please select an image file to upload.'; 
    }
}

if (empty($errors))
{
    // Insert image path into database 
    $r = insertItem($item_name, $description, $price, $target_file, $username, $dbc);
    
    if ($r)
    {
        CloseCon($dbc);
        header ("Location: listitem.php?status=success");
        exit();
    }
    else
    {
	// Debugging message:
        CloseCon($dbc);
	header ("Location: listitem.php?status=fail");
        exit();
    }
}
else 
{
    $headerMsg = "Location: listitem.php?";
    $i = 0;
    
    while (i < sizeof($errors))
    {
        if ($i == 0)
        {
            $headerMsg = $headerMsg . "error" . $i . "=" . $errors[$i];
        }
        else if ($i > 0)
        {
            $headerMsg = $headerMsg . "&error" . $i . "=" . $errors[$i];
        }
        $i++;
    }
    CloseCon($dbc);
    header($headerMsg);
    exit();
}
             
/*if($r){
    $statusMsg = "File uploaded successfully.";
}else{
    $statusMsg = "File upload failed, please try again.";
}*/

// Display status message. 
//echo $statusMsg;

?>