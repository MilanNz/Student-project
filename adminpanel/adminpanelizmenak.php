<?php
session_start();
if (!isset($_SESSION['prijavljen1']))
    die(header('Location: adminlog.php'));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="adminokvir">
            <div id="adminbocnimeni">
                     <form action="adminpanel.php">
                    <button>Dodavanje vesti</button><br/>
                </form><form action="adminpanel02.php">
                    <button >Lista korisnika</button><br/>
                    </form>
                <form action="adminpanelutakmice.php">
                    <button>Utakmice</button><br/></form>
                    <form action="../odjava.php" method="post">
                    <button>Izloguj se</button><br/>
                    </form>
            </div>
            <div id="admintelo">
               <?php
                // Povezivanje sa serverom baze podataka
                $bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
                if (!$bp)
                    die("Greska pri pristupu bazi podataka.");
 
                // Normalizacaija podataka
                $id = (int) @$_GET['id'];

                // Ucitavanje postojecih vrednosti
                $upit = "select * from korisnik where id=$id";
                $rezultat = mysqli_query($bp, $upit);
                if (!$rezultat)
                    die(mysqli_error($bp));

                 //Provera da li je izabran validan zapis
                if (mysqli_num_rows($rezultat) != 1)
                    die("Ne postoji takav zapis");

                $student = mysqli_fetch_object($rezultat);
                ?>
                <form action="izmena.php" method="post">
                <input type="hidden" name="id" value="<?php echo $student->id; ?>" />
                Korisnicko ime:<input type="text" name="korisnikoime" value="<?php echo $student->korisnickoime; ?>"/><br/>
                Ime:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="ime" value="<?php echo $student->ime; ?>"/><br/>
                Prezime:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="prezime" value="<?php echo $student->prezime; ?>"/><br/>
                Lozinka:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="lozinka" value="<?php echo $student->lozinka; ?>"/><br/>
                Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" value="<?php echo $student->email; ?>"/><br/>
                Bodovi:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="bodovi" value="<?php echo $student->bodovi; ?>"/><br/><br/><br/>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit">Izmeni</button>
                
                </form>
               
            </div>
        </div>
        <?php
        //I JA SAM ZAPREPASCENJ SVOJIM RESENJEM ZA RAVNANJE NAZIVA I INPUT ALI NISAM IMAO SNAGE PISATI U style.css OD 900 LINIJA :D
        ?>
    </body>
</html>