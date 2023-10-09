<?php session_start(); ?>
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
	<div class="container my-5">
	 <div class="row">
	    <div class="col-md-12">
		 <h3 class="text-center text-primary">The Number Website For Job Seekers and Employers.</h3>
		</div>
	 </div>
	 <div class="row my-5">
	    <div class="col-md-10 mx-auto">
		    <div class="input-group">
			<input type="text" name="search" id="search" class="form-control border border-dark" placeholder="Search your favorite Jobs around the World">
			<span class="input-group-text border border-dark">
			 <span class="btn btn-lg"><i class="bi bi-search"></i> Search</span>
			</span>
			</div>
		</div>
	 </div>
	</div>
	<div class="container-fluid p-4" id="searchResults">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center text-dark">
				<h3 style="text-transform:uppercase;font-weight:bold;">Trending Searches</h3>
			</div>
		</div>
	 <div class="row">
	    <div class="col-md-4">
		<div class="bg-secondary p-2 rounded text-center">
		  <p>
			<a href="#" class="btn btn-primary">#COVID</a>
		    <a href="#" class="btn btn-warning">#Warehouse</a>
		    <a href="#" class="btn btn-info">#Remote</a>
		</p>
		<p>
			<a href="#" class="btn btn-primary">#Accounting</a>
		    <a href="#" class="btn btn-light">#Administrative</a>
		</p>
		</div>
		</div>
		<div class="col-md-4">
		<div class="bg-info p-2 rounded text-center">
		<p>
			<a href="#" class="btn btn-primary">#Amazon</a>
		    <a href="#" class="btn btn-warning">#WorkFromHome</a>
		    <a href="#" class="btn btn-success my-2">#CustomerServerice</a>
			<a href="#" class="btn btn-success my-2">#Receptionist</a>
		</p>
		</div>
		</div>
		<div class="col-md-4">
		<div class="bg-warning p-2 rounded text-center">
		 <p>
			<a href="#" class="btn btn-primary">#PHP</a>
		    <a href="#" class="btn btn-danger">#Laravel</a>
		    <a href="#" class="btn btn-success">#HTML/CSS</a>
		</p>
		<p>
			<a href="#" class="btn btn-primary">#MYSQL</a>
		    <a href="#" class="btn btn-dark">#NodeJS</a>
		    <a href="#" class="btn btn-success my-2">#React</a>
		</p>
		</div>
		</div>
	 </div>
	</div>
	<div class="container-fluid bg-dark my-5">
     <div class="row">
		<div class="col-md-8 py-5">
           <h5 class="fw-bold text-white" style="text-transform:uppercase;">Employers</h5>
		   <h2 class="text-light fw-bold" style="text-transform:uppercase;">Looking to Post a Job?</h2>
		  <h4 class="text-white">We have end-to-end solutions that can keep up with you and your standards.</h4>
		  <a href="post.php" class="btn btn-lg btn-outline-primary mt-3">POST A JOB</a>
		</div>
		<div class="col-md-4">
			<img src="images/jobup.png" alt="" class="img-fluid float-end">
		</div>
	 </div>
	</div>
	<div class="container-fluid my-5">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center" style="text-transform:uppercase;font-weight:bold;">Top Hiring Companies</h3>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-2">
				<a href=""><img src="images/instacart.png" alt="" class="img-fluid"></a>
			</div>
			<div class="col-md-2">
			  <a href=""><img src="images/bvm.jpg" alt="" class="img-fluid"></a>
			</div>
			<div class="col-md-2">
			  <a href=""><img src="images/jobot.png" alt="" class="img-fluid"></a>
			</div>
			<div class="col-md-2">
			  <a href=""><img src="images/shift.png" alt="" class="img-fluid"></a>
			</div>
			<div class="col-md-2">
			   <a href=""><img src="images/ttec.jpg" alt="" class="img-fluid rounded"></a>
			</div>
			<div class="col-md-2">
			  <a href=""><img src="images/vitas.png" alt="" class="img-fluid"></a>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
	<script>
	  $(document).ready(function(){
		  $("#search").keyup(function(){
			  var search = $(this).val();
			  //alert(search);
			  $.ajax({
				url:'functions/search.php',
                type:'get',
                data:{'search':search},
                success:function(data){
				$("#searchResults").html(data);	
				}				
			  });
		  });
	  });
	</script>
  </body>
</html>
