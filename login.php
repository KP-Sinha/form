<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
  include 'connection.php';  //connecting to the database

  session_start();

  // User login form data
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];

    // Check if email already exists in database
    $sql = "SELECT * FROM bill WHERE PT_EMAIL='$email' AND PT_NAME='$name'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
      // User exists, redirect to registration with data
      $row = mysqli_fetch_assoc($result);
      $_SESSION["email"] = $email;
      header('location: registrn.php?autofill=1');
    } else {
      // User doesn't exist, redirect to registration with empty fields
      $_SESSION["email"] = $email;
      header("Location: registrn.php");
    }
  }

  $conn->close();
?>

  <div class="container">
    <div>
      <h1>Dr. Anjit Kumar</h1>
      <p><b>Orthopedic</b><br>
         <b>Address:</b> Punaichuck, Patna, Bihar</p>
    </div>
    <div>
      <h2>Please Login Here</h2>
      <form action="login.php" method="POST">
        
        <input type="email" id="email" name="email" placeholder="Email" required>
        
       
        <input type="text" id="name" name="name" placeholder="Patient Name" required>
        
        <!-- Uncomment this input field if needed -->
        <!-- <label for="date">Date:</label>
        <input type="date" id="date" name="date" required> -->
        
        <button type="submit">Login</button>
      </form>
    </div>
  </div> 
</body>
</html>
