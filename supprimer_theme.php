<?php
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='';
    $dbname='autoecole';
    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $result=mysqli_query($connect, "SELECT idtheme FROM themes WHERE supprime='1'");

    //$row=mysqli_fetch_row($result);
   // while  ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
  //      mysqli_query($connect, "UPDATE themes set supprime='' WHERE idtheme='$row[0]'");
  //      echo "result".$row[1];
  //  }
  
    $supprimer=$_POST['supprimer'];
    $i=0;
    $n=sizeof($_POST['supprimer']);
    while ($i<$n) {
        mysqli_query($connect, "UPDATE themes set supprime='' WHERE idtheme='$supprimer[$i]'");
        $i++;
    }
    mysqli_close($connect);
?>

<html>
    <link rel="stylesheet" type="text/css" href="ajout.css">
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>