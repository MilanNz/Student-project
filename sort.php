<?php

$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

$liga_id = (int) @$_POST['liga_id'];


$upit = "select * from utakmica where liga_id=$liga_id;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Preusmeravanje nazad na pregled
header("Location: utakmice.php");
