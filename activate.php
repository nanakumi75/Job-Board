<?php 
 session_start();
 if(isset($_SESSION['id'])){
    header('Location:employer.php');
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
            <?php 
            include 'functions/database.php';
             if(isset($_GET['email'],$_GET['emailCode'])){
                $email = $_GET['email'];
                $emailCode = $_GET['emailCode'];

                $sql = "SELECT * FROM users WHERE usersEmail ='$email' AND usersActivationCode ='$emailCode'";
                $query = $conn->query($sql);
                if($query->num_rows> 0){
                     $sql = "UPDATE users SET usersActive ='Yes' WHERE usersEmail='$email'";
                     if($conn->query($sql)){
                        echo "<div class='alert alert-success'>
                         <h5><strong>Success</strong> Your account is activated. You can log in now</h5>
                        </div>";
                     }else{
                        echo "<div class='alert alert-danger'>
                        <h5><strong>Error! </strong>Wrong activation code. Your account is not verified</h5>
                       </div>"; 
                     }
                }else{
                    echo "<div class='alert alert-danger'>
                     <h5><strong>Error! </strong>Wrong activation code. Your account is not verified</h5>
                    </div>";
                }
             }
            ?>
        </div>
    </div>
   </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>