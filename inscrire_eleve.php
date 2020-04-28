<?php require('connexion.php')?>

<?php 

    $elevechoisi=$_POST['elevechoisi'];
    $seancechoisie=$_POST['seancechoisie'];

    $select="SELECT * FROM inscription WHERE idseance='$seancechoisie' AND ideleve='$elevechoisi'";
    $exist=0;
    $full=0;

    echo "<h1><span>INSCRIRE UN ELEVE A UNE SEANCE</span></h1>";
    echo "<br><br>";

    if (empty($elevechoisi) or empty($seancechoisie)) {
        echo "<div class='container'>";
            echo "Un des champs n'a pas été rempli. Vous allez être redirigé vers la page précédente.";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./inscription_eleve.php">';
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
                    echo "<label>Cet élève est déjà inscrit à cette séance. Vous allez être redirigé vers la page précédente.</label>";
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./inscription_eleve.php">';
                echo "</div>";
            echo "</div>";
        }
        else {
            $compare="SELECT * FROM seances WHERE idseance='$seancechoisie' HAVING placesrestantes=0";
            if (!$comparer=mysqli_query($connect, $compare)) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
            else {
                while($row=mysqli_fetch_array($comparer, MYSQLI_NUM)){
                    ++$full;
                }
                if ($full>0) {
                    echo "<div class='container'>";
                        echo "<div class='row'>";
                            echo "<label>Cette séance est pleine. Veuillez choisir une autre séance.<br>Vous aller être redirigé vers la page précédente.</label>";
                            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./inscription_eleve.php">';
                        echo "</div>";
                    echo "</div>";
                }
                else {
                    echo "<div class='container'>";
                        echo "Merci pour votre participation, votre demande d'inscription à la séance va être traitée dans les plus brefs délais.";
                        $inscrire="INSERT INTO inscription VALUES ('$seancechoisie'".","."'$elevechoisi'".","."'-1')";
                        $inscription=mysqli_query($connect, $inscrire);
                        if (!$inscription) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
                        $effectif=mysqli_query($connect, "UPDATE seances set placesrestantes=placesrestantes-1 WHERE idseance=$seancechoisie");
                        if (!$effectif) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
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