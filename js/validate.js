/*
As a potential iDayDream volunteer, I can complete an application online so that I don’t have to fill out a paper application.Acceptance criteria:
When required fields are missing then inline error messages should be displayed.
Three character references are required
Name, address, phone and email are required
T-shirt size (adult unisex) is required
Why are you motivated to volunteer with us? is required
Mailing list sign up (yes or no) is required, and yes is checked by default
 */

// validating dynamically
$("#firstName").on("keyup", validateFirstName);
$("#lastName").on("keyup", validateLastName);

//$("#email").on("keyup", validateEmail);
$("#t-shirt-size").on("click", validateTshirt);



// validating the form on submission
$("#volunteerForm").on("submit", validate);

let isValid;


function validate() {
    isValid = true;
    validateFirstName();
    validateLastName();
    validatePhone();

    //validateEmail();
    validateTshirt();
    //validateMotivation
    //validateMailingList



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
    let $num = $("#homePhone").val();

}

function validateEmail() {
    let $email = $("#email");
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($email.val())) {
        $email.addClass("invalid");
        isValid = false;
    } else {
        $email.removeClass("invalid");
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