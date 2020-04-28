<?php require('connexion.php')?>

<html>
    <body>
    <h1><span>INSCRIRE UN ELEVE A UNE SEANCE</span></h1>
    <br><br>
    <form action="inscrire_eleve.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <label>Elève à inscrire</label>
                </div>
                <div class="col-50">
                    
                    <?php 
                        $result=mysqli_query($connect, "SELECT * FROM eleves");
                        echo "<select name='elevechoisi' required>";
                        while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo "<option value='$row[0]'>$row[2] $row[1] ($row[3])</option>";
                        }
                        echo "</select>";
                        ?>

                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label>Séance à choisir</label>
                </div>
                <div class="col-50">
                    
                    <?php 
                        echo "<select name='seancechoisie' required>";
                        $result=mysqli_query($connect, "SELECT * FROM themes INNER JOIN seances ON seances.idtheme=themes.idtheme WHERE supprime='1' AND ((jourseance>'$jour') OR (jourseance='$jour' AND debutseance>'$heure'))");
                        while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                            $pluriels="places restantes";
                            if (($row[10]==1) or ($row[10]==0)) {$pluriels="place restante";}
                            echo "<option value='$row[4]'>$row[1] : le $row[5], début de séance à $row[6], fin de séance à $row[7], $row[10] $pluriels / $row[8] max</option>"; // PLACES RESTANTES
                        }
                        echo "</select>";
                        mysqli_close($connect);
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

