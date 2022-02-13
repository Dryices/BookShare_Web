<?php 
//Just wanted to test login you can delete if you want

if (isset($_POST["submit"]))
{
    include "db_helper.php";
    $dbc = OpenCon();
    $errors = array();
    
    
    if (empty($_POST['email']))
    {
        $errors[] = "email";
    }
    else
    {
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));;
    }
    
    if (empty($_POST['password']))
    {
        $errors[] = "password";
    }
    else
    {
        $password = sha1($_POST['password']);
    }
    
    if (empty($errors))
    {
        $r = getAcc($email, $password, $dbc);
        
        if(mysqli_num_rows($r)==1){
        $row = mysqli_fetch_assoc($r);
    
        $_SESSION = array();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
        }
    }
    else
    {
        $headerMsg = "location: /loginregister.php";
        
        if (sizeof($errors) == 1)
        {
            $headerMsg = $headerMsg . "?loginerror=" . $errors[0];
        }
        else if (sizeof($errors) == 2)
        {
            $headerMsg = $headerMsg . "?loginerror=" . $errors[0] . "&loginerror1=" . $errors[1];
        }
        
        header($headerMsg);
        exit();
    }
}


 
 