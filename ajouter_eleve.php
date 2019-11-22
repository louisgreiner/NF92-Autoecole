<?php
    date_default_timezone_set('Europe/Paris');
    $date=date("Y/m/d H:i:s");
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $date_de_naissance=$_POST['date_de_naissance'];
    //$ville=$_POST['ville'];
   // $adresse_postale=$_POST['adresse_postale'];
    //$telephone=$_POST['telephone'];
    //$sexe=$_POST['sexe'];
    //$adresse_mail=$_POST['adresse_mail'];

    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='autoecole';
    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $query="INSERT INTO eleves VALUES (NULL, "."'$nom'".","."'$prenom'".","."'$date_de_naissance'".","."'$date')";
    // VERIFICATION echo "<br>$query<br>";


    if (empty($nom) or empty($prenom) or empty($date_de_naissance)) { // or empty($ville) or empty($adresse_postale) or empty($telephone) or empty($sexe) or empty($adresse_mail)) {
        echo "<br> Me prends pas pour un con, un des champs n'est pas rempli";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
    }   
    else {
        echo "<br> Merci pour votre participation, votre demande d'incription va être traitée dans les plus brefs délais.<br>";

        $result=mysqli_query($connect, $query);
        if (!$result) { echo "<br>pas bon".mysqli_error($connect);}

        //$fp = fopen('eleve.txt', 'a+');
        //fwrite($fp, $date." : ". $nom.", ". $prenom.", ". $date_de_naissance. ", ". $ville. ", ". $adresse_postale. ", ". $telephone. ", ". $sexe. ", ". $adresse_mail. PHP_EOL);
        // fclose($fp);
    }
    mysqli_close($connect);

    echo "Récapitulatif de vos informations : " . "<br>Date d'inscription : " . "$date" . "<br>Nom : " . "$nom" . "<br>Prénom : " . "$prenom" . "<br>Date de naissance : " . "$date_de_naissance"; // . "<br>Ville : " . "$ville" . "<br>Adresse postale : " . "$adresse_postale" . "<br>Téléphone : " . "$telephone" . "<br>Sexe : " . "$sexe" . "<br>Adresse mail : " . "$adresse_mail"; 
?>


<html>
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>