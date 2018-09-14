<?php
	include('../../../MASTER/include/verifyAPP.php');
?>  
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
		form valido {{addPizarra.$valid}}
		<br>
		form invalido {{addPizarra.$invalid}}
		<form class="form-horizontal" role="form" name="addPizarra">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Cliente</label>
					<div class="col-md-6">
						<select ng-model="p.cliente" id="cliente" name="cliente" class="form-control" ng-required="true">
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
					<div class="col-md-3"><div id="msgCliente" ng-show="addPizarra.cliente.$invalid && addPizarra.cliente.$dirty"><span style='color:#FF0000;'>Seleccione Cliente.</span></div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">T&iacute;tulo</label>
					<div class="col-md-6"><input ng-model="p.titulo" id="titulo" name="titulo" type="text" maxlength="50" class="form-control" ng-required="true"></div>
					<div class="col-md-3"><div id="msgTitulo" ng-show="addPizarra.titulo.$invalid && addPizarra.titulo.$dirty"><span style='color:#FF0000;'>Ingrese T&iacute;tulo.</span></div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Descripci&oacute;n</label>
					<div class="col-md-6"><textarea ng-model="p.descripcion" id="descripcion" name="descripcion" class="form-control"/></div>
					<div class="col-md-3"><div id="msgDescripcion" ng-show="addPizarra.descripcion.$invalid && addPizarra.descripcion.$dirty"><span style='color:#FF0000;'>Ingrese Descripci&oacute;n.</span></div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Vigencia</label>
					<div class="col-md-3"><input ng-model="p.vigenciaIni" id="vigenciaIni" name="vigenciaIni" type="date" value="{{ Date('yyyy-MM-dd') }}" class="form-control" ng-required="true"></div>
					<div class="col-md-3"><input ng-model="p.vigenciaFin" id="vigenciaFin" name="vigenciaFin" type="date" value="{{ Date('yyyy-MM-dd') }}" class="form-control" ng-required="true"></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">E-mail</label>
					<div class="col-md-6"><input ng-model="p.email" id="email" name="email" type="email" maxlength="50" class="form-control" ng-required="true" ng-pattern="/[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}/"></div>
					<div class="col-md-3"><div id="msgEmail" ng-show="addPizarra.email.$error.required && addPizarra.email.$dirty"><span style='color:#FF0000;'>Ingrese Email.</span></div></div>
					<div class="col-md-3"><div id="msgEmail" ng-show="addPizarra.email.$error.pattern"><span style='color:#FF0000;'>Email Inv&aacute;lido.</span></div></div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Telefono</label>
					<div class="col-md-6"><input ng-model="p.phone" id="phone" name="phone" type="text" maxlength="11" class="form-control" placeholder="Ej. 56967891234 o 967891234 o 226714567" onkeypress="return onlyNumbers(event)" ng-required="true" ng-pattern="/(^9\d{8}$)|(^56\d{9}$)|(^2\d{7}$)|(^[3-9]{2}\d{6}$)/"></div>
					<div class="col-md-3"><div id="msgPhone" ng-show="addPizarra.phone.$error.required && addPizarra.phone.$dirty"><span style='color:#FF0000;'>Ingrese Tel&eacute;fono.</span></div></div>
					<div class="col-md-3"><div id="msgEmail" ng-show="addPizarra.phone.$error.pattern"><span style='color:#FF0000;'>Tel&eacute;fono Inv&aacute;lido.</span></div></div>
				</div>
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-offset-3 col-md-9">
						<a href='' ng-click='cancelar()' class='btn btn-default'><span>Cancelar</span></a>
						<input type="button" name="Guardar" id="Guardar" onclick="" value="Agregar Pizarra"  class='btn btn-primary' ng-disabled='addPizarra.$invalid' style="width:auto;" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>