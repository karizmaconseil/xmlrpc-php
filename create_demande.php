<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <?php
            require_once('connection.php');

            $id_created_colis = $models->execute_kw($db, $uid, $password,
                'sochepress.customer.request.line', 'create',
                array(array('name'=>"colis1",
                            'expeditor_id' => 1315,
                            'type_colis_id' => 1)));

            $id_created_colis_2 = $models->execute_kw($db, $uid, $password,
                'sochepress.customer.request.line', 'create',
                array(array('name'=>"colis1",
                        'expeditor_id' => 1315,
                        'type_colis_id' => 1)));

            $id_created_demande = $models->execute_kw($db, $uid, $password,
                'sochepress.customer.request', 'create',
                array(array('name'=>"test ak",
                            'customer_id' => 1315,
                            'request_line_ids' => array($id_created_colis, $id_created_colis_2))));


            echo '<h2>ID of created demand:</h2>';
            echo json_encode($id_created_demande);
        ?>
    </body>
</html>