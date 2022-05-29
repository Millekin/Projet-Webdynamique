<?php
	$id_ = $_GET['id'];
	

	// Database connection
	$con = new mysqli('localhost','root','','projweb');
	if($con->connect_error){
		echo "$con->connect_error";
		die("Connection Failed : ". $con->connect_error);
	} else {
		$stmt = $con->prepare("delete from creneau where id_creneau=?");
		$stmt->bind_param("s",$id_);
		$stmt->execute();
		$stmt_result=$stmt->get_result();
		
			
		$stmt->close();
		$con->close();
		header("Location:rendezvous.php");
		die();
		
			
		
		
	}
?>