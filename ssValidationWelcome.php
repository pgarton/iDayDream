<?php
/**
 * iDayDream Youth Welcome Form Confirmation
 * Original Author:    Dallas Sloan
 * Last Modified by:   Dallas Sloan
 * Creation Date:      11/09/2019
 * Last Modified Date: 11/09/2019
 *  Filename:          ssValidationWelcome.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

// creating valid variable
$isValidSSWelcome=true;

//adding in variables from welcomeConfirmation.php
/*$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$homePhone = $_POST["homePhone"];
$email = $_POST["email"];
$graduatingClass = $_POST["graduatingClass"];
$college = $_POST["college"];
$aspirations = $_POST["aspirations"];
$snacks = $_POST["snacks"];
$birthdate = $_POST["birthdate"];
$gender = $_POST["gender"];
$ethnicity = $_POST["ethnicity"];*/


//creating function to validate standard textboxes

function validateStandardInput($id, $field){
    global $isValidSSWelcome;
    if (ctype_alpha($id) && !empty($id)){
        return;
    }
    else
        echo "<p>Valid $field must be entered"."\r\n</p>";
        $isValidSSWelcome = false;
}

// function to validate phone number

function validatePhone($id){
    global $isValidSSWelcome;
    //remove basic phone characters
    $id = str_replace(" ","",$id);
    $id = preg_replace('/-/',"",$id);
    $id = preg_replace('/\(/',"",$id);
    $id = preg_replace('/\)/',"",$id);
    $id = preg_replace('/_/',"",$id);
    echo "<p>$id</p>";
    if (is_numeric($id) && strlen($id)===10){
        return;
    }
    else{
        echo "<p>Valid Phone Number must be entered</p>";
        $isValidSSWelcome = false;
    }
}

// validating email
function validateEmail($id){
    if (!empty($id) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',$id)){
        return;
    }
    else{
        echo "<p>Valid Email must be entered</p>";
    }
}

//validating graduating class was chosen
function validateGraduatingClass($id){
    if ($id != "none"){
        return;
    }
    else{
        echo "<p>Please select a Graduating Class</p>";
    }
}

//validating birthdate
function validateBirthdate($id){
    //complete once Elijah makes his change
    $year = substr("$id",0,4);
    echo "Year: ".$year;
    $month = substr($id,5,2);
    echo "Month: ". $month;
    $day = substr($id,8);
    echo "Day: ".$day;

    if (checkdate((int)$month, (int)$day, (int)$year)){
        return;
    }
    else{
        echo "<p>Please enter Valid Year</p>";
    }
}

//validating gender was chosen
function validateGender($id){
    if ($id != "none"){
        return;
    }
    else{
        echo "<p>Please select a Gender</p>";
    }
}

//validating ethnicity was chosen
function validateEthnicity($id){
    if ($id != "none"){
        return;
    }
    else{
        echo "<p>Please select an Ethnicity Option</p>";
    }
}





validateStandardInput($firstName, "First Name");
validateStandardInput($lastName, "Last Name");
validatePhone($homePhone);
validateEmail($email);
validateGraduatingClass($graduatingClass);
validateBirthdate($birthdate);
validateGender($gender);
validateEthnicity($ethnicity);
if (!$isValidSSWelcome){
    Echo "<h3>Please Navigate Back to Welcome Form and Correct Any Errors Displayed Above</h3>";

}
