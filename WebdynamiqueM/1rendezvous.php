<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//$_SESSION['nom']= $data['nom']." ".$data['prenom'];
//$_SESSION['email']=$_POST['email'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "

SELECT creneau.id_creneau, creneau.`debut`, creneau.`fin`, creneau.`texte`, utilisateur.nom, utilisateur.prenom
FROM creneau, utilisateur
WHERE creneau.`id_etudiant` = utilisateur.`id_utilisateur` AND 
creneau.id_professionel='".$_SESSION['id_eleve']."' and type_utilisateur like 'Eleve'";
$resultElec = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf_8">
    <link href="css/omnesscolaire.css" rel="stylesheet" type="text/css" />
    <title>OMNESscolaire</title>
    <style>
      .button {
        background-color: #1c87c9;
        border: none;
        color: white;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        margin: 4px 2px;
        cursor: pointer;
      }
    </style>

</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1 class="logo"> <a href="https://www.omneseducation.com/" target="_BLANK"><img src="img/logo.jpg" alt="logo" width="600" height="100"></a></h1>
        </div>
        <div id="nav">
            <a href="1accueil.html"><img src="img/accueilDk.jpg" alt="accueil" width="150" height="50"></a>
            
            <a href="1rendezvous.php"><img src="img/RVL.jpg" alt="Rendez-vous" width="150" height="50"></a>
            <a href="1moncompte.php"><img src="img/moncompteDk.jpg" alt="mon compte" width="150" height="50"></a>
            <a href="entree/login.html"><img src="img/deconnexio.jpg" alt="deconnexion" width="150" height="50"></a>

        </div>

        <div id="section">
            <h2>Retrouvez ici vos rendez-vous</h2>
            <h3>Rendez-vous à venir</h3>
            <ol>
            <?php
                            if ($resultElec->num_rows > 0) {
                            // output data of each row
                                while($row = $resultElec->fetch_assoc()) {
                                    ?>
                                    <li><?php echo "<br>Dates de debut et de fin: Du ".$row["debut"]." au ".$row["fin"]."<br>Indications: ".$row["texte"]."<br>Etudiant: ".$row["nom"]." ".$row["prenom"]."<br>";?></li>
                                    <a href="1supprCreneau.php?id=<?php echo $row['id_creneau']; ?>" class="button">Annuler le rendez-vous</a>
                                    <?php
                                }
                            }
                            ?>
                            </ol>
            </br>
            Retour à la <a href="accueil.html">page d’accueil</a>. </p>
        </div>
        <div id="nav">
            <a href="1accueil.html">Accueil</a>
            
            <a href="1rendezvous.php">Rendez-vous</a>
            <a href="1moncompte.php">Mon compte</a>
        </div>
        <div id="footer">
            <p class="contact">
                <img src="img/logoOMNES.jpg" alt="logo" width="50" height="25">OMNES Education<br>
                <a href="https://goo.gl/maps/HaibCyFxBq2sUoJF8" target="_BLANK">43 Quai de Grenelle</a><br>
                75015 Paris<br><br>
                (+33) 01 47 20 75 82 | Contact: <a href="mailto:admission@ece.fr">admission@ece.fr</a>
            </p>
            <p>
                Copyright &copy;2022  | Latest update: <time datetime="2022-05-29 23:54">Aujourd’hui</time>
            </p>
        </div>
    </div>
</body>
</html>