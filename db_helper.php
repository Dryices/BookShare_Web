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
    $r = @mysql_query ($dbc, $q);
    
    return $r;
    //if mysql_num_rows($r) == 0 then either password or email wrong or the person dun have an acc
}

//can use this and the email one to see if there are any repeats or if the registering person is 
//using an email or username thats alrd used by someone else
function getAccFromUsername ($username, $dbc)
{
    $q = "SELECT * FROM user_accounts WHERE username = '$username'";
    $r = @mysql_query ($dbc, $q);
    
    return $r;
    //to get the results use while($row = mysqli_fetch_assoc($r))
    //explanation underneath is using while($row = mysqli_fetch_array($r, MYSQL_ASSOC)) which im guessing is the same thing
    //Each time mysql_fetch_array is called, it returns the current row and moves 
    //the data pointer ahead to the next row. When all rows are traversed, it returns false and the while loop ends.
}

function getAccFromEmail ($email, $dbc)
{
    $q = "SELECT * FROM user_accounts WHERE email = '$email'";
    $r = @mysql_query ($dbc, $q);
    
    return $r;
}

//----------------------item_review functions-----------------------
//not tested
function insertItemReview ($item_name, $username, $review, $rating, $item_id, $dbc)
{
    $q = "INSERT INTO item_review (itemName,username,review,rating,item_id) VALUES ('$item_name', '$username'"
            . ", '$review', '$rating', '$item_id')";
    $r = @mysql_query($dbc, $q);
    
    return $r;
}

function getItemReviewByName ($item_name, $dbc)
{
    $q = "SELECT * FROM item_review WHERE itemName = '$item_name'";
    $r = @mysql_query($dbc, $q);
    
    return $r;
}

function getItemReviewByItemID ($item_id, $dbc)
{
    $q = "SELECT * FROM item_review WHERE item_id = '$item_id'";
    $r = @mysql_query($dbc, $q);
    
    return $r;
}

function getItemReviewByUser ($username, $dbc)
{
    $q = "SELECT * FROM item_review WHERE username = '$username'";
    $r = @mysql_query($dbc, $q);
    
    return $r;
}

//--------------------items_list function--------------------------

function insertItem ($item_name, $description, $price, $image_path, $dbc)
{
    $q = "INSERT INTO items_list (item_name, description, price, image_path) VALUES ('$item_name', '$description', "
        . "'$price', '$image_path')"; 
    $r = @mysql_query($dbc, $q);
    
    return $r;
}

?>