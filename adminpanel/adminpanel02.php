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
        <div id="adminokvir2">
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
            <div id="admintelo2">
                <table border="1">
                    <tr>
                        <td>Korisnicko ime</td>
                        <td>Lozinka</td>
                        <td>email</td>
                        <td>Ime</td>
                        <td>Prezime</td>
                        <td>Bodovi</td>
                        <td>Uklanjanje</td>
                        <td>Izmena</td>
                    </tr>
                    <?php
                    // Povezivanje sa serverom baze podataka
                    $bp = mysqli_connect("localhost", "korisnik", "root", "kladionicari");
                    if (!$bp)
                        die("Greska pri pristupu bazi podataka.");

                    // Ucitavanje podataka iz baze
                    $rezultat = mysqli_query($bp, "select * from korisnik");
                    if (!$rezultat)
                        die(mysqli_error($bp));

                    // Prikaz podataka
                    while ($red = mysqli_fetch_object($rezultat)) {
                        echo "<tr>";
                        echo "<td>{$red->korisnickoime}</td>";
                        echo "<td>{$red->lozinka}</td>";
                        echo "<td>{$red->email}</td>";
                        echo "<td>{$red->ime}</td>";
                        echo "<td>{$red->prezime}</td>";
                        echo "<td>{$red->bodovi}</td>";
                        echo "<td><button onclick='if(confirm(\"Siguran si?\")) window.location = \"brisanjekorisnika.php?id={$red->id}\"'>Ukloni</button></td>";
                        echo "<td><button onclick='window.location = \"adminpanelizmenak.php?id={$red->id}\"'>Izmena</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php
        ?>
    </body>
</html>