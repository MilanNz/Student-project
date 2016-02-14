
<!DOCTYPE html>
<html>
    <head>
        <title>Registracija</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="heder"><img src="img/kladionicarilogo.png" alt="Logo kladionicara"/>
         <form action="reg_log.html">
             <button type="submit" id="allbutton">Nazad</button></form></div>
        
        <div id="okvirlogovanje"> 
            <h1>Registracija novog korisnika</h1>
            <p id="p1"> &nbsp; Informacije o korisniku </p>
            <hr/>

            <table >
                <tr>
                    <td>
                        <form id="registracija" action="registracija-db.php" method="post">
                            <table>

                                <tr>
                                    <td> Korisničko ime:</td> <td><input type = "text" name="korisnicko"/><br/> </td><td id="kor">-Korisničko ime mora biti duže od 5 karaktera i jedinstveno.</td>
                                </tr>
                                <tr>
                                    <td> Lozinka: </td> <td> <input type = "password" name="pwdtxt" /> <br/> </td><td id="kor">-Lozinka mora biti duža od 6 karaktera.</td>

                                </tr>
                                <tr>
                                    <td> Potvridte lozinku: </td> <td> <input type = "password" name="cpwdtxt" /> <br/> </td><td id="kor">-Morate tačno ponoviti lozinku.</td>
                                </tr>
                                <tr>
                                    <td> Email adresa: </td> <td> <input type = "text" name="email" /><br/></td><td id="kor">-Radi aktivacije naloga morate uneti vaš email.</td>
                                </tr>
                                <tr>
                                    <td> Imam više od 18 godina: </td> <td><input type="checkbox" name="imamvisegodina" value="ima" ><br><br/> </td>
                                </tr>
                                <tr>
                                    <td> </td> <td><button type="submit" id="allbutton">Registruj se</button><br><br/> </td>
                                </tr>
                            </table>
                            
                        </form>
                    </td>
                </tr>
            </table>
           
        </div>
        <div id="futer">

        </div>

    </body>
</html>
