<?php
	include('../../../MASTER/include/verifyAPP.php');
?>
</br>
</br>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
			<i class="icon-settings font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">
                Nueva Pizarra
            </span>
        </div>
    </div>
	<div class="portlet-body form">
		<form class="form-horizontal" role="form">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Cliente</label>
					<div class="col-md-6">
						<select id="cliente" name="cliente" class="form-control">
							<option value="">Seleccione Cliente</option>
							<?php
							include('../../../MASTER/config/conect.php');
							$sql="SELECT * FROM cliente";
							$link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
							$result = $link->prepare($sql);
							$result->execute();
							while ($row = $result->fetch()) {
								?>
								<option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="col-md-3"><div id="msgCliente">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">T&iacute;tulo</label>
					<div class="col-md-6"><input id="titulo" name="titulo" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgTitulo">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Descripci&oacute;n</label>
					<div class="col-md-6"><textarea id="descripcion" name="descripcion" class="form-control"></textarea></div>
					<div class="col-md-3"><div id="msgDescripcion">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Vigencia</label>
					<div class="col-md-3"><input id="vigenciaIni" name="vigenciaIni" type="date" data-date="" date-date-format="YYYY MMMM DD" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><input id="vigenciaFin" name="vigenciaFin" type="date"  maxlength="50" data-date="" date-date-format="DD MMMM YYYY"  class="form-control"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">E-mail</label>
					<div class="col-md-6"><input id="email" name="email" type="text" maxlength="50" class="form-control"></div>
					<div class="col-md-3"><div id="msgEmail">&nbsp;</div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Telefono</label>
					<div class="col-md-6"><input id="phone" name="phone" type="text" maxlength="11" class="form-control" placeholder="Ej. 56967891234 o 967891234 o 226714567" onkeypress="return onlyNumbers(event)"></div>
					<div class="col-md-3"><div id="msgPhone">&nbsp;</div></div>
				</div>
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<a href="#" onclick="back('<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>')" class="btn btn-default"><span>Volver</span></a>
						<input type="button" name="Guardar" id="Guardar" onclick="" value="Agregar Pizarra"  class='btn btn-primary' ng-disabled='addPizarra.$invalid' style="width:auto;" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>