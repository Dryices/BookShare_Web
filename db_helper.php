<?php

//-----------HOW TO USE-------------
//jus copy the line right below this and u can call the functions
//include 'db_helper.php';

//then u can use the functions by calling normally 
//e.g. 
//
//$connection = OpenCon();
//mysqli_set_charset($connection, 'utf8');
//
//...do whatever u want...
//
//CloseCon(); //to close the connection

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "bookshare";
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die('Could not connect to MySQL: ' . mysqli_connect_error() );
 
 return $conn;
 }
 
function CloseCon($conn)
{
    mysqli_close($conn);
}

//to use this u make an array with the conditions u want stored as a string inside
//e.g. $conditionArray = array("item_name = 'PEEE Coursebook'", "price = 2", "description = 'stupid'");
function getGroupOfItemsAND ($conditionArray, $table, $dbc)
{
    $q = "SELECT * FROM " . $table . " WHERE ";
    $i = 0;
    
    while($i < sizeof($conditionArray))
    {
        if ($i == 0)
        {
            $q = $q . $conditionArray[$i];
        }
        else if ($i > 0)
        {
            $q = $q . " && " . $conditionArray[$i];
        }
        $i++;
    }
    
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

function getGroupOfItemsOR ($conditionArray, $dbc)
{
    $q = "SELECT * FROM " . $table . " WHERE ";
    $i = 0;
    
    while($i < sizeof($conditionArray))
    {
        if ($i == 0)
        {
            $q = $q . $conditionArray[$i];
        }
        else if ($i > 0)
        {
            $q = $q . " || " . $conditionArray[$i];
        }
        $i++;
    }
    
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

//-----------------------announcements functions---------------------------

function insertAnnouncement($imagepath, $dbc)
{
    $q = "INSERT INTO announcements (imagepath) VALUES ('$imagepath')";
    
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

function getAnnouncements($dbc)
{
    $q = "SELECT * FROM announcements";
    
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

//make a function to print or return all results individually i guess
 
//--------------------user_accounts functions------------------------

function insertAcc($username, $email, $password, $dbc)
{
    $q = "INSERT INTO user_accounts (username,email,password) VALUES ('$username', '$email', SHA1('$password'))";	
    $r = @mysqli_query ($dbc, $q);
    
    return $r;
}

//getting acc from login input
function getAcc ($email, $password, $dbc)
{
    $q = "SELECT * FROM user_accounts WHERE email = '$email' && password = SHA1('$password')";
    $r = @mysqli_query ($dbc, $q);
    
    return $r;
    //if mysql_num_rows($r) == 0 then either password or email wrong or the person dun have an acc
}

//can use this and the email one to see if there are any repeats or if the registering person is 
//using an email or username thats alrd used by someone else
function getAccFromUsername ($username, $dbc)
{
    $q = "SELECT * FROM user_accounts WHERE username = '$username'";
    $r = @mysqli_query ($dbc, $q);
    
    return $r;
    //to get the results use while($row = mysqli_fetch_assoc($r))
    //explanation underneath is using while($row = mysqli_fetch_array($r, MYSQL_ASSOC)) which im guessing is the same thing
    //Each time mysql_fetch_array is called, it returns the current row and moves 
    //the data pointer ahead to the next row. When all rows are traversed, it returns false and the while loop ends.
}

function getAccFromEmail ($email, $dbc)
{
    $q = "SELECT * FROM user_accounts WHERE email = '$email'";
    $r = @mysqli_query ($dbc, $q);
    
    return $r;
}

//----------------------user_reviews functions-----------------------
//not tested
function insertUserReview ($item_name, $username, $review, $rating, $item_id, $dbc)
{
    $q = "INSERT INTO user_reviews (itemName,username,review,rating,item_id) VALUES ('$item_name', '$username'"
            . ", '$review', '$rating', '$item_id')";
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

function getItemReviewByName ($item_name, $dbc)
{
    $q = "SELECT * FROM user_reviews WHERE itemName = '$item_name'";
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

function getItemReviewByItemID ($item_id, $dbc)
{
    $q = "SELECT * FROM user_reviews WHERE item_id = '$item_id'";
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

function getItemReviewByUser ($username, $dbc)
{
    $q = "SELECT * FROM user_reviews WHERE username = '$username'";
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

//--------------------items_list functions--------------------------

function insertItem ($item_name, $description, $price, $image_path, $username, $dbc)
{
    $q = "INSERT INTO items_list (item_name, description, price, image_path, username) VALUES ('$item_name', '$description', "
        . "'$price', '$image_path', '$username')"; 
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

function getAllItems ($dbc)
{
    $q = "SELECT * FROM items_list";
    $r = @mysqli_query($dbc, $q);
}




//-------------------forum functions------------------------------

function insertForumItem ($title, $username, $content, $mainid, $dbc)
{
    if ($title == "NULL")
    {
        $q = "INSERT INTO forum (title, username, content, timestamp, mainid) VALUES (NULL,"
            . " '$username', '$content', CURRENT_TIMESTAMP, '$mainid')";
    }
    else if ($mainid == "NULL")
    {
        $q = "INSERT INTO forum (title, username, content, timestamp, mainid) VALUES ('$title',"
            . " '$username', '$content', CURRENT_TIMESTAMP, NULL)";
    }
    
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

function getAllForumItems ($dbc)
{
    $q = "SELECT * FROM forum";
    $r = @mysqli_query($dbc, $q);
}


//--------------------------website_feeddback functions-----------------------

function insertFeedback($username, $feedback, $rating, $dbc)
{
    $q = "INSERT INTO website_feedback (username, feedback, rating) VALUES ('$username', '$feedback', '$rating')";
    
    $r = @mysqli_query($dbc, $q);
    
    return $r;
}

?>