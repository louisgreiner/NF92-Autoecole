<?php
    date_default_timezone_set('Europe/Paris');
    $date=date("Y/m/d H:i:s");
    if(isset($_POST['nom'])) { echo htmlentities($_POST['nom']);  else $nom=POST_['nom'];}
    $prenom=$_POST['prenom'];
    $date_de_naissance=$_POST['date_de_naissance'];
    $ville=$_POST['ville'];
    $adresse_postale=$_POST['adresse_postale'];
    $telephone=$_POST['telephone'];
    $sexe=$_POST['sexe'];
    $adresse_mail=$_POST['adresse_mail'];

    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='autoecole';
    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $query="INSERT INTO eleves VALUES (NULL, "."'$nom'".","."'$prenom'".","."'$date_de_naissance'".","."'$date'".")";
    echo "<br>$query<br>";


  /*  if (empty($nom) or empty($prenom) or empty($date_de_naissance) or empty($ville) or empty($adresse_postale) or empty($telephone) or empty($sexe) or empty($adresse_mail)) {
        echo "<br> Me prends pas pour un con, un des champs n'est pas rempli";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="1;URL=./ajout_eleve.html">';
    }   
    else {
        echo "<br> Merci pour votre participation, votre demande d'ajout va être traitée dans les plus brefs délais.";
        echo "<br> La date d'ajout est : "."'$date'"."<br>";

        $result=mysqli_query($connect, $query);
        if (!$result) { echo "<br>pas bon".mysqli_error($connect);}

        //$fp = fopen('eleve.txt', 'a+');
        //fwrite($fp, $date." : ". $nom.", ". $prenom.", ". $date_de_naissance. ", ". $ville. ", ". $adresse_postale. ", ". $telephone. ", ". $sexe. ", ". $adresse_mail. PHP_EOL);
        // fclose($fp);
    }
    mysqli_close($connect); */
?>



<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <title>Ajout élève</title>
  </head>
  <body>
    <br><br>
  <form action="ajout_eleve1.php" method="POST">
    <div class="container">

      <div class="row">
        <div class="col-20">
          <label>Nom</label>
        </div>
        <div class="col-50">
          <input type="text" name="nom" placeholder="Dupont" value=""> <br>   <!-- <?php if(isset($_POST['nom'])) { echo htmlentities($_POST['nom']); }?> -->
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label>Prénom</label>
        </div>
        <div class="col-50">
          <input type="text" name="prenom" placeholder="Jean" value=""><br>
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label>Date de naissance</label>
        </div>
        <div class="col-50">
          <input type="date" name="date_de_naissance" value=""><br>
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label>Ville</label>
        </div>
        <div class="col-50">
          <input type="text" name="ville" placeholder="Paris" value=""><br>
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label>Adresse postale</label>
        </div>
        <div class="col-50">
          <textarea name="adresse_postale" style="height: 80px" placeholder="10 avenue des Champs Elysées" value=""></textarea><br>
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label>Téléphone</label>
        </div>
        <div class="col-50">
          <input type="text" minlength="10" maxlength="10" name="telephone" pattern="[0-9][0-9]+" placeholder="0387230956" value=""><br>
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label>Sexe</label>
        </div>
        <div class="col-50">
          <input type="radio" name="sexe" value="Homme" checked> Homme <br>
          <input type="radio" name="sexe" value="Femme"> Femme <br>
        </div>
      </div>

      <div class="row">
        <div class="col-20">
          <label>Adresse mail</label>
        </div>
        <div class="col-50">
          <input type="email" name="adresse_mail" placeholder="jean.dupont@etu.utc.fr" value=""><br>
        </div>
      </div>

      <div class="row">
        <input type="submit" value="Terminé"><br>
      </div>

  </form>

  <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button_accueil>Retour à l'accueil</button_accueil></A>

  </body>
</html>