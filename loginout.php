<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>
<body>
<?php

include 'connection.php';  //connecting to the database

$login = 0;
$invalid = 0;
session_start();

// User login form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $name = $_POST['name'];

  // Check if email already exists in database
  $sql = "SELECT * FROM bill WHERE email='$email' and name='$name'";

  $result = mysqli_query($con, $sql);
  $count = mysqli_num_rows($result);

  if ($count > 0) {
      // Check if patient exists
      $login = 1; 
      $_SESSION["email"] = $email;
      $name = $_POST['name'];
      header('location: bill.php');
      // You can fetch data from $result if needed
  } else {      
    // Patient doesn't exist, redirect to registration page
      $invalid = 1;
      $_SESSION["email"] = $email;
      $name = $_POST['name'];
      header("Location: registrn.php");
  }
}

$con->close();


?>

</body>
</html>