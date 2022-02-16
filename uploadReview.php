<?php


include 'db_helper.php';
//Prompt user to log in
session_start();
while(!isset($_SESSION['username'])){ 
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('Please log in to create a topic');
    window.location.href='loginregister.php';
    </script>");
  exit();
}

$username = $_SESSION['username'];

if (isset($_POST['submit']))
{
    $dbc = OpenCon();
    $errors = array();
    
    if (!empty($_POST['feedback']))
    {
        $feedback = $_POST['feedback'];
    }
    else
    {
        $errors = "nofeedback";
    }
    
    if (!empty($_POST['rating']))
    {
        $rating = $_POST['rating'];
    }
    else
    {
        $errors = "norating";
    }
    
    if (empty($errors))
    {
        $r = insertFeedback($username, $feedback, $rating, $dbc);
        
        if ($r)
        {
            header ("Location: contact.php?status=success");
            CloseCon($dbc);
            exit();
        }
        else
        {
            header ("Location: contact.php?status=failed");
            CloseCon($dbc);
            exit();
        }
    }
    else
    {
        $i = 0;
        $headerMsg = "Location: listPost.php?";
        
        while ($i < sizeof(errors))
        {
            if (i == 0)
            {
                $headerMsg = $headerMsg . "error" . $i . "=" . $errors[$i];
            }
            else if (i > 0)
            {
                $headerMsg = $headerMsg . "&&error" . $i . "=" . $errors[$i];
            }
            $i++;
        }
    }
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

