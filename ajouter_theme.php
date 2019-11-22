<?php
    date_default_timezone_set('Europe/Paris');
    $date=date("Y/m/d H:i:s");
    $nom_theme=$_POST['nom_theme'];
    $descriptif=$_POST['descriptif'];
    $var=TRUE;

    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='autoecole';
    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $query="INSERT INTO themes VALUES (NULL, "."'$nom_theme'".", "."'$var'".", "."'$descriptif')";
     echo "<br>$query<br>";


    if (empty($nom_theme) or empty($descriptif)) {
        echo "<br> Me prends pas pour un con, un des champs n'est pas rempli";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="1;URL=./ajout_eleve.html">';
    }   
    else {
        echo "<br> Merci pour votre participation, votre demande d'ajout va être traitée dans les plus brefs délais.";
        echo "<br> La date d'ajout est : "."'$date'"."<br>";

        $result=mysqli_query($connect, $query);
        if (!$result) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}

    }
    mysqli_close($connect);

    echo "Récapitulatif des informations relatives à ce nouveau thème: " . "<br>Nom du thème : " . "$nom_theme" . "<br>Descriptif : " . "$descriptif";
?>


<html>
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>