<?php
$Ahora = ahora();
list($Anio, $CodOrganismo, $NroOrden) = split("[_]", $registro);
//	consulto datos generales
$sql = "SELECT
			op.*,
			p1.NomCompleto AS NomProveedor,
			o.MontoObligacion,
			o.MontoAdelanto,
			o.MontoPagoParcial,
			o.FlagContabilizacionPendiente,
			o.Voucher AS VoucherProv,
			o.VoucherPeriodo AS PeriodoProv,
			o.FechaAprobado,
			p2.NomCompleto AS NomRevisadoPor,
			e2.CodEmpleado As CodRevisadoPor,
			p3.NomCompleto AS NomAprobadoPor,
			e3.CodEmpleado As CodAprobadoPor,
			p4.NomCompleto AS NomPreparadoPor,
			e4.CodEmpleado As CodPreparadoPor
		FROM
			ap_ordenpago op
			INNER JOIN ap_obligaciones o ON (op.CodProveedor = o.CodProveedor AND
											 op.CodTipoDocumento = o.CodTipoDocumento AND
											 op.NroDocumento = o.NroDocumento)
			INNER JOIN mastpersonas p1 ON (op.CodProveedor = p1.CodPersona)
			LEFT JOIN mastpersonas p2 ON (op.RevisadoPor = p2.CodPersona)
			LEFT JOIN mastempleado e2 ON (p2.CodPersona = e2.CodPersona)
			LEFT JOIN mastpersonas p3 ON (op.AprobadoPor = p3.CodPersona)
			LEFT JOIN mastempleado e3 ON (p3.CodPersona = e3.CodPersona)
			LEFT JOIN mastpersonas p4 ON (op.PreparadoPor = p4.CodPersona)
			LEFT JOIN mastempleado e4 ON (p4.CodPersona = e4.CodPersona)
		WHERE
			op.Anio = '".$Anio."' AND
			op.CodOrganismo = '".$CodOrganismo."' AND
			op.NroOrden = '".$NroOrden."'";
$field_orden = getRecord($sql);
##	
$sql = "SELECT (CASE WHEN COUNT(*) > 0 THEN 'S' ELSE 'N' END) AS FlagRetencion
		FROM ap_retenciones
		WHERE
			AnioOrden = '".$Anio."' AND
			CodOrganismo = '".$CodOrganismo."' AND
			NroOrden = '".$NroOrden."' AND
			(Estado = 'PA' OR Estado = 'EN')";
$FlagRetencion = getVar3($sql);
##	
if ($opcion == "modificar") {
	$titulo = "Modificar Orden de Pago";
	$accion = "modificar";
	$label_submit = "Modificar";
	$disabled_anulacion = "disabled";
}
elseif ($opcion == "ver") {
	$titulo = "Ver Orden de Pago";
	$disabled_ver = "disabled";
	$display_ver = "display:none;";
	$display_submit = "display:none;";
	$disabled_anulacion = "disabled";
}
elseif ($opcion == "anular") {
	$titulo = "Anular Orden de Pago";
	$accion = "anular";
	$label_submit = "Anular";
	$disabled_ver = "disabled";
	$display_ver = "display:none;";
}
//	------------------------------------
?>
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="titulo"><?=$titulo?></td>
		<td align="right"><a class="cerrar" href="#" onclick="document.getElementById('frmentrada').submit()">[cerrar]</a></td>
	</tr>
</table><hr width="100%" color="#333333" /><br />

<form name="frmentrada" id="frmentrada" action="gehen.php?anz=ap_orden_pago_lista" method="POST" onsubmit="return orden_pago(this, '<?=$accion?>');">
<input type="hidden" name="concepto" id="concepto" value="<?=$concepto?>" />
<input type="hidden" name="maxlimit" id="maxlimit" value="<?=$maxlimit?>" />
<input type="hidden" name="lista" id="lista" value="<?=$lista?>" />
<input type="hidden" name="fCodOrganismo" id="fCodOrganismo" value="<?=$fCodOrganismo?>" />
<input type="hidden" name="fCodProveedor" id="fCodProveedor" value="<?=$fCodProveedor?>" />
<input type="hidden" name="fNomProveedor" id="fNomProveedor" value="<?=$fNomProveedor?>" />
<input type="hidden" name="fCodTipoDocumento" id="fCodTipoDocumento" value="<?=$fCodTipoDocumento?>" />
<input type="hidden" name="fNroDocumento" id="fNroDocumento" value="<?=$fNroDocumento?>" />
<input type="hidden" name="fEstado" id="fEstado" value="<?=$fEstado?>" />
<input type="hidden" name="fFechaOrdenPagod" id="fFechaOrdenPagod" value="<?=$fFechaOrdenPagod?>" />
<input type="hidden" name="fFechaOrdenPagoh" id="fFechaOrdenPagoh" value="<?=$fFechaOrdenPagoh?>" />
<input type="hidden" name="FlagPagoDiferido" id="FlagPagoDiferido" value="<?=$FlagPagoDiferido?>" />
<input type="hidden" name="fCodSistemaFuente" id="fCodSistemaFuente" value="<?=$fCodSistemaFuente?>" />
<input type="hidden" name="fCodBanco" id="fCodBanco" value="<?=$fCodBanco?>" />
<input type="hidden" name="fNroCuenta" id="fNroCuenta" value="<?=$fNroCuenta?>" />
<input type="hidden" name="fMontoTotald" id="fMontoTotald" value="<?=$fMontoTotald?>" />
<input type="hidden" name="fMontoTotalh" id="fMontoTotalh" value="<?=$fMontoTotalh?>" />
<input type="hidden" name="fordenar" id="fordenar" value="<?=$fordenar?>" />
<input type="hidden" id="Anio" value="<?=$Anio?>" />
<input type="hidden" id="FlagContabilizacionPendiente" value="<?=$field_orden['FlagContabilizacionPendiente']?>" />
<input type="hidden" id="FlagContPendienteOrdPub20" value="<?=$field_orden['FlagContPendienteOrdPub20']?>" />
<input type="hidden" id="VoucherProv" value="<?=$field_orden['VoucherProv']?>" />
<input type="hidden" id="PeriodoProv" value="<?=$field_orden['PeriodoProv']?>" />
<input type="hidden" id="VoucherOrdPago" value="<?=$field_orden['Voucher']?>" />
<input type="hidden" id="PeriodoOrdPago" value="<?=$field_orden['VoucherPeriodo']?>" />
<input type="hidden" id="Periodo" value="<?=$field_orden['Periodo']?>" />
<input type="hidden" id="FlagRetencion" value="<?=$FlagRetencion?>" />

<table width="1100" class="tblForm">
	<tr>
    	<td colspan="4" class="divFormCaption">Informaci&oacute;n de la Obligaci&oacute;n</td>
    </tr>
    <tr>
		<td class="tagForm" width="125">Organismo:</td>
		<td>
        	<select id="CodOrganismo" style="width:300px; height:18px;" class="codigo" disabled>
            	<?=loadSelect("mastorganismos", "CodOrganismo", "Organismo", $field_orden['CodOrganismo'], 1)?>
            </select>
		</td>
		<td class="tagForm" width="125">Proveedor:</td>
		<td>
        	<input type="text" id="CodProveedor" value="<?=$field_orden['CodProveedor']?>" class="codigo" disabled="disabled" style="width:60px;" />
			<input type="text" id="NomProveedor" value="<?=($field_orden['NomProveedor'])?>" class="codigo" disabled="disabled" style="width:250px;" />
        </td>
	</tr>
    <tr>
		<td class="tagForm">Tipo de Documento:</td>
		<td>
        	<select id="CodTipoDocumento" style="width:300px; height:18px;" class="codigo" disabled>
                <?=loadSelect("ap_tipodocumento", "CodTipoDocumento", "Descripcion", $field_orden['CodTipoDocumento'], 1)?>
            </select>
        </td>
		<td class="tagForm">Nro. Documento:</td>
		<td><input type="text" id="NroDocumento" maxlength="20" style="width:150px;" value="<?=$field_orden['NroDocumento']?>" class="codigo" disabled /></td>
	</tr>
	<tr>
    	<td colspan="4" class="divFormCaption">Informaci&oacute;n de la Orden</td>
    </tr>
    <tr>
        <td class="tagForm"><strong>* F. Orden Pago:</strong></td>
        <td><input type="text" id="FechaOrdenPago" value="<?=formatFechaDMA($field_orden['FechaOrdenPago'])?>" style="width:60px;" class="datepicker codigo" onkeyup="setFechaDMA(this);" <?=$disabled_ver?> /></td>
		<td class="tagForm">Estado:</td>
		<td>
       	  	<input type="hidden" id="Estado" value="<?=$field_orden['Estado']?>" />
        	<input type="text" style="width:100px;" class="codigo" value="<?=printValores("ESTADO-ORDEN-PAGO", $field_orden['Estado'])?>" disabled="disabled" />
		</td>
    </tr>
    <tr>
        <td class="tagForm">* Tipo de Pago:</td>
        <td>
            <select id="CodTipoPago" style="width:150px;" <?=$disabled_ver?>>
                <?=loadSelect("masttipopago", "CodTipoPago", "TipoPago", $field_orden['CodTipoPago'], 0)?>
            </select>
        </td>
		<td class="tagForm">Nro. Orden:</td>
		<td>
        	<input type="text" id="NroOrden" style="width:100px;" class="codigo" value="<?=$field_orden['NroOrden']?>" disabled="disabled" />
		</td>
    </tr>
    <tr>
		<td class="tagForm">* Cuenta Bancaria:</td>
		<td>
        	<select id="NroCuenta" style="width:150px;" <?=$disabled_ver?>>
                <?=loadSelect("ap_ctabancaria", "NroCuenta", "NroCuenta", $field_orden['NroCuenta'], 0)?>
            </select>
        </td>
		<td class="tagForm"><strong>Total Obligaci&oacute;n:</strong></td>
		<td>
        	<input type="text" id="MontoObligacion" value="<?=number_format($field_orden['MontoObligacion'], 2, ',', '.')?>" style="width:150px; text-align:right;" class="codigo" disabled="disabled" />
        </td>
    </tr>
    <tr>
        <td class="tagForm">* Preparado Por:</td>
        <td class="gallery clearfix">
			<input type="hidden" id="PreparadoPor" value="<?=$field_orden['PreparadoPor']?>" />
			<input type="text" id="NomPreparadoPor" value="<?=$field_orden['NomPreparadoPor']?>" style="width:195px;" disabled="disabled" />
			<input type="text" id="FechaPreparado" value="<?=formatFechaDMA($field_orden['FechaPreparado'])?>" class="datepicker" style="width:60px;" <?=$disabled_ver?> />
			<a href="../lib/listas/listado_empleados.php?filtrar=default&cod=PreparadoPor&nom=NomPreparadoPor&iframe=true&width=950&height=425" rel="prettyPhoto[iframe3]" style=" <?=$display_ver?>">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer;" />
            </a>
		</td>
		<td class="tagForm">Adelantos (-):</td>
		<td>
        	<input type="text" id="MontoAdelanto" value="<?=number_format($field_orden['MontoAdelanto'], 2, ',', '.')?>" style="width:150px; text-align:right;" class="disabled" disabled="disabled" />
        </td>
	</tr>
    <tr>
        <td class="tagForm">* Revisado Por:</td>
        <td class="gallery clearfix">
			<input type="hidden" id="RevisadoPor" value="<?=$field_orden['RevisadoPor']?>" />
			<input type="text" id="NomRevisadoPor" value="<?=$field_orden['NomRevisadoPor']?>" style="width:195px;" disabled="disabled" />
			<input type="text" id="FechaRevisado" value="<?=formatFechaDMA($field_orden['FechaRevisado'])?>" class="datepicker" style="width:60px;" <?=$disabled_ver?> />
			<a href="../lib/listas/listado_empleados.php?filtrar=default&cod=RevisadoPor&nom=NomRevisadoPor&iframe=true&width=950&height=425" rel="prettyPhoto[iframe1]" style=" <?=$display_ver?>">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer;" />
            </a>
		</td>
		<td class="tagForm">Pagos Parciales (-):</td>
		<td><input type="text" id="MontoPagoParcial" value="<?=number_format($field_orden['MontoPagoParcial'], 2, ',', '.')?>" style="width:150px; text-align:right;" class="disabled" disabled="disabled" /></td>
	</tr>
    <tr>
        <td class="tagForm">* Aprobado Por:</td>
        <td class="gallery clearfix">
			<input type="hidden" id="AprobadoPor" value="<?=$field_orden['AprobadoPor']?>" />
			<input type="text" id="NomAprobadoPor" value="<?=$field_orden['NomAprobadoPor']?>" style="width:195px;" disabled="disabled" />
			<input type="text" id="FechaAprobado" value="<?=formatFechaDMA($field_orden['FechaAprobado'])?>" class="datepicker" style="width:60px;" <?=$disabled_ver?> />
			<a href="../lib/listas/listado_empleados.php?filtrar=default&cod=AprobadoPor&nom=NomAprobadoPor&iframe=true&width=950&height=425" rel="prettyPhoto[iframe2]" style=" <?=$display_ver?>">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer;" />
            </a>
		</td>
		<td class="tagForm"><strong>Saldo Pendiente:</strong></td>
		<td>
        	<?php
			$MontoPendiente = $field_orden['MontoObligacion'] - $field_orden['MontoAdelanto'] - $field_orden['MontoPagoParcial'];
			?>
        	<input type="text" id="MontoPendiente" value="<?=number_format($MontoPendiente, 2, ',', '.')?>" style="width:150px; text-align:right; font-size:12px; font-weight:bold;" class="disabled" disabled="disabled" />
        </td>
	</tr>
	<tr>
		<td class="tagForm">* Concepto:</td>
		<td colspan="3"><textarea id="Concepto" style="width:95%; height:45px;" <?=$disabled_ver?>><?=($field_orden['Concepto'])?></textarea></td>
	</tr>
	<tr>
		<td class="tagForm">Raz&oacute;n Anulaci&oacute;n:</td>
		<td colspan="3"><input type="text" id="MotivoAnulacion" value="<?=($field_orden['MotivoAnulacion'])?>" style="width:95%;" <?=$disabled_anulacion?> /></td>
	</tr>
</table>
<center> 
<input type="submit" value="<?=$label_submit?>" style="width:75px; <?=$display_submit?>" />
<input type="button" value="Cancelar" style="width:75px;" onclick="this.form.submit();" />
</center>
</form>
<div style="width:1100px" class="divMsj">Campos Obligatorios *</div>