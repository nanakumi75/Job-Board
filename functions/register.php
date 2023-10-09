<?php
include 'database.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $activationcode = PASSWORD_HASH($password,PASSWORD_DEFAULT);
    if(empty($name)){
        echo "<div class='alert alert-danger'>
         <h5><strong>Error! </strong>Please your full name is required!</h5>
        </div>";
    }else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Your name can only be letters!</h5>
       </div>"; 
    }else if(empty($email)){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Please your email address is required!</h5>
       </div>";
    }else if(!FILTER_VAR($email,FILTER_VALIDATE_EMAIL)){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Please enter a valid email address!</h5>
       </div>";
    }else if(empty($username)){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Please username is required!</h5>
       </div>";
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Please username must be letters and numbers only!</h5>
       </div>";
    }elseif(empty($password)){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Please password is required!</h5>
       </div>";
    }else if(strlen($password)<6){
        echo "<div class='alert alert-danger'>
        <h5><strong>Error! </strong>Password must be at least 6 characters long!</h5>
       </div>";
    }else{
        $sql = "SELECT * FROM users WHERE usersEmail = '$email'";
        $query = $conn->query($sql);
        if($query->num_rows >0 ){
            echo "<div class='alert alert-danger'>
            <h5><strong>Error! </strong>The email address is already in use!</h5>
           </div>";
        }else{
            $sql = "SELECT * FROM users WHERE usersUsername = '$username'";
            $query = $conn->query($sql);
            if($query->num_rows>0){
                echo "<div class='alert alert-danger'>
                <h5><strong>Error! </strong>The username is already in use!</h5>
               </div>";  
            }else{
                $hashedpwd = PASSWORD_HASH($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO users(
                  usersName,usersEmail,usersUsername,usersPassword,UsersActive,usersActivationCode
                )
                VALUES('$name','$email','$username','$hashedpwd','No','$activationcode')";
                $query = $conn->query($sql);
                if($query){
                    $to = $email;
                    $url = "activate.php?email=".$email ."&emailCode=".$activationcode;
                     $from = "no-reply@codinginstitution.com";
                     $subject = 'Activate your Account!';
                     $message = '<p>Click the link below to verify your account!</p>';
                     $message.= '<p><a href="'.$url.'">"'.$url.'"</a></p>';
                     $headers = "From: Coding Institution <no-reply@codinginstitution.com>\r\n";
                     $headers.= "Reply-To:no-reply@codinginstitution.com\r\n";
                     $headers.= "Content-type:text/html\r\n";
                     mail($to,$subject,$message,$headers);
                        echo '<div class="alert alert-success">
                         <h5><strong>Success! </strong>Registration is successful</h5>
                        </div>';
                        echo "<div class='alert alert-success'>
                         <h5>Please check your email to activate your account!</h5>
                        </div>";
                }else{
                    echo "<div class='alert alert-danger'>
                    <h5><strong>Error! </strong>We could not register you. Please re-submit the registration.!</h5>
                   </div>";
                }
            }
        }
    }
}