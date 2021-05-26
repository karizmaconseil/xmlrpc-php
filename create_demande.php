<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <?php
            require_once('connection.php');
            /*
            $id_created_colis = $models->execute_kw($db, $uid, $password,
            'sochepress.customer.request.line', 'create',
            array(array('name'=>"colis1",
            'expeditor_id' => 358,
            'type_colis_id' => 41)));
             
            $id_created_colis_2 = $models->execute_kw($db, $uid, $password,
            'sochepress.customer.request.line', 'create',
            array(array('name'=>"colis1",
            'expeditor_id' => 358,
            'type_colis_id' => 41)));
             
            $id_created_demande = $models->execute_kw($db, $uid, $password,
            'sochepress.customer.request', 'create',
            array(array('name'=>"test ak",
            'customer_id' => 358,
            'request_line_ids' => array($id_created_colis, $id_created_colis_2))));
            */
                         


            // $id = $models->execute_kw($db, $uid, $password,
            // 'sochepress.customer.request', 'get_list_colis',
            // array("new",));

            // testing
            // testing
            // testing
            $user = $models->execute_kw($db, $uid, $password,
            'res.users', 'search_read',
            array(
                array(
                    array(
                        'id', '=', $uid),
                ),
            ),
            array(
                'fields' => array('partner_id'),
            )
            );


            

            $colis_1 = [
                "ref_externe"                  => 'MAR1',
                "type_colis"                   => 'Colis',
                "expediteur"                   => 'Iris.ma',
                "source"                       => 'Rabat',
                "nom_destinataire"             =>  "Mohamed Tayeb",
                "customer_id"                  =>  $user[0]['partner_id'][0],
                "modele"                       =>  78,
                "rue"                          =>  "Dakhla",
                "rue2"                         =>  "Drb tamayoz",
                "ville"                        =>  "agadir",
                "region"                       =>  "",
                "pays"                         =>  "maroc",
                "zip"                          =>  80000,
                "phone"                        =>  "065555555",
                "mobile"                       =>  "052222222",
                "email"                        =>  "goramah@gmail.com",
                "destination"                  => 'Agadir',
                "volume"                       => 15.3,
                "poids_colis"                  => 4.2,
                "methode_contre_remboursement" => "ESPECE",
                "montant_contre_remboursement" => 458.23,
            ];
            
            $colis_2 = [
                "ref_externe"                  => 'MAR1',
                "type_colis"                   => 'Colis',
                "expediteur"                   => 'Iris.ma',
                "source"                       => 'Rabat',
                "destinataire"                 =>  883,
                "destination"                  => 'Agadir',
                "height"                       =>  60,
                "width"                        =>  50,
                "length"                       =>  30,
                "volume"                       => 15.3,
                "poids_colis"                  => 4.2,
                "methode_contre_remboursement" => "ESPECE",
                "montant_contre_remboursement" => 458.23,
            ];



            $dict_infos = [
                "customer_id" => $user[0]['partner_id'][0],
                "type"        => "normal",
                "date"        => '',
                "generate_barcode" => True,
                "colis"       => [$colis_1,$colis_2],
            ];
        
            $id = $models->execute_kw(
                $db,
                $uid,
                $password,
                'sochepress.customer.request',
                'create_demand',
                [$dict_infos]
            );

            $dict_destinator = [
                "nom_destinataire" => "akram Khidr",
                "customer_id" => $user[0]['partner_id'][0],
                "rue" => "RES AHL AGADIR 2 APPT13",
                "rue2" => "DAKHLA 80000",
                "ville" => "AGADIR",
                "pays" => "MAROC",
                "region" => "SOUSS",
                "zip" => "80000",
                "destination" => "Agadir",
                "phone"        => "0658521232",
                "mobile"       => "0652321425",
                "email" => "mohamedelkbir@gmail.com",
            ];
            
            
            // $id = $models->execute_kw(
            //     $db,
            //     $uid,
            //     $password,
            //     'sochepress.customer.request',
            //     'create_demand',
            //     [$dict_infos]
            // );



                // testing
                // testing
                // testing
                // $colis_one = array(
                //     "ref_externe" => 'ref_ext',
                //     "type_colis" => "Colis",
                //     "expediteur" => "Iris.ma",
                //     "source" => "Tétouan",
                //     "destinataire" => 'Iris.ma',
                //     "destination" => "Kénitra",
                //     "volume" => 32.5,
                //     "poids_colis" => 8,
                //     "methode_contre_remboursement" => "Chèque",
                //     "montant_contre_remboursement" => 65564,
                // );

                // $colis_two = array(
                //     "ref_externe" => 'ref_ext',
                //     "type_colis" => "Colis",
                //     "expediteur" => "Iris.ma",
                //     "source" => "Tétouan",
                //     "destinataire" => 'Iris.ma',
                //     "destination" => "Kénitra",
                //     "volume" => 102.9,
                //     "poids_colis" => 34,
                //     "methode_contre_remboursement" => "Chèque",
                //     "montant_contre_remboursement" => 80000,
                    
                // );

                // $dict_infos = array(
                //     "customer_id" => 358,
                //     "type" => "normal",
                //     "date" => '',
                //     "colis" => array($colis_one, $colis_two)
                // );

                // $id = $models->execute_kw($db, $uid, $password,
                // 'sochepress.customer.request', 'create_demand',
                // array($dict_infos,));
    
            echo '<h2>ID of created demand:</h2>';
            echo json_encode($id);
       
       
       
       ?>
    </body>
</html>