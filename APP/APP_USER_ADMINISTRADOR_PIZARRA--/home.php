<?php
include('../../MASTER/include/verifyAPP.php');

$ID_US = $vari[0];

$name_application = $_GET['name_application'];
$tipo = $_GET['tipo'];
$descripcion = $_GET['descripcion'];
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <?php
    include("../HEAD.php");
    ?>
<script src="../../MASTER/js/app/APP_USER_ADMINISTRADOR_PIZARRA.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="width:98%; background: white !important;">

<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12" id="_vista">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-blue-sharp"></i>
					<span class="caption-subject font-blue-sharp bold uppercase">
						<?php
                        if (trim($tipo) == 'ADM') echo 'MANTENEDOR - ';
                        else                echo '';

                        if ($descripcion != '') echo $descripcion;
                        else                            echo '';
                        ?>
					</span>
                </div>
            </div>
            <!-- *********************************************** BEGIN CONTENIDO *********************************************** -->
            <div class="portlet-body">
                <?php
                echo "<a href='#' onclick=\"app_pizarra(1,0,'../APP_USER_ADMINISTRADOR_PIZARRA/DB/ADD.php','_vista')\" class='btn blue btn-outline'><i class='icon-plus'></i>Agregar Pizarra</a><br><br><br>";
                ?>
                    <a href='#' class='btn blue btn-outline'>&nbsp<i class='icon-plus'></i>
                        Agregar Pizarra</a></br></br></br>
                    <!--<div class="table-scrollable" class="col-md-12">-->
                        <table class="table table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr class="info">
                                <!--<th>Id</th>-->
                                <th>T&iacute;tulo</th>
                                <th>Descripci&oacute;n</th>
                                <th>Vigencia Incio</th>
                                <th>Vigencia Fin</th>
                                <th>Prcedimientos</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include('../../MASTER/config/conect.php');
                            $sql = "SELECT t1.* , count(file_name) FROM pizarra t1 INNER JOIN files_procedimientos t2
 					                 ON  t1.id = t2.id_pizarra
 	              	                 ORDER BY t1.titulo";

                            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $result = $link->prepare($sql);
                            $result->execute();
                            //echo $sql;
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr class="odd gradeX">';
                                echo "<td>" . $row[1] . "</td>
						              <td>" . $row[2] . "</td>
                                      <td>" . date('d-m-Y', strtotime(utf8_encode($row[3]))) . "</td>
                                      <td>" . date('d-m-Y', strtotime(utf8_encode($row[4]))) . "</td>
                                      <td>" . $row[6] . "</td>";
                                echo "<td align ='center'>
							<a href='#' class='link' onclick=''>
								<i class='fa fa-pencil' style='color:#0066FF;'></i>
							</a>
						  </td>";
                                echo "<td align ='center'>
							<a href='#' class='link' onclick=''>
								<i class='fa fa-times' style='color:#FF0000;'></i>
							</a>
						  </td>";
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                            ?>
                    </div>
                </div>

                <!-- *********************************************** END   CONTENIDO *********************************************** -->
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <?php
        include("../FOOTER.php");
        ?>


</body>
</html> 