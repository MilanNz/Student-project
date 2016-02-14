<?php

$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");

$korisnicko = mysqli_real_escape_string($bp, @$_POST['korisnicko']);
$lozinka= mysqli_real_escape_string($bp, @$_POST['pwdtxt']);
$lozinka1= mysqli_real_escape_string($bp, @$_POST['cpwdtxt']);
$email = mysqli_real_escape_string($bp, @$_POST['email']);
$osam = (@$_POST['imamvisegodina']);
$Datum=time();
$bod='1000';

function provera($korisnicko){
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
    die("Greska pri pristupu bazi podataka.");
// Ucitavanje podataka iz baze
$rezultat = mysqli_query($bp, "select korisnickoime from korisnik");
if (!$rezultat)
    die(mysqli_error($bp));
// Provera da li postoji korisnicko ime u bazi
while ($red = mysqli_fetch_object($rezultat)) {
    if($korisnicko==($red->korisnickoime)){
        $status=false;
    }else if(!($korisnicko==($red->korisnickoime))){
        $status=true;
    }
}return true;

}

if(($lozinka==$lozinka1)&&((strlen($korisnicko))>=5)&&((strlen($lozinka))>=6)&&(!$email=="")&&(isset($osam))&&((provera($korisnicko)))){
 
$upit = "insert into korisnik (korisnickoime, lozinka, email,datumregistracije,bodovi) values ('$korisnicko','$lozinka','$email','$Datum','$bod');";
$rezultat = mysqli_query($bp, $upit);

if (!$rezultat)
    die(mysqli_error($bp));

// Preusmeravanje nazad na pregled
header("Location: reg_log.html");
}