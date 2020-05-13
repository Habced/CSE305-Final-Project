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
        padding: 14px 16px;
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
      $a_open = $b_open = "";
      $a_out = $b_out = "";
      $a_field1 = $a_field1Err = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hand multiple submits in a single file
        //https://www.techrepublic.com/article/handling-multiple-submits-in-a-single-form-with-php/
        if ( isset($_POST["submit_form_a"] )){
          $a_open = "is_open";
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
        }
      }

    ?>

    <h1>
      Kyuri Kyeong <br>
      Daekyung (Tim) Kim <br>
      Haseung Lee - 110983860 - haseung.lee@stonybrook.edu
    </h1>
    <!-- Tab links -->
    <div class="tab">
      <button class="tablinks" onclick="openPart(event, 'a')" id="<?php echo $a_open; ?>">Part (a)</button>
      <button class="tablinks" onclick="openPart(event, 'b')" id="<?php echo $b_open; ?>">Part (b)</button>
    </div>

    <!-- Tab content -->
    <div id="a" class="tabcontent">
      <h3>Part (a)</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Field1: <input type="number" id="a_field1" name="a_field1" value="<?php echo $a_field1 ?>">
        <font color="red"><?php echo $a_field1Err ?></font><br>
        <input type="submit" name="submit_form_a" value="Submit">
      </form>
      <button onclick="clearElement('a_div')">Clear Output</button>
      <div id="a_div">
        <?php echo $a_out; ?>
      </div>
    </div>

    <div id="b" class="tabcontent">
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