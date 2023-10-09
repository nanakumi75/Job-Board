<nav class="navbar navbar-expand-sm navbar-light bg-info">
 <div class="container">
    <a class="navbar-brand" href="index.php">
	 <img src="images/logo.png" style="width:100px;">
	</a>
	<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
	 <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="menu">
	 <ul class="navbar-nav ms-auto">
	    <?php
		if(isset($_SESSION['id'])){
		?>
		<li class="nav-item">
		 <a class="nav-link" href="index.php"><i class="bi bi-search"></i> Search Jobs</a>
		</li>
        <li class="nav-item">
		 <a class="nav-link btn btn-primary text-white" href="post.php"><i class="bi bi-badge-ad"></i> Post Jobs</a>
		</li>
		<li class="nav-item">
		 <a class="nav-link" href="account.php"><i class="bi bi-person"></i> My Account</a>
		</li>
        <li class="nav-item">
		 <a class="nav-link btn btn-danger text-white" href="logout.php"><i class="bi bi-escape"></i> Logout</a>
		</li>
        <?php		
		}else{
			?>
			<li class="nav-item">
		      <a class="nav-link" href="index.php"><i class="bi bi-search"></i> Search Jobs</a>
		    </li>
			 
		<li class="nav-item">
		 <a class="nav-link" href="register.php"><i class="bi bi-lock"></i> Register</a>
		</li>
        <li class="nav-item">
		 <a class="nav-link" href="login.php"><i class="bi bi-key"></i> Login</a>
		</li>
		<li class="nav-item">
		 <a class="nav-link btn btn-primary text-white" href="post.php"><i class="bi bi-badge-ad"></i> Post Jobs</a>
		</li>
			<?php
		}
		?>
	 </ul>
	</div>
 </div>
</nav>