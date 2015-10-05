<?php
  define("DB_SERVER", "localhost");
  define("DB_USER", "pbp11_pbp11");
  define("DB_PASS", "yeye11");
  define("DB_NAME", "pbp11_widget_corp");
  
 //1. Create a database connection
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
// Test if connection occurred.
if(mysqli_connect_errno()) {
  die("Database connection failed: " .
       mysqli_connect_error() .
	   " (" . mysqli_connect_errno() . ")"
	   );
	 }
	 
?>