<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="css/style_table.css" media="screen" type="text/css" />
    </head>
    <body>
    <center>
        <?php
            require_once('connection.php');
/*==============================SEARCH========================================*/    
            // La methode 'search'
            // Nom de colis iris.ma ZSGMETPV
            // Nom de colis Avito Z6B8IFJZ
            $colis = $models->execute_kw(
                $db,
                $uid,
                $password,
                'sochepress.customer.request.line',
                'search',
                array(
                    array(
                        array('name', '=', $_POST["num"])
                    )
                )
            );
/*==============================READ==============================================*/    
            // La methode 'read'
            $partnerss = $models->execute_kw($db, $uid, $password,
                'sochepress.customer.request.line', 'read',
                array($colis));
/*===============================AFFICHAGE=============================================*/    
            // Tester la methdoe 'search'
            echo json_encode($colis);

            // Tester la methode 'read'
            // echo json_encode($partnerss);
?>
        </center>
    </body>
</html>
