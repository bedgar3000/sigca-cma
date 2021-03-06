<?php
//	------------------------------------
if ($filtrar == "default") {
	$fEstado = 'A';
	$maxlimit = $_SESSION["MAXLIMIT"];
	$fOrderBy = "CodChofer";
}
if ($fBuscar != "") {
	$cBuscar = "checked";
	$filtro .= " AND (ch.CodChofer LIKE '%$fBuscar%'
					  OR ch.CodPersona LIKE '%$fBuscar%'
					  OR p.NomCompleto LIKE '%$fBuscar%'
					  OR p.Ndocumento LIKE '%$fBuscar%'
					  OR p.NLicencia LIKE '%$fBuscar%'
					  OR md.Descripcion LIKE '%$fBuscar%')";
} else $dBuscar = "disabled";
if ($fEstado != "") { $cEstado = "checked"; $filtro.=" AND (ch.Estado = '$fEstado')"; } else $dEstado = "disabled";
//	------------------------------------
$_titulo = "Choferes";
$_width = 700;
?>
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="titulo"><?=$_titulo?></td>
		<td align="right"><a class="cerrar" href="../framemain.php">[cerrar]</a></td>
	</tr>
</table><hr width="100%" color="#333333" />

<form name="frmentrada" id="frmentrada" action="gehen.php?anz=lg_choferes_lista" method="post" autocomplete="off">
	<input type="hidden" name="_APLICACION" id="_APLICACION" value="<?=$_APLICACION?>" />
	<input type="hidden" name="concepto" id="concepto" value="<?=$concepto?>" />
	<input type="hidden" name="lista" id="lista" value="<?=$lista?>" />
	<input type="hidden" name="fOrderBy" id="fOrderBy" value="<?=$fOrderBy?>" />

	<!--FILTRO-->
	<div class="divBorder" style="width:100%; min-width:<?=$_width?>px;">
		<table class="tblFiltro" style="width:100%; min-width:<?=$_width?>px;">
			<tr>
				<td align="right" width="100">Buscar:</td>
				<td>
					<input type="checkbox" <?=$cBuscar?> onclick="chkCampos(this.checked, 'fBuscar');" />
					<input type="text" name="fBuscar" id="fBuscar" value="<?=$fBuscar?>" style="width:169px;" <?=$dBuscar?> />
				</td>
				<td align="right">Estado: </td>
				<td>
		            <input type="checkbox" <?=$cEstado?> onclick="chkFiltro(this.checked, 'fEstado');" />
		            <select name="fEstado" id="fEstado" style="width:100px;" <?=$dEstado?>>
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
	<table class="tblBotones" style="width:100%; min-width:<?=$_width?>px;">
	    <tr>
	        <td><div id="rows"></div></td>
	        <td align="right">
	            <input type="button" value="Nuevo" style="width:75px;" class="insert" onclick="cargarPagina(this.form, 'gehen.php?anz=lg_choferes_form&opcion=nuevo');" />
	            <input type="button" value="Modificar" style="width:75px;" class="update" onclick="cargarOpcion2(this.form, 'gehen.php?anz=lg_choferes_form&opcion=modificar', 'SELF', '', $('#sel_registros').val());" />
	            <input type="button" value="Eliminar" style="width:75px;" class="delete" onclick="opcionRegistro3(this.form, $('#sel_registros').val(), 'formulario', 'eliminar', 'lg_choferes_ajax.php');" />
	            <input type="button" value="Ver" style="width:75px;" class="ver" onclick="cargarOpcion2(this.form, 'gehen.php?anz=lg_choferes_form&opcion=ver', 'SELF', '', $('#sel_registros').val());" />
	        </td>
	    </tr>
	</table>

	<div class="scroll" style="overflow:scroll; width:100%; min-width:<?=$_width?>px; height:265px;">
		<table class="tblLista" style="width:100%; min-width:<?=$_width?>px;">
			<thead>
			    <tr>
			        <th width="60" onclick="order('CodChofer')">C&oacute;digo</th>
			        <th style="min-width: 200px;" align="left" onclick="order('NomCompleto')">Nombre Completo</th>
			        <th width="75" onclick="order('Ndocumento')">Documento</th>
			        <th width="60" onclick="order('CodPersona')">Persona</th>
			        <th width="125" onclick="order('NomTipoLicencia')">Tipo Licencia</th>
			        <th width="125" onclick="order('Nlicencia')">Nro. Licencia</th>
			        <th width="75" onclick="order('Estado')">Estado</th>
			    </tr>
		    </thead>
		    
		    <tbody id="lista_registros">
			<?php
			//	consulto todos
			$sql = "SELECT *
					FROM lg_choferes ch
					INNER JOIN mastpersonas p ON p.CodPersona = ch.CodPersona
					LEFT JOIN mastmiscelaneosdet md ON (
						md.CodDetalle = p.TipoLicencia
						AND md.CodMaestro = 'TIPOLIC'
					)
					WHERE 1 $filtro";
			$rows_total = getNumRows3($sql);
			//	consulto lista
			$sql = "SELECT
						ch.*,
						p.NomCompleto,
						p.Ndocumento,
						p.TipoLicencia,
						p.Nlicencia,
						md.Descripcion AS NomTipoLicencia
					FROM lg_choferes ch
					INNER JOIN mastpersonas p ON p.CodPersona = ch.CodPersona
					LEFT JOIN mastmiscelaneosdet md ON (
						md.CodDetalle = p.TipoLicencia
						AND md.CodMaestro = 'TIPOLIC'
					)
					WHERE 1 $filtro
					ORDER BY $fOrderBy
					LIMIT ".intval($limit).", ".intval($maxlimit);
			$field = getRecords($sql);
			$rows_lista = count($field);
			foreach($field as $f) {
				$id = $f['CodChofer'];
				?>
				<tr class="trListaBody" onclick="clk($(this), 'registros', '<?=$id?>');">
					<td align="center"><?=$f['CodChofer']?></td>
					<td><?=htmlentities($f['NomCompleto'])?></td>
					<td align="right"><?=number_format($f['Ndocumento'],0,'','.')?></td>
					<td align="center"><?=$f['CodPersona']?></td>
					<td align="center"><?=htmlentities($f['NomTipoLicencia'])?></td>
					<td align="center"><?=$f['Nlicencia']?></td>
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
</form>