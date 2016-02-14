<?php

session_start();

$korisnik = @$_POST['korisnickoime'];
$lozinka =  @$_POST['korisnickalozinka'];

// Povezivanje sa serverom baze podataka
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
    die("Greska pri pristupu bazi podataka.");

// Ucitavanje podataka iz baze
$rezultat = mysqli_query($bp, "select korisnickoime,lozinka from korisnik");
if (!$rezultat)
    die(mysqli_error($bp));

// Prikaz podataka
while ($red = mysqli_fetch_object($rezultat)) {
    if(($korisnik==($red->korisnickoime))||($lozinka==($red->loznika))){
       $qno= $_SESSION['id'] = $value1[$red->id];
       $_SESSION['id']=$red->id;
       $_SESSION['prijavljen'] = true;
       die(header('Location: index.php')); 
    }else{
        echo "<script type='text/javascript'>alert('Prijava nije uspela!');</script>"; 
    }
}

