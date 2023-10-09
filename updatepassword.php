<?php 
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:login.php');
 }
 include 'functions/database.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Board|For Job Seekers and Employers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>
    <?php include 'includes/navigation.php';?> 
	  <div class="container-fluid bg-light py-4">
	    <div class="row">
		 <div class="col-md-12 text-center">
		    <h4 style="text-transform:uppercase;font-weight:bold;">Change Your Password</h4>
			<h4>You can only post jobs after you become a member</h4>
		 </div>
		</div>
		<div class="row my-5">
		 <div class="col-md-6 mx-auto">
		     <div class="card card-body shadow border border-dark">
			    <div class="my-2">
				<?php include 'functions/updatepassword.php';?>
				</div>
			   <form action="updatepassword.php" method="post">
				 <div class="my-3">
				 <label for="email">Current Email Address</label>
				 <div class="input-group">
				    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
					<input type="text" name="email" class="form-control border border-dark" placeholder="Current Email Address"/>
				 </div>
				</div>
				 
				<div class="my-3">
				 <label for="username">New Password</label>
				 <div class="input-group">
				    <span class="input-group-text"><i class="bi bi-lock"></i></span>
					<input type="password" name="password" class="form-control border border-dark" placeholder="New Password"/>
				 </div>
				</div>
				<div class="my-2">
				 <button type="submit" name="submit" class="btn btn-lg btn-outline-primary">Save New Password Now</button>
				</div>
			   </form>
			 </div>
		 </div>
		</div>
	  </div>
      <?php include 'includes/footer.php'; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>