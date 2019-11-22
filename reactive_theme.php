<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <title>Réactiver un thème</title>
  </head>
</html>

  <body>
    <br><br>
  <form action="reactiver_theme.php" method="POST">
    <div class="container">
      <div class="row">
        <div class="col-20">
          <label>Thèmes supprimés</label>
        </div>
        <div class="col-50">

          <?php 
            $dbhost='localhost';
            $dbuser='root';
            $dbpass='';
            $dbname='autoecole';
            $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
            $result=mysqli_query($connect, "SELECT * FROM themes WHERE supprime='0'");
            echo "Choisir quoi réactiver<select name='supprimer[]' size='4' multiple required>";
            while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
              echo "<option value='$row[0]'>$row[1]</option>";
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
