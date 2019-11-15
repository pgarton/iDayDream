<!DOCTYPE html>
<html lang="en">
<head>
  <!--
    iDayDream Youth Welcome Form Confirmation
    Original Author:    Paul Garton
    Last Modified by:   Paul Garton
    Creation Date:      10/29/2019
    Last Modified Date: 10/29/2019
    Filename:           confirmation.php
  -->
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <title>Thank You Volunteer</title>
  <link rel="stylesheet" href="styles/confirmation.css">

</head>
<body>
<?php



// var_dump($_POST);

// assign variables to POST array values
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $homePhone = $_POST["homePhone"];
    $email = $_POST["email"];
    $streetAddress = $_POST["streetAddress"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipCode = $_POST["zipCode"];
    $tShirtSize = $_POST["tShirtSize"];
    $otherText = $_POST["otherText"];
    $motivation = $_POST["motivation"];
    $skillsInterest = $_POST["skillsInterest"];
    $youthExp = $_POST["youthExp"];
    $nonYouthExp = $_POST["nonYouthExp"];
    $ref1Name = $_POST["ref1Name"];
    $ref1Phone = $_POST["ref1Phone"];
    $ref1Email = $_POST["ref1Email"];
    $ref1Relationship = $_POST["ref1Relationship"];
    $ref2Name = $_POST["ref2Name"];
    $ref2Phone = $_POST["ref2Phone"];
    $ref2Email = $_POST["ref2Email"];
    $ref2Relationship = $_POST["ref2Relationship"];
    $ref3Name = $_POST["ref3Name"];
    $ref3Phone = $_POST["ref3Phone"];
    $ref3Email = $_POST["ref3Email"];
    $ref3Relationship = $_POST["ref3Relationship"];
    $hearAboutUs = $_POST["hearAboutUs"];
    $otherHearAboutUs = $_POST["otherHearAboutUs"];
    $mailingList = $_POST["mailingList"];
    $policyAccepted = $_POST["policy"];
    $bgCheck = $_POST["bgCheck"];
    $weekendHours = $_POST["weekendHours"];

include("ssValidationVolunteer.php");
if ($isValidSSVolunteer) {
    echo "<h3>Thank you for completing this application form and for your interest in volunteering with us.</h3>";


// echo submission back to client
    echo "<div>First Name: " . $firstName . "</div>";
    echo "<div>Last Name: " . $lastName . "</div>";
    echo "<div>Home Phone: " . $homePhone . "</div>";
    echo "<div>Email: " . $email . "</div>";
    echo "<div>Street Address: " . $streetAddress . "</div>";
    echo "<div>City: " . $city . "</div>";
    echo "<div>State: " . $state . "</div>";
    echo "<div>ZipCode: " . $zipCode . "</div>";
    echo "<div>T-Shirt Size: " . $tShirtSize . "</div>";
    echo "<div>Availability: ";
    foreach ($_POST['availability'] as $selected) {
        echo "$selected" . " ";
    }
    echo "</div>";
    echo "<div>Weekend Hours: " . $weekendHours . "</div>";


    echo "<div>Roles: ";
    foreach ($_POST['roles'] as $selected) {
        echo "$selected" . " ";
    }
    echo "</div>";

    if (strlen($otherText) > 1) {
        echo "<div>Interest Other: " . $otherText . "</div>";
    }
    echo "<div>Motivation: " . $motivation . "</div>";

    foreach ($_POST['experience'] as $selected) {
        if ($selected == "special-skills-interests") {
            echo "<div>Special Skills or Interests: " . $skillsInterest . "</div>";
        }
        if ($selected == "youth-volunteer-exp") {
            echo "<div>Youth Volunteer Experience: " . $youthExp . "</div>";
        }
        if ($selected == "non-youth-volunteer") {
            echo "<div>non-Youth Volunteer Experience: " . $nonYouthExp . "</div>";
        }
    }

    echo "<br><div>Reference 1</div>";
    echo "<div>Name: " . $ref1Name . "</div>";
    echo "<div>Phone: " . $ref1Phone . "</div>";
    echo "<div>Email: " . $ref1Email . "</div>";
    echo "<div>Relationship: " . $ref1Relationship . "</div>";

    echo "<br><div>Reference 2</div>";
    echo "<div>Name: " . $ref2Name . "</div>";
    echo "<div>Phone: " . $ref2Phone . "</div>";
    echo "<div>Email: " . $ref2Email . "</div>";
    echo "<div>Relationship: " . $ref2Relationship . "</div>";

    echo "<br><div>Reference 3</div>";
    echo "<div>Name: " . $ref3Name . "</div>";
    echo "<div>Phone: " . $ref3Phone . "</div>";
    echo "<div>Email: " . $ref3Email . "</div>";
    echo "<div>Relationship: " . $ref3Relationship . "</div>";

    echo "<div><br>How did you Hear About Us: " . $hearAboutUs . "</div>";
    if (strlen($otherHearAboutUs)) {
        echo "<div>Hear About Us Details: " . $otherHearAboutUs . "</div>";
    }
    echo "<div>Mailing List: " . $mailingList . "</div>";
    echo "<div>Policy Accepted: " . $policyAccepted . "</div>";
    echo "<div>Background Check Accepted: " . $bgCheck . "</div>";


//Send Volunteer information to iDayDream Contact
//Note: spam avoidance measures may be required
    $email = "pgarton@mail.greenriver.edu";
    $email_body = "The following volunteer registrant information was submitted: \r\n\n";
    $email_body .= "First Name: " . $firstName . "\r\n";
    $email_body .= "Last Name: " . $lastName . "\r\n";
    $email_body .= "Home Phone: " . $homePhone . "\r\n";
    $email_body .= "Email: " . $email . "\r\n";

    $email_body .= "Street Address: " . $streetAddress . "\r\n";
    $email_body .= "City: " . $city . "\r\n";
    $email_body .= "State: " . $state . "\r\n";
    $email_body .= "Zip Code: " . $zipCode . "\r\n";
    $email_body .= "T-Shirt Size: " . $tShirtSize . "\r\n";
    $email_body .= "Availability: ";
    foreach ($_POST['availability'] as $selected) {
        $email_body .= $selected . " ";
    }
    $email_body .= "Weekend Hours: " . $weekendHours . "\r\n";
    $email_body .= "\r\n";
    $email_body .= "Roles: ";
    foreach ($_POST['roles'] as $selected) {
        $email_body .= $selected . " ";
    }
    $email_body .= "\r\n";

    if (strlen($otherText) > 1) {
        $email_body .= "Interest Other: " . $otherText . "\r\n";
    }
    $email_body .= "Motivation: " . $motivation . "\r\n";
    foreach ($_POST['experience'] as $selected) {
        if ($selected == "special-skills-interests") {
            $email_body .= "Special Skills or Interests: " . $skillsInterest . "\r\n";
        }
        if ($selected == "youth-volunteer-exp") {
            $email_body .= "Youth Volunteer Experience: " . $youthExp . "\r\n";
        }
        if ($selected == "non-youth-volunteer") {
            $email_body .= "non-Youth Volunteer Experience: " . $nonYouthExp . "\r\n";
        }
    }

    $email_body .= "\nReference 1" . "\r\n";
    $email_body .= "Name: " . $ref1Name . "\r\n";
    $email_body .= "Phone: " . $ref1Phone . "\r\n";
    $email_body .= "Email: " . $ref1Email . "\r\n";
    $email_body .= "Relationship: " . $ref1Relationship . "\r\n";

    $email_body .= "\nReference 2" . "\r\n";
    $email_body .= "Name: " . $ref2Name . "\r\n";
    $email_body .= "Phone: " . $ref2Phone . "\r\n";
    $email_body .= "Email: " . $ref2Email . "\r\n";
    $email_body .= "Relationship: " . $ref2Relationship . "\r\n";

    $email_body .= "\nReference 3" . "\r\n";
    $email_body .= "Name: " . $ref3Name . "\r\n";
    $email_body .= "Phone: " . $ref3Phone . "\r\n";
    $email_body .= "Email: " . $ref3Email . "\r\n";
    $email_body .= "Relationship: " . $ref3Relationship . "\r\n";

    $email_body .= "\nHow did you Hear About Us: " . $hearAboutUs . "\r\n";
    if (strlen($otherHearAboutUs)) {
        $email_body .= "Hear About Us Details: " . $otherHearAboutUs . "\r\n";
    }
    $email_body .= "Mailing List: " . $mailingList . "\r\n";
    $email_body .= "Policy Accepted: " . $policyAccepted . "\r\n";
    $email_body .= "Background Check Accepted: " . $bgCheck . "\r\n";

    $email_subject = "New Volunteer Registration";
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
