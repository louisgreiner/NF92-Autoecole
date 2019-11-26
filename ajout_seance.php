<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="ajout.css">
        <title>Ajouter une séance</title>
    </head>
</html>

<body>
<br><br>
<form action="ajouter_seance.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-20">
                <label>Séances déjà existantes</label>
            </div>
            <div class="col-50">

                <?php 
                    $dbhost='localhost';
                    $dbuser='root';
                    $dbpass='';
                    $dbname='autoecole';
                    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

                    echo "<TABLE border=3px>";
                    $result=mysqli_query($connect, "SELECT * FROM themes INNER JOIN seances ON seances.idtheme=themes.idtheme");
                    while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<TR><TD>$row[1]</TD><TD>$row[3]</TD><TD>$row[5]</TD><TD>$row[6]</TD></TR>";
                    }
                    echo "</TABLE>";
                //   echo "<br>Horaire du début deazaz la séance <imput type='date' name='debutseance' required>";
                //    echo "Horaire de la fin de laazeaze séance <imput type='date' name='finseance'>";

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
                echo "<select name='choixtheme' size='4' required>";
                while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                    echo "<option value='$row[0]'>$row[1]</option>";
                }
                echo "</select>";
             //   echo "<br>Horaire du début deazaz la séance <imput type='date' name='debutseance' required>";
            //    echo "Horaire de la fin de laazeaze séance <imput type='date' name='finseance'>";

                mysqli_close($connect);
            ?>

            </div>
        </div>
        <div class="row">
            <div class="col-20">
                <label>Horaire du début de la séance</label>
            </div>
            <div class="col-50">
               <input type="date" name="jourseance" min="2019-11-25"  required>
               <input type="time" name="debutseance" min="8:00" max="19:00" required>
            </div>
        </div>
        <div class="row">
            <div class="col-20">
                <label>Durée de la séance</label>
            </div>
            <div class="col-50">
                <input type="radio" name="duree" value="45" required>0h45 -
                <input type="radio" name="duree" value="60" required>1h00 -
                <input type="radio" name="duree" value="75" required>1h15 -
                <input type="radio" name="duree" value="90" required>1h30
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
