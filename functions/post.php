<?php 
include 'database.php';

 if(isset($_POST['post'])){
    //getting input fields
	$title = mysqli_real_escape_string($conn,$_POST['title']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $company_name = mysqli_real_escape_string($conn,$_POST['company_name']);
    $company_description = mysqli_real_escape_string($conn,$_POST['company_description']);
    
	//image file
	$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	//$check = getimagesize($_FILES["file"]["tmp_name"]);

    //validating input fields
	if(empty($title)){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>Please write the Job Title</h5>
		</div>";
	}else if(!preg_match("/^[a-zA-Z0-9 ]*$/",$title)){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>Job title can only be texts and numbers</h5>
		</div>";
	}elseif(empty($description)){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>Please write the Job Title</h5>
		</div>";
	}elseif(empty($company_name)){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>Please enter your company name</h5>
		</div>";
	}elseif(!preg_match("/^[a-zA-Z0-9 ]*$/",$company_name)){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>Company name can only letters and numbers</h5>
		</div>";
	}else if(empty($company_description)){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>Please describe your company in detail</h5>
		</div>";
	}else if(empty($_FILES['file']['name'])){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>Job image is required</h5>
		</div>";
	}elseif(file_exists($target_file)){
		 echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>The image you have chosen is already in use. Choose a different image.</h5>
		</div>";
	}elseif($_FILES["file"]["size"] > 500000){
		 echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>The image you have chosen is too large.</h5>
		</div>"; 
	}elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
		echo "<div class='alert alert-danger'>
		 <h5><strong>Error! </strong>The image you have chosen is not allowed.</h5>
		</div>";
	}else{
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
		
		//inserting data into database
		$sql = "INSERT INTO 
		posts(postTitle,postDetails,postImage,companyName,companyDescription)
		VALUES('$title','$description','$target_file','$company_name','$company_description')";
		
		if($conn->query($sql)){
		   echo "<div class='alert alert-success'>
		   <h5><strong>Success! </strong>You have successfully posted the job posting.</h5>
		  </div>";
		}else{
			echo "<div class='alert alert-danger'>
		     <h5><strong>Error! </strong>We could not post your job.</h5>
		   </div>";
		}
	}
 }
