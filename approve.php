<?php

include "db_conn.php";

if (isset($_GET['approve']))
{	
			
			$student_num=$_GET['student_num'];
			$fullname=$_GET['fullname'];
			$Amount_loan=$_GET['Amount_loan'];
			$partial=$_GET['partial'];
			$date_loan=$_GET['date_loan'];	
			$Balance= $Amount_loan-$partial;






			
			
			
			


			mysqli_query($conn,"INSERT into approve_tbl(student_num,fullname,Amount_loan,partial,date_loan,Balance) VALUES('$student_num','$fullname','$Amount_loan','$partial','$date_loan','$Balance')") or die(mysqli_error($openconnection));

			header("Location: studentlist.php");
				exit();	
}


		?>
