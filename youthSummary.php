<?php
/*  iDayDream Youth Summary
    Original Author:    Paul Garton
    Last Modified by:   Paul Garton
    Creation Date:      11/10/2019
    Last Modified Date: 11/10/2019
    Filename:           youthSummary.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iDayDream Youth Summary</title>
  
      <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">

  
  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="styles/summary.css">
</head>
<body>
<h3>Youth Summary</h3>
<div class="contain">
  

  <?php
  require ('/home/paulsbun/connect.php');
  //Define the query
  $sql = 'select youth_id, first_name, last_name, home_phone, email, graduating_class, college_of_interest,
            food_snacks, date_of_birth, gender, ethnicity,other_ethnicity_text as ethnicity_other
          from v_youth;';
  //Send the query to the database
  $result = mysqli_query($cnxn, $sql);
  //var_dump($result);
  ?>

  <table id="youth-table" class="display">
    <thead>
    <tr>
      <th>Youth ID</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Home Phone</th>
      <th>Email</th>
      <th>Class</th>
      <th>College</th>
      <th>Snack</th>
      <th>DOB</th>
      <th>Gender</th>
      <th>Ethnicity</th>
      <th>Ethnicity Other</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //Print the results
    while ($row = mysqli_fetch_assoc($result)) {
      $youthID = $row['youth_id'];
      $firstName = $row['first_name'];
      $lastName = $row['last_name'];
      $homePhone = $row['home_phone'];
      $email = $row['email'];
      $graduatingClass = $row['graduating_class'];
      $collegeOfInterest = $row['college_of_interest'];
      $foodSnacks = $row['food_snacks'];
      $dateOfBirth = $row['date_of_birth'];
      $gender = $row['gender'];
      $ethnicity = $row['ethnicity'];
      $ethnicityOther = $row['ethnicity_other'];
      echo "<tr>
                <td>$youthID</td>
                <td>$lastName</td>
                <td>$firstName</td>
                <td>$homePhone</td>
                <td>$email</td>
                <td>$graduatingClass</td>
                <td>$collegeOfInterest</td>
                <td>$foodSnacks</td>
                <td>$dateOfBirth</td>
                <td>$gender</td>
                <td>$ethnicity</td>
                <td>$ethnicityOther</td>
              </tr>";
    }
    ?>

    </tbody>
  </table>

  <a id = "add" href="welcome.html">Add a new youth</a>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $('#youth-table').DataTable({
        "order": [[ 0, "desc" ]]
    }) ;
</script>

</body>
</html>
