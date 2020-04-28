<?php require('connexion.php')?>

<?php
    $seancechoisie=$_POST['seancechoisie'];
    $nbtotal=$_POST['i'];
    $i=0;
    $eleves=$_POST['eleve'];
    $notes=$_POST['note'];

    echo "<h1><span>RENTRER LES NOTES D'UNE SEANCE PASSEE</span></h1>";
    echo "<br><br>";

    while ($i!=$nbtotal) {
      if (!is_numeric($notes[$i])) {
          echo "<div class='container'>";
              echo "C'est pas aux vieux singes qu'on apprend à contourner des restrictions html. <br> Vous allez être redirigé vers la page précédente.";
              echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
          echo "</div>";
          break;
      }
      else{
        if (!$notation=mysqli_query($connect, "UPDATE inscription set note='$notes[$i]' WHERE ideleve='$eleves[$i]' AND idseance=$seancechoisie")) {echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
        $i++;
      }

    }
    echo "<div class='container'>";
        echo "Merci pour votre participation, les notes vont être mises à jour dans les plus brefs délais.<br>";
    echo "</div>";

    mysqli_close($connect);

?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>
