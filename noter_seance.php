<?php require('connexion.php')?>

<?php
    $seancechoisie=$_POST['seancechoisie'];
    
    $selectnote="SELECT * FROM inscription INNER JOIN eleves ON inscription.ideleve=eleves.ideleve WHERE note!='-1' AND idseance='$seancechoisie'";
    $selectnonnote="SELECT * FROM inscription INNER JOIN eleves ON inscription.ideleve=eleves.ideleve WHERE note='-1' AND idseance='$seancechoisie'";
    $exist=0;
    $i=0;

    echo "<h1><span>RENTRER LES NOTES D'UNE SEANCE PASSEE</span></h1>";
    echo "<br><br>";

    if (empty($seancechoisie)) {
        echo "<div class='container'>";
            echo "Un des champs n'a pas été rempli. Vous allez être redirigé vers la page précédente.";
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
        echo "</div>";
    }
    else {
        if ((!$selectionnernote=mysqli_query($connect, $selectnote)) or (!$selectionnernonnote=mysqli_query($connect, $selectnonnote))) { echo "<br>Il y a une couille :<br>".mysqli_error($connect);}
        else {
            if ((mysqli_num_rows($selectionnernote)==0) and (mysqli_num_rows($selectionnernonnote)==0)) {
                echo "<div class='container'>"; 
                    echo "<div class='row'>";
                        echo "<label>Aucun élève n'a participé à cette séance.</label>";
                    echo "</div>";
                echo "</div>";
            }
            else {
            echo "<form action='noter_eleves.php' method='POST'>";
                echo "<input type='hidden' name='seancechoisie' value='$seancechoisie'>";
                echo "<div class='container'>"; 
                    echo "<div class='row'>";
                        echo "<label>Veuillez rentrer le nombre de fautes de chaque élève (entre 0 et 40, merci)</label>";
                    echo "</div>";
                    while ($row=mysqli_fetch_array($selectionnernote, MYSQLI_NUM)) {
                        echo "<div class='row'>";
                            echo "<div class='col-20'>";
                                echo "$row[5] $row[4] ($row[6]) :";
                            echo "</div>";
                            echo "<div class='col-50'>";
                                echo "<input type='hidden' name='eleve[]' value='$row[1]' multiple>";
                                echo "<input type='text' name='note[]' pattern='[0-9]+' min='0' max='40' value='$row[2]' multiple required>";
                            echo"</div>";
                        echo "</div>";
                        $i++;
                    }
                    while ($row=mysqli_fetch_array($selectionnernonnote, MYSQLI_NUM)) {
                        echo "<div class='row'>";
                            echo "<div class='col-20'>";
                                echo "$row[5] $row[4] ($row[6]) :";
                            echo "</div>";
                            echo "<div class='col-50'>";
                                echo "<input type='hidden' name='eleve[]' value='$row[1]' multiple>";
                                echo "<input type='text' name='note[]' pattern='[0-9]+' min='0' max='40' value='' multiple required>";
                            echo"</div>";
                        echo "</div>";
                        $i++;
                    }
                    echo "<div class='row'>";
                        echo "<input type='hidden' name='i' value='$i'>";
                        echo "<input type='submit' value='Terminé'>";
                    echo "</div>";
                echo "</div>";
            echo "</form>";
            }
        }
    }
    mysqli_close($connect);
?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>
