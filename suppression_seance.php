<?php require('connexion.php')?>

<html>
    <body>
    <h1><span>SUPPRIMER UNE SEANDE DE CODE FUTURE</span></h1>
    <br><br>
    <form action="supprimer_seance.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <label>Supprimer la séance...</label>
                </div>
                <div class="col-50">
                    
                    <?php 
                        $result=mysqli_query($connect, "SELECT * FROM seances INNER JOIN themes ON seances.idtheme=themes.idtheme WHERE jourseance>'$jour' OR (jourseance='$jour' AND debutseance>='$heure')");
                        echo "<select name='seancechoisie' required>";
                        while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                            $inscrits=$row[4]-$row[6];
                            $pluriels="inscrits";
                            if (($inscrits==1) or ($inscrits==0)) {$pluriels="inscrit";}
                            echo "<option value='$row[0]'>$row[8], le $row[1], de $row[2] à $row[3] ($inscrits $pluriels / $row[4])</option>";
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

