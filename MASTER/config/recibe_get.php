<?php
	foreach($_GET as $nombre_campo => $valor)
	{
		$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
		eval ($asignacion);
	}
?>
