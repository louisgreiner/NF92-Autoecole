<?php require('connexion.php')?>

                                 
<html>
<body>
    <h1><span>CONSULTER LES DONNEES D'UN ELEVE</span></h1>
    <br><br>
    <div class="container">

        <?php 

            $elevechoisi=$_POST['elevechoisi'];
            $selecteleve="SELECT * FROM eleves  INNER JOIN inscription ON eleves.ideleve=inscription.ideleve 
                                                INNER JOIN seances ON inscription.idseance=seances.idseance 
                                                INNER JOIN themes ON seances.idtheme=themes.idtheme 
                                                WHERE eleves.ideleve='$elevechoisi' AND ((jourseance<'$jour') OR (jourseance='$jour' AND finseance<='$heure'))
                                                ORDER BY seances.jourseance ASC";
            $selectionnereleve=mysqli_query($connect, $selecteleve);

            $selectidentite="SELECT * FROM eleves WHERE ideleve='$elevechoisi'";
            $selectionneridentite=mysqli_query($connect, $selectidentite);
            $identite=mysqli_fetch_array($selectionneridentite, MYSQLI_NUM);
            $existseance=0;

            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Nom</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo $identite[1];
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Prénom</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo $identite[2];
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Date de naissance</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo $identite[3];
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Date d'inscription</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo $identite[4];
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-20'>";
                    echo "<label>Séances de code réalisées</label>";
                echo "</div>";
                echo "<div class='col-50'>";
                    echo "<TABLE border=3px>";
                    echo "<TR><TD>Jour séance</TD><TD>Horaire séance</TD><TD>Thème de la séance</TD><TD>Note</TD></TR>";
                    while ($row=mysqli_fetch_array($selectionnereleve, MYSQLI_NUM)) {
                        if ($row[7]==-1) {
                            $row[7]="Pas encore noté";
                        }
                        else {
                            $row[7]="$row[7] fautes (/40)";
                        }
                        echo "<TR><TD>$row[9]</TD><TD>$row[10] jusque $row[11]</TD><TD>$row[16]</TD><TD>$row[7]</TD></TD>";
                        $existseance=1;
                    }
                    if ($existseance==0){
                        echo "<TR><TD>L'élève n'a réalisé aucune séance pour l'instant.</TD><TD>-</TD><TD>-</TD><TD>-</TD></TR>";
                    }
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