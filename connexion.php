<?php

    $dbhost='tuxa.sme.utc';
    $dbuser='nf92a007';
    $dbpass='b2roLrWY';
    $dbname='nf92a007';
    $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

    date_default_timezone_set('Europe/Paris');
    $date=date("Y-m-d H:i:s");
    $jour=date("Y-m-d");
    $heure=date("H:i:s");

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="ajout.css">
    </head>
</html>