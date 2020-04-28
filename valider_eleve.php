<?php require('connexion.php')?>

<?php

    $nom=$_POST['nom'];
    $nomsql=mysqli_real_escape_string($connect, $nom);

    $prenom=$_POST['prenom'];
    $prenomsql=mysqli_real_escape_string($connect, $prenom);

    $date_de_naissance=$_POST['date_de_naissance'];

    $ajouter="INSERT INTO eleves VALUES (NULL, "."'$nomsql'".","."'$prenomsql'".","."'$date_de_naissance'".","."'$date')";
    
    echo "<h1><span>AJOUTER UN ELEVE</span></h1>";
    echo "<br><br>";

    echo "<div class='container'>";
        echo "Merci pour votre participation, votre demande d'ajout va être traitée dans les plus brefs délais.";

        $result=mysqli_query($connect, $ajouter);
        if (!$result) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}

        mysqli_close($connect);

        echo "<br><br>Récapitulatif de vos informations : " . "<br>
        Date d'inscription : " . "$date" . "<br>
        Nom : " . "$nom" . "<br>
        Prénom : " . "$prenom" . "<br>
        Date de naissance : " . "$date_de_naissance";
    echo "</div>";

?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>