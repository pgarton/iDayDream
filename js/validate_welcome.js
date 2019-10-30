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


//validating the form on submission
$("#welcomeForm").on("submit", validate);

let isValid;

function validate() {
    isValid = true;
    validateFirstName();
    validateLastName();
    validatePhone();
    validateEmail();
    validateGraduatingClass();
    validateBirthdate();
    validateGender();
    validateEthnicity();
    if (isValid == false) {
        alert("Please correct fields in RED and re-submit");
    }


    //end
    return isValid;


}


//creating functions

function validateFirstName() {
    let $item = $("#firstName");
    if (!$item.val()) {
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}

function validateLastName(){
    let $item = $("#lastName");
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}

function validatePhone(){
    let $num = $("#homePhone");
    let $numVal = $num.val();
    // remove basic phone characters
    $numVal = $numVal.replace(/-/g, "")
    $numVal = $numVal.replace(/\(/g, "")
    $numVal = $numVal.replace(/\)/g,"");
    $numVal = $numVal.replace(/_/g, "");
    console.log($numVal.length);
    if($numVal.length != 10){
        $num.addClass("invalid");
        isValid = false;
    } else {
        $num.removeClass("invalid");
    }
}

function validateEmail() {
    let $email = $("#email");
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email.val())) {
        $email.removeClass("invalid");
    } else {
        $email.addClass("invalid");
        isValid = false;

    }
}

function validateGraduatingClass(){
    let $class = $("#graduatingClass");
    if ($class.val() == "none") {
        $class.addClass("invalid");
        isValid = false;
    } else {
        $class.removeClass("invalid");
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


function validateGender(){
    let $gender = $("#gender");
    if ($gender.val() == "none") {
        $gender.addClass("invalid");
        isValid = false;
    } else {
        $gender.removeClass("invalid");
    }
}

function validateEthnicity(){
    let $ethnicity = $("#ethnicity");
    if ($ethnicity.val() == "none") {
        $ethnicity.addClass("invalid");
        isValid = false;
    } else {
        $ethnicity.removeClass("invalid");
    }
}









