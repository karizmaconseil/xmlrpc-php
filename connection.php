<?php
    // $url = "http://192.168.11.133:8069";
    // $db = "soche10";


    $url = "https://sls-api.odoo.com";
    $db = "sochepresscustom-pre-prod-2386388";

    // $username = "mehdiakram44@gmail.com";
    // $password = "mehdiakram44@gmail.com";

    
    $username = "i.elamri@sapress.ma";
    $password = "i.elamri@sapress.ma#Api";

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