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

?>