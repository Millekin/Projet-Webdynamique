<?php
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	// Database connection
	$con = new mysqli('localhost','root','','projweb');
	if($con->connect_error){
		echo "$con->connect_error";
		die("Connection Failed : ". $con->connect_error);
	} else {
		$stmt = $con->prepare("select * from utilisateur where courriel=?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result=$stmt->get_result();
		if($stmt_result->num_rows>0){
			$data=$stmt_result->fetch_assoc();
			if(password_verify($password, $data['mot_de_passe'])){
				if("Eleve"== $data['type_utilisateur']){
					$stmt->close();
					$con->close();
					header("Location:../navigation/Accueil.html");
					die();
				}else if("Professionnel"== $data['type_utilisateur']){
					$stmt->close();
					$con->close();
					header("Location:https://google.com");
					die();
				}else{
					$stmt->close();
					$con->close();
					header("Location:https://github.com/Millekin/Projet-Webdynamique/tree/main");
					die();
				}
			}
		}
		$stmt->close();
		$con->close();
		header("Location:login.html");
		die();




	}
?>
