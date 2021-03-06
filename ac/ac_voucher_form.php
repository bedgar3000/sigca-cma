<?php
session_start();
if (!isset($_SESSION['USUARIO_ACTUAL']) || !isset($_SESSION['ORGANISMO_ACTUAL'])) header("Location: ../index.php");
//	------------------------------------
extract($_POST);
extract($_GET);
//	------------------------------------
include("../lib/fphp.php");
include("../lib/ac_fphp.php");
//	------------------------------------
$label_submit = "";
$display_submit = "";
$display_aprobar = "display:none;";
$cancelar = "document.getElementById('frmentrada').submit();";
$disabled_editar = "";
$disabled_ver = "";
$accion = "";
if ($opcion == "nuevo") {
	$titulo = "Nuevo Voucher";
	$label_submit = "Guardar";
	$accion = "nuevo";
	
	//	valores
	$periodo = date("Y-m");
	$codingresado = $_SESSION['CODPERSONA_ACTUAL'];
	$nomingresado = $_SESSION['NOMBRE_USUARIO_ACTUAL'];
	$fecha = date("d-m-Y");
	$estado = "AB";
}
elseif ($opcion == "modificar" || $opcion == "ver" || $opcion == "anular" || $opcion == "aprobar") {
	$disabled_editar = "disabled";
	
	if ($opcion == "modificar") {
		$titulo = "Modificar Voucher";
		$label_submit = "Modificar";
		$accion = "modificar";
	}
	
	elseif ($opcion == "ver") {
		$titulo = "Ver Voucher";
		$display_submit = "display:none;";
		$cancelar = "window.close();";
		$disabled_ver = "disabled";
	}
	
	elseif ($opcion == "anular") {
		$titulo = "Anular Voucher";
		$label_submit = "Anular";
		$accion = "anular";
		$disabled_ver = "disabled";
	}
	
	elseif ($opcion == "aprobar") {
		$titulo = "Aprobar/Rechazar Voucher";
		$display_submit = "display:none;";
		$disabled_ver = "disabled";
		$display_aprobar = "";
	}
	
	list($organismo, $periodo, $voucher, $codcontabilidad) = split("[ ]", $registro);
	//	consulto voucher	
	$sql = "SELECT
				vm.*,
				p1.NomCompleto AS NomPreparadoPor
			FROM
				ac_vouchermast vm
				INNER JOIN mastpersonas p1 ON (vm.PreparadoPor = p1.CodPersona)
			WHERE
				vm.CodOrganismo = '".$organismo."' AND
				vm.Periodo = '".$periodo."' AND
				vm.Voucher = '".$voucher."'"; 
	$query_mast = mysql_query($sql) or die($sql.mysql_error());
	if (mysql_num_rows($query_mast)) $field_mast = mysql_fetch_array($query_mast);
	
	//	consulto voucher
	$sql = "SELECT *
			FROM ac_voucherdet
			WHERE
				CodOrganismo = '".$organismo."' AND
				Periodo = '".$periodo."' AND
				Voucher = '".$voucher."' AND 
				CodContabilidad = '".$codcontabilidad."'
			ORDER BY Linea"; //echo $sql;
	$query_det = mysql_query($sql) or die($sql.mysql_error());
	
	//	valores
	$codingresado = $field_mast['PreparadoPor'];
	$nomingresado = $field_mast['NomPreparadoPor'];
	$fecha = formatFechaDMA($field_mast['FechaVoucher']);
	$estado = $field_mast['Estado'];
}
//	------------------------------------
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="../js/funciones.js"></script>
<script type="text/javascript" language="javascript" src="../js/ac_funciones.js"></script>
<script type="text/javascript" language="javascript" src="../js/ac_fscript.js"></script>
</head>

<body onload="document.getElementById('descripcion').focus();">
<div id="bloqueo" class="divBloqueo"></div>
<div id="cargando" class="divCargando">
<table>
	<tr>
    	<td valign="middle" style="height:50px;">
			<img src="../imagenes/iconos/cargando.gif" /><br />Procesando...
        </td>
    </tr>
</table>
</div>

<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="titulo"><?=$titulo?></td>
		<td align="right"><a class="cerrar" href="#" onclick="<?=$cancelar?>">[cerrar]</a></td>
	</tr>
</table><hr width="100%" color="#333333" /><br />

<form name="frmentrada" id="frmentrada" action="<?=$return?>.php" method="POST" onsubmit="return voucher(this, '<?=$accion?>');">
<input type="hidden" name="forganismo" value="<?=$forganismo?>" />
<input type="hidden" name="fvoucherd" value="<?=$fvoucherd?>" />
<input type="hidden" name="fvoucherh" value="<?=$fvoucherh?>" />
<input type="hidden" name="fdependencia" value="<?=$fdependencia?>" />
<input type="hidden" name="festado" value="<?=$festado?>" />
<input type="hidden" name="fperiodo" value="<?=$fperiodo?>" />
<input type="hidden" name="estado" id="estado" value="<?=$estado?>" />
<table width="960" class="tblForm">
    <tr>
        <td width="125" class="tagForm">Periodo:</td>
        <td><input type="text" id="periodo" maxlength="7" value="<?=$periodo?>" style="width:65px; font-weight:bold;" <?=$disabled_editar?> />*</td>
        <td width="125" class="tagForm">Voucher:</td>
        <td>
            <select id="codvoucher" style="font-weight:bold;" <?=$disabled_editar?>>
                <?=loadSelect("ac_voucher", "CodVoucher", "CodVoucher", $field_mast['CodVoucher'], 0);?>
            </select>
            <input type="text" id="nrovoucher" style="width:50px; font-weight:bold;" value="<?=$field_mast['NroVoucher']?>" disabled="disabled" />
        </td>
    </tr>
    <tr>
        <td class="tagForm">Organismo:</td>
        <td>
            <select id="organismo" style="width:300px;" onchange="getOptions(this.value, 'dependencia', '300');" <?=$disabled_editar?>>
                <?=loadSelect("mastorganismos", "CodOrganismo", "Organismo", $organismo, 0)?>
            </select>*
        </td>
        <td class="tagForm">Preparado Por:</td>
        <td>
            <input type="hidden" id="codingresado" value="<?=$codingresado?>" />
            <input type="text" style="width:297px;" value="<?=htmlentities($nomingresado)?>" disabled="disabled" />
        </td>
    </tr>
    <tr>
        <td class="tagForm">Dependencia:</td>
        <td>
            <select id="dependencia" style="width:300px;" <?=$disabled_ver?>>
            	<option value=""></option>
                <?=loadSelect("mastdependencias", "CodDependencia", "Dependencia", $field_mast['CodDependencia'], 0)?>
            </select>
        </td>
        <td class="tagForm">Aprobado Por:</td>
        <td>
            <input type="hidden" id="codaprobado" value="<?=$field_mast['AprobadoPor']?>" />
            <input type="text" style="width:297px;" value="<?=htmlentities($field_mast['NomAprobadoPor'])?>" disabled="disabled" />
        </td>
    </tr>
    
    <tr>
        <td class="tagForm">Contabilidad:</td>
        <td>
            <select id="contabilidad" style="width:150px;" <?=$disabled_ver?> onchange="activarSelector(frm_detalle,this.value)">
               <? if($opcion == "nuevo"){
				    loadSelect("ac_contabilidades", "CodContabilidad", "Descripcion", 'F', 0);
				  }else{
					loadSelect("ac_contabilidades", "CodContabilidad", "Descripcion", $field_mast['CodContabilidad'], 0);  
				  }?>
                <? //loadSelect("ac_contabilidades", "CodContabilidad", "Descripcion", $field_mast['CodContabilidad'], 0)?>
            </select>*
        </td>
        <td class="tagForm">Descripci&oacute;n:</td>
        <td><input type="text" id="descripcion" style="width:297px;" value="<?=htmlentities($field_mast['ComentariosVoucher'])?>" <?=$disabled_ver?> /></td>
    </tr>
    
    <tr>
        <td class="tagForm">Libro Contable:</td>
        <td>
            <select id="libro_contable" style="width:150px;" <?=$disabled_ver?>>
                <?=loadSelect("ac_librocontable", "CodLibroCont", "Descripcion", $field_mast['CodLibroCont'], 0)?>
            </select>*
        </td>
         <td class="tagForm">Nro. Interno:</td>
        <td><input type="text" id="nrointerno" maxlength="10" style="width:95px;" value="<?=$field_mast['NroInterno']?>" disabled="disabled" /></td>
    </tr>
    <tr>
        <td class="tagForm">Fecha:</td>
        <td><input type="text" id="fecha" maxlength="10" value="<?=$fecha?>" style="width:65px; text-align:center" <?=$disabled_ver;?> onchange="cambioPeriodo(this.id);"/></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    	<td class="tagForm">&Uacute;ltima Modif.:</td>
        <td colspan="3">
            <input type="text" size="30" value="<?=$field_mast['UltimoUsuario']?>" disabled="disabled" />
            <input type="text" size="25" value="<?=$field_mast['UltimaFecha']?>" disabled="disabled" />
        </td>
    </tr>
</table>
<center>
<input type="submit" value="<?=$label_submit?>" style="width:80px; <?=$display_submit?>">
<input type="button" value="Aprobar" style="width:80px; <?=$display_aprobar?>" onclick="voucher(this.form, 'aprobar');" />
<input type="button" value="Rechazar" style="width:80px; <?=$display_aprobar?>" onclick="voucher(this.form, 'rechazar');" />
<input type="button" value="Cancelar" style="width:80px;" onclick="<?=$cancelar?>" />
</center>
</form>
<br />

<form name="frm_detalle" id="frm_detalle">
<input type="hidden" name="sel_detalle" id="sel_detalle" />
<table width="960" class="tblBotones">
<tr>
  <td> 
  <input type="button" class="btLista" name="btPub20" id="btPub20" value="Sel. Pub 20" onclick="abrirListado('detalle','codcuenta', 'nomcuenta', 'af_listadoclasificacion20', 'height=800, width=750, left=50, top=50', 'limit=0');" <?=$disabled_ver?>/>
			<input type="button" class="btLista" id="btCuenta" value="Sel. Cuenta" onclick="abrirListado('detalle', 'codcuenta', 'nomcuenta', 'listado_cuentas_contables', 'height=800, width=850, left=50, top=50', 'limit=0');"  disabled  />
			<input type="button" class="btLista" id="btPersona" value="Sel. Persona" onclick="abrirListado('detalle', 'codpersona', 'nompersona', 'listado_personas', 'height=800, width=750, left=50, top=50', 'EsProveedor=S&EsEmpleado=S&EsOtros=S');" <?=$disabled_ver?> />
			<input type="button" class="btLista" id="btCCosto" value="Sel. C.Costo" onclick="abrirListado('detalle', 'codccosto', 'nomccosto', 'listado_centro_costos', 'height=800, width=850, left=50, top=50');" <?=$disabled_ver?> />
            
        </td>
		<td align="right">
			<input type="button" class="btLista" id="btAgregar" value="Agregar" onclick="insertarLinea(this, 'voucher_insertar_linea', 'detalle', 'ac');" <?=$disabled_ver?> />
			<input type="button" class="btLista" id="btBorrar" value="Borrar" onclick="quitarLinea(this, 'detalle');" <?=$disabled_ver?> />
		</td>
	</tr>
</table>

<table align="center"><tr><td align="center"><div style="overflow:scroll; width:960px; height:400px;">
<table width="100%" class="tblLista">
 <thead>
	<tr class="trListaHead">
        <th scope="col" width="30">#</th>
        <th scope="col" width="75">Cuenta</th>
        <th scope="col" width="75">Persona</th>
        <th scope="col" width="125">Documento</th>
        <th scope="col" width="75">Fecha</th>
        <th scope="col" width="100">Monto</th>
        <th scope="col" width="75">C.Costo</th>
        <th scope="col">Descripci&oacute;n</th>
    </tr>
    </thead>
    
    <tbody id="lista_detalle">
    <?
	$nrodetalle = 0;
	$total_creditos = 0;
	$total_debitos = 0;
	if ($opcion != "nuevo") {
		while ($field_det = mysql_fetch_array($query_det)) {
			$nrodetalle++;
			if ($field_det['MontoVoucher'] < 0) { $total_creditos += $field_det['MontoVoucher']; $style_negativo = "color:#900"; }
			else { $total_debitos += $field_det['MontoVoucher']; $style_negativo = ""; }
			?>
			<tr class="trListaBody" onclick="mClk(this, 'sel_detalle');" id="detalle_<?=$nrodetalle?>">
				<td align="center"><?=$nrodetalle?></td>
				<td align="center">
					<input type="text" name="codcuenta" id="codcuenta_<?=$nrodetalle?>" value="<?=$field_det['CodCuenta']?>" class="cell2" style="text-align:center;" readonly />
					<input type="hidden" name="nomcuenta" id="nomcuenta_<?=$nrodetalle?>" />
				</td>
				<td align="center">
					<input type="text" name="codpersona" id="codpersona_<?=$nrodetalle?>" value="<?=$field_det['CodPersona']?>" class="cell2" style="text-align:center;" readonly />
					<input type="hidden" name="nompersona" id="nompersona_<?=$nrodetalle?>" value="<?=htmlentities($field_det['NomPersona'])?>" />
				</td>
				<td align="center">
					<input type="text" name="documento" value="<?=$field_det['ReferenciaNroDocumento']?>" class="cell" onBlur="this.className='cell';" onFocus="this.className='cellFocus';" <?=$disabled_ver?> />
				</td>
				<td align="center">
					<input type="text" name="fecha" value="<?=formatFechaDMA($field_det['FechaVoucher'])?>" style="text-align:center;" class="cell" onBlur="this.className='cell';" onFocus="this.className='cellFocus';" <?=$disabled_ver?> />
				</td>
				<td align="center">
					<input type="text" name="monto" value="<?=number_format($field_det['MontoVoucher'], 2, ',', '.')?>" class="cell" style="text-align:right; font-weight:bold; <?=$style_negativo?>" onBlur="numeroBlur(this); this.className='cell'; setNegativo(this); sumar_voucher();" onFocus="numeroFocus(this); this.className='cellFocus';" <?=$disabled_ver?> />
				</td>
				<td align="center">
					<input type="text" name="codccosto" id="codccosto_<?=$nrodetalle?>" value="<?=$field_det['CodCentroCosto']?>" class="cell2" style="text-align:center;" readonly />
					<input type="hidden" name="nomccosto" id="nomccosto_<?=$nrodetalle?>" />
				</td>
				<td align="center">
					<input type="text" name="descripcion" value="<?=htmlentities($field_det['Descripcion'])?>" class="cell" onBlur="this.className='cell';" onFocus="this.className='cellFocus';" <?=$disabled_ver?> />
				</td>
			</tr>
			<?
		}
	}
	?>
    </tbody>
    
    <tfoot>
    	<tr><td colspan="8">&nbsp;</td></tr>
    	<tr>
        	<td colspan="5"></td>
            <td align="right"><span id="total_debitos" style="font-weight:bold; font-size:11px;"><?=number_format($total_debitos, 2, ',', '.')?></span></td>
        	<td colspan="2"></td>
        </tr>
    	<tr>
        	<td colspan="5"></td>
            <td align="right"><span id="total_creditos" style="font-weight:bold; font-size:11px; color:#900;"><?=number_format($total_creditos, 2, ',', '.')?></span></td>
        	<td colspan="2"></td>
        </tr>
    </tfoot>
</table>
</div></td></tr></table>
<input type="hidden" name="nro_linea" id="nro_detalle" value="<?=$nrodetalle?>" />
<input type="hidden" name="can_linea" id="can_detalle" value="<?=$nrodetalle?>" />
</form>
</body>
</html>