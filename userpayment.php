<?php
include "db_conn.php";

if(isset($_POST['Update'])){

	
	$fee = $_POST['fee'];
	$partialdate= $_POST['partialdate'];
	$id = $_POST['id'];
	$student_num = $_POST['student_num'];
	$Amount_loan = $_POST['Amount_loan'];
	$date_loan = $_POST['date_loan'];
	$partial = $_POST['partial'];
	$Balance = $_POST['Balance'];
	$fullname = $_POST['fullname'];
	


	
	$update_record = "UPDATE approve_tbl SET student_num = '$student_num', Amount_loan = '$Amount_loan',date_loan = '$date_loan',partial = ('$partial' + '$fee'), Balance = ('$Balance' - '$fee'), fullname = '$fullname',partialdate = '$partialdate' ,fee = '$fee' WHERE id ='$id' ";

	$query = mysqli_query($conn, $update_record);
    if($query){
      
    }
    else{
      echo "Error: " . $update_record . "<br>" . mysqli_error($conn);
    }
    header("Location: studentlist.php");
				exit();

}
?>