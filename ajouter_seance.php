<?php
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='autoecole';
    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

    $choixtheme=$_POST['choixtheme'];
    $debutseance=$_POST['debutseance'];
    $effmax=$_POST['effmax'];

    //$row=mysqli_fetch_row($result);
   // while  ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
  //      mysqli_query($connect, "UPDATE themes set supprime='' WHERE idtheme='$row[0]'");
  //      echo "result".$row[1];
  //  }

  if (empty($_POST['debutseance']) or empty($_POST['effmax']) or empty($_POST['choixtheme'])) {
    echo "<br> Me prends pas pour un con, un des champs n'est pas rempli";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3;URL=./ajout_eleve.html">';
    }
    else {
        echo "<br> Merci pour votre participation, votre demande d'incription va être traitée dans les plus brefs délais.<br>";
        $result=mysqli_query($connect, "INSERT INTO seances (NULL, "."'$debutseance".","."'$effmax'".","."'$choixtheme')");
        echo "INSERT INTO seances (NULL, "."'$debutseance'".", "."'$effmax'".", "."'$choixtheme')";
        if (!$result) {
            echo "<br>Y'a une couille:<br>".mysqli_error($connect);}
        }

    mysqli_close($connect);
?>

<html>
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>