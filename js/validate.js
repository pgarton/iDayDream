
/*
iDayDream volunteer form validation
Original Author:    Elijah Maret
Last Modified by:   Elijah Maret
Creation Date:      10/19/2019
Last Modified Date: 10/30/2019
Filename:           validate.js
*/

/*
As a potential iDayDream volunteer, I can complete an application online so that I don’t have to fill out a paper application.Acceptance criteria:
When required fields are missing then inline error messages should be displayed.
Three character references are required
Name, address, phone and email are required
T-shirt size (adult unisex) is required
Why are you motivated to volunteer with us? is required
Mailing list sign up (yes or no) is required, and yes is checked by default
 */

// background Check
$("#submit").hide();
$("#bg-check-no").on("click", function() {
    alert("Background Check Decline notification:" +
        " Because of our values as on organization and out of the safety of the youth" +
        " we serve it is a requirement that a background check must be submitted.You have chosen to decline." +
        " Thank you for your consideration in volunteering with iD.A.Y.dream, at this time we are unable to move forward with your" +
        " submission.Please do visit us again!")
    $("#submit").hide();
});

$("#bg-check-yes").on("click", function() {
    $("#submit").show();
});


// validating dynamically
$("#firstName").on("keydown", validateFirstName); //changed to keydown so feild would validate dynamically
$("#lastName").on("keyup", validateLastName);
$("#motivation-text").on("keyup", validateMotivation);
$("#homePhone").on("keyup", validatePhone);
$("#email").on("keyup", validateEmail);
$("#streetAddress").on("keyup", validateAddress);
$("#t-shirt-size").on("click", validateTshirt);

//Dallas Additions, validating References
$("#ref1-name").on("keydown", validateFirstNameRef1);
$("#ref2-name").on("keyup", validateFirstNameRef2);
$("#ref3-name").on("keyup", validateFirstNameRef3);

$("#ref1-phone").on("keyup", validatePhoneRef1);
$("#ref2-phone").on("keyup", validatePhoneRef2);
$("#ref3-phone").on("keyup", validatePhoneRef3);

$("#ref1-email").on("keyup", validateEmailRef1);
$("#ref2-email").on("keyup", validateEmailRef2);
$("#ref3-email").on("keyup", validateEmailRef3);

$("#ref1-relationship").on("keyup", validateRelRef1);
$("#ref2-relationship").on("keyup", validateRelRef2);
$("#ref3-relationship").on("keyup", validateRelRef3);










// validating the form on submission
$("#volunteerForm").on("submit", validate);

let isValid;


function validate() {
    isValid = true;
    validateFirstName();
    validateLastName();
    validatePhone();

    validateEmail();
    validateAddress();

    validateTshirt();
    validateMotivation();

    validateFirstNameRef1();
    validateFirstNameRef2();
    validateFirstNameRef3();

    validatePhoneRef1()
    validatePhoneRef2()
    validatePhoneRef3()

    validateEmailRef1();
    validateEmailRef2();
    validateEmailRef3();

    validateRelRef1();
    validateRelRef2();
    validateRelRef3();







    // ending

    return isValid;
}

function validateFirstName(){
    let $item = $("#firstName");
    if( !$item.val()){
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

function validateTshirt(){
    let $size = $("#t-shirt-size");
    if ($size.val() == "none") {
        $size.addClass("invalid");
        isValid = false;
    } else {
        $size.removeClass("invalid");
    }

}

function validateMotivation(){
    let $item = $("#motivation-text");
    if (!$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}

function validateAddress(){
    let $address = $("#streetAddress");
    if (!$address.val()){
        $address.addClass("invalid");
        isValid = false;
    } else {
        $address.removeClass("invalid");
    }
}

//Dallas Addition creating some validation for references
function validateFirstNameRef1(){
    let $item = $("#ref1-name");
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }

}
function validateFirstNameRef2(){
    let $item = $("#ref2-name");
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}
function validateFirstNameRef3(){
    let $item = $("#ref3-name");
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}

function validatePhoneRef1(){
    let $num = $("#ref1-phone");
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

function validatePhoneRef2(){
    let $num = $("#ref2-phone");
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

function validatePhoneRef3(){
    let $num = $("#ref3-phone");
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

function validateEmailRef1() {
    let $email = $("#ref1-email");
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email.val())) {
        $email.removeClass("invalid");
    } else {
        $email.addClass("invalid");
        isValid = false;
    }
}

function validateEmailRef2() {
    let $email = $("#ref2-email");
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email.val())) {
        $email.removeClass("invalid");
    } else {
        $email.addClass("invalid");
        isValid = false;
    }
}

function validateEmailRef3() {
    let $email = $("#ref3-email");
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email.val())) {
        $email.removeClass("invalid");
    } else {
        $email.addClass("invalid");
        isValid = false;
    }
}

function validateRelRef1(){
    let $item = $("#ref1-relationship");
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}
function validateRelRef2(){
    let $item = $("#ref2-relationship");
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}
function validateRelRef3(){
    let $item = $("#ref3-relationship");
    if( !$item.val()){
        $item.addClass("invalid");
        isValid = false;
    } else {
        $item.removeClass("invalid");
    }
}







