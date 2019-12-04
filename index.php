<?php
session_start();

if (!isset($_SESSION['username'])){
    $mode = 'logged_off';
} else {
    $mode = 'logged_in';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paul's Bunyans</title>

    <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">


    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
<h1 class="jumbotron">Paul's Bunyans' iD.A.Y.Dream Admin Page</h1>

<?php
if($mode == 'logged_off') {
    echo '<div class="sect col login">
        <h2>
        <a href="login.php">Login to access summary pages</a>
        </h2>
        </div>';
} else {
    echo '<div class="sect col login">
        <h2>
        <a href="logout.php">Logout</a>
        </h2>
        </div>';
}

?>

<div class="sect col">

    <h2>
        <a href="volunteerSummary.php"   <?php if ($mode == 'logged_off') {    echo 'class = \'disabled\'';  }   ?>   >Volunteer Summary</a>    </h2>
    <h2>
        <a href="form.php">Volunteer Form</a>
    </h2>

</div>

<div class="sect col">

    <h2>
        <a href="youthSummary.php"      <?php if ($mode == 'logged_off') {    echo 'class = \'disabled\'';  }   ?>    >Dreamer Summary  </a>
    </h2>
    <h2>
        <a href="welcome.html">Dreamer Form</a>
    </h2>

</div>

<div class="sect col login">

    <h2>
        <a href="dreamail.php"   <?php if ($mode == 'logged_off') {    echo 'class = \'disabled\'';  }   ?>   >Mass Email</a>
    </h2>


</div>



</body>
</html>