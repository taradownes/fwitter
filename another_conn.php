<?php


session_start();
function OpenCon(){

  DEFINE('DB_USER', 'root');
  DEFINE('DB_PASSWORD', 'password');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_NAME', 'ajax_practice');
  
  
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  OR die('Could not connect to database ');

  return $conn;
  
}

function CloseCon($conn){
  $conn -> close();
}

// $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
// OR die('Could not connect to database ' . mysqli_connect_error());



  // $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  // OR die('Could not connect to database ');
?>