<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <!-- index.php -->
    <?php include 'connection.php';
    session_start();

    // Check if URL parameter autofill is set
    if (isset($_GET['autofill']) && $_GET['autofill'] == 1) {
      // Autofill the form fields if the user is logged in
      if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
        $sql = "SELECT * FROM bill WHERE PT_EMAIL='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
        }
      }
    }
    ?>
    
  <div class="container">
    <h2>Registration Form</h2>
    <form action="bill.php" method="POST">
      <input type="text" name="name" placeholder="Patient Name" required /><br />
      <input type="text" name="phone" placeholder="Patient Number" required /><br>
      <input type="text" name="add" placeholder="Patient Address" required /><br>
      <input type="email" name="email" placeholder="Patient Email" required /><br />
      <input type="text" name="Incharge" placeholder="Dr. Incharge" required /><br />
      <!-- <input type="date" name="date" required /><br /> -->
      <input type="number" name="amount" placeholder="Amount" step="0.01" required /><br />
      <div class="particular">
        <input type="checkbox" id="medical1" name="particular" value="Registration" />
        <label for="medical1"> Registration</label><br />
        <input type="checkbox" id="medical2" name="particular" value="consultant" />
        <label for="medical2"> Consultant</label><br />
        <input type="checkbox" id="medical3" name="particular" value="other_charge" />
        <label for="medical3"> Other Charges</label><br /><br />
      </div>
      <button type="submit">Proceed</button>
    </form>
  </div>
</body>
</html>
