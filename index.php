<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CSE305 Final Project</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <?php 
      include 'include/dbConn.php';
    ?>
  </head>
  <body>
    index.php is working!<br>
    <?php 
      echo "echo from php is working!<br>Testing!";

      
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

      
      $sql = "SELECT * FROM playground_tests";
      $query = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
      while( $row = mysqli_fetch_array($query)) {
        echo "<br>" . $row['content'] . "<br>";
        foreach($row as $cname => $cvalue){
          print "$cname: $cvalue\t";
        }
      }
      
    ?>



    <?php include 'include/EndDbConn.php';?>
  </body>
</html>