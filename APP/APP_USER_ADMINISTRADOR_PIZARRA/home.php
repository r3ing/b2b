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

<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light" id="tablePizarra">
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
                <div id="" class="col-md-12">
                    <a href="#" onclick="showForms('VIEW/ADD.php', 1, 0)" class='btn blue btn-outline'><i class='icon-plus'></i>
                        Agregar Pizarra</a></br></br></br>

                        <table class="table table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr class="info">
                                <!--<th>Id</th>-->
                                <th>T&iacute;tulo</th>
                                <th>Descripci&oacute;n</th>
                                <th>Vigencia Incio</th>
                                <th>Vigencia Fin</th>
                                <th>Docs</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <?php
                            include('../../MASTER/config/conect.php');
                            $sql = "SELECT t1.*, (SELECT (CASE WHEN d.doc1 IS NULL THEN 0 ELSE 1 END)+(CASE WHEN d.doc2 IS NULL THEN 0 ELSE 1 END)
	                                              FROM docs d WHERE t1.identifier = d.identifier) AS count_docs
                                    FROM pizarra t1
                                    LEFT JOIN docs t2
                                    ON t1.identifier = t2.identifier
                                    GROUP BY t1.id
                                    ORDER BY t1.vigencia_fin ASC";

                            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $result = $link->prepare($sql);
                            $result->execute();
                            //echo $sql;
                            while ($row = $result->fetch()) {
                                echo "<tr class='odd gradeX'>";
                                //echo "<td>" . $row[0] . "</td>";
                                echo "<td>" . $row[1] . "</td>
                                      <td>" . $row[2] . "</td>
                                      <td>" . date('d-m-Y', strtotime(utf8_encode($row[3]))) . "</td>
                                      <td>" . date('d-m-Y', strtotime(utf8_encode($row[4]))) . "</td>
                                      <td>";
                                        $i = 0;
                                        while($i < $row[7]){
                                            echo "<a href='#'><i class='fa fa-file-text-o'></i></a> &nbsp;&nbsp;";
                                            $i++;
                                        }
                                        echo "</td>";
                                echo "<td align ='center'>
							            <a href='#' class='link' onclick=\"showForms('URL', 2 ," . $row[0] . ")\">
								            <i class='fa fa-pencil' style='color:#0066FF;'></i>
							            </a>
						              </td>";
                                echo "<td align ='center'>
							            <a href='#' class='link' onclick=\"deletePizarra(" . $row[0] . ")\">
								            <i class='fa fa-times' style='color:#FF0000;'></i>
							            </a>
						              </td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        <!-- *********************************************** END   CONTENIDO *********************************************** -->
        <!-- END SAMPLE TABLE PORTLET-->
        </div>

        <div id="forms" class="col-md-12" hidden>
        </div>

        <div id="result" class="col-md-12" hidden>
        </div>

        <div id="loading" hidden  width="100%" align="center">
            <img src="../../MASTER/images/loaders/loader10.gif" width="4%" class="img-responsive center-block">
            <!--<h1> Realizando Aperaci&oacute;n ... </h1>-->
        </div>

    </div>
</div>
<?php
include("../FOOTER.php");
?>

<script src="../../MASTER/js/validations.js"></script>
<script src="js/admin_pizarra.js"></script>


</body>
</html> 