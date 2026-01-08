<?php
$conn = mysqli_connect("localhost","root","","PU");

if(!$conn){
    die("DB Error: " . mysqli_connect_error());
}
echo "Database Connected Successfully";
?>
