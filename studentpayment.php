<?php

include "db_conn.php";

if (isset($_POST['submit']))
{	
			$studentnumber=$_POST['studentnumber'];
			$Fname=$_POST['Fname'];
			$Lname=$_POST['Lname'];
			$DOP=$_POST['DOP'];
			$ORNUMBER=$_POST['ORNUMBER'];
			$Receipt=$_POST['Receipt'];






			
			
			
			


			mysqli_query($conn,"INSERT into payment_tbl(studentnumber,Fname,Lname,DOP,ORNUMBER,Receipt) VALUES('$studentnumber','$Fname','$Lname','$DOP','$ORNUMBER','$Receipt')") or die(mysqli_error($openconnection));
			header("Location: userstudentlist.php");
				exit();
}

		?>