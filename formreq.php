<?php
session_start();
include "db_conn.php";
include "approve.php";
$var_value = $_GET['varname'];
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
          <button type="button" class="btn btn-warning"><?php echo $_SESSION['name']; ?></button>
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
          <li class="btn-warning">
            <a href="notif.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-file-earmark-plus-fill"></i></span>
              <span class="text-dark">Notifications</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>

          <li>
            <a href="appform.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-file-earmark-plus-fill"></i></span>
              <span>Application Form</span>
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
          <button type="button" class="btn btn-warning" onclick="window.location.href='notif.php';"><i class="bi bi-backspace-fill"></i> Go Back</button><br>
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-info-circle-fill"></i></span> Request Form
            </div>
            <div class="card-body">
              <form action="approve.php" method="GET">
                <p class="text-center" style="color: blue;">Student Profile</p>
                <hr>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Specify if you are under</span>
                  <select class="form-select" aria-label="Default select example" disabled>
                    <option selected style="color: gray;"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['school_lvl'];
                      }
                    }?></option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Specify if you are</span>
                  <select class="form-select" aria-label="Default select example" disabled>
                    <option selected style="color: gray;"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['school_cat'];
                      }
                    }?> </option>

                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['FirstName'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['LastName'];
                      }
                    }?></textarea>
                </div>

                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">ID Number</span>
                  <input type="hidden" name="student_num" value="<?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['IDNum'];
                      }
                    }?> " class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> 

                  <textarea style="resize: none; height: 10px;"  class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['IDNum'];
                      }
                    }?>

                      
                    </textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Campus</span>
                  <select class="form-select" aria-label="Default select example" disabled >
                    <option selected style="color: gray;"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Campus'];
                      }
                    }?></option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Grade/Year Level</span>
                  <select class="form-select" aria-label="Default select example" disabled>
                    <option selected style="color: gray;"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['YearLevel'];
                      }
                    }?></option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Strand/Course</span>
                  <select class="form-select" aria-label="Default select example" disabled>
                    <option selected style="color: gray;"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Course'];
                      }
                    }?></option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Full Name</span>
                  <input type="hidden" name="fullname" value="<?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Fname'];
                      }
                    }?> " class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

               
                  <textarea style="resize: none; height: 10px;"  class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Fname'];
                      }
                    }?></textarea>

                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Active Contact Number</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['ActiveNum'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Email'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Parent/Guardian's Name</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Guardian_Name'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Relationship to Guardian</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Relationship'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Parent/Guardian's Contact Number</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Guardian_Num'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Parent/Guardian's Occupation/s</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Guardian_Occupation'];
                      }
                    }?></textarea>
                </div>
                <hr>
                <p class="text-center" style="color: blue;">Loan Details</p>
                <hr>
                <div class="input-group mb-3">

                  <span class="input-group-text" id="inputGroup-sizing-default">Amount Due</span>
                  <input type="hidden" name="Amount_loan" value="<?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Amount_Due'];
                      }
                    }?> " class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> 
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Amount_Due'];
                      }
                    }?></textarea>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Partial Payment (if any)</span>
                  <input type="hidden" name="partial" value="<?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Partial_Payment'];
                      }
                    }?> " class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> 
                  <textarea style="resize: none; height: 10px;"  class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Partial_Payment'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Official Receipt Number of Partial Payment(if any)</span>
                  <textarea style="resize: none; height: 10px;" class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['ReceiptPartial_Payment'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Date of Partial Payment(if any)</span>
                  <input type="hidden" name="date_loan" value="<?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Date_PartialPayment'];
                      }
                    }?> " class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> 
                  <textarea style="resize: none; height: 10px;"  class="form-control" id="floatingTextarea" disabled><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Date_PartialPayment'];
                      }
                    }?></textarea>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Reason for Application</span>
                  <select class="form-select" aria-label="Default select example" disabled>
                    <option selected style="color: gray;"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Reason_Application'];
                      }
                    }?></option>
                  </select>
                </div>
                <hr>
                <p class="text-center" style="color: blue;">Requirements</p>
                <hr>
                <div class="mb-3">
                  <label><strong>Promissory Note:</strong>
                  </label>
                  <a href="files/Formal_Letter.jpg" target="_blank"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Promissory_Note'];
                      }
                    }?></a>
                </div>
                <div class="mb-3">
                  <label><strong>Student ID/Official Registration Form(ORF):</strong></label>
                  <a href="files/ID.jpg" target="_blank"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['ORF'];
                      }
                    }?></a>
                </div>
                <div class="mb-3">
                  <label><strong>Valid ID of Parent/s or Guardian/s:</strong></label>
                  <a href="files/Valid ID.jpg" target="_blank"><?php $sql = 'SELECT * FROM applicationform_tbl WHERE IDNum="'.$var_value.'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Valid_ID'];
                      }
                    }?></a>
                </div>
                
                  
                  <input type="hidden" name="approve" value="Approved" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                
                <hr>
                <div class="text-center">

                  <button type="submit" class="btn btn-success"  name="approve" > APPROVE</button>

                </div >

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