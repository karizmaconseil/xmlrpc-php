<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <center><img src="img.jpg" width="300" height="200"></center>
        <h1></h1>
        <center>
        <table>
        
        <tr>
        <td>
            <form action="liste_colis.php" method="POST">
                    <label><b>Liste des colis:</b></label>
                    <input type="submit" id='submit' value='Recherchez' >
            </form>
        </td>
        <td>
            <form action="num_de_suivi.php" method="POST">
                <label><b>Entrez un num de suivi:</b></label>
                <input type="text" placeholder="Entrer le num" name= "num" required>
                <input type="submit" id='submit' value='Cherchez' >
            </form>
        </td>

        <td>
            <form action="creer_demande.php" method="POST">
                <label><b>Creer une demande:</b></label>
                <input type="submit" id='submit' value='Creer' >
            </form>
        </td>
        
        </tr>
        </table>
        </center>
        

</html>