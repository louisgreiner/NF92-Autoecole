<?php require('connexion.php')?>

<?php
    $seancechoisie=$_POST['seancechoisie'];

    echo "<h1><span>SUPPRIMER UNE SEANCE DE CODE FUTURE</span></h1>";
    echo "<br><br>";

    if (!$supprimerseance=mysqli_query($connect, "DELETE FROM seances WHERE idseance='$seancechoisie'")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
    if (!$supprimerinscriptions=mysqli_query($connect, "DELETE FROM inscription WHERE idseance='$seancechoisie'")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}

    echo "<div class='container'>";
        echo "Merci pour votre participation, la séance de code choisie a bien été supprimée (les inscriptions à cette séance l'ont aussi été).<br>";
    echo "</div>";

    mysqli_close($connect);

?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>