<?php

    /* Svrha ovog fajla je da vrednosti iz formulara snimi u BP */
    // Povezivanje na server BP
    $DB = mysql_connect("localhost", "korisnik", "root", "kladionicari");
    if (!$DB)
    die('Problem sa povezivanjem na server BP.');

    // Izbor radne BP
    if (!mysql_select_db('kladionicari'))
    die('Problem sa izborom radne BP.');

    // Formiranje upita za vest
    $Autor = mysql_real_escape_string($_REQUEST['Autor']);
    $Sadrzaj = mysql_real_escape_string($_REQUEST['Sadrzaj']);
    $Datum = time();
    $Link = mysql_real_escape_string($_REQUEST['Link']);
    $Upit = "insert into vesti (Autor,Sadrzaj, Datum, Link) values ('$Autor','$Sadrzaj', $Datum,'$Link');";
    $Rezultat = mysql_query($Upit, $DB);
    if (mysql_error($DB))
        die(mysql_error($DB));
    header('Location: adminpanel.php');
?>