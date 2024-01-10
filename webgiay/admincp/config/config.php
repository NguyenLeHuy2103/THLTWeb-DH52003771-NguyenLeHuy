<?php
$mysqli = new mysqli("localhost","root","","web_huy");

// Check connection
if ($mysqli -> connect_errno) 
{ 
  echo "ket noi MYSQLi loi! " . $mysqli -> connect_error;
  exit();
}
