 <?php 

 $conn = new mysqli('localhost', 'root' , '' , 'php_practice');
     if(!$conn){
        die(mysqli_error($conn));
     }

  if(isset($_GET['deleteid'])){
  	$id = $_GET['deleteid'];
    
  	$sql = "DELETE FROM crued WHERE id = '$id' ";
  	$result = mysqli_query($conn , $sql);
  	if($result){
  		header('location:dashboard.php?dashboardid');
  	}else{
  		"There is something error";
  	}

  }
