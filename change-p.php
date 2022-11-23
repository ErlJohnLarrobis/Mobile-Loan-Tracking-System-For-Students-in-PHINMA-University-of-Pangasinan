<?php
include "db_conn.php";

session_start();

if(isset($_POST['change'])){

	
	$op	= $_POST['op'];
	$np= $_POST['np'];
	$c_np= $_POST['c_np'];

$query= mysqli_query($conn,"SELECT user_name,password from users where user_name= '$uname' AND password = '$op'");
$num = mysqli_fetch_array($query);

if($num>0){

	$con = mysqli_query($conn,"UPDATE users set password ='$c_np'");
	$_SESSION['msg1'] = "Password Change Successfully";
}else{
	$_SESSION['msg1'] = "Password does not match";
}




}

?>