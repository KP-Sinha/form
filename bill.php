<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BIll</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
  <?php include 'connection.php'; 

    // Fetch the latest BILL_NO from the database
      $fetch_query = "SELECT BILL_NO FROM bill ORDER BY BILL_NO DESC LIMIT 1";
      $result = mysqli_query($conn, $fetch_query);
      $row = mysqli_fetch_assoc($result);
      $latest_bill_no = $row['BILL_NO'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // $BILL_NO = $_POST['$BILL_NO'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $add= $_POST['add'];
      $email = $_POST['email'];
      $amt = $_POST['amount'];
      $Incharge = $_POST['Incharge'];
      $current_date = date("Y-m-d");


      // Insert user data into database
      $insert_query = "insert into bill (BILL_NO,PT_NAME,PT_PHONE,PT_ADD,PT_EMAIL,AMOUNT,PT_DATE) 
      VALUES ('','$name','$phone','$add','$email',$amt, '')";
      mysqli_query($conn, $insert_query);
        // Start session and store data
        session_start();
        $_SESSION["email"] = $email;
        //header('location:index.html');
    }
               
            
   ?>
    <table border="1" width="60%" align="center" height="70%">
      <tr>
        <td colspan="4">
          <div style="text-align: center">
            <span><h2>Dr. Anjit Kumar</h2></span>
            <i
              ><p>
                <stron><b>Orthopedic</b></stron> <br />
                <strong>ADD:</strong> Patna Punaichuck <br />pincode:- 800023
              </p></i
            >
          </div>
          <table border="0" width="100%" height="40">
            <tr>
              <td>Bill No.- <?php echo $latest_bill_no; ?></td>
              <td style="text-align: right">Date- <?php echo date("y-m-d"); ?></td>
            </tr>
            <br />
            <tr>
              <td>Patient Name:- <?php echo isset($name) ? $name : ''; ?></td>
              <td style="text-align: right">
                Phn No.- <?php echo isset($phone) ? $phone : ''; ?>
              </td>
              <br />
              <tr>
                <td>ADD:- <?php echo isset($add) ? $add : ''; ?></td>
                <td style="text-align: right">Email:- <?php echo isset($email) ? $email : ''; ?></td>
              </tr>
              <br>
            </tr>
            <br />
            <tr>
              <td>
                Dr.Incharge-<?php echo isset($Incharge) ? $Incharge : ''; ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>SI.No.</td>
        <td style="text-align: center">Particular</td>
        <td style="text-align: center">Amount </td>
      </tr>
      <tr height="300">
        <td width="10%">
          <!-- <?php echo isset($sino) ? $sino : ''; ?> -->
        </td>
        <td width="75%">
          <!-- <?php echo isset($particular) ? $particular : ''; ?> -->
        </td>
        <td width="10%"><?php echo isset($amt) ? $amt : ''; ?></td>
       
      </tr>
      <tr>
        <td colspan="2" style="text-align: right">Grand Total</td>
        <td><?php echo isset($amt) ? $amt : ''; ?></td>
      </tr>
      <br />
      <tr>
        <td colspan="3">
          <table border="0" width="100%">
            <tr height="100">
              <td>Aurthorized Hospital</td>
              <td style="text-align: right">Aurthorized Signature</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
      <td colspan="3" style="text-align: center">
        Contact: 91 6587491520 <br>
        2684597879 <br>
        Email: example@gmail.com
      </td>
    </tr>
    </table>
        <form action="registrn.php">
          <input type="submit" value="Print" onclick="window.print()"/>
        </form>
  </body>
</html>
