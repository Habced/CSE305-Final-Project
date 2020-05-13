<!DOCTYPE html>
<!-- Haseung Lee 110983860 -->
<!-- haseung.lee@stonybrook.edu -->
<html>
  <head>
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
      $dbhost = "localhost";
      $dbuser = "grader";
      $dbpass = "allowme";
      $db = "hlps5";
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

      // https://tryphp.w3schools.com/showphp.php?filename=demo_form_validation_complete
      // define variables and set to empty values
      $a_open = $b_open = $c_open = $d_open = $e_open = "";
      $a_out = $b_out = $c_out = $d_out = $e_out = "";
      $a_PcPrice = "";
      $a_PcPriceErr = "";
      $b_LaptopSpeed = $b_LaptopRAM = $b_LaptopHD = $b_LaptopWeight = "";
      $b_LaptopSpeedErr = $b_LaptopRAMErr = $b_LaptopHDErr = $b_LaptopWeightErr = "";
      $c_Manufacturer = "";
      $c_ManufacturerErr = "";
      $d_Manufacturer = $d_Model = $d_Speed = $d_Ram = $d_HD = $d_Price = "";
      $d_ManufacturerErr = $d_ModelErr = $d_SpeedErr = $d_RamErr = $d_HDErr = $d_PriceErr = "";
      $e_Budget = $e_Speed = "";
      $e_BudgetErr = $e_SpeedErr = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hand multiple submits in a single file
        //https://www.techrepublic.com/article/handling-multiple-submits-in-a-single-form-with-php/
        if ( isset($_POST["a_submit"] )){
          $a_open = "is_open";
          if (empty($_POST["a_PcPrice"])) {
            $a_PcPriceErr = "You must enter a price";
          }
          if( $a_PcPriceErr === "" ) {
            $a_PcPrice = test_input($_POST["a_PcPrice"]);
            $sql = "SELECT * FROM Products, PCs WHERE Products.model = PCs.model ORDER BY abs(PCs.price - $a_PcPrice ) LIMIT 5;";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $a_out = "<table><thead><tr><td>Maker</td><td>Model</td><td>Speed</td><td>Price</td></tr></thead><tbody>";
            while( $row = mysqli_fetch_array($query)) {
              $a_out = $a_out . "<tr><td>" . $row['maker'] . "</td>";
              $a_out = $a_out . "<td>" . $row['model'] . "</td>";
              $a_out = $a_out . "<td>" . $row['speed'] . "</td>";
              $a_out = $a_out . "<td>" . $row['price'] . "</td></tr>";
            }
            $a_out = $a_out . "</tbody></table>";
          }
        } elseif ( isset($_POST["b_submit"] )) {
          $b_open = "is_open";
          if (empty($_POST["b_LaptopSpeed"])) {
            $b_LaptopSpeedErr = "You must enter a speed";
          } else {
            $b_LaptopSpeed = test_input($_POST["b_LaptopSpeed"]);
          }
          if ( empty($_POST["b_LaptopRAM"])) {
            $b_LaptopRAMErr = "You must enter a ram";
          } else {
            $b_LaptopRAM = test_input($_POST["b_LaptopRAM"]);
          }
          if ( empty($_POST["b_LaptopHD"])) {
            $b_LaptopHDErr = "You must enter a hd size";
          } else {
            $b_LaptopHD = test_input($_POST["b_LaptopHD"]);
          }
          if ( empty($_POST["b_LaptopWeight"])) {
            $b_LaptopWeightErr = "You must enter a weight";
          } else {
            $b_LaptopWeight = test_input($_POST["b_LaptopWeight"]);
          }
          if ( $b_LaptopSpeedErr === "" && $b_LaptopRAMErr === "" && $b_LaptopHDErr === "" && $b_LaptopWeightErr === "" ) {
            $sql = "SELECT * FROM Products P, Laptops L WHERE (P.model = L.model) AND (speed >= $b_LaptopSpeed) AND (ram >= $b_LaptopRAM) AND (hd >= $b_LaptopHD) AND (weight >= $b_LaptopWeight)";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $b_out = "<table><thead><tr><td>Maker</td><td>Model</td><td>Speed</td><td>RAM</td><td>HD</td><td>Weight</td><td>Price</td></tr></thead><tbody>";
            while( $row = mysqli_fetch_array($query)) {
              $b_out = $b_out . "<tr><td>" . $row['maker'] . "</td>";
              $b_out = $b_out . "<td>" . $row['model'] . "</td>";
              $b_out = $b_out . "<td>" . $row['speed'] . "</td>";
              $b_out = $b_out . "<td>" . $row['ram'] . "</td>";
              $b_out = $b_out . "<td>" . $row['hd'] . "</td>";
              $b_out = $b_out . "<td>" . $row['weight'] . "</td>";
              $b_out = $b_out . "<td>" . $row['price'] . "</td></tr>";
            }
            $b_out = $b_out . "</tbody></table>";
          }
        } elseif ( isset($_POST["c_submit"] )) {
          $c_open = "is_open";
          if (empty($_POST["c_Manufacturer"])) {
            $c_ManufacturerErr = "You must enter a manufacturer";
          } else {
            $c_Manufacturer = test_input($_POST["c_Manufacturer"]);
          }
          if ( $c_ManufacturerErr === "" ) {
            $sql = "SELECT * FROM Products P, PCs C WHERE (P.model = C.model) AND (P.maker = '$c_Manufacturer')";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $rows = 0;
            $rows = mysqli_num_rows($query);
            if ( $rows > 0 ) {
              $c_out = "<table><thead><tr><td>Maker</td><td>Model</td><td>Product Type</td><td>Speed</td><td>RAM</td><td>HD</td><td>Price</td></tr></thead><tbody>";
              while( $row = mysqli_fetch_array($query)) {
                $c_out = $c_out . "<tr><td>" . $row['maker'] . "</td>";
                $c_out = $c_out . "<td>" . $row['model'] . "</td>";
                $c_out = $c_out . "<td>" . $row['type'] . "</td>";
                $c_out = $c_out . "<td>" . $row['speed'] . "</td>";
                $c_out = $c_out . "<td>" . $row['ram'] . "</td>";
                $c_out = $c_out . "<td>" . $row['hd'] . "</td>";
                $c_out = $c_out . "<td>" . $row['price'] . "</td></tr>";
              }
              $c_out = $c_out . "</tbody></table><br>";
            }
            $sql = "SELECT * FROM Products P, Laptops L WHERE (P.model = L.model) AND (P.maker = '$c_Manufacturer')";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $rows = 0;
            $rows = mysqli_num_rows($query);
            if ( $rows > 0 ) {
              $c_out = $c_out . "<table><thead><tr><td>Maker</td><td>Model</td><td>Product Type</td><td>Speed</td><td>RAM</td><td>HD</td><td>Weight</td><td>Price</td></tr></thead><tbody>";
              while( $row = mysqli_fetch_array($query)) {
                $c_out = $c_out . "<tr><td>" . $row['maker'] . "</td>";
                $c_out = $c_out . "<td>" . $row['model'] . "</td>";
                $c_out = $c_out . "<td>" . $row['type'] . "</td>";
                $c_out = $c_out . "<td>" . $row['speed'] . "</td>";
                $c_out = $c_out . "<td>" . $row['ram'] . "</td>";
                $c_out = $c_out . "<td>" . $row['hd'] . "</td>";
                $c_out = $c_out . "<td>" . $row['weight'] . "</td>";
                $c_out = $c_out . "<td>" . $row['price'] . "</td></tr>";
              }
              $c_out = $c_out . "</tbody></table><br>";
            }
            $sql = "SELECT * FROM Products P, Printers R WHERE (P.model = R.model) AND (P.maker = '$c_Manufacturer')";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $rows = 0;
            $rows = mysqli_num_rows($query);
            if ( $rows > 0 ) {
              $c_out = $c_out . "<table><thead><tr><td>Maker</td><td>Model</td><td>Product Type</td><td>Color</td><td>Printer Type</td><td>Price</td></tr></thead><tbody>";
              while( $row = mysqli_fetch_array($query)) {
                $c_out = $c_out . "<tr><td>" . $row['maker'] . "</td>";
                $c_out = $c_out . "<td>" . $row['model'] . "</td>";
                $c_out = $c_out . "<td>" . $row[2] . "</td>";
                $c_out = $c_out . "<td>" . $row['color'] . "</td>";
                $c_out = $c_out . "<td>" . $row['type'] . "</td>";
                $c_out = $c_out . "<td>" . $row['price'] . "</td></tr>";
              }
              $c_out = $c_out . "</tbody></table><br>";
            }
          }
        } elseif ( isset($_POST["d_submit"] )) {
          $d_open = "is_open";
          if (empty($_POST["d_Manufacturer"])) {
            $d_ManufacturerErr = "You must enter a Manufacturer";
          } else {
            $d_Manufacturer = test_input($_POST["d_Manufacturer"]);
          }
          if ( empty($_POST["d_Model"])) {
            $d_ModelErr = "You must enter a Model";
          } else {
            $d_Model = test_input($_POST["d_Model"]);
          }
          if ( empty($_POST["d_Speed"])) {
            $d_SpeedErr = "You must enter a speed";
          } else {
            $d_Speed = test_input($_POST["d_Speed"]);
          }
          if ( empty($_POST["d_Ram"])) {
            $d_RamErr = "You must enter a ram";
          } else {
            $d_Ram = test_input($_POST["d_Ram"]);
          }
          if ( empty($_POST["d_HD"])) {
            $d_HDErr = "You must enter a HD";
          } else {
            $d_HD = test_input($_POST["d_HD"]);
          }
          if ( empty($_POST["d_Price"])) {
            $d_PriceErr = "You must enter a price";
          } else {
            $d_Price = test_input($_POST["d_Price"]);
          }
          if ( $d_ManufacturerErr === "" && $d_ModelErr === "" && $d_SpeedErr === "" && $d_RamErr === "" && $d_HDErr === "" && $d_PriceErr === "" ) {
            $sql = "SELECT * FROM Products WHERE (Products.model = $d_Model)";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $rows = 0;
            $rows = mysqli_num_rows($query);
            if ( $rows > 0 ) {
              $d_ModelErr = "Model Number already exists";
            } else {
              $sql = "INSERT INTO Products (maker, model, type) VALUES ('$d_Manufacturer', $d_Model, 'PC')";
              $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
              $sql = "INSERT INTO PCs (model, speed, ram, hd, price) VALUES ($d_Model, $d_Speed, $d_Ram, $d_HD, $d_Price)";
              $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
              $sql = "SELECT * FROM Products, PCs WHERE Products.model = $d_Model AND PCs.model = $d_Model";
              $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
              $d_out = $d_out . "<table><thead><tr><td>Maker</td><td>Model</td><td>Product Type</td><td>Speed</td><td>Ram</td><td>HD</td><td>Price</td></thead><tbody>";
              while( $row = mysqli_fetch_array($query)) {
                $d_out = $d_out . "<tr><td>" . $row['maker'] . "</td>";
                $d_out = $d_out . "<td>" . $row['model'] . "</td>";
                $d_out = $d_out . "<td>" . $row['type'] . "</td>";
                $d_out = $d_out . "<td>" . $row['speed'] . "</td>";
                $d_out = $d_out . "<td>" . $row['ram'] . "</td>";
                $d_out = $d_out . "<td>" . $row['hd'] . "</td>";
                $d_out = $d_out . "<td>" . $row['price'] . "</td></tr>";
              }
              $d_out = $d_out . "</tbody></table><br>";
            }
          }
        } elseif ( isset($_POST["e_submit"] )) {
          $e_open = "is_open";
          if (empty($_POST["e_Budget"])) {
            $e_BudgetErr = "You must enter a Budget";
          } else {
            $e_Budget = test_input($_POST["e_Budget"]);
          }
          if ( empty($_POST["e_Speed"])) {
            $e_SpeedErr = "You must enter a Model";
          } else {
            $e_Speed = test_input($_POST["e_Speed"]);
          }
          if ( $e_BudgetErr === "" && $e_SpeedErr === "" ) {
            $sql = "SELECT * FROM PCs C, Printers P WHERE ((C.price + P.price) < $e_Budget) AND (C.speed > $e_Speed) ORDER BY (C.price + P.price)";
            $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
            $cheapest = $cheapestColor = "";
            while( $row = mysqli_fetch_array($query)) {
              if( $row['color'] = 1 ){
                $e_out = "PC Model: " . $row[0] . ", Printer Model: " . $row[5];
                break;
              } elseif ( $e_out = "" ){
                $e_out = "PC Model: " . $row[0] . ", Printer Model: " . $row[5];
              }
            }
          }


        }
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <h1>
      Haseung Lee - 110983860 <br>
      haseung.lee@stonybrook.edu
    </h1>

    <!-- Tab links -->
    <div class="tab">
      <button class="tablinks" onclick="openPart(event, 'a')" id="<?php echo $a_open; ?>">Part (a)</button>
      <button class="tablinks" onclick="openPart(event, 'b')" id="<?php echo $b_open; ?>">Part (b)</button>
      <button class="tablinks" onclick="openPart(event, 'c')" id="<?php echo $c_open; ?>">Part (c)</button>
      <button class="tablinks" onclick="openPart(event, 'd')" id="<?php echo $d_open; ?>">Part (d)</button>
      <button class="tablinks" onclick="openPart(event, 'e')" id="<?php echo $e_open; ?>">Part (e)</button>
    </div>

    <!-- Tab content -->
    <div id="a" class="tabcontent">
      <h3>Part (a)</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Price of PC: <input type="number" id="a_PcPrice" name="a_PcPrice" value="<?php echo $a_PcPrice ?>">
        <font color="red"><?php echo $a_PcPriceErr ?></font><br>
        <input type="submit" name="a_submit" value="Find">
      </form>
      <button onclick="clearElement('a_div')">Clear Output</button>
      <div id="a_div">
        <?php echo $a_out; ?>
      </div>
    </div>

    <div id="b" class="tabcontent">
      <h3>Part (b)</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Speed: <input type="number" step="0.01" id="b_LaptopSpeed" name="b_LaptopSpeed" value="<?php echo $b_LaptopSpeed ?>">
        <font color="red"><?php echo $b_LaptopSpeedErr ?></font><br>
        RAM: <input type="number" id="b_LaptopRAM" name="b_LaptopRAM" value="<?php echo $b_LaptopRAM ?>">
        <font color="red"><?php echo $b_LaptopRAMErr ?></font><br>
        HD: <input type="number" id="b_LaptopHD" name="b_LaptopHD" value="<?php echo $b_LaptopHD ?>">
        <font color="red"><?php echo $b_LaptopHDErr ?></font><br>
        Weight: <input type="number" step="0.01" id="b_LaptopWeight" name="b_LaptopWeight" value="<?php echo $b_LaptopWeight ?>">
        <font color="red"><?php echo $b_LaptopWeightErr ?></font><br>
        <input type="submit" name="b_submit" value="Find">
      </form>
      <button onclick="clearElement('b_div')">Clear Output</button>
      <div id="b_div">
        <?php echo $b_out; ?>
      </div>
    </div>

    <div id="c" class="tabcontent">
      <h3>Part (c)</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Manufacturer: <input type="text" id="c_Manufacturer" name="c_Manufacturer" value="<?php echo $c_Manufacturer ?>">
        <font color="red"><?php echo $c_ManufacturerErr ?></font><br><br>
        <input type="submit" name="c_submit" value="Find">
      </form>
      <button onclick="clearElement('c_div')">Clear Output</button>
      <div id="c_div">
        <?php echo $c_out; ?>
      </div>
    </div>

    <div id="d" class="tabcontent">
      <h3>Part (d)</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Manufacturer: <input type="text" id="d_Manufacturer" name="d_Manufacturer" value="<?php echo $d_Manufacturer ?>">
        <font color="red"><?php echo $d_ManufacturerErr ?></font><br>
        Model: <input type="number" id="d_Model" name="d_Model" value="<?php echo $d_Model ?>">
        <font color="red"><?php echo $d_ModelErr ?></font><br>
        Speed: <input type="number" step="0.01" id="d_Speed" name="d_Speed" value="<?php echo $d_Speed ?>">
        <font color="red"><?php echo $d_SpeedErr ?></font><br>
        Ram: <input type="number" id="d_Ram" name="d_Ram" value="<?php echo $d_Ram ?>">
        <font color="red"><?php echo $d_RamErr ?></font><br>
        HD Size: <input type="number" id="d_HD" name="d_HD" value="<?php echo $d_HD ?>">
        <font color="red"><?php echo $d_HDErr ?></font><br>
        Price: <input type="number" id="d_Price" name="d_Price" value="<?php echo $d_Price ?>">
        <font color="red"><?php echo $d_PriceErr ?></font><br>
        <input type="submit" name="d_submit" value="Insert">
      </form>
      <button onclick="clearElement('d_div')">Clear Output</button>
      <div id="d_div">
        <?php echo $d_out; ?>
      </div>
    </div>

    <div id="e" class="tabcontent">
      <h3>Part (e)</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        Budget: <input type="text" id="e_Budget" name="e_Budget" value="<?php echo $e_Budget ?>">
        <font color="red"><?php echo $e_BudgetErr ?></font><br>
        Speed: <input type="number" step="0.01" id="e_Speed" name="e_Speed" value="<?php echo $e_Speed ?>">
        <font color="red"><?php echo $e_SpeedErr ?></font><br>
        <input type="submit" name="e_submit" value="Find">
      </form>
      <!-- <button onclick="clearElement('e_div')">Clear Output</button> -->
      <div id="e_div">
        <?php echo $e_out; ?>
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

    
    <?php 
      mysqli_close($conn);
    ?>
  </body>
</html>