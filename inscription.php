<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Covoit'GRETA</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>



<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Portail</a>
  </li>
  <li class="breadcrumb-item active">Inscription</li>
</ol>
<center><h1 class="mt-4 mb-3">Inscription</h1></center>
<!-- Photo Header -->
<center><img  class="img-fluid rounded mb-4" src="./photo/check.jpg" alt=""></center>

  <!-- Navigation -->
  <center>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a href="#"><img width="100px" src="./photo/logogreta.jpg"  alt="100"></a>
      <a class="navbar-brand" href="index.html">Covoit'GRETA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Portail</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>

          </li>
          </li</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Contenu de Page -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <form action="incruser.php" method="post">
      Nom : <input type="text" name="nom" size="15" pattern="[Aa-Zz]{3,}" title ="3 lettres minimum" required>
          <br><br>
      Prenom : <input type="text" name="prenom" size="15" pattern="[Aa-Zz]{3,}" title ="3 lettres minimum" required>
          <br><br>
      Mail : <input type="email"  name="mail" placeholder=" @google.com" pattern="[A-Za-z0-9z@_-+.]" size="30" required> 
          <br><br>
      Adresse : <input type="text" name="adresse" size="15" pattern="[Aa-Zz]{3,}" title ="3 lettres minimum" required>
          <br><br>
      Ville : <input type="text" name="ville" size="15" pattern="[Aa-Zz]{3,}" title ="3 lettres minimum" required>
          <br><br>
      Code postal : <input type="text" name="cp" size="15" pattern="[Aa-Zz]{3,}" title ="3 lettres minimum" required>
          <br><br>
      Mot de passe : <input type="password"  name="mdp" placeholder="8 caractère min" minlength="8" required>
          <br><br>
      Message: <input type="text" name="messages" size="15" pattern="[Aa-Zz]{3,}" title ="3 lettres minimum" required>
          <br><br>

<p> Nombre de places</p>            
<select name="place">
<?php
try 
{
$servername = 'localhost';
$dbname = 'covoiturage';
$user = 'covoit';
$pass = 'covoit';
          
$bdd = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8", $user, $pass);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
$sql2="SELECT nbp FROM places ";
$stmt_place_list = $bdd->prepare($sql2); 
$stmt_place_list->execute();
               
while($RQTplace_list = $stmt_place_list->fetch(PDO::FETCH_ASSOC)) 
{
echo "<option>". $RQTplace_list['nbp'] ."</option>";
}
}
catch (PDOException $erreur) 
{
echo $erreur."--".$erreur->getMessage()."\n";
die();
}
?>
</select>
<p>Formation</p>              
<select name="formation">
<?php
try 
{
$sql1="SELECT formationf FROM formation ";
$stmt_formation_list = $bdd->prepare($sql1); 
$stmt_formation_list->execute();

while($RQTformation_list = $stmt_formation_list->fetch(PDO::FETCH_ASSOC)) 
  {
      echo "<option>". $RQTformation_list['formationf'] ."</option>";
  }
}
catch (PDOException $erreur) {
echo $erreur."--".$erreur->getMessage()."\n";
die();
}
$bdd = null;
?>
</select>
<br><br>
<input type="submit" value="valider">
</body>


    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap  JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
