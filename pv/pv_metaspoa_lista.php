<?php
//	------------------------------------
if ($filtrar == "default") {
	$fEstado = 'A';
	$maxlimit = $_SESSION["MAXLIMIT"];
	$fOrderBy = "CategoriaProg,NroObjetivo,NroMeta";
}
if ($fBuscar != "") {
	$cBuscar = "checked";
	$filtro .= " AND (mp.NroMeta LIKE '%".$fBuscar."%' OR
					  mp.Descripcion LIKE '%".$fBuscar."%' OR
					  op.NroObjetivo LIKE '%".$fBuscar."%' OR
					  op.CategoriaProg LIKE '%".$fBuscar."%')";
} else $dBuscar = "disabled";
if ($fEstado != "") { $cEstado = "checked"; $filtro.=" AND (op.Estado = '".$fEstado."')"; } else $dEstado = "disabled";
if ($fCategoriaProg != "") { $cCategoriaProg = "checked"; $filtro.=" AND (op.CategoriaProg = '".$fCategoriaProg."')"; } else $dCategoriaProg = "visibility:hidden;";
if ($fCodObjetivo != "") { $cCodObjetivo = "checked"; $filtro.=" AND (op.CodObjetivo = '".$fCodObjetivo."')"; } else $dCodObjetivo = "disabled";
//	------------------------------------
$_titulo = "Metas";
$_width = 700;
?>
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="titulo"><?=$_titulo?></td>
		<td align="right"><a class="cerrar" href="../framemain.php">[cerrar]</a></td>
	</tr>
</table><hr width="100%" color="#333333" />

<form name="frmentrada" id="frmentrada" action="gehen.php?anz=pv_metaspoa_lista" method="post" autocomplete="off">
<input type="hidden" name="_APLICACION" id="_APLICACION" value="<?=$_APLICACION?>" />
<input type="hidden" name="concepto" id="concepto" value="<?=$concepto?>" />
<input type="hidden" name="fOrderBy" id="fOrderBy" value="<?=$fOrderBy?>" />

<!--FILTRO-->
<div class="divBorder" style="width:100%; min-width:<?=$_width?>px; margin:auto;">
	<table class="tblFiltro" style="width:100%; min-width:<?=$_width?>px;">
		<tr>
			<td align="right" width="150">Categoria Prog.:</td>
			<td class="gallery clearfix">
				<input type="checkbox" <?=$cCategoriaProg?> onclick="ckLista(this.checked, ['fCategoriaProg'], ['aCategoriaProg']); $('#fCodObjetivo').html('<option>&nbsp;</option>');" />
				<input type="text" name="fCategoriaProg" id="fCategoriaProg" value="<?=$fCategoriaProg?>" style="width:100px;" readonly="readonly" />
				<a href="../lib/listas/gehen.php?anz=lista_pv_categoriaprog&filtrar=default&ventana=pv_metas&campo1=fCategoriaProg&iframe=true&width=100%&height=100%" rel="prettyPhoto[iframe1]" id="aCategoriaProg" style=" <?=$dCategoriaProg?>">
	            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer;" />
	            </a>
			</td>
			<td align="right" width="150">Buscar: </td>
			<td>
				<input type="checkbox" <?=$cBuscar?> onclick="chkCampos(this.checked, 'fBuscar');" />
				<input type="text" name="fBuscar" id="fBuscar" value="<?=$fBuscar?>" style="width:350px;" <?=$dBuscar?> />
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="right">Nro Objetivo: </td>
			<td>
	            <input type="checkbox" <?=$cCodObjetivo?> onclick="chkFiltro(this.checked, 'fCodObjetivo');" />
				<select name="fCodObjetivo" id="fCodObjetivo" style="width:100px;" <?=$dCodObjetivo?>>
					<option value="">&nbsp;</option>
					<?=loadSelect2('pv_objetivospoa','CodObjetivo','NroObjetivo',$fCodObjetivo,0,['CategoriaProg'],[$fCategoriaProg])?>
				</select>
			</td>
			<td align="right">Estado: </td>
			<td>
	            <input type="checkbox" <?=$cEstado?> onclick="chkFiltro(this.checked, 'fEstado');" />
	            <select name="fEstado" id="fEstado" style="width:107px;" <?=$dEstado?>>
	                <option value="">&nbsp;</option>
	                <?=loadSelectGeneral("ESTADO", $fEstado, 0)?>
	            </select>
			</td>
	        <td align="right"><input type="submit" value="Buscar"></td>
		</tr>
	</table>
</div>
<div class="sep"></div>

<!--REGISTROS-->
<input type="hidden" name="sel_registros" id="sel_registros" />
<table class="tblBotones" style="width:100%; min-width:<?=$_width?>px; margin:auto;">
    <tr>
        <td><div id="rows"></div></td>
        <td align="right">
            <input type="button" value="Nuevo" style="width:75px;" class="insert" onclick="cargarPagina(this.form, 'gehen.php?anz=pv_metaspoa_form&opcion=nuevo');" />
            <input type="button" value="Modificar" style="width:75px;" class="update" onclick="cargarOpcion2(this.form, 'gehen.php?anz=pv_metaspoa_form&opcion=modificar', 'SELF', '', $('#sel_registros').val());" />
            <input type="button" value="Eliminar" style="width:75px;" class="delete" onclick="opcionRegistro3(this.form, $('#sel_registros').val(), 'formulario', 'eliminar', 'pv_metaspoa_ajax.php');" />
            <input type="button" value="Ver" style="width:75px;" class="ver" onclick="cargarOpcion2(this.form, 'gehen.php?anz=pv_metaspoa_form&opcion=ver', 'SELF', '', $('#sel_registros').val());" />
        </td>
    </tr>
</table>

<div class="scroll" style="overflow:scroll; width:100%; min-width:<?=$_width?>px; height:265px; margin:auto;">
	<table class="tblLista" style="width:100%; min-width:1200px;">
		<thead>
		    <tr>
		        <th width="125" onclick="order('CategoriaProg,NroObjetivo,NroMeta')">Cat. Prog.</th>
		        <th width="75" onclick="order('NroObjetivo,NroMeta')">Nro. Objetivo</th>
		        <th width="75" onclick="order('NroMeta')">Nro. Meta</th>
		        <th align="left" onclick="order('Descripcion')">Descripci&oacute;n</th>
		        <th width="75" onclick="order('Estado')">Estado</th>
		    </tr>
	    </thead>
	    
	    <tbody id="lista_registros">
		<?php
		//	consulto todos
		$sql = "SELECT mp.*
				FROM
					pv_metaspoa mp
					INNER JOIN pv_objetivospoa op ON (op.CodObjetivo = mp.CodObjetivo)
					INNER JOIN pv_categoriaprog cp ON (cp.CategoriaProg = op.CategoriaProg)
					INNER JOIN pv_unidadejecutora ue ON (ue.CodUnidadEjec = cp.CodUnidadEjec)
				WHERE 1 $filtro";
		$rows_total = getNumRows3($sql);
		//	consulto lista
		$sql = "SELECT
					mp.*,
					op.NroObjetivo,
					op.CategoriaProg,
					ue.Denominacion AS UnidadEjecutora
				FROM
					pv_metaspoa mp
					INNER JOIN pv_objetivospoa op ON (op.CodObjetivo = mp.CodObjetivo)
					INNER JOIN pv_categoriaprog cp ON (cp.CategoriaProg = op.CategoriaProg)
					INNER JOIN pv_unidadejecutora ue ON (ue.CodUnidadEjec = cp.CodUnidadEjec)
				WHERE 1 $filtro
				ORDER BY $fOrderBy
				LIMIT ".intval($limit).", ".intval($maxlimit);
		$field = getRecords($sql);
		$rows_lista = count($field);
		foreach($field as $f) {
			$id = $f['CodMeta'];
			?>
			<tr class="trListaBody" onclick="clk($(this), 'registros', '<?=$id?>');">
				<td align="center"><?=$f['CategoriaProg']?></td>
				<td align="center"><?=$f['NroObjetivo']?></td>
				<td align="center"><?=$f['NroMeta']?></td>
				<td><?=htmlentities($f['Descripcion'])?></td>
				<td align="center"><?=printValoresGeneral('ESTADO',$f['Estado'])?></td>
			</tr>
			<?php
		}
		?>
	    </tbody>
	</table>
</div>

<table style="width:100%; min-width:<?=$_width?>px; margin:auto;">
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
</form>