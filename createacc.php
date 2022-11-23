<?php

include "db_conn.php";

if (isset($_POST['submit_acc']))
{	
			
			$user_name=$_POST['user_name'];
			$password=$_POST['password'];
			$name=$_POST['name'];
			$studentnum=$_POST['studentnum'];
			$sy=$_POST['sy'];
			$status=$_POST['status'];
			$course=$_POST['course'];
			$yearlvl=$_POST['yearlvl'];
			$section=$_POST['section'];		
			$semester=$_POST['semester'];
			

			

			mysqli_query($conn,"INSERT into users(user_name,password,name,studentnum,sy,status,course,yearlvl,section,semester) VALUES('$user_name','$password','$name','$studentnum','$sy','$status','$course','$yearlvl','$section','$semester')") or die(mysqli_error($openconnection));
			header("Location: add.php");
				exit();
}

		?>