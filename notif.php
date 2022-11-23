<?php
session_start();
include "db_conn.php";
include "studentpayment.php";
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
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold text-white">Notification</a>
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
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-bell-fill"></i></span> Loan Request
            </div>
            <div class="card-body">
              <?php $sql = "SELECT * FROM applicationform_tbl;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    
                      while ($row = mysqli_fetch_array($result)): {
                        
                      
                    }?>
                    

                    
              <div class="list-group">
                
                <td><b>Submission Date:&nbsp;&nbsp;<?php echo $row['Date_PartialPayment'];?></b></td>
                <form method="get" action="formreq.php">
                
                  
    <input type="hidden" name="varname" value=<?php echo $row['IDNum'];?>>
    <input type="submit" class="list-group-item list-group-item-action list-group-item-success" value=<?php echo $row['IDNum'];?>&nbsp;&nbsp;&nbsp;<?php echo $row['LastName'];?>,&nbsp;&nbsp;<?php echo $row['FirstName'];?>><br><br>
</form>
                
            </div>
          <?php endwhile;?>
          </div>
          <br>
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-credit-card-2-back-fill"></i></span> Payments
            </div>
            <div class="card-body">
              <?php $sql = "SELECT * FROM payment_tbl;";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);

                    
                      while ($row = mysqli_fetch_array($result)): {
                        
                      
                    }?>
              <div class="list-group">
                 <td><b>Payment Date:&nbsp;&nbsp;<?php echo $row['DOP'];?></b></td>
                <form method="get" action="payment.php">
                
                  
    <input type="hidden" name="Fnames" value=<?php echo $row['Lname'];?>>
    <input type="submit" class="list-group-item list-group-item-action list-group-item-success" value=<?php echo $row['studentnumber'];?>&nbsp;&nbsp;<?php echo $row['Lname'];?>,&nbsp;<?php echo $row['Fname'];?>&nbsp;&nbsp;><br><br>
</form>
              </div>
              <?php endwhile;?>
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