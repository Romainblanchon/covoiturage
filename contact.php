<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$mail = $_POST['mail'];
$jour = date("y.m.d");
$heure = date("H:i:s");
$objet = $_POST['objet'];
$message = $_POST['message'];
echo "$jour";


$servername = 'localhost';
$dbname = 'ecom';
$user = 'root';
$pass = '';

try {
    echo "Connexion BDD\n";
    $bdd = new PDO ("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Requete insertion\n";
    $bddprepare = $bdd->prepare(
        "INSERT INTO contact (nom,prenom,telephone,mail,jour,heure,objet,messages)
        VALUES (:Nom, :Prenom, :Tel, :Mail, :Jour, :Heure, :Objet, :Messages)");
    $bddprepare->bindParam(':Nom',$nom);
    $bddprepare->bindParam(':Prenom',$prenom);
    $bddprepare->bindParam(':Tel',$telephone);
    $bddprepare->bindParam(':Mail',$mail);
    $bddprepare->bindParam(':Jour',$jour);
    $bddprepare->bindParam(':Heure',$heure);
    $bddprepare->bindParam(':Objet',$objet);
    $bddprepare->bindParam(':Message',$message);
    $bddprepare->execute();

    echo "Insertion BDD réussie";
    $bdd = null;
    header('location:index.html');

    
} catch (PDOException $erreur) {
    echo $erreur."--".$erreur->getMessage()."\n";
    die();
}
header('location:contact.html');
