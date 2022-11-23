
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
  <title>Student Loan List</title>
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
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold text-white">Loaney</a>
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
          <li class="btn-warning">
            <a href="#" class="nav-link px-3">
              <span class="me-2 text-dark"><i class="bi bi-person-fill"></i></span>
              <span class="text-dark">Loan History</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <a href="userappform.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-file-earmark-plus-fill"></i></span>
              <span>Application Form</span>
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
                  <a href="userchangepass.php" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-chevron-double-right"></i></span>
                    <span>Change Password</span>
                  </a>
                </li>
                <li>
                  <a href="index.php" class="nav-link px-3">
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
              <span><i class="bi bi-file-person-fill"></i></span> Account
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped" style="width: 100%">
                  <div class="widget-body">
                    <div class="row">
                      <div class="col-sm-1">Name</div>
                      <div class="col-sm-5 text-primary">: <b><?php echo $_SESSION['name'];?></b></div>
                      <div class="col-sm-1">Student #</div>
                      <div class="col-sm-5 text-primary">: <b><?php echo $_SESSION['studentnum'];?></b></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-1">Course</div>
                      <div class="col-sm-5 text-primary">: <?php echo $_SESSION['course'];?></div>
                      <div class="col-sm-1">Year Level</div>
                      <div class="col-sm-5 text-primary">: <?php echo $_SESSION['yearlvl'];?></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-1">Status</div>
                      <div class="col-sm-5 text-primary">: <?php echo $_SESSION['status'];?>
                      </div>
                      <div class="col-sm-1">Section</div>

                      <div class="col-sm-5 text-primary">: <span id="student_parent_section"><?php echo $_SESSION['section'];?></span></div>


                    </div>

                    <div class="row">
                      <div class="col-sm-1">SY</div>
                      <div class="col-sm-5 text-primary">: <?php echo $_SESSION['sy'];?></div>
                      <div class="col-sm-1">Semester</div>
                      <div class="col-sm-5 text-primary">: <?php echo $_SESSION['semester'];?></div>
                    </div>
                  </div>
                  <thead>
                    <hr>
                    <hr>
                    <tr>
                      <th>Student Number</th>
                      <th>Student Name</th>
                      <th>Amount Loaned</th>
                      <th>Date Loaned</th>
                      <th>Partial Payment</th>
                      <th>Partial Payment's Date</th>
                      <th>Balance</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      
                      <?php $sql = 'SELECT * FROM approve_tbl WHERE student_num="'.$_SESSION['studentnum'].'"';
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    
                      while ($row = mysqli_fetch_array($result)): {
                        
                      
                    }?>
                            
                          
                      
                      <td><?php echo $row['student_num'];?></td>
                      <td><?php echo $row['fullname'];?></td>
                      <td>₱<?php echo $row['Amount_loan'];?></td>
                      <td><?php echo $row['date_loan'];?></td>
                      <td>₱<?php echo $row['partial'];?></td>
                      <td><?php echo $row['date_loan'];?></td>
                      <td>₱<?php echo $row['Balance'];?></td>
                      <td><?php echo 'Approved'?></td>

                     
                    </tr>
                    <?php endwhile;?>
                  </tbody>
                  </form>

                  <thead>
                    <tr>
                      <th>Student Number</th>
                      <th>Student Name</th>
                      <th>Amount Loaned</th>
                      <th>Date Loaned</th>
                      <th>Partial Payment</th>
                      <th>Partial Payment's Date</th>
                      <th>Balance</th>
                      <th>Status</th>
                    </tr>

                  </thead>
                </form>
                </table>
              </div>
            </div>
          </div>
          <br>
          <form class="form-login" action="studentpayment.php" method="post">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-credit-card"></i></span> Payment
              </div><br>
              <div class="input-group mb-3 px-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Student Number</span>
                <textarea style="resize: none; height: 10px;" name="studentnumber" class="form-control" id="floatingTextarea"></textarea>
              </div>
              <div class="input-group mb-3 px-3">
                <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
                <textarea style="resize: none; height: 10px;" name="Fname" class="form-control" id="floatingTextarea"></textarea>
              </div>
              <div class="input-group mb-3 px-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                <textarea style="resize: none; height: 10px;" name="Lname" class="form-control" id="floatingTextarea"></textarea>
              </div>
              <div class="input-group mb-3">
                  <span class="input-group-text" id="inputGroup-sizing-default">Date of  Payment</span>
                  <input type="date" name="DOP" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
              <div class="input-group mb-3 px-3">
                <span class="input-group-text" id="inputGroup-sizing-default">OR number</span>
                <textarea style="resize: none; height: 10px;" name="ORNUMBER" class="form-control" id="floatingTextarea"></textarea>
              </div>
              <div class="mb-3 px-3">
                <label for="formFileSm" class="form-label">Upload Receipt:</label>
                <input class="form-control form-control-sm" name="Receipt" id="formFileSm" type="file">
              </div>
               <hr>
               <div class="mb-3 px-3">
                  <article>
                    PERSONAL DATA CONSENT:<br> By accomplishing this Student Information Form, the student and her/his parents or guardian <br>(1) certify that the information provided are true and complete, <br>(2) acknowledge that the confidentiality of information is protected by the Data Privacy Act of 2012 (R.A. 10173), and <br>(3) authorize the release of any and all academic, financial, and any other information that may be requested by the government for regulatory purposes or affiliates of the school to aid the school in achieving its purposes. The information will be available to the school until such time the consent is revoked in writing. <br>
                  </article>
                  <br>
                    
                <br>
                </div>
                <hr>
              <div class="text-center">
                <button type="submit" class="btn btn-success" name="submit" >Submit</button>
              </div>
            </div>
          </form>
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