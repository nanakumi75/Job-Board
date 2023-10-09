<?php 
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:login.php');
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
		    <h4 style="text-transform:uppercase;font-weight:bold;">Post your JOB</h4>
			<h4>We have a pull of about 2000 job seekers to choose from</h4>
		 </div>
		</div>
		 <div class="row mt-5">
		    <div class="col-md-7 mx-auto">
			  <div class="card card-body">
			    <?php include 'functions/post.php'; ?>
			    <form action="post.php" method="post" enctype="multipart/form-data">
				 <div class="my-3">
				    <h4 class="fw-bold">JOB DETAILS</h4>
				 </div>
				 <div class="my-3">
				    <label for="title">Job Title</label>
					<div class="input-group">
					 <span class="input-group-text"><i class="bi bi-check-lg"></i></span>
					 <input type="text" name="title" class="form-control border border-dark" placeholder="Job Title"/>
					</div>
				 </div>
				 <div class="my-3">
				    <label for="description">Job Description</label>
					<div class="input-group">
					 <span class="input-group-text"><i class="bi bi-check-square-fill"></i></span>
					 <textarea name="description" class="form-control border border-dark" placeholder="Job Description"></textarea>
					</div>
				 </div>
				 <div class="my-3">
				    <label for="description">Job Description</label>
					<div class="input-group">
					 <span class="input-group-text"><i class="bi bi-card-image"></i></span>
					 <input type="file" name="file" class="form-control border border-dark">
					</div>
				 </div>
				 <div class="mt-5">
				    <h4 class="fw-bold">COMPANY PROFILE</h4>
				 </div>
				  <div class="my-3">
				    <label for="type">Company Name</label>
					 <input type="text" name="company_name" class="form-control border border-dark" placeholder="Company Name"/>
				 </div>
				 <div class="my-3">
				    <label for="type">Company Description</label>
					 <textarea name="company_description" class="form-control border border-dark" placeholder="Company Description"></textarea>
				 </div>
				 <div class="my-3">
				    <button type="submit" name="post" class="btn btn-lg btn-success">Post Job Now</button>
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