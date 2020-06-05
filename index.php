<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CSE305 Final Project</title>
    <meta content="" name="descriptison">
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
      $a_open = $b_open = $review_open = "";
      $a_out = $b_out = $review_out = "";

      $a_field1 = $a_field1Err = "";
      $c_field1 = $c_field1Err = "";
      $c_field2 = $c_field2Err = "";
      $c_field3 = $c_field3Err = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hand multiple submits in a single file
        //https://www.techrepublic.com/article/handling-multiple-submits-in-a-single-form-with-php/
        if ( isset($_POST["submit_form_a"] )){
          $a_open = "is_open";
        //   bldgMgmtNo
        // zip_no
        // jibun_juso
          if (empty($_POST["a_field1"])) {
            $a_field1Err = "You must enter a value for field1";
          }
          if( $a_field1Err === "" ) {
            $a_field1 = test_input($_POST["a_field1"]);
            $sql = "SELECT * FROM playground_tests;";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $a_out = ""; // eg<table><thead><tr><td>a_field1</td></tr></thead><tbody>
            while( $row = mysqli_fetch_array($query)) {
              $a_out = $a_out . "<tr><td>" . $row['maker'] . "</td>";
              $a_out = $a_out . "<td>" . $row['model'] . "</td>";
              $a_out = $a_out . "<td>" . $row['speed'] . "</td>";
              $a_out = $a_out . "<td>" . $row['price'] . "</td></tr>";
            }
            $a_out = $a_out . ""; // eg </tbody></table>
          }
        } elseif ( isset($_POST["submit_form_b"] )) {
          $b_open = "is_open";
        } elseif ( isset($_POST["submit_form_reviewsubmission"] )) {
          $review_open = "is_open";
          if (empty($_POST["c_field1"])) {
            $c_field1Err = "You must enter a value for field1";
          }
          if (empty($_POST["c_field2"])) {
            $c_field2Err = "You must enter a value for field1";
          }
          if (empty($_POST["c_field3"])) {
            $c_field3Err = "You must enter a value for field1";
          }
          if( $c_field1Err === "" ) {
            $sql = "SELECT * FROM playground_tests;";
          }
        }
      }

    ?>

    <h5>
      Kyuri Kyeong - 111827215 - kyuri.kyeong@stonybrook.edu<br>
      Daekyung (Tim) Kim - 110887867 - daekyung.kim@stonybrooke.du<br>
      Haseung Lee - 110983860 - haseung.lee@stonybrook.edu
    </h5>
    <!-- Tab links -->
    <div class="tab">
      <!-- CREATE -->
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
    <div class="tab">
      <!-- READ -->
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
    <div class="tab">
      <!-- UPDATE -->
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
    <div class="tab">  
      <!-- DELETE -->
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









    <!-- Tab content -->
    <div id="create_location" class="tabcontent">
      <h3>Location</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        bldgMgmtNo: <input type="number" id="a_bldgMgmtNo" name="a_bldgMgmtNo" value="<?php echo $a_bldgMgmtNo ?>">
        <font color="red"><?php echo $a_bldgMgmtNoErr ?></font><br>
        zip_no: <input type="number" id="a_zip_no" name="a_zip_no" value="<?php echo $a_zip_no ?>">
        <font color="red"><?php echo $a_zip_noErr ?></font><br>
        jibun_juso: <input type="number" id="a_jibun_juso" name="a_jibun_juso" value="<?php echo $a_jibun_juso ?>">
        <font color="red"><?php echo $a_jibun_jusoErr ?></font><br>
        <input type="submit" name="submit_form_a" value="Submit">
      </form>
      <button onclick="clearElement('a_div')">Clear Output</button>
      <div id="a_div">
        <?php echo $a_out; ?>
      </div> 
    </div>

    <div id="b" class="tabcontent">
    </div>
    <div id="asdf" class="tabcontent">
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