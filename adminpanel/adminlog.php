
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
        <title>Admin Log in</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="adminokvir">
            <div id="adminbocnimeni">
                <img src="slike/passicon.png" width="160px"/>
            </div>
            <div id="admintelo">
                 <p>Logujte se da bi mogli pristupiti admin panelu</p></br>
                 <form id="adminvestiforma" action="adminlogobrada.php" method="post">
                     <input type="text" name="AUsername" placeholder="Username"/></br>
                     <input type="password" name="APass" placeholder="Password"/></br>
                     <button type="submit">Loguj se!</button></br>
                 </form>
               
            </div>
        </div>
        <?php
        ?>
    </body>
</html>