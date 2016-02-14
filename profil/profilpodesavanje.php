
<?php
session_start();
if (!isset($_SESSION['prijavljen']))
    die(header("Location: reg_log.html"));

 $DB = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$DB)
    die('Problem sa povezivanjem na server BP.');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>WebSiteCom</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../style.css" rel="stylesheet" type="text/css"/>
     
        
    </head>
    <body>
                 
        <div id="telo">
            <div id="menu"> 
                <div id="profil">
                 <img src='profimg/usericon.png' width='80px' height='80px'/>   
                </div>
                
                <div id="indexmenucentar">
                     <form id="tfnewsearch" method="get" action="pretragaprof.php">
                        <input type="text" class="tftextinput" name="q" size="35" maxlength="120" placeholder="Pretrazi korisnike"/><input type="submit" value="Pretrazi" class="tfbutton"/>
		</form>
                </div>
                
                <div id="indexmenulogo">
                    <img src="profimg/kladionicarilogo.png" width="120px" height="90px" href="index.php"/>
                </div>
                
                <div id="indexmenudugmad">
                    <a href="../index.php"><img src="profimg//homeicon.png" width="14px" height="14px"/> Pocetna</a>
                    <a href="../utakmice.php"><img src="profimg//ballicon.png" width="14px" height="14px"/> Utakmice</a>
                    <a href="../statistika2.php"><img src="profimg//statistic.png" width="16px" height="14px"/> Statistika</a>
                    <a href="../korisnici.php"><img src="../img/usericon.png" width="16px" height="14px"/> Korisnici</a>
                </div>
                
                <div id="indexmenupolje">
                     <nav id="navprofil">
                        <ul>
                            <li><a>Moj profil »</a>
                                <ul>
                                    <li><a href="profilprofil.php">Profil</a></li>
                                    <li><a href="profilpodesavanje.php">Podesavanja profila</a></li>
                                    <li><a href="../odjava.php">Izloguj se</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div id="prikaz1">
                <h3>Podešavanja profila</h3>
                 <?php
                // Povezivanje sa serverom baze podataka
                $bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
                if (!$bp)
                    die("Greska pri pristupu bazi podataka.");
 
                // Normalizacaija podataka
               // $id = (int) @$_GET['id'];
                $id=1;
                
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
                <div id="prikaz1div1"><p>Licni podaci:</p>
                    <form action="izmenaprof.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $student->id; ?>" />
                    <input type="text" name="nick" value="<?php echo $student->korisnickoime; ?>"/><br/>
                    <input type="text" name="ime" value="<?php echo $student->ime; ?>" placeholder="Ime"/>
                    <input type="text" name="prezime" value="<?php echo $student->prezime; ?>" placeholder="Prezime"/><br/>
                    <input type="text" name="grad" value="<?php echo $student->grad; ?>" placeholder="Grad"/>
                    Pol:<select id="select1"><option value="Muski">Muški</option><option value="Zenski">Ženski</option></select><br/>
                    Datum rodjenja:<input type="date" name="datum" value="<?php echo $student->datumrodjenja; ?>"/>
                    <br/>
                    <button>Sačuvaj</button></form>
                </div>
                <div id="prikaz1slika1">
                    <img src="profimg/usericon.png"/>
                </div>
                <div id="prikaz1div2"><p>Lozinka:</p>
                    <form action="izmenaprof2.php" method="post">
                        <input type="password" name="starasif" placeholder="Stara šifra" /><br/>
                    <input type="password" name="novasif1" placeholder="Nova šifra"/><br/>
                    <input type="password" name="novasif2" placeholder="Ponovi"/><br/><br/>
                    <button>Sačuvaj</button></form></div>
                <div id="prikaz1slika2">
                    <img src="profimg/passicon.png"/>
                </div>
                
                <div id="prikaz1div3"><p>Ostalo:</p>
                    <form action="izmenaprof3.php" method="post"> 
                    <input type="text" name="email" placeholder="Email" value="<?php echo $student->email; ?>"/><br/>
                    <input type="text" name="novimail" placeholder="Novi email"/><br/>
                    <input type="text" name="novimail2" placeholder="Ponovi"/><br/><br/>
                    <button>Sačuvaj</button></form></div>
                <div id="prikaz1slika3">
                    <img src="profimg/emailicon.png"/>
                </div>
                
                 <?php
                 
                 ?>
            </div>
            <div id="fusnota">
                <div id="fus1">
                    <ul>
                        <li><a href="../index.php">Početna</a></li>
                        <li><a href="../utakmice.php">Utakmice</a></li>
                        <li><a href="../statistika2.php">Statistika</a></li>
                        <li><a href="../korisnici.php">Korisnici</a></li>
                    </ul>
                </div>
                <div id="fus2">
                    <ul>
                        <li><a href="profilprofil.php">Profil</a></li>
                        <li><a href="profilpodesavanje.php">Podešavanje profila</a></li>
                        <li><a href="../odjava.php">Odjava</a></li>
                    </ul>
                </div>
                <div id="fus3">
                    <img src="img/osamicon.png" width="50px"/>
                </div>
            </div>
        </div>
    </body>
</html>
