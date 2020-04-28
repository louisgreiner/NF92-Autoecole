<?php require('connexion.php')?>

<?php

    $nom_theme=$_POST['nom_theme'];
    $nom_themesql=mysqli_real_escape_string($connect, $nom_theme);

    $descriptif=$_POST['descriptif'];
    $descriptifsql=mysqli_real_escape_string($connect, $descriptif);

    $result=mysqli_query($connect, "UPDATE themes set supprime='1' WHERE nom='$nom_themesql' OR descriptif='$descriptifsql'");

    echo "<h1><span>AJOUTER UN THEME</span></h1>";
    echo "<br><br>";

    echo "<div class='container'>";
        if (!$result) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}

        echo "<br> Merci pour votre participation, votre demande d'ajout va être traitée dans les plus brefs délais.";

        mysqli_close($connect);

        echo "<br>Récapitulatif du thème réactivé : " . "<br>
        Nom du thème : " . "$nom_theme" . "<br>
        Descriptif : " . "$descriptif";
    echo "</div>";
    
?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>