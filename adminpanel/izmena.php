<?php

// Povezivanje sa serverom baze podataka
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

// Normalizacaija podataka
$id = (int) @$_POST['id'];
$korisnikoime = mysqli_real_escape_string($bp, @$_POST['korisnikoime']);
$ime = mysqli_real_escape_string($bp, @$_POST['ime']);
$prezime = mysqli_real_escape_string($bp, @$_POST['prezime']);
$lozinka = mysqli_real_escape_string($bp, @$_POST['lozinka']);
$email = mysqli_real_escape_string($bp, @$_POST['email']);
$bodovi = mysqli_real_escape_string($bp, @$_POST['bodovi']);

// Izmena u bazi
$upit = "update korisnik set korisnickoime='$korisnikoime', ime='$ime', prezime='$prezime' , lozinka='$lozinka',email='$email' ,bodovi='$bodovi' where id=$id;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Preusmeravanje nazad na pregled
header("Location: adminpanel02.php");