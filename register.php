<?php 
  session_start();
  if(isset($_SESSION['id'])){
    header('Location:account.php');
 }
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
		    <h4 style="text-transform:uppercase;font-weight:bold;">Register To Create An Account</h4>
			<h4>You can only post jobs after you become a member</h4>
		 </div>
		</div>
		<div class="row my-5">
		 <div class="col-md-6 mx-auto">
		     <div class="card card-body shadow border border-dark">
			    <div class="my-2">
				<?php include 'functions/register.php';?>
				</div>
			   <form action="register.php" method="post" id="myform">
			    <div class="my-3">
				 <label for="name">Full Name</label>
				 <div class="input-group">
				    <span class="input-group-text"><i class="bi bi-person"></i></span>
					<input type="text" name="name" class="form-control border border-dark" placeholder="Full name"/>
				 </div>
				</div>
				 <div class="my-3">
				 <label for="email">Email address</label>
				 <div class="input-group">
				    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
					<input type="text" name="email" class="form-control border border-dark" placeholder="Email address"/>
				 </div>
				</div>
				<div class="my-3">
				 <label for="username">Username</label>
				 <div class="input-group">
				    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
					<input type="text" name="username" class="form-control border border-dark" placeholder="Username"/>
				 </div>
				</div>
				<div class="my-3">
				 <label for="password">Password</label>
				 <div class="input-group">
				    <span class="input-group-text"><i class="bi bi-lock"></i></span>
					<input type="password" name="password" class="form-control border border-dark" placeholder="Password"/>
				 </div>
				</div>
				<div class="my-2">
				 <button type="submit" name="submit" class="btn-lg btn btn-outline-primary">Register Now</button>
				</div>
			   </form>
			   <div class="my-2">
			    <p>Already Registered? <a href="login.php">Login Here</a></p>
			   </div>
			 </div>
		 </div>
		</div>
	  </div>
      <?php include 'includes/footer.php'; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
	<script>
	 $(document).ready(function(){
		$("#myform").submit(function(){
			
		});
	 });
	</script>
  </body>
</html>