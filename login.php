<?php 
    $conn = new mysqli('localhost', 'root' , '' , 'php_practice');
     if(!$conn){
        die(mysqli_error($conn));
     }


     $emailErr = $passwordErr =  '';
     $email= $password =  '';

if ($_SERVER['REQUEST_METHOD']== "POST") {
  
    


     

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

      

       if(!empty($email) && !empty($password)){
         $sql = "SELECT * FROM crued WHERE  email = '$email'  AND  password = '$password' ";

        $query = $conn->query($sql);
	 	if ($query->num_rows>0) {
	 		 $_SESSION['login'] = 'login sucess'; 
	 	    header('location:dashboard.php');
	 	}else{
	 		echo "not found";
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
<title> Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
<div class="signup-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<h2>Sign In</h2>

		<h3 class="text-center" style="color:green;"> <?php if(isset($_GET['usercreated'])){
			echo "Register Completed Login Please "; } ?>
		</h3>
		<p class="hint-text">Sign In To get more offer , We are here a big team  </p>
        
        <div class="form-group">
        	<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email?>">
             <h6 class="error"><?php echo $emailErr; ?></h6>

        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <h6 class="error"><?php echo $passwordErr; ?></h6>
        </div>      
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">LOGIN</button>
        </div>
    </form>
	<div class="text-center">Don't have any account? <a href="form.php">Register Now </a></div>
</div>
</body>
</html>