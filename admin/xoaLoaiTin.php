<?php 
ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"]!=1 ){
	header("localtion:../index.php");
	}
	
require "../lib/dbCon.php";
require "../lib/quantri.php";
?>

<?php 
$idLT = $_GET["idLT"];
settype($idLT, "int");
$qr = "
	DELETE FROM loaitin
	WHERE idLT='$idLT'
";
$con = mysqli_connect("localhost", "root", "", "vnnew");
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con, $qr);
header("location:listLoaiTin.php");

?>