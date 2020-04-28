<?php require('connexion.php')?>

                                 
<html>
<body>
    <br><br>
    <div class="container">

        <?php 

            $elevechoisi=$_POST['elevechoisi'];
            $selectseances="SELECT * FROM inscription   INNER JOIN seances ON inscription.idseance=seances.idseance
                                                        INNER JOIN themes ON seances.idtheme=themes.idtheme 
                                                        WHERE inscription.ideleve='$elevechoisi' AND ((jourseance>'$jour') OR (jourseance='$jour' AND debutseance>'$heure'))
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
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Séances de code futures</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo "<TABLE border=3px>";
                    echo "<TR><TD>Jour séance</TD><TD>Horaire séance</TD><TD>Thème de la séance</TD></TR>";
                    while ($row=mysqli_fetch_array($selectionnerseances, MYSQLI_NUM)) {
                        echo "<TR><TD>$row[4]</TD><TD>$row[5] jusque $row[6]</TD><TD>$row[11]</TD></TR>";
                        $existseance=1;
                    }
                    if ($existseance==0){ echo "<TR><TD>L'élève n'est inscrit à aucune séance future (active).</TD><TD>-</TD><TD>-</TD></TR>";}
                    echo "</TABLE>";
                echo "</div>";
            echo "</div>";
            mysqli_close($connect);

        ?>

    </div>
</body>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>