<?php 
session_start();
$conn = new mysqli('localhost', 'root' , '' , 'php_practice');
if(!$conn){
   die(mysqli_error($conn));
}



if(isset($_GET['dashboardid'])){
	echo "<h3 class ='text-light;'> DELETE SUCCESSFULLY DONE</h3>";
}
if(isset($_GET['updatemsg'])){
	echo "<h3 class ='text-light;'> UPDATE SUCCESSFULLY DONE</h3>";
}


?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<button class="btn btn-primary my-5"> <a href="form.php" class="text-light"> Add New User </a></button>
			<div class="row">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">First Name</th>
				      <th scope="col">Last Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Actions</th>

				    </tr>
				  </thead>
				  <tbody>
				  	<?php 

				  	 $sql = "SELECT * FROM crued";
				  	 $result = mysqli_query($conn , $sql );
				  	 if($result){
				  	 	while ($row = mysqli_fetch_assoc($result)) {
				  	 		$id = $row['id'];
				  	 		$first_name = $row['first_name'];
					        $last_name = $row['last_name'];
					        $email = $row['email'];
					        echo '
							<tr>
						      <th scope="row">'.$id.'</th>
						      <td>'.$first_name.'</td>
						      <td>'.$last_name.'</td>
						      <td>'.$email.'</td>
						      <td>
				    		   <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'"class="text-light">DELETE</a></button>
				    		  </td>

						    </tr>
						    

						    ';

				  	 	}
				  	 }

				  	 ?>
				    
				  </tbody>
				</table>

			</div>
		</div>
	</body>
</html>