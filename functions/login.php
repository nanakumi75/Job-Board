<?php 
include 'database.php';

if(isset($_POST['submit'])){
    $emailuser = mysqli_real_escape_string($conn,$_POST['emailuser']);
    $password = mysqli_escape_string($conn,$_POST['password']);

    if(empty($emailuser)){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Please enter email address or username!</h5>
       </div>";
    }else if(empty($password)){
        echo "<div class='alert alert-danger'>
         <h5><strong>Error! </strong>Please enter your password!</h5>
        </div>";
    }else{
        $sql = "SELECT * FROM users WHERE usersEmail = '$emailuser' OR usersUsername='$emailuser'";
        $query = $conn->query($sql);
        if($query->num_rows>0){
         while($row = $query->fetch_assoc()){
              $isactive = $row['usersActive'];
              if($isactive == 'No'){
                echo "<div class='alert alert-danger'>
                <h5><strong>Error! </strong>You have not actived your account!</h5>
               </div>";
              }elseif(PASSWORD_VERIFY($password,$row['usersPassword'])== FALSE){
                echo "<div class='alert alert-danger'>
                 <h5><strong>Error! </strong>Password is wrong!</h5>
                 </div>";
            }else if(PASSWORD_VERIFY($password,$row['usersPassword']) == TRUE){
                session_start();
                $_SESSION['id'] = $row['usersID'];
                $_SESSION['username'] =$row['usersUsername'];
                header('Location:account.php');
            }
         }  
        }else{
            echo "<div class='alert alert-danger'>
         <h5><strong>Error! </strong>Email address or Username is wrong!</h5>
        </div>";
        }
    }
}