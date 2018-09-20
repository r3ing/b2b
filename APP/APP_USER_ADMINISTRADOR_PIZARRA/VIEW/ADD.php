<?php
include('../../../MASTER/include/verifyAPP.php');
?>
</br></br>
<div class="row">
    <div class="col-md-12">
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
        <form class="form-horizontal" role="form" name="addPizarra" id="addPizarra" enctype="multipart/form-data"><!--  action="VIEW/ADD_DB.php" method="post" -->
            <div class="form-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">Cliente</label>
                    <div class="col-md-6">
                        <select id="cliente" name="cliente" class="form-control">
                            <option value="">Seleccione Cliente</option>
                            <option value="1">Bata</option>
                            <?php
                            /*
                                include('../../../MASTER/config/conect.php');
                                $sql = "SELECT * FROM cliente";
                                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $result = $link->prepare($sql);
                                $result->execute();
                                while ($row = $result->fetch()) {
                                    ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo utf8_encode($row[1]); ?></option>
                                    <?php
                                }
                            */
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
                    <div class="col-md-6"><textarea id="descripcion" name="descripcion" class="form-control"/></div>
                    <div class="col-md-3"><div id="msgDescripcion">&nbsp;</div></div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Vigencia</label>
                    <div class="col-md-3"><input id="vigenciaIni" name="vigenciaIni" type="date" value="<?php echo date("Y-m-d");?>" class="form-control"></div>
                    <div class="col-md-3"><input id="vigenciaFin" name="vigenciaFin" type="date" value="<?php echo date("Y-m-d");?>" class="form-control"></div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">E-mail</label>
                    <div class="col-md-6"><input id="email" name="email" type="text" maxlength="50" class="form-control"></div>
                    <div class="col-md-3"><div id="msgEmail">&nbsp;</div></div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Telefono</label>
                    <div class="col-md-6"><input id="phone" name="phone" type="text" maxlength="11" class="form-control" placeholder="Ej. 56967891234 o 967891234 o 226714567" ng-required="true" ng-pattern="/(^9\d{8}$)|(^569\d{8}$)|(^2\d{7}$)|(^[3-9]{2}\d{6}$)/"></div>
                    <div class="col-md-3"><div id="msgPhone">&nbsp;</div></div>
                </div>
                <div class="form-group">
                        <label for="files" class="col-md-3 control-label">Archivos</label>
                        <div class="col-md-6"><input type="file" accept=".xlsx, .xls, .doc, .docx, .pdf" class="form-control-file" id="file1" name="file1"></div>
                        <div class="col-md-3"><div id="msgFile">&nbsp;</div></div>
                        <div class="col-md-12"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6"><input type="file" accept=".xlsx, .xls, .doc, .docx, .pdf" class="form-control-file" id="file2" name="file2"></div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <a href='' onclick='cancel()' class='btn btn-default'><span>Cancelar</span></a>
                        <input type="submit" name="guardar" id="guardar" value="Agregar Pizarra" class='btn btn-primary' style="width:auto;"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    </div>
</div>


<script type="text/javascript">

    $("#addPizarra").on('submit', function(e){
        e.preventDefault();
        if(validateForm(1)) {
             $('#forms').hide();
             $('#loading').show();
             $.ajax({
                 type: 'POST',
                 url: 'VIEW/ADD_DB.php',
                 data: new FormData(this),
                 contentType: false,
                 cache: false,
                 processData: false,
                 beforeSend: function () {
                 },
                 success: function (data) {
                    $('#result').html(data);
                 },
                 complete: function () {
                    $('#loading').hide();
                    $('#result').fadeIn('slow');
                    window.location.href = "#result";
                 }
             });
        }
    });

    $("#vigenciaIni").on('change', function(e){
        if($('#vigenciaIni').val() > $('#vigenciaFin').val()){
            $('#vigenciaFin').val($('#vigenciaIni').val());
        }
    });

    $("#vigenciaFin").on('change', function(e){
        if($('#vigenciaFin').val() < $('#vigenciaIni').val()){
            $('#vigenciaIni').val($('#vigenciaFin').val());
        }
    });


</script>