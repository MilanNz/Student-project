
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
            <div id="prikaz2">
                <h3>Moj profil</h3>
                <div id="prikaz2div1"></div>
                <div id="prikaz2div1a"></div>
                <div id="prikaz2div2"></div>
                <div id="prikaz2div2a"></div>
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
