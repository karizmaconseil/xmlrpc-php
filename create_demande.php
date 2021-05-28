<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <?php

/*==========================CONNECTION==============================================*/    
            require_once('connection.php');
/*==================================================================================*/    

/*===========================GET CURRENT USER==============================================*/ 
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
/*=========================================================================================*/ 

/*==========================GET LIST COLIS=========================================*/    
            // $id = $models->execute_kw($db, $uid, $password,
            // 'sochepress.customer.request', 'get_list_colis',
            // array("new",));
/*=================================================================================*/
 

/*==========================GET COLIS BY NAME =========================================*/    
            // $id = $models->execute_kw($db, $uid, $password,
            // 'sochepress.customer.request', 'get_colis_by_name',
            // array("ZSGMETPV",));    // pour avito, MBSCMLPQ
/*=====================================================================================*/


/*============================== CREATE DESTINATOR ==============================================*/  
            // $dict_destinator = [
            //     "nom_destinataire" => "Mohamed El Kbir",
            //     "rue" => "Rue 2 BV AIT WAKRIM",
            //     "rue2" => "Poste 24 Hay Addakhla",
            //     "ville" => "Agadir",
            //     "pays"=> "Maroc",
            //     "region" => "Souss",
            //     "zip" => "23003",
            //     "destination" => "Tanger",
            //     "phone" => "0654653489",
            //     "mobile" => "0654653489",
            //     "email" => "t.errzighi@gmail.com"
            // ];
            // $id = $models->execute_kw($db, $uid, $password,
            //     'sochepress.customer.request',
            //     'create_destinator', [$dict_destinator]);
/*================================================================================================*/  


/*============================  METHODE GET COLIS ======================================*/     
            // $dict_infos = array(
            //         "ref" => "MAR1"                        
            //         "colis_name" => "ZSGMETPV",             // pour iris, pour avito tester QQT4SXXS
            //         "request_id" => 3045,                   // pour iris, pour avito 3044
            //     );

            // $id = $models->execute_kw($db, $uid, $password,
            // 'sochepress.customer.request', 'get_colis',
            // array($dict_infos,));
/*=======================================================================================*/  



/*============================STANDARD CREATE - COLIS ET DEMAND======================================*/        

            $dict_dict = [
                'name'=>'DEMAND',
                'customer_id'=> 196,
                'request_line_ids' => array(10190,)
            ];
            $id = $models->execute_kw($db, $uid,
                $password, 'sochepress.customer.request', 'create',
                [$dict_dict]);
/*====================================================================================================*/   

/*===================================METHODE CREATE DEMANDE SIMPLIFIEE=============================================*/
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
            //     "height" => 5,
            //     "width" => 4,
            //     "length" => 3,
            //     "customer_id" => 358,
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
            //     "modele" => 5,
            //     "customer_id" => 358,    
            // );

            // $dict_infos = array(
            //     "customer_id" => 358,
            //     "type" => "normal",
            //     "date" => '',
            //     "colis" => array($colis_one, $colis_two)
            // );

            // $id = $models->execute_kw(
            //     $db,
            //     $uid,
            //     $password,
            //     'sochepress.customer.request',
            //     'create_demand',
            //     [$dict_infos]
            // );
/*================================================================================================================*/  

/*===========================   GET LIST COLIS  =======================================================*/    
            // $id = $models->execute_kw($db, $uid, $password,
            // 'sochepress.customer.request', 'get_list_colis',
            // array("new",));
/*=====================================================================================================*/    



/*=============================   AFFICHAGE  ==========================================================*/    
            echo json_encode($id);
/*=====================================================================================================*/  
       ?>
    </body>
</html>