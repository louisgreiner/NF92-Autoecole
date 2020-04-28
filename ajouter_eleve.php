<?php require('connexion.php')?>

<?php

    $nom=$_POST['nom'];
    $nomsql=mysqli_real_escape_string($connect, $nom);

    $prenom=$_POST['prenom'];
    $prenomsql=mysqli_real_escape_string($connect, $prenom);

    $date_de_naissance=$_POST['date_de_naissance'];


    $ajouter="INSERT INTO eleves VALUES (NULL, "."'$nomsql'".","."'$prenomsql'".","."'$date_de_naissance'".","."'$date')";
    $select="SELECT * FROM eleves WHERE nom='$nomsql' AND prenom='$prenomsql'";
    $exist=0;

    echo "<h1><span>AJOUTER UN ELEVE</span></h1>";
    echo "<br><br>";

    if (empty($nom) or empty($prenom) or empty($date_de_naissance)) {
        echo "<div class='container'>";
            echo "<br> Un des champs n'a pas été rempli. Vous allez être redirigé vers la page précédente.";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
        echo "</div>";
    }

    if (!$selectionner=mysqli_query($connect, $select)) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
    else {
        while ($row=mysqli_fetch_array($selectionner, MYSQLI_NUM)) {
            ++$exist;
        }
        if ($exist>0) {
            echo "<div class='container'>";
                echo "<div class='row'>";
                    echo "<label>Il existe déjà un compte avec les mêmes nom et prénom.<br>Voulez-vous valider l'inscription?</label>";
                echo "</div>";
                echo "<div class='row'>";
                    echo "<div class='col-20'>";
                        echo "<A HREF=ajout_eleve.html class='button' TARGET=accueil><button>Annuler</button></A>";
                    echo "</div>";
                    echo "<div class='col-50'>";
                        echo "<form action='valider_eleve.php' method='POST'>";
                            echo "<input type='hidden' name='nom' value='$nom'>";
                            echo "<input type='hidden' name='prenom' value='$prenom'>";
                            echo "<input type='hidden' name='date_de_naissance' value='$date_de_naissance'>";
                            echo "<input type='submit' value='Valider'><br>";
                        echo "</form>";
                    echo"</div>";
                echo "</div>";
        }
        else {
            echo "<div class='container'>";
            echo "Merci pour votre participation, votre demande d'incription va être traitée dans les plus brefs délais.<br>";
            $result=mysqli_query($connect, $ajouter);
            if (!$result) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
        }
        echo "<br>Récapitulatif de vos informations : " . "<br>
        Date d'inscription : " . "$date" . "<br>
        Nom : " . "$nom" . "<br>
        Prénom : " . "$prenom" . "<br>
        Date de naissance : " . "$date_de_naissance";
        echo "</div>";

    }
    mysqli_close($connect);
?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>
