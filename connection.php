<?php
    $url = "https://sls-api.odoo.com";
    $db = "sochepresscustom-pre-prod-2386388";

    $username = "i.elamri@sapress.ma";
    $password = "i.elamri@sapress.ma#Api";



    // $url = "http://10.100.0.201:8013";
    // $db = "SLS_PROD_REGIE";

    // $username = "kadmin";
    // $password = "kadmin";
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