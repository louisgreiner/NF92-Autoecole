<?php require('connexion.php')?>

<html>

<body>
<h1><span>AJOUTER UNE SEANCE</span></h1>
<br><br>
    <form action="ajouter_seance.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <label>Séances futures déjà existantes</label>
                </div>
                <div class="col-50">

                    <?php 

                        echo "<TABLE border=3px>";
                        echo "<TR align='center'><TD>Thème</TD><TD>Descriptif</TD><TD>Jour de la séance</TD><TD>Horaire</TD><TD>Places</TD></TR>";
                        $result=mysqli_query($connect, "SELECT * FROM themes INNER JOIN seances ON seances.idtheme=themes.idtheme WHERE supprime=1 AND ((jourseance>'$jour') OR (jourseance='$jour' AND finseance>='$heure')) ORDER BY seances.jourseance ASC");
                        while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo "<TR><TD>$row[1]</TD><TD>$row[3]</TD><TD>$row[5]</TD><TD>$row[6] jusque $row[7]</TD><TD>$row[10] places restantes sur $row[8] maximum</TD></TR>";
                        }
                        echo "</TABLE>";

                    ?>
                        
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label>Choisir un thème parmis ceux existants</label>
                </div>
                <div class="col-50">

                    <?php 

                        $result=mysqli_query($connect, "SELECT * FROM themes WHERE supprime='1'");
                        echo "<select name='idtheme' required>";
                        while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                        echo "</select>";

                        mysqli_close($connect);
                    ?>

                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label>Horaire du début de la séance</label>
                </div>
                <div class="col-50">
                    <?php
                    echo "<input type='date' name='jourseance' min='$jour' required>";
                    ?>
                    <input type="time" name="debutseance" min="8:00" max="19:00" required>
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label>Durée de la séance</label>
                </div>
                <div class="col-50">
                    <input type="radio" name="duree" value="00:45:00" required>0h45 -
                    <input type="radio" name="duree" value="01:00:00" required>1h00 -
                    <input type="radio" name="duree" value="01:15:00" required>1h15 -
                    <input type="radio" name="duree" value="01:30:00" required>1h30
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label>Effectif maximum</label>
                </div>
                <div class="col-50">
                <input type="text" name="effmax" placeholder="20" pattern="[0-9]+" required>
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