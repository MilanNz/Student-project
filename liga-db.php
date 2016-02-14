<?php

$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

$naziv = mysqli_real_escape_string($bp, @$_POST['naziv']);

$upit = "insert into liga (naziv) values ('$naziv');";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

header("Location: liga.php");