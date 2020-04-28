<?php require('connexion.php')?>

                                 
<html>
<body>
    <h1><span>DESINCRIRE UN ELEVE D'UNE SEANCE</span></h1>
    <br><br>
    <form action="desinscrire_eleve.php" method="POST">
    <div class="container">

        <?php 

    $elevechoisi=$_POST['elevechoisi'];
    $selectseances="SELECT * FROM inscription   INNER JOIN seances ON inscription.idseance=seances.idseance 
                                                INNER JOIN themes ON seances.idtheme=themes.idtheme 
                                                WHERE inscription.ideleve='$elevechoisi' AND ((jourseance>'$jour') OR (jourseance='$jour' AND debutseance>='$heure'))
                                                ORDER BY seances.jourseance ASC";
    $selectionnerseances=mysqli_query($connect, $selectseances);

    $selectidentite="SELECT * FROM eleves WHERE ideleve='$elevechoisi'";
    $selectionneridentite=mysqli_query($connect, $selectidentite);
    $identite=mysqli_fetch_array($selectionneridentite, MYSQLI_NUM);
    $existseance=0;

            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Elève</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo "$identite[1] $identite[2] ($identite[3])";
                    echo "<input type='hidden' name='elevechoisi' value='$elevechoisi'>";
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Se désinscrire de la séance de code future...</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo "<select name='seancechoisie' required>";
                    while ($row=mysqli_fetch_array($selectionnerseances, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[11], le $row[4], de $row[5] à $row[6]</option>";
                        $existseance=1;
                    }
                    echo "</select>";
                echo "</div>";
            echo "</div>";
            if ($existseance==0){
                echo "<div class='row'>";
                    echo "<label>L'élève n'est inscrit à une séance future.</label>";
                echo "</div>";
            }

            mysqli_close($connect);

        ?>

        <div class="row">
            <input type="submit" value="Terminé"><br>
        </div>
    </div>
</body>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>