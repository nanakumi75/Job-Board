<?php
 if(isset($_POST['submit'])){
	 $email = mysqli_real_escape_string($conn,$_POST['email']);
	 $username = mysqli_real_escape_string($conn,$_POST['username']);
	 if(empty($email)){
		 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Please enter your email address</h5>
		 </div>";
	 }else if(empty($username)){
		 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Please enter a new username</h5>
		 </div>"; 
	 }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
		echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>Username can only letters and numbers</h5>
		 </div>"; 
	 }else{
		 $sql = "SELECT * FROM users WHERE usersEmail='$email'";
		 $query = $conn->query($sql);
		 if($query->num_rows<1){
			 echo "<div class='alert alert-danger'>
		  <h5><strong>Error! </strong>We cannot find the email address you entered.</h5>
		 </div>";
		 }else{
			  $sql = "UPDATE users SET usersUsername='$username' WHERE usersEmail='$email'";
			  if($conn->query($sql)){
				  echo "<div class='alert alert-success'>
		               <h5><strong>Success! </strong>You have successfully changed your Username</h5>
		              </div>";
			  }else{
				  echo "<div class='alert alert-danger'>
		             <h5><strong>Error! </strong>Something happened. We could not save your new username</h5>
		          </div>";
			  }
		 }
	 }
 }