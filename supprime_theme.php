<?php require('connexion.php')?>

<html>
    <body>
    <h1><span>SUPPRIMER UN THEME</span></h1>
    <br><br>
    <form action="supprimer_theme.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <label>Thèmes existants</label>
                </div>
                <div class="col-50">

                    <?php 

                        $result=mysqli_query($connect, "SELECT * FROM themes WHERE supprime='1'");
                        echo "Choisir quoi supprimer<select name='supprimer[]' size='4' multiple required>";
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
