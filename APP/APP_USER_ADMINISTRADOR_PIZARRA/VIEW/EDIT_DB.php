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

		$uploads = 0;

		if (isset($_POST['cliente'])) {

			if ($target_file1) {
				if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file1)) {
					$uploads = 1;
				} else {
					$uploads = 0;
				}
			}elseif ($target_file2) {
				if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file2)) {
					$uploads = 1;
				} else {
					$uploads = 0;
				}
			}else{
				$uploads = 1;
			}

			if($uploads == 1) {

				$id = $_POST['_id'];
				$cliente = $_POST['cliente'];
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$vigenciaIni = $_POST['vigenciaIni'];
				$vigenciaFin = $_POST['vigenciaFin'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$identifier = $_POST['_identifier'];
				$_doc1 = $_POST['_doc1'];
				$_doc2 = $_POST['_doc2'];

				include('../../../MASTER/config/conect.php');
				$sql = "UPDATE pizarra SET 	titulo		  = '".trim($titulo)."',
											descripcion   = '".trim($descripcion)."',
											vigencia_ini  = '".$vigenciaIni."',
											vigencia_fin  = '".$vigenciaFin."',
											email		  =	'".$email."',
											phone		  =	'".$phone."',
											id_cliente	  =	'".$cliente."' ";
				$sql = $sql." WHERE id = ".$id;

				try {
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$consulta = $link->prepare($sql);
					$consulta->execute();
					echo "actualizo datos";
				} catch( PDOExecption $e ) {
					print "Error!: " . $e->getMessage() . "</br>";
				}

				if($_doc1) {
					$sql = "UPDATE docs SET doc1 = NULL WHERE identifier = ".$identifier;
					echo "borro file1 NULL";
				}elseif($_doc2) {
					$sql = "UPDATE docs SET doc2 = NULL WHERE identifier = ".$identifier;
					echo "borro file2 NULL";
				}

				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$consulta = $link->prepare($sql);
				$consulta->execute();

				if($target_file1 && $target_file2){
					$sql = "UPDATE docs SET doc1 = '".end($fileName1)."', doc2 = '".end($fileName2)."' WHERE identifier = ".$identifier;
					echo "actualizo file1 y file2";
				}
				if($target_file1) {
					$sql = "UPDATE docs SET doc1 = '".end($fileName1)."' WHERE identifier = ".$identifier;
					echo "actualizo file1";
				}
				if($target_file2) {
					$sql = "UPDATE docs SET doc2 = '".end($fileName2)."' WHERE identifier = ".$identifier;
					echo "actualizo file2";
				}

				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$consulta = $link->prepare($sql);
				$consulta->execute();

				if($_doc1) {
					unlink($target_dir.$_doc1);
					echo "borro file1";
				}elseif($_doc2) {
					unlink($target_dir.$_doc2);
					echo "borro file2";
				}

				echo '<div class="note note-success">';
				echo '<h4 class="block">Datos actualizados con &eacute;xito!</h4>';
				echo '<p>';
				echo 'Registro actualizado exitosamente.';
				echo '</p>';
				echo '</div>';
				echo "<a href=\"\" onclick=\"cancel()\" class=\"btn default\"><span>Volver</span></a>";

			}else{

				echo '<div class="note note-danger">';
				echo '<h4 class="block">Error! Problemas al cargar archivos</h4>';
				echo '<p>';
				echo 'El registro no ha podido ser ingresado.';
				echo '</p>';
				echo '</div>';
				echo "<a href=\"\" onclick=\"cancel()\" class=\"btn default\"><span>Volver</span></a>";
				exit();
			}
		} else {

			echo '<div class="note note-danger">';
			echo '<h4 class="block">Error! Problemas de Comunicaci&oacute;n</h4>';
			echo '<p>';
			echo 'El registro no ha podido ser ingresado.';
			echo '</p>';
			echo '</div>';
			echo "<a href=\"\" onclick=\"cancel()\" class=\"btn default\"><span>Volver</span></a>";
			exit();
		}

		?>
	</div>
</div>



