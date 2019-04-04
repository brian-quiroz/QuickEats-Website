
<?php
  //Connect to our database "r229q057" and throw an error if the connection failed.
    $mysqli = new mysqli("mysql.eecs.ku.edu", "r229q057", "yuF4cuNa", "r229q057");

    //Checking connection:
    if ($mysqli->connect_errno) {
      echo "Connect failed: %s\n", $mysqli->connect_error;
      exit();
    }
