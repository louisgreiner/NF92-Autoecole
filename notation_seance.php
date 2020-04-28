<?php require('connexion.php')?>

<html>
    <body>
    <h1><span>RENTRER LES NOTES D'UNE SEANCE PASSEE</span></h1>
    <br><br>
    <form action="noter_seance.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <label>Choisir la séance à noter</label>
                </div>
                <div class="col-50">
                    
                    <?php 
                        $selectseance=mysqli_query($connect, "SELECT * FROM themes INNER JOIN seances ON seances.idtheme=themes.idtheme WHERE supprime=1 AND ((jourseance<'$jour') OR (jourseance='$jour' AND finseance<'$heure'))");
                        echo "<select name='seancechoisie' required>";
                        while ($row=mysqli_fetch_array($selectseance, MYSQLI_NUM)) {
                            echo "<option value='$row[4]'>Séance du $row[5], à $row[6] (sur le thème $row[1])</option>";
                        }
                        echo "</select>";
                        ?>

                </div>
            </div>
            <div class="row">
                <input type="submit" value="Terminé"><br>
            </div>
        </div>
    </form>

    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
    </body>
</html>
