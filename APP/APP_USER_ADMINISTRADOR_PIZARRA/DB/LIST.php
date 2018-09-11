<?php
    include('../../../MASTER/config/conect.php');

    $sql = "SELECT t1.* , count(file_name) as docs FROM pizarra t1, files_procedimientos t2
 	        WHERE  t1.id = t2.id_pizarra
 	        ORDER BY t1.id DESC";

    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $consulta = $link->prepare($sql);
    $consulta->execute();
    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $data[]  = $row;
    }

    echo json_encode($data);
?>