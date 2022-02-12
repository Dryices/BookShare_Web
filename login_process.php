
<?php 
//Just wanted to test login you can delete if you want
include "db_helper.php";
$conn = OpenCon();
$email = $_POST['email'];
$password = sha1($_POST['password']);
$select = "select * from user_accounts where email = '$email' and password = '$password' ";
$result = mysqli_query($conn,$select);
if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    
    $_SESSION = array();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    header("Location: index.php");
}
?>

 
 