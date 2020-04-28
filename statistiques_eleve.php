<?php require('connexion.php')?>

<html>

<body>
<h1><span>STATISTIQUES</span></h1>
<br><br>
    <form action="ajouter_seance.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <label>Statistiques</label>
                </div>
                <div class="col-50">

                    <?php 

                        echo "<TABLE border=3px>";
                        echo "<TR><TD>Thème</TD><TD>Descriptif</TD><TD>Nombre de participation à ce thème</TD><TD>Nombre de séances</TD><TD>Fautes en moyenne</TD><TD>Pourcentage de réussite</TD><TD>Minimum</TD><TD>Maximum</TD></TR>";
                        $selectthemes=mysqli_query($connect, "SELECT * FROM themes WHERE supprime='1'");
                        while ($row=mysqli_fetch_array($selectthemes, MYSQLI_NUM)) {
                            $selectmoyenne=mysqli_query($connect, "SELECT * FROM inscription, seances WHERE idtheme=$row[0] AND inscription.idseance=seances.idseance AND inscription.note<>'-1'");
                            $nbligne=mysqli_num_rows($selectmoyenne);
                            if ($nbligne==0) {
                                $moyenne='-';
                                $nbparticipations=0;
                                $pourcentage='-';
                            }
                            else
                            {
                                $moyenne=0;
                                $nbparticipations=0;
                                $reussite=0 ;
                                while ($rowmoyenne=mysqli_fetch_array($selectmoyenne, MYSQLI_NUM))
                                    { 
                                        $moyenne=$moyenne+$rowmoyenne[2];
                                        $nbparticipations=$nbparticipations+1;
                                        if($rowmoyenne[2]<=5) {
                                            $reussite=$reussite+1;
                                        }
                                    }
                                $moyenne=$moyenne/$nbparticipations ;	
                                $moyenne=round($moyenne, 2);
                                $pourcentage=round(($reussite/$nbparticipations)*100, 0).'%';
                            }
                            $selectnbseances=mysqli_query($connect, "SELECT * FROM inscription, seances WHERE idtheme=$row[0] GROUP BY seances.idseance");
                            $nbseances=mysqli_num_rows($selectnbseances);
                            $notes=mysqli_query($connect, "SELECT inscription.note FROM inscription, seances WHERE inscription.note<>'-1' AND idtheme=$row[0] AND seances.idseance=inscription.idseance");
                            $min=41 ;
                            $max=0;
                            while ($rownotes=mysqli_fetch_array($notes, MYSQL_NUM)) { 
                                    if ($rownotes[0]<$min) {
                                        $min=$rownotes[0];
                                    }
                                    if ($rownotes[0]>$max) {
                                        $max=$rownotes[0];
                                    }
                                }
                            if ($min==41) {
                                $min='-';
                            }
                            // if (($max==0) and ($min==0) and ($moyenne==0)){
                            //     $max='-';
                            // }
                            echo "<TR><TD>$row[1]</TD><TD>$row[3]</TD><TD>$nbparticipations</TD><TD>$nbseances</TD><TD>$moyenne</TD><TD>$pourcentage</TD><TD>$min</TD><TD>$max</TD></TR>";
                        }
                        echo "</TABLE>";

                    ?>
                    
                </div>
            </div>
        </div>
    </form>

    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</body>
</html>