<!DOCTYPE html>
<html lang="en">
<head>
  <!--
    iDayDream Youth Welcome Form Confirmation
    Original Author:    Paul Garton
    Last Modified by:   Paul Garton
    Creation Date:      10/28/2019
    Last Modified Date: 11/11/2019
    Filename:           welcomeConfirmation.php
  -->
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <title>Thank You Student</title>
  <link rel="stylesheet" href="styles/confirmation.css">

</head>
<body>
<?php

 require ('/home/paulsbun/connect.php');
// require ('/home2/pgartong/connect.php');

// assign variables to POST array values
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$homePhone = $_POST["homePhone"];
$email = $_POST["email"];
$graduatingClass = $_POST["graduatingClass"];
$college = $_POST["college"];
$aspirations = $_POST["aspirations"];
$snacks = $_POST["snacks"];
$birthdate = $_POST["birthdate"];
$gender = $_POST["gender"];
$ethnicity = $_POST["ethnicity"];
$ethnicityOther = $_POST["otherEthnicity"];

switch ($ethnicity) {
  case "1": $ethnicityLabel = "American Indian or Alaska Native"; break;
  case "2": $ethnicityLabel = "Asian or Asian American"; break;
  case "3": $ethnicityLabel = "Black or African American"; break;
  case "4": $ethnicityLabel = "Hispanic or Latino/a"; break;
  case "5": $ethnicityLabel = "Middle Eastern or MENA"; break;
  case "6": $ethnicityLabel = "Native Hawaiian or Other Pacific Islander"; break;
  case "7": $ethnicityLabel = "Southeast Asian"; break;
  case "8": $ethnicityLabel = "White non-Hispanic"; break;
  case "9": $ethnicityLabel = "BI/Multiracial"; break;
  case "10": $ethnicityLabel = "Other"; break;
  case "11": $ethnicityLabel = "Declined to State"; break;
}

switch ($gender) {
  case "1": $genderLabel = "M"; break;
  case "2": $genderLabel = "F"; break;
  case "3": $genderLabel = "Other"; break;
  case "4": $genderLabel = "Prefer not to Say"; break;
}

include ("ssValidationWelcome.php");
if ($isValidSSWelcome) {
  // insert to database
  $firstName = mysqli_real_escape_string($cnxn, "$firstName");
  $lastName = mysqli_real_escape_string($cnxn, "$lastName");
  $homePhone = mysqli_real_escape_string($cnxn, "$homePhone");
  $email = mysqli_real_escape_string($cnxn, "$email");
  $graduatingClass = mysqli_real_escape_string($cnxn, "$graduatingClass");
  $college = mysqli_real_escape_string($cnxn, "$college");
  $aspirations = mysqli_real_escape_string($cnxn, "$aspirations");
  $snacks = mysqli_real_escape_string($cnxn, "$snacks");
  $birthdate = mysqli_real_escape_string($cnxn, "$birthdate");
  $gender = mysqli_real_escape_string($cnxn, "$gender");
  $ethnicity = mysqli_real_escape_string($cnxn, "$ethnicity");

  $sql = "insert into youth (first_name, last_name, home_phone, email, graduating_class, college_of_interest,
	  food_snacks, date_of_birth, other_ethnicity_text, ethnicities_id, genders_id)
  values ('$firstName', '$lastName', '$homePhone', '$email', '$graduatingClass', '$college',
	      '$snacks', '$birthdate', '$ethnicityOther', '$ethnicity', '$gender');";
  // echo $sql; //copy/paste into phpMyAdmin to test
  $result = mysqli_query($cnxn, $sql);
//If successful, print summary

  if ($result) {
    echo "<h3>Thank you for completing this iDayDream welcome form.</h3>";


    // echo submission back to client
    echo "<div>First Name: " . $firstName . "</div>";
    echo "<div>Last Name: " . $lastName . "</div>";
    echo "<div>Home Phone: " . $homePhone . "</div>";
    echo "<div>Email: " . $email . "</div>";
    echo "<div>Graduating Class: " . $graduatingClass . "</div>";
    echo "<div>College of Interest: " . $college . "</div>";
    echo "<div>Career Aspirations: " . $aspirations . "</div>";
    echo "<div>Favorite Snacks: " . $snacks . "</div>";
    echo "<div>Birthdate: " . $birthdate . "</div>";
    echo "<div>Gender: " . $genderLabel . "</div>";
    echo "<div>Ethnicity: " . $ethnicityLabel . "</div>";
    if ($ethnicity === "10") {
      echo "<div>Other Ethnicity Details: $ethnicityOther</div>";
    }

//Send welcome information to iDayDream Contact
//Note: spam avoidance measures may be required
    $email = "pgarton@mail.greenriver.edu";
    $email_body = "The following welcome page new registrant information was submitted: \r\n\n";
    $email_body .= "First Name: " . $firstName . "\r\n";
    $email_body .= "Last Name: " . $lastName . "\r\n";
    $email_body .= "Home Phone: " . $homePhone . "\r\n";
    $email_body .= "Email: " . $email . "\r\n";
    $email_body .= "Graduating Class: " . $graduatingClass . "\r\n";
    $email_body .= "College of Interest: " . $college . "\r\n";
    $email_body .= "Career Aspirations: " . $aspirations . "\r\n";
    $email_body .= "Favorite Snacks: " . $snacks . "\r\n";
    $email_body .= "Birthdate: " . $birthdate . "\r\n";
    $email_body .= "Gender: " . $genderLabel . "\r\n";
    $email_body .= "Ethnicity: " . $ethnicityLabel . "\r\n";
    if ($ethnicity === "10") {
      $email_body .= "Other Ethnicity Details: $ethnicityOther" . "\r\n";
    }

    $email_subject = "Welcome Page New Registrant";
    $to = $email;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email \r\n";
    $success = mail($to, $email_subject, $email_body, $headers);

//Print final confirmation
    $msg = $success ? "Your information was successfully submitted"
      : "We're sorry. There was a problem with your submission";
    echo "<p>$msg</p>";
  }
}
?>
</body>
</html>