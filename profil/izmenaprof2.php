<?php

// Povezivanje sa serverom baze podataka
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

// Normalizacaija podataka
$id = (int) @$_POST['id'];
$lozinka11 = mysqli_real_escape_string($bp, @$_POST['starasif']);
$lozinkanov = mysqli_real_escape_string($bp, @$_POST['novasif1']);
$lozinkanov1 = mysqli_real_escape_string($bp, @$_POST['novasif2']);

function provera($id,$lozinka11){
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
    die("Greska pri pristupu bazi podataka.");

// Ucitavanje podataka iz baze
$rezultat = mysqli_query($bp, "select korisnickoime from korisnik");
if (!$rezultat)
    die(mysqli_error($bp));
// Provera da li postoji korisnicko ime u bazi
while ($red = mysqli_fetch_object($rezultat)) {
    if(($id==($red->id))&&($lozinka11==($red->loznika))){
        $status=false;
    }else{
        $status=true;
    }
}
return $status;
}

if(((provera($id, $lozinka11))==TRUE)&&($lozinkanov==$lozinkanov1)){
// Izmena u bazi
$upit = "update korisnik set loznika='$lozinkanov' where id=$id;";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Preusmeravanje nazad na pregled
header("Location: profilpodesavanje.php");
}