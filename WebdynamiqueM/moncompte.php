<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//$_SESSION['nom']= $data['nom']." ".$data['prenom'];
//$_SESSION['email']=$_POST['email'];
//$_SESSION['eleve']= "pasbesoin";
//$_SESSION['prof']="segado";
$nom=$_SESSION['email'];
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projweb";


$nom;
$prenom;
$email;
$numce=0;
$cp=0;
$ville=0;
$pays=0;
$adresse=0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, prenom, courriel FROM utilisateur where courriel like '".$nom."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br> Nom: ". $row["nom"]. " - Prenom: ". $row["prenom"]. " et mail: " . $row["courriel"] . "<br>";
        
        $nom=$row["nom"];
        $prenom=$row["prenom"];
        $email=$row["courriel"];
    }
} else {
    echo "0 results";
}
$sql2 = "SELECT `numero_carte_etudiant`, `code_postal`, `ville`, `pays`, `adresse` FROM `etudiant` WHERE `id_etudiant`=(SELECT `id_utilisateur` FROM `utilisateur` WHERE `courriel` like '".$email."')";
$results = $conn->query($sql2);
//

if ($results->num_rows > 0) {
    // output data of each row
    while($row = $results->fetch_assoc()) {
        $numce=$row["numero_carte_etudiant"];
        $cp=$row["code_postal"];
        $ville=$row["ville"];
        $pays=$row["pays"];
        $adresse=$row["adresse"];
        

    }
} else {
    echo "01 results";
}




?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf_8">
    <link href="css/omnesscolaire.css" rel="stylesheet" type="text/css" />
    <title>OMNESscolaire</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1 class="logo"> <a href="https://www.omneseducation.com/" target="_BLANK"><img src="img/logo.jpg" alt="logo" width="600" height="100"></a></h1>
        </div>
        <div id="nav">
            <a href="accueil.html"><img src="img/accueilDk.jpg" alt="accueil" width="150" height="50"></a>
            <a href="Tout parcourir.html"><img src="img/TPDk.jpg" alt="tout parcourir" width="150" height="50"></a>
            <a href="recherche.html"><img src="img/rechercheDk.jpg" alt="recherche" width="150" height="50"></a>
            <a href="rendezvous.php"><img src="img/RVDk.jpg" alt="Rendez-vous" width="150" height="50"></a>
            <a href="moncompte.php"><img src="img/moncompteL.jpg" alt="mon compte" width="150" height="50"></a>
            <a href="entree/login.html"><img src="img/deconnexio.jpg" alt="deconnexion" width="150" height="50"></a>
        </div>

        <div id="section">
            <h2>Retrouvez ici vos informations personnelles</h2>
            <p>
                RGPD : OMNES recueille vos informations pour sécuriser l'accès au site OMNES scolaire uniquement.
            </p>
            <p>
                <a href="#" class="logo">
                            Etudiant: <?php echo $nom;?>
                        </a>

                        <ul class="nav">
                            <li>Nom: <?php echo $nom; ?></li>
                            <li>Prénom: <?php echo $prenom; ?></li>
                            <li>Courriel: <?php echo $email; ?></li>
                            <li>Numero carte etudiant: <?php echo $numce; ?></li>
                            <li>Adresse: <?php echo $adresse; ?></li>
                            <li>Ville: <?php echo $ville; ?></li>
                            <li>Code Postal: <?php echo $cp; ?></li>
                            <li>Pays: <?php echo $pays;$conn->close(); ?></li>
                            
                        </ul>
            </p>
            </br>
            Retour à la <a href="accueil.html">page d’accueil</a>. </p>
        </div>
        <div id="nav">
            <a href="accueil.html">Accueil</a>
            <a href="Tout parcourir.html">Tout parcourir</a>
            <a href="recherche.html">Recherche</a>
            <a href="rendezvous.php">Rendez-vous</a>
            <a href="moncompte.php">Mon compte</a>
        </div>
        <div id="footer">
            <p class="contact">
                <img src="img/logoOMNES.jpg" alt="logo" width="50" height="25">OMNES Education<br>
                <a href="https://goo.gl/maps/HaibCyFxBq2sUoJF8" target="_BLANK">43 Quai de Grenelle</a><br>
                75015 Paris<br><br>
                (+33) 01 47 20 75 82 | Contact: <a href="mailto:admission@ece.fr">admission@ece.fr</a>
            </p>
            <p>
                Copyright &copy;2022  | Latest update: <time datetime="2022-02-
11 09:00">Aujourd’hui</time>
            </p>
        </div>
    </div>
</body>
</html>