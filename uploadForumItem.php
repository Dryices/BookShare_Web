<?php

$mainid = null;

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


if (isset($_POST["submit"]))
{
    $dbc = OpenCon();
    $errors = array();
    
    if (!empty($_POST['title']))
    {
        $title = $_POST['title'];
    }
    else
    {
        $errors = "Please enter a title";
    }
    
    if (!empty($_POST['content']))
    {
        $content = $_POST['content'];
    }
    else
    {
        $errors = "Please enter some content";
    }
    
    if (empty($errors))
    {
        $r = insertForumItem($title, $username, $content, $dbc);
        
        if ($r)
        {
            header ("location: forum.php?status=success");
            CloseCon($dbc);
            exit();
        }
        else
        {
            header ("Location: forum.php?status=failed");
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
        }
    }
}
else
{
    header ("Location: listPost.php");
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

