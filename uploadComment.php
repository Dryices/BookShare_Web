<?php

$title = "NULL";

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
    
    if (!empty($_POST['mainid']))
    {
        $mainid = $_POST['mainid'];
    }
    else
    {
        $errors = "nomainid";
    }
    
    if (!empty($_POST['comment']))
    {
        $content = $_POST['comment'];
    }
    else
    {
        $errors = "nocomment";
    }
    
    if (empty($errors))
    {
        $r = insertForumItem($title, $username, $content, $mainid, $dbc);
        
        if ($r)
        {
            header ("Location: forumComments.php?status=success&id=$mainid");
            CloseCon($dbc);
            exit();
        }
        else
        {
            header ("Location: forumComments.php?status=fail");
            CloseCon($dbc);
            exit();
        }
    }
    else
    {
        $i = 0;
        $headerMsg = "Location: forumComments.php?";
        
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
else
{
    header ("Location: forum.php");
    exit();
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

