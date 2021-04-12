<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style_table.css" media="screen" type="text/css" />
    </head>
    <body>
    <center>
    <?php
            $url = "http://192.168.11.108:8013";
            $db = "soch_inv";
            $username = "hamzaakarid14@gmail.com";
            $password = "hamzaakarid14@gmail.com";
            require_once('ripcord-master/ripcord.php');
            
            $common = ripcord::client($url.'/xmlrpc/2/common');
            $uid = $common->authenticate($db, $username, $password, array());
            
            
            $models = ripcord::client("$url/xmlrpc/2/object");
            $colis = $models->execute_kw(
                $db,
                $uid,
                $password,
                'sochepress.customer.request.line',
                'search',
                array(
                    array(
                        array('request_id.customer_id.user_id', '=', $uid)
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


