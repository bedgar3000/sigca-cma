<?php
//	------------------------------------
if ($filtrar == "default") {
	$fEstado = 'A';
	$maxlimit = $_SESSION["MAXLIMIT"];
	$fOrderBy = "CodSector,CodSubSector";
}
if ($fBuscar != "") {
	$cBuscar = "checked";
	$filtro .= " AND (ss.IdSubSector LIKE '%".$fBuscar."%' OR
					  ss.Denominacion LIKE '%".$fBuscar."%' OR
					  ss.Descripcion LIKE '%".$fBuscar."%' OR
					  ss.CodSubSector LIKE '%".$fBuscar."%' OR
					  ss.CodClaSectorial LIKE '%".$fBuscar."%' OR
					  s.Denominacion LIKE '%".$fBuscar."%')";
} else $dBuscar = "disabled";
if ($fEstado != "") { $cEstado = "checked"; $filtro.=" AND (ss.Estado = '".$fEstado."')"; } else $dEstado = "disabled";
if ($fCodSector != "") { $cCodSector = "checked"; $filtro.=" AND (ss.CodSector = '".$fCodSector."')"; } else $dCodSector = "disabled";
//	------------------------------------
$_titulo = "Sub-Sectores";
$_width = 700;
?>
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="titulo"><?=$_titulo?></td>
		<td align="right"><a class="cerrar" href="../framemain.php">[cerrar]</a></td>
	</tr>
</table><hr width="100%" color="#333333" />

<form name="frmentrada" id="frmentrada" action="gehen.php?anz=pv_subsector_lista" method="post" autocomplete="off">
<input type="hidden" name="_APLICACION" id="_APLICACION" value="<?=$_APLICACION?>" />
<input type="hidden" name="concepto" id="concepto" value="<?=$concepto?>" />
<input type="hidden" name="lista" id="lista" value="<?=$lista?>" />
<input type="hidden" name="fOrderBy" id="fOrderBy" value="<?=$fOrderBy?>" />

<!--FILTRO-->
<div class="divBorder" style="width:100%; min-width:<?=$_width?>px;">
<table class="tblFiltro" style="width:100%; min-width:<?=$_width?>px;">
	<tr>
		<td align="right" width="100">Sector:</td>
		<td>
			<input type="checkbox" <?=$cCodSector?> onclick="chkCampos(this.checked, 'fCodSector');" />
			<select name="fCodSector" id="fCodSector" style="width:300px;" <?=$dCodSector?>>
				<option value="">&nbsp;</option>
				<?=loadSelect2('pv_sector','CodSector','Denominacion',$fCodSector,0,NULL,NULL,'CodSector')?>
			</select>
		</td>
		<td align="right" width="100">Estado: </td>
		<td>
            <input type="checkbox" <?=$cEstado?> onclick="chkFiltro(this.checked, 'fEstado');" />
            <select name="fEstado" id="fEstado" style="width:100px;" <?=$dEstado?>>
                <option value="">&nbsp;</option>
                <?=loadSelectGeneral("ESTADO", $fEstado, 0)?>
            </select>
		</td>
        <td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">Buscar:</td>
		<td>
			<input type="checkbox" <?=$cBuscar?> onclick="chkCampos(this.checked, 'fBuscar');" />
			<input type="text" name="fBuscar" id="fBuscar" value="<?=$fBuscar?>" style="width:294px;" <?=$dBuscar?> />
		</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><input type="submit" value="Buscar"></td>
	</tr>
</table>
</div>
<div class="sep"></div>

<!--REGISTROS-->
<center>
<input type="hidden" name="sel_registros" id="sel_registros" />
<table class="tblBotones" style="width:100%; min-width:<?=$_width?>px;">
    <tr>
        <td><div id="rows"></div></td>
        <td align="right">
            <input type="button" value="Nuevo" style="width:75px;" class="insert" onclick="cargarPagina(this.form, 'gehen.php?anz=pv_subsector_form&opcion=nuevo');" />
            <input type="button" value="Modificar" style="width:75px;" class="update" onclick="cargarOpcion2(this.form, 'gehen.php?anz=pv_subsector_form&opcion=modificar', 'SELF', '', $('#sel_registros').val());" />
            <input type="button" value="Eliminar" style="width:75px;" class="delete" onclick="opcionRegistro3(this.form, $('#sel_registros').val(), 'formulario', 'eliminar', 'pv_subsector_ajax.php');" />
            <input type="button" value="Ver" style="width:75px;" class="ver" onclick="cargarOpcion2(this.form, 'gehen.php?anz=pv_subsector_form&opcion=ver', 'SELF', '', $('#sel_registros').val());" />
        </td>
    </tr>
</table>

<div style="overflow:scroll; width:100%; min-width:<?=$_width?>px; height:265px;">
<table class="tblLista" style="width:100%; min-width:2000px;">
	<thead>
    <tr>
        <th width="75" onclick="order('IdSubSector')">Id.</th>
        <th width="75" onclick="order('CodSubSector')">C&oacute;digo</th>
        <th width="75" onclick="order('CodClaSectorial')">Sub-Sector</th>
        <th width="300" align="left" onclick="order('Denominacion')">Denominaci&oacute;n</th>
        <th width="300" align="left" onclick="order('Sector,Denominacion')">Sector</th>
        <th align="left" onclick="order('Descripcion')">Descripci&oacute;n</th>
        <th width="75" onclick="order('Estado')">Estado</th>
    </tr>
    </thead>
    
    <tbody id="lista_registros">
	<?php
	//	consulto todos
	$sql = "SELECT ss.*
			FROM pv_subsector ss
			INNER JOIN pv_sector s ON (s.CodSector = ss.CodSector)
			WHERE 1 $filtro";
	$rows_total = getNumRows3($sql);
	//	consulto lista
	$sql = "SELECT
				ss.*,
				s.Denominacion AS Sector
			FROM pv_subsector ss
			INNER JOIN pv_sector s ON (s.CodSector = ss.CodSector)
			WHERE 1 $filtro
			ORDER BY $fOrderBy
			LIMIT ".intval($limit).", ".intval($maxlimit);
	$field = getRecords($sql);
	$rows_lista = count($field);
	foreach($field as $f) {
		$id = $f['IdSubSector'];
		?>
		<tr class="trListaBody" onclick="clk($(this), 'registros', '<?=$id?>');">
			<td align="center"><?=$f['IdSubSector']?></td>
			<td align="center"><?=$f['CodSubSector']?></td>
			<td align="center"><?=$f['CodClaSectorial']?></td>
			<td><?=htmlentities($f['Denominacion'])?></td>
			<td><?=$f['CodSector']?>-<?=htmlentities($f['Sector'])?></td>
			<td><?=htmlentities($f['Descripcion'])?></td>
			<td align="center"><?=printValoresGeneral('ESTADO',$f['Estado'])?></td>
		</tr>
		<?php
	}
	?>
    </tbody>
</table>
</div>

<table style="width:100%; min-width:<?=$_width?>px;">
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