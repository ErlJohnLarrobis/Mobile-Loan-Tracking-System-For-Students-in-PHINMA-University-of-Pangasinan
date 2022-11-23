<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://kit.fontawesome.com/d1ed8a4f3c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="popup.css">
  <title>Fill Up Application Form</title>
</head>

<body onload="startTime()">
  <script>
    function startTime() {
      const today = new Date();
      let h = today.getHours();
      let m = today.getMinutes();
      let s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
      setTimeout(startTime, 1000);
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i
      };
      return i;
    }
  </script>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#003d13;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold text-white">Application form</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        <form class="d-flex ms-auto my-3 my-lg-0">
          <button type="button" class="btn btn-warning"><?php echo $_SESSION['name'];?></button>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a>
              <i class="fas fa-user-circle fa-2x" style="padding-left: 5px ;color: gray;"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="offcanvas offcanvas-start sidebar-nav" style="background-color: #003d13;" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <a href="#" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-menu-button-wide-fill"></i></span>
              <span>Menu</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <a href="studentlist.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-person-fill"></i></span>
              <span>Loanee</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <a href="notif.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-file-earmark-plus-fill"></i></span>
              <span>Notifications</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li class="btn-warning">
            <a href="appform.php" class="nav-link px-3">
              <span class="me-2 text-dark"><i class="bi bi-file-earmark-plus-fill"></i></span>
              <span class="text-dark">Application Form</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <a href="add.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-file-earmark-plus-fill"></i></span>
              <span>Add Loanee</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
              <span class="me-2"><i class="bi bi-gear-fill"></i></span>
              <span>My Account</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="changepass.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-chevron-double-right"></i></span>
                    <span>Change Password</span>
                  </a>
                </li>
                <li>
                  <a href="adminlogin.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-chevron-double-right"></i></span>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <div id="txt" style="margin: auto; color: white; padding-top: 100px;">

          </div>
        </ul>
      </nav>
    </div>
  </div>
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-pen-fill"></i></span> Fill Up Form
            </div>
            <div class="card-body">
              <form action="" method="post">
                <hr>
                <p class="text-center" style="color: blue;">Student Profile</p>
                <hr>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Specify if you are under</span>
                  <select class="form-select" aria-label="Default select example" name="school_lvl">
                    <option selected style="color: gray;">Choose Below:</option>
                    <option value="Senior High School">Senior High School</option>
                    <option value="Tertiary Level (College)">Tertiary Level (College)</option>
                    <option value="Grad School">Grad School</option>
                    <option value="Law School">Law School</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Specify if you are</span>
                  <select class="form-select" aria-label="Default select example" name="school_cat">
                    <option selected style="color: gray;">Choose Below:</option>
                    <option value="SHS Student">SHS Student</option>
                    <option value="TES">TES</option>
                    <option value="NON-TES">NON-TES</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                  <input type="text" name="FirstName"class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                  <input type="text" name="LastName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">ID Num</span>
                  <input type="text" name="IDNum" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Campus</span>
                  <select class="form-select" aria-label="Default select example" name="Campus">
                    <option selected style="color: gray;">Choose Below:</option>
                    <option value="PHINMA UPang Dagupan">PHINMA UPang Dagupan</option>
                    <option value="PHINMA Urdaneta">PHINMA Urdaneta</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Grade/Year Level</span>
                  <select class="form-select" aria-label="Default select example" name="YearLevel">
                    <option selected style="color: gray;">Choose Below:</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value=">Grade 12">Grade 12</option>
                    <option value="First Year College">First Year College</option>
                    <option value="Second Year College">Second Year College</option>
                    <option value="Third Year College">Third Year College</option>
                    <option value="Fourth Year College">Fourth Year College</option>
                    <option value="Fifth Year College">Fifth Year College</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Strand/Course</span>
                  <select class="form-select" aria-label="Default select example" name="Course">
                    <option selected style="color: gray;">Choose Below:</option>
                    <option value="GAS(General academic strand)">GAS(General academic strand)</option>
                    <option value="TVL(Technical Vocational Livelihood)">TVL(Technical Vocational Livelihood)</option>
                    <option value="HUMMS(Humanities and social sciences)">HUMMS(Humanities and social sciences)</option>
                    <option value="STEM(Science, technology, engineering, and mathematics)">STEM(Science, technology, engineering, and mathematics)</option>
                    <option value="ABM(Accountancy, business, and and management)">ABM(Accountancy, business, and and management)</option>
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                    <option value="Bachelor of Science in Architecture">Bachelor of Science in Architecture</option>
                    <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                    <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                    <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
                    <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
                    <option value="Bachelor of Science in Mechanical Engineering : PERMIT LEVEL">Bachelor of Science in Mechanical Engineering : PERMIT LEVEL</option>
                    <option value="Bachelor of Arts in Communication">Bachelor of Arts in Communication</option>
                    <option value="Bachelor of Arts in Political Science">Bachelor of Arts in Political Science</option>
                    <option value=">Bachelor of Education">Bachelor of Education</option>
                    <option value="Bachelor of Education major in Pre-School Education">Bachelor of Education major in Pre-School Education</option>
                    <option value="Bachelor of Secondary Education major in Biological Science">Bachelor of Secondary Education major in Biological Science</option>
                    <option value="Bachelor of Secondary Education major in English">Bachelor of Secondary Education major in English</option>
                    <option value="Bachelor of Secondary Education major in Mathematics">Bachelor of Secondary Education major in Mathematics</option>
                    <option value="Bachelor of Science in Criminology">Bachelor of Science in Criminology</option>
                    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    <option value="Bachelor of Science in Accounting Technology">Bachelor of Science in Accounting Technology</option>
                    <option value="Bachelor of Science in Business Administration major in Financial Management">Bachelor of Science in Business Administration major in Financial Management</option>
                    <option value="Bachelor of Science in Business Administration major in Marketing Management">Bachelor of Science in Business Administration major in Marketing Management</option>
                    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                    <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
                    <option value="Bachelor in Medical Laboratory Science">Bachelor in Medical Laboratory Science</option>
                    <option value="Bachelor of Science in Physical Therapy">Bachelor of Science in Physical Therapy</option>
                    <option value="Bachelor of Science in Pharmacy : PERMIT LEVEL">Bachelor of Science in Pharmacy : PERMIT LEVEL</option>
                    <option value="Diploma in Midwifery">Diploma in Midwifery</option>
                    <option value="Bachelor of Science in Midwifery">Bachelor of Science in Midwifery</option>
                  </select>
                  
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Full Name</span>
                  <input type="text" name="Fname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Active Contact Number</span>
                  <input type="text" name="ActiveNum" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                  <input type="text" name="Email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Parent/Guardian's Name</span>
                  <input type="text" name="Guardian_Name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Relationship to Guardian</span>
                  <input type="text" name="Relationship" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Parent/Guardian's Contact Number</span>
                  <input type="text" name="Guardian_Num" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Parent/Guardian's Occupation/s</span>
                  <input type="text" name="Guardian_Occupation" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <hr>
                <p class="text-center" style="color: blue;">Loan Details</p>
                <hr>
                <label>(Kindly provide the amount appearing in your AIMS Portal)</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Amount Due</span>
                  <input type="text" name="Amount_Due" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Partial Payment (if any)</span>
                  <input type="text" name="Partial_Payment" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Official Receipt Number of Partial Payment(if any)</span>
                  <input type="text" name="ReceiptPartial_Payment" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Date of Partial Payment(if any)</span>
                  <input type="date" name="Date_PartialPayment" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Reason for Application</span>
                  <select class="form-select" name="Reason_Application" aria-label="Default select example">
                    <option selected style="color: gray;">Choose Below:</option>
                    <option value="Delayed Remittance">Delayed Remittance</option>
                    <option value="Loss of Job">Loss of Job</option>
                    <option value="Sickness/Death in the family">Sickness/Death in the family</option>
                    <option value="Delayed Salary">Delayed Salary</option>
                  </select>
                </div>
                <hr>
                <p class="text-center" style="color: blue;">Requirements</p>
                <hr>
                <div class="mb-3">
                  <label><strong>Promissory Note</strong><br>
                    Kindly indicate the following:<br>
                    (1)reason/s for applying<br>
                    (2)ammount to be loaned<br>
                    (3)date to pay your loan, along with<br>
                    (4)your and your parents/guardian's signature.
                  </label>
                  <input name="Promissory_Note" class="form-control" type="file" id="formFile">

                
                  <label><strong>Student ID/Official Registration Form(ORF)</strong></label>
                  <input name="ORF" class="form-control" type="file" id="formFile">
                
                
                  <label><strong>Valid ID of Parent/s or Guardian/s</strong></label>
                  <input name="Valid_ID" class="form-control" type="file" id="formFile">
                </div>
                <hr>
                <article>
                  PERSONAL DATA CONSENT:<br> By accomplishing this Student Information Form, the student and her/his parents or guardian <br>(1) certify that the information provided are true and complete, <br>(2) acknowledge that the confidentiality of information is protected by the Data Privacy Act of 2012 (R.A. 10173), and <br>(3) authorize the release of any and all academic, financial, and any other information that may be requested by the government for regulatory purposes or affiliates of the school to aid the school in achieving its purposes. The information will be available to the school until such time the consent is revoked in writing. <br>
                </article>
                <br><br>
                
                <br>
                <hr>
                <div class="text-center">
                  <a href="userappform.php"><button type="submit" class="btn btn-success" name="submit_data" >Submit</button></a> 
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>
<?php
}else{

}
?>