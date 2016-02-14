<?php
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");
$id = (int) @$_GET['id'];
//$idkorisnik=(int)@$_GET['idkorisnik'];
$idkorisnik=1;
$rezultat = mysqli_query($bp, "select * from utakmica where id=$id");
if (!$rezultat)
    die(mysqli_error($bp));

$utakmica = mysqli_fetch_object($rezultat);

$upit = "insert into prikaz (domacin, gost, utakmica_id, tip, id_korisnik) values ('{$utakmica->domacin}','{$utakmica->gost}', {$utakmica->id}, '2','{$idkorisnik}');";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

header("Location: index.php");