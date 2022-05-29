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
    where type_utilisateur like 'Professionnel' 
    and professionel.`departement/specialite` like 'Electronique'; ";
$resultElec = $conn->query($sql);

$sql = "SELECT nom, prenom, courriel FROM utilisateur
    INNER JOIN
    professionel ON (utilisateur.id_utilisateur = professionel.id_professionel)
    where type_utilisateur like 'Professionnel' 
    and professionel.`departement/specialite` like 'Informatique'; ";
$resultInfo = $conn->query($sql);




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
                <a href="accueil.html"><img src="img/accueilDk.jpg" alt="accueil" width="150" height="50"></a>
                <a href="Tout parcourir.html"><img src="img/TPL.jpg" alt="tout parcourir" width="150" height="50"></a>
                <a href="recherche.html"><img src="img/rechercheDk.jpg" alt="recherche" width="150" height="50"></a>
                <a href="rendezvous.php"><img src="img/RVDk.jpg" alt="Rendez-vous" width="150" height="50"></a>
                <a href="moncompte.php"><img src="img/moncompteDk.jpg" alt="mon compte" width="150" height="50"></a>
                <a href="entree/login.html"><img src="img/deconnexio.jpg" alt="deconnexion" width="150" height="50"></a>
            </div>

            <div id="colnav">
                <ul>
                    <li><a href="TP-enseignement.php"><img src="img/enseignementL.jpg" alt="départements d'enseignement" width="150" height="50"></a></li>
                    <li><a href="TP-recherche.html"><img src="img/laboDk.jpg" alt="labo de recherche" width="150" height="50"></a></li>
                    <li><a href="TP-relations-internationales.html"><img src="img/internationalDk.jpg" alt="relations internationales" width="150" height="50"></a></li>
                </ul>
            </div>
            <div id="section">
                <h1>Département d'électronique</h1>
                <p>
                    
                        <form action="connect.php" method="post">
                            <?php
                            if ($resultElec->num_rows > 0) {
                            // output data of each row
                                while($row = $resultElec->fetch_assoc()) {
                                    ?>
                                    <a href="phpcalendar/dummy.php?name=<?php echo $row['nom']; ?>"><?php echo "<br> ".$row["nom"]." ".$row["prenom"]." " . $row["courriel"] . "<br>";?></a>
                                    <?php
                                }
                            }
                            ?>
                        </form>
                            
                </p>
                <h1>Département d'informatique</h1>
                <p>
                    <form action="connect.php" method="post">
                            <?php
                            if ($resultInfo->num_rows > 0) {
                            // output data of each row
                                while($row = $resultInfo->fetch_assoc()) {
                                    ?>
                                    <a href="phpcalendar/dummy.php?name=<?php echo $row['nom']; ?>"><?php echo "<br> ".$row["nom"]." ".$row["prenom"]." " . $row["courriel"] . "<br>";?></a>
                                    <?php
                                }
                            }
                            ?>
                        </form>

                </p>
                <h1>Département de mathématiques</h1>
                <p>
                    <table>
                        <tr>
                            <th>Photo</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                        </tr>
                        <tr>
                            <td><img src="img/fabienne coudray.jpg" height"100" width="50"></td>
                            <td>Fabienne</td>
                            <td>Coudray</td>
                            <td><a href="mailto:fcoudray@yahoo.fr">fcoudray@yahoo.fr</a> </td>
                        </tr>
                    </table>

                </p>


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
