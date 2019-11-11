<!DOCTYPE html>
<html lang="en">
<head>
  <!--
    iDayDream Youth Welcome Form Confirmation
    Original Author:    Paul Garton
    Last Modified by:   Paul Garton
    Creation Date:      10/28/2019
    Last Modified Date: 10/28/2019
    Filename:           welcomeConfirmation.php
  -->
  <!-- Required meta tags -->
    <meta charset="UTF-8">
    <title>Thank You Student</title>
</head>
<body>
<?php


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

  include ("ssValidationWelcome.php");
  if ($isValidSSWelcome) {
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
      echo "<div>Gender: " . $gender . "</div>";
      echo "<div>Ethnicity: " . $ethnicity . "</div>";
      if ($ethnicity === "10"){
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
      $email_body .= "Gender: " . $gender . "\r\n";
      $email_body .= "Ethnicity: " . $ethnicity . "\r\n";
      if ($ethnicity === "10") {
          $email_body .= "Other Ethnicity Details: $ethnicityOther". "\r\n";
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

?>
</body>
</html>
