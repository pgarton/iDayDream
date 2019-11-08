/*
iDayDream student form validation
Original Author:    Dallas Sloan
Last Modified by:   Elijah Maret
Creation Date:      10/25/2019
Last Modified Date: 10/30/2019
Filename:           validate_welcome.js
*/


/*
As an iDayDream youth, I can complete a
Welcome form online so that the organization can get to know me.
    Acceptance criteria:
    -Given a youth member completing the signup form, when the required fields
    (marked with an asterisk) are not provided or are invalid, then they will see a friendly error message*/

//Dynamically Validating Form


//commenting out dynamic validation found some issues
/*$("#firstName").on("keydown", validateFirstName);
$("#lastName").on("keydown", validateLastName);
$("#homePhone").on("keydown", validatePhone);
$("#email").on("keydown", validateEmail);
$("#graduatingClass").on("click", validateGraduatingClass);
$("#birthdate").on("keydown", validateBirthdate);
$("#gender").on("click", validateGender);
$("#ethnicity").on("click", validateEthnicity);*/

// Formatting phone input

$("#homePhone").on("keyup", function() {
    formatPhone("#homePhone");
});

//validating the form on submission
$("#welcomeForm").on("submit", validate);

let isValid;

function validate() {
    isValid = true;
    validateStandardInput("firstName");
    validateStandardInput("lastName");
    validatePhone("homePhone");
    validateEmail("email");
    validateDropdown("graduatingClass");
    validateBirthdate();
    validateDropdown("gender");
    validateDropdown("ethnicity");
    if (isValid == false) {
        alert("Please correct fields in RED and re-submit");
    }


    //end
    return isValid;


}


//creating functions

function validateStandardInput(id){
    let $item = $('#'+id);
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }

}

function validatePhone(id){
    let $num = $('#'+id);
    let $numVal = $num.val();
    // remove basic phone characters
    $numVal = $numVal.replace(" ", "");
    $numVal = $numVal.replace(/-/g, "");
    $numVal = $numVal.replace(/\(/g, "");
    $numVal = $numVal.replace(/\)/g,"");
    $numVal = $numVal.replace(/_/g, "");
    console.log($numVal); // for debugging
    if($numVal.length != 10){
        $num.addClass("invalid");
        isValid = false;
    } else {
        $num.removeClass("invalid");
    }

}

function validateEmail(id) {
    let $email = $('#'+id);
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email.val())) {
        $email.removeClass("invalid");
    } else {
        $email.addClass("invalid");
        isValid = false;

    }
}

function validateDropdown(id){
    let $size = $('#'+id);
    if ($size.val() == "none") {
        $size.addClass("invalid");
        isValid = false;
    } else {
        $size.removeClass("invalid");
    }

}


function validateBirthdate(){
    let $dateOfBirth = $("#birthdate").val();
    let validBirth = $dateOfBirth.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
    if(validBirth){
        let minDate = Date.parse("01/01/1950");
        let today = new Date();
        let DOB = Date.parse($dateOfBirth);
        if ((DOB >= today || DOB <= minDate)) {
            $("#birthdate").addClass("invalid");
            isValid =  false;
        }
        $("#birthdate").removeClass("invalid");
        return;
    }
    $("#birthdate").addClass("invalid");
    isValid =  false;
}


function formatPhone(id) { // auto-formats phone input
    // formats phone number
    let str = $(id).val();
    str = str.replace(/\D/g, "");

    if (str.length < 4) {
        // do nothing
    } else if (str.length < 7) {
        str = "(" + str.substring(0, 3) + ") " + str.substring(3, 6);
    } else {
        str = "(" + str.substring(0, 3) + ") " + str.substring(3, 6) + "-" + str.substring(6, 10);
    }

    $(id).val(str);
}








