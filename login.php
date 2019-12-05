<?php
/*  iDayDream Youth Summary
    Original Author:    Elijah Maret
    Last Modified by:   Elijah Maret
    Creation Date:      11/27/2019
    Last Modified Date: 11/28/2019
    Filename:           login.php
*/
//Turn on error reporting -- this is critical!
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// print_r($_POST);

session_start();




// Return to the page it came from
if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = 'index.php';
}

if (isset($_SESSION['username'])){
        header("location: $source");
}

//




//If the login form has been submitted
if (isset($_POST['submit'])) {

    // REPLACE LATER
    $login = array("Admin"=>"Master123", "Brandi"=>"Day");
    //


    //Include creds.php (eventually, passwords should be moved to a secure location
    //or stored in a database)


    //Get the username and password from the POST array
    $username = $_POST['username'];
    $password = $_POST['password'];

    //If the username and password are correct
    if (array_key_exists($username, $login) && $login["$username"] == $password){
        $_SESSION['username'] = $username;



        //Store login name in a session variable


        header("location: $source");

        //Redirect to page 1


    } else {
        //Login credentials are incorrect
        $invalid = true;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">


    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/login.css">

</head>
<body>
<header id="header">
    <div class="jumbotron text-center">
        <h1 class="display-4">
            <?php
            if($invalid){
                echo 'Invalid Login';
            }
            else {
                echo 'Login to iDayDreamAdmin';
            }
            ?>
        </h1>

    </div>

</header>

<form method="post" action="#">
    <div>
        <label>Username:
            <input type="text" name="username">
        </label><br>
    </div>

    <div>
        <label>Password:
            <input type="password" name="password">
        </label><br>
    </div>
    <input id="login" type="submit" name="submit" value="Submit">
</form>
</body>
</html>
