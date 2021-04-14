<?php
    $url = "http://localhost:8013";
    $db = "soch_inv";

    $username = "briconet.adv@gmail.com";
    $password = "briconet.adv@gmail.com";

    // $username = "abbassi";
    // $password = "abbassi";
    // $username = "abbassi";
    // $password = "c.tahir@noorfes.com";
    // $username = "hamzaakarid14@gmail.com";
    // $password = "hamzaakarid14@gmail.com";
    // $username = "kadmin";
    // $password = "kadmin";

    require_once('ripcord-master/ripcord.php');
    
    $common = ripcord::client($url.'/xmlrpc/2/common');
    $uid = $common->authenticate($db, $username, $password, array());
    $models = ripcord::client("$url/xmlrpc/2/object");

?>