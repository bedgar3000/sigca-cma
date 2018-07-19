<?php
session_start();
if (!isset($_SESSION['USUARIO_ACTUAL']) || !isset($_SESSION['ORGANISMO_ACTUAL'])) header("Location: ../../index.php");
//	------------------------------------
extract($_POST);
extract($_GET);
//	------------------------------------
include("../fphp.php");
//	------------------------------------
if ($filtrar == "default") {
	$fOrdenar = "CodUbicacion";
	$maxlimit = $_SESSION["MAXLIMIT"];
}
if ($fBuscar != "") {
	$cBuscar = "checked";
	$filtro.=" AND (CodUbicacion LIKE '%".$fBuscar."%' OR
				    Descripcion LIKE '%".$fBuscar."%')";
} else $dBuscar = "disabled";
if ($CodDependencia != "") $filtro .= " AND (cc.CodDependencia = '".$CodDependencia."')";
if ($fOrdenar != "") { $orderby = " ORDER BY $fOrdenar"; $cOrdenar='checked'; }
//	------------------------------------
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="../css/prettyPhoto.css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script type="text/javascript" language="javascript" src="fscript.js"></script>
<script type="text/javascript" language="javascript" src="af_fscript.js"></script>
<script type="text/javascript" language="javascript" src="af_fscript01.js"></script>
<script type="text/javascript" src="../js/jquery-1.7.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/jquery.prettyPhoto.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/funciones.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/fscript.js" charset="utf-8"></script>
</head>

<body>
<form name="frmentrada" id="frmentrada" action="af_selectorubicacion_activo.php?" method="post">
<input type="hidden" name="registro" id="registro" />
<input type="hidden" name="cod" id="cod" value="<?=$cod?>" />
<input type="hidden" name="nom" id="nom" value="<?=$nom?>" />
<input type="hidden" name="campo3" id="campo3" value="<?=$campo3?>" />
<input type="hidden" name="campo4" id="campo4" value="<?=$campo4?>" />
<input type="hidden" name="ventana" id="ventana" value="<?=$ventana?>" />
<input type="hidden" name="seldetalle" id="seldetalle" value="<?=$seldetalle?>" />
<input type="hidden" name="CodDependencia" id="CodDependencia" value="<?=$CodDependencia?>" />
<div class="divBorder" style="width:800px;">
<table width="800" class="tblFiltro">
	<tr>
		<td align="right" width="125">Buscar:</td>
        <td>
            <input type="checkbox" <?=$cBuscar?> onclick="chkFiltro(this.checked, 'fBuscar');" />
            <input type="text" name="fBuscar" id="fBuscar" style="width:200px;" value="<?=$fBuscar?>" <?=$dBuscar?> />
		</td>
		<td align="right" width="125">Ordenar Por:</td>
		<td>
            <input type="checkbox" <?=$cOrdenar?> onclick="this.checked=!this.checked;" />
            <select name="fOrdenar" id="fOrdenar" style="width:100px;" <?=$dOrdenar?>>
                <?=loadSelectGeneral("ORDENAR-UBICACION-ACTIVO", $fOrdenar, 0)?>
            </select>
		</td>
	</tr>
</table>
</div>
<center><input type="submit" value="Buscar"></center><br />

<center>
<table width="800" class="tblBotones">
	<tr>
		<td><div id="rows"></div></td>
	</tr>
</table>

<div style="overflow:scroll; width:800px; height:250px;">
<table width="100%" class="tblLista">
	<thead>
	<tr>
		<th width="50" scope="col">CodUbicaci&oacute;n</th>
		<th scope="col">Descripci&oacute;n</th>
		<th width="50" scope="col">Estado</th>
	</tr>
	</thead>
	<?php
	//if ($filtroDependencia != "S") {
		//	consulto todos
		$sql = "SELECT *
				  FROM af_ubicaciones
				 WHERE Estado= 'A' $filtro";
		$query = mysql_query($sql) or die ($sql.mysql_error());
		$rows_total = mysql_num_rows($query);
		
		//	consulto lista
		$sql = "SELECT *
				  FROM af_ubicaciones
				 WHERE Estado = 'A' $filtro
				$orderby
				LIMIT ".intval($limit).", $maxlimit";
		$query = mysql_query($sql) or die ($sql.mysql_error());
		$rows_lista = mysql_num_rows($query);
		
		//	MUESTRO LA TABLA
		while ($field = mysql_fetch_array($query)) {
			if ($ventana == "selListadoLista") {
				?><tr class="trListaBody" onclick="selListadoLista('<?=$seldetalle?>', '<?=$field["CodCentroCosto"]?>', '<?=$field["CodCentroCosto"]?>', '<?=$cod?>', '<?=$nom?>');" id="<?=$field['CodCentroCosto']?>"><?php
			}elseif ($ventana == "selListadoLista03") {
			  ?><tr class="trListaBody" onclick="selListado3('<?=$field['CodUbicacion']?>', '<?=($field["Descripcion"])?>', '<?=$campo?>','<?=$cod?>', '<?=$nom?>');" id="<?=$field['CodCentroCosto']?>"><?php
			}else {
				?><tr class="trListaBody" onclick="selListado2('<?=$field['CodCentroCosto']?>', '<?=($field["CodCentroCosto"])?>', '<?=$cod?>', '<?=$nom?>');" id="<?=$field['CodPersona']?>"><?php
			}
			?>
				<td align="center"><?=$field['CodUbicacion']?></td>
				<td><?=htmlentities($field['Descripcion'])?></td>
				<td align="center"><?=htmlentities($field['Estado'])?></td>
			</tr>
			<?php
		}
	//}
	?>
</table>
</div>
<table width="800">
	<tr>
    	<td>
        	Mostrar: 
            <select name="maxlimit" style="width:50px;" onchange="this.form.submit();">
                <?=loadSelectGeneral("MAXLIMIT", $maxlimit, 0)?>
            </select>
        </td>
        <td align="right">
        	<?=paginacion(intval($rows_total), intval($rows_lista), intval($maxlimit), intval($limit));?>
        </td>
    </tr>
</table>
</center>
</form>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	<?php
	if ($filtroDependencia == "S") {
		?>
		var CodDependencia = parent.$("#CodDependencia").val();
		$("#CodDependencia").val(CodDependencia);
		$("#frmentrada").submit();
		<?php
	}
	?>
	totalRegistros(parseInt(<?=intval($rows_total)?>));
});	
</script>
</body>
</html>