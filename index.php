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
      $create_location_open = $create_location_out = $create_location_bldgMgmtNo = $create_location_bldgMgmtNo = $create_location_bldgMgmtNo = "";
      $create_business_open = $create_business_out = "";
      $create_restaurant_open = $create_restaurant_out = "";
      $create_cuisine_open = $create_cuisine_out = "";
      $create_serves_open = $create_serves_out = "";
      $create_person_open = $create_person_out = "";
      $create_works_at_open = $create_works_at_out = "";
      $create_restaurant_review_open = $create_restaurant_review_out = "";
      $create_review_followup_open = $create_review_followup_out = "";
      $create_restaurant_discussion_open = $create_restaurant_discussion_out = "";
      $create_discussion_reply_open =   $create_discussion_reply_out = "";

      $read_location_open = $read_location_out = "";
      $read_business_open =  $read_business_out = "";
      $read_restaurant_open = $read_restaurant_out = "";
      $read_cuisine_open = $read_cuisine_out = "";
      $read_serves_open = $read_serves_out = "";
      $read_person_open = $read_person_out = "";
      $read_works_at_open = $read_works_at_out = "";
      $read_restaurant_review_open = $read_restaurant_review_out = "";
      $read_review_followup_open = $read_review_followup_out = "";
      $read_restaurant_discussion_open = $read_restaurant_discussion_out = "";
      $read_discussion_reply_open = $read_discussion_reply_out = "";

      $update_location_open = $update_location_out = "";
      $update_business_open = $update_business_out = "";
      $update_restaurant_open = $update_restaurant_out = "";
      $update_cuisine_open = $update_cuisine_out = "";
      $update_serves_open = $update_serves_out = "";
      $update_person_open = $update_person_out = "";
      $update_works_at_open = $update_works_at_out = "";
      $update_restaurant_review_open = $update_restaurant_review_out = "";
      $update_review_followup_open = $update_review_followup_out = "";
      $update_restaurant_discussion_open = $update_restaurant_discussion_out = "";
      $update_discussion_reply_open = $update_discussion_reply_out = "";

      $delete_location_open = $delete_location_out = "";
      $delete_business_open = $delete_business_out = "";
      $delete_restaurant_open = $delete_restaurant_out = "";
      $delete_cuisine_open = $delete_cuisine_out = "";
      $delete_serves_open = $delete_serves_out = "";
      $delete_person_open = $delete_person_out = "";
      $delete_works_at_open = $delete_works_at_out = "";
      $delete_restaurant_review_open = $delete_restaurant_review_out = "";
      $delete_review_followup_open = $delete_review_followup_out = "";
      $delete_restaurant_discussion_open = $delete_restaurant_discussion_out = "";
      $delete_discussion_reply_open = $delete_discussion_reply_out = "";

      // // 
      // $create_location_open = "is_open";
      // //   bldgMgmtNo
      // // zip_no
      // // jibun_juso
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


      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hand multiple submits in a single file
        //https://www.techrepublic.com/article/handling-multiple-submits-in-a-single-form-with-php/
        if ( isset($_POST["submit_form_create_location"] )){ 

        }
        elseif ( isset($_POST["submit_form_create_business"] )){ }
        elseif ( isset($_POST["submit_form_create_restaurant"] )){ 
          if (empty($_POST["create_restaurant_weekday_open_time"])) {
            $create_restaurant_weekday_open_timeErr = "You must enter a value for create_restaurant_weekday_open_time"
          }
          if (empty($_POST["create_restaurant_weekday_end_time"])) {
            $create_restaurant_weekday_end_timeErr = "You must enter a value for create_restaurant_weekday_end_time"
          }
          if (empty($_POST["create_restaurant_weekend_open_time"])) {
            $create_restaurant_weekend_open_timeErr = "You must enter a value for create_restaurant_weekend_open_time"
          }
          if (empty($_POST["create_restaurant_weekend_end_time"])) {
            $create_restaurant_weekend_end_timeErr = "You must enter a value for create_restaurant_weekend_end_time"
          }
          if (empty($_POST["create_restaurant_has_weekly_break"])) {
            $create_restaurant_has_weekly_breakErr = "You must enter a value for create_restaurant_has_weekly_break"
          }
          if (empty($_POST["create_restaurant_weekly_break_date"])) {
            $create_restaurant_weekly_break_dateErr = "You must enter a value for create_restaurant_weekly_break_date"
          }
          if (empty($_POST["create_restaurant_create_date"])) {
            $create_restaurant_create_dateErr = "You must enter a value for create_restaurant_create_date"
          }
          if (empty($_POST["create_restaurant_last_update"])) {
            $create_restaurant_last_updateErr = "You must enter a value for create_restaurant_last_update"
          }
          if (empty($_POST["create_restaurant_is_active"])) {
            $create_restaurant_is_activeErr = "You must enter a value for create_restaurant_is_active"
          }
        }
        weekday_open_time: <input type="text" id="create_restaurant_weekday_open_time" name="create_restaurant_weekday_open_time" value="<?php echo $create_restaurant_weekday_open_time ?>">
        <font color="red"><?php echo $create_restaurant_weekday_open_timeErr ?></font><br>
        weekday_end_time: <input type="text" id="create_restaurant_weekday_end_time" name="create_restaurant_weekday_end_time" value="<?php echo $create_restaurant_weekday_end_time ?>">
        <font color="red"><?php echo $create_restaurant_weekday_end_timeErr ?></font><br>
        weekend_open_time: <input type="text" id="create_restaurant_weekend_open_time" name="create_restaurant_weekend_open_time" value="<?php echo $create_restaurant_weekend_open_time ?>">
        <font color="red"><?php echo $create_restaurant_weekend_open_timeErr ?></font><br>
        weekend_end_time: <input type="text" id="create_restaurant_weekend_end_time" name="create_restaurant_weekend_end_time" value="<?php echo $create_restaurant_weekend_end_time ?>">
        <font color="red"><?php echo $create_restaurant_weekend_end_timeErr ?></font><br>
        has_weekly_break: <input type="checkbox" id="create_restaurant_has_weekly_break" name="create_restaurant_has_weekly_break" value="<?php echo $create_restaurant_has_weekly_break ?>">
        <font color="red"><?php echo $create_restaurant_has_weekly_breakErr ?></font><br>
        weekly_break_date: <input type="text" id="create_restaurant_weekly_break_date" name="create_restaurant_weekly_break_date" value="<?php echo $create_restaurant_weekly_break_date ?>">
        <font color="red"><?php echo $create_restaurant_weekly_break_dateErr ?></font><br>
        create_date: <input type="date" id="create_restaurant_create_date" name="create_restaurant_create_date" value="<?php echo $create_restaurant_create_date ?>">
        <font color="red"><?php echo $create_restaurant_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_restaurant_last_update" name="create_restaurant_last_update" value="<?php echo $create_restaurant_last_update ?>">
        <font color="red"><?php echo $create_restaurant_last_updateErr ?></font><br>
        is_active: <input type="checkbox" id="create_restaurant_is_active" name="create_restaurant_is_active" value="<?php echo $create_restaurant_is_active ?>">
        <font color="red"><?php echo $create_restaurant_is_activeErr ?></font><br>
        <input type="submit" name="submit_form_create_restaurant" value="Submit">
        elseif ( isset($_POST["submit_form_create_cuisine"] )){ }
        elseif ( isset($_POST["submit_form_create_serves"] )){ }
        elseif ( isset($_POST["submit_form_create_person"] )){ }
        elseif ( isset($_POST["submit_form_create_works_at"] )){ }
        elseif ( isset($_POST["submit_form_create_restaurant_review"] )){ }
        elseif ( isset($_POST["submit_form_create_review_followup"] )){ }
        elseif ( isset($_POST["submit_form_create_restaurant_discussion"] )){ }
        elseif ( isset($_POST["submit_form_create_discussion_reply"] )){ }

        elseif ( isset($_POST["submit_form_read_location"] )){ }
        elseif ( isset($_POST["submit_form_read_business"] )){ }
        elseif ( isset($_POST["submit_form_read_restaurant"] )){ }
        elseif ( isset($_POST["submit_form_read_cuisine"] )){ }
        elseif ( isset($_POST["submit_form_read_serves"] )){ }
        elseif ( isset($_POST["submit_form_read_person"] )){ }
        elseif ( isset($_POST["submit_form_read_works_at"] )){ }
        elseif ( isset($_POST["submit_form_read_restaurant_review"] )){ }
        elseif ( isset($_POST["submit_form_read_review_followup"] )){ }
        elseif ( isset($_POST["submit_form_read_restaurant_discussion"] )){ }
        elseif ( isset($_POST["submit_form_read_discussion_reply"] )){ }
        
        elseif ( isset($_POST["update_form_create_location"] )){ }
        elseif ( isset($_POST["update_form_create_business"] )){ }
        elseif ( isset($_POST["update_form_create_restaurant"] )){ }
        elseif ( isset($_POST["update_form_create_cuisine"] )){ }
        elseif ( isset($_POST["update_form_create_serves"] )){ }
        elseif ( isset($_POST["update_form_create_person"] )){ }
        elseif ( isset($_POST["update_form_create_works_at"] )){ }
        elseif ( isset($_POST["update_form_create_restaurant_review"] )){ }
        elseif ( isset($_POST["update_form_create_review_followup"] )){ }
        elseif ( isset($_POST["update_form_create_restaurant_discussion"] )){ }
        elseif ( isset($_POST["update_form_create_discussion_reply"] )){ }

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
        // <div id="create_business" class="tabcontent"></div>
        // <div id="create_restaurant" class="tabcontent"></div>    
        // <div id="create_cuisine" class="tabcontent"></div>
        // <div id="create_serves" class="tabcontent"></div>
        // <div id="create_person" class="tabcontent"></div>
        // <div id="create_works_at" class="tabcontent"></div>
        // <div id="create_restaurant_review" class="tabcontent"></div>
        // <div id="create_review_followup" class="tabcontent"></div>
        // <div id="create_restaurant_discussion" class="tabcontent"></div>
        // <div id="create_discussion_reply" class="tabcontent"></div>
      }
    ?>

    <h5>
      Kyuri Kyeong - 111827215 - kyuri.kyeong@stonybrook.edu<br>
      Daekyung (Tim) Kim - 110887867 - daekyung.kim@stonybrooke.du<br>
      Haseung Lee - 110983860 - haseung.lee@stonybrook.edu
    </h5>
    <!-- Tab links -->
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

    <!-- ----------- Tab content ----------- -->

    
    <!-- ############################################### ######################## ############################################### -->
    <!-- ############################################### Create Forms Tab Content ############################################### -->
    <!-- ############################################### ######################## ############################################### -->
    <div id="create_location" class="tabcontent">
      <h3>Location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        bldgMgmtNo: <input type="number" id="create_location_bldgMgmtNo" name="create_location_bldgMgmtNo" value="<?php echo $a_bldgMgmtNo ?>">
        <font color="red"><?php echo $a_bldgMgmtNoErr ?></font><br>
        zip_no: <input type="number" id="create_location_zip_no" name="create_location_zip_no" value="<?php echo $a_zip_no ?>">
        <font color="red"><?php echo $a_zip_noErr ?></font><br>
        jibun_juso: <input type="number" id="create_location_jibun_juso" name="create_location_jibun_juso" value="<?php echo $a_jibun_juso ?>">
        <font color="red"><?php echo $a_jibun_jusoErr ?></font><br>
        <input type="submit" name="submit_form_create_location" value="Submit">
      </form>
      <button onclick="clearElement('a_div')">Clear Output</button>
      <div id="a_div">
        <?php echo $a_out; ?>
      </div> 
    </div>

    <div id="create_business" class="tabcontent">
      <h3>create_business</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_create_business" value="Submit">
      </form>
      <button onclick="clearElement('create_business_div')">Clear Output</button>
      <div id="create_business_div">
        <?php echo $create_business_out; ?>
      </div> 
    </div>
    
    <div id="create_restaurant" class="tabcontent">
      <h3>create_restaurant</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        weekday_open_time: <input type="text" id="create_restaurant_weekday_open_time" name="create_restaurant_weekday_open_time" value="<?php echo $create_restaurant_weekday_open_time ?>">
        <font color="red"><?php echo $create_restaurant_weekday_open_timeErr ?></font><br>
        weekday_end_time: <input type="text" id="create_restaurant_weekday_end_time" name="create_restaurant_weekday_end_time" value="<?php echo $create_restaurant_weekday_end_time ?>">
        <font color="red"><?php echo $create_restaurant_weekday_end_timeErr ?></font><br>
        weekend_open_time: <input type="text" id="create_restaurant_weekend_open_time" name="create_restaurant_weekend_open_time" value="<?php echo $create_restaurant_weekend_open_time ?>">
        <font color="red"><?php echo $create_restaurant_weekend_open_timeErr ?></font><br>
        weekend_end_time: <input type="text" id="create_restaurant_weekend_end_time" name="create_restaurant_weekend_end_time" value="<?php echo $create_restaurant_weekend_end_time ?>">
        <font color="red"><?php echo $create_restaurant_weekend_end_timeErr ?></font><br>
        has_weekly_break: <input type="checkbox" id="create_restaurant_has_weekly_break" name="create_restaurant_has_weekly_break" value="<?php echo $create_restaurant_has_weekly_break ?>">
        <font color="red"><?php echo $create_restaurant_has_weekly_breakErr ?></font><br>
        weekly_break_date: <input type="text" id="create_restaurant_weekly_break_date" name="create_restaurant_weekly_break_date" value="<?php echo $create_restaurant_weekly_break_date ?>">
        <font color="red"><?php echo $create_restaurant_weekly_break_dateErr ?></font><br>
        create_date: <input type="date" id="create_restaurant_create_date" name="create_restaurant_create_date" value="<?php echo $create_restaurant_create_date ?>">
        <font color="red"><?php echo $create_restaurant_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_restaurant_last_update" name="create_restaurant_last_update" value="<?php echo $create_restaurant_last_update ?>">
        <font color="red"><?php echo $create_restaurant_last_updateErr ?></font><br>
        is_active: <input type="checkbox" id="create_restaurant_is_active" name="create_restaurant_is_active" value="<?php echo $create_restaurant_is_active ?>">
        <font color="red"><?php echo $create_restaurant_is_activeErr ?></font><br>
        <input type="submit" name="submit_form_create_restaurant" value="Submit">
      </form>
      <button onclick="clearElement('create_restaurant_div')">Clear Output</button>
      <div id="create_restaurant_div">
        <?php echo $create_restaurant_out; ?>
      </div> 
    </div>

    <div id="create_cuisine" class="tabcontent">
      <h3>create_cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_create_cuisine" value="Submit">
      </form>
      <button onclick="clearElement('create_cuisine_div')">Clear Output</button>
      <div id="create_cuisine_div">
        <?php echo $create_cuisine_out; ?>
      </div> 
    </div>

    <div id="create_serves" class="tabcontent">
      <h3>create_serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_create_serves" value="Submit">
      </form>
      <button onclick="clearElement('create_serves_div')">Clear Output</button>
      <div id="create_serves_div">
        <?php echo $create_serves_out; ?>
      </div> 
    </div>

    <div id="create_person" class="tabcontent">
      <h3>create_person</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        person_id: <input type="number" id="create_person_person_id" name="create_person_person_id" value="<?php echo $create_person_person_id ?>">
          <font color="red"><?php echo $create_person_person_idErr ?></font><br>
        fullname: <input type="text" id="create_person_fullname" name="create_person_fullname" value="<?php echo $create_person_fullname ?>">
          <font color="red"><?php echo $create_person_fullnameErr ?></font><br>
        email: <input type="text" id="create_person_email" name="create_person_email" value="<?php echo $create_person_email ?>">
          <font color="red"><?php echo $create_person_emailErr ?></font><br>
        username: <input type="text" id="create_person_username" name="create_person_username" value="<?php echo $create_person_username ?>">
          <font color="red"><?php echo $create_person_usernameErr ?></font><br>
        password: <input type="text" id="create_person_password" name="create_person_password" value="<?php echo $create_person_password ?>">
          <font color="red"><?php echo $create_person_passwordErr ?></font><br>
        create_date: <input type="date" id="create_person_create_date" name="create_person_create_date" value="<?php echo $create_person_create_date ?>">
          <font color="red"><?php echo $create_person_create_dateErr ?></font><br>
        last_update: <input type="date" id="create_person_last_update" name="create_person_last_update" value="<?php echo $create_person_last_update ?>">
          <font color="red"><?php echo $create_person_last_updateErr ?></font><br>
        is_activate: <input type="checkbox" id="create_person_is_activate" name="create_person_is_activate" value="<?php echo $create_person_is_activate ?>">
        <font color="red"><?php echo $create_person_is_activateErr ?></font><br>
        <input type="submit" name="submit_form_create_person" value="Submit">
      </form>
      <button onclick="clearElement('create_person_div')">Clear Output</button>
      <div id="create_person_div">
        <?php echo $create_person_out; ?>
      </div> 
    </div>
    
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
    
    <div id="create_restaurant_review" class="tabcontent">
      <h3>create_restaurant_review</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_create_restaurant_review" value="Submit">
      </form>
      <button onclick="clearElement('create_restaurant_review_div')">Clear Output</button>
      <div id="create_restaurant_review_div">
        <?php echo $create_restaurant_review_out; ?>
      </div> 
    </div>
    
    <div id="create_review_followup" class="tabcontent">
      <h3>create_review_followup</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_create_review_followup" value="Submit">
      </form>
      <button onclick="clearElement('create_review_followup_div')">Clear Output</button>
      <div id="create_review_followup_div">
        <?php echo $create_review_followup_out; ?>
      </div> 
    </div>
    
    <div id="create_restaurant_discussion" class="tabcontent">
      <h3> create_restaurant_discussion </h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_create_restaurant_discussion" value="Submit">
      </form>
      <button onclick="clearElement('create_restaurant_discussion_div')">Clear Output</button>
      <div id="create_restaurant_discussion_div">
        <?php echo $create_restaurant_discussion_out; ?>
      </div> 
    </div>

    <div id="create_discussion_reply" class="tabcontent">
      <h3>create_discussion_reply</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_create_discussion_reply" value="Submit">
      </form>
      <button onclick="clearElement('create_discussion_reply_div')">Clear Output</button>
      <div id="create_discussion_reply_div">
        <?php echo $create_discussion_reply_out; ?>
      </div> 
    </div>

    <!-- ############################################### ###################### ############################################### -->
    <!-- ############################################### Read Forms Tab Content ############################################### -->
    <!-- ############################################### ###################### ############################################### -->
    
    <div id="read_location" class="tabcontent">
      <h3>read_location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_location" value="Submit">
      </form>
      <button onclick="clearElement('read_location_div')">Clear Output</button>
      <div id="read_location_div">
        <?php echo $read_location_out; ?>
      </div> 
    </div> 

    <div id="read_business" class="tabcontent">
      <h3>read_business</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_business" value="Submit">
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
        <?php echo $read_restaurant_out; ?>
      </div> 
    </div>

    <div id="read_cuisine" class="tabcontent">
      <h3>read_cuisine</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_cuisine" value="Submit">
      </form>
      <button onclick="clearElement('read_cuisine_div')">Clear Output</button>
      <div id="read_cuisine_div">
        <?php echo $read_cuisine_out; ?>
      </div> 
    </div>

    <div id="read_serves" class="tabcontent">
      <h3>read_serves</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_read_serves" value="Submit">
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


    <!-- ############################################### ######################## ############################################### -->
    <!-- ############################################### Update Forms Tab Content ############################################### -->
    <!-- ############################################### ######################## ############################################### -->

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
        <?php echo $update_restaurant_out; ?>
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
        <?php echo $update_person_out; ?>
      </div> 
    </div>
    
    <div id="update_works_at" class="tabcontent">
      <h3>update_works_at</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <input type="submit" name="submit_form_update_works_at" value="Submit">
      </form>
      <button onclick="clearElement('update_works_at_div')">Clear Output</button>
      <div id="update_works_at_div">
        <?php echo $update_works_at_out; ?>
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

    <!-- ############################################### ######################## ############################################### -->
    <!-- ############################################### Delete Forms Tab Content ############################################### -->
    <!-- ############################################### ######################## ############################################### -->
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