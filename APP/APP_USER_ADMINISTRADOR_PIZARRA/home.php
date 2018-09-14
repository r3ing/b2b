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

                    <div id="table">
                        <?php include 'VIEW/LIST.php'; ?>
                    </div>
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