
/*
iDayDream volunteer form validation
Original Author:    Elijah Maret
Last Modified by:   Elijah Maret
Creation Date:      10/19/2019
Last Modified Date: 11/01/2019
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
$("#firstName").on("keyup", function() {
    validateStandardInput("firstName");
});

$("#lastName").on("keyup", function(){
    validateStandardInput("lastName");
});

$("#motivation-text").on("keyup", function() {
    validateStandardInput("motivation-text");
});

$("#homePhone").on("keyup", function(){
    validatePhone("homePhone");
});

$("#email").on("keyup", function() {
    validateEmail("email");
});

$("#streetAddress").on("keyup", function() {
    validateStandardInput("streetAddress");
});

$("#t-shirt-size").on("click", function(){
    validateDropdown("t-shirt-size");
});

//Dallas Additions, validating References
$("#ref1-name").on("keydown", function() {
    validateStandardInput("ref1-name");
});
$("#ref2-name").on("keyup", function() {
    validateStandardInput("ref2-name");
});
$("#ref3-name").on("keyup", function() {
    validateStandardInput("ref3-name");
});

$("#ref1-phone").on("keyup", function(){
    validatePhone("ref1-phone");
});
$("#ref2-phone").on("keyup", function(){
    validatePhone("ref2-phone");
});
$("#ref3-phone").on("keyup", function(){
    validatePhone("ref3-phone");
});

$("#ref1-email").on("keyup", function() {
    validateEmail("ref1-email");
});
$("#ref2-email").on("keyup", function() {
    validateEmail("ref2-email");
});
$("#ref3-email").on("keyup", function() {
    validateEmail("ref3-email");
});

$("#ref1-relationship").on("keyup", function() {
    validateStandardInput("ref1-relationship");
});
$("#ref2-relationship").on("keyup", function() {
    validateStandardInput("ref2-relationship");
});
$("#ref3-relationship").on("keyup", function() {
    validateStandardInput("ref3-relationship");
});










// validating the form on submission
$("#volunteerForm").on("submit", validate);

let isValid;


function validate() {
    isValid = true;
    validateStandardInput("firstName");
    validateStandardInput("lastName");
    validatePhone("homePhone");
    validateEmail("email");
    validateStandardInput("streetAddress");
    validateDropdown("t-shirt-size");

    validateStandardInput("motivation-text");

    validateStandardInput("ref1-name")
    validatePhone("ref1-phone");
    validateEmail("ref1-email");
    validateStandardInput("ref1-relationship");

    validateStandardInput("ref2-name")
    validatePhone("ref2-phone");
    validateEmail("ref2-email");
    validateStandardInput("ref2-relationship");

    validateStandardInput("ref3-name")
    validatePhone("ref3-phone");
    validateEmail("ref3-email");
    validateStandardInput("ref3-relationship");











    // ending

    return isValid;
}

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
    //console.log($numVal); // for debugging
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









