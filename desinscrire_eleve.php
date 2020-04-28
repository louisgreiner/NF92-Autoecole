<?php require('connexion.php')?>

<?php

    $seancechoisie=$_POST['seancechoisie'];
    $elevechoisi=$_POST['elevechoisi'];

    echo "<h1><span>DESINSCRIRE UN ELEVE D'UNE SEANCE</span></h1>";
    echo "<br><br>";

    if (!$desinscrire=mysqli_query($connect, "DELETE FROM inscription WHERE ideleve='$elevechoisi' AND idseance=$seancechoisie")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
    if (!$rajouter=mysqli_query($connect, "UPDATE seances SET placesrestantes=placesrestantes+1 WHERE idseance=$seancechoisie")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
    
    echo "<div class='container'>";
        echo "Merci pour votre participation, la désinscription à la séance a bien été effectuée.<br>";
    echo "</div>";

    mysqli_close($connect);

?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>