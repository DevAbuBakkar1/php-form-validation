<?php 
    $conn = new mysqli('localhost', 'root' , '' , 'php_practice');
     if(!$conn){
        die(mysqli_error($conn));
     }
    


     $fnameErr = $lnameErr = $emailErr = $passwordErr = $confirm_passwordErr=  '';
     $first_name = $last_name = $email= $password = $confirm_password = '';

if ($_SERVER['REQUEST_METHOD']== "POST") {
  
    if(empty($_POST['first_name'])){
        $fnameErr = "First Name is Required";
    }else{
        $first_name = test_input($_POST['first_name']);

        if(!preg_match( "/^[a-zA-Z-' ]*$/" , $first_name )){
            $fnameErr  = "Only letter and whitespace are allowed";
        }
    }


     if(empty($_POST['last_name'])){
        $lnameErr = "Last Name Required";
     }else{
        $last_name = test_input($_POST['last_name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $last_name)) {
            $lnameErr = "only Letter and whitespace are allowd";
        }
     }

     if(empty($_POST['email'])){
        $emailErr = "Email are Required";
     }else{
        $email = test_input($_POST['email']);
        if(!filter_var($email , FILTER_VALIDATE_EMAIL )){
            $emailErr = "Invalid Email Format";
        }
     }

      if(empty($_POST['password'])){
        $passwordErr = "password are Required";
     }else{
        $password = test_input($_POST['password']);
        $md5pass = md5($password);

        
     }
      if(empty($_POST['confirm_password'])){
        $confirm_passwordErr = " Repeat the password";
     }else{
        $confirm_password = test_input($_POST['confirm_password']);
        
     }

      if(!empty($first_name) && !empty($last_name)   && !empty($email) && !empty($password) && !empty($confirm_password) ){
        if($password === $confirm_password ){

            $sql = "INSERT INTO crued(first_name, last_name , email , password) VALUES('$first_name','$last_name', '$email' , '$password' ) ";
            $result = mysqli_query($conn , $sql );

            if($result){
                header('location:login.php?usercreated');
            }else{
                echo "Password Not Match";
            }
        }
    }
   
}

function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title> Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $first_name;?>" >
                <h6 class ="error"><?php echo $fnameErr; ?></h6>  

                </div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" value="<?php echo $last_name ;?>" placeholder="Last Name"  >
                 <h6 class="error"><?php echo $lnameErr; ?></h6>
                </div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email?>">
             <h6 class="error"><?php echo $emailErr; ?></h6>

        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <h6 class="error"><?php echo $passwordErr; ?></h6>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" >
            <h6 class="error"><?php echo $confirm_passwordErr; ?></h6>
        </div>        
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="login.php">Sign In</a></div>
</div>
</body>
</html>