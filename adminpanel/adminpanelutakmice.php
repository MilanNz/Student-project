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
                <div id="adminteloutakmice">
                    Dodavanje liga:
                    <form action="liga-db.php" method="post">
                        <input type="text" name="naziv" placeholder="naziv lige"/><br/><br/>
                        <button type="submit">Dodaj ligu </button>
                    </form>
                    <hr/>

                    Dodavanje utakmica:
                    <form action="dodajU-db.php" method="post">
                        <input type="text" name="domacin" placeholder="domacin"/><br/>
                        <input type="text" name="gost" placeholder="gost"/><br/>
                        Liga:
                        <select name="liga_id">
                            <?php
                            // Povezivanje sa serverom baze podataka
                            $bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
                            if (!$bp)
                                die("Greska pri pristupu bazi podataka.");

                            // Ucitavanje podataka iz baze
                            $rezultat = mysqli_query($bp, "select * from liga");
                            if (!$rezultat)
                                die(mysqli_error($bp));

                            // Izlistavanje opcija
                            while ($liga = mysqli_fetch_object($rezultat)) {
                                echo "<option value='{$liga->id}'>{$liga->naziv} </option>\n";
                            }
                            ?>
                        </select>
                        <button type="submit">Dodaj utakmicu</button>    
                    </form>
                    
                </div>
                
            </div>
        </div>
        <?php
        ?>
    </body>
</html>