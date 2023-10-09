<?php
 if(isset($_POST['submit'])){
	 $email = mysqli_real_escape_string($conn,$_POST['email']);
	 $password = mysqli_real_escape_string($conn,$_POST['password']);
	 if(empty($email)){
		 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Please enter your email address</h5>
		 </div>";
	 }else if(empty($password)){
		 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Please enter a new password</h5>
		 </div>"; 
	 }else if(strlen($password)<6){
		echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Password should have at least 6 characters</h5>
		 </div>"; 
	 }else{
		 $sql = "SELECT * FROM users WHERE usersEmail='$email'";
		 $query = $conn->query($sql);
		 if($query->num_rows<1){
			 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>We cannot find the email address you entered.</h5>
		 </div>";
		 }else{
			   $pwdhashed = PASSWORD_HASH($password,PASSWORD_DEFAULT);
			   
			  $sql = "UPDATE users SET usersPassword='$pwdhashed' WHERE usersEmail='$email'";
			  if($conn->query($sql)){
				  echo "<div class='alert alert-success'>
		               <h5><strong>Success! </strong>You have successfully changed your Password</h5>
		              </div>";
			  }else{
				  echo "<div class='alert alert-danger'>
		             <h5><strong>Error! </strong>Something happened. We could not save your new Password</h5>
		          </div>";
			  }
		 }
	 }
 }