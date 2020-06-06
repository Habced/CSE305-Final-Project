<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CSE305 Final Project</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

  </head>
  <body>
    <style>
      body {
        background-color: #eee;
      }

      .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
      }

      .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 5px 5px;
        transition: 0.3s;
      }

      .tab button:hover {
        background-color: #ddd;
      }

      .tab button.active {
        background-color: #ccc;
      }

      .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
      }
    </style>
    <?php 
      $dbhost = "us-cdbr-east-06.cleardb.net";
      $dbuser = "b2b72fbf85a330";
      $dbpass = "81dc8793";
      $db = "heroku_6c43a54853056c9";
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
      
      if ( $conn->connect_error) {
        die("Connect failed: %s\n". $conn->connect_error);
      }
      // SQL and QUERY example
      // $sql = "SELECT * FROM Products";
      // $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
      // while( $row = mysqli_fetch_array($query)) {
      //   echo "<br>" . $row['model'] . "<br>";
      // }
      
      // Print out all $row
      // foreach($row as $cname => $cvalue){
      //   print "$cname: $cvalue\t";
      // }
      // print "\r\n";

      
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      // https://tryphp.w3schools.com/showphp.php?filename=demo_form_validation_complete
      // define variables and set to empty values
      // $__open = $__out = $__fields = $__fieldsErr = "";
      
      /* #region Initializing Create Variables */
      $create_location_open = $create_location_out = ""; 
      $create_location_bldgMgmtNo = $create_location_zip_no = $create_location_jibun_juso = "";
      $create_location_bldgMgmtNoErr = $create_location_zip_noErr = $create_location_jibun_jusoErr = "";
      
      $create_business_open = $create_business_out = "";
      $create_business_name = $create_business_located_in = $create_business_addr_detail = "";
      $create_business_nameErr = $create_business_located_inErr = $create_business_addr_detailErr = "";

      $create_restaurant_open = $create_restaurant_out = "";
      $create_restaurant_restaurant_id = $create_restaurant_weekday_open_time = $create_restaurant_weekday_end_time = $create_restaurant_weekend_open_time = $create_restaurant_weekend_end_time
      = $create_restaurant_weekly_break_date = $create_restaurant_create_date = $create_restaurant_last_update = $create_restaurant_is_active = "";
      $create_restaurant_restaurant_idErr = $create_restaurant_weekday_open_timeErr = $create_restaurant_weekday_end_timeErr = $create_restaurant_weekend_open_timeErr = $create_restaurant_weekend_end_timeErr
      = $create_restaurant_has_weekly_breakErr = $create_restaurant_weekly_break_dateErr = $create_restaurant_create_dateErr = $create_restaurant_last_updateErr = $create_restaurant_is_activeErr = "";

      $create_cuisine_open = $create_cuisine_out = "";
      $create_cuisine_cuisine_type = $create_cuisine_cuisine_info = "";
      $create_cuisine_cuisine_typeErr = $create_cuisine_cuisine_infoErr = "";

      $create_serves_open = $create_serves_out = "";
      $create_serves_served_at = $create_serves_serving = "";
      $create_serves_served_atErr = $create_serves_servingErr = "";

      $create_person_open = $create_person_out = "";
      $create_person_person_id = $create_person_fullname = $create_person_email = $create_person_username = $create_person_password = $create_person_create_date
      = $create_person_last_update = $create_person_is_active = "";
      $create_person_person_idErr = $create_person_fullnameErr = $create_person_emailErr = $create_person_usernameErr = $create_person_passwordErr = $create_person_create_dateErr
      = $create_person_last_updateErr = $create_person_is_activeErr = "";

      $create_works_at_open = $create_works_at_out = "";
      $create_works_at_works_for = $create_works_at_employed = $create_works_at_employee_type = "";
      $create_works_at_works_forErr = $create_works_at_employedErr = $create_works_at_employee_typeErr = "";

      $create_restaurant_review_open = $create_restaurant_review_out = 
      $create_restaurant_review_review_id = $create_restaurant_review_reviewed_by = $create_restaurant_review_reviewed_restaurant= $create_restaurant_review_review_star = $create_restaurant_review_review_content = $create_restaurant_review_create_date= $create_restaurant_review_last_update = $create_restaurant_review_is_active=
      $create_restaurant_review_review_idErr = $create_restaurant_review_reviewed_byErr = $create_restaurant_review_reviewed_restaurantErr = $create_restaurant_review_review_starErr = $create_restaurant_review_review_contentErr = $create_restaurant_review_create_dateErr= $create_restaurant_review_last_updateErr = $create_restaurant_review_is_activeErr="";
      $create_review_followup_open = $create_review_followup_out = 
      $create_review_followup_followup_id= $create_review_followup_followed_up_by = $create_review_followup_for_review= $create_review_followup_followup_content =$create_review_followup_create_date =$create_review_followup_last_update = $create_review_followup_is_active=
      $create_review_followup_followup_idErr= $create_review_followup_followed_up_byErr = $create_review_followup_for_reviewErr= $create_review_followup_followup_contentErr =$create_review_followup_create_dateErr =$create_review_followup_last_updateErr = $create_review_followup_is_activeErr=""; 
      $create_restaurant_discussion_open = $create_restaurant_discussion_out = 
      $create_restaurant_discussion_discussion_id=$create_restaurant_discussion_discussed_by=$create_restaurant_discussion_discussed_restaurant = $create_restaurant_discussion_discussion_content = $create_restaurant_discussion_create_date =$create_restaurant_discussion_last_update= $create_restaurant_discussion_is_active =
      $create_restaurant_discussion_discussion_idErr=$create_restaurant_discussion_discussed_byErr=$create_restaurant_discussion_discussed_restaurantErr = $create_restaurant_discussion_discussion_contentErr = $create_restaurant_discussion_create_dateErr =$create_restaurant_discussion_last_updateErr= $create_restaurant_discussion_is_activeErr ="";
      $create_discussion_reply_open = $create_discussion_reply_out = 
      $create_discussion_reply_reply_id = $create_discussion_reply_replied_by = $create_discussion_reply_for_discussion = $create_discussion_reply_reply_content =$create_discussion_reply_create_date = $create_discussion_reply_last_update = $create_discussion_reply_is_active =
      $create_discussion_reply_reply_idErr = $create_discussion_reply_replied_byErr = $create_discussion_reply_for_discussionErr = $create_discussion_reply_reply_contentErr =$create_discussion_reply_create_dateErr = $create_discussion_reply_last_updateErr = $create_discussion_reply_is_activeErr ="";
      /* #endregion */

      /* #region Initializing Read Variables */
      $read_location_open = $read_location_out = "";
      $read_business_open = $read_business_out = "";
      $read_restaurant_open = $read_restaurant_out = "";
      $read_cuisine_open = $read_cuisine_out = "";
      $read_serves_open = $read_serves_out = "";
      $read_person_open = $read_person_out = "";
      $read_works_at_open = $read_works_at_out = "";
   
      $read_restaurant_review_open = $read_restaurant_review_out = 
      $read_restaurant_review_review_id = $read_restaurant_review_reviewed_by = $read_restaurant_review_reviewed_restaurant= $read_restaurant_review_review_star = $read_restaurant_review_review_content = $read_restaurant_review_read_date= $read_restaurant_review_last_update = $read_restaurant_review_is_active=
      $read_restaurant_review_review_idErr = $read_restaurant_review_reviewed_byErr = $read_restaurant_review_reviewed_restaurantErr = $read_restaurant_review_review_starErr = $read_restaurant_review_review_contentErr = $read_restaurant_review_read_dateErr= $read_restaurant_review_last_updateErr = $read_restaurant_review_is_activeErr="";
      $read_review_followup_open = $read_review_followup_out = 
      $read_review_followup_followup_id= $read_review_followup_followed_up_by = $read_review_followup_for_review= $read_review_followup_followup_content =$read_review_followup_read_date =$read_review_followup_last_date = $read_review_followup_is_active=
      $read_review_followup_followup_idErr= $read_review_followup_followed_up_byErr = $read_review_followup_for_reviewErr= $read_review_followup_followup_contentErr =$read_review_followup_read_dateErr =$read_review_followup_last_dateErr = $read_review_followup_is_activeErr=""; 
      $read_restaurant_discussion_open = $read_restaurant_discussion_out = 
      $read_restaurant_discussion_discussion_id=$read_restaurant_discussion_discussed_by=$read_restaurant_discussion_discussed_restaurant = $read_restaurant_discussion_discussion_content = $read_restaurant_discussion_read_date =$read_restaurant_discussion_last_update= $read_restaurant_discussion_is_active =
      $read_restaurant_discussion_discussion_idErr=$read_restaurant_discussion_discussed_byErr=$read_restaurant_discussion_discussed_restaurantErr = $read_restaurant_discussion_discussion_contentErr = $read_restaurant_discussion_read_dateErr =$read_restaurant_discussion_last_updateErr= $read_restaurant_discussion_is_activeErr ="";
      $read_discussion_reply_open = $read_discussion_reply_out = 
      $read_discussion_reply_reply_id = $read_discussion_reply_replied_by = $read_discussion_reply_for_discussion = $read_discussion_reply_reply_content =$read_discussion_reply_read_date = $read_discussion_reply_last_update = $read_discussion_reply_is_active =
      $read_discussion_reply_reply_idErr = $read_discussion_reply_replied_byErr = $read_discussion_reply_for_discussionErr = $read_discussion_reply_reply_contentErr =$read_discussion_reply_read_dateErr = $read_discussion_reply_last_updateErr = $read_discussion_reply_is_activeErr ="";
      /* #endregion */

      /* #region Initializing Update Variables */
      $update_location_open = $update_location_out = "";
      $update_business_open = $update_business_out = "";
      $update_restaurant_open = $update_restaurant_out = "";
      $update_cuisine_open = $update_cuisine_out = "";
      $update_serves_open = $update_serves_out = "";
      $update_person_open = $update_person_out = "";
      $update_works_at_open = $update_works_at_out = "";
  
      $update_restaurant_review_open = $update_restaurant_review_out = 
      $update_restaurant_review_review_id = $update_restaurant_review_reviewed_by = $update_restaurant_review_reviewed_restaurant= $update_restaurant_review_review_star = $update_restaurant_review_review_content = $update_restaurant_review_update_date= $update_restaurant_review_last_update = $update_restaurant_review_is_active=
      $update_restaurant_review_review_idErr = $update_restaurant_review_reviewed_byErr = $update_restaurant_review_reviewed_restaurantErr = $update_restaurant_review_review_starErr = $update_restaurant_review_review_contentErr = $update_restaurant_review_update_dateErr= $update_restaurant_review_last_updateErr = $update_restaurant_review_is_activeErr="";
      $update_review_followup_open = $update_review_followup_out =
      $update_review_followup_followup_id= $update_review_followup_followed_up_by = $update_review_followup_for_review= $update_review_followup_followup_content =$update_review_followup_update_date =$update_review_followup_last_date = $update_review_followup_is_active=
      $update_review_followup_followup_idErr= $update_review_followup_followed_up_byErr = $update_review_followup_for_reviewErr= $update_review_followup_followup_contentErr =$update_review_followup_update_dateErr =$update_review_followup_last_dateErr = $update_review_followup_is_activeErr=""; 
      $update_restaurant_discussion_open = $update_restaurant_discussion_out = 
      $update_restaurant_discussion_discussion_id=$update_restaurant_discussion_discussed_by=$update_restaurant_discussion_discussed_restaurant = $update_restaurant_discussion_discussion_content = $update_restaurant_discussion_update_date =$update_restaurant_discussion_last_update= $update_restaurant_discussion_is_active =
      $update_restaurant_discussion_discussion_idErr=$update_restaurant_discussion_discussed_byErr=$update_restaurant_discussion_discussed_restaurantErr = $update_restaurant_discussion_discussion_contentErr = $update_restaurant_discussion_update_dateErr =$update_restaurant_discussion_last_updateErr= $update_restaurant_discussion_is_activeErr ="";
      $update_discussion_reply_open = $update_discussion_reply_out = 
      $update_discussion_reply_reply_id = $update_discussion_reply_replied_by = $update_discussion_reply_for_discussion = $update_discussion_reply_reply_content =$update_discussion_reply_update_date = $update_discussion_reply_last_update = $update_discussion_reply_is_active =
      $update_discussion_reply_reply_idErr = $update_discussion_reply_replied_byErr = $update_discussion_reply_for_discussionErr = $update_discussion_reply_reply_contentErr =$update_discussion_reply_update_dateErr = $update_discussion_reply_last_updateErr = $update_discussion_reply_is_activeErr ="";
      /* #endregion */

      /* #region Initializing Delete Variables */
      $delete_location_open = $delete_location_out = "";
      $delete_business_open = $delete_business_out = "";
      $delete_restaurant_open = $delete_restaurant_out = "";
      $delete_cuisine_open = $delete_cuisine_out = "";
      $delete_serves_open = $delete_serves_out = "";
      $delete_person_open = $delete_person_out = "";
      $delete_works_at_open = $delete_works_at_out = "";

      $delete_restaurant_review_open = $delete_restaurant_review_out = 
      $delete_restaurant_review_review_id = $delete_restaurant_review_reviewed_by = $delete_restaurant_review_reviewed_restaurant= $delete_restaurant_review_review_star = $delete_restaurant_review_review_content = $delete_restaurant_review_delete_date= $delete_restaurant_review_last_update = $delete_restaurant_review_is_active=
      $delete_restaurant_review_review_idErr = $delete_restaurant_review_reviewed_byErr = $delete_restaurant_review_reviewed_restaurantErr = $delete_restaurant_review_review_starErr = $delete_restaurant_review_review_contentErr = $delete_restaurant_review_delete_dateErr= $delete_restaurant_review_last_updateErr = $delete_restaurant_review_is_activeErr="";
      $delete_review_followup_open = $delete_review_followup_out = 
      $delete_review_followup_followup_id= $delete_review_followup_followed_up_by = $delete_review_followup_for_review= $delete_review_followup_followup_content =$delete_review_followup_delete_date =$delete_review_followup_last_date = $delete_review_followup_is_active=
      $delete_review_followup_followup_idErr= $delete_review_followup_followed_up_byErr = $delete_review_followup_for_reviewErr= $delete_review_followup_followup_contentErr =$delete_review_followup_delete_dateErr =$delete_review_followup_last_dateErr = $delete_review_followup_is_activeErr=""; 
      $delete_restaurant_discussion_open = $delete_restaurant_discussion_out = 
      $delete_restaurant_discussion_discussion_id=$delete_restaurant_discussion_discussed_by=$delete_restaurant_discussion_discussed_restaurant = $delete_restaurant_discussion_discussion_content = $delete_restaurant_discussion_delete_date =$delete_restaurant_discussion_last_update= $delete_restaurant_discussion_is_active =
      $delete_restaurant_discussion_discussion_idErr=$delete_restaurant_discussion_discussed_byErr=$delete_restaurant_discussion_discussed_restaurantErr = $delete_restaurant_discussion_discussion_contentErr = $delete_restaurant_discussion_delete_dateErr =$delete_restaurant_discussion_last_updateErr= $delete_restaurant_discussion_is_activeErr ="";
      $delete_discussion_reply_open = $delete_discussion_reply_out = 
      $delete_discussion_reply_reply_id = $delete_discussion_reply_replied_by = $delete_discussion_reply_for_discussion = $delete_discussion_reply_reply_content =$delete_discussion_reply_delete_date = $delete_discussion_reply_last_update = $delete_discussion_reply_is_active =
      $delete_discussion_reply_reply_idErr = $delete_discussion_reply_replied_byErr = $delete_discussion_reply_for_discussionErr = $delete_discussion_reply_reply_contentErr =$delete_discussion_reply_delete_dateErr = $delete_discussion_reply_last_updateErr = $delete_discussion_reply_is_activeErr ="";
      /* #endregion */

      // // 
      // $create_location_open = "is_open";
      //   if (empty($_POST["a_field1"])) {
      //     $a_field1Err = "You must enter a value for field1";
      //   }
      //   if( $a_field1Err === "" ) {
      //     $a_field1 = test_input($_POST["a_field1"]);
      //     $sql = "SELECT * FROM playground_tests;";
      //     $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
      //     $a_out = ""; // eg<table><thead><tr><td>a_field1</td></tr></thead><tbody>
      //     while( $row = mysqli_fetch_array($query)) {
      //       $a_out = $a_out . "<tr><td>" . $row['maker'] . "</td>";
      //       $a_out = $a_out . "<td>" . $row['model'] . "</td>";
      //       $a_out = $a_out . "<td>" . $row['speed'] . "</td>";
      //       $a_out = $a_out . "<td>" . $row['price'] . "</td></tr>";
      //     }
      //     $create_location_out = $create_location_out . ""; // eg </tbody></table>

      function read_restaurant() {
        /* #region  read_restaurant */
        global $conn;
        $sql = "SELECT * FROM restaurant;";
        $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
        $read_restaurant_out = "";
        while( $row = mysqli_fetch_array($query)) {
          $read_restaurant_out = $read_restaurant_out . "<tr><td>" . $row['restaurant_id'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['weekday_open_time'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['weekday_end_time'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['weekend_open_time'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['weekend_end_time'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['weekly_break_date'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['create_date'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['last_update'] . "</td>";
          $read_restaurant_out = $read_restaurant_out . "<td>" . $row['is_active'] . "</td></tr>";
        }
        if (empty($read_restaurant_out)){
          $read_restaurant_out = "No result";
        } else {
          $read_restaurant_out = "<table><thead>"
        . "<tr><th>restaurant_id</th><th>weekday_open_time</th><th>weekday_end_time</th><th>weekend_open_time</th><th>weekend_end_time</th>"
        . "<th>weekly_break_date</th><th>create_date</th><th>last_update</th><th>is_active</th></tr></thead><tbody>" . $read_restaurant_out . "</table>";
        }
        return $read_restaurant_out;
        /* #endregion */
      }
      function read_person() {
        /* #region read_person */
        global $conn;
        $sql = "SELECT * FROM person;";
        $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
        $read_person_out = ""; // eg<table><thead><tr><td>a_field1</td></tr></thead><tbody>
        while( $row = mysqli_fetch_array($query)) {
          $read_person_out = $read_person_out . "<tr><td>" . $row['person_id'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['fullname'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['email'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['username'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['password'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['create_date'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['last_update'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['is_active'] . "</td></tr>";
        }
        if (empty($read_person_out)){
          $read_person_out = "No result";
        } else {
          $read_person_out = "<table><thead>"
        . "<tr><th>person_id</th><th>fullname</th><th>email</th><th>username</th><th>password</th>"
        . "<th>create_date</th><th>last_update</th><th>is_active</th></tr></thead><tbody>" . $read_person_out . "</table>";
        }
        return $read_person_out;
        /* #endregion */
      }
      function read_works_at() {
        /* #region  read_works_at */
        global $conn;
        $sql = "SELECT * FROM works_at;";
        $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
        $read_works_at_out = "";
        while( $row = mysqli_fetch_array($query)) {
          $read_works_at_out = $read_works_at_out . "<tr><td>" . $row['works_for'] . "</td>";
          $read_works_at_out = $read_works_at_out . "<td>" . $row['employed'] . "</td>";
          $read_works_at_out = $read_works_at_out . "<td>" . $row['employee_type'] . "</td></tr>";
        }
        if (empty($read_works_at_out)){
          $read_works_at_out = "No result";
        } else {
          $read_works_at_out = "<table><thead>"
          . "<tr><th>works_for</th><th>employed</th><th>employee_type</th></tr>" . $read_works_at_out . "</table>";
        }
        return $read_works_at_out;
        /* #endregion */
      }
      // Hand multiple submits in a single file
      //https://www.techrepublic.com/article/handling-multiple-submits-in-a-single-form-with-php/
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

          /* #region submit_form_create_location */
        if ( isset($_POST["submit_form_create_location"] )){ 
          $create_location_open = "is_open";
          if (empty($_POST["create_location_bldgMgmtNo"])) { 
            $create_location_bldgMgmtNoErr = "You must enter a value for bldgMgmtNo"; 
          } else {
            $create_location_bldgMgmtNo = test_input($_POST["create_location_bldgMgmtNo"]);
          }
          if (empty($_POST["create_location_zip_no"])) { 
            $create_location_zip_noErr = "You must enter a value for zip_no"; 
          } 
          elseif (strlen($_POST["create_location_zip_no"]) > 7) {
            $create_location_zip_noErr = "Value zip_no is too long. Must be under 7 characters"; 
          } else {
            $create_location_zip_no = test_input($_POST["create_location_zip_no"]);
          }
          if (empty($_POST["create_location_jibun_juso"])) { 
            $create_location_jibun_jusoErr = "You must enter a value for field1"; 
          } else {
            $create_location_jibun_juso = test_input($_POST["create_location_jibun_juso"]);
          }
          if( $create_location_bldgMgmtNoErr === "" && $create_location_zip_noErr === "" && $create_location_jibun_jusoErr === "" ) {
            $sql = "INSERT INTO location (bldgMgmtNo, zip_no, jibun_juso, create_date, last_update, is_active) VALUES (" . $create_location_bldgMgmtNo . ", \"" . $create_location_zip_no . "\", \"" . $create_location_jibun_juso . "\", \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_location_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_business"] )){ 
          /* #region submit_form_create_business */
          $create_business_open = "is_open";
          if (empty($_POST["create_business_name"])) { 
            $create_business_nameErr = "You must enter a value for Name"; 
          } else {
            $create_business_name = test_input($_POST["create_business_name"]);
          }
          if (empty($_POST["create_business_located_in"])) { 
            $create_business_located_inErr = "You must enter a value for location"; 
          } else {
            $create_business_located_in = test_input($_POST["create_business_located_in"]);
          }
          if (empty($_POST["create_business_addr_detail"])) {
            $create_business_addr_detailErr = "You must enter address details"; 
          } else {
            $create_business_addr_detail = test_input($_POST["create_business_addr_detail"]);
          }
          if( $create_business_nameErr === "" && $create_business_located_inErr === "" && $create_business_addr_detailErr === "" ) {
            $sql = "INSERT INTO business (name, located_in, addr_detail, create_date, last_update, is_active) VALUES (\"" . $create_business_name . "\", " . $create_business_located_in . ", \"" . $create_business_addr_detail . "\", \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_business_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_restaurant"] )){ 
          /* #region submit_form_create_restaurant */
          $create_restaurant_open = "is_open";
          if (empty($_POST["create_restaurant_restaurant_id"])){
            $create_restaurant_restaurant_idErr = "You must enter a value for create_restaurant_restaurant_id";
          } else {
            $create_restaurant_restaurant_id = $_POST["create_restaurant_restaurant_id"];
          }
          if (empty($_POST["create_restaurant_weekday_open_time"])) {
            $create_restaurant_weekday_open_timeErr = "You must enter a value for create_restaurant_weekday_open_time";
          } else {
            $create_restaurant_weekday_open_time = test_input($_POST["create_restaurant_weekday_open_time"]);
          }
          if (empty($_POST["create_restaurant_weekday_end_time"])) {
            $create_restaurant_weekday_end_timeErr = "You must enter a value for create_restaurant_weekday_end_time";
          } else {
            $create_restaurant_weekday_end_time = test_input($_POST["create_restaurant_weekday_end_time"]);
          }
          if (empty($_POST["create_restaurant_weekend_open_time"])) {
            $create_restaurant_weekend_open_timeErr = "You must enter a value for create_restaurant_weekend_open_time";
          } else {
            $create_restaurant_weekend_open_time = test_input($_POST["create_restaurant_weekend_open_time"]);
          }
          if (empty($_POST["create_restaurant_weekend_end_time"])) {
            $create_restaurant_weekend_end_timeErr = "You must enter a value for create_restaurant_weekend_end_time";
          } else {
            $create_restaurant_weekend_end_time = test_input($_POST["create_restaurant_weekend_end_time"]);
          }
          if (empty($_POST["create_restaurant_weekly_break_date"])){
            $create_restaurant_weekly_break_dateErr = "You must select a weekly_break_date"; 
          }else {
            $create_restaurant_weekly_break_date = test_input($_POST["create_restaurant_weekly_break_date"]);
          }
          // if (empty($_POST["create_restaurant_create_date"])) {
          //   $create_restaurant_create_dateErr = "You must enter a value for create_restaurant_create_date";
          // } else {
          //   $create_restaurant_create_date = test_input($_POST["create_restaurant_create_date"]);
          // }
          // if (empty($_POST["create_restaurant_last_update"])) {
          //   $create_restaurant_last_updateErr = "You must enter a value for create_restaurant_last_update";
          // } else {
          //   $create_restaurant_last_update = test_input($_POST["create_restaurant_last_update"]);
          // }
          // if (empty($_POST["create_restaurant_is_active"])) {
          //   $create_restaurant_is_activeErr = "You must enter a value for create_restaurant_is_active";
          // } else {
          //   $create_restaurant_is_active = test_input($_POST["create_restaurant_is_active"]);
          // }
          if ($create_restaurant_weekday_open_timeErr === "" && $create_restaurant_weekday_end_timeErr === "" && $create_restaurant_weekend_open_timeErr === "" &&
          $create_restaurant_weekend_end_timeErr === "" && $create_restaurant_has_weekly_breakErr === "" && $create_restaurant_weekly_break_dateErr === "" && 
          $create_restaurant_create_dateErr === "" && $create_restaurant_last_updateErr === "" && $create_restaurant_is_activeErr == "" && $create_restaurant_restaurant_idErr === ""){
            $sql = "INSERT INTO restaurant (restaurant_id, weekday_open_time, weekday_end_time, weekend_open_time, weekend_end_time, weekly_break_date, create_date, last_update, is_active) 
            VALUES (" . $create_restaurant_restaurant_id . ", \"" . $create_restaurant_weekday_open_time . "\", \"" . $create_restaurant_weekday_end_time . "\", \"" 
            . $create_restaurant_weekend_open_time . "\", \"" . $create_restaurant_weekend_end_time . "\", \"" . $create_restaurant_weekly_break_date . "\", \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", " . 1 . ")";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_restaurant_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_cuisine"] )){ 
          /* #region submit_form_create_cuisine */
          $create_cuisine_open = "is_open";
          if (empty($_POST["create_cuisine_cuisine_type"])) { 
            $create_cuisine_cuisine_typeErr = "You must enter a cuisine type"; 
          } else {
            $create_cuisine_cuisine_type = test_input($_POST["create_cuisine_cuisine_type"]);
          }
          if (empty($_POST["create_cuisine_cuisine_info"])) { 
            $create_cuisine_cuisine_infoErr = "You must enter something for cuisine information"; 
          } else {
            $create_cuisine_cuisine_info = test_input($_POST["create_cuisine_cuisine_info"]);
          }
          
          if( $create_cuisine_cuisine_typeErr === "" && $create_cuisine_cuisine_infoErr === "" ) {
            $sql = "INSERT INTO cuisine (cuisine_type, cuisine_info) VALUES (\"" . $create_cuisine_cuisine_type . "\", \"" . $create_cuisine_cuisine_info . "\" )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_cuisine_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_serves"] )){ 
          /* #region submit_form_create_serves */
          $create_serves_open = "is_open";
          if (empty($_POST["create_serves_served_at"])) { 
            $create_serves_served_atErr = "You must enter a serving location"; 
          } else {
            $create_serves_served_at = test_input($_POST["create_serves_served_at"]);
          }
          if (empty($_POST["create_serves_serving"])) { 
            $create_serves_servingErr = "You must enter a cuisine"; 
          } else {
            $create_serves_serving = test_input($_POST["create_serves_serving"]);
          }
          
          if( $create_serves_served_atErr === "" && $create_serves_servingErr === "" ) {
            $sql = "INSERT INTO serves (served_at, serving) VALUES (" . $create_serves_served_at . ", " . $create_serves_serving . " )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_serves_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_person"] )){ 
          /* #region submit_form_create_person */
          $create_person_open = "is_open";
          if (empty($_POST["create_person_person_id"])) {
            $create_person_person_idErr = "You must enter a value for create_person_person_id";
          } else {
            $create_person_person_id = $_POST["create_person_person_id"];
          }
          if (empty($_POST["create_person_fullname"])) {
            $create_person_fullnameErr = "You must enter a value for create_person_fullname";
          } else {
            $create_person_fullname = test_input($_POST["create_person_fullname"]);
          }
          if (empty($_POST["create_person_email"])) {
            $create_person_emailErr = "You must enter a value for create_person_email";
          } else {
            $create_person_email = test_input($_POST["create_person_email"]);
          }
          if (empty($_POST["create_person_username"])) {
            $create_person_usernameErr = "You must enter a value for create_person_username";
          } else {
            $create_person_username = test_input($_POST["create_person_username"]);
          }
          if (empty($_POST["create_person_password"])) {
            $create_person_passwordErr = "You must enter a value for create_person_password";
          } else {
            $create_person_password = htmlspecialchars(stripslashes($_POST["create_person_password"]));
          }
          // if (empty($_POST["create_person_create_date"])) {
          //   $create_person_create_dateErr = "You must enter a value for create_person_create_date";
          // } else {
          //   $create_person_create_date = test_input($_POST["create_person_create_date"]);
          // }
          // if (empty($_POST["create_person_last_update"])) {
          //   $create_person_last_updateErr = "You must enter a value for create_person_last_update";
          // } else {
          //   $create_person_last_update = test_input($_POST["create_person_last_update"]);
          // }
          // if (empty($_POST["create_person_is_active"])) {
          //   $create_person_is_activeErr = "You must enter a value for create_person_is_active";
          // } else {
          //   $create_person_is_active = test_input($_POST["create_person_is_active"]);
          // }
          if ($create_person_person_idErr === "" && $create_person_fullnameErr === "" &&  $create_person_emailErr === "" &&  $create_person_usernameErr === "" &&  
          $create_person_passwordErr === "" && $create_person_is_activeErr === "") {
            $sql = "INSERT INTO person (person_id, fullname, email, username, password, create_date, last_update, is_active) 
            VALUES (" . $create_person_person_id . ", \"" . $create_person_fullname . "\", \"" . $create_person_email . "\", \"" . $create_person_username . "\", \"" 
            . $create_person_password . "\", \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", " .  1 . ")";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_person_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_works_at"] )){ 
          /* #region submit_form_create_works_at */
          $create_works_at_open = "is_open";
          if (empty($_POST["create_works_at_works_for"])) {
            $create_works_at_works_forErr = "You must enter a value for create_works_at_works_for";
          } else {
            $create_works_at_works_for = $_POST["create_works_at_works_for"];
          }
          if (empty($_POST["create_works_at_employed"])) {
            $create_works_at_employedErr = "You must enter a value for create_works_at_employed";
          } else {
            $create_works_at_employed = $_POST["create_works_at_employed"];
          }
          if (empty($_POST["create_works_at_employee_type"])) {
            $create_works_at_employee_typeErr = "You must enter a value for create_works_at_employee_type";
          } else {
            $create_works_at_employee_type = test_input($_POST["create_works_at_employee_type"]);
          }
          if ($create_works_at_works_forErr === "" && $create_works_at_employedErr === "" && $create_works_at_employee_typeErr === "") {
            $sql = "INSERT INTO works_at (works_for, employed, employee_type) 
            VALUES (" . $create_works_at_works_for . ", " . $create_works_at_employed . ", \"" . $create_works_at_employee_type . "\")";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_person_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_restaurant_review"] )){ 
          /* #region submit_form_create_restaurant_review */
          $create_restaurant_review_open = "is_open";
          if (empty($_POST["create_restaurant_review_review_id"])) {
            $create_restaurant_review_review_idErr = "You must enter a value for create_restaurant_review_review_id";
          }else{
            $create_restaurant_review_review_id = test_input($_POST["create_restaurant_review_review_id"]);
          }
          if (empty($_POST["create_restaurant_review_reviewed_by"])) {
            $create_restaurant_review_reviewed_byErr = "You must enter a value for create_restaurant_review_reviewed_by";
          }else{
            $create_restaurant_review_reviewed_by = test_input($_POST["create_restaurant_review_reviewed_by"]);
          }
          if (empty($_POST["create_restaurant_review_reviewed_restaurant"])) {
            $create_restaurant_review_reviewed_restaurantErr = "You must enter a value for create_restaurant_review_reviewed_restaurant";
          }else{
            $create_restaurant_review_reviewed_restaurant = test_input($_POST["create_restaurant_review_reviewed_restaurant"]);
          }
          if (empty($_POST["create_restaurant_review_review_star"])) {
            $create_restaurant_review_review_starErr = "You must enter a value for create_restaurant_review_review_star";
          }else if (($_POST["create_restaurant_review_review_star"]) < 1 || ($_POST["create_restaurant_review_review_star"]) > 5 ){
            $create_restaurant_review_review_starErr = "The rating star ranges from 1 to 5.";

          }else{
            $create_restaurant_review_review_star = test_input($_POST["create_restaurant_review_review_star"]);
          }
          if (empty($_POST["create_restaurant_review_review_content"])) {
            $create_restaurant_review_review_contentErr = "You must enter a value for create_restaurant_review_review_content";
          }else{
            $create_restaurant_review_review_content = test_input($_POST["create_restaurant_review_review_content"]);
          }
          //if (empty($_POST["create_restaurant_review_create_date"])) {
          //   $create_restaurant_review_review_create_dateErr = "You must enter a value for create_restaurant_review_review_create_date";
          // }else{
          //   $create_restaurant_review_create_date = test_input($_POST["create_restaurant_review_create_date"]);
          // }
          // if (empty($_POST["create_restaurant_review_last_update"])) {
          //   $create_restaurant_review_last_updateErr = "You must enter a value for create_restaurant_review_last_update";
          // }else{
          //   $create_restaurant_review_last_update = test_input($_POST["create_restaurant_review_last_update"]);
          // }
          // if (empty($_POST["create_restaurant_review_is_active"])) {
          //   $create_restaurant_review_is_activeErr = "You must enter a value for create_restaurant_review_is_active";
          // }
          // else{
          //   $create_restaurant_review_is_active = test_input($_POST["create_restaurant_review_is_active"]);
          // }
     
          if( $create_restaurant_review_review_idErr === "" && $create_restaurant_review_reviewed_byErr === "" && $create_restaurant_review_reviewed_restaurantErr === ""  && $create_restaurant_review_review_starErr === ""
          && $create_restaurant_review_review_contentErr === "" ) {
            $sql = "INSERT INTO restaurant_review (review_id, reviewed_by, reviewed_restaurant, review_star, review_content, create_date, last_update, is_active) VALUES
             (" . $create_restaurant_review_review_id . ", " . $create_restaurant_review_reviewed_by . ", " . $create_restaurant_review_reviewed_restaurant . ", 
              " . $create_restaurant_review_review_star . ", \"" . $create_restaurant_review_review_content . "\", \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_restaurant_review_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_review_followup"] )){ 
          /* #region submit_form_create_review_followup */
          $create_review_followup_open = "is_open";

          if (empty($_POST["create_review_followup_followup_id"])) {
            $create_review_followup_followup_idErr = "You must enter a value for create_review_followup_followup_id";
          }else{
            $create_review_followup_followup_id = test_input($_POST["create_review_followup_followup_id"]);
          }
          if (empty($_POST["create_review_followup_followed_up_by"])) {
            $create_review_followup_followed_up_byErr = "You must enter a value for create_review_followup_followed_up_by";
          }else{
            $create_review_followup_followed_up_by = test_input($_POST["create_review_followup_followed_up_by"]);
          }
          if (empty($_POST["create_review_followup_for_review"])) {
            $create_review_followup_for_reviewErr = "You must enter a value for create_review_followup_for_review";
          }else{
            $create_review_followup_for_review = test_input($_POST["create_review_followup_for_review"]);
          }
          if (empty($_POST["create_review_followup_followup_content"])) {
            $create_review_followup_followup_contentErr = "You must enter a value for create_review_followup_followup_content";
          }else{
            $create_review_followup_followup_content = test_input($_POST["create_review_followup_followup_content"]);
          }  
          if( $create_review_followup_followup_idErr === "" && $create_review_followup_followed_up_byErr === "" && $create_review_followup_for_reviewErr === ""
          && $create_review_followup_followup_contentErr === "" ) {
            $sql = "INSERT INTO review_followup (followup_id, followed_up_by, for_review, followup_content, create_date, last_update, is_active) VALUES
             (" . $create_review_followup_followup_id . ", " . $create_review_followup_followed_up_by . ", " . $create_review_followup_for_review . ", 
             \"" . $create_review_followup_followup_content . "\",  \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_restaurant_review_out = "Success";
          }

          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_restaurant_discussion"] )){ 
          /* #region submit_form_create_restaurant_discussion */
          $create_restaurant_discussion_open = "is_open";

          if (empty($_POST["create_restaurant_discussion_discussion_id"])) {
            $create_restaurant_discussion_discussion_idErr = "You must enter a value for create_restaurant_discussion_discussion_id";
          }else{
            $create_restaurant_discussion_discussion_id = test_input($_POST["create_restaurant_discussion_discussion_id"]);
          }
          if (empty($_POST["create_restaurant_discussion_discussed_by"])) {
            $create_restaurant_discussion_discussed_byErr = "You must enter a value for create_restaurant_discussion_discussed_by";
          }else{
            $create_restaurant_discussion_discussed_by = test_input($_POST["create_restaurant_discussion_discussed_by"]);
          }
          if (empty($_POST["create_restaurant_discussion_discussed_restaurant"])) {
            $create_restaurant_discussion_discussed_restaurantErr = "You must enter a value for create_restaurant_discussion_discussed_restaurant";
          }else{
            $create_restaurant_discussion_discussed_restaurant = test_input($_POST["create_restaurant_discussion_discussed_restaurant"]);
          }
          if (empty($_POST["create_restaurant_discussion_discussion_content"])) {
            $create_restaurant_discussion_discussion_contentErr = "You must enter a value for create_restaurant_discussion_discussion_content";
          }else{
            $create_restaurant_discussion_discussion_content = test_input($_POST["create_restaurant_discussion_discussion_content"]);
          }
          
          if( $create_restaurant_discussion_discussion_idErr === "" && $create_restaurant_discussion_discussed_byErr === "" && $create_restaurant_discussion_discussed_restaurantErr === ""
          && $create_restaurant_discussion_discussion_contentErr === "" ) {
            $sql = "INSERT INTO restaurant_discussion (discussion_id, discussed_by, discussed_restaurant, discussion_content, create_date, last_update, is_active) VALUES
             (" . $create_restaurant_discussion_discussion_id . ", " . $create_restaurant_discussion_discussed_by . ", " . $create_restaurant_discussion_discussed_restaurant . ", 
             \"" . $create_restaurant_discussion_discussion_content . "\",  \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_restaurant_discussion_out = "Success";
          }

          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_discussion_reply"] )){ 
          /* #region submit_form_create_discussion_reply */
          $create_discussion_reply_open = "is_open";

          if (empty($_POST["create_discussion_reply_reply_id"])) {
            $create_discussion_reply_reply_idErr = "You must enter a value for create_discussion_reply_reply_id";
          }else{
            $create_discussion_reply_reply_id = test_input($_POST["create_discussion_reply_reply_id"]);
          }
          if (empty($_POST["create_discussion_reply_replied_by"])) {
            $create_discussion_reply_replied_byErr = "You must enter a value for create_discussion_reply_replied_by";
          }else{
            $create_discussion_reply_replied_by = test_input($_POST["create_discussion_reply_replied_by"]);
          }
          if (empty($_POST["create_discussion_reply_for_discussion"])) {
            $create_discussion_reply_for_discussionErr = "You must enter a value for create_discussion_reply_for_discussion";
          }else{
            $create_discussion_reply_for_discussion = test_input($_POST["create_discussion_reply_for_discussion"]);
          }
          if (empty($_POST["create_discussion_reply_reply_content"])) {
            $create_discussion_reply_reply_contentErr = "You must enter a value for create_discussion_reply_reply_content";
          }else{
            $create_discussion_reply_reply_content = test_input($_POST["create_discussion_reply_reply_content"]);
          }
         
          if( $create_discussion_reply_reply_idErr === "" && $create_discussion_reply_replied_byErr === "" && $create_discussion_reply_for_discussionErr === ""
          && $create_discussion_reply_reply_contentErr === "" ) {
            $sql = "INSERT INTO discussion_reply (reply_id, replied_by, for_discussion, reply_content, create_date, last_update, is_active) VALUES
             (" . $create_discussion_reply_reply_id . ", " . $create_discussion_reply_replied_by . ", " . $create_discussion_reply_for_discussion . ", 
             \"" . $create_discussion_reply_reply_content . "\",  \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_discussion_reply_out = "Success";
          }

 

          /* #endregion */
        }
        
        elseif ( isset($_POST["submit_form_read_location"] )){ 
          /* #region submit_form_read_location */
          $read_location_open = "is_open";
          $sql = "SELECT * FROM location;";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_location_out = "<table><thead><tr><td>PK: Building Management No.</td><td>Zip No.</td><td>Jibun Juso</td><td>Create Date</td><td>Last Update</td><td>Is Active</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $read_location_out = $read_location_out . "<tr><td>" . $row['bldgMgmtNo'] . "</td>";
            $read_location_out = $read_location_out . "<td>" . $row['zip_no'] . "</td>";
            $read_location_out = $read_location_out . "<td>" . $row['jibun_juso'] . "</td>";
            $read_location_out = $read_location_out . "<td>" . $row['create_date'] . "</td>";
            $read_location_out = $read_location_out . "<td>" . $row['last_update'] . "</td>";
            $read_location_out = $read_location_out . "<td>" . $row['is_active'] . "</td></tr>";
          }
          $read_location_out = $read_location_out . "</tbody></table>";
          /* #endregion */ 
        }
        elseif ( isset($_POST["submit_form_read_business"] )){ 
          /* #region submit_form_read_business */
          $read_business_open = "is_open";
          $sql = "SELECT * FROM business";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_business_out = "<table><thead><tr><td>PK: Business ID</td><td>Name</td><td>FK: Located In</td><td>Address Detail</td><td>Create Date</td><td>Last Update</td><td>Is Active</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $read_business_out = $read_business_out . "<tr><td>" . $row['business_id'] . "</td>";
            $read_business_out = $read_business_out . "<td>" . $row['name'] . "</td>";
            $read_business_out = $read_business_out . "<td>" . $row['located_in'] . "</td>";
            $read_business_out = $read_business_out . "<td>" . $row['addr_detail'] . "</td>";
            $read_business_out = $read_business_out . "<td>" . $row['create_date'] . "</td>";
            $read_business_out = $read_business_out . "<td>" . $row['last_update'] . "</td>";
            $read_business_out = $read_business_out . "<td>" . $row['is_active'] . "</td></tr>";
          }
          $read_business_out = $read_business_out . "</tbody></table>";
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_read_restaurant"] )){
          /* #region  submit_from_read_restaurant */
          $read_restaurant_open = "is_open"; 
          $read_restaurant_out = read_restaurant();
        }
          /* #endregion */
        elseif ( isset($_POST["submit_form_read_cuisine"] )){ 
          /* #region submit_form_read_cuisine */
          $read_cuisine_open = "is_open";
          $sql = "SELECT * FROM cuisine";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_cuisine_out = "<table><thead><tr><td>PK: Cuisine ID</td><td>Cuisine Type</td><td>Cuisine Info</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $read_cuisine_out = $read_cuisine_out . "<tr><td>" . $row['cuisine_id'] . "</td>";
            $read_cuisine_out = $read_cuisine_out . "<td>" . $row['cuisine_type'] . "</td>";
            $read_cuisine_out = $read_cuisine_out . "<td>" . $row['cuisine_info'] . "</td></tr>";
          }
          $read_cuisine_out = $read_cuisine_out . "</tbody></table>";
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_read_serves"] )){ 
          /* #region submit_form_read_serves */
          $read_serves_open = "is_open";
          $sql = "SELECT * FROM cuisine";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_serves_out = "<table><thead><tr><td>PK: Business ID</td><td>PK: Cuisine Id</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $read_serves_out = $read_serves_out . "<tr><td>" . $row['served_at'] . "</td>";
            $read_serves_out = $read_serves_out . "<td>" . $row['serving'] . "</td></tr>";
          }
          $read_serves_out = $read_serves_out . "</tbody></table>";
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_read_person"] )){
          /* #region  submit_from_read_person */
          $read_person_open = "is_open";
          $read_person_out = read_person();
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_read_works_at"] )){
          /* #region  submit_form_read_works_at */
          $read_works_at_open = "is_open";
          $read_works_at_out = read_works_at();
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_read_restaurant_review"] )){
         /* #region  submit_form_read_restaurant_review */
          $read_restaurant_review_open = "is_open"; 
          $sql = "SELECT * FROM restaurant_review;";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_restaurant_review_out = "";
          while( $row = mysqli_fetch_array($query)) {
            $read_restaurant_review_out = $read_restaurant_review_out . "<tr><td>" . $row['review_id'] . "</td>";
            $read_restaurant_review_out = $read_restaurant_review_out . "<td>" . $row['reviewed_by'] . "</td>";
            $read_restaurant_review_out = $read_restaurant_review_out . "<td>" . $row['reviewed_restaurant'] . "</td>";
            $read_restaurant_review_out = $read_restaurant_review_out . "<td>" . $row['review_star'] . "</td>";
            $read_restaurant_review_out = $read_restaurant_review_out . "<td>" . $row['review_content'] . "</td>";
            $read_restaurant_review_out = $read_restaurant_review_out . "<td>" . $row['create_date'] . "</td>";
            $read_restaurant_review_out = $read_restaurant_review_out . "<td>" . $row['last_update'] . "</td>";
            $read_restaurant_review_out = $read_restaurant_review_out . "<td>" . $row['is_active'] . "</td></tr>";
          }
          if (empty($read_restaurant_review_out)){
            $read_restaurant_review_out = "No result";
          } else {
            $read_restaurant_review_out = "<table><thead>"
            . "<tr><th>Review ID</th><th>Reviewed By</th><th>Reviewed Restaurant</th><th>Review Star</th><th>Review Content</th><th>Create Date</th><th>Last Update</th><th>Is Active</th></tr>" . $read_restaurant_review_out . "</table>";
          }
         /* #endregion */
         }
        elseif ( isset($_POST["submit_form_read_review_followup"] )){
         /* #region  submit_form_read_review_followup */
          $read_review_followup_open = "is_open";  
          $sql = "SELECT * FROM review_followup;";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_review_followup_out = "";
          while( $row = mysqli_fetch_array($query)) {
            $read_review_followup_out = $read_review_followup_out . "<tr><td>" . $row['followup_id'] . "</td>";
            $read_review_followup_out = $read_review_followup_out . "<td>" . $row['followed_up_by'] . "</td>";
            $read_review_followup_out = $read_review_followup_out . "<td>" . $row['for_review'] . "</td>";
            $read_review_followup_out = $read_review_followup_out . "<td>" . $row['followup_content'] . "</td>";
            $read_review_followup_out = $read_review_followup_out . "<td>" . $row['create_date'] . "</td>";
            $read_review_followup_out = $read_review_followup_out . "<td>" . $row['last_update'] . "</td>";
            $read_review_followup_out = $read_review_followup_out . "<td>" . $row['is_active'] . "</td></tr>";
          }
          if (empty($read_review_followup_out)){
            $read_review_followup_out = "No result";
          } else {
            $read_review_followup_out = "<table><thead>"
            . "<tr><th>Followup ID</th><th>Followed Up By</th><th>For Review</th><th>Followup Content</th><th>Create Date</th><th>Last Update</th><th>Is Active</th></tr>" . $read_review_followup_out . "</table>";
          }
         /* #endregion */
         }
        elseif ( isset($_POST["submit_form_read_restaurant_discussion"] )){
       /* #region  submit_form_read_restaurant_discussion */
          $read_restaurant_discussion_open= "is_open";  
          $sql = "SELECT * FROM restaurant_discussion;";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_restaurant_discussion_out = "";
          while( $row = mysqli_fetch_array($query)) {
            $read_restaurant_discussion_out = $read_restaurant_discussion_out . "<tr><td>" . $row['discussion_id'] . "</td>";
            $read_restaurant_discussion_out = $read_restaurant_discussion_out . "<td>" . $row['discussed_by'] . "</td>";
            $read_restaurant_discussion_out = $read_restaurant_discussion_out . "<td>" . $row['discussed_restaurant'] . "</td>";
            $read_restaurant_discussion_out = $read_restaurant_discussion_out . "<td>" . $row['discussion_content'] . "</td>";
            $read_restaurant_discussion_out = $read_restaurant_discussion_out . "<td>" . $row['create_date'] . "</td>";
            $read_restaurant_discussion_out = $read_restaurant_discussion_out . "<td>" . $row['last_update'] . "</td>";
            $read_restaurant_discussion_out = $read_restaurant_discussion_out . "<td>" . $row['is_active'] . "</td></tr>";
          }
          if (empty($read_restaurant_discussion_out)){
            $read_restaurant_discussion_out = "No result";
          } else {
            $read_restaurant_discussion_out = "<table><thead>"
            . "<tr><th>Discussion ID</th><th>Dicussed By</th><th>Discussed Restaurant</th><th>Discussion Content</th><th>Create Date</th><th>Last Update</th><th>Is Active</th></tr>" . $read_restaurant_discussion_out . "</table>";
          }
       /* #endregion */
         }
        elseif ( isset($_POST["submit_form_read_discussion_reply"] )){
             /* #region  submit_form_read_discussion_reply */
             
             $read_discussion_reply_open= "is_open";  
             $sql = "SELECT * FROM discussion_reply;";
             $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
             $read_discussion_reply_out = "";
             while( $row = mysqli_fetch_array($query)) {
               $read_discussion_reply_out = $read_discussion_reply_out . "<tr><td>" . $row['reply_id'] . "</td>";
               $read_discussion_reply_out = $read_discussion_reply_out . "<td>" . $row['replied_by'] . "</td>";
               $read_discussion_reply_out = $read_discussion_reply_out . "<td>" . $row['for_discussion'] . "</td>";
               $read_discussion_reply_out = $read_discussion_reply_out . "<td>" . $row['reply_content'] . "</td>";
               $read_discussion_reply_out = $read_discussion_reply_out . "<td>" . $row['create_date'] . "</td>";
               $read_discussion_reply_out = $read_discussion_reply_out . "<td>" . $row['last_update'] . "</td>";
               $read_discussion_reply_out = $read_discussion_reply_out . "<td>" . $row['is_active'] . "</td></tr>";
             }
             if (empty($read_discussion_reply_out)){
               $read_discussion_reply_out = "No result";
             } else {
               $read_discussion_reply_out = "<table><thead>"
               . "<tr><th>Reply ID</th><th>Replied By</th><th>For Discussion</th><th>Reply Content</th><th>Create Date</th><th>Last Update</th><th>Is Active</th></tr>" . $read_discussion_reply_out . "</table>";
             }
          /* #endregion */
        }
        
        elseif ( isset($_POST["submit_form_update_location"] )){ }
        elseif ( isset($_POST["submit_form_update_business"] )){ }
        elseif ( isset($_POST["submit_form_update_restaurant"] )){ 
          $update_restaurant_open = "is_open";
        
        }
        elseif ( isset($_POST["submit_form_update_cuisine"] )){ }
        elseif ( isset($_POST["submit_form_update_serves"] )){ }
        elseif ( isset($_POST["submit_form_update_person"] )){ 
          $update_person_open = "is_open";
        }
        elseif ( isset($_POST["submit_form_update_works_at"] )){ 
          $update_works_at_open = "is_open";

        }
        elseif ( isset($_POST["submit_form_update_restaurant_review"] )){ }
        elseif ( isset($_POST["submit_form_update_review_followup"] )){ }
        elseif ( isset($_POST["submit_form_update_restaurant_discussion"] )){ }
        elseif ( isset($_POST["submit_form_update_discussion_reply"] )){ }

        elseif ( isset($_POST["submit_form_delete_location"] )){ }
        elseif ( isset($_POST["submit_form_delete_business"] )){ }
        elseif ( isset($_POST["submit_form_delete_restaurant"] )){ }
        elseif ( isset($_POST["submit_form_delete_cuisine"] )){ }
        elseif ( isset($_POST["submit_form_delete_serves"] )){ }
        elseif ( isset($_POST["submit_form_delete_person"] )){ }
        elseif ( isset($_POST["submit_form_delete_works_at"] )){ }
        elseif ( isset($_POST["submit_form_delete_restaurant_review"] )){ }
        elseif ( isset($_POST["submit_form_delete_review_followup"] )){ }
        elseif ( isset($_POST["submit_form_delete_restaurant_discussion"] )){ }
        elseif ( isset($_POST["submit_form_delete_discussion_reply"] )){ }
        
      }
    ?>

    <h5>
      Kyuri Kyeong - 111827215 - kyuri.kyeong@stonybrook.edu<br>
      Daekyung (Tim) Kim - 110887867 - daekyung.kim@stonybrooke.du<br>
      Haseung Lee - 110983860 - haseung.lee@stonybrook.edu
    </h5>

    <!-- Tab links -->
    
    <!-- 
      /* #region Create Tabs */
    --> 
    <div class="tab"><!-- CREATE -->
      <button class="tablinks" onclick="openPart(event, 'create_location')" id="<?php echo $create_location_open; ?>">Create Location</button>
      <button class="tablinks" onclick="openPart(event, 'create_business')" id="<?php echo $create_business_open; ?>">Create Business</button>
      <button class="tablinks" onclick="openPart(event, 'create_restaurant')" id="<?php echo $create_restaurant_open; ?>">Create Restaurant</button>
      <button class="tablinks" onclick="openPart(event, 'create_cuisine')" id="<?php echo $create_cuisine_open; ?>">Create Cuisine</button>
      <button class="tablinks" onclick="openPart(event, 'create_serves')" id="<?php echo $create_serves_open; ?>">Create Serves</button>
      <button class="tablinks" onclick="openPart(event, 'create_person')" id="<?php echo $create_person_open; ?>">Create Person</button>
      <button class="tablinks" onclick="openPart(event, 'create_works_at')" id="<?php echo $create_works_at_open; ?>">Create Works At</button>
      <button class="tablinks" onclick="openPart(event, 'create_restaurant_review')" id="<?php echo $create_restaurant_review_open; ?>">Create Restaurant Review</button>
      <button class="tablinks" onclick="openPart(event, 'create_review_followup')" id="<?php echo $create_review_followup_open; ?>">Create Review Followup</button>
      <button class="tablinks" onclick="openPart(event, 'create_restaurant_discussion')" id="<?php echo $create_restaurant_discussion_open; ?>">Create Restaurant Discussion</button>
      <button class="tablinks" onclick="openPart(event, 'create_discussion_reply')" id="<?php echo $create_discussion_reply_open; ?>">Create Discussion Reply</button>
    </div>
    <!-- 
      /* #endregion */
    -->
    
    <!-- 
      /* #region Read Tabs */
    --> 
    <div class="tab"><!-- READ -->
      <button class="tablinks" onclick="openPart(event, 'read_location')" id="<?php echo $read_location_open; ?>">Read Location</button>
      <button class="tablinks" onclick="openPart(event, 'read_business')" id="<?php echo $read_business_open; ?>">Read Business</button>
      <button class="tablinks" onclick="openPart(event, 'read_restaurant')" id="<?php echo $read_restaurant_open; ?>">Read Restaurant</button>
      <button class="tablinks" onclick="openPart(event, 'read_cuisine')" id="<?php echo $read_cuisine_open; ?>">Read Cuisine</button>
      <button class="tablinks" onclick="openPart(event, 'read_serves')" id="<?php echo $read_serves_open; ?>">Read Serves</button>
      <button class="tablinks" onclick="openPart(event, 'read_person')" id="<?php echo $read_person_open; ?>">Read Person</button>
      <button class="tablinks" onclick="openPart(event, 'read_works_at')" id="<?php echo $read_works_at_open; ?>">Read Works At</button>
      <button class="tablinks" onclick="openPart(event, 'read_restaurant_review')" id="<?php echo $read_restaurant_review_open; ?>">Read Restaurant Review</button>
      <button class="tablinks" onclick="openPart(event, 'read_review_followup')" id="<?php echo $read_review_followup_open; ?>">Read Review Followup</button>
      <button class="tablinks" onclick="openPart(event, 'read_restaurant_discussion')" id="<?php echo $read_restaurant_discussion_open; ?>">Read Restaurant Discussion</button>
      <button class="tablinks" onclick="openPart(event, 'read_discussion_reply')" id="<?php echo $read_discussion_reply_open; ?>">Read Discussion Reply</button>
    </div>
    <!-- 
      /* #endregion */
    -->
    
    <!-- 
      /* #region Update Tabs */
    --> 
    <div class="tab"><!-- UPDATE -->
      <button class="tablinks" onclick="openPart(event, 'update_location')" id="<?php echo $update_location_open; ?>">Update Location</button>
      <button class="tablinks" onclick="openPart(event, 'update_business')" id="<?php echo $update_business_open; ?>">Update Business</button>
      <button class="tablinks" onclick="openPart(event, 'update_restaurant')" id="<?php echo $update_restaurant_open; ?>">Update Restaurant</button>
      <button class="tablinks" onclick="openPart(event, 'update_cuisine')" id="<?php echo $update_cuisine_open; ?>">Update Cuisine</button>
      <button class="tablinks" onclick="openPart(event, 'update_serves')" id="<?php echo $update_serves_open; ?>">Update Serves</button>
      <button class="tablinks" onclick="openPart(event, 'update_person')" id="<?php echo $update_person_open; ?>">Update Person</button>
      <button class="tablinks" onclick="openPart(event, 'update_works_at')" id="<?php echo $update_works_at_open; ?>">Update Works At</button>
      <button class="tablinks" onclick="openPart(event, 'update_restaurant_review')" id="<?php echo $create_restaurant_review_open; ?>">Update Restaurant Review</button>
      <button class="tablinks" onclick="openPart(event, 'update_review_followup')" id="<?php echo $update_review_followup_open; ?>">Update Review Followup</button>
      <button class="tablinks" onclick="openPart(event, 'update_restaurant_discussion')" id="<?php echo $update_restaurant_discussion_open; ?>">Update Restaurant Discussion</button>
      <button class="tablinks" onclick="openPart(event, 'update_discussion_reply')" id="<?php echo $update_discussion_reply_open; ?>">Update Discussion Reply</button>
      <br>
    </div>
    <!-- 
      /* #endregion */
    -->
    
    <!-- 
      /* #region Delete Tabs */
    --> 
    <div class="tab"><!-- DELETE -->
      <button class="tablinks" onclick="openPart(event, 'delete_location')" id="<?php echo $delete_location_open; ?>">Delete Location</button>
      <button class="tablinks" onclick="openPart(event, 'delete_business')" id="<?php echo $delete_business_open; ?>">Delete Business</button>
      <button class="tablinks" onclick="openPart(event, 'delete_restaurant')" id="<?php echo $delete_restaurant_open; ?>">Delete Restaurant</button>
      <button class="tablinks" onclick="openPart(event, 'delete_cuisine')" id="<?php echo $delete_cuisine_open; ?>">Delete Cuisine</button>
      <button class="tablinks" onclick="openPart(event, 'delete_serves')" id="<?php echo $delete_serves_open; ?>">Delete Serves</button>
      <button class="tablinks" onclick="openPart(event, 'delete_person')" id="<?php echo $delete_person_open; ?>">Delete Person</button>
      <button class="tablinks" onclick="openPart(event, 'delete_works_at')" id="<?php echo $delete_works_at_open; ?>">Delete Works At</button>
      <button class="tablinks" onclick="openPart(event, 'delete_restaurant_review')" id="<?php echo $delete_restaurant_review_open; ?>">Delete Restaurant Review</button>
      <button class="tablinks" onclick="openPart(event, 'delete_review_followup')" id="<?php echo $delete_review_followup_open; ?>">Delete Review Followup</button>
      <button class="tablinks" onclick="openPart(event, 'delete_restaurant_discussion')" id="<?php echo $delete_restaurant_discussion_open; ?>">Delete Restaurant Discussion</button>
      <button class="tablinks" onclick="openPart(event, 'delete_discussion_reply')" id="<?php echo $delete_discussion_reply_open; ?>">Delete Discussion Reply</button>
      <br>
    </div>
    <!-- 
      /* #endregion */
    -->
    <!-- ----------- Tab content ----------- -->

    
    <!-- ############################################### ######################## ############################################### -->
    <!-- ############################################### Create Forms Tab Content ############################################### -->
    <!-- ############################################### ######################## ############################################### -->

    <!-- 
      /* #region Create Tab Content */
    -->
    <!-- 
      /* #region create_location */
    -->
    <div id="create_location" class="tabcontent">

      <h3>Create Location</h3>
    
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        
        Building Management No.: 
        <input type="number" id="create_location_bldgMgmtNo" name="create_location_bldgMgmtNo" value="<?php echo $create_location_bldgMgmtNo ?>">
        <font color="red"><?php echo $create_location_bldgMgmtNoErr ?></font><br>
        
        Zip No.: 
        <input type="text" id="create_location_zip_no" name="create_location_zip_no" value="<?php echo $create_location_zip_no ?>">
        <font color="red"><?php echo $create_location_zip_noErr ?></font><br>
        
        Jibun Juso: 
        <input type="text" id="create_location_jibun_juso" name="create_location_jibun_juso" value="<?php echo $create_location_jibun_juso ?>">
        <font color="red"><?php echo $create_location_jibun_jusoErr ?></font><br>

        <input type="submit" name="submit_form_create_location" value="Submit">
      </form>
      
      <button onclick="clearElement('create_location_div')">Clear Output</button>
      <div id="create_location_div">
        <?php echo $create_location_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->

    <!-- 
      /* #region create_business */
    -->
    <div id="create_business" class="tabcontent">

      <h3>Create Business</h3>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    
        Business Name: 
        <input type="text" id="create_business_name" name="create_business_name" value="<?php echo $create_business_name ?>">
        <font color="red"><?php echo $create_business_nameErr ?></font><br>

        Located In (FK: Location's Building Management Number): 
        <input type="number" id="create_business_located_in" name="create_business_located_in" value="<?php echo $create_business_located_in ?>">
        <font color="red"><?php echo $create_business_located_inErr ?></font><br>
    
        Address Detail: <input type="text" id="create_business_addr_detail" name="create_business_addr_detail" value="<?php echo $create_business_addr_detail ?>">
        <font color="red"><?php echo $create_business_addr_detailErr ?></font><br>
       
        <input type="submit" name="submit_form_create_business" value="Submit">
      </form>
      
      <button onclick="clearElement('create_business_div')">Clear Output</button>
      <div id="create_business_div">
        <?php echo $create_business_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->

    <!-- 
      /* #region create_restaurant */
    -->
    <div id="create_restaurant" class="tabcontent">
      <h3>create_restaurant</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        restaurant_id: <input type="number" id="create_restaurant_restaurant_id" name="create_restaurant_restaurant_id" value="<?php echo $create_restaurant_restaurant_id ?>">
        <font color="red"><?php echo $create_restaurant_restaurant_idErr ?></font><br>
        weekday_open_time: <input type="time" id="create_restaurant_weekday_open_time" name="create_restaurant_weekday_open_time" value="<?php echo $create_restaurant_weekday_open_time ?>">
        <font color="red"><?php echo $create_restaurant_weekday_open_timeErr ?></font><br>
        weekday_end_time: <input type="time" id="create_restaurant_weekday_end_time" name="create_restaurant_weekday_end_time" value="<?php echo $create_restaurant_weekday_end_time ?>">
        <font color="red"><?php echo $create_restaurant_weekday_end_timeErr ?></font><br>
        weekend_open_time: <input type="time" id="create_restaurant_weekend_open_time" name="create_restaurant_weekend_open_time" value="<?php echo $create_restaurant_weekend_open_time ?>">
        <font color="red"><?php echo $create_restaurant_weekend_open_timeErr ?></font><br>
        weekend_end_time: <input type="time" id="create_restaurant_weekend_end_time" name="create_restaurant_weekend_end_time" value="<?php echo $create_restaurant_weekend_end_time ?>">
        <font color="red"><?php echo $create_restaurant_weekend_end_timeErr ?></font><br>
        weekly_break_date: <input type="radio" id="create_restaurant_weekly_break_date_None" name="create_restaurant_weekly_break_date" value="None"><label for="create_restaurant_weekly_break_date_None">None</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Mon" name="create_restaurant_weekly_break_date" value="Mon"><label for="create_restaurant_weekly_break_date_Mon">Mon</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Tue" name="create_restaurant_weekly_break_date" value="Tue"><label for="create_restaurant_weekly_break_date_Tue">Tue</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Wed" name="create_restaurant_weekly_break_date" value="Wed"><label for="create_restaurant_weekly_break_date_Wed">Wed</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Thu" name="create_restaurant_weekly_break_date" value="Thu"><label for="create_restaurant_weekly_break_date_Thu">Thu</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Fri" name="create_restaurant_weekly_break_date" value="Fri"><label for="create_restaurant_weekly_break_date_Fri">Fri</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Sat" name="create_restaurant_weekly_break_date" value="Sat"><label for="create_restaurant_weekly_break_date_Sat">Sat</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Sun" name="create_restaurant_weekly_break_date" value="Sun"><label for="create_restaurant_weekly_break_date_Sun">Sun</label>
        <input type="radio" id="create_restaurant_weekly_break_date_Weekend" name="create_restaurant_weekly_break_date" value="Weekend"><label for="create_restaurant_weekly_break_date_Weekend">Weekend</label>
        <font color="red"><?php echo $create_restaurant_weekly_break_dateErr ?></font><br>
        <!-- create_date: <input type="date" id="create_restaurant_create_date" name="create_restaurant_create_date" value="<?php echo $create_restaurant_create_date ?>">
        <font color="red"><?php echo $create_restaurant_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_restaurant_last_update" name="create_restaurant_last_update" value="<?php echo $create_restaurant_last_update ?>">
        <font color="red"><?php echo $create_restaurant_last_updateErr ?></font><br>
        is_active: <input type="checkbox" id="create_restaurant_is_active" name="create_restaurant_is_active" value="<?php echo $create_restaurant_is_active ?>">
        <font color="red"><?php echo $create_restaurant_is_activeErr ?></font><br> -->
        <input type="submit" name="submit_form_create_restaurant" value="Submit">
      </form>
      <button onclick="clearElement('create_restaurant_div')">Clear Output</button>
      <div id="create_restaurant_div">
        <?php echo $create_restaurant_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->

    <!-- 
      /* #region create_cuisine */
    -->
    <div id="create_cuisine" class="tabcontent">

      <h3>Create Cuisine</h3>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

        Cuisine Type: 
        <input type="text" id="create_cuisine_cuisine_type" name="create_cuisine_cuisine_type" value="<?php echo $create_cuisine_cuisine_type ?>">
        <font color="red"><?php echo $create_cuisine_cuisine_typeErr ?></font><br>

        Cuisine Information: 
        <input type="text" id="create_cuisine_cuisine_info" name="create_cuisine_cuisine_info" value="<?php echo $create_cuisine_cuisine_info ?>">
        <font color="red"><?php echo $create_cuisine_cuisine_infoErr ?></font><br>

        <input type="submit" name="submit_form_create_cuisine" value="Submit">
      </form>
      <button onclick="clearElement('create_cuisine_div')">Clear Output</button>
      <div id="create_cuisine_div">
        <?php echo $create_cuisine_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->

    <!-- 
      /* #region create_serves */
    -->
    <div id="create_serves" class="tabcontent">

      <h3>Create Serves</h3>
    
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

        The Cuisine being served: 
        <input type="text" id="create_serves_serving" name="create_serves_serving" value="<?php echo $create_serves_serving ?>">
        <font color="red"><?php echo $create_serves_servingErr ?></font><br>

        Cuisine is served at: 
        <input type="text" id="create_serves_served_at" name="create_serves_served_at" value="<?php echo $create_serves_served_at ?>">
        <font color="red"><?php echo $create_serves_served_atErr ?></font><br>
        
        <input type="submit" name="submit_form_create_serves" value="Submit">
      </form>
      <button onclick="clearElement('create_serves_div')">Clear Output</button>
      <div id="create_serves_div">
        <?php echo $create_serves_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion
    -->

    <!-- 
      /* #region create_person */
    -->
    <div id="create_person" class="tabcontent">
      <h3>create_person</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        person_id: <input type="number" id="create_person_person_id" name="create_person_person_id" value="<?php echo $create_person_person_id ?>">
          <font color="red"><?php echo $create_person_person_idErr ?></font><br>
        fullname: <input type="text" id="create_person_fullname" name="create_person_fullname" value="<?php echo $create_person_fullname ?>">
          <font color="red"><?php echo $create_person_fullnameErr ?></font><br>
        email: <input type="email" id="create_person_email" name="create_person_email" value="<?php echo $create_person_email ?>">
          <font color="red"><?php echo $create_person_emailErr ?></font><br>
        username: <input type="text" id="create_person_username" name="create_person_username" value="<?php echo $create_person_username ?>">
          <font color="red"><?php echo $create_person_usernameErr ?></font><br>
        password: <input type="password" id="create_person_password" name="create_person_password" value="<?php echo $create_person_password ?>">
          <font color="red"><?php echo $create_person_passwordErr ?></font><br>
        <!-- create_date: <input type="date" id="create_person_create_date" name="create_person_create_date" value="<?php echo $create_person_create_date ?>">
          <font color="red"><?php echo $create_person_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_person_last_update" name="create_person_last_update" value="<?php echo $create_person_last_update ?>">
          <font color="red"><?php echo $create_person_last_updateErr ?></font><br> -->
        <!-- is_active: <input type="checkbox" id="create_person_is_active" name="create_person_is_active" value="<?php echo $create_person_is_active ?>"> -->
        <font color="red"><?php echo $create_person_is_activeErr ?></font><br>
        <input type="submit" name="submit_form_create_person" value="Submit">
      </form>
      <button onclick="clearElement('create_person_div')">Clear Output</button>
      <div id="create_person_div">
        <?php echo $create_person_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->
    
    <!-- 
      /* #region create_works_at */
    -->
    <div id="create_works_at" class="tabcontent">
      <h3>create_works_at</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        works_for: <input type="number" id="create_works_at_works_for" name="create_works_at_works_for" value="<?php echo $create_works_at_works_for ?>">
        <font color="red"><?php echo $create_works_at_works_forErr ?></font><br>
        employed: <input type="number" id="create_works_at_employed" name="create_works_at_employed" value="<?php echo $create_works_at_employed ?>">
        <font color="red"><?php echo $create_works_at_employedErr ?></font><br>
        employee_type: <input type="text" id="create_works_at_employee_type" name="create_works_at_employee_type" value="<?php echo $create_works_at_employee_type ?>">
        <font color="red"><?php echo $create_works_at_employee_typeErr ?></font><br>
        <input type="submit" name="submit_form_create_works_at" value="Submit">
      </form>
      <button onclick="clearElement('create_works_at_div')">Clear Output</button>
      <div id="create_works_at_div">
        <?php echo $create_works_at_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->
    
    <!-- 
      /* #region create_restaurant_review */
    -->
    <div id="create_restaurant_review" class="tabcontent">
      <h3>Create Restaurant Review</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Review ID: <input type="number" id="create_restaurant_review_review_id" name="create_restaurant_review_review_id" value="<?php echo $create_restaurant_review_review_id ?>">
        <font color="red"><?php echo $create_restaurant_review_review_idErr ?></font><br>
        Reviewed By: <input type="number" id="create_restaurant_review_reviewed_by" name="create_restaurant_review_reviewed_by" value="<?php echo $create_restaurant_review_reviewed_by ?>">
        <font color="red"><?php echo $create_restaurant_review_reviewed_byErr ?></font><br>
        Reviewed Restaurant: <input type="number" id="create_restaurant_review_reviewed_restaurant" name="create_restaurant_review_reviewed_restaurant" value="<?php echo $create_restaurant_review_reviewed_restaurant ?>">
        <font color="red"><?php echo $create_restaurant_review_reviewed_restaurantErr ?></font><br>
        Review Star (1-5): <input type="number" id="create_restaurant_review_review_star" name="create_restaurant_review_review_star" value="<?php echo $create_restaurant_review_review_star ?>">
        <font color="red"><?php echo $create_restaurant_review_review_starErr ?></font><br>
        Review Content: <input type="text" id="create_restaurant_review_review_content" name="create_restaurant_review_review_content" value="<?php echo $create_restaurant_review_review_content ?>">
        <font color="red"><?php echo $create_restaurant_review_review_contentErr ?></font><br>
        <!-- create_date: <input type="date" id="create_restaurant_review_create_date" name="create_restaurant_review_create_date" value="<?php echo $create_restaurant_review_create_date ?>">
        <font color="red"><?php echo $create_restaurant_review_create_date ?></font><br>
        last_update: <input type="date" id="create_restaurant_review_last_update" name="create_restaurant_review_last_update" value="<?php echo $create_restaurant_review_last_update ?>">
        <font color="red"><?php echo $create_restaurant_review_last_updateErr ?></font><br> 
        is_active: <input type="checkbox" id="create_restaurant_review_is_active" name="create_restaurant_review_is_active" value="<?php echo $create_restaurant_review_is_active ?>">
        <font color="red"><?php echo $create_restaurant_review_is_activeErr ?></font><br>-->
        <input type="submit" name="submit_form_create_restaurant_review" value="Submit">
      </form>
      <button onclick="clearElement('create_restaurant_review_div')">Clear Output</button>
      <div id="create_restaurant_review_div">
        <?php echo $create_restaurant_review_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->
    
    <!-- 
      /* #region create_review_followup */
    -->
    <div id="create_review_followup" class="tabcontent">
      <h3>Create Review Followup</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

       Followup ID: <input type="number" id="create_review_followup_followup_id" name="create_review_followup_followup_id" value="<?php echo $create_review_followup_followup_id ?>">
        <font color="red"><?php echo $create_review_followup_followup_idErr ?></font><br>
        Followup By: <input type="number" id="create_review_followup_followed_up_by" name="create_review_followup_followed_up_by" value="<?php echo $create_review_followup_followed_up_by ?>">
        <font color="red"><?php echo $create_review_followup_followed_up_byErr ?></font><br>
        For Review: <input type="number" id="create_review_followup_for_review" name="create_review_followup_for_review" value="<?php echo $create_review_followup_for_review ?>">
        <font color="red"><?php echo $create_review_followup_for_reviewErr ?></font><br>
        Followup Content: <input type="text" id="create_review_followup_followup_content" name="create_review_followup_followup_content" value="<?php echo $create_review_followup_followup_content ?>">
        <font color="red"><?php echo $create_review_followup_followup_contentErr ?></font><br>
        <!-- create_date: <input type="date" id="create_review_followup_create_date" name="create_review_followup_create_date" value="<?php echo $create_review_followup_create_date ?>">
        <font color="red"><?php echo $create_review_followup_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_review_followup_last_update" name="create_review_followup_last_update" value="<?php echo $create_review_followup_last_update ?>">
        <font color="red"><?php echo $create_review_followup_last_updateErr ?></font><br>
        is_active: <input type="checkbox" id="create_review_followup_is_active" name="create_review_followup_is_active" value="<?php echo $create_review_followup_is_active ?>">
        <font color="red"><?php echo $create_review_followup_is_activeErr ?></font><br> -->
        <input type="submit" name="submit_form_create_review_followup" value="Submit">
      </form>
      <button onclick="clearElement('create_review_followup_div')">Clear Output</button>
      <div id="create_review_followup_div">
        <?php echo $create_review_followup_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->
    
    <!-- 
      /* #region create_restaurant_discussion */
    -->
    <div id="create_restaurant_discussion" class="tabcontent">
      <h3> Create Restaurant Discussion </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      Discussion ID: <input type="number" id="create_restaurant_discussion_discussion_id" name="create_restaurant_discussion_discussion_id" value="<?php echo $create_restaurant_discussion_discussion_id ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussion_idErr ?></font><br>
        Discuss By: <input type="number" id="create_restaurant_discussion_discussed_by" name="create_restaurant_discussion_discussed_by" value="<?php echo $create_restaurant_discussion_discussed_by ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussed_byErr ?></font><br>
        Discussed Restaurant: <input type="number" id="create_restaurant_discussion_discussed_restaurant" name="create_restaurant_discussion_discussed_restaurant" value="<?php echo $create_restaurant_discussion_discussed_restaurant ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussed_restaurantErr ?></font><br>
        Discussion Content: <input type="text" id="create_restaurant_discussion_discussion_content" name="create_restaurant_discussion_discussion_content" value="<?php echo $create_restaurant_discussion_discussion_content ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussion_contentErr ?></font><br>
 
        <input type="submit" name="submit_form_create_restaurant_discussion" value="Submit">
      </form>
      <button onclick="clearElement('create_restaurant_discussion_div')">Clear Output</button>
      <div id="create_restaurant_discussion_div">
        <?php echo $create_restaurant_discussion_out; ?>
      </div> 
    </div>
    <!-- 
      /* #endregion */
    -->

    <!-- 
      /* #region create_discussion_reply */
    -->
    <div id="create_discussion_reply" class="tabcontent">
      <h3>Create Discussion Reply</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Reply ID: <input type="number" id="create_discussion_reply_reply_id" name="create_discussion_reply_reply_id" value="<?php echo $create_discussion_reply_reply_id ?>">
        <font color="red"><?php echo $create_discussion_reply_reply_idErr ?></font><br>
        Reply Replied By: <input type="number" id="create_discussion_reply_replied_by" name="create_discussion_reply_replied_by" value="<?php echo $create_discussion_reply_replied_by ?>">
        <font color="red"><?php echo $create_discussion_reply_replied_byErr ?></font><br>
        For Discussion : <input type="number" id="create_discussion_reply_for_discussion" name="create_discussion_reply_for_discussion" value="<?php echo $create_discussion_reply_for_discussion ?>">
        <font color="red"><?php echo $create_discussion_reply_for_discussionErr ?></font><br>
        Reply Content: <input type="text" id="create_discussion_reply_reply_content" name="create_discussion_reply_reply_content" value="<?php echo $create_discussion_reply_reply_content ?>">
        <font color="red"><?php echo $create_discussion_reply_reply_contentErr ?></font><br>
        <!-- create_date: <input type="date" id="create_discussion_reply_create_date" name="create_discussion_reply_create_date" value="<?php echo $create_discussion_reply_create_date ?>">
        <font color="red"><?php echo $create_discussion_reply_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_discussion_reply_last_update" name="create_discussion_reply_last_update" value="<?php echo $create_discussion_reply_last_update ?>">
        <font color="red"><?php echo $create_discussion_reply_last_updateErr ?></font><br> 
        is_active: <input type="checkbox" id="create_discussion_reply_is_active" name="create_discussion_reply_is_active" value="<?php echo $create_discussion_reply_is_active ?>">
        <font color="red"><?php echo $create_discussion_reply_is_activeErr ?></font><br> -->
        <input type="submit" name="submit_form_create_discussion_reply" value="Submit">
      </form>
      <button onclick="clearElement('create_discussion_reply_div')">Clear Output</button>
      <div id="create_discussion_reply_div">
        <?php echo $create_discussion_reply_out; ?>
      </div> 
    </div>

    <!-- 
      /* #endregion */
    -->

    <!-- 
      /* #endregion */
    -->
    <!-- ############################################### ###################### ############################################### -->
    <!-- ############################################### Read Forms Tab Content ############################################### -->
    <!-- ############################################### ###################### ############################################### -->
    
    
    <!-- 
      /* #region Read Tab Content */
    -->
    
    <div id="read_location" class="tabcontent">
      <h3>Read Location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_location" value="Read">
      </form>
      <button onclick="clearElement('read_location_div')">Clear Output</button>
      <div id="read_location_div">
        <?php echo $read_location_out; ?>
      </div> 
    </div> 

    <div id="read_business" class="tabcontent">
      <h3>Read Business</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_business" value="Read">
      </form>
      <button onclick="clearElement('read_business_div')">Clear Output</button>
      <div id="read_business_div">
        <?php echo $read_business_out; ?>
      </div> 
    </div>
    
    <div id="read_restaurant" class="tabcontent">
      <h3>read_restaurant</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_restaurant" value="Submit">
      </form>
      <button onclick="clearElement('read_restaurant_div')">Clear Output</button>
      <div id="read_restaurant_div">
        <?php echo $read_restaurant_out;?>
      </div> 
    </div>

    <div id="read_cuisine" class="tabcontent">
      <h3>read_cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_cuisine" value="Read">
      </form>
      <button onclick="clearElement('read_cuisine_div')">Clear Output</button>
      <div id="read_cuisine_div">
        <?php echo $read_cuisine_out; ?>
      </div> 
    </div>

    <div id="read_serves" class="tabcontent">
      <h3>read_serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_serves" value="Read">
      </form>
      <button onclick="clearElement('read_serves_div')">Clear Output</button>
      <div id="read_serves_div">
        <?php echo $read_serves_out; ?>
      </div> 
    </div>

    <div id="read_person" class="tabcontent">
      <h3>read_person</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_person" value="Submit">
      </form>
      <button onclick="clearElement('read_person_div')">Clear Output</button>
      <div id="read_person_div">
        <?php echo $read_person_out; ?>
      </div> 
    </div>
    
    <div id="read_works_at" class="tabcontent">
      <h3>read_works_at</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_works_at" value="Submit">
      </form>
      <button onclick="clearElement('read_works_at_div')">Clear Output</button>
      <div id="read_works_at_div">
        <?php echo $read_works_at_out; ?>
      </div> 
    </div>
    
    <div id="read_restaurant_review" class="tabcontent">
      <h3>read_restaurant_review</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_restaurant_review" value="Submit">
      </form>
      <button onclick="clearElement('read_restaurant_review_div')">Clear Output</button>
      <div id="read_restaurant_review_div">
        <?php echo $read_restaurant_review_out; ?>
      </div> 
    </div>
    
    <div id="read_review_followup" class="tabcontent">
      <h3>read_review_followup</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_review_followup" value="Submit">
      </form>
      <button onclick="clearElement('read_review_followup_div')">Clear Output</button>
      <div id="read_review_followup_div">
        <?php echo $read_review_followup_out; ?>
      </div> 
    </div>
    
    <div id="read_restaurant_discussion" class="tabcontent">
      <h3> read_restaurant_discussion </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_restaurant_discussion" value="Submit">
      </form>
      <button onclick="clearElement('read_restaurant_discussion_div')">Clear Output</button>
      <div id="read_restaurant_discussion_div">
        <?php echo $read_restaurant_discussion_out; ?>
      </div> 
    </div>

    <div id="read_discussion_reply" class="tabcontent">
      <h3>read_discussion_reply</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_discussion_reply" value="Submit">
      </form>
      <button onclick="clearElement('read_discussion_reply_div')">Clear Output</button>
      <div id="read_discussion_reply_div">
        <?php echo $read_discussion_reply_out; ?>
      </div> 
    </div>

    <!-- 
      /* #endregion */
    -->

    <!-- ############################################### ######################## ############################################### -->
    <!-- ############################################### Update Forms Tab Content ############################################### -->
    <!-- ############################################### ######################## ############################################### -->

    <!-- 
      /* #region Update Tab Content */
    -->
    <div id="update_location" class="tabcontent">
      <h3>update_location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_location" value="Submit">
      </form>
      <button onclick="clearElement('update_location_div')">Clear Output</button>
      <div id="update_location_div">
        <?php echo $update_location_out; ?>
      </div> 
    </div>
    
    <div id="update_business" class="tabcontent">
      <h3>update_business</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_business" value="Submit">
      </form>
      <button onclick="clearElement('update_business_div')">Clear Output</button>
      <div id="update_business_div">
        <?php echo $update_business_out; ?>
      </div> 
    </div>
    
    <div id="update_restaurant" class="tabcontent">
      <h3>update_restaurant</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_restaurant" value="Submit">
      </form>
      <button onclick="clearElement('update_restaurant_div')">Clear Output</button>
      <div id="update_restaurant_div">
        <?php $update_restaurant_out = $update_restaurant_out . read_restaurant(); echo $update_restaurant_out; ?>
      </div> 
    </div>

    <div id="update_cuisine" class="tabcontent">
      <h3>update_cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_cuisine" value="Submit">
      </form>
      <button onclick="clearElement('update_cuisine_div')">Clear Output</button>
      <div id="update_cuisine_div">
        <?php echo $update_cuisine_out; ?>
      </div> 
    </div>

    <div id="update_serves" class="tabcontent">
      <h3>update_serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_serves" value="Submit">
      </form>
      <button onclick="clearElement('update_serves_div')">Clear Output</button>
      <div id="update_serves_div">
        <?php echo $update_serves_out; ?>
      </div> 
    </div>

    <div id="update_person" class="tabcontent">
      <h3>update_person</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_person" value="Submit">
      </form>
      <button onclick="clearElement('update_person_div')">Clear Output</button>
      <div id="update_person_div">
        <?php $update_person_out = $update_person_out . read_person(); echo $update_person_out; ?>
      </div> 
    </div>
    
    <div id="update_works_at" class="tabcontent">
      <h3>update_works_at</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_works_at" value="Submit">
      </form>
      <button onclick="clearElement('update_works_at_div')">Clear Output</button>
      <div id="update_works_at_div">
        <?php $update_works_at_out = $update_works_at_out . read_works_at(); echo $update_works_at_out; ?>
      </div> 
    </div>
    
    <div id="update_restaurant_review" class="tabcontent">
      <h3>update_restaurant_review</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_restaurant_review" value="Submit">
      </form>
      <button onclick="clearElement('update_restaurant_review_div')">Clear Output</button>
      <div id="update_restaurant_review_div">
        <?php echo $update_restaurant_review_out; ?>
      </div> 
    </div>
    
    <div id="update_review_followup" class="tabcontent">
      <h3>update_review_followup</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_review_followup" value="Submit">
      </form>
      <button onclick="clearElement('update_review_followup_div')">Clear Output</button>
      <div id="update_review_followup_div">
        <?php echo $update_review_followup_out; ?>
      </div> 
    </div>
    
    <div id="update_restaurant_discussion" class="tabcontent">
      <h3> update_restaurant_discussion </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_restaurant_discussion" value="Submit">
      </form>
      <button onclick="clearElement('update_restaurant_discussion_div')">Clear Output</button>
      <div id="update_restaurant_discussion_div">
        <?php echo $update_restaurant_discussion_out; ?>
      </div> 
    </div>

    <div id="update_discussion_reply" class="tabcontent">
      <h3>update_discussion_reply</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_discussion_reply" value="Submit">
      </form>
      <button onclick="clearElement('update_discussion_reply_div')">Clear Output</button>
      <div id="update_discussion_reply_div">
        <?php echo $update_discussion_reply_out; ?>
      </div> 
    </div>

    <!-- 
      /* #endregion */
    -->


    <!-- ############################################### ######################## ############################################### -->
    <!-- ############################################### Delete Forms Tab Content ############################################### -->
    <!-- ############################################### ######################## ############################################### -->

    
    <!-- 
      /* #region Delete Tab Content */
    -->
    <div id="delete_location" class="tabcontent">
      <h3>delete_location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_location" value="Submit">
      </form>
      <button onclick="clearElement('delete_location_div')">Clear Output</button>
      <div id="delete_location_div">
        <?php echo $delete_location_out; ?>
      </div> 
    </div>
    
    <div id="delete_business" class="tabcontent">
      <h3>delete_business</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_business" value="Submit">
      </form>
      <button onclick="clearElement('delete_business_div')">Clear Output</button>
      <div id="delete_business_div">
        <?php echo $delete_business_out; ?>
      </div> 
    </div>
    
    <div id="delete_restaurant" class="tabcontent">
      <h3>delete_restaurant</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_restaurant" value="Submit">
      </form>
      <button onclick="clearElement('delete_restaurant_div')">Clear Output</button>
      <div id="delete_restaurant_div">
        <?php echo $delete_restaurant_out; ?>
      </div> 
    </div>

    <div id="delete_cuisine" class="tabcontent">
      <h3>delete_cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_cuisine" value="Submit">
      </form>
      <button onclick="clearElement('delete_cuisine_div')">Clear Output</button>
      <div id="delete_cuisine_div">
        <?php echo $delete_cuisine_out; ?>
      </div> 
    </div>

    <div id="delete_serves" class="tabcontent">
      <h3>delete_serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_serves" value="Submit">
      </form>
      <button onclick="clearElement('delete_serves_div')">Clear Output</button>
      <div id="delete_serves_div">
        <?php echo $delete_serves_out; ?>
      </div> 
    </div>

    <div id="delete_person" class="tabcontent">
      <h3>delete_person</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_person" value="Submit">
      </form>
      <button onclick="clearElement('delete_person_div')">Clear Output</button>
      <div id="delete_person_div">
        <?php echo $delete_person_out; ?>
      </div> 
    </div>
    
    <div id="delete_works_at" class="tabcontent">
      <h3>delete_works_at</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_works_at" value="Submit">
      </form>
      <button onclick="clearElement('delete_works_at_div')">Clear Output</button>
      <div id="delete_works_at_div">
        <?php echo $delete_works_at_out; ?>
      </div> 
    </div>
    
    <div id="delete_restaurant_review" class="tabcontent">
      <h3>delete_restaurant_review</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_restaurant_review" value="Submit">
      </form>
      <button onclick="clearElement('delete_restaurant_review_div')">Clear Output</button>
      <div id="delete_restaurant_review_div">
        <?php echo $delete_restaurant_review_out; ?>
      </div> 
    </div>
    
    <div id="delete_review_followup" class="tabcontent">
      <h3>delete_review_followup</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_review_followup" value="Submit">
      </form>
      <button onclick="clearElement('delete_review_followup_div')">Clear Output</button>
      <div id="delete_review_followup_div">
        <?php echo $delete_review_followup_out; ?>
      </div> 
    </div>
    
    <div id="delete_restaurant_discussion" class="tabcontent">
      <h3> delete_restaurant_discussion </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_restaurant_discussion" value="Submit">
      </form>
      <button onclick="clearElement('delete_restaurant_discussion_div')">Clear Output</button>
      <div id="delete_restaurant_discussion_div">
        <?php echo $delete_restaurant_discussion_out; ?>
      </div> 
    </div>

    <div id="delete_discussion_reply" class="tabcontent">
      <h3>delete_discussion_reply</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_delete_discussion_reply" value="Submit">
      </form>
      <button onclick="clearElement('delete_discussion_reply_div')">Clear Output</button>
      <div id="delete_discussion_reply_div">
        <?php echo $delete_discussion_reply_out; ?>
      </div> 
    </div>

    <!-- 
      /* #endregion */
    -->


    <script>
      function openPart(evt, part) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(part).style.display = "block";
        evt.currentTarget.className += " active";
      }

      function clearElement(elementID){
        document.getElementById(elementID).innerHTML = "";
      }
      
      if( document.getElementById("is_open") != null ){
        document.getElementById("is_open").click();
      }
    </script>

    <?php mysqli_close($conn); ?>
  </body>
</html> 