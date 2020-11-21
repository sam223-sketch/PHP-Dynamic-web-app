<?php

  // database details
  $servername = "localhost";
  $username = "sqluser";
  $password = "raskhern223";
  $dbname = "notes";

  //  Create Database connection
  $dbconnection = mysqli_connect($servername, $username, $password, $dbname);

  // test database connection
  if (!$dbconnection){
    die("Connection failed" . mysqli_connect_error());
  }

?>
