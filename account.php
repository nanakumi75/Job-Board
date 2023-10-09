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
     <div class="container">
	    <div class="row">
	     <div class="col-md-12 my-5">
		   <h3 class="text-center text-secondary">Your Account Details</h3>
		 </div>
		</div>
		<div class="row">
		 <div class="col-md-12">
		    <table class="table table-primary table-striped table-bordered">
			 <thead>
			    <tr>
				 <th>User ID</th>
				 <th>User Name</th>
				 <th>User Email</th>
				 <th>User Username</th>
				 <th>Change Username</th>
				 <th>Change Password</th>
				 <th>Change Email</th>
				</tr>
			 </thead>
			 <tbody>
			    <?php
                  include 'functions/database.php';
				  if(isset($_SESSION['id'])){
					  $id = $_SESSION['id'];
					  $sql = "SELECT * FROM users WHERE usersID='$id'";
					  $query = $conn->query($sql);
					  if($query->num_rows>0){
						  while($row= $query->fetch_assoc()){
							  echo "<tr>
							    <td>".$row['usersID']."</td>
							    <td>".$row['usersName']."</td>
								<td>".$row['usersEmail']."</td>
								<td>".$row['usersUsername']."</td>
								<td><a class='btn btn-success' href='updateusername.php'>Change Username</a></td>
								<td><a class='btn btn-secondary' href='updatepassword.php'>Change Password</a></td>
								<td><a class='btn btn-info' href='updateemail.php'>Change Email</a></td>
							  </tr>";
						  }
					  }
				  }
				?>
			 </tbody>
			</table>
		 </div>
		</div>
	 </div>
    <?php include 'includes/footer.php'; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>