<?php require('connexion.php')?>

<!DOCTYPE html>

<?php

    $supprimer=$_POST['supprimer'];
    $i=0;
    $n=sizeof($_POST['supprimer']);

    echo "<h1><span>SUPPRIMER UN THEME EXISTANT</span></h1>";
    echo "<br><br>";
    $selectinscriptions=mysqli_query($connect, "SELECT * from seances 
    INNER JOIN inscription ON seances.idseance=inscription.idseance WHERE seances.idtheme='$supprimer[$i]' AND ((jourseance>'$jour') OR (jourseance='$jour' AND debutseance>'$heure'))");

    while ($i<$n) {

        if (!$supprimertheme=mysqli_query($connect, "UPDATE themes set supprime='' WHERE idtheme='$supprimer[$i]'")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
        // if (!$selectinscriptions=mysqli_query($connect, "SELECT * from seances INNER JOIN inscription ON seances.idseance=inscription.idseance WHERE seances.idtheme='$supprimer[$i]' AND ((jourseance>'$jour') OR (jourseance='$jour' AND debutseance>'$heure'))")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
        // while ($row=mysqli_fetch_array($selectinscriptions, MYSQLI_NUM)) {
        //     if (!$supprimerinscriptions=mysqli_query($connect, "DELETE FROM inscription WHERE idseance='$row[0]'")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
        // }
        // if (!$supprimerseance=mysqli_query($connect, "DELETE FROM seances WHERE idtheme='$supprimer[$i]' AND ((jourseance>'$jour') OR (jourseance='$jour' AND debutseance>'$heure'))")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}

        $i++;
    }
    echo "<div class='container'>";
        if ($n==1) {
            echo "Merci pour votre participation, le thème choisi a bien été supprimé (temporairement)."; // OU EN CASCADE INSCRIPTIONS ET SEANCES AUSSI
        }
        if ($n<>1) {
            echo "Merci pour votre participation, les " . $n . " thèmes choisis ont bien été supprimés (temporairement).";
        }
    echo "</div>";
    mysqli_close($connect);
?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>