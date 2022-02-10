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
        $item_name = mysqli_real_escape_string($dbc, trim($_POST['itemName']));
    }
    if(empty($_POST["type"]))
    {
        $errors[] = 'Please input item type.';
    }
    else
    {
        $item_name = mysqli_real_escape_string($dbc, trim($_POST['itemName']));
    }
    if(empty($_POST["category"]))
    {
        $errors[] = 'Please input item category.';
    }
    else
    {
        $item_name = mysqli_real_escape_string($dbc, trim($_POST['itemName']));
    }
    
    if(empty($_POST["description"]))
    {
        $errors[] = 'Please input item description.';
    }
    else
    {
        $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    }
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
    
    if(!empty($_FILES["imageToUpload"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["imageToUpload"]["name"]); 
        //set directory to store image in
        $target_dir = "itemImages/";
        $target_file = $target_dir . $fileName;
        
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION); 
        
        //stores image in images/items/ folder i think cannot test until have the ui i think
        //then stores the file path as a string in sql database later
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_dir)) 
        {
            echo "The file ". $fileName . " has been uploaded.";
        } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
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
    $r = insertItem($item_name, $item_type, $item_category, $description, $price, $target_file, $dbc);
    
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
else 
{
    foreach ($errors as $value)
    {
        echo $value;
    }
}
             
/*if($r){
    $statusMsg = "File uploaded successfully.";
}else{
    $statusMsg = "File upload failed, please try again.";
}*/

CloseCon($dbc);
// Display status message 
//echo $statusMsg;

