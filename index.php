
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
        <link href="style.css" rel="stylesheet" type="text/css"/>
     
    </head>
    <body>
                 
        <div id="telo">
            <div id="menu"> 
                <div id="profil"><img src='profil/profimg/usericon.png' width='80px' height='80px'/></div>
                <div id="indexmenucentar">
                    <form id="tfnewsearch" method="get" action="profil/pretragaprof.php">
                        <input type="text" class="tftextinput" name="q" size="35" maxlength="120" placeholder="Pretraži korisnike"/><input type="submit" value="Pretraži" class="tfbutton"/>
		</form>
                </div>
                <div id="indexmenulogo">
                        <img src="img/kladionicarilogo.png" width="120px" height="90px" href="index.php"/>
                </div>
                <div id="indexmenudugmad">
                    
                    <a href="index.php"><img src="img/homeicon.png" width="14px" height="14px"/> Početna</a>
                    <a href="utakmice.php"><img src="img/ballicon.png" width="14px" height="14px"/> Utakmice</a>
                    <a href="statistika2.php"><img src="img/statistic.png" width="16px" height="14px"/> Statistika</a>
                    <a href="korisnici.php"><img src="img/usericon.png" width="16px" height="14px"/> Korisnici</a>
                    
                    
                </div>
                <div id="indexmenupolje">
                     <nav id="navprofil">
                        <ul>
                            <li><a>Moj profil »</a>
                                <ul>
                                    <li><a href="profil/profilprofil.php">Profil</a></li>
                                    <li><a href="profil/profilpodesavanje.php">Podešavanja profila</a></li>
                                    <li><a href="odjava.php">Izloguj se</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div id="prikaz">
<table class="tabela">
            <tr>
                <td>Domaćin</td>
                <td>Gost</td>
                <td>Tip</td>
            </tr>
<?php

// Povezivanje sa serverom baze podataka
$bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
if (!$bp)
   die("Greska pri pristupu bazi podataka.");
//$id=(int)@$_GET('id'); <----PROBLEM SA NASLEDJIVANJEM
$id=1;
// Ucitavanje podataka iz baze
$rezultat = mysqli_query($bp, "select * from prikaz");
if (!$rezultat)
    die(mysqli_error($bp));

// Izlistavanje opcija
while ($prikaz = mysqli_fetch_object($rezultat))
{

if(($prikaz->id_korisnik)==$id){
    echo "<tr>\n";
    echo "<td>{$prikaz->domacin}</td>\n";
    echo "<td>{$prikaz->gost}</td>\n";
    echo "<td>{$prikaz->tip}</td>\n";
    echo "</tr>\n";
    }

}
?>
            </table>  
            </div>
            <div id="indexdesnimeni">
         <?php
                // Izbor radne BP  
          $DB = mysql_connect("localhost", "korisnik", "root", "kladionicari");
if (!$DB)
    die('Problem sa povezivanjem na server BP.');
                if (!mysql_select_db('kladionicari'))
                    die('Problem sa izborom radne BP.');
                // Ucitavanje svih vesti
                $Upit = 'select * from Vesti order by Datum desc';
                $Rezultat = mysql_query($Upit, $DB);
                if (mysql_error($DB))
                    die(mysql_error($DB));
                // Smestanje ucitanih vesti u niz za prikaz
                $Vesti = array();
                while ($Vest = mysql_fetch_object($Rezultat))
                    $Vesti[] = $Vest;
                // Prikaz vesti
                foreach ($Vesti as $Vest) {
                    echo "<div class='Vest'>\n";
                    echo " <div class='Autor'><a href='http://{$Vest->Link}'>{$Vest->Autor}</a></div>\n";
                    echo " <div class='Sadrzaj'><a href='http://{$Vest->Link}'>{$Vest->Sadrzaj}</a></div>\n";
                    echo " <div class='Datum'>" . date('j.n.Y. H:i', $Vest->Datum) . "</div>\n";
                    echo "</div>\n";
                }
                ?>
          
            </div>
            <div id="fusnota">
                <div id="fus1">
                    <ul>
                        <li><a href="index.php">Početna</a></li>
                        <li><a href="utakmice.php">Utakmice</a></li>
                        <li><a href="statistika2.php">Statistika</a></li>
                        <li><a href="korisnici.php">Korisnici</a></li>
                    </ul>
                </div>
                <div id="fus2">
                    <ul>
                        <li><a href="profil/profilprofil.php">Profil</a></li>
                        <li><a href="profil/profilpodesavanje.php">Podešavanje profila</a></li>
                        <li><a href="odjava.php">Odjava</a></li>
                    </ul>
                </div>
                <div id="fus3">
                    <img src="img/osamicon.png" width="50px"/>
                </div>
            </div>
        </div>
        
    </body>
</html>
