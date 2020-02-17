<?php

$mail = $_POST['mail'];
$mdp = $_POST['mdp'];

$servername = 'localhost';
$dbname = 'covoiturage';
$user = 'root';
$pass = '';

try {
    
    $bdd = new PDO ("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($bdd->query('SELECT nomu, prenomu FROM utilisateurs WHERE mailu= "'.$mail.'" AND mdpu="'.$mdp.'"') as $row) {

        $nom = $row[0];
        $prenom = $row[1];
    }
    echo 'Bonjour '.$nom.' '.$prenom;

    $bdd = null;

} catch (PDOException $erreur) {
    echo $erreur."--".$erreur->getMessage()."\n";
    die();
}
