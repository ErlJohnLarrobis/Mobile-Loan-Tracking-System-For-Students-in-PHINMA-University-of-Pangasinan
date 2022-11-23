<?php

$sname= "localhost";
$uname= "root";
$password = "";

$db_name= "test_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed";
}

if (isset($_POST['submit_data']))
{	
			
			$school_lvl=$_POST['school_lvl'];
			$school_cat=$_POST['school_cat'];
			$FirstName=$_POST['FirstName'];
			$LastName=$_POST['LastName'];
			$IDNum=$_POST['IDNum'];
			$Campus=$_POST['Campus'];
			$YearLevel=$_POST['YearLevel'];
			$Course=$_POST['Course'];
			$ActiveNum=$_POST['ActiveNum'];		
			$Email=$_POST['Email'];
			$Guardian_Name=$_POST['Guardian_Name'];
			$Relationship=$_POST['Relationship'];
			$Guardian_Num=$_POST['Guardian_Num'];
			$Guardian_Occupation=$_POST['Guardian_Occupation'];
			$Amount_Due=$_POST['Amount_Due'];
			$Partial_Payment=$_POST['Partial_Payment'];
			$ReceiptPartial_Payment=$_POST['ReceiptPartial_Payment'];
			$Date_PartialPayment=$_POST['Date_PartialPayment'];
			$Reason_Application=$_POST['Reason_Application'];
			$Promissory_Note=$_POST['Promissory_Note'];
			$ORF=$_POST['ORF'];
			$Valid_ID=$_POST['Valid_ID'];
			
			$Fname=$_POST['Fname'];
			

			$balance= $Amount_Due-$Partial_Payment;
			

			

			
			
			
			


			mysqli_query($conn,"INSERT into applicationform_tbl(school_lvl,school_cat,FirstName,LastName,IDNum,Campus,YearLevel,Course,ActiveNum,Email,Guardian_Name,Relationship,Guardian_Num,Guardian_Occupation,Amount_Due,Partial_Payment,ReceiptPartial_Payment,Date_PartialPayment,Reason_Application,Promissory_Note,ORF,Valid_ID,balance,Fname) VALUES('$school_lvl','$school_cat','$FirstName','$LastName','$IDNum','$Campus','$YearLevel','$Course','$ActiveNum','$Email','$Guardian_Name','$Relationship','$Guardian_Num','$Guardian_Occupation','$Amount_Due','$Partial_Payment','$ReceiptPartial_Payment','$Date_PartialPayment','$Reason_Application','$Promissory_Note','$ORF','$Valid_ID','$balance','$Fname')") or die(mysqli_error($openconnection));
			header("Location: userappform.php");
				exit();

}

		?>