<?php
include('../../../MASTER/include/verifyAPP.php');
?>
<div class="portlet light bordered">
    <!--
	<div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Usuarios
            </span>
        </div>
    </div>
	-->
    <div class="portlet-body">
        <?php
        $target_dir = '../../../MASTER/uploads/';

        if ($_FILES['file1']['error'] == 0) {
            $target_file1 = $target_dir . time() . '_' . utf8_decode(basename($_FILES["file1"]["name"]));
            $fileName1 = explode('/', $target_file1);
        }else{
            unset($target_file1);
        }
        if ($_FILES['file2']['error'] == 0) {
            sleep(1);
            $target_file2 = $target_dir . time() . '_' . utf8_decode(basename($_FILES["file2"]["name"]));
            $fileName2 = explode('/',$target_file2);
        }else{
            unset($target_file2);
        }
        if ($_FILES['file3']['error'] == 0) {
            sleep(1);
            $target_file3 = $target_dir . time() . '_' . utf8_decode(basename($_FILES["file3"]["name"]));
            $fileName3 = explode('/',$target_file3);
        }else{
            unset($target_file3);
        }

        $uploadOk = 0;

        if (isset($_POST['cliente'])) {

            if ($target_file1) {
                if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file1)) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }
            if ($target_file2) {
                if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file2)) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }
            if ($target_file3) {
                if (move_uploaded_file($_FILES["file3"]["tmp_name"], $target_file3)) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
            }

            if($uploadOk == 1) {

                $cliente = $_POST['cliente'];
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $vigenciaIni = $_POST['vigenciaIni'];
                $vigenciaFin = $_POST['vigenciaFin'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $id = time();

                include('../../../MASTER/config/conect.php');
                $sql = "INSERT INTO pizarra(id,titulo,descripcion,vigencia_ini,vigencia_fin,id_cliente)";
                $sql = $sql . "VALUES ('" . $id . "',
                                     '" . trim($titulo) . "',
                                     '" . trim($descripcion) . "',
                                     '" . utf8_decode($vigenciaIni) . "',
                                     '" . utf8_decode($vigenciaFin) . "',
                                     '" . utf8_decode($cliente) . "')";

                try {
                    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $consulta = $link->prepare($sql);
                    $consulta->execute();
                } catch( PDOExecption $e ) {
                    print "Error!: " . $e->getMessage() . "</br>";
                }

                if($_FILES["file1"]["name"] != '') {
                    $sql = "INSERT INTO files_procedimientos(file_name, id_pizarra)";
                    $sql = $sql . "VALUES ('" . end($fileName1) . "',
                                     '" . $id . "')";
                    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $consulta = $link->prepare($sql);
                    $consulta->execute();
                }
                if($_FILES["file2"]["name"] != '') {
                    $sql = "INSERT INTO files_procedimientos(file_name, id_pizarra)";
                    $sql = $sql . "VALUES ('" . end($fileName2) . "',
                                     '" . $id . "')";
                    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $consulta = $link->prepare($sql);
                    $consulta->execute();
                }

                echo '<div class="note note-success">';
                echo '<h4 class="block">Datos ingresados con &eacute;xito!</h4>';
                echo '<p>';
                echo 'Registro ingresado exitosamente.';
                echo '</p>';
                echo '</div>';
                echo "<a href=\"#\" onclick=\"back()\" class=\"btn default\"><span>Volver</span></a>";

            }else{

                echo '<div class="note note-danger">';
                echo '<h4 class="block">Error! Problemas al cargar archivos</h4>';
                echo '<p>';
                echo 'El registro no ha podido ser ingresado.';
                echo '</p>';
                echo '</div>';
                echo "<a href=\"#\" onclick=\"back()\" class=\"btn default\"><span>Volver</span></a>";
                exit();
            }
        } else {

            echo '<div class="note note-danger">';
            echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
            echo '<p>';
            echo 'El registro no ha podido ser ingresado.';
            echo '</p>';
            echo '</div>';
            echo "<a href=\"#\" onclick=\"back()\" class=\"btn default\"><span>Volver</span></a>";
            exit();
        }


        ?>
    </div>
</div>



