<?php
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='autoecole';
    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

    $jourseance=$_POST['jourseance'];
    $debutseance=$_POST['debutseance'];
    $duree=$_POST['duree'];
    $effmax=$_POST['effmax'];
    $choixtheme=$_POST['choixtheme'];

    switch($duree){
        case 45:
            $duree="00:45";
            break;
        case 60:
            $duree="01:00";
            break;
        case 75:
            $duree="01:15";
            break;
        case 90:
            $duree="01:30";
            break;
    }

    $finseance=gmdate('H:i', strtotime($debutseance) + strtotime($duree));

  //  $finseance=date("H:i", strtotime($debutseance) + strtotime($duree));
    echo ".......________________.." . $finseance;

if (empty($_POST['jourseance']) or empty($_POST['debutseance']) or empty($_POST['duree']) or empty($_POST['effmax']) or empty($_POST['choixtheme'])) {
    echo "<br> Me prends pas pour un con, un des champs n'est pas rempli";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
}
else {
    $query="INSERT INTO seances VALUES (NULL, "."'$jourseance'".", "."'$debutseance'".", "."'$finseance'".", "."'$effmax'".", "."'$choixtheme')";
    $result=mysqli_query($connect, $query);
    if (!$result) {
        echo "<br>Y'a une couille:<br>".mysqli_error($connect);
    }
    else {
        echo "<br> Merci pour votre participation, votre demande d'inscription va être traitée dans les plus brefs délais.<br>";
        echo "Récapitulatif de vos informations : " . "<br>Jour de la séance : " . "$jourseance" . "<br>Horaire du début de séance : " . "$debutseance" . "<br>Horaire de la fin de séance : " . "$finseance" . "<br>Effectif max : " . "$effmax"; // . "<br>Ville : " . "$ville" . "<br>Adresse postale : " . "$adresse_postale" . "<br>Téléphone : " . "$telephone" . "<br>Sexe : " . "$sexe" . "<br>Adresse mail : " . "$adresse_mail"; 

    }
}
    mysqli_close($connect);
?>

<html>
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>