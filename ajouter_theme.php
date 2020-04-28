<?php require('connexion.php')?>

<?php

    $nom_theme=$_POST['nom_theme'];
    $nom_themesql=mysqli_real_escape_string($connect, $nom_theme);

    $descriptif=$_POST['descriptif'];
    $descriptifsql=mysqli_real_escape_string($connect, $descriptif);
    
    $var=TRUE;

    $ajout="INSERT INTO themes VALUES (NULL, "."'$nom_themesql'".", "."'$var'".", "."'$descriptifsql')";
    $selectactive="SELECT * FROM themes WHERE nom='$nom_themesql' OR descriptif='$descriptifsql' HAVING supprime='1'";
    $selectdesactive="SELECT * FROM themes WHERE nom='$nom_themesql' OR descriptif='$descriptifsql' HAVING supprime='0'";
    $exist=0;

    echo "<h1><span>AJOUTER UN ELEVE</span></h1>";
    echo "<br><br>";

    if (empty($nom_theme) or empty($descriptif)) {
        echo "<div class='container'>";
            echo "<br> Un des champs n'a pas été rempli. Vous allez être redirigé vers la page précédente.";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
        echo "</div>";
    }
  
    if (!$selectionnerdesactive=mysqli_query($connect, $selectdesactive)) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
    else {
        while ($row=mysqli_fetch_array($selectionnerdesactive, MYSQLI_NUM)) {
            $exist++;
        }
        if ($exist>0) {
            echo "<div class='container'>";
                echo "<div class='row'>";
                    echo "<label>Il existe déjà un thème désactif avec un nom ou un descriptif identique.<br>Voulez-vous réactiver ce thème?</label>";
                echo "</div>";
                echo "<div class='row'>";
                    echo "<div class='col-20'>";
                        echo "<A HREF=ajout_theme.html class='button' TARGET=accueil><button>Annuler</button></A>";
                    echo "</div>";
                    echo "<div class='col-50'>";
                        echo "<form action='valider_theme.php' method='POST'>";
                            echo "<input type='hidden' name='nom_theme' value='$nom_theme'>";
                            echo "<input type='hidden' name='descriptif' value='$descriptif'>";
                            echo "<input type='submit' value='Valider'><br>";
                        echo "</form>";
                    echo"</div>";
                echo "</div>";
            echo "</div>";
        }
    
        else {
            if (!$selectionneractive=mysqli_query($connect, $selectactive)) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}

            else {
                while ($row=mysqli_fetch_array($selectionneractive, MYSQLI_NUM)) {
                $exist++;
                }
                if ($exist>0) {
                    echo "<div class='container'>";
                        echo "<div class='row'>";
                            echo "<label>Il existe déjà un thème actif avec un nom ou un descriptif identique. Vous ne pouvez pas créer un doublon de ce thème. <br>Vous allez être redirigé vers la page précédente.</label>";
                            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_theme.html">';
                        echo "</div>";
                    echo "</div>";
                }
                else {
                    echo "<div class='container'>";
                        echo "Merci pour votre participation, votre ajout de thème va être traité dans les plus brefs délais.";
                        $result=mysqli_query($connect, $ajout);
                        if (!$result) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
                        else {
                            echo "<br>Récapitulatif : " . "<br>Date de création : " . "$date" . "<br>Nom du thème : " . "$nom_theme" . "<br>Descriptif : " . "$descriptif";
                        }
                    echo "</div>";
                }
            }
        }
    }
    mysqli_close($connect);
?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>