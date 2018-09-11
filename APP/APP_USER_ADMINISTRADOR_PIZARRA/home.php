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
<div class="row" ng-app="adminPizarra" ng-controller="adminPizarraCtrl" ng-init="getPizarras()">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light">
            <div class="portlet-title" ng-if="!action">
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
                <div ng-if="tablePizarra" class="col-md-12">
                    <a href='#' ng-click='showAddPizarra()' class='btn blue btn-outline'><i class='icon-plus'></i>
                        Agregar Pizarra</a></br></br></br>

                        <table class="table table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr class="info">
                                <th>Id</th>
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
                            <tr ng-repeat="p in pizarras">
                                <td>{{p.id}}</td>
                                <td>{{p.titulo}}</td>
                                <td>{{p.descripcion}}</td>
                                <td>{{p.vigencia_ini}}</td>
                                <td>{{p.vigencia_fin}}</td>
                                <td>{{p.docs}}</td>
                                <td align='center'>
                                    <a href='#' class='link' onclick=''>
                                        <i class='fa fa-pencil' style='color:#0066FF;'></i>
                                    </a>
                                </td>
                                <td align='center'>
                                    <a href='#' class='link' onclick=''>
                                        <i class='fa fa-times' style='color:#FF0000;'></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div ng-if="!tablePizarra" class="col-md-12">
            <div ng-include="'VIEW/ADD.php'" class="col-md-12"></div>
        </div>

        <div id="result" class="col-md-12" hidden>

        </div>


        <!-- *********************************************** END   CONTENIDO *********************************************** -->
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
<?php
include("../FOOTER.php");
?>
<script src="../../MASTER/js/angular.min.js"></script>
<script src="js/adminPizarra.js"></script>
<script src="js/adminPizarraService.js"></script>


</body>
</html> 