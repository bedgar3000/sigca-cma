<?php
//	------------------------------------
if ($filtrar == "default") {
	$fEstado = "A";
	$maxlimit = $_SESSION["MAXLIMIT"];
	$fOrderBy = "CodLinea,CodFamilia,CodSubFamilia";
}
if ($fBuscar != "") {
	$cBuscar = "checked";
	$filtro .= " AND (sf.CodSubFamilia LIKE '%".$fBuscar."%' OR
					  sf.CodFamilia LIKE '%".$fBuscar."%' OR
					  sf.CodLinea LIKE '%".$fBuscar."%' OR
					  sf.Descripcion LIKE '%".$fBuscar."%')";
} else $dBuscar = "disabled";
if ($fEstado != "") { $cEstado = "checked"; $filtro.=" AND (sf.Estado = '".$fEstado."')"; } else $dEstado = "disabled";
if ($fCodLinea != "") { $cCodLinea = "checked"; $filtro.=" AND (sf.CodLinea = '".$fCodLinea."')"; } else $dCodLinea = "visibility:hidden;";
if ($fCodFamilia != "") { $filtro.=" AND (sf.CodFamilia = '".$fCodFamilia."')"; }
//	------------------------------------
?>
<form name="frmentrada" id="frmentrada" action="gehen.php?anz=lista_at_subfamilia" method="post">
<input type="hidden" name="registro" id="registro" />
<input type="hidden" name="campo1" id="campo1" value="<?=$campo1?>" />
<input type="hidden" name="campo2" id="campo2" value="<?=$campo2?>" />
<input type="hidden" name="campo3" id="campo3" value="<?=$campo3?>" />
<input type="hidden" name="campo4" id="campo4" value="<?=$campo4?>" />
<input type="hidden" name="campo5" id="campo5" value="<?=$campo5?>" />
<input type="hidden" name="campo6" id="campo6" value="<?=$campo6?>" />
<input type="hidden" name="campo7" id="campo7" value="<?=$campo7?>" />
<input type="hidden" name="campo8" id="campo8" value="<?=$campo8?>" />
<input type="hidden" name="campo9" id="campo9" value="<?=$campo9?>" />
<input type="hidden" name="campo10" id="campo10" value="<?=$campo10?>" />
<input type="hidden" name="ventana" id="ventana" value="<?=$ventana?>" />
<input type="hidden" name="detalle" id="detalle" value="<?=$detalle?>" />
<input type="hidden" name="modulo" id="modulo" value="<?=$modulo?>" />
<input type="hidden" name="accion" id="accion" value="<?=$accion?>" />
<input type="hidden" name="url" id="url" value="<?=$url?>" />
<input type="hidden" name="fOrderBy" id="fOrderBy" value="<?=$fOrderBy?>" />

<div class="divBorder" style="width:100%; min-width:<?=$_width?>px;">
<table class="tblFiltro" style="width:100%; min-width:<?=$_width?>px;">
	<tr>
		<td align="right" width="100">Linea:</td>
		<td class="gallery clearfix">
			<input type="checkbox" <?=$cCodLinea?> onclick="ckLista(this.checked, ['fCodLinea','fCodFamilia'], ['btCodLinea']);" />
        	<input type="text" name="fCodLinea" id="fCodLinea" value="<?=$fCodLinea?>" style="width:50px; font-weight:bold;" readonly />
            <a href="javascript:" onclick="window.open('gehen.php?anz=lista_at_familia&filtrar=default&campo1=fCodLinea&campo2=fCodFamilia&ventana=selListaOpener','lista_at_linea','width=950, height=430, toolbar=no, menubar=no, location=no, scrollbars=yes, left=0, top=0, resizable=no')" style=" <?=$dCodLinea?>" id="btCodLinea">
            	<img src="../../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer;" />
            </a>
		</td>
		<td align="right" width="150">Buscar:</td>
		<td>
			<input type="checkbox" <?=$cBuscar?> onclick="chkCampos(this.checked, 'fBuscar');" />
			<input type="text" name="fBuscar" id="fBuscar" value="<?=$fBuscar?>" style="width:250px;" <?=$dBuscar?> />
		</td>
        <td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">Familia:</td>
		<td style="padding-left:24px;">
        	<input type="text" name="fCodFamilia" id="fCodFamilia" value="<?=$fCodFamilia?>" style="width:50px; font-weight:bold;" readonly />
		</td>
		<td align="right">Estado: </td>
		<td>
            <input type="checkbox" <?=$cEstado?> onclick="this.checked=!this.checked;" />
            <select name="fEstado" id="fEstado" style="width:100px;" <?=$dEstado?>>
                <?=loadSelectGeneral("ESTADO", $fEstado, 1)?>
            </select>
		</td>
        <td align="right"><input type="submit" value="Buscar"></td>
	</tr>
</table>
</div>
<div class="sep"></div>

<center>
<div style="overflow:scroll; height:315px; width:100%; min-width:<?=$_width?>px;">
<table class="tblLista" style="width:100%; min-width:800px;">
	<thead>
    <tr>
        <th scope="col" width="60" onclick="order('CodSubFamilia')">C&oacute;digo</th>
        <th scope="col" align="left" onclick="order('Descripcion')">Descripci&oacute;n</th>
        <th scope="col" width="60" onclick="order('CodLinea,CodFamilia,CodSubFamilia')">Linea</th>
        <th scope="col" width="60" onclick="order('CodFamilia,CodSubFamilia')">Familia</th>
        <th scope="col" width="90" onclick="order('Estado')">Estado</th>
    </tr>
    </thead>
    
    <tbody>
	<?php
	//	consulto todos
	$sql = "SELECT
				sf.*,
				f.Descripcion AS Familia,
				l.Descripcion AS Linea
			FROM
				at_subfamilia sf
				INNER JOIN at_familia f ON (f.CodFamilia = sf.CodFamilia AND f.CodLinea = sf.CodLinea)
				INNER JOIN at_linea l ON (l.CodLinea = f.CodLinea)
			WHERE 1 $filtro";
	$rows_total = getNumRows3($sql);
	//	consulto lista
	$sql = "SELECT
				sf.*,
				f.Descripcion AS Familia,
				l.Descripcion AS Linea
			FROM
				at_subfamilia sf
				INNER JOIN at_familia f ON (f.CodFamilia = sf.CodFamilia AND f.CodLinea = sf.CodLinea)
				INNER JOIN at_linea l ON (l.CodLinea = f.CodLinea)
			WHERE 1 $filtro
			ORDER BY $fOrderBy
			LIMIT ".intval($limit).", ".intval($maxlimit);
	$field = getRecords($sql);
	$rows_lista = count($field);
	foreach($field as $f) {
		if ($ventana == "selListaFiltro") {
			?>
        	<tr class="trListaBody" onClick="selLista(['<?=$f['CodLinea']?>','<?=$f['CodFamilia']?>','<?=$f['CodSubFamilia']?>'], ['<?=$campo1?>','<?=$campo2?>','<?=$campo3?>']);">
            <?php
		} else {
			?>
        	<tr class="trListaBody" onClick="<?=$ventana?>(['<?=$f['CodLinea']?>','<?=$f['Linea']?>','<?=$f['CodFamilia']?>','<?=$f['Familia']?>','<?=$f['CodSubFamilia']?>','<?=$f['Descripcion']?>'], ['<?=$campo1?>','<?=$campo2?>','<?=$campo3?>','<?=$campo4?>','<?=$campo5?>','<?=$campo6?>']);">
            <?php
		}
		?>
			<td align="center"><?=$f['CodSubFamilia']?></td>
			<td><?=htmlentities($f['Descripcion'])?></td>
			<td align="center"><?=$f['CodLinea']?></td>
			<td align="center"><?=$f['CodFamilia']?></td>
			<td align="center"><?=printValoresGeneral("ESTADO", $f['Estado'])?></td>
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