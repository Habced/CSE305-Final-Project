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
 
     <!--
       /* #region  CSS */ 
     -->
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
   <!--
     /* #endregion */ 
     -->
  
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
      $update_location_bldgMgmtNo = $update_location_zip_no = $update_location_jibun_juso = "";
      $update_location_bldgMgmtNoErr = $update_location_zip_noErr = $update_location_jibun_jusoErr = "";

      $update_business_open = $update_business_out = "";
      $update_business_business_id = $update_business_name = $update_business_located_in = $update_business_addr_detail = "";
      $update_business_business_idErr = $update_business_nameErr = $update_business_located_inErr = $update_business_addr_detailErr = "";
      
      $update_restaurant_open = $update_restaurant_out = $update_restaurantErr = "";
      $update_restaurant_restaurant_id = $update_restaurant_weekday_open_time = $update_restaurant_weekday_end_time = $update_restaurant_weekend_open_time = $update_restaurant_weekend_end_time
      = $update_restaurant_weekly_break_date = $update_restaurant_update_date = $update_restaurant_last_update = "";
      $update_restaurant_is_active = 0;
      $update_restaurant_restaurant_idErr = $update_restaurant_weekday_open_timeErr = $update_restaurant_weekday_end_timeErr = $update_restaurant_weekend_open_timeErr = $update_restaurant_weekend_end_timeErr
      = $update_restaurant_has_weekly_breakErr = $update_restaurant_weekly_break_dateErr = $update_restaurant_update_dateErr = $update_restaurant_last_updateErr = $update_restaurant_is_activeErr = "";

      $update_cuisine_open = $update_cuisine_out = "";
      $update_cuisine_id = $update_cuisine_cuisine_type = $update_cuisine_cuisine_info = "";
      $update_cuisine_idErr = $update_cuisine_cuisine_typeErr = $update_cuisine_cuisine_infoErr = "";
      
      $update_serves_open = $update_serves_out = "";
      $update_serves_served_at_old = $update_serves_serving_old = "";
      $update_serves_served_at_new = $update_serves_serving_new = "";
      $update_serves_served_at_oldErr = $update_serves_serving_oldErr = "";
      $update_serves_served_at_newErr = $update_serves_serving_newErr = "";
      
      $update_person_open = $update_person_out = $update_personErr = "";
      $update_person_person_id = $update_person_fullname = $update_person_email = $update_person_username = $update_person_password = $update_person_update_date
      = $update_person_last_update = $update_person_is_active = "";
      $update_person_person_idErr = $update_person_fullnameErr = $update_person_emailErr = $update_person_usernameErr = $update_person_passwordErr = $update_person_update_dateErr
      = $update_person_last_updateErr = $update_person_is_activeErr = "";

      $update_works_at_open = $update_works_at_out = "";
      $update_works_at_works_for = $update_works_at_employed = $update_works_at_employee_type = "";
      $update_works_at_works_forErr = $update_works_at_employedErr = $update_works_at_employee_typeErr = "";
  
      $update_restaurant_review_open = $update_restaurant_review_out = $update_restaurant_reviewErr =
      $update_restaurant_review_review_id = $update_restaurant_review_reviewed_by = $update_restaurant_review_reviewed_restaurant= $update_restaurant_review_review_star = $update_restaurant_review_review_content = $update_restaurant_review_update_date= $update_restaurant_review_last_update = $update_restaurant_review_is_active=
      $update_restaurant_review_review_idErr = $update_restaurant_review_reviewed_byErr = $update_restaurant_review_reviewed_restaurantErr = $update_restaurant_review_review_starErr = $update_restaurant_review_review_contentErr = $update_restaurant_review_update_dateErr= $update_restaurant_review_last_updateErr = $update_restaurant_review_is_activeErr="";
      $update_review_followup_open = $update_review_followup_out = $update_restaurant_review_followupErr =
      $update_review_followup_followup_id= $update_review_followup_followed_up_by = $update_review_followup_for_review= $update_review_followup_followup_content =$update_review_followup_update_date =$update_review_followup_last_date = $update_review_followup_is_active=
      $update_review_followup_followup_idErr= $update_review_followup_followed_up_byErr = $update_review_followup_for_reviewErr= $update_review_followup_followup_contentErr =$update_review_followup_update_dateErr =$update_review_followup_last_dateErr = $update_review_followup_is_activeErr=""; 
      $update_restaurant_discussion_open = $update_restaurant_discussion_out = $update_restaurant_discussionErr =
      $update_restaurant_discussion_discussion_id=$update_restaurant_discussion_discussed_by=$update_restaurant_discussion_discussed_restaurant = $update_restaurant_discussion_discussion_content = $update_restaurant_discussion_update_date =$update_restaurant_discussion_last_update= $update_restaurant_discussion_is_active =
      $update_restaurant_discussion_discussion_idErr=$update_restaurant_discussion_discussed_byErr=$update_restaurant_discussion_discussed_restaurantErr = $update_restaurant_discussion_discussion_contentErr = $update_restaurant_discussion_update_dateErr =$update_restaurant_discussion_last_updateErr= $update_restaurant_discussion_is_activeErr ="";
      $update_discussion_reply_open = $update_discussion_reply_out = $update_discussion_replyErr =
      $update_discussion_reply_reply_id = $update_discussion_reply_replied_by = $update_discussion_reply_for_discussion = $update_discussion_reply_reply_content =$update_discussion_reply_update_date = $update_discussion_reply_last_update = $update_discussion_reply_is_active =
      $update_discussion_reply_reply_idErr = $update_discussion_reply_replied_byErr = $update_discussion_reply_for_discussionErr = $update_discussion_reply_reply_contentErr =$update_discussion_reply_update_dateErr = $update_discussion_reply_last_updateErr = $update_discussion_reply_is_activeErr ="";
      $update_restaurant_review_is_active=0;
      $update_review_followup_is_active=0;
      $update_discussion_reply_is_active=0;
      $update_discussion_restaurant_discussion_is_active=0;

      /* #endregion */

      /* #region Initializing Delete Variables */
      $delete_location_open = $delete_location_out = "";
      $delete_location_bldgMgmtNo = "";
      $delete_location_bldgMgmtNoErr = "";

      $delete_business_open = $delete_business_out = "";
      $delete_business_business_id = "";
      $delete_business_business_idErr = "";

      $delete_restaurant_open = $delete_restaurant_out = "";
      $delete_restaurant_restaurant_id  = $delete_restaurant_restaurant_idErr = "";

      $delete_cuisine_open = $delete_cuisine_out = "";
      $delete_cuisine_cuisine_id = "";
      $delete_cuisine_cuisine_idErr = "";

      $delete_serves_open = $delete_serves_out = "";
      $delete_serves_served_at = $delete_serves_serving = "";
      $delete_serves_served_atErr = $delete_serves_servingErr = "";

      $delete_person_open = $delete_person_out = "";
      $delete_person_person_id = $delete_person_person_idErr = "";
      $delete_works_at_open = $delete_works_at_out = "";
      $delete_works_at_works_for = $delete_works_at_works_forErr = $delete_works_at_employed= $delete_works_at_employedErr = "";

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

      $restaurant_rating_filter_open = $restaurant_rating_filter_out = "";
      $restaurant_rating_filter_review_star = "";
      /* #region Initializing Filter Variables */
      $filter_location_open = $filter_location_out = "";
      $filter_location_bldgMgmtNo = "";
      $filter_location_bldgMgmtNoErr = "";


      $filter_cuisine_open = $filter_cuisine_out = "";
      $filter_cuisine_cuisine_id = "";


      $review_filter_person_open = $review_filter_person_out =
       $review_filter_person_person_id="";


      $filter_posts_restaurant_open = $filter_posts_restaurant_out =
      $filter_posts_restaurant_id = "";


      $sort_posts_open = $sort_posts_out = $sot_posts_id = "";
      
      /* #endregion */




      function read_restaurant($where_clause) {
        /* #region  read_restaurant */
        global $conn;
        $sql = "SELECT * FROM restaurant r " . $where_clause . ";";
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
        . "<tr><th>Restaurant ID</th><th>Weekday-Open-Time</th><th>Weekday-End-Time</th><th>Weekend-Open-Time</th><th>Weekend-End-Time</th>"
        . "<th>Weekl-Break-Date</th><th>Create Date</th><th>Last Update</th><th>Is Active</th></tr></thead><tbody>" . $read_restaurant_out . "</table>";
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
          $read_person_out = $read_person_out . "<td>" . $row['create_date'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['last_update'] . "</td>";
          $read_person_out = $read_person_out . "<td>" . $row['is_active'] . "</td></tr>";
        }
        if (empty($read_person_out)){
          $read_person_out = "No result";
        } else {
          $read_person_out = "<table><thead>"
        . "<tr><th>Person ID</th><th>Full Name</th><th>Email</th><th>User Name</th>"
        . "<th>Create Date</th><th>Last Update</th><th>Is Active</th></tr></thead><tbody>" . $read_person_out . "</table>";
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
          . "<tr><th>Works For</th><th>Employed</th><th>Employee Type</th></tr>" . $read_works_at_out . "</table>";
        }
        return $read_works_at_out;
        /* #endregion */
      }


      function read_restaurant_review($orderby) {
        /* #region  read_restaurant_review */
        global $conn;
        $sql = "SELECT * FROM restaurant_review " . $orderby . ";";
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
        . "<tr><th>Review ID</th><th>Reviewed By</th><th>Reviewed Restaurant</th><th>Review Star</th><th>Review Content</th>"
        . "<th>Create Date</th><th>Last Update</th><th>Is Active</th></tr></thead><tbody>" . $read_restaurant_review_out . "</table>";
        }
        return $read_restaurant_review_out;
        /* #endregion */
      }

      
      function read_review_followup($orderby) {
        /* #region  read_restaurant_review */
        global $conn;
        $sql = "SELECT * FROM review_followup " . $orderby . ";";
        $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
        $read_restaurant_followup_out = "";
        while( $row = mysqli_fetch_array($query)) {
          $read_restaurant_followup_out = $read_restaurant_followup_out . "<tr><td>" . $row['followup_id'] . "</td>";
          $read_restaurant_followup_out = $read_restaurant_followup_out . "<td>" . $row['followed_up_by'] . "</td>";
          $read_restaurant_followup_out = $read_restaurant_followup_out . "<td>" . $row['for_review'] . "</td>";
          $read_restaurant_followup_out = $read_restaurant_followup_out . "<td>" . $row['followup_content'] . "</td>";
          $read_restaurant_followup_out = $read_restaurant_followup_out . "<td>" . $row['create_date'] . "</td>";
          $read_restaurant_followup_out = $read_restaurant_followup_out . "<td>" . $row['last_update'] . "</td>";
          $read_restaurant_followup_out = $read_restaurant_followup_out . "<td>" . $row['is_active'] . "</td></tr>";
        }
        if (empty($read_restaurant_followup_out)){
          $read_restaurant_followup_out = "No result";
        } else {
          $read_restaurant_followup_out = "<table><thead>"
        . "<tr><th>Followup ID</th><th>Followedup By</th><th>For Review</th><th>Followup Content</th>"
        . "<th>Create Date</th><th>Last Update</th><th>Is Active</th></tr></thead><tbody>" . $read_restaurant_followup_out . "</table>";
        }
        return $read_restaurant_followup_out;
        /* #endregion */
      }


      function read_restaurant_discussion($orderby){

         /* #region  read_restaurant_discussion */
       
        global $conn;
        $sql = "SELECT * FROM restaurant_discussion " . $orderby . ";";
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
        . "<tr><th>Discussion ID</th><th>Discussed By</th><th>Discussed Restaurant</th><th>Discussion Content</th>"
        . "<th>Create Date</th><th>Last Update</th><th>Is Active</th></tr></thead><tbody>" . $read_restaurant_discussion_out . "</table>";
        }
        return $read_restaurant_discussion_out;
        /* #endregion */
      }


      function read_discussion_reply($orderby){
       /* #region  read_discussion_reply */
       
       global $conn;
       $sql = "SELECT * FROM discussion_reply " . $orderby . ";";
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
       . "<tr><th>Reply ID</th><th>Replied By</th><th>For Discussion</th><th>Reply Content</th>"
       . "<th>Create Date</th><th>Last Update</th><th>Is Active</th></tr></thead><tbody>" . $read_discussion_reply_out . "</table>";
       }
       return $read_discussion_reply_out;
       /* #endregion */
      }
      
      function read_restaurant_rating_filter($where , $order){
      /* #region  read_restaurant_rating_filter */
        global $conn;
        $restaurant_rating_filter_review_star = $_POST["restaurant_rating_filter_review_star"];
        $sql = "SELECT restaurant_id, weekday_open_time, weekday_end_time, weekend_open_time, weekend_end_time, weekly_break_date, r.is_active, AVG(review_star) AS Star"  
        . " FROM restaurant r, restaurant_review rr"
        . " WHERE r.restaurant_id = rr.reviewed_restaurant AND r.Is_active=" 
        . $where
        . " GROUP BY restaurant_id"
        . $order . ";";
        $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
        $restaurant_rating_filter_out = "";
        $restaurant_rating_filter_message = "" ;
        if ($where === "0") {
          $restaurant_rating_filter_message = "All \"inactive\" restaurants of which average star is more than or equal to " . $restaurant_rating_filter_review_star;
        } else {
          $restaurant_rating_filter_message = "All \"active\" restaurants of which average star is more than or equal to " . $restaurant_rating_filter_review_star;
        }
        while( $row = mysqli_fetch_array($query)) {
          if ($row['Star'] >= $restaurant_rating_filter_review_star ) {
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<tr><td>" . $row['restaurant_id'] . "</td>";
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<td>" . $row['Star'] . "</td>";
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<td>" . $row['weekday_open_time'] . "</td>";
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<td>" . $row['weekday_end_time'] . "</td>";
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<td>" . $row['weekend_open_time'] . "</td>";
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<td>" . $row['weekend_end_time'] . "</td>";
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<td>" . $row['weekly_break_date'] . "</td>";
            $restaurant_rating_filter_out = $restaurant_rating_filter_out . "<td>" . $row['is_active'] . "</td></tr>";
          }
        }
        if (empty($restaurant_rating_filter_out)){
          $restaurant_rating_filter_out = "No result";
        }else{
          $restaurant_rating_filter_out = $restaurant_rating_filter_message . "<table><thead>"
          . "<tr><th>Restaurant ID</th><th>Review Star</th><th>Weekday-Open-Time</th><th>Weekday-End-Time</th><th>Weekend-Open-Time</th><th>Weekend-End-Time</th>"
          . "<th>Weekly-Break-Date</th><th>Last Update</th><th>Is Active?</th></tr></thead><tbody>" . $restaurant_rating_filter_out . "</table>";
        }
       
        return $restaurant_rating_filter_out;
  /* #endregion */
      }


      // Hand multiple submits in a single file
      //https://www.techrepublic.com/article/handling-multiple-submits-in-a-single-form-with-php/
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /* #region SUBMIT FORM CREATE */
        if ( isset($_POST["submit_form_create_location"] )){ 
          /* #region submit_form_create_location */
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
          // if (empty($_POST["create_person_person_id"])) {
          //   $create_person_person_idErr = "You must enter a value for create_person_person_id";
          // } else {
          //   $create_person_person_id = $_POST["create_person_person_id"];
          // }
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
            $sql = "INSERT INTO person (fullname, email, username, password, create_date, last_update, is_active) 
            VALUES ( \"" . $create_person_fullname . "\", \"" . $create_person_email . "\", \"" . $create_person_username . "\", \"" 
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
            $create_works_at_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_restaurant_review"] )){ 
          /* #region submit_form_create_restaurant_review */
          $create_restaurant_review_open = "is_open";
          // if (empty($_POST["create_restaurant_review_review_id"])) {
          //   $create_restaurant_review_review_idErr = "You must enter a value for create_restaurant_review_review_id";
          // }else{
          //   $create_restaurant_review_review_id = test_input($_POST["create_restaurant_review_review_id"]);
          // }
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
             if(strval($_POST["create_restaurant_review_review_star"]==="0")){
              $create_restaurant_review_review_starErr = "The rating star ranges from 1 to 5.";

             }else{
               $create_restaurant_review_review_starErr = "You must enter a value for create_restaurant_review_review_star";
             }
          } elseif (($_POST["create_restaurant_review_review_star"]) < 1 || ($_POST["create_restaurant_review_review_star"]) > 5 ){
            $create_restaurant_review_review_starErr = "The rating star ranges from 1 to 5.";
          }
          else{
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
     
          if(   $create_restaurant_review_reviewed_byErr === "" && $create_restaurant_review_reviewed_restaurantErr === ""  && $create_restaurant_review_review_starErr === ""
          && $create_restaurant_review_review_contentErr === "" ) {
            $sql = "INSERT INTO restaurant_review ( reviewed_by, reviewed_restaurant, review_star, review_content, create_date, last_update, is_active) VALUES
             ( " . $create_restaurant_review_reviewed_by . ", " . $create_restaurant_review_reviewed_restaurant . ", 
              " . $create_restaurant_review_review_star . ", \"" . $create_restaurant_review_review_content . "\", \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_restaurant_review_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_review_followup"] )){ 
          /* #region submit_form_create_review_followup */
          $create_review_followup_open = "is_open";

          // if (empty($_POST["create_review_followup_followup_id"])) {
          //   $create_review_followup_followup_idErr = "You must enter a value for create_review_followup_followup_id";
          // }else{
          //   $create_review_followup_followup_id = test_input($_POST["create_review_followup_followup_id"]);
          // }
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
          if( $create_review_followup_followed_up_byErr === "" && $create_review_followup_for_reviewErr === ""
          && $create_review_followup_followup_contentErr === "" ) {
            $sql = "INSERT INTO review_followup ( followed_up_by, for_review, followup_content, create_date, last_update, is_active) VALUES
             ( " . $create_review_followup_followed_up_by . ", " . $create_review_followup_for_review . ", 
             \"" . $create_review_followup_followup_content . "\",  \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_rev_followup_out = "Success";
          }

          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_restaurant_discussion"] )){ 
          /* #region submit_form_create_restaurant_discussion */
          $create_restaurant_discussion_open = "is_open";

          // if (empty($_POST["create_restaurant_discussion_discussion_id"])) {
          //   $create_restaurant_discussion_discussion_idErr = "You must enter a value for create_restaurant_discussion_discussion_id";
          // }else{
          //   $create_restaurant_discussion_discussion_id = test_input($_POST["create_restaurant_discussion_discussion_id"]);
          // }
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
          
          if(   $create_restaurant_discussion_discussed_byErr === "" && $create_restaurant_discussion_discussed_restaurantErr === ""
          && $create_restaurant_discussion_discussion_contentErr === "" ) {
            $sql = "INSERT INTO restaurant_discussion ( discussed_by, discussed_restaurant, discussion_content, create_date, last_update, is_active) VALUES
             (" . $create_restaurant_discussion_discussed_by . ", " . $create_restaurant_discussion_discussed_restaurant . ", 
             \"" . $create_restaurant_discussion_discussion_content . "\",  \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_restaurant_discussion_out = "Success";
          }

          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_create_discussion_reply"] )){ 
          /* #region submit_form_create_discussion_reply */
          $create_discussion_reply_open = "is_open";

          // if (empty($_POST["create_discussion_reply_reply_id"])) {
          //   $create_discussion_reply_reply_idErr = "You must enter a value for create_discussion_reply_reply_id";
          // }else{
          //   $create_discussion_reply_reply_id = test_input($_POST["create_discussion_reply_reply_id"]);
          // }
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
         
          if( $create_discussion_reply_replied_byErr === "" && $create_discussion_reply_for_discussionErr === ""
          && $create_discussion_reply_reply_contentErr === "" ) {
            $sql = "INSERT INTO discussion_reply ( replied_by, for_discussion, reply_content, create_date, last_update, is_active) VALUES
             (" . $create_discussion_reply_replied_by . ", " . $create_discussion_reply_for_discussion . ", 
             \"" . $create_discussion_reply_reply_content . "\",  \"" . date("Y-m-d h:i:s") . "\", \"" . date("Y-m-d h:i:s") . "\", 1 )";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $create_discussion_reply_out = "Success";
          }

 

          /* #endregion */
        }
        /* #endregion */

        /* #region SUBMIT FORM READ */
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
          $read_restaurant_out = read_restaurant("");
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
          $sql = "SELECT * FROM serves";
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $read_serves_out = "<table><thead><tr><td>PK: Business ID</td><td>PK: Cuisine ID</td></tr></thead><tbody>";
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
            . "<tr><th>Discussion ID</th><th>Discussed By</th><th>Discussed Restaurant</th><th>Discussion Content</th><th>Create Date</th><th>Last Update</th><th>Is Active</th></tr>" . $read_restaurant_discussion_out . "</table>";
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
        /* #endregion*/
        
        /* #region SUBMIT FORM UPDATE */
        elseif ( isset($_POST["submit_form_update_location"] )){
          /* #region  submit_for_update_restaurant */ 

          $update_location_open = "is_open";
          if (empty($_POST["update_location_bldgMgmtNo"])) { 
            $update_location_bldgMgmtNoErr = "You must enter a Building Management No.";
          } else {
            $update_location_bldgMgmtNo = test_input($_POST["update_location_bldgMgmtNo"]);
          }
          if (empty($_POST["update_location_zip_no"]) && empty($_POST["update_location_jibun_juso"]) ) { 
            $update_location_zip_noErr = "All update values cannot be empty";
            $update_location_jibun_jusoErr = "All update values cannot be empty";
          } else {
            $isFirst = 1;
            $sql = "UPDATE location SET ";
            if (!empty($_POST["update_location_zip_no"])) { 
              if( $isFirst != 1 ) {
                $sql = $sql . ", ";
              } else {
                $isFirst = 0;
              }
              $update_location_zip_no = test_input($_POST["update_location_zip_no"]);
              $sql = $sql . "zip_no = " . $update_location_zip_no;
            }
            if (!empty($_POST["update_location_jibun_juso"])) { 
              if( $isFirst != 1 ) {
                $sql = $sql . ", ";
              } else {
                $isFirst = 0;
              }
              $update_location_jibun_juso = test_input($_POST["update_location_jibun_juso"]);
              $sql = $sql . "jibun_juso = " . $update_location_jibun_juso;
            }
            $sql = $sql . ", last_update = \"" . date("Y-m-d h:i:s") . "\" WHERE bldgMgmtNo = " . $update_location_bldgMgmtNo;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $update_location_out = "Success";
          }

          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_update_business"] )){ 
          /* #region  submit_for_update_restaurant */
          $update_business_open = "is_open";
          if (empty($_POST["update_business_business_id"])) { 
            $update_business_business_idErr = "You must enter a Business ID.";
          } else {
            $update_business_business_id = test_input($_POST["update_business_business_id"]);
          }
          if (empty($_POST["update_business_name"]) && empty($_POST["update_business_located_in"]) && empty($_POST["update_business_addr_detail"]) ) { 
            $update_business_nameErr = "All update values cannot be empty";
            $update_business_located_inErr = "All update values cannot be empty";
            $create_business_addr_detailErr = "All update values cannot be empty";
          } else {
            $isFirst = 1;
            $sql = "UPDATE business SET ";
            if (!empty($_POST["update_business_name"])) { 
              if( $isFirst != 1 ) {
                $sql = $sql . ", ";
              } else {
                $isFirst = 0;
              }
              $update_business_name = test_input($_POST["update_business_name"]);
              $sql = $sql . " name = \"" . $update_business_name . "\" ";
            }
            if (!empty($_POST["update_business_located_in"])) { 
              if( $isFirst != 1 ) {
                $sql = $sql . ", ";
              } else {
                $isFirst = 0;
              }
              $update_business_located_in = test_input($_POST["update_business_located_in"]);
              $sql = $sql . " located_in = " . $update_business_located_in;
            }
            if (!empty($_POST["update_business_addr_detail"])) { 
              if( $isFirst != 1 ) {
                $sql = $sql . ", ";
              } else {
                $isFirst = 0;
              }
              $update_business_addr_detail = test_input($_POST["update_business_addr_detail"]);
              $sql = $sql . " addr_detail = \"" . $update_business_addr_detail . "\" ";
            }
            $sql = $sql . ", last_update = \"" . date("Y-m-d h:i:s") . "\" WHERE business_id = " . $update_business_business_id;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $update_business_out = "Success";
          }

          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_update_restaurant"] )){ 
          /* #region  submit_for_update_restaurant */
          $update_restaurant_open = "is_open";
          $sql = "UPDATE restaurant SET ";
          
          if (!empty($_POST["update_restaurant_restaurant_id"]) && empty($_POST["update_restaurant_weekday_open_time"]) && empty($_POST["update_restaurant_weekday_end_time"])
          && empty($_POST["update_restaurant_weekend_open_time"]) && empty($_POST["update_restaurant_weekend_end_time"])){
            $update_restaurantErr ="Notice: Only is_active is updated";
            // $update_restaurant_weekday_open_timeErr = "*";
            // $update_restaurant_weekday_end_timeErr = "*";
            // $update_restaurant_weekend_open_timeErr = "*";
            // $update_restaurant_weekend_end_timeErr = "*";
            // $update_restaurant_weekly_break_dateErr = "*";
          } else {
            if (!empty($_POST["update_restaurant_weekday_open_time"])) {
            $update_restaurant_out = $update_restaurant_out . "<br>Updated weekday_open_time with a value:" .$_POST["update_restaurant_weekday_open_time"];
            $update_restaurant_weekday_open_time = test_input($_POST["update_restaurant_weekday_open_time"]);
            $sql = $sql . " weekday_open_time=\"" . $update_restaurant_weekday_open_time . "\",";
          } if (!empty($_POST["update_restaurant_weekday_end_time"])) {
            $update_restaurant_out = $update_restaurant_out . "<br>Updated weekday_end_time with a value:" .$_POST["update_restaurant_weekday_end_time"];
            $update_restaurant_weekday_end_time = test_input($_POST["update_restaurant_weekday_end_time"]);
            $sql = $sql . " weekday_end_time=\"" . $update_restaurant_weekday_end_time . "\",";
          } if (!empty($_POST["update_restaurant_weekend_open_time"])) {
            $update_restaurant_out = $update_restaurant_out . "<br>Updated weekend_open_time with a value:" .$_POST["update_restaurant_weekend_open_time"];
            $update_restaurant_weekend_open_time = test_input($_POST["update_restaurant_weekend_open_time"]);
            $sql = $sql . " weekend_open_time=\"" . $update_restaurant_weekend_open_time . "\",";
          } if (!empty($_POST["update_restaurant_weekend_end_time"])) {
            $update_restaurant_out = $update_restaurant_out . "<br>Updated weekend_end_time with a value:" .$_POST["update_restaurant_weekend_end_time"];
            $update_restaurant_weekend_end_time = test_input($_POST["update_restaurant_weekend_end_time"]);
            $sql = $sql . " weekend_end_time=\"" . $update_restaurant_weekend_end_time . "\",";
          } if (!empty($_POST["update_restaurant_weekly_break_date"])){
            $update_restaurant_out = $update_restaurant_out . "<br>Updated weekly_break_date with a value:" .$_POST["update_restaurant_weekly_break_date"];
            $update_restaurant_weekly_break_date = test_input($_POST["update_restaurant_weekly_break_date"]);
            $sql = $sql . " weekly_break_date=\"" . $update_restaurant_weekly_break_date . "\",";
            }
          }
          if (!empty($_POST["update_restaurant_is_active"])){
            $update_restaurant_is_active = 1;
            $update_restaurant_out = $update_restaurant_out . "<br>Updated is_active with a value:" . $update_restaurant_is_active;
            $sql = $sql . " is_active=" . $update_restaurant_is_active . ",";
          } else {
            $update_restaurant_is_active = 0;
            $update_restaurant_out = $update_restaurant_out . "<br>Updated is_active with a value:" . $update_restaurant_is_active;
            $sql = $sql . " is_active=" . $update_restaurant_is_active . ",";
          }
          $sql = $sql . " last_update=\"" . date("Y-m-d h:i:s") . "\"";
          // $sql = chop($sql, ",");
          if (empty($_POST["update_restaurant_restaurant_id"])) {
            $update_restaurant_restaurant_idErr = "You must enter a value for update_restaurant_restaurant_id";
          } else {
            $update_restaurant_out = $update_restaurant_out . "<br>For a row whose restaurant_id value is:" . $_POST["update_restaurant_restaurant_id"];
            $update_restaurant_restaurant_id = $_POST["update_restaurant_restaurant_id"];
            $sql = $sql . " WHERE restaurant_id=" . $update_restaurant_restaurant_id . ";";
          }
          if ( $update_restaurant_restaurant_idErr === ""){
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_update_cuisine"] )){ 
          /* #region submit_form_update_cuisine */
          $update_cuisine_open = "is_open";
          if (empty($_POST["update_cuisine_id"])) { 
            $update_cuisine_idErr = "You must enter a cuisine id";
          } else {
            $update_cuisine_id = test_input($_POST["update_cuisine_id"]);
          }
          if (empty($_POST["update_cuisine_cuisine_type"]) && empty($_POST["update_cuisine_cuisine_info"]) ){
            $update_cuisine_cuisine_typeErr = "You must enter either cuisine type or cuisine info to update"; 
            $update_cuisine_cuisine_infoErr = "You must enter either cuisine type or cuisine info to update"; 
          } else {
            if (empty($_POST["update_cuisine_cuisine_type"]) && !empty($_POST["update_cuisine_cuisine_info"]) ) {
              $update_cuisine_cuisine_info = test_input($_POST["update_cuisine_cuisine_info"]);
              $sql = "UPDATE cuisine SET cuisine_info = \"" . $update_cuisine_cuisine_info . "\" WHERE cuisine_id = " . $update_cuisine_id;
            } elseif (!empty($_POST["update_cuisine_cuisine_type"]) && empty($_POST["update_cuisine_cuisine_info"]) ) {
              $update_cuisine_cuisine_type = test_input($_POST["update_cuisine_cuisine_type"]);
              $sql = "UPDATE cuisine SET cuisine_type = \"" . $update_cuisine_cuisine_type . "\" WHERE cuisine_id = " . $update_cuisine_id;
            } elseif (!empty($_POST["update_cuisine_cuisine_type"]) && !empty($_POST["update_cuisine_cuisine_info"]) ) {
              $update_cuisine_cuisine_info = test_input($_POST["update_cuisine_cuisine_info"]);
              $update_cuisine_cuisine_type = test_input($_POST["update_cuisine_cuisine_type"]);
              $sql = "UPDATE cuisine SET cuisine_type = \"" . $update_cuisine_cuisine_type . "\",  cuisine_info = \"" . $update_cuisine_cuisine_info . "\" WHERE cuisine_id = " . $update_cuisine_id;
            }
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $update_cuisine_out = "Success";
          }
          // if( $update_cuisine_cuisine_typeErr === "" && $update_cuisine_cuisine_infoErr === "" ) { }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_update_serves"] )){ 
          /* #region submit_form_update_cuisine */
          $update_serves_open = "is_open";
          if (empty($_POST["update_serves_served_at_old"])) { 
            $update_serves_served_at_oldErr = "You must enter a Business ID.";
          } else {
            $update_serves_served_at_old = test_input($_POST["update_serves_served_at_old"]);
          }
          if (empty($_POST["update_serves_serving_old"])) { 
            $update_serves_serving_oldErr = "You must enter a Business ID.";
          } else {
            $update_serves_serving_old = test_input($_POST["update_serves_serving_old"]);
          }
          if (empty($_POST["update_serves_served_at_new"])) { 
            $update_serves_served_at_newErr = "You must enter a Business ID.";
          } else {
            $update_serves_served_at_new = test_input($_POST["update_serves_served_at_new"]);
          }
          if (empty($_POST["update_serves_serving_new"])) { 
            $update_serves_serving_newErr = "You must enter a Business ID.";
          } else {
            $update_serves_serving_new = test_input($_POST["update_serves_serving_new"]);
          }
          
          if( $update_serves_served_at_oldErr == "" && $update_serves_serving_oldErr == "" && $update_serves_served_at_newErr == "" && $update_serves_serving_newErr == "" ) {
            $sql = "UPDATE serves SET served_at = " . $update_serves_served_at_new . ", serving = " . $update_serves_serving_new ." WHERE served_at = " .  $update_serves_served_at_old . " AND serving = " . $update_serves_serving_old;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $update_serves_out = "Success";
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_update_person"] )){ 
          /* #region  submit_form_update_person */
          $update_person_open = "is_open";
          $sql = "UPDATE person SET ";

          if (!empty($_POST["update_person_person_id"]) && empty($_POST["update_person_fullname"]) && empty($_POST["update_person_email"]) && empty($_POST["update_person_username"]) 
          && empty($_POST["update_person_password"]) && empty($_POST["update_person_is_active"])) {
            $update_personErr = "Notice: Only is_active is updated";
            // $update_person_fullnameErr = "*";
            // $update_person_emailErr = "*";
            // $update_person_usernameErr = "*";
            // $update_person_passwordErr = "*";
            // $update_person_is_activeErr = "*";
          } else {
            if (!empty($_POST["update_person_fullname"])){
            $update_person_out = $update_person_out . "<br>Updated fullname with a value:" .$_POST["update_person_fullname"];
            $update_person_fullname = test_input($_POST["update_person_fullname"]);
            $sql = $sql . " fullname=\"" . $update_person_fullname . "\",";
          } if (!empty($_POST["update_person_email"])) {
            $update_person_out = $update_person_out . "<br>Updated email with a value:" .$_POST["update_person_email"];
            $update_person_email = test_input($_POST["update_person_email"]);
            $sql = $sql . " email=\"" . $update_person_email . "\",";
          } if (!empty($_POST["update_person_username"])){
            $update_person_out = $update_person_out . "<br>Updated username with a value:" .$_POST["update_person_username"];
            $update_person_username = test_input($_POST["update_person_username"]);
            $sql = $sql . " username=\"" . $update_person_username . "\",";
          } if (!empty($_POST["update_person_password"])) {
            $update_person_out = $update_person_out . "<br>Updated password with a value:" .$_POST["update_person_password"];
            $update_person_password = test_input($_POST["update_person_password"]);
            $sql = $sql . " password=\"" . $update_person_password . "\",";
            } 
          }
          if (!empty($_POST["update_person_is_active"])) {
            $update_person_is_active = 1;
            $update_person_out = $update_person_out . "<br>Updated is_active with a value:" . $update_person_is_active;
            $sql = $sql . " is_active=" . $update_person_is_active . ",";
          } else {
            $update_person_is_active = 0;
            $update_person_out = $update_person_out . "<br>Updated is_active with a value:" .$update_person_is_active;
            $sql = $sql . " is_active=" . $update_person_is_active . ",";
          }
          $sql = $sql . " last_update=\"" . date("Y-m-d h:i:s") . "\"";

          if (empty($_POST["update_person_person_id"])) {
            $update_person_person_idErr = "You must enter a value for update_person_person_id";
          } else {
            $update_person_out = $update_person_out . "<br>For a row whose person_id value is:" . $_POST["update_person_person_id"];
            $update_person_person_id = $_POST["update_person_person_id"];
            $sql = $sql . " WHERE person_id=" . $update_person_person_id . ";";
          }
          if ($update_person_person_idErr === "") {
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_update_works_at"] )){ 
          /* #region  submit_form_update_works_at */
          $update_works_at_open = "is_open";
          $sql = "UPDATE works_at SET ";
          if (empty($_POST["update_works_at_employee_type"])) {
            $update_works_at_employee_typeErr = "You must enter a value for update_works_at_employee_type";
          } else {
            $update_works_at_out = $update_works_at_out . "<br>Updated employee_type with a value:" . $_POST["update_works_at_employee_type"];
            $update_works_at_employee_type = test_input($_POST["update_works_at_employee_type"]);
            $sql = $sql . " employee_type=\"" . $update_works_at_employee_type . "\"";
          }
          if (empty($_POST["update_works_at_works_for"])) {
            $update_works_at_works_forErr = "You must enter a value for update_works_at_works_for";
          } else {
            $update_works_at_out = $update_works_at_out . "<br>For a row whose works_for value is:" . $_POST["update_works_at_works_for"];
            $update_works_at_works_for = $_POST["update_works_at_works_for"];
            $sql = $sql . " WHERE works_for=" . $update_works_at_works_for;
          }
          if (empty($_POST["update_works_at_employed"])) {
            $update_works_at_employedErr = "You must enter a value for update_works_at_employed";
          } else {
            $update_works_at_out = $update_works_at_out . "<br>For a row whose employed value is:" . $_POST["update_works_at_employed"];
            $update_works_at_employed = $_POST["update_works_at_employed"];
            $sql = $sql . " AND employed=" . $update_works_at_employed . ";";
          }
          echo $sql;
          if ($update_works_at_works_forErr === "" && $update_works_at_employedErr === "" && $update_works_at_employee_typeErr === "") {
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
          /* #endregion */
        }
        elseif ( isset($_POST["submit_form_update_restaurant_review"] )){ 

           /* #region  submit_form_update_restaurant_review */
           $update_restaurant_review_open = "is_open";
           $sql = "UPDATE restaurant_review SET ";
 
           if (!empty($_POST["update_restaurant_review_review_id"]) 
          //  && empty($_POST["update_restaurant_review_reviewed_by"]) && empty($_POST["update_restaurant_review_reviewed_restaurant"]) 
           && empty($_POST["update_restaurant_review_review_star"]) 
           && empty($_POST["update_restaurant_review_review_content"]) 
          //  && empty($_POST["update_restaurant_review_is_active"])
           ) {
             $update_restaurant_reviewErr = "Notice: Nothing is update";
             // $update_person_fullnameErr = "*";
             // $update_person_emailErr = "*";
             // $update_person_usernameErr = "*";
             // $update_person_passwordErr = "*";
             // $update_person_is_activeErr = "*";
           }
           
           else {
          //   if (!empty($_POST["update_restaurant_review_reviewed_by"])) {
          //    $update_restaurant_review_out = $update_restaurant_review_out . "<br>Updated restaurant review reviewed by:" .$_POST["update_restaurant_review_reviewed_by"];
          //    $update_restaurant_review_reviewed_by = test_input($_POST["update_restaurant_review_reviewed_by"]);
          //    $sql = $sql . " reviewed_by=\"" . $update_restaurant_review_reviewed_by . "\",";
          //  } if (!empty($_POST["update_restaurant_review_reviewed_restaurant"])){
          //    $update_restaurant_review_out = $update_restaurant_review_out . "<br>Updated reviewed_restaurant:" .$_POST["update_restaurant_review_reviewed_restaurant"];
          //    $update_restaurant_review_reviewed_restaurant = test_input($_POST["update_restaurant_review_reviewed_restaurant"]);
          //    $sql = $sql . " reviewed_restaurant=\"" . $update_restaurant_review_reviewed_restaurant . "\",";
          //  }
            if((empty($_POST["update_restaurant_review_review_star"]))){
              if(strval($_POST["update_restaurant_review_review_star"]) ==="0"){
                $update_restaurant_review_review_starErr ="The rating star has to be in range of 1 to 5.";
                $update_restaurant_review_out = $update_restaurant_review_out . "<br>The rating star has to be in range of 1 to 5.";
              }
            }
            if (!empty($_POST["update_restaurant_review_review_star"])) {
                  if (($_POST["update_restaurant_review_review_star"]) < 1 || ($_POST["update_restaurant_review_review_star"]) > 5  ){
                    $update_restaurant_review_review_starErr ="The rating star has to be in range of 1 to 5.";
                    $update_restaurant_review_out = $update_restaurant_review_out . "<br>The rating star has to be in range of 1 to 5.";
                  } else{
                    $update_restaurant_review_out = $update_restaurant_review_out . "<br>Updated restaurant review star:" .$_POST["update_restaurant_review_review_star"];
                    $update_restaurant_review_review_star = test_input($_POST["update_restaurant_review_review_star"]);
                    $sql = $sql . " review_star=\"" . $update_restaurant_review_review_star . "\",";
                  }
             } if (!empty($_POST["update_restaurant_review_review_content"])) {
              $update_restaurant_review_out = $update_restaurant_review_out . "<br>Updated restaurant review content:" .$_POST["update_restaurant_review_review_content"];
              $update_restaurant_review_review_content = test_input($_POST["update_restaurant_review_review_content"]);
              $sql = $sql . " review_content=\"" . $update_restaurant_review_review_content . "\",";
              } 
           }
          //  if (!empty($_POST["update_restaurant_review_is_active"])) {
          //    $update_restaurant_review_is_active = 1;
          //    $update_restaurant_review_out = $update_restaurant_review_out . "<br>Updated is_active with a value:" . $update_restaurant_review_is_active;
          //    $sql = $sql . " is_active=" . $update_restaurant_review_is_active . ",";
          //  } else {
          //    $update_restaurant_review_is_active = 0;
          //    $update_restaurant_review_out = $update_restaurant_review_out . "<br>Updated is_active with a value:" .$update_restaurant_review_is_active;
          //    $sql = $sql . " is_active=" . $update_restaurant_review_is_active . ",";
          //  }
           $sql = $sql . " last_update=\"" . date("Y-m-d h:i:s") . "\"";
 
           if (empty($_POST["update_restaurant_review_review_id"])) {
             $update_restaurant_review_review_idErr = "You must enter a value for update_restaurant_review_review_id";
           } else {
             $update_restaurant_review_out = $update_restaurant_review_out . "<br>For a row whose review_id value is:" . $_POST["update_restaurant_review_review_id"];
             $update_restaurant_review_review_id = $_POST["update_restaurant_review_review_id"];
             $sql = $sql . " WHERE review_id= " . $update_restaurant_review_review_id . ";";
            }
           if ($update_restaurant_review_review_idErr === "") {
             $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
           }
           /* #endregion */



        }
        elseif ( isset($_POST["submit_form_update_review_followup"] )){ 
          

               /* #region  submit_form_update_review_followup */
          $update_review_followup_open = "is_open";
          $sql = "UPDATE review_followup SET ";

          if (!empty($_POST["update_review_followup_followup_id"]) 
          // && empty($_POST["update_review_followup_followed_up_by"]) && empty($_POST["update_review_followup_followup_for_review"]) 
          && empty($_POST["update_review_followup_followup_content"]) 
          // && empty($_POST["update_review_followup_is_active"])
          ) {
            $update_restaurant_review_followupErr = "Notice: Nothing is updated";
            // $update_person_fullnameErr = "*";
            // $update_person_emailErr = "*";
            // $update_person_usernameErr = "*";
            // $update_person_passwordErr = "*";
            // $update_person_is_activeErr = "*";
          } else {
          //   if (!empty($_POST["update_review_followup_followed_up_by"])){
          //   $update_review_followup_out = $update_review_followup_out . "<br>Updated followup followed up by:" .$_POST["update_review_followup_followed_up_by"];
          //   $update_review_followup_followed_up_by = test_input($_POST["update_review_followup_followed_up_by"]);
          //   $sql = $sql . " followed_up_by=\"" . $update_review_followup_followed_up_by . "\",";
          // } if (!empty($_POST["update_review_followup_followup_for_review"])) {
          //   $update_review_followup_out = $update_review_followup_out . "<br>Updated for_review with a value:" .$_POST["update_review_followup_followup_for_review"];
          //   $update_review_followup_followup_for_review = test_input($_POST["update_review_followup_followup_for_review"]);
          //   $sql = $sql . " for_review=\"" . $update_review_followup_followup_for_review . "\",";
          //} 
          if (!empty($_POST["update_review_followup_followup_content"])){
            $update_review_followup_out = $update_review_followup_out . "<br>Updated followup content with a value:" .$_POST["update_review_followup_followup_content"];
            $update_review_followup_followup_content = test_input($_POST["update_review_followup_followup_content"]);
            $sql = $sql . " followup_content=\"" . $update_review_followup_followup_content . "\",";
          }  

          } 
          // if (!empty($_POST["update_review_followup_is_active"])) {
          //   $update_review_followup_is_active = 1;
          //   $update_review_followup_out = $update_review_followup_out . "<br>Updated is_active with a value:" . $update_review_followup_is_active;
          //   $sql = $sql . " is_active=" . $update_review_followup_is_active . ",";
          // } else {
          //   $update_review_followup_is_active = 0;
          //   $update_review_followup_out = $update_review_followup_out . "<br>Updated is_active with a value:" .$update_review_followup_is_active;
          //   $sql = $sql . " is_active=" . $update_review_followup_is_active . ",";
          // }
          $sql = $sql . " last_update=\"" . date("Y-m-d h:i:s") . "\"";

          if (empty($_POST["update_review_followup_followup_id"])) {
            $update_review_followup_followup_idErr = "You must enter a value for update_review_followup_followup_id";
          } else {
            $update_review_followup_out = $update_review_followup_out . "<br>For a row whose followup_id value is:" . $_POST["update_review_followup_followup_id"];
            $update_review_followup_followup_id = $_POST["update_review_followup_followup_id"];
            $sql = $sql . " WHERE followup_id=" . $update_review_followup_followup_id . ";";
          }
          if ($update_review_followup_followup_idErr === "") {
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
          /* #endregion */


 
          
        }
        elseif ( isset($_POST["submit_form_update_restaurant_discussion"] )){

  
            /* #region  submit_form_update_restaurant_discussion */
          $update_restaurant_discussion_open = "is_open";
          $sql = "UPDATE restaurant_discussion SET ";

          if (!empty($_POST["update_restaurant_discussion_discussion_id"]) 
          // && empty($_POST["update_restaurant_discussion_discussed_by"]) && empty($_POST["update_restaurant_discussion_discussed_restaurant"])
           && empty($_POST["update_restaurant_discussion_discussion_content"])
          //  && empty($_POST["update_restaurant_discussion_is_active"])
           ) {
            $update_restaurant_discussionErr = "Notice: Nothing is updated";
            // $update_person_fullnameErr = "*";
            // $update_person_emailErr = "*";
            // $update_person_usernameErr = "*";
            // $update_person_passwordErr = "*";
            // $update_person_is_activeErr = "*";
          } else {
          //   if (!empty($_POST["update_restaurant_discussion_discussed_by"])){
          //   $update_restaurant_discussion_out = $update_restaurant_discussion_out . "<br>Updated restaurant discussion discussed by:" .$_POST["update_restaurant_discussion_discussed_by"];
          //   $update_restaurant_discussion_discussed_by = test_input($_POST["update_restaurant_discussion_discussed_by"]);
          //   $sql = $sql . " discussed_by=\"" . $update_restaurant_discussion_discussed_by . "\",";
          // } if (!empty($_POST["update_restaurant_discussion_discussed_restaurant"])) {
          //   $update_restaurant_discussion_out = $update_restaurant_discussion_out . "<br>Updated discussed restaurant with:" .$_POST["update_restaurant_discussion_discussed_restaurant"];
          //   $update_restaurant_discussion_discussed_restaurant = test_input($_POST["update_restaurant_discussion_discussed_restaurant"]);
          //   $sql = $sql . " discussed_restaurant=\"" . $update_restaurant_discussion_discussed_restaurant . "\",";
          // }
           if (!empty($_POST["update_restaurant_discussion_discussion_content"])){
            $update_restaurant_discussion_out = $update_restaurant_discussion_out . "<br>Updated discussion content with a value:" .$_POST["update_restaurant_discussion_discussion_content"];
            $update_restaurant_discussion_discussion_content = test_input($_POST["update_restaurant_discussion_discussion_content"]);
            $sql = $sql . " discussion_content=\"" . $update_restaurant_discussion_discussion_content . "\",";
          }  

          } 
          // if (!empty($_POST["update_restaurant_discussion_is_active"])) {
          //   $update_restaurant_discussion_is_active = 1;
          //   $update_restaurant_discussion_out = $update_restaurant_discussion_out . "<br>Updated is_active with a value:" . $update_restaurant_discussion_is_active;
          //   $sql = $sql . " is_active=" . $update_review_followup_is_active . ",";
          // } else {
          //   $update_restaurant_discussion_is_active = 0;
          //   $update_restaurant_discussion_out = $update_restaurant_discussion_out . "<br>Updated is_active with a value:" .$update_restaurant_discussion_is_active;
          //   $sql = $sql . " is_active=" . $update_restaurant_discussion_is_active . ",";
          // }
          $sql = $sql . " last_update=\"" . date("Y-m-d h:i:s") . "\"";

          if (empty($_POST["update_restaurant_discussion_discussion_id"])) {
            $update_restaurant_discussion_discussion_idErr = "You must enter a value for update_restaurant_discussion_discussion_id";
          } else {
            $update_restaurant_discussion_out = $update_restaurant_discussion_out . "<br>For a row whose discussion_id value is:" . $_POST["update_restaurant_discussion_discussion_id"];
            $update_restaurant_discussion_discussion_id = $_POST["update_restaurant_discussion_discussion_id"];
            $sql = $sql . " WHERE discussion_id=" . $update_restaurant_discussion_discussion_id . ";";
          }
          if ($update_restaurant_discussion_discussion_idErr === "") {
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
          /* #endregion */



          

        }
        elseif ( isset($_POST["submit_form_update_discussion_reply"] )){ 
     
            /* #region  submit_form_update_discussion_reply */
            $update_discussion_reply_open = "is_open";
            $sql = "UPDATE discussion_reply SET ";

            if (!empty($_POST["update_discussion_reply_reply_id"]) && empty($_POST["update_discussion_reply_replied_by"]) && empty($_POST["update_discussion_reply_for_discussion"]) && empty($_POST["update_discussion_reply_reply_content"]) && empty($_POST["update_discussion_reply_is_active"])) {
              $update_discussion_replyErr = "Notice: Only is_active is updated";
              // $update_person_fullnameErr = "*";
              // $update_person_emailErr = "*";
              // $update_person_usernameErr = "*";
              // $update_person_passwordErr = "*";
              // $update_person_is_activeErr = "*";
            } else {
            //   if (!empty($_POST["update_discussion_reply_replied_by"])){
            //   $update_discussion_reply_out = $update_discussion_reply_out . "<br>Updated restaurant discussion replied by:" .$_POST["update_discussion_reply_replied_by"];
            //   $update_discussion_reply_replied_by = test_input($_POST["update_discussion_reply_replied_by"]);
            //   $sql = $sql . " replied_by=\"" . $update_discussion_reply_replied_by . "\",";
            // } if (!empty($_POST["update_discussion_reply_for_discussion"])) {
            //   $update_discussion_reply_out = $update_discussion_reply_out . "<br>Updated discussed reply with:" .$_POST["update_discussion_reply_for_discussion"];
            //   $update_discussion_reply_for_discussion = test_input($_POST["update_discussion_reply_for_discussion"]);
            //   $sql = $sql . " for_discussion=\"" . $update_discussion_reply_for_discussion . "\",";
            // } 
            if (!empty($_POST["update_discussion_reply_reply_content"])){
              $update_discussion_reply_out = $update_discussion_reply_out . "<br>Updated discussion reply content with a value:" .$_POST["update_discussion_reply_reply_content"];
              $update_discussion_reply_reply_content = test_input($_POST["update_discussion_reply_reply_content"]);
              $sql = $sql . " reply_content=\"" . $update_discussion_reply_reply_content . "\",";
            }  

            } 
            // if (!empty($_POST["update_discussion_reply_is_active"])) {
            //   $update_discussion_reply_is_active = 1;
            //   $update_discussion_reply_out = $update_discussion_reply_out . "<br>Updated is_active with a value:" . $update_discussion_reply_is_active;
            //   $sql = $sql . " is_active=" . $update_discussion_reply_is_active . ",";
            // } else {
            //   $update_discussion_reply_is_active = 0;
            //   $update_discussion_reply_out = $update_discussion_reply_out . "<br>Updated is_active with a value:" .$update_discussion_reply_is_active;
            //   $sql = $sql . " is_active=" . $update_discussion_reply_is_active . ",";
            // }
            $sql = $sql . " last_update=\"" . date("Y-m-d h:i:s") . "\"";

            if (empty($_POST["update_discussion_reply_reply_id"])) {
              $update_discussion_reply_reply_idErr = "You must enter a value for update_discussion_reply_reply_id";
            } else {
              $update_discussion_reply_out = $update_discussion_reply_out . "<br>For a row whose reply_id value is:" . $_POST["update_discussion_reply_reply_id"];
              $update_discussion_reply_reply_id = $_POST["update_discussion_reply_reply_id"];
              $sql = $sql . " WHERE reply_id=" . $update_discussion_reply_reply_id . ";";
            }
            if ($update_discussion_reply_reply_idErr === "") {
              $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            }
            /* #endregion */
        }
        /* #endregion */

        /* #region SUBMIT FORM DELETE */
        elseif ( isset($_POST["submit_form_delete_location"] )){ 
          /* #region submit_form_delete_location */
          $delete_location_open = "is_open";
    
          if (empty($_POST["delete_location_bldgMgmtNo"])) { 
            $delete_location_bldgMgmtNoErr = "You must enter a Building Management Number.";
          } else {
            $delete_location_bldgMgmtNo = test_input($_POST["delete_location_bldgMgmtNo"]);
          }
          if ($delete_location_bldgMgmtNoErr === ""){
            $sql = "DELETE FROM location WHERE bldgMgmtNo = " . $delete_location_bldgMgmtNo;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $delete_location_out = "Success"; 
          }
          /* #endregion */ 
        }
        elseif ( isset($_POST["submit_form_delete_business"] )){ 
          /* #region submit_form_delete_business */
          $delete_business_open = "is_open";
    
          if (empty($_POST["delete_business_business_id"])) { 
            $delete_business_business_idErr = "You must enter a Business ID.";
          } else {
            $delete_business_business_id = test_input($_POST["delete_business_business_id"]);
          }
          if ($delete_business_business_idErr === ""){
            $sql = "DELETE FROM business WHERE business_id = " . $delete_business_business_id;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $delete_business_out = "Success"; 
          }
          /* #endregion */ 
        }
        elseif ( isset($_POST["submit_form_delete_restaurant"] )){
         /* #region  sumit_from_delete_restaurant */
          $delete_restaurant_open = "is_open";
          if (empty($_POST["delete_restaurant_restaurant_id"])) {
            $delete_restaurant_restaurant_idErr = "You must enter a value for delete_restaurant_restaurant_id";
          } else {
            $delete_restaurant_restaurant_id = $_POST["delete_restaurant_restaurant_id"];
            $delete_restaurant_out = "The restaurant of which restaurant_id is ". $delete_restaurant_restaurant_id . " is deleted.";
            $sql = "DELETE FROM restaurant WHERE restaurant_id=" . $delete_restaurant_restaurant_id . ";";
            echo $sql;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
         /* #endregion */
        }
        elseif ( isset($_POST["submit_form_delete_cuisine"] )){ 
          /* #region submit_form_delete_cuisine */
          $delete_cuisine_open = "is_open";
          if (empty($_POST["delete_cuisine_cuisine_id"])) { 
            $delete_cuisine_cuisine_idErr = "You must enter a Cuisine ID.";
          } else {
            $delete_cuisine_cuisine_id = test_input($_POST["delete_cuisine_cuisine_id"]);
          }
          if ($delete_cuisine_cuisine_idErr === ""){
            $sql = "DELETE FROM cuisine WHERE cuisine_id = " . $delete_cuisine_cuisine_id;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $delete_cuisine_out = "Success"; 
          }
          /* #endregion */ 
        }
        elseif ( isset($_POST["submit_form_delete_serves"] )){ 
          /* #region submit_form_delete_serves */
          $delete_serves_open = "is_open";
          if (empty($_POST["delete_serves_served_at"])) { 
            $delete_serves_served_atErr = "You must enter a Business ID.";
          } else {
            $delete_serves_served_at = test_input($_POST["delete_serves_served_at"]);
          }
          if (empty($_POST["delete_serves_serving"])) { 
            $delete_serves_servingErr = "You must enter a Cuisine ID";
          } else {
            $delete_serves_serving = test_input($_POST["delete_serves_serving"]);
          }
          if ($delete_serves_served_atErr === "" && $delete_serves_servingErr === ""){
            $sql = "DELETE FROM serves WHERE served_at = " . $delete_serves_served_at . ", serving = " . $delete_serves_serving;
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $delete_serves_out = "Success"; 
          }
          /* #endregion */ 
        }
        elseif ( isset($_POST["submit_form_delete_person"] )){
          /* #region  submit_form_delete_person */
          $delete_person_open = "is_open";
          if (empty($_POST["delete_person_person_id"])) {
            $delete_person_person_idErr = "You must enter a value for person_id";
          } else {
            $delete_person_person_id = $_POST["delete_person_person_id"];
            $delete_person_out = "The person whose person_id is ". $delete_person_person_id . " is deleted.";
            $sql = "DELETE FROM person WHERE person_id=" . $delete_person_person_id . ";";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
          /* #endregion */
         }
        elseif ( isset($_POST["submit_form_delete_works_at"] )){
          /* #region  submit_form_delte_works_at */
          $delete_works_at_open = "is_open";
          if (empty($_POST["delete_works_at_works_for"])) {
            $delete_works_at_works_forErr = "You must enter a value for works_for";
          } else {
            $delete_works_at_works_for = $_POST["delete_works_at_works_for"];
            $sql = "DELETE FROM works_at WHERE works_for=" . $delete_works_at_works_for;
          }
          if (empty($_POST["delete_works_at_employed"])) {
            $delete_works_at_employedErr = "You must enter a value for employed";
          } else {
            $delete_works_at_employed = $_POST["delete_works_at_employed"];
            $delete_works_at_out = "The works_at realtion of which works for is ". $delete_works_at_works_for . " and employed is " . $delete_works_at_employed . " is deleted.";
            $sql = $sql . " AND employed=" . $delete_works_at_employed . ";";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          }
          /* #endregion */
         }
        elseif ( isset($_POST["submit_form_delete_restaurant_review"] )){ 
             /* #region  submit_form_delete_restaurant_review */
             $delete_restaurant_review_open = "is_open";
             if (empty($_POST["delete_restaurant_review_review_id"])) {
               $delete_restaurant_review_review_idErr = "You must enter a valid/existing value for review_id";
             } else {
               $delete_restaurant_review_review_id = $_POST["delete_restaurant_review_review_id"];
               $delete_restaurant_review_out = "The restaurant review id that is ". $delete_restaurant_review_review_id . " is deleted.";
               $sql = "DELETE FROM restaurant_review WHERE review_id=" . $delete_restaurant_review_review_id . ";";
               $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
             }
             /* #endregion */
        }
        elseif ( isset($_POST["submit_form_delete_review_followup"] )){
              /* #region  submit_form_delete_review_followup */
              $delete_review_followup_open = "is_open";
              if (empty($_POST["delete_review_followup_followup_id"])) {
                $delete_review_followup_followup_idErr = "You must enter a valid/existing value for followup_id";
              } else {
                $delete_review_followup_followup_id = $_POST["delete_review_followup_followup_id"];
                $delete_review_followup_out = "The review followup  id that is ". $delete_review_followup_followup_id . " is deleted.";
                $sql = "DELETE FROM review_followup WHERE followup_id=" . $delete_review_followup_followup_id . ";";
                $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
              }
              /* #endregion */
         }
        elseif ( isset($_POST["submit_form_delete_restaurant_discussion"] )){
                  /* #region  submit_form_delete_restaurant_discussion */
                  $delete_restaurant_discussion_open = "is_open";
                  if (empty($_POST["delete_restaurant_discussion_discussion_id"])) {
                    $delete_restaurant_discussion_discussion_idErr = "You must enter a valid/existing value for discussion_id";
                  } else {
                    $delete_restaurant_discussion_discussion_id = $_POST["delete_restaurant_discussion_discussion_id"];
                    $delete_restaurant_discussion_out = "The restaurant discussion  id that is ". $delete_restaurant_discussion_discussion_id . " is deleted.";
                    $sql = "DELETE FROM restaurant_discussion WHERE discussion_id=" . $delete_restaurant_discussion_discussion_id . ";";
                    $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
                  }
                  /* #endregion */
         }
        elseif ( isset($_POST["submit_form_delete_discussion_reply"] )){ 
                    /* #region  submit_form_delete_discussion_reply */
                    $delete_discussion_reply_open = "is_open";
                     if (empty($_POST["delete_discussion_reply_reply_id"])) {
                       $delete_discussion_reply_reply_idErr = "You must enter a valid/existing value for discussion reply_id";
                     } else {
                        $delete_discussion_reply_reply_id = $_POST["delete_discussion_reply_reply_id"];
                        $delete_discussion_reply_out = "The restaurant discussion reply id that is ". $delete_discussion_reply_reply_id . " is deleted.";
                        $sql = "DELETE FROM discussion_reply WHERE reply_id=" . $delete_discussion_reply_reply_id . ";";
                        $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
                            }
                     /* #endregion */
        }
        /* #endregion */
        elseif ( isset($_POST["submit_form_restaurant_rating_filter"] )){
        /* #region  submit_form_restaurant_rating_filter */
          $restaurant_rating_filter_open = "is_open";
          $restaurant_rating_filter_out = "";
          $order = $where = "";
          if (empty($_POST["restaurant_rating_filter_order"])){
            $restaurant_rating_filter_out = "The default order is descending<br>";
          } elseif ($_POST["restaurant_rating_filter_order"] === "Highest to Lowest") {
            $order = " ORDER BY Star DESC";
          } elseif ($_POST["restaurant_rating_filter_order"] === "Lowest to Highest") {
            $order = " ORDER BY Star ASC";
          }
          if (empty($_POST["restaurant_rating_filter_order"])) {
            $where = "0";
          } else {
            $where = "1";
          }

          $restaurant_rating_filter_out = $restaurant_rating_filter_out . read_restaurant_rating_filter($where, $order);
     /* #endregion */
        }

        /* #region SUBMIT FORM FILTER */
        elseif ( isset($_POST["submit_form_filter_location"] )){ 
          /* #region submit_form_filter_location */
          $filter_location_open = "is_open";
          $filter_location_bldgMgmtNo = test_input($_POST["filter_location_bldgMgmtNo"]);
          $sql = "SELECT * FROM business, restaurant WHERE business.business_id = restaurant.restaurant_id";
          if ($filter_location_bldgMgmtNo != "all"){
            $sql = $sql . " AND business.located_in = " . $filter_location_bldgMgmtNo ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $filter_location_out = "<table><thead><tr><td>Restaurant Name</td><td>Weekday Open Close Times</td><td>Weekend Open Close Time</td><td>Weekly Break Day</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $filter_location_out = $filter_location_out . "<tr><td>" . $row['name'] . "</td>";
            $filter_location_out = $filter_location_out . "<td>" . $row['weekday_open_time'] . " ~ " . $row['weekday_end_time'] . "</td>";
            $filter_location_out = $filter_location_out . "<td>" . $row['weekend_open_time'] . " ~ " . $row['weekend_end_time'] . "</td>";
            $filter_location_out = $filter_location_out . "<td>" . $row['weekly_break_date'] . "</td></tr>";
          }
          $filter_location_out = $filter_location_out . "</tbody></table>";
          /* #endregion */ 
        }


        elseif ( isset($_POST["submit_form_filter_cuisine"] )){ 
          /* #region submit_form_filter_cuisine */
          $filter_cuisine_open = "is_open";
          $filter_cuisine_cuisine_id = test_input($_POST["filter_cuisine_cuisine_id"]);
          $sql = "SELECT * FROM cuisine, serves, restaurant, business WHERE business.business_id = restaurant.restaurant_id AND restaurant.restaurant_id = serves.served_at AND cuisine.cuisine_id = serves.serving";
          if ($filter_cuisine_cuisine_id != "all"){
            $sql = $sql . " AND cuisine.cuisine_id = " . $filter_cuisine_cuisine_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $filter_cuisine_out = "<table><thead><tr><td>Restaurant Name</td><td>Serves Cuisine</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $filter_cuisine_out = $filter_cuisine_out . "<tr><td>" . $row['name'] . "</td>";
            $filter_cuisine_out = $filter_cuisine_out . "<td>" . $row['cuisine_type'] . "</td></tr>";
          }
          $filter_cuisine_out = $filter_cuisine_out . "</tbody></table>";
          /* #endregion */ 

        }

        elseif ( isset($_POST["submit_form_review_filter_person"] )){ 
          /* #region submit_form_review_filter_person */
          $review_filter_person_open = "is_open";
          $review_filter_person_person_id = test_input($_POST["review_filter_person_person_id"]);

          $sql = "SELECT * FROM restaurant_review, person WHERE restaurant_review.reviewed_by = person.person_id";
          if ($review_filter_person_person_id != "all"){
            $sql = $sql . " AND person.person_id = " . $review_filter_person_person_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $review_filter_person_out =  " <br><h2> Restaurant Reviews</h2>";

          $review_filter_person_out =  $review_filter_person_out . "<table><thead><tr><td>Person ID</td><td>Restaurant ID</td><td>Review Star</td><td>Review Content</td></tr></thead><tbody>";
          
          while( $row = mysqli_fetch_array($query)) {
            $review_filter_person_out = $review_filter_person_out . "<tr><td>" . $row['person_id'] . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['reviewed_restaurant']  . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['review_star']  . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['review_content'] . "</td></tr>";
          }
          $review_filter_person_out = $review_filter_person_out . "</tbody></table>";
          /* #endregion */ 


          
          $sql = "SELECT * FROM review_followup, person WHERE review_followup.followed_up_by = person.person_id";
          if ($review_filter_person_person_id != "all"){
            $sql = $sql . " AND person.person_id = " . $review_filter_person_person_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $review_filter_person_out = $review_filter_person_out.  " <br><h2> Restaurant Review Followup</h2>";
          $review_filter_person_out = $review_filter_person_out.  "<table><thead><tr><td>Person ID</td><td>Review Followup ID</td><td>Followup Content</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $review_filter_person_out = $review_filter_person_out . "<tr><td>" . $row['person_id'] . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['followup_id']  . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['followup_content'] . "</td></tr>";
          }
          $review_filter_person_out = $review_filter_person_out . "</tbody></table>";


          $sql = "SELECT * FROM restaurant_discussion, person WHERE restaurant_discussion.discussed_by = person.person_id";
          if ($review_filter_person_person_id != "all"){
            $sql = $sql . " AND person.person_id = " . $review_filter_person_person_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $review_filter_person_out = $review_filter_person_out.  " <br><h2>Restaurant Discussions</h2>";
          $review_filter_person_out = $review_filter_person_out.  "<table><thead><tr><td>Person ID</td><td>Discussion ID</td><td>Discussion Content</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $review_filter_person_out = $review_filter_person_out . "<tr><td>" . $row['person_id'] . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['discussion_id']  . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['discussion_content'] . "</td></tr>";
          }
          $review_filter_person_out = $review_filter_person_out . "</tbody></table>";

        
          $sql = "SELECT * FROM discussion_reply, person WHERE discussion_reply.replied_by = person.person_id";
          if ($review_filter_person_person_id != "all"){
            $sql = $sql . " AND person.person_id = " . $review_filter_person_person_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $review_filter_person_out = $review_filter_person_out.  " <br><h2> Discussion Replies</h2>";
          $review_filter_person_out = $review_filter_person_out.  "<table><thead><tr><td>Person ID</td><td>Discussion Reply ID</td><td>Reply Content</td></tr></thead><tbody>";
    
          while( $row = mysqli_fetch_array($query)) {
            $review_filter_person_out = $review_filter_person_out . "<tr><td>" . $row['person_id'] . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['reply_id']  . "</td>";
            $review_filter_person_out = $review_filter_person_out . "<td>" . $row['reply_content'] . "</td></tr>";
          }
          $review_filter_person_out = $review_filter_person_out . "</tbody></table>";

        }
        /* #endregion */



        elseif ( isset($_POST["submit_form_filter_posts_restaurant"] )){ 
          /* #region submit_form_review_filter_person */
          $filter_posts_restaurant_open = "is_open";
          $filter_posts_restaurant_id = test_input($_POST["filter_posts_restaurant_id"]);

          $sql = "SELECT * FROM restaurant_review, restaurant WHERE restaurant_review.reviewed_restaurant = restaurant.restaurant_id";
          if ($filter_posts_restaurant_id != "all"){
            $sql = $sql . " AND restaurant.restaurant_id = " . $filter_posts_restaurant_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $filter_posts_restaurant_out =  " <br><h2>Restaurant Reviews</h2> ";
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<table><thead><tr><td>Restaurant ID</td><td>Reviewer</td><td>Review ID</td><td>Review Star</td><td>Review Content</td></tr></thead><tbody>";
          
          while( $row = mysqli_fetch_array($query)) {
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<tr><td>" . $row['restaurant_id'] . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['reviewed_by']  . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['review_id']  . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['review_star']  . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['review_content'] . "</td></tr>";
          }
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . "</tbody></table>";
          /* #endregion */ 

          
       
          /* #region  submit_form_filter_posts_restaurant */
          
          $sql = "SELECT * FROM review_followup, restaurant, restaurant_review WHERE   restaurant.restaurant_id = restaurant_review.reviewed_restaurant AND restaurant_review.review_id = review_followup.for_review";
          if ($filter_posts_restaurant_id != "all"){
            $sql = $sql . " AND restaurant.restaurant_id = " . $filter_posts_restaurant_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . " <br><h2>Restaurant Review Followups</h2>";
          $filter_posts_restaurant_out = $filter_posts_restaurant_out.  "<table><thead><tr><td>Restaurant ID</td><td>Review Followup By</td><td>Followup ID</td><td>Followup Content</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $filter_posts_restaurant_out= $filter_posts_restaurant_out . "<tr><td>" . $row['restaurant_id'] . "</td>";
            $filter_posts_restaurant_out= $filter_posts_restaurant_out . "<td>" . $row['followed_up_by']  . "</td>";
            $filter_posts_restaurant_out= $filter_posts_restaurant_out . "<td>" . $row['followup_id']  . "</td>";
            $filter_posts_restaurant_out= $filter_posts_restaurant_out . "<td>" . $row['followup_content'] . "</td></tr>";
          }
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . "</tbody></table>";


          $sql = "SELECT * FROM restaurant_discussion, restaurant WHERE restaurant_discussion.discussed_restaurant = restaurant.restaurant_id";
          if ($filter_posts_restaurant_id != "all"){
            $sql = $sql . " AND restaurant.restaurant_id = " . $filter_posts_restaurant_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . " <br><h2>Restaurant Discussions</h2>";
          $filter_posts_restaurant_out = $filter_posts_restaurant_out.  "<table><thead><tr><td>Restaurant ID</td><td>Discussed By</td><td>Discussion ID</td><td>Discussion Content</td></tr></thead><tbody>";
          while( $row = mysqli_fetch_array($query)) {
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<tr><td>" . $row['restaurant_id'] . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['discussed_by'] . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['discussion_id']  . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['discussion_content'] . "</td></tr>";
          }
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . "</tbody></table>";

        
          $sql = "SELECT * FROM discussion_reply, restaurant, restaurant_discussion WHERE  restaurant.restaurant_id = restaurant_discussion.discussed_restaurant AND discussion_reply.for_discussion = restaurant_discussion.discussion_id";
          if ($filter_posts_restaurant_id != "all"){
            $sql = $sql . " AND restaurant.restaurant_id = " . $filter_posts_restaurant_id ;
          } 
          $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
          
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . " <br><h2>Discussion Replies</h2>";
          $filter_posts_restaurant_out = $filter_posts_restaurant_out .  "<table><thead><tr><td>Restaurant ID</td><td>Replied By</td><td>Discussion Reply ID</td><td>Reply Content</td></tr></thead><tbody>";
    
          while( $row = mysqli_fetch_array($query)) {
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<tr><td>" . $row['restaurant_id'] . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['replied_by']  . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['reply_id']  . "</td>";
            $filter_posts_restaurant_out = $filter_posts_restaurant_out . "<td>" . $row['reply_content'] . "</td></tr>";
          }
          $filter_posts_restaurant_out = $filter_posts_restaurant_out . "</tbody></table>";

        } 
        elseif ( isset($_POST["submit_form_sort_posts"] )){


           /* #region  submit_form_restaurant_rating_filter */
           $sort_posts_open = "is_open";
           $sort_posts_out = "";
           $orderby = "";
          
           if ($_POST["post_order"] === "NtO") {
            $orderby = "ORDER BY last_update DESC";
            $sort_posts_out = $sort_posts_out . " <br> <h1>Newest Oldest</h1> ";
          } elseif ($_POST["post_order"] === "OtN") {
            $orderby = "ORDER BY last_update ASC";
            $sort_posts_out = $sort_posts_out . " <br> <h1>Oldest Newest</h1>  ";

          }
          $sort_posts_out = $sort_posts_out . " <h2>Restaurant Reviews</h2> ";
          $sort_posts_out = $sort_posts_out . read_restaurant_review($orderby) . "<br> ";
          $sort_posts_out = $sort_posts_out . " <h2>Restaurant Reviews Followups</h2> ";
          $sort_posts_out = $sort_posts_out . read_review_followup ($orderby) . "<br> ";
          $sort_posts_out = $sort_posts_out . " <h2>Restaurant Discussions</h2> ";
          $sort_posts_out = $sort_posts_out . read_restaurant_discussion($orderby) . " <br> ";
          $sort_posts_out = $sort_posts_out . " <h2>Restaurant Discussion Replies</h2> ";
          $sort_posts_out = $sort_posts_out . read_discussion_reply($orderby) . " <br> ";

      
          /* #endregion */
        /* #endregion */
          }
        }
      
    ?>

    <h5>
      111827215 - Kyuri Kyeong - kyuri.kyeong@stonybrook.edu<br>
      110887867 - Daekyung Kim - daekyung.kim@stonybrooke.du<br>
      110983860 - Haseung Lee - haseung.lee@stonybrook.edu
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
      <button class="tablinks" onclick="openPart(event, 'update_restaurant_review')" id="<?php echo $update_restaurant_review_open; ?>">Update Restaurant Review</button>
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
    <!-- 
      /* #region Filtering Tabs  */ 
    -->
    <div class="tab"><!-- FILTER -->
      <button class="tablinks" onclick="openPart(event, 'restaurant_rating_filter')" id="<?php echo $restaurant_rating_filter_open; ?>">Restaurant Rating Filter</button>
      <button class="tablinks" onclick="openPart(event, 'filter_location')" id="<?php echo $filter_location_open; ?>">Filter Restaurant By Location</button>
       <button class="tablinks" onclick="openPart(event, 'filter_cuisine')" id="<?php echo $filter_cuisine_open; ?>">Fitler By Cuisine</button>

      <button class="tablinks" onclick="openPart(event, 'review_filter_person')" id="<?php echo $review_filter_person_open; ?>">Filter Posts by Persons</button>
      <button class="tablinks" onclick="openPart(event, 'filter_posts_restaurant')" id="<?php echo $filter_posts_restaurant_open; ?>">Filter Posts by Restaurants</button>
      <button class="tablinks" onclick="openPart(event, 'sort_posts')" id="<?php echo $sort_posts_open; ?>">Sort Posts by Recent Update</button>



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
        <button type="reset" onclick="clearElement('create_location_div')" value="Reset">Clear Output</button>
      </form>
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

        Located In FK: Location's Building Management Number: 
        <input type="number" id="create_business_located_in" name="create_business_located_in" value="<?php echo $create_business_located_in ?>">
        <font color="red"><?php echo $create_business_located_inErr ?></font><br>
    
        Address Detail: <input type="text" id="create_business_addr_detail" name="create_business_addr_detail" value="<?php echo $create_business_addr_detail ?>">
        <font color="red"><?php echo $create_business_addr_detailErr ?></font><br>
       
        <input type="submit" name="submit_form_create_business" value="Submit">
        <button type="reset" onclick="clearElement('create_business_div')" value="Reset">Clear Output</button>
      </form>
      
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
        <button type="reset" onclick="clearElement('create_restaurant_div')" value="Reset">Clear Output</button>
      </form>
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
        <button type="reset" onclick="clearElement('create_cuisine_div')" value="Reset">Clear Output</button>
      </form>
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
        <button type="reset" onclick="clearElement('create_serves_div')" value="Reset">Clear Output</button>
      </form>
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
      <h3>Create Person</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <!-- person_id: <input type="number" id="create_person_person_id" name="create_person_person_id" value="<?php echo $create_person_person_id ?>">
          <font color="red"><?php echo $create_person_person_idErr ?></font><br> -->
        Full Name: <input type="text" id="create_person_fullname" name="create_person_fullname" value="<?php echo $create_person_fullname ?>">
          <font color="red"><?php echo $create_person_fullnameErr ?></font><br>
        Email: <input type="email" id="create_person_email" name="create_person_email" value="<?php echo $create_person_email ?>">
          <font color="red"><?php echo $create_person_emailErr ?></font><br>
        Username: <input type="text" id="create_person_username" name="create_person_username" value="<?php echo $create_person_username ?>">
          <font color="red"><?php echo $create_person_usernameErr ?></font><br>
        Password: <input type="password" id="create_person_password" name="create_person_password" value="<?php echo $create_person_password ?>">
          <font color="red"><?php echo $create_person_passwordErr ?></font><br>
        <!-- create_date: <input type="date" id="create_person_create_date" name="create_person_create_date" value="<?php echo $create_person_create_date ?>">
          <font color="red"><?php echo $create_person_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_person_last_update" name="create_person_last_update" value="<?php echo $create_person_last_update ?>">
          <font color="red"><?php echo $create_person_last_updateErr ?></font><br> -->
        <!-- is_active: <input type="checkbox" id="create_person_is_active" name="create_person_is_active" value="<?php echo $create_person_is_active ?>"> -->
        <font color="red"><?php echo $create_person_is_activeErr ?></font><br>
        <input type="submit" name="submit_form_create_person" value="Submit">
        <button type="reset" onclick="clearElement('create_person_div')" value="Reset">Clear Output</button>
      </form>
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
      <h3>Create Works At</h3>
      <form method="post" id="create_works_at_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Works For: <input type="number" id="create_works_at_works_for" name="create_works_at_works_for" value="<?php echo $create_works_at_works_for ?>">
        <font color="red"><?php echo $create_works_at_works_forErr ?></font><br>
        Employed: <input type="number" id="create_works_at_employed" name="create_works_at_employed" value="<?php echo $create_works_at_employed ?>">
        <font color="red"><?php echo $create_works_at_employedErr ?></font><br>
        Employee Type: <input type="text" id="create_works_at_employee_type" name="create_works_at_employee_type" value="<?php echo $create_works_at_employee_type ?>">
        <font color="red"><?php echo $create_works_at_employee_typeErr ?></font><br>
        <input type="submit" name="submit_form_create_works_at" value="Submit">
        <button type="reset" onclick="clearElement('create_works_at_div')" value="Reset">Clear Output</button>
      </form>
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
        <!-- Review ID: <input type="number" id="create_restaurant_review_review_id" name="create_restaurant_review_review_id" value="<?php echo $create_restaurant_review_review_id ?>">
        <font color="red"><?php echo $create_restaurant_review_review_idErr ?></font><br> -->
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
        <button type="reset" onclick="clearElement('create_restaurant_review_div')" value="Reset">Clear Output</button>
      </form>
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

       <!-- Followup ID: <input type="number" id="create_review_followup_followup_id" name="create_review_followup_followup_id" value="<?php echo $create_review_followup_followup_id ?>">
        <font color="red"><?php echo $create_review_followup_followup_idErr ?></font><br> -->
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
        <button type="reset" onclick="clearElement('create_review_followup_div')" value="Reset">Clear Output</button>
      </form>
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
      <!-- Discussion ID: <input type="number" id="create_restaurant_discussion_discussion_id" name="create_restaurant_discussion_discussion_id" value="<?php echo $create_restaurant_discussion_discussion_id ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussion_idErr ?></font><br> -->
        Discussed By: <input type="number" id="create_restaurant_discussion_discussed_by" name="create_restaurant_discussion_discussed_by" value="<?php echo $create_restaurant_discussion_discussed_by ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussed_byErr ?></font><br>
        Discussed Restaurant: <input type="number" id="create_restaurant_discussion_discussed_restaurant" name="create_restaurant_discussion_discussed_restaurant" value="<?php echo $create_restaurant_discussion_discussed_restaurant ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussed_restaurantErr ?></font><br>
        Discussion Content: <input type="text" id="create_restaurant_discussion_discussion_content" name="create_restaurant_discussion_discussion_content" value="<?php echo $create_restaurant_discussion_discussion_content ?>">
        <font color="red"><?php echo $create_restaurant_discussion_discussion_contentErr ?></font><br>
 
        <input type="submit" name="submit_form_create_restaurant_discussion" value="Submit">
        <button type="reset" onclick="clearElement('create_restaurant_discussion_div')" value="Reset">Clear Output</button>
      </form>
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
        <!-- Reply ID: <input type="number" id="create_discussion_reply_reply_id" name="create_discussion_reply_reply_id" value="<?php echo $create_discussion_reply_reply_id ?>">
        <font color="red"><?php echo $create_discussion_reply_reply_idErr ?></font><br> -->
        Reply Replied By: <input type="number" id="create_discussion_reply_replied_by" name="create_discussion_reply_replied_by" value="<?php echo $create_discussion_reply_replied_by ?>">
        <font color="red"><?php echo $create_discussion_reply_replied_byErr ?></font><br>
        For Discussion : <input type="number" id="create_discussion_reply_for_discussion" name="create_discussion_reply_for_discussion" value="<?php echo $create_discussion_reply_for_discussion ?>">
        <font color="red"><?php echo $create_discussion_reply_for_discussionErr ?></font><br>
        Reply Content: <input type="text" id="create_discussion_reply_reply_content" name="create_discussion_reply_reply_content" value="<?php echo $create_discussion_reply_reply_content ?>">
        <font color="red"><?php echo $create_discussion_reply_reply_contentErr ?></font><br>
        <input type="submit" name="submit_form_create_discussion_reply" value="Submit">
        <button type="reset" onclick="clearElement('create_discussion_reply_div')" value="Reset">Clear Output</button>
      </form>
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
      <h3>Read Restaurant</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_restaurant" value="Submit">
      </form>
      <button onclick="clearElement('read_restaurant_div')">Clear Output</button>
      <div id="read_restaurant_div">
        <?php echo $read_restaurant_out;?>
      </div> 
    </div>

    <div id="read_cuisine" class="tabcontent">
      <h3>Read Cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_cuisine" value="Read">
      </form>
      <button onclick="clearElement('read_cuisine_div')">Clear Output</button>
      <div id="read_cuisine_div">
        <?php echo $read_cuisine_out; ?>
      </div> 
    </div>

    <div id="read_serves" class="tabcontent">
      <h3>Read Serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_serves" value="Read">
      </form>
      <button onclick="clearElement('read_serves_div')">Clear Output</button>
      <div id="read_serves_div">
        <?php echo $read_serves_out; ?>
      </div> 
    </div>

    <div id="read_person" class="tabcontent">
      <h3>Read Person</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_person" value="Submit">
      </form>
      <button onclick="clearElement('read_person_div')">Clear Output</button>
      <div id="read_person_div">
        <?php echo $read_person_out; ?>
      </div> 
    </div>
    
    <div id="read_works_at" class="tabcontent">
      <h3>Read Works At</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_works_at" value="Submit">
      </form>
      <button onclick="clearElement('read_works_at_div')">Clear Output</button>
      <div id="read_works_at_div">
        <?php echo $read_works_at_out; ?>
      </div> 
    </div>
    
    <div id="read_restaurant_review" class="tabcontent">
      <h3>Read Restaurant Review</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_restaurant_review" value="Submit">
      </form>
      <button onclick="clearElement('read_restaurant_review_div')">Clear Output</button>
      <div id="read_restaurant_review_div">
        <?php echo $read_restaurant_review_out; ?>
      </div> 
    </div>
    
    <div id="read_review_followup" class="tabcontent">
      <h3>Read Review Followup</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_review_followup" value="Submit">
      </form>
      <button onclick="clearElement('read_review_followup_div')">Clear Output</button>
      <div id="read_review_followup_div">
        <?php echo $read_review_followup_out; ?>
      </div> 
    </div>
    
    <div id="read_restaurant_discussion" class="tabcontent">
      <h3> Read Restaurant Discussion </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_restaurant_discussion" value="Submit">
      </form>
      <button onclick="clearElement('read_restaurant_discussion_div')">Clear Output</button>
      <div id="read_restaurant_discussion_div">
        <?php echo $read_restaurant_discussion_out; ?>
      </div> 
    </div>

    <div id="read_discussion_reply" class="tabcontent">
      <h3>Read Discussion Reply</h3>
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
      <!-- 
        /* #region Update Location */
      -->
      <h3>Update Location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      
        *Building Mangament No: 
        <input type="number" id="update_location_bldgMgmtNo" name="update_location_bldgMgmtNo" value="<?php echo $update_location_bldgMgmtNo ?>">
        <font color="red"><?php echo $update_location_bldgMgmtNoErr ?></font><br>

        Zip No. (Optional): 
        <input type="text" id="update_location_zip_no" name="update_location_zip_no" value="<?php echo $update_location_zip_no ?>">
        <font color="red"><?php echo $update_location_zip_noErr ?></font><br>

        Jibun Juso (Optional): 
        <input type="text" id="update_location_jibun_juso" name="update_location_jibun_juso" value="<?php echo $update_location_jibun_juso ?>">
        <font color="red"><?php echo $update_location_jibun_jusoErr ?></font><br>

        <input type="submit" name="submit_form_update_location" value="Update">
      </form>
      <button onclick="clearElement('update_location_div')">Clear Output</button>
      <div id="update_location_div">
        <?php echo $update_location_out; ?>
      </div> 
      <!-- 
        /* #endregion */
      -->
    </div>
    
    <div id="update_business" class="tabcontent">
      <!-- 
        /* #region Update Business */
      -->
      <h3>Update Business</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          
        *Business IDs: 
        <input type="number" id="update_business_business_id" name="update_business_business_id" value="<?php echo $update_business_business_id ?>">
        <font color="red"><?php echo $update_business_business_idErr ?></font><br>

        Business Name (Optional): 
        <input type="text" id="update_business_name" name="update_business_name" value="<?php echo $update_business_name ?>">
        <font color="red"><?php echo $update_business_nameErr ?></font><br>

        Building Mangament No (Optional): 
        <input type="text" id="update_business_located_in" name="update_business_located_in" value="<?php echo $update_business_located_in ?>">
        <font color="red"><?php echo $update_business_located_inErr ?></font><br>
        
        Address Detail (Optional): 
        <input type="text" id="update_business_addr_detail" name="update_business_addr_detail" value="<?php echo $update_business_addr_detail ?>">
        <font color="red"><?php echo $update_business_addr_detailErr ?></font><br>

        <input type="submit" name="submit_form_update_business" value="Update">
      </form>
      <button onclick="clearElement('update_business_div')">Clear Output</button>
      <div id="update_business_div">
        <?php echo $update_business_out; ?>
      </div> 
      <!-- 
        /* #endregion */
      -->
    </div>

    <div id="update_restaurant" class="tabcontent">
      <!-- 
        /* #region Update Restaurant */
      -->
      <h3>Update Restaurant</h3>
      <div id="update_restaurant_read_div">
        <?php echo read_restaurant(""); ?>
      </div> 
      <br>
      <font color="red"><?php echo $update_restaurantErr ?></font>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        *Restaurant ID: <input type="number" id="update_restaurant_restaurant_id" name="update_restaurant_restaurant_id" value="<?php echo $update_restaurant_restaurant_id ?>">
        <font color="red"><?php echo $update_restaurant_restaurant_idErr ?></font><br>
        Weekday Open Time: <input type="time" id="update_restaurant_weekday_open_time" name="update_restaurant_weekday_open_time" value="<?php echo $update_restaurant_weekday_open_time ?>">
        <font color="red"><?php echo $update_restaurant_weekday_open_timeErr ?></font><br>
        Weekday End Time: <input type="time" id="update_restaurant_weekday_end_time" name="update_restaurant_weekday_end_time" value="<?php echo $update_restaurant_weekday_end_time ?>">
        <font color="red"><?php echo $update_restaurant_weekday_end_timeErr ?></font><br>
        Weekend Open Time: <input type="time" id="update_restaurant_weekend_open_time" name="update_restaurant_weekend_open_time" value="<?php echo $update_restaurant_weekend_open_time ?>">
        <font color="red"><?php echo $update_restaurant_weekend_open_timeErr ?></font><br>
        Weekend End Time: <input type="time" id="update_restaurant_weekend_end_time" name="update_restaurant_weekend_end_time" value="<?php echo $update_restaurant_weekend_end_time ?>">
        <font color="red"><?php echo $update_restaurant_weekend_end_timeErr ?></font><br>
        Weekly Break Time: <input type="radio" id="update_restaurant_weekly_break_date_None" name="update_restaurant_weekly_break_date" value="None"><label for="update_restaurant_weekly_break_date_None">None</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Mon" name="update_restaurant_weekly_break_date" value="Mon"><label for="update_restaurant_weekly_break_date_Mon">Mon</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Tue" name="update_restaurant_weekly_break_date" value="Tue"><label for="update_restaurant_weekly_break_date_Tue">Tue</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Wed" name="update_restaurant_weekly_break_date" value="Wed"><label for="update_restaurant_weekly_break_date_Wed">Wed</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Thu" name="update_restaurant_weekly_break_date" value="Thu"><label for="update_restaurant_weekly_break_date_Thu">Thu</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Fri" name="update_restaurant_weekly_break_date" value="Fri"><label for="update_restaurant_weekly_break_date_Fri">Fri</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Sat" name="update_restaurant_weekly_break_date" value="Sat"><label for="update_restaurant_weekly_break_date_Sat">Sat</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Sun" name="update_restaurant_weekly_break_date" value="Sun"><label for="update_restaurant_weekly_break_date_Sun">Sun</label>
        <input type="radio" id="update_restaurant_weekly_break_date_Weekend" name="update_restaurant_weekly_break_date" value="Weekend"><label for="update_restaurant_weekly_break_date_Weekend">Weekend</label>
        <font color="red"><?php echo $update_restaurant_weekly_break_dateErr ?></font><br>
        Is Active: <input type="checkbox" id="update_restaurant_is_active" name="update_restaurant_is_active">
        <font color="red"><?php echo $update_restaurant_is_activeErr ?></font><br>
        <input type="submit" name="submit_form_update_restaurant" value="Submit">
        <button type="reset" onclick="clearElement('update_restaurant_div')" value="Reset">Clear Output</button>
      </form>
      <div id="update_restaurant_div">
        <?php echo $update_restaurant_out; ?>
      </div> 
      <!-- 
        /* #endregion */
      -->
    </div>

    <div id="update_cuisine" class="tabcontent">
      <!-- 
        /* #region Update Cuisine */
      -->
      <h3>Update Cuisine</h3>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

        *Cuisine ID: 
        <input type="number" id="update_cuisine_id" name="update_cuisine_id" value="<?php echo $update_cuisine_id ?>">
        <font color="red"><?php echo $update_cuisine_idErr ?></font><br>

        Cuisine Type (Optional): 
        <input type="text" id="update_cuisine_cuisine_type" name="update_cuisine_cuisine_type" value="<?php echo $update_cuisine_cuisine_type ?>">
        <font color="red"><?php echo $update_cuisine_cuisine_typeErr ?></font><br>

        Cuisine Information (Optional): 
        <input type="text" id="update_cuisine_cuisine_info" name="update_cuisine_cuisine_info" value="<?php echo $update_cuisine_cuisine_info ?>">
        <font color="red"><?php echo $update_cuisine_cuisine_infoErr ?></font><br>

        <input type="submit" name="submit_form_update_cuisine" value="Update">
      </form>

      <button onclick="clearElement('update_cuisine_div')">Clear Output</button>
      <div id="update_cuisine_div">
        <?php echo $update_cuisine_out; ?>
      </div> 
      <!-- 
        /* #endregion */
      -->
    </div>

    <div id="update_serves" class="tabcontent">
      <!-- 
        /* #region Update Serves */
      -->
      <h3>Update Serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        *Current Business ID: 
        <input type="text" id="update_serves_served_at_old" name="update_serves_served_at_old" value="<?php echo $update_serves_served_at_old ?>">
        <font color="red"><?php echo $update_serves_served_at_oldErr ?></font><br>
        
        *Current Cuisine ID: 
        <input type="text" id="update_serves_serving_old" name="update_serves_serving_old" value="<?php echo $update_serves_serving_old ?>">
        <font color="red"><?php echo $update_serves_serving_oldErr ?></font><br>
        
        *New Business ID: 
        <input type="text" id="update_serves_served_at_new" name="update_serves_served_at_new" value="<?php echo $update_serves_served_at_new ?>">
        <font color="red"><?php echo $update_serves_served_at_newErr ?></font><br>
        
        *New Cuisine ID: 
        <input type="text" id="update_serves_serving_new" name="update_serves_serving_new" value="<?php echo $update_serves_serving_new ?>">
        <font color="red"><?php echo $update_serves_serving_newErr ?></font><br>

        <input type="submit" name="submit_form_update_serves" value="Update">
      </form>
      <button onclick="clearElement('update_serves_div')">Clear Output</button>
      <div id="update_serves_div">
        <?php echo $update_serves_out; ?>
      </div> 
      <!-- 
        /* #endregion */
      -->
    </div>

    <div id="update_person" class="tabcontent">

      <!-- 
        /* #region  Update Person */
       -->
      <h3>Update Person</h3>
      <div id="update_person_read_div">
        <?php echo read_person(); ?>
      </div> 
      <br>
      <font color="red"><?php echo $update_personErr ?></font>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        *Person ID: <input type="number" id="update_person_person_id" name="update_person_person_id" value="<?php echo $update_person_person_id ?>">
          <font color="red"><?php echo $update_person_person_idErr ?></font><br>
        Full Name: <input type="text" id="update_person_fullname" name="update_person_fullname" value="<?php echo $update_person_fullname ?>">
          <font color="red"><?php echo $update_person_fullnameErr ?></font><br>
        Email: <input type="email" id="update_person_email" name="update_person_email" value="<?php echo $update_person_email ?>">
          <font color="red"><?php echo $update_person_emailErr ?></font><br>
        Username: <input type="text" id="update_person_username" name="update_person_username" value="<?php echo $update_person_username ?>">
          <font color="red"><?php echo $update_person_usernameErr ?></font><br>
        Password: <input type="password" id="update_person_password" name="update_person_password" value="<?php echo $update_person_password ?>">
          <font color="red"><?php echo $update_person_passwordErr ?></font><br>
        Is Active: <input type="checkbox" id="update_person_is_active" name="update_person_is_active">
        <font color="red"><?php echo $update_person_is_activeErr ?></font><br>
        <input type="submit" name="submit_form_update_person" value="Submit">
        <button type="reset" onclick="clearElement('update_person_div')" value="Reset">Clear Output</button>
      </form>
      <div id="update_person_div">
        <?php echo $update_person_out; ?>
      </div> 
      <!-- 
        /* #endregion */
       -->
    </div>
    
    <div id="update_works_at" class="tabcontent">
      <h3>Update Works At</h3>
      <div id="update_works_at_read_div">
        <?php echo read_works_at(); ?>
      </div> 
      <br>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        *Works For: <input type="number" id="update_works_at_works_for" name="update_works_at_works_for" value="<?php echo $update_works_at_works_for ?>">
        <font color="red"><?php echo $update_works_at_works_forErr ?></font><br>
        *Employed: <input type="number" id="update_works_at_employed" name="update_works_at_employed" value="<?php echo $update_works_at_employed ?>">
        <font color="red"><?php echo $update_works_at_employedErr ?></font><br>
        Employee Type: <input type="text" id="update_works_at_employee_type" name="update_works_at_employee_type" value="<?php echo $update_works_at_employee_type ?>">
        <font color="red"><?php echo $update_works_at_employee_typeErr ?></font><br>
        <input type="submit" name="submit_form_update_works_at" value="Submit">
        <button type="reset" onclick="clearElement('update_works_at_div')" value="Reset">Clear Output</button>
      </form>
      <div id="update_works_at_div">
        <?php echo $update_works_at_out; ?>
      </div> 
    </div>
    
    <div id="update_restaurant_review" class="tabcontent">
      <h3>Update Restaurant Review</h3>
      <div id="update_restaurant_review_read_div">
        <?php echo read_restaurant_review(""); ?>
      </div> 
      <br>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
 

        *Desired Restaurant Review Review ID to Update: <input type="number" id="update_restaurant_review_review_id" name="update_restaurant_review_review_id" value="<?php echo $update_restaurant_review_review_id ?>">
        <font color="red"><?php echo $update_restaurant_review_review_idErr ?></font><br>
        <!-- restaurant_review_reviewed_by: <input type="number" id="update_restaurant_review_reviewed_by" name="update_restaurant_review_reviewed_by" value="<?php echo $update_restaurant_review_reviewed_by ?>"> -->

        <!-- <font color="red"><?php echo $update_restaurant_review_reviewed_byErr ?></font><br>
        restaurant_review_reviewed_restaurant: <input type="number" id="update_restaurant_review_reviewed_restaurant" name="update_restaurant_review_reviewed_restaurant" value="<?php echo $update_restaurant_review_reviewed_restaurant ?>">
        <font color="red"><?php echo $update_restaurant_review_reviewed_restaurantErr ?></font><br> -->

        New Restaurant Review Review Star (1-5): <input type="number" id="update_restaurant_review_review_star" name="update_restaurant_review_review_star" value="<?php echo $update_restaurant_review_review_star ?>">
        <font color="red"><?php echo $update_restaurant_review_review_starErr ?></font><br>
        New restaurant_review_review_content: <input type="text" id="update_restaurant_review_review_content" name="update_restaurant_review_review_content" value="<?php echo $update_restaurant_review_review_content ?>">
        <font color="red"><?php echo $update_restaurant_review_review_contentErr ?></font><br>
         <!-- is_active: <input type="checkbox" id="update_restaurant_review_is_active" name="update_restaurant_review_is_active">
        <font color="red"><?php echo $update_restaurant_review_is_activeErr ?></font><br> -->

        <input type="submit" name="submit_form_update_restaurant_review" value="Submit">
        <button type="reset" onclick="clearElement('update_restaurant_review_div')" value="Reset">Clear Output</button>
      </form>
      <!-- <button onclick="clearElement('update_restaurant_review_div')">Clear Output</button> -->
      <div id="update_restaurant_review_div">
        <?php echo $update_restaurant_review_out; ?>
      </div> 
    </div>
    
    <div id="update_review_followup" class="tabcontent">
    <h3>Update Review Followup</h3>
      <div id="update_person_read_div">
        <?php echo read_review_followup(""); ?>
      </div> 
      <br>
      <font color="red"><?php echo $update_restaurant_review_followupErr ?></font>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        *Desired Followup ID to Update: <input type="number" id="update_review_followup_followup_id" name="update_review_followup_followup_id" value="<?php echo $update_review_followup_followup_id ?>">
          <font color="red"><?php echo $update_review_followup_followup_idErr ?></font><br>
        <!-- followed_up_by: <input type="number" id="update_review_followup_followed_up_by" name="update_review_followup_followed_up_by" value="<?php echo $update_review_followup_followed_up_by ?>">
          <font color="red"><?php echo $update_review_followup_followed_up_byErr ?></font><br>
        for_review: <input type="number" id="update_review_followup_for_review" name="update_review_followup_for_review" value="<?php echo $update_review_followup_for_review ?>">
          <font color="red"><?php echo $update_review_followup_for_reviewErr ?></font><br> -->
        New Followup Content: <input type="text" id="update_review_followup_followup_content" name="update_review_followup_followup_content" value="<?php echo $update_review_followup_followup_content ?>">
          <font color="red"><?php echo $update_review_followup_followup_contentErr ?></font><br>
        
        <!-- is_active: <input type="checkbox" id="update_review_followup_is_active" name="update_review_followup_is_active">
        <font color="red"><?php echo $update_review_followup_is_activeErr ?></font><br> -->
        <input type="submit" name="submit_form_update_review_followup" value="Submit">
        <button type="reset" onclick="clearElement('update_review_followup_div')" value="Reset">Clear Output</button>
      </form>
      <div id="update_review_followup_div">
        <?php echo $update_review_followup_out; ?>
      </div> 
  
    </div>
    
    <div id="update_restaurant_discussion" class="tabcontent">
        <h3>Update Restaurant Discussion</h3>
          <div id="update_restaurant_discussion_read_div">
            <?php echo read_restaurant_discussion(""); ?>
          </div> 
          <br>
          <font color="red"><?php echo $update_restaurant_discussionErr ?></font>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            *Desired Discussion ID to Update: <input type="number" id="update_restaurant_discussion_discussion_id" name="update_restaurant_discussion_discussion_id" value="<?php echo $update_restaurant_discussion_discussion_id ?>">
              <font color="red"><?php echo $update_restaurant_discussion_discussion_idErr ?></font><br>
            <!-- discussed_by: <input type="number" id="update_restaurant_discussion_discussed_by" name="update_restaurant_discussion_discussed_by" value="<?php echo $update_restaurant_discussion_discussed_by ?>">
              <font color="red"><?php echo $update_restaurant_discussion_discussed_byErr ?></font><br>
            discussed_restaurant: <input type="number" id="update_restaurant_discussion_discussed_restaurant" name="update_restaurant_discussion_discussed_restaurant" value="<?php echo $update_restaurant_discussion_discussed_restaurant ?>">
              <font color="red"><?php echo $update_restaurant_discussion_discussed_restaurantErr ?></font><br> -->
            New Discussion Content: <input type="text" id="update_restaurant_discussion_discussion_content" name="update_restaurant_discussion_discussion_content" value="<?php echo $update_restaurant_discussion_discussion_content ?>">
              <font color="red"><?php echo $update_restaurant_discussion_discussion_contentErr ?></font><br>
<!--             
            is_active: <input type="checkbox" id="update_restaurant_discussion_is_active" name="update_restaurant_discussion_is_active">
            <font color="red"><?php echo $update_restaurant_discussion_is_activeErr ?></font><br> -->
            <input type="submit" name="submit_form_update_restaurant_discussion" value="Submit">
            <button type="reset" onclick="clearElement('update_restaurant_discussion_div')" value="Reset">Clear Output</button>
          </form>
          <div id="update_restaurant_discussion_div">
            <?php echo $update_restaurant_discussion_out; ?>
          </div> 
          
    </div>

    <div id="update_discussion_reply" class="tabcontent">
      <h3>Update Discussion Reply</h3>
        <div id="update_discussion_reply_read_div">

          <?php echo read_discussion_reply(""); ?>
        </div> 
        <br>
        <font color="red"><?php echo $update_discussion_replyErr ?></font>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          *Desired Reply ID to Update: <input type="number" id="update_discussion_reply_reply_id" name="update_discussion_reply_reply_id" value="<?php echo $update_discussion_reply_reply_id ?>">
            <font color="red"><?php echo $update_discussion_reply_reply_idErr ?></font><br>
          <!-- for_discussion: <input type="number" id="update_discussion_reply_for_discussion" name="update_discussion_reply_for_discussion" value="<?php echo $update_discussion_reply_for_discussion ?>">
            <font color="red"><?php echo $update_discussion_reply_for_discussionErr ?></font><br> -->
          New Reply Content: <input type="text" id="update_discussion_reply_reply_content" name="update_discussion_reply_reply_content" value="<?php echo $update_discussion_reply_reply_content ?>">
            <font color="red"><?php echo $update_discussion_reply_reply_contentErr ?></font><br>
        
          <!-- is_active: <input type="checkbox" id="update_discussion_reply_is_active" name="update_discussion_reply_is_active">
          <font color="red"><?php echo $update_discussion_reply_is_activeErr ?></font><br> -->
          <input type="submit" name="submit_form_update_discussion_reply" value="Submit">
          <button type="reset" onclick="clearElement('update_discussion_reply_div')" value="Reset">Clear Output</button>
        </form>
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
      <!-- 
        /* #region Delete Location */
      -->
      <h3>Delete Location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      
        Building Management No.: 
        <input type="number" id="delete_location_bldgMgmtNo" name="delete_location_bldgMgmtNo" value="<?php echo $delete_location_bldgMgmtNo ?>">
        <font color="red"><?php echo $delete_location_bldgMgmtNoErr ?></font><br>
        
        <input type="submit" name="submit_form_delete_location" value="Delete">
      </form>
      <button onclick="clearElement('delete_location_div')">Clear Output</button>
      <div id="delete_location_div">
        <?php echo $delete_location_out; ?>
      </div> 
      <!-- 
        /* #endregion */
      -->
    </div>
    
    <div id="delete_business" class="tabcontent">
      <h3>Delete Business</h3>
      <!-- 
        /* #region Delete Business */
      -->
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Business ID: 
        <input type="number" id="delete_business_business_id" name="delete_business_business_id" value="<?php echo $delete_business_business_id ?>">
        <font color="red"><?php echo $delete_business_business_idErr ?></font><br>
        
        <input type="submit" name="submit_form_delete_business" value="Delete">
      </form>
      <button onclick="clearElement('delete_business_div')">Clear Output</button>
      <div id="delete_business_div">
        <?php echo $delete_business_out; ?>
      </div> 
      <!-- 
        /* #endregion */
      -->
    </div>
    
    <div id="delete_restaurant" class="tabcontent">
      <h3>Delete Restaurant</h3>
      <?php echo read_restaurant(""); ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Restaurant ID: <input type="number" id="delete_restaurant_restaurant_id" name="delete_restaurant_restaurant_id" value="<?php echo $delete_restaurant_restaurant_id ?>">
        <font color="red"><?php echo $delete_restaurant_restaurant_idErr ?></font><br>
        <input type="submit" name="submit_form_delete_restaurant" value="Submit">
        <button type="reset" onclick="clearElement('delete_restaurant_div')" value="Reset">Clear Output</button>
      </form>
      <div id="delete_restaurant_div">
        <?php echo $delete_restaurant_out; ?>
      </div> 
    </div>

    <div id="delete_cuisine" class="tabcontent">
      <h3>Delete Cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      
        Cuisine ID: 
        <input type="number" id="delete_cuisine_cuisine_id" name="delete_cuisine_cuisine_id" value="<?php echo $delete_cuisine_cuisine_id ?>">
        <font color="red"><?php echo $delete_cuisine_cuisine_idErr ?></font><br>

        <input type="submit" name="submit_form_delete_cuisine" value="Submit">
      </form>
      <button onclick="clearElement('delete_cuisine_div')">Clear Output</button>
      <div id="delete_cuisine_div">
        <?php echo $delete_cuisine_out; ?>
      </div> 
    </div>

    <div id="delete_serves" class="tabcontent">
      <h3>Delete Serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      
        *Business ID: 
        <input type="number" id="delete_serves_served_at" name="delete_serves_served_at" value="<?php echo $delete_serves_served_at ?>">
        <font color="red"><?php echo $delete_serves_served_atErr ?></font><br>
        
        *Cuisine ID: 
        <input type="number" id="delete_serves_serving" name="delete_serves_serving" value="<?php echo $delete_serves_serving ?>">
        <font color="red"><?php echo $delete_serves_servingErr ?></font><br>
        
        <input type="submit" name="submit_form_delete_serves" value="Delete">
      </form>
      <button onclick="clearElement('delete_serves_div')">Clear Output</button>
      <div id="delete_serves_div">
        <?php echo $delete_serves_out; ?>
      </div> 
    </div>

    <div id="delete_person" class="tabcontent">
      <h3>Delete Person</h3>
      <?php echo read_person() ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          Person ID: <input type="number" id="delete_person_person_id" name="delete_person_person_id" value="<?php echo $delete_person_person_id ?>">
          <font color="red"><?php echo $delete_person_person_idErr ?></font><br>
        <input type="submit" name="submit_form_delete_person" value="Submit">
        <button type="reset" onclick="clearElement('delete_person_div')" value="Reset">Clear Output</button>
      </form>
      <div id="delete_person_div">
        <?php echo $delete_person_out; ?>
      </div> 
    </div>
    
    <div id="delete_works_at" class="tabcontent">
      <h3>Delete Works At</h3>
      <?php echo read_works_at() ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Works For: <input type="number" id="delete_works_at_works_for" name="delete_works_at_works_for" value="<?php echo $delete_works_at_works_for ?>">
        <font color="red"><?php echo $delete_works_at_works_forErr ?></font><br>
        Employed: <input type="number" id="delete_works_at_employed" name="delete_works_at_employed" value="<?php echo $delete_works_at_employed ?>">
        <font color="red"><?php echo $update_works_at_employedErr ?></font><br>
        <input type="submit" name="submit_form_delete_works_at" value="Submit">
        <button type="reset" onclick="clearElement('delete_works_at_div')" value="Reset">Clear Output</button>
      </form>
      <div id="delete_works_at_div">
        <?php echo $delete_works_at_out; ?>
      </div> 
    </div>
    
    <div id="delete_restaurant_review" class="tabcontent">
      <h3>Delete Restaurant Review</h3>
      <?php echo read_restaurant_review("") ?>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          Review ID: <input type="number" id="delete_restaurant_review_review_id" name="delete_restaurant_review_review_id" value="<?php echo $delete_restaurant_review_review_id ?>">
          <font color="red"><?php echo $delete_restaurant_review_review_idErr ?></font><br>
          <input type="submit" name="submit_form_delete_restaurant_review" value="Submit">
        <button type="reset" onclick="clearElement('delete_restaurant_review_div')" value="Reset">Clear Output</button>
       </form>
       <div id="delete_restaurant_review_div">
        <?php echo $delete_restaurant_review_out; ?>
      </div> 
    </div>
    
    <div id="delete_review_followup" class="tabcontent">
      <h3>Delete Review Followup</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      Followup ID: <input type="number" id="delete_review_followup_followup_id" name="delete_review_followup_followup_id" value="<?php echo $delete_review_followup_followup_id ?>">
          <font color="red"><?php echo $delete_review_followup_followup_idErr ?></font><br>
          <input type="submit" name="submit_form_delete_review_followup" value="Submit">
        <button type="reset" onclick="clearElement('delete_review_followup_div')" value="Reset">Clear Output</button>
      </form>
      <div id="delete_review_followup_div">
        <?php echo $delete_review_followup_out; ?>
      </div> 
    </div>
    
    <div id="delete_restaurant_discussion" class="tabcontent">
      <h3> Delete Restaurant Discussion </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      Discussion ID: <input type="number" id="delete_restaurant_discussion_discussion_id" name="delete_restaurant_discussion_discussion_id" value="<?php echo $delete_restaurant_discussion_discussion_id ?>">
          <font color="red"><?php echo $delete_restaurant_discussion_discussion_idErr ?></font><br>
          <input type="submit" name="submit_form_delete_restaurant_discussion" value="Submit">
        <button type="reset" onclick="clearElement('delete_restaurant_discussion_div')" value="Reset">Clear Output</button>
      </form>
       <div id="delete_restaurant_discussion_div">
        <?php echo $delete_restaurant_discussion_out; ?>
      </div> 
    </div>

    <div id="delete_discussion_reply" class="tabcontent">
      <h3>Delete Dicusion Reply</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      Reply ID: <input type="number" id="delete_discussion_reply_reply_id" name="delete_discussion_reply_reply_id" value="<?php echo $delete_discussion_reply_reply_id ?>">
          <font color="red"><?php echo $delete_discussion_reply_reply_idErr ?></font><br>
          <input type="submit" name="submit_form_delete_discussion_reply" value="Submit">
        <button type="reset" onclick="clearElement('delete_discussion_reply_div')" value="Reset">Clear Output</button>
      </form>
       <div id="delete_discussion_reply_div">
        <?php echo $delete_discussion_reply_out; ?>
      </div> 
    </div>

    <!-- 
      /* #endregion */
    -->

   


    <!-- ############################################### ######################## ############################################### -->
    <!-- ############################################### Filter Forms Tab Content ############################################### -->
    <!-- ############################################### ######################## ############################################### -->

 <!--
    /* #region  FILTER */
    -->
    <div id="filter_location" class="tabcontent">
      <h3>Filter Restaurants by Location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <select name="filter_location_bldgMgmtNo">
          <option value="all" <?php echo empty($filter_location_bldgMgmtNo) ? "selected=\"selected\"" : "" ?>>All Locations</option>
          <?php
            $sql = "SELECT * FROM location";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $myTemp = "";
            while( $row = mysqli_fetch_array($query)) {
              $myTemp = $myTemp . "<option value=\"" . $row['bldgMgmtNo'] . "\" ";
              if( $filter_location_bldgMgmtNo == $row['bldgMgmtNo'] ){
                $myTemp = $myTemp . " selected=\"selected\" ";
              }
              $myTemp = $myTemp . ">" . $row['jibun_juso'] . "</option>";
            }
            echo $myTemp;
          ?>
          <input type="submit" name="submit_form_filter_location" value="Get Restaurants">
        </select>

      </form>
       <div id="filter_location_div">
        <?php echo $filter_location_out; ?>
      </div> 
    </div>
    
    <div id="restaurant_rating_filter" class="tabcontent">
      <h3>Restaurant Rating Filter</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          Rating more than or equal to: 
          <input list="ratings" id="restaurant_rating_filter_review_star" name="restaurant_rating_filter_review_star" >
          <datalist id="ratings">
            <option value="1">
            <option value="2">
            <option value="3">
            <option value="4">
            <option value="5">
          </datalist><br>
          Order:
          <input list="order" id="restaurant_rating_filter_order" name="restaurant_rating_filter_order">
          <datalist id="order">
            <option value="Highest to Lowest">
            <option value="Lowest to Highest">
          </datalist><br>
          Is acitve:
          <input type="checkbox" id="restaurant_rating_filter_is_active" name="restaurant_rating_filter_is_active">
          <br>
        <input type="submit" name="submit_form_restaurant_rating_filter" value="Submit">
      </form>
      <button onclick="clearElement('restaurant_rating_filter_div')">Clear Output</button>
      <div id="restaurant_rating_filter_div">
        <?php echo $restaurant_rating_filter_out; ?>
      </div> 
    </div>
  

    <div id="filter_cuisine" class="tabcontent">
      <h3>Filter Restaurants by Cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <select name="filter_cuisine_cuisine_id">
          <option value="all" <?php echo empty($filter_cuisine_cuisine_id) ? "selected=\"selected\"" : "" ?> >All Cuisines</option>
          <?php
            $sql = "SELECT * FROM cuisine";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $myTemp = "";
            while( $row = mysqli_fetch_array($query)) {
              $myTemp = $myTemp . "<option value=\"" . $row['cuisine_id'] . "\" ";
              if( $filter_cuisine_cuisine_id == $row['cuisine_id'] ){
                $myTemp = $myTemp . " selected=\"selected\" ";
              }
              $myTemp = $myTemp . ">" . $row['cuisine_type'] . "</option>";
            }
            echo $myTemp;
          ?>
          <input type="submit" name="submit_form_filter_cuisine" value="Get Restaurants">
        </select>

      </form>
       <div id="filter_cuisine_div">
        <?php echo $filter_cuisine_out; ?>
      </div> 
    </div>





    <div id="review_filter_person" class="tabcontent">
    <h3>Filter Posts by Persons </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <select name="review_filter_person_person_id">
          <option value="all" <?php echo empty($review_filter_person_person_id) ? "selected=\"selected\"" : "" ?>>All Persons</option>
          <?php
            $sql = "SELECT * FROM person";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $myTemp = "";
            while( $row = mysqli_fetch_array($query)) {
              $myTemp = $myTemp . "<option value=\"" . $row['person_id'] . "\" ";
              if( $review_filter_person_person_id == $row['person_id'] ){
                $myTemp = $myTemp . " selected=\"selected\" ";
              }
              $myTemp = $myTemp . ">" . $row['person_id'] . "</option>";
            }
            echo $myTemp;
          ?>
          <input type="submit" name="submit_form_review_filter_person" value="Get Reviews">
        </select>

      </form>
       <div id="review_filter_person_div">
        <?php echo $review_filter_person_out; ?>
      </div> 
    </div>

 



    <div id="filter_posts_restaurant" class="tabcontent">
    <h3>Filter Posts by Restaurants </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <select name="filter_posts_restaurant_id">
          <option value="all" <?php echo empty($filter_posts_restaurant_id) ? "selected=\"selected\"" : "" ?>>All Restaurants</option>
          <?php
            $sql = "SELECT * FROM restaurant";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $myTemp = "";
            while( $row = mysqli_fetch_array($query)) {
              $myTemp = $myTemp . "<option value=\"" . $row['restaurant_id'] . "\" ";
              if( $filter_posts_restaurant_id == $row['restaurant_id'] ){
                $myTemp = $myTemp . " selected=\"selected\" ";
              }
              $myTemp = $myTemp . ">" . $row['restaurant_id'] . "</option>";
            }
            echo $myTemp;
          ?>
          <input type="submit" name="submit_form_filter_posts_restaurant" value="Get Reviews">
        </select>

      </form>
       <div id="filter_posts_restaurant_id">
        <?php echo $filter_posts_restaurant_out; ?>
      </div> 
    </div>



    <div id="sort_posts" class="tabcontent">
      <h3>Sort Posts by Time</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
          Last Update Time Order:
          <select id = "post_order" name="post_order">
          <option value="defalt">--Choose Order--</option>
            <option value="NtO">Newest to Oldest</option>
            <option value="OtN">Oldest to Newest</option>
          </select> 
        <input type="submit" name="submit_form_sort_posts" value="Submit">
      </form>
      <button onclick="clearElement('sort_posts_div')">Clear Output</button>
      <div id="sort_posts_div">
        <?php echo $sort_posts_out; ?>
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
      
      if(document.getElementById("is_open") != null ){
        document.getElementById("is_open").click();
      }
    </script>
    <?php mysqli_close($conn); ?>
  </body>
</html> 