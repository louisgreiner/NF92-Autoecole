<?php require('connexion.php')?>

<?php

    $result=mysqli_query($connect, "SELECT idtheme FROM themes WHERE supprime='0'");
  
    $supprimer=$_POST['supprimer'];
    $i=0;
    $n=sizeof($_POST['supprimer']);

    echo "<h1><span>REACTIVER UN THEME SUPPRIME</span></h1>";
    echo "<br><br>";

    while ($i<$n) {
        mysqli_query($connect, "UPDATE themes set supprime='1' WHERE idtheme='$supprimer[$i]'");
        $i++;
    }
    echo "<div class='container'>";
        if ($n==1) {
            echo "Merci pour votre participation, le thème choisi a bien été réactivé.";
        }
        if ($n<>1) {
            echo "Merci pour votre participation, les " . $n . " thèmes choisis ont bien été réactivés.";
        }
    echo "</div>";
    mysqli_close($connect);
?>

<html>
    <br>
    <A HREF=accueil.html class="button" TARGET=accueil><button>Retour à l'accueil</button></A>
</html>