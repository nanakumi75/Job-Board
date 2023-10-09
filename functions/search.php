<?php
 include 'database.php';
	 $search = mysqli_real_escape_string($conn,$_GET['search']);
	 $sql = "SELECT * FROM posts WHERE postTitle LIKE '%$search%'
	 OR PostDetails LIKE '%$search'";
	 
	 $query = $conn->query($sql);
	 if($query->num_rows>0){
		 while($row = $query->fetch_assoc()){
			 ?>
			 <table class="table table-striped table-bordered table-info">
			    <thead>
				 <tr>
				    <th>Job ID</th>
					<th>Job Title</th>
					<th>Job Description</th>
					<th>Company Name</th>
					<th>Company Description</th>
				 </tr>
				</thead>
				<tbody>
				 <?php
                  echo "<tr>
				   <td>".$row['id']."</td>
				   <td>".$row['postTitle']."</td>
				   <td>
				     <img src=".$row['postImage']." style='width:90px;height:90px;border-radius:50%;' class='float-start'>
					 <p>".$row['postDetails']."</p>
				   </td>
				   <td>".$row['companyName']."</td>
				   <td>".$row['companyDescription']."</td>
				  </tr>";
				 ?>
				</tbody>
			 </table>			 
			 <?php
		  }
	    }else{
		 echo "<div class='alert alert-danger'>
		  <h5><strong>No Records found</strong></h5>
		 </div>";
	 }
