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
            $user = $models->execute_kw($db, $uid, $password,
            'res.users', 'search_read',
            array(array(array('id', '=', $uid))),
            array('fields'=>array('partner_id')));
            
            $colis = $models->execute_kw(
            $db,
            $uid,
            $password,
            'sochepress.customer.request.line',
            'search',
            array(
            array(
            array('request_id.customer_id', '=', $user[0]['partner_id'][0])
            )
            )
            );
            $partnerss = $models->execute_kw($db, $uid, $password,
            'sochepress.customer.request.line', 'read',
            array($colis),
            array('fields'=>array('name', 'step', 'weight')));
            $temp = "<table>";
            
            /*Defining table Column headers depending upon JSON records*/
            $temp .= "<tr><th>Id</th>";
            $temp .= "<th>Name</th>";
            $temp .= "<th>Step</th>";
            $temp .= "<th>Weight</th></tr>";
            
            /*Dynamically generating rows & columns*/
            for($i = 0; $i < sizeof($partnerss); $i++)
            {
            $temp .= "<tr>";
            $temp .= "<td>" . $partnerss[$i]["id"] . "</td>";
            $temp .= "<td>" . $partnerss[$i]["name"] . "</td>";
            $temp .= "<td>" . $partnerss[$i]["step"] . "</td>";
            $temp .= "<td>" . $partnerss[$i]["weight"] . "</td>";
            $temp .= "</tr>";
            }
            
            /*End tag of table*/
            $temp .= "</table>";
            
            /*Printing temp variable which holds table*/
            echo $temp;


        ?>
        </center>
    </body>
</html>
