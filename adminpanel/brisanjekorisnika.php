<?php

$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

$id = (int) @$_GET['id'];

// Uklanjanje podataka
$upit = "delete from korisnik where id=$id;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Preusmeravanje nazad na pregled
header("Location: adminpanel02.php");