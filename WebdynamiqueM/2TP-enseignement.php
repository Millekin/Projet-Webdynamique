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

$sql = "SELECT nom, prenom, courriel FROM utilisateur
    INNER JOIN
    professionel ON (utilisateur.id_utilisateur = professionel.id_professionel)
    where type_utilisateur like 'Professionnel' ";
$resultElec = $conn->query($sql);






?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf_8">
        <link href="css/omnesscolaireTP.css" rel="stylesheet" type="text/css" />
        <title>OMNESscolaire</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1 class="logo"> <a href="https://www.omneseducation.com/" target="_BLANK"><img src="img/logo.jpg" alt="logo" width="600" height="100"></a></h1>
            </div>
            <div id="nav">
                <a href="2accueil.html"><img src="img/accueilDk.jpg" alt="accueil" width="150" height="50"></a>
                <a href="2TP-enseignement.php"><img src="img/ListeProf.jpg" alt="tout parcourir" width="150" height="50"></a>
                <a href="admin/register.html"><img src="img/ModifProfs.jpg" alt="recherche" width="150" height="50"></a>
                
                <a href="entree/login.html"><img src="img/deconnexio.jpg" alt="deconnexion" width="150" height="50"></a>
            </div>

            
            
                    
                        <form action="connect.php" method="post">
                            <?php
                            if ($resultElec->num_rows > 0) {
                            // output data of each row
                                while($row = $resultElec->fetch_assoc()) {
                                    ?>
                                    <a href="phpcalendar (2)/dummy.php?name=<?php echo $row['nom']; ?>"><?php echo "<br> ".$row["nom"]." ".$row["prenom"]." " . $row["courriel"] . "<br>";?></a>
                                    <?php
                                }
                            }
                            ?>
                        </form>
                            
               

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
