<?php

$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

$domacin = mysqli_real_escape_string($bp, @$_POST['domacin']);
$gost = mysqli_real_escape_string($bp, @$_POST['gost']);
$liga_id = mysqli_real_escape_string($bp, @$_POST['liga_id']);


$upit = "insert into utakmica (domacin, gost, liga_id) values ('$domacin','$gost','$liga_id');";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Preusmeravanje nazad na pregled
header("Location: dodajU.php");
