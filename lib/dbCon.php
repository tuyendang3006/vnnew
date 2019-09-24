<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "vnnew");

// $con = mysqli_connect("sql213.byethost7.com", "b7_24537340", "tuyen1994");
// mysqli_select_db($con, "b7_24537340_jd");
mysqli_query($con, "SET NAMES 'utf8' ");
?>