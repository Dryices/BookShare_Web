<?php

// Include the database configuration file  
include 'db_helper.php';
 
// If file upload form is submitted  
if(isset($_POST["submit"])){ 
    $dbc = OpenCon();
    mysqli_set_charset($dbc, 'utf8');
    $errors = array(); 
    
    if(empty($_POST["itemName"]))
    {
        $errors[] = 'Please input item name.';
    }
    else
    {
        $itemName = mysqli_real_escape_string($dbc, trim($_POST['itemName']));
    }
    
    /*if(empty($_POST["description"]))
    {
        $errors[] = 'Please input description.';
    }
    else
    {
        $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    }*/
    //i dunno if we want the description to be compulsory
    $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    
    if(empty($_POST["price"]))
    {
        $errors[] = 'Please select a price';
    }
    else
    {
        $price = mysqli_real_escape_string($dbc, trim($_POST['price']));
    }
    
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); //the thing to upload
        }else{ 
            $errors[] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $errors[] = 'Please select an image file to upload.'; 
    }
}

if (empty(errors))
{
    // Insert image content into database 
    $r = insertItem($itemName, $description, $price, $imageContent, $dbc);
    
    if ($r)
    {
        echo 'Item added successfully!';
    }
    else
    {
        // If it did not run OK.
        // Public message:
	echo '<h1>System Error</h1>
	<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
	// Debugging message:
	echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
    }
    
    
}
             
if($r){
    $statusMsg = "File uploaded successfully.";
}else{
    $statusMsg = "File upload failed, please try again.";
}

CloseCon($dbc);
// Display status message 
echo $statusMsg;
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

