<?php
 if(isset($_POST['submit'])){
	 $username = mysqli_real_escape_string($conn,$_POST['username']);
	 $email = mysqli_real_escape_string($conn,$_POST['email']);
	 if(empty($username)){
		 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Please enter your username</h5>
		 </div>";
	 }else if(empty($email)){
		 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Please enter a new email address</h5>
		 </div>"; 
	 }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>This might not be a proper email</h5>
		 </div>"; 
	 }else{
		 $sql = "SELECT * FROM users WHERE usersUsername='$username'";
		 $query = $conn->query($sql);
		 if($query->num_rows<1){
			 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>We cannot find the username you entered.</h5>
		 </div>";
		 }else{
			   
			  $sql = "UPDATE users SET usersEmail='$email' WHERE usersUsername='$username'";
			  if($conn->query($sql)){
				  echo "<div class='alert alert-success'>
		               <h5><strong>Success! </strong>You have successfully changed your Email</h5>
		              </div>";
			  }else{
				  echo "<div class='alert alert-danger'>
		             <h5><strong>Error! </strong>Something happened. We could not save your new Email</h5>
		            </div>";
			  }
		 }
	 }
 }