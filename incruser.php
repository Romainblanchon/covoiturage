<?php
    //Récupération des données saisies en html
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $mdp = $_POST['mdp'];
    $message = $_POST['messages'];
    $formation = $_POST['formation'];
    $place = $_POST['place'];
    $grain = "7$*@]267Ytui14p482exYU142674!:;,²&é-è_ç";
    $mdpcrypt = sha1(sha1($mdp).$grain);
    $servername = 'localhost';
    $dbname = 'covoiturage';
    $user = 'covoit';
    $pass = 'covoit';
        try 
        {
            $bdd = new PDO ("mysql:host=$servername;dbname=$dbname",$user,$pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1="SELECT idp FROM places WHERE nbp = '$place'";
            $nbplace = $bdd->prepare($sql1);  
            $nbplace->bindParam(':nbp',$place);
            $nbplace->execute();
            $idp = $nbplace->setFetchMode(PDO::FETCH_NUM);
            echo 'idp : '.$idp.'<br>';
    
            $sql2="SELECT idf FROM formation WHERE formationf = '$formation'";
            $form = $bdd->prepare($sql2); 
            $form->bindParam(':formationf',$formation); 
            $form->execute();
            $idf = $form->setFetchMode(PDO::FETCH_NUM);
            echo 'idf : '.$idf.'<br>';
        
            $sql="INSERT INTO utilisateurs ( idf, idp, nomu, prenomu, mailu, adresseu, cpu, villeu, mdpu, messagesu)
            VALUES (:idf, :idp,:nom, :prenom, :mail, :adresse, :cp, :ville, :mdp, :messages)";
            $inscription = $bdd->prepare($sql);  
            $inscription->bindParam(':idf',$idf);
            $inscription->bindParam(':idp',$idp);
            $inscription->bindParam(':nom',$nom);
            $inscription->bindParam(':prenom',$prenom);
            $inscription->bindParam(':mail',$mail);
            $inscription->bindParam(':adresse',$adresse);
            $inscription->bindParam(':cp',$cp);
            $inscription->bindParam(':ville',$ville);
            $inscription->bindParam(':mdp',$mdp);
            $inscription->bindParam(':messages',$message);
            $inscription->execute();
            echo "Insertion BDD réussie";
            $bdd = null; 
            header('location:inscription.php');
        } 
        catch (PDOException $erreur)
        {
        echo $erreur."--".$erreur->getMessage()."\n";
            die();
        }
        $bdd =null;