<?php require('connexion.php')?>

<?php

    $jourseance=$_POST['jourseance'];
    $debutseance=$_POST['debutseance'];
    $duree=$_POST['duree'];
    $finseance=$_POST['finseance'];
    $effmax=$_POST['effmax'];
    $idtheme=$_POST['idtheme'];

    $changementnomtheme=mysqli_query($connect, "SELECT nom FROM themes WHERE idtheme=$idtheme");
    $nomtheme=mysqli_fetch_array($changementnomtheme, MYSQLI_NUM);

    $ajouter="INSERT INTO seances VALUES (NULL, "."'$jourseance'".", "."'$debutseance'".", "."'$finseance'".", "."'$effmax'".", "."'$idtheme'".", "."'$effmax')";

    echo "<h1><span>AJOUTER UNE SEANCE</span></h1>";
    echo "<br><br>";

    echo "<div class='container'>";
        echo "Merci pour votre participation, votre demande d'ajout va être traitée dans les plus brefs délais.<br>";

        $result=mysqli_query($connect, $ajouter);
        if (!$result) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}

        mysqli_close($connect);

        echo "<br>Récapitulatif des informations de la séance : " . "<br>
        Thème de la séance : " . " $nomtheme[0] " . "<br>
        Horaire de la séance : " . "$jourseance à $debutseance" . " <br>
        Durée : " . "$duree" . " <br>
        Donc fin de séance à : " . " $finseance[0] " . " <br>
        Effectif maximum : " . "$effmax";
    echo "</div>";

?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>