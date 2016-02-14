<?php

session_start();

$korisnik = @$_POST['AUsername'];
$lozinka =  @$_POST['APass'];

if ($korisnik == 'abc' and $lozinka == 'abc')
{
    $_SESSION['prijavljen1'] = true;
    die(header('Location: adminpanel.php'));
}
else
    echo "<script type='text/javascript'>alert('Prijava nije uspela!');</script>";
