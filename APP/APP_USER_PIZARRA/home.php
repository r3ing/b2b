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
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="width:98%; background: white !important;">
<!--
<script type="text/javascript">
    var nuevoalias = jQuery.noConflict();
    nuevoalias(document).ready(function () {
        // alert("Si salgo es que no hay conflicto!!!");
    });
</script>
-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
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
                <div id="tablePizarra" class="col-md-12">
                    </br></br></br>
                    <table class="table table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr class="info">
                                <!--<th>Id</th>-->
                                <th>T&iacute;tulo</th>
                                <th>Vigencia</th>
                                <th>Prcedimientos</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include('../../MASTER/config/conect.php');
                            $sql = "SELECT p.id, p.titulo, p.vigencia_fin,
                                      (CASE WHEN d.doc1 IS NOT NULL THEN d.doc1 END) doc1,
                                      (CASE WHEN d.doc2 IS NOT NULL THEN d.doc2 END) doc2
                                    FROM pizarra p
                                    LEFT JOIN docs d
                                      ON p.identifier = d.identifier
                                    GROUP BY p.id";

                            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $result = $link->prepare($sql);
                            $result->execute();
                            //echo $sql;
                            while ($row = $result->fetch()) {
                                echo '<tr class="odd gradeX">';
                                //echo "<td>" . $row[0] . "</td>";
                                echo " <td>" . $row[1] . "</td>";
                                echo "<td>" . date('d-m-Y', strtotime(utf8_encode($row[2]))) . "</td>";
                                echo "<td>";
                                if(!empty($row[3])){
                                    echo "<a href=\"../../MASTER/uploads/$row[3]\"><i class='fa fa-file-text-o'></i></a> &nbsp;&nbsp;&nbsp;";
                                }
                                if(!empty($row[4])){
                                    echo "<a href=\"../../MASTER/uploads/$row[4]\"><i class='fa fa-file-text-o'></i></a> &nbsp;";
                                }
                                echo "</td>";
                                echo '</tr>';
                            }
                        echo '</tbody>';
                    echo '</table>';
                    ?>

                </div>
            </div>
                <!-- *********************************************** END   CONTENIDO *********************************************** -->
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->

</div>
<?php
include("../FOOTER.php");
?>



</body>
</html> 