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
    
    
}
else
{
    
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

