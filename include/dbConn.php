<?php
  $dbhost = "us-cdbr-east-06.cleardb.net";
  $dbuser = "b2b72fbf85a330";
  $dbpass = "81dc8793";
  $db = "heroku_6c43a54853056c9";
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
  
  if ( $conn->connect_error) {
    die("Connect failed: %s\n". $conn->connect_error);
  }
?>