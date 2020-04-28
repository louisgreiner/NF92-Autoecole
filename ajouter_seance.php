<?php require('connexion.php')?>

<?php
    $jourseance=$_POST['jourseance'];
    $debutseance=$_POST['debutseance'];
    $duree=$_POST['duree'];
    $effmax=$_POST['effmax'];
    $idtheme=$_POST['idtheme'];

    $changementduree=mysqli_query($connect, "SELECT ADDTIME('$debutseance', '$duree')");
    $finseance=mysqli_fetch_array($changementduree, MYSQLI_NUM);

    $changementnomtheme=mysqli_query($connect, "SELECT nom FROM themes WHERE idtheme=$idtheme");
    $nomtheme=mysqli_fetch_array($changementnomtheme, MYSQLI_NUM);

    $ajouter="INSERT INTO seances VALUES (NULL, "."'$jourseance'".", "."'$debutseance'".", "."'$finseance[0]'".", "."'$effmax'".", "."'$idtheme'".", "."'$effmax')";
    $select="SELECT * FROM seances WHERE idtheme='$idtheme' AND jourseance='$jourseance'";
    $exist=0;

    echo "<h1><span>AJOUTER UN ELEVE</span></h1>";
    echo "<br><br>";

    if (empty($jourseance) or empty($debutseance) or empty($duree) or empty($effmax) or empty($idtheme)) {
        echo "<div class='container'>";
            echo "Un des champs n'a pas été rempli. Vous allez être redirigé vers la page précédente.";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_seance.html">';
        echo "</div>";
    }

    if (!is_numeric($effmax)) {
        echo "<div class='container'>";
            echo "C'est pas aux vieux singes qu'on apprend à contourner des restrictions html. <br> Vous allez être redirigé vers la page précédente.";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
        echo "</div>";
    }
    else{
      if (!$selectionner=mysqli_query($connect, $select)) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
      else {
          while ($row=mysqli_fetch_array($selectionner, MYSQLI_NUM)) {
              $exist++;
          }
          if ($exist>0) {
              echo "<div class='container'>";
                  echo "<div class='row'>";
                      echo "<label>Il existe déjà une séance avec ce thème ce jour-là.<br>Voulez-vous valider la création de séance?</label>";
                  echo "</div>";
                  echo "<div class='row'>";
                      echo "<div class='col-20'>";
                          echo "<A HREF=ajout_seance.php class='button' TARGET=accueil><button>Annuler</button></A>";
                      echo "</div>";
                      echo "<div class='col-50'>";
                          echo "<form action='valider_seance.php' method='POST'>";
                              echo "<input type='hidden' name='jourseance' value='$jourseance'>";
                              echo "<input type='hidden' name='debutseance' value='$debutseance'>";
                              echo "<input type='hidden' name='duree' value='$duree'>";
                              echo "<input type='hidden' name='finseance' value='$finseance[0]'>";
                              echo "<input type='hidden' name='effmax' value='$effmax'>";
                              echo "<input type='hidden' name='idtheme' value='$idtheme'>";
                              echo "<input type='submit' value='Valider'><br>";
                          echo "</form>";
                      echo"</div>";
                  echo "</div>";
          }
          else {
              echo "<div class='container'>";
                  echo "Merci pour votre participation, la création de séance va être traitée dans les plus brefs délais.<br>";
                  $result=mysqli_query($connect, $ajouter);
                  if (!$result) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
          }
          echo "<br>Récapitulatif des informations de la séance : " . "<br>
          Thème de la séance : " . " $nomtheme[0] " . "<br>
          Horaire de la séance : " . "$jourseance à $debutseance" . " <br>
          Durée : " . "$duree" . " <br>
          Donc fin de séance à : " . " $finseance[0] " . " <br>
          Effectif maximum : " . "$effmax";
          echo "</div>";
      }
    }
    mysqli_close($connect);
?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>
