<?php
/*  iDayDream Youth Summary
    Original Author:    Paul Garton
    Last Modified by:   Dallas Sloan
    Creation Date:      11/10/2019
    Last Modified Date: 12/08/2019
    Filename:           volunteerSummary.php
*/
//Turn on error reporting -- this is critical!
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// print_r($_POST);

session_start();

if (!isset($_SESSION['username'])){
    header('location: login.php?source=volunteerSummary.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iDayDream Volunteer Summary</title>

  <link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5dabc823c0e45245a9c250cd/1571544129492-S9RDI79OWVWOWVJEJG7E/ke17ZwdGBToddI8pDm48kJycfsYb1urLU93EpFqOTQmoCXeSvxnTEQmG4uwOsdIceAoHiyRoc52GMN5_2H8Wp7zww8OjRrqjaM7_0x6HDLp42EP6IAa5vAmscK3sHI4MkNL5tmfZ3otlI9yi1IzH2Q/favicon.ico">


  <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="styles/summary.css">
  <link rel="stylesheet" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
<body>

    <script>document.body.style.display = "none";</script>

<h3>Volunteer Summary</h3>
<div class="contain">


  <?php
  $user = posix_getpwuid(posix_getuid());
  $userDir = $user['dir'];
  require ("$userDir/connect.php");
  //connect2 was used to initially build out the sql statements on local computer
  //require("connect2.php");

  //checking to see if there is a post array
//  echo var_dump($_POST);
  if (!isset($_POST['filterStatus'])){
      //initialing the filter variable
      $filter = null;
  }
  else{
      $filter=$_POST['filterStatus'];
  }

  //Define the query Now have two queries depending on $filter status
  if ($filter == 4 || $filter == null) {
      $sqlM = 'select volunteer_id, active, first_name, last_name, home_phone, email,
            concat(address1, " ", address2) as "address", city, zip_code, states_code,
            case when add_to_mailing_list > 0 then "Yes" else "No" end as add_to_mailing_list,
            case when policy_agreement > 0 then "Yes" else "No" end as policy_agreement,
            case when weekend_availability > 0 then "Yes" else "No" end as weekend_availability, 
            case when summer_camp_availability > 0 then "Yes" else "No" end as summer_camp_availability,
            case when background_check_agreement > 0 then "Yes" else "No" end as background_check_agreement,
            null as roles, other_role_text, shirt_size, lead, 
            case when special_skills > 0 then "Yes" else "No" end as special_skills, 
            case when youth_volunteer_exp > 0 then "Yes" else "No" end as youth_volunteer_exp,
            case when non_youth_volunteer_exp > 0 then "Yes" else "No" end as non_youth_volunteer_exp,
            special_skills_text, youth_volunteer_exp_text, non_youth_volunteer_exp_text, null as ref1, null as ref2, null as ref3
          from v_volunteers';
  }
  else{
      $sqlM = "select volunteer_id, active, first_name, last_name, home_phone, email,
            concat(address1, \" \", address2) as \"address\", city, zip_code, states_code,
            case when add_to_mailing_list > 0 then \"Yes\" else \"No\" end as add_to_mailing_list,
            case when policy_agreement > 0 then \"Yes\" else \"No\" end as policy_agreement,
            case when weekend_availability > 0 then \"Yes\" else \"No\" end as weekend_availability, 
            case when summer_camp_availability > 0 then \"Yes\" else \"No\" end as summer_camp_availability,
            case when background_check_agreement > 0 then \"Yes\" else \"No\" end as background_check_agreement,
            null as roles, other_role_text, shirt_size, lead, 
            case when special_skills > 0 then \"Yes\" else \"No\" end as special_skills, 
            case when youth_volunteer_exp > 0 then \"Yes\" else \"No\" end as youth_volunteer_exp,
            case when non_youth_volunteer_exp > 0 then \"Yes\" else \"No\" end as non_youth_volunteer_exp,
            special_skills_text, youth_volunteer_exp_text, non_youth_volunteer_exp_text, null as ref1, null as ref2, null as ref3
          from v_volunteers
          where active = '$filter';";
  }

  //removed active clause from SQL statement
  //where active = 1;

  //Send the query to the database
  $resultM = mysqli_query($cnxn, $sqlM);
  // var_dump($resultM);

  ?>

    <!-- Creating a filter dropdown for Active, Inactive, and Pending -->
    <!-- look into a bootstrap class to add the button to the select -->

    <br>
    <form class = "filterForm" method="post" action = "volunteerSummary.php">
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


    <table id="volunteer-table" class="display">
    <thead>
    <tr>
      <th>Volunteer ID</th>
        <th>Status</th>
      <th>Last Name</th>
      <th>First Name</th>
      <th>Home Phone</th>
      <th>Email</th>
      <th>Address</th>
      <th>City</th>
      <th>State</th>
      <th>Zip</th>
      <th>Special Skills</th>
      <th>Special Skills Text</th>
      <th>Youth Volunteer Experience</th>
      <th>Youth Volunteer Experience Text</th>
      <th>non-Youth Volunteer Experience</th>
      <th>non-Youth Volunteer Experience Text</th>
      <th>Mailing List</th>
      <th>Policy Agreement</th>
      <th>Weekend Availability</th>
      <th>Summer Camp Availability</th>
      <th>Background Check Agreement</th>
      <th>Shirt Size</th>
      <th>Lead</th>
      <th>Roles</th>
      <th>Other Role Text</th>
      <th>Reference 1</th>
      <th>Reference 2</th>
      <th>Reference 3</th>
    </tr>
    </thead>
    <tbody>

    <?php
    //Print the results
    while ($rowM = mysqli_fetch_assoc($resultM)) {
      $volunteerID = $rowM['volunteer_id'];
      $status = $rowM['active'];
      $firstName = $rowM['first_name'];
      $lastName = $rowM['last_name'];
      $homePhone = $rowM['home_phone'];
      $email = $rowM['email'];
      $address = $rowM['address'];
      $city = $rowM['city'];
      $state = $rowM['states_code'];
      $zip = $rowM['zip_code'];
      $specialSkills = $rowM['special_skills'];
      $specialSkillsText = $rowM['special_skills_text'];
      $youthVolExp = $rowM['youth_volunteer_exp'];
      $youthVolExpText = $rowM['youth_volunteer_exp_text'];
      $nonYouthVolExp = $rowM['non_youth_volunteer_exp'];
      $nonYouthVolExpText = $rowM['non_youth_volunteer_exp_text'];
      $mailing = $rowM['add_to_mailing_list'];
      $policy = $rowM['policy_agreement'];
      $weekend = $rowM['weekend_availability'];
      $summer = $rowM['summer_camp_availability'];
      $background = $rowM['background_check_agreement'];
      $shirtSize = $rowM['shirt_size'];
      $lead = $rowM['lead'];
      $roles = $rowM['roles'];
      $roleText = $rowM['other_role_text'];
      $ref1 = $rowM['ref1'];
      $ref2 = $rowM['ref2'];
      $ref3 = $rowM['ref3'];



      echo "<tr>
      <td>$volunteerID</td>
      <td><select class='activeStatus' id='status' name='status' data-vid = '$volunteerID'>";
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
      <td>$address</td>
      <td>$city</td>
      <td>$state</td>
      <td>$zip</td>
      <td>$specialSkills</td>
      <td>$specialSkillsText</td>
      <td>$youthVolExp</td>
      <td>$youthVolExpText</td>
      <td>$nonYouthVolExp</td>
      <td>$nonYouthVolExpText</td>
      <td>$mailing</td>
      <td>$policy</td>
      <td>$weekend</td>
      <td>$summer</td>
      <td>$background</td>
      <td>$shirtSize</td>
      <td>$lead</td>";


      $roles = "";
      $sqlR = "select role
          from v_volunteer_roles
          where volunteer_id = {$volunteerID};";

      $resultR = mysqli_query($cnxn, $sqlR);
      while ($row = mysqli_fetch_row($resultR)) {
        if (strlen($roles) > 1) {
          $roles = $roles . " : ";
        }

          $roles = $roles . $row[0];
      }
      echo "<td>$roles</td>";
      echo "<td>$roleText</td>";

      $sqlD = "select id as reference_id, volunteers_id, active, full_name, phone_number,
            email, relationship
          from volunteer_references
          where volunteers_id = {$volunteerID};";
      $resultD = mysqli_query($cnxn, $sqlD);
      $row_cnt = $resultD->num_rows;
      if ($row_cnt > 2) {
        $row = mysqli_fetch_row($resultD);
        $ref3 = $row[3] . " : " . $row[4] . " : " . $row[5] . " :  " . $row[6];
      }

      if ($row_cnt > 1) {
        $row = mysqli_fetch_row($resultD);
        $ref2 = $row[3] . " : " . $row[4] . " : " . $row[5] . " :  " . $row[6];
      }

      if ($row_cnt > 0) {
        $row = mysqli_fetch_row($resultD);
        $ref1 = $row[3] . " : " . $row[4] . " : " . $row[5] . " :  " . $row[6];
      }

      echo "<td>$ref1</td>";
      echo "<td>$ref2</td>";
      echo "<td>$ref3</td>";
      echo "</tr>";
    }
    ?>
    </tbody>
  </table>

  <a id = "add" href="form.html">Add a new Volunteer</a>
  <a id = "toMail" href="dreamail.php?source=volunteers">Mass Email to Volunteers</a>
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
        $('#volunteer-table').DataTable( {
            "order": [[ 0, 'desc' ]],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return 'Details for: ' +data[3] + ' ' +data[2];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll()
                }
            }
        } );
    } );

    //function to updte status within database
    $('.activeStatus').on('change', function(){
        var status =$(this).val();
        var vID = $(this).attr('data-vid');
        alert("Status has been updated");

        $.post("updateStatusVol.php", {status:status, vID:vID});
    });

    //function to update status within  database within modal
    $(document).on( 'click', 'div.dtr-modal select', function () {
        $('.activeStatus').on('change', function(){
            console.log($(this));
            let status = $(this).val();
            let vID =  $(this).attr('data-vid');
            alert("Status has been updated, please refresh page for change to appear.");

            $.post("updateStatusVol.php", {status:status, vID:vID});
        });
    } );

</script>

</body>
</html>
