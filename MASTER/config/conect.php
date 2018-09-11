<?php

// 0 = localhost
// 1 = camividal.com
// 2 = stiv.cl

$option = 0;

if ($option == 0)
{
    $link  = new PDO('mysql:host=localhost;dbname=b2b', 'root','12345678');
    $link2 = new PDO('mysql:host=localhost;dbname=b2b', 'root','12345678');
    $link3 = new PDO('mysql:host=localhost;dbname=b2b', 'root','12345678');
    //$conect_vertica  = new PDO('odbc:Driver={Vertica};Database=SWITCH;Servername=10.0.31.122', 'readOnly','X4rg#mV?G%h9&-Jq');
}
else
    if ($option == 1)
    {
        $link  = new PDO('mysql:host=localhost;dbname=camivida_demo', 'camivida_CMSCV','1191.CV*0512');
        $link2 = new PDO('mysql:host=localhost;dbname=camivida_demo', 'camivida_CMSCV','1191.CV*0512');
        $link3 = new PDO('mysql:host=localhost;dbname=camivida_demo', 'camivida_CMSCV','1191.CV*0512');
    }
    else
        if ($option == 2){
            $link  = new PDO('mysql:host=localhost;dbname=stivcl_cms', 'stivcl_cms','1191.CV*0512');
            $link2 = new PDO('mysql:host=localhost;dbname=stivcl_cms', 'stivcl_cms','1191.CV*0512');
            $link3 = new PDO('mysql:host=localhost;dbname=stivcl_cms', 'stivcl_cms','1191.CV*0512');
        }
        else
            if ($option == 3){
                $link  = new PDO('mysql:host=localhost;dbname=CMS', 'admin','123456');
                $link2 = new PDO('mysql:host=localhost;dbname=CMS', 'admin','123456');
                $link3 = new PDO('mysql:host=localhost;dbname=CMS', 'admin','123456');
            }
?>