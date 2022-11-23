
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mobile Loan Tracker</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<div class="title">
    <h1>Mobile Loan Tracking System For Students in<br>PHINMA University of Pangasinan</h1>
  	</div>
	<div>
		<form class="form-login" action="adminacc.php" method="post">
		<?php if (isset($_GET['error'])) { ?>
			<p class="error" style="background: #F2DEDE; color: #A94442; padding: 10px; width: 100%; border-radius: 5px;"><?php echo $_GET['error']; ?></p>
		<?php } ?>

		
  		<div class="mb-3">
    		<label for="exampleInputEmail1" class="form-label">Username</label>
    		<input type="text" class="form-control" name="uname" id="exampleInputEmail1">
  		</div>
  		<div class="mb-3">
    		<label for="exampleInputPassword1" class="form-label">Password</label>
    		<input type="password" class="form-control" name="password" id="exampleInputPassword1">
  		</div>
  		<div class="mb-3">
    		<div class="g-recaptcha" data-sitekey="6Lc9oWAeAAAAAA_ZNUQowneWsp-FafADz1ILAh8V"></div>
  		</div>
  			<br><button type="submit"  class="btn btn-primary">LOGIN</button><br> <br>
  		
		</form>

  			
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
