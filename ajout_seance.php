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
                <label>Choisir un thème parmis ceux existants</label>
            </div>
            <div class="col-50">

            <?php 
                $dbhost='localhost';
                $dbuser='root';
                $dbpass='';
                $dbname='autoecole';
                $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
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
               <input type="date" name="debutseance" required>
            </div>
        </div>
        <div class="row">
            <div class="col-20">
                <label>Effectif maximum</label>
            </div>
            <div class="col-50">
               <input type="text" name="effmax" placeholder="20" pattern="[0-9][0-9]+" required>
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
