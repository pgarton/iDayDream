<!DOCTYPE html>
<html lang="en">
<head>
  <!--
    iDayDream Volunteer Welcome Form Confirmation
    Original Author:    Dallas Sloan
    Last Modified by:   Paul Garton
    Creation Date:      10/29/2019
    Last Modified Date: 12/09/2019
    Filename:           confirmation.php
  -->
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <title>Thank You Volunteer</title>
  <link rel="stylesheet" href="styles/confirmation.css">
  <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">

</head>
<body>
<?php

    $user = posix_getpwuid(posix_getuid());
    $userDir = $user['dir'];
    require ("$userDir/connect.php");

    //connect2 was used to initially build out the sql statements on local computer
    //require("connect2.php");


 //var_dump($_POST);

// assign variables to POST array values
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $homePhone = $_POST["homePhone"];
    $email = $_POST["email"];
    $streetAddress = $_POST["streetAddress"];
    $address2 = $_POST["apt"];
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
    $weekendAvailabilityText = $_POST["weekendText"];
    $availability = $_POST["availability"];
    $specialSkillsInterests = $_POST["skillsInterest"];
    $youthVolunteerExp = $_POST["youthExp"];
    $nonYouthExperience = $_POST["nonYouthExp"];
    $roles = $_POST["roles"];

//changing some of the digit values to a value the client will understand
switch ($tShirtSize) {
    case "1": $tShirtSizeLabel = "Extra Small"; break;
    case "2": $tShirtSizeLabel = "Small"; break;
    case "3": $tShirtSizeLabel = "Medium"; break;
    case "4": $tShirtSizeLabel = "Large"; break;
    case "5": $tShirtSizeLabel = "Extra Large"; break;
    case "6": $tShirtSizeLabel = "XXL"; break;
}

//function to switch role value to name value
function rolesSwitch($role){
switch ($role) {
    case "1":
        $rolesLabel = "Events (College Tours, Community Service)";
        return $rolesLabel;
        break;
    case "2":
        $rolesLabel = "Fundraising";
        return $rolesLabel;
        break;
    case "3":
        $rolesLabel = "Newsletter Production (Monthly)";
        return $rolesLabel;
        break;
    case "4":
        $rolesLabel = "Volunteer Coordination";
        return $rolesLabel;
        break;
    case "5":
        $rolesLabel = "Mentoring";
        return $rolesLabel;
        break;
    case "6":
        $rolesLabel = "Other";
        return $rolesLabel;
        break;
}
}
switch ($hearAboutUs) {
    case "1": $hearAboutUsLabel = "Word of Mouth/Friend/Colleague"; break;
    case "2": $hearAboutUsLabel = "Web/Social Media"; break;
    case "3": $hearAboutUsLabel = "Print (Flyer/Poster/Brochure)"; break;
    case "4": $hearAboutUsLabel = "Corporate Sponsor"; break;
    case "5": $hearAboutUsLabel = "Other"; break;
}

include("ssValidationVolunteer.php");
if ($isValidSSVolunteer) {
    //insert into database
    $firstName = mysqli_real_escape_string($cnxn, "$firstName");
    $lastName = mysqli_real_escape_string($cnxn, "$lastName");
    $homePhone = mysqli_real_escape_string($cnxn, "$homePhone");
    $email = mysqli_real_escape_string($cnxn, "$email");
    $streetAddress = mysqli_real_escape_string($cnxn, "$streetAddress");
    $address2 = mysqli_real_escape_string($cnxn,"$address2");
    $city = mysqli_real_escape_string($cnxn,"$city");
    $zipCode = mysqli_real_escape_string($cnxn,"$zipCode");
    $tShirtSize = mysqli_real_escape_string($cnxn, "$tShirtSize");
    $state = mysqli_real_escape_string($cnxn, "$state");
    $hearAboutUs = mysqli_real_escape_string($cnxn,"$hearAboutUs");
    $mailingList = mysqli_real_escape_string($cnxn, "$mailingList");
    $policyAccepted = mysqli_real_escape_string($cnxn, "$policyAccepted");

    // setting the $weekend and $summerCamp variable to the correct variable depending on what is sent through
    $weekend = 0;
    $summerCamp = 0;
    $availLen = sizeof($availability);
    if ($availLen > 0) {
      foreach ($availability as $selected) {
        if ($selected == "weekend")
          $weekend = 1;

        if ($selected == "summerCamp")
          $summerCamp = 1;
      }
    }

    $otherText = mysqli_real_escape_string($cnxn, "$otherText");

    //always setting bgCheck to 1 since you cannot proceed with the form unless you agree to a background check
    $bgCheck = mysqli_real_escape_string($cnxn,1);

    //applying the correct values depending on what is found within the experience array.

    if (isset($_POST['experience'])) {
      foreach ($_POST['experience'] as $selected) {
        if ($selected == "special-skills-interests") {
          $specialSkillsInterests = mysqli_real_escape_string($cnxn, 1);
        }
        if ($selected == "youth-volunteer-exp") {
          $youthVolunteerExp = mysqli_real_escape_string($cnxn, 1);
        }
        if ($selected == "non-youth-volunteer") {
          $nonYouthExperience = mysqli_real_escape_string($cnxn, 1);
        }
      }
    }

    $skillsInterest = mysqli_real_escape_string($cnxn,"$skillsInterest");
    $youthExp = mysqli_real_escape_string($cnxn, "$youthExp");
    $nonYouthExp = mysqli_real_escape_string($cnxn, "$nonYouthExp");
    //$roles = mysqli_real_escape_string($cnxn, "$roles");
    $ref1Name = mysqli_real_escape_string($cnxn, "$ref1Name");
    $ref1Phone = mysqli_real_escape_string($cnxn, "$ref1Phone");
    $ref1Email = mysqli_real_escape_string($cnxn, "$ref1Email");
    $ref1Relationship = mysqli_real_escape_string($cnxn, "$ref1Relationship");
    $ref2Name = mysqli_real_escape_string($cnxn, "$ref2Name");
    $ref2Phone = mysqli_real_escape_string($cnxn, "$ref2Phone");
    $ref2Email = mysqli_real_escape_string($cnxn, "$ref2Email");
    $ref2Relationship = mysqli_real_escape_string($cnxn, "$ref2Relationship");
    $ref3Name = mysqli_real_escape_string($cnxn, "$ref3Name");
    $ref3Phone = mysqli_real_escape_string($cnxn, "$ref3Phone");
    $ref3Email = mysqli_real_escape_string($cnxn, "$ref3Email");
    $ref3Relationship = mysqli_real_escape_string($cnxn, "$ref3Relationship");
    $weekendAvailabilityText = mysqli_real_escape_string($cnxn, "$weekendAvailabilityText");

    //sql statement for volunteers table
    $sql = "insert into volunteers (first_name, last_name, home_phone, email, address1, address2, city, zip_code, shirt_sizes_id,
            states_code, lead_sources_id, add_to_mailing_list, policy_agreement, weekend_availability, summer_camp_availability,
            other_role_text, background_check_agreement, special_skills, youth_volunteer_exp, non_youth_volunteer_exp, special_skills_text,
            youth_volunteer_exp_text, non_youth_volunteer_exp_text, weekend_availability_text)
            values ('$firstName', '$lastName', '$homePhone', '$email', '$streetAddress', '$address2', '$city','$zipCode','$tShirtSize',
            '$state', '$hearAboutUs','$mailingList','$policyAccepted', '$weekend', '$summerCamp','$otherText','$bgCheck',
            '$specialSkillsInterests', '$youthVolunteerExp', '$nonYouthExperience','$skillsInterest', '$youthExp', '$nonYouthExp',
            '$weekendAvailabilityText');";
//   echo $sql;

    $result = mysqli_query($cnxn, $sql);
    $lastID = mysqli_insert_id($cnxn); // getting the last inserted incremented ID for the second sql statement

    //sql statement for volunteer_roles table. Needed a foreach loop to assign multiple rows

    if (isset($_POST['roles'])) {
      foreach ($_POST['roles'] as $selected) {
        $sqlRoles = "INSERT INTO volunteer_roles (volunteers_id, roles_id)
                    VALUES ('$lastID', '$selected');";
        $resultRoles = mysqli_query($cnxn, $sqlRoles);
      }
    }

    // sql statement for volunteer_references table
    $sqlRef = "INSERT INTO volunteer_references (volunteers_id, full_name, phone_number, email, relationship)

                VALUES ('$lastID', '$ref1Name', '$ref1Phone', '$ref1Email', '$ref1Relationship'),
                        ('$lastID', '$ref2Name', '$ref2Phone', '$ref2Email', '$ref2Relationship'),
                        ('$lastID', '$ref3Name', '$ref3Phone', '$ref3Email', '$ref3Relationship');";

    $resultRef = mysqli_query($cnxn, $sqlRef);
    //echo $sql; print out statement to test within PHPMyAdmin
    //echo "Last inserted ID: ".$lastID;

    // print summary if data was stored in database successfully
    if ($result && $resultRef) {
        echo "<h3>Thank you for completing this application form and for your interest in volunteering with us.</h3>";
    }

// echo submission back to client
    echo "<div>First Name: " . $firstName . "</div>";
    echo "<div>Last Name: " . $lastName . "</div>";
    echo "<div>Home Phone: " . $homePhone . "</div>";
    echo "<div>Email: " . $email . "</div>";
    echo "<div>Street Address: " . $streetAddress . "</div>";
    echo "<div>City: " . $city . "</div>";
    echo "<div>State: " . $state . "</div>";
    echo "<div>ZipCode: " . $zipCode . "</div>";
    echo "<div>T-Shirt Size: " . $tShirtSizeLabel . "</div>";
    echo "<div>Availability: ";

    if (isset($_POST['availability'])) {
      foreach ($_POST['availability'] as $selected) {
        if ($selected == "weekend") {
          echo "Weekends" . ", ";
        }
        if ($selected == "weekend-8") {
          echo "SummerCamp 1-Week" . ", ";
        }
      }
    }
    echo "</div>";
    if ($weekend ==1) {
        echo "<div>Weekend Hours: " . $weekendHours . "</div>";
    }

    echo "<div>Roles: ";
    if (isset($_POST['roles'])) {
      foreach ($_POST['roles'] as $selected) {
        $roleSelected = rolesSwitch($selected);
        echo "$roleSelected" . ", ";
      }
    }
    echo "</div>";

    if (strlen($otherText) > 1) {
        echo "<div>Interest Other: " . $otherText . "</div>";
    }
    echo "<div>Motivation: " . $motivation . "</div>";

    if (isset($_POST['experience'])) {
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

    echo "<div><br>How did you Hear About Us: " . $hearAboutUsLabel . "</div>";
    if (strlen($otherHearAboutUs)) {
        echo "<div>Hear About Us Details: " . $otherHearAboutUs . "</div>";
    }
    if ($mailingList == 1) {
        echo "<div>Mailing List: YES</div>";
    }
    else{
        echo "<div>Mailing List: NO</div>";
    }
    if ($policyAccepted == 1) {
        echo "<div>Policy Accepted: YES</div>";
    }
    else{
        echo "<div>Policy Accepted: NO</div>";
    }
    if ($bgCheck == 1) {
        echo "<div>Background Check Accepted: YES</div>";
    }
    else{
        echo "<div>Background Check Accepted: NO</div>";

    }


//Send Volunteer information to iDayDream Contact
//Note: spam avoidance measures may be required
    //$email = "dsloan4@mail.greenriver.edu";
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
    $email_body .= "T-Shirt Size: " . $tShirtSizeLabel . "\r\n";
    $email_body .= "Availability: ";
    if (isset($_POST['availability'])) {
      foreach ($_POST['availability'] as $selected) {
        if ($selected == "weekend") {
          $email_body .= "Weekends" . ", ";
        }
        if ($selected == "weekend-8") {
          $email_body .= "SummerCamp 1-Week" . ", ";
        }
      }
    }
    $email_body .= "\r\n";

    if ($weekend ==1) {
    $email_body .= "Weekend Hours: " . $weekendHours . "\r\n";
}
    $email_body .= "\r\n";
    $email_body .= "Roles: ";
    if (isset($_POST['roles'])) {
      foreach ($_POST['roles'] as $selected) {
        $roleSelected = rolesSwitch($selected);
        $email_body .= $roleSelected . ", ";
      }
    }

    $email_body .= "\r\n";

    if (strlen($otherText) > 1) {
        $email_body .= "Interest Other: " . $otherText . "\r\n";
    }
    $email_body .= "Motivation: " . $motivation . "\r\n";
    if (isset($_POST['roles'])) {
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

    $email_body .= "\nHow did you Hear About Us: " . $hearAboutUsLabel . "\r\n";
    if (strlen($otherHearAboutUs)) {
        $email_body .= "Hear About Us Details: " . $otherHearAboutUs . "\r\n";
    }
if ($mailingList == 1) {
    $email_body .= "Mailing List: YES". "\r\n";
}
else{
    $email_body .= "Mailing List: NO". "\r\n";

}
if ($policyAccepted == 1) {
    $email_body .= "Policy Accepted: YES" . "\r\n";
}
else{
    $email_body .= "Policy Accepted: NO" . "\r\n";
}
if ($bgCheck == 1) {
    $email_body .= "Background Check Accepted: YES" . "\r\n";
}
else{
    $email_body .= "Background Check Accepted: NO" . "\r\n";

}

    $email_subject = "New Volunteer Registration";
    $to = $email;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email \r\n";
    $success = mail($to, $email_subject, $email_body, $headers);

//Print final confirmation
    $msg = $success ? "Your information was successfully submitted"
        : "We're sorry. There was a problem with your submission";
    echo "<p>$msg</p>";
    echo "<p><b><a href='https://www.idaydream.org/'>Return to iDayDream Home</a></b></p>";
}
?>
</body>
</html>
