<?php
# Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include 'db_helper.php';
//include ('header.html');
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// Make the connection:
    $dbc = OpenCon();
// Set the encoding...
    mysqli_set_charset($dbc, 'utf8');

    $errors = array(); // Initialize an error array.
    // Check for a username
    if (empty($_POST['username'])) {
        $errors[] = 'nousername.';
    } else {
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    }

    // Check for email
    if (empty($_POST['email'])) {
        $errors[] = 'noemail';
    } else {
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    // Check for password
    if (empty($_POST['password'])) {
        $errors[] = 'nopassword';
    } else {
        $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
    }

    // Check for a password and match against the confirmed password:
    /* if (!empty($_POST['pass1'])) {
      if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Your password did not match the confirmed password.';
      } else {
      $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
      }
      }  else {
      $errors[] = 'You forgot to enter your password.'; */
}

if (empty($errors)) { // If everything's OK.
    // Register the user in the database...
    // Make the query:
    $r = insertAcc($username, $email, $password, $dbc);
    // Run the query.
    if ($r) { // If it ran OK.
        header("Location: index.php?status=success");
        CloseCon($dbc);
        exit();
    } else { // If it did not run OK.
        // Public message:
        header("Location: index.php?status=fail");
        CloseCon($dbc);
        exit();
    }
} else { // Report the errors.
    $i = 0;
    $headerMsg = "Location: listPost.php?";

    while ($i < sizeof(errors)) {
        if (i == 0) {
            $headerMsg = $headerMsg . "error" . $i . "=" . $errors[$i];
        } else if (i > 0) {
            $headerMsg = $headerMsg . "&&error" . $i . "=" . $errors[$i];
        }
        $i++;
    }
} // End of if (empty($errors)) IF.

CloseCon($dbc); // Close the database connection.
// End of the main Submit conditional.
?>
<h1>Register</h1>
<form action="register.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
    <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
    <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
    <p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
    <p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
    <p><input type="submit" name="submit" value="Register" /></p>
</form>*/
<?php include ('includes/footer.html'); ?>