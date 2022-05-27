<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$type = "Eleve";
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
	$pswdhash=password_hash($password,PASSWORD_DEFAULT);
	// Database connection
	$conn = new mysqli('localhost','root','','projweb');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into utilisateur(nom, prenom, type_utilisateur, courriel, mot_de_passe, numero_telephone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $firstName, $lastName, $type, $email, $pswdhash, $number);
		$execval = $stmt->execute();
		echo $execval;
		$stmt->close();
		$conn->close();
		header("Location:login.html");
		die();	
	}
?>