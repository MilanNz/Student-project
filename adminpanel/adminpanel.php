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
                 <p>Dodaj nove vesti na bocnimeni u index.php:</p>
                <form id="adminvestiforma" action="dodavanje-db.php" method="post">
                    <input type="text" name="Autor" placeholder="Autor"/><br /><br />
                    <textarea name="Sadrzaj" placeholder="Sadrzaj"></textarea><br /><br />
                    <input type="text" name="Link" placeholder="Link"/><br /><br />
                    <button type="submit">Dodavanje vesti</button>
                    <hr />
                </form>
               
            </div>
        </div>
        <?php
        ?>
    </body>
</html>