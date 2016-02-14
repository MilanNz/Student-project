<?php

// Povezivanje sa serverom baze podataka
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

// Normalizacaija podataka
$id = (int) @$_POST['id'];
$ime = mysqli_real_escape_string($bp, @$_POST['ime']);
$prezime = mysqli_real_escape_string($bp, @$_POST['prezime']);
$grad = mysqli_real_escape_string($bp, @$_POST['grad']);
$rod = mysqli_real_escape_string($bp, @$_POST['select1']);
$date = mysqli_real_escape_string($bp, @$_POST['datum']);

// Izmena u bazi
$upit = "update korisnik set korisnickoime='$korisnikoime', ime='$ime', prezime='$prezime' , grad='$grad',pol='$rod' ,datumrodjenja='$date' where id=$id;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Preusmeravanje nazad na pregled
header("Location: ../adminpanel/adminpanel02.php");