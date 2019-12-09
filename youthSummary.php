<?php
/*  iDayDream Youth Summary
    Original Author:    Paul Garton
    Last Modified by:   Dallas Sloan
    Creation Date:      11/10/2019
    Last Modified Date: 12/09/2019
    Filename:           youthSummary.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
// print_r($_POST);

session_start();

if (!isset($_SESSION['username'])){
    header('location: login.php?source=youthSummary.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>iDayDream Dreamer Summary</title>

    <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">


    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="styles/summary.css">
    <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<body>

<script>document.body.style.display = "none";</script>
<h3>Dreamer Summary</h3>
<div class="contain">


  <?php
  $user = posix_getpwuid(posix_getuid());
  $userDir = $user['dir'];
  require ("$userDir/connect.php");

  //connect2 was used to initially build out the sql statements on local computer
  //require("connect2.php");

  //checking to see if there is a post array
 // echo var_dump($_POST);
  if (!isset($_POST['filterStatus'])){
      //initialing the filter variable
      $filter = null;
  }
  else{
      $filter=$_POST['filterStatus'];
  }

  //Define the query Now have two queries depending on $filter status
  if ($filter == 4 || $filter == null) {
      $sql = 'select dreamer_id, active, first_name, last_name, home_phone, email, graduating_class, college_of_interest,
            career_aspirations, food_snacks, date_of_birth, gender, ethnicity_all, guardian_full_name,
            guardian_phone, guardian_email, created, last_updated
          from v_dreamers;';
  }
  else{
      $sql = "select dreamer_id, active, first_name, last_name, home_phone, email, graduating_class, college_of_interest,
            career_aspirations, food_snacks, date_of_birth, gender, ethnicity_all, guardian_full_name,
            guardian_phone, guardian_email, created, last_updated
          from v_dreamers
          where active = '$filter';";

  }

  //removed active clause from SQL statement
  //where active = 1

  //Send the query to the database
  $result = mysqli_query($cnxn, $sql);
  //var_dump($result);
  ?>

    <!-- Creating a filter dropdown for Active, Inactive, and Pending -->
    <!-- look into a bootstrap class to add the button to the select -->

    <br>
    <form class = "filterForm" method="post" action = "youthSummary.php">
    <label for = "filterStatus">Status Filter</label>
    <select class = "dropdown-menu-right" id = "filterStatus" name = "filterStatus">
        <!-- Having the correct Value selected after a Filter has been completed -->
        <?php
        echo "<br>'$filter''";
        if ($filter == 1){
            echo "<option value = '4'>Show All</option>
                  <option value = '1' selected>Show Active</option>
                  <option value = '2'>Show Pending</option>
                  <option value = '0'>Show Inactive</option>";
        }
        elseif($filter == 2){
            echo "<option value = '4'>Show All</option>
                  <option value = '1'>Show Active</option>
                  <option value = '2' selected>Show Pending</option>
                  <option value = '0'>Show Inactive</option>";
        }
        elseif ($filter === '0'){
            echo "<option value = '4'>Show All</option>
                  <option value = '1' >Show Active</option>
                  <option value = '2'>Show Pending</option>
                  <option value = '0' selected>Show Inactive</option>";
        }
        else {
            echo "<option value = '4' selected>Show All</option>
                  <option value = '1' >Show Active</option>
                  <option value = '2'>Show Pending</option>
                  <option value = '0'>Show Inactive</option>";
        }
        ?>
    </select>
        <div class ="d-inline">
            <button id="submit" type="submit" class="btn btn-primary">
                Filter
            </button>
        </div>
    </form>

  <table id="dreamer-table" class="display">
    <thead>
    <tr>
      <th>Dreamer ID</th>
      <th>Status</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Home Phone</th>
      <th>Email</th>
      <th>Class</th>
      <th>College</th>
      <th>Aspirations</th>
      <th>Snack</th>
      <th>DOB</th>
      <th>Gender</th>
      <th>Ethnicity</th>
      <th>Guardian</th>
      <th>Guardian Phone</th>
      <th>Guardian Email</th>
      <th>Created</th>
      <th>Last Updated</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //Print the results
    while ($row = mysqli_fetch_assoc($result)) {
      $dreamerID = $row['dreamer_id'];
      $status = $row['active'];
      $firstName = $row['first_name'];
      $lastName = $row['last_name'];
      $homePhone = $row['home_phone'];
      $email = $row['email'];
      $graduatingClass = $row['graduating_class'];
      $collegeOfInterest = $row['college_of_interest'];
      $careerAspirations = $row['career_aspirations'];
      $foodSnacks = $row['food_snacks'];
      $dateOfBirth = $row['date_of_birth'];
      $gender = $row['gender'];
      $ethnicityAll = $row['ethnicity_all'];
      $guardianFullName = $row['guardian_full_name'];
      $guardianPhone = $row['guardian_phone'];
      $guardianEmail = $row['guardian_email'];
      $created = $row['created'];
      $lastUpdated = $row['last_updated'];
      echo "<tr>
                <td>$dreamerID</td>
                <td><select class='activeStatus' id='status' name='status' data-did = '$dreamerID'>";
                //selecting the correct option from the database
                if ($status == 0){
                    echo"
                    <option value = '0' selected>Inactive</option>
                    <option value = '1'>Active</option>
                    <option value = '2'>Pending</option>";
                }
                if ($status == 1){
                    echo"
                    <option value = '0'>Inactive</option>
                    <option value = '1' selected>Active</option>
                    <option value = '2'>Pending</option>";
                }
                if ($status == 2){
                    echo"
                    <option value = '0'>Inactive</option>
                    <option value = '1'>Active</option>
                    <option value = '2' selected>Pending</option>";
                 }
                echo"
                </td>
                <td>$lastName</td>
                <td>$firstName</td>
                <td>$homePhone</td>
                <td>$email</td>
                <td>$graduatingClass</td>
                <td>$collegeOfInterest</td>
                <td>$careerAspirations</td>
                <td>$foodSnacks</td>
                <td>$dateOfBirth</td>
                <td>$gender</td>
                <td>$ethnicityAll</td>
                <td>$guardianFullName</td>
                <td>$guardianPhone</td>
                <td>$guardianEmail</td>
                <td>$created</td>
                <td>$lastUpdated</td>
              </tr>";
        }
        ?>

        </tbody>
    </table>

    <a id = "add" href="welcome.html">Add a new Dreamer</a>
    <a id = "toMail" href="dreamail.php?source=dreamers">Mass Email to Dreamers</a>
    <a id = "toIndex" href="index.php">Return to Index Page</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        document.body.style.display = "block";
        var DTable = $('#dreamer-table');
        DTable.DataTable( {
            "order": [[ 0, 'desc' ]],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Details for Name: '+data[3] + ' ' +data[2];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                }
            }
        } );
    } );

    $('.activeStatus').on('change', function(){
        let status =$(this).val();
        let dID = $(this).attr('data-did');
        alert("Status has been updated");

        $.post("updateStatusDream.php", {status:status, dID:dID});
    });

    //function to update database within modal
    $(document).on( 'click', 'div.dtr-modal select', function () {
        $('.activeStatus').on('change', function(){
            console.log($(this));
            let status = $(this).val();
            let dID =  $(this).attr('data-did');
            alert("Status has been updated, please refresh page for change to appear.");

            $.post("updateStatusDream.php", {status:status, dID:dID});
        });
    } );

    $('#filterStatus').on('change,', function(){
        var filter = $(this).val();
        $.post("updateFilterDream.php", {filter:filter});

    });

</script>

</body>
</html>
