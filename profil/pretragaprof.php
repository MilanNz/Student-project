
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
                <div id="profil"><img src='profimg/usericon.png' width='80px' height='80px'/> </div>
                <div id="indexmenucentar">
                    <form id="tfnewsearch" method="get" action="pretragaprof.php">
                        <input type="text" class="tftextinput" name="q" size="35" maxlength="120" placeholder="Pretrazi korisnike"/><input type="submit" value="Pretrazi" class="tfbutton"/>
		</form>
                </div>
                <div id="indexmenulogo">
                    <img src="profimg/kladionicarilogo.png" width="120px" height="90px" href="index.php"/>
                </div>
                <div id="indexmenudugmad">
                    
                    <a href="../index.php"><img src="profimg/homeicon.png" width="14px" height="14px"/> Pocetna</a>
                    <a href="../utakmice.php"><img src="profimg/ballicon.png" width="14px" height="14px"/> Utakmice</a>
                    <a href="../korisnici.php"><img src="../img/usericon.png" width="16px" height="14px"/> Korisnici</a>
                    
                    
                </div>
                <div id="indexmenupolje">
                     <nav id="navprofil">
                        <ul>
                            <li><a>Moj profil »</a>
                                <ul>
                                    <li><a href="profil/profilprofil.php">Profil</a></li>
                                    <li><a href="profil/profilpodesavanje.php">Podesavanja profila</a></li>
                                    <li><a href="odjava.php">Izloguj se</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div id="prikaz5">
                <h2>Rezultati pretrage:</h2>
                <hr/>
               <?php
                    // Povezivanje sa serverom baze podataka
                    $bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
                    if (!$bp)
                        die("Greska pri pristupu bazi podataka.");
                   
                    // Ucitavanje podataka iz baze
                    $rezultat = mysqli_query($bp, "select * from korisnik");
                    if (!$rezultat)
                        die(mysqli_error($bp));
                    
                    $korisnicko = mysqli_real_escape_string($bp, @$_GET['q']);
                    
                    // Prikaz podataka
                    while ($red = mysqli_fetch_object($rezultat)) {
                        if(($red->korisnickoime)==$korisnicko){  //////// pokusao sam sa % ali izlista mi sve kontakte...
                        echo "<div id='prikaz5div'>";
                        echo "<div id='prikaz5slika'><img src='profimg/usericon.png' width='70px' height='70px'/></div>";
                        echo "<a id='prikaz5divab'>$red->korisnickoime</a>";
                        echo "<button>Prati</button>";
                        echo "<div id='prikaz5diva'><a id='prikaz5divaa'>Br.bodova: $red->bodovi</a><a id='prikaz5divaab'>datum registracije: ".date('j.n.Y. H:i', $red->datumregistracije)."</a></div>";
                        echo "</div>";
                        }
                    }
                    ?>
            </div>
        </div>
    </body>
</html>
