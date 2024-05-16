<?php

  $hostName = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "diamondstore";

  $dbConnection = mysqli_connect($hostName,$userName,$password,$dbName);
  if (!$dbConnection) {
    die(mysqli_error($dbConnection));
  }
