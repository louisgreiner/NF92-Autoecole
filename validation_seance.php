<?php require('connexion.php')?>

<html>
    <body>
    <h1><span>WTF</span></h1>
    <br><br>
    <form action="inscrire_eleve.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-20">
                    <label>Elève à inscrire</label>
                </div>
                <div class="col-50">
                    
                    <?php 
                        $result=mysqli_query($connect, "SELECT * FROM eleves");
                        echo "<select name='elevechoisi' required>";
                        while ($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
                            echo "<option value='$row[0]'>$row[2] $row[1] ($row[3])</option>";
                        }
                        echo "</select>";
                        ?>

                </div>
            </div>