<?php
require('../lib/fpdf.php');
include("../lib/fphp.php");
include("lib/fphp.php");
//---------------------------------------------------
extract($_POST);
extract($_GET);
//---------------------------------------------------
list($NroProceso, $Secuencia, $CodTipoPago) = split("[_]", $registro);
//---------------------------------------------------
//	consulto
$sql = "SELECT
			p.CodOrganismo,
			p.CodProveedor,
			p.NroPago,
			p.CodTipoPago,
			p.MontoPago,
			p.NroOrden,
			p.NomProveedorPagar,
			p.ChequeCargo,
			p.NroCuenta,
			p.Periodo,
			p.VoucherPago,
			p.FechaPago,
			mp.NomCompleto AS NomProveedor,
			op.Concepto,
			op.CodCentroCosto,
			op.CodTipoDocumento,
			op.NroDocumento,
			o.CodCuenta AS CodCuentaPago,
			o.Comentarios,
			pc1.Descripcion AS NomCuentaPago,
			pc1.TipoSaldo AS TipoSaldoCuentaPago,
			cb.CodCuenta AS CodCuentaBanco,
			pc2.Descripcion AS NomCuentaBanco,
			pc2.TipoSaldo AS TipoSaldoCuentaBanco,
			td.CodVoucher,
			b.Banco,
			(SELECT PrefVoucherPA FROM mastaplicaciones WHERE CodAplicacion = 'AP') AS Voucher,
			(SELECT CodSistemaFuente FROM mastaplicaciones WHERE CodAplicacion = 'AP') AS CodSistemaFuente
		FROM
			ap_pagos p
			INNER JOIN ap_ordenpago op ON (p.CodOrganismo = op.CodOrganismo AND p.NroOrden = op.NroOrden AND p.Anio = op.Anio)
			INNER JOIN ap_tipodocumento td ON (op.CodTipoDocumento = td.CodTipoDocumento)
			INNER JOIN ap_ctabancaria cb ON (p.NroCuenta = cb.NroCuenta)
			INNER JOIN mastbancos b ON (cb.CodBanco = b.CodBanco)
			INNER JOIN ap_obligaciones o ON (op.CodProveedor = o.CodProveedor AND
											 op.CodTipoDocumento = o.CodTipoDocumento AND
											 op.NroDocumento = o.NroDocumento)
			INNER JOIN mastpersonas mp ON (p.CodProveedor = mp.CodPersona)
			LEFT JOIN ac_mastplancuenta pc1 ON (o.Codcuenta = pc1.CodCuenta)
			LEFT JOIN ac_mastplancuenta pc2 ON (cb.Codcuenta = pc2.CodCuenta)
		WHERE
			p.NroProceso = '".$NroProceso."' AND
			p.Secuencia = '".$Secuencia."'";
$query = mysql_query($sql) or die ($sql.mysql_error());
if (mysql_num_rows($query) != 0) $field = mysql_fetch_array($query);
$field['MontoPago'] = round($field['MontoPago'],2);
//---------------------------------------------------
list($anio, $mes) = split("[-]", $field['Periodo']);
list($cod, $nro) = split("[-]", $field['VoucherPago']);
$comprobante = "$anio$mes-$cod$nro";
//---------------------------------------------------

//---------------------------------------------------
class PDF extends FPDF {
	//	Cabecera de página.
	function Header() {}
	//	Pie de página.
	function Footer() {}
}
//---------------------------------------------------
//	Creación del objeto de la clase heredada.
$pdf = new PDF('P', 'mm', array(177, 80));
$pdf->AliasNbPages();
$pdf->SetMargins(10, 5, 10);
$pdf->SetAutoPageBreak(5, 1);
$pdf->AddPage();
//---------------------------------------------------
list($a, $m, $d) = split("[/.-]", $field['FechaPago']);
//	----------------
list($int, $dec) = split("[.]", $field['MontoPago']);
$int_letras = strtoupper(convertir_a_letras($int, "entero"));
$monto_letras = "$int_letras CON $dec/100";
//	----------------	
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 10);
//	----------------
$Ciudad = getVar3("SELECT Ciudad FROM mastciudades WHERE CodCiudad = '".$_PARAMETRO['CIUDADDEFAULT']."'");
$pdf->SetXY(135, 2); $pdf->Cell(35, 4, number_format($field['MontoPago'], 2, ',', '.').'*****', 0, 0, 'L');
$pdf->SetXY(22, 18); $pdf->Cell(160, 4, utf8_decode($field['NomProveedorPagar']), 0, 0, 'L');		
$pdf->SetXY(22, 24); $pdf->MultiCell(160, 4, utf8_decode($monto_letras).' **********', 0, 'L');		
$pdf->SetXY(10, 36); $pdf->Cell(160, 4, utf8_decode($Ciudad.', '.$d.' de '.getNombreMes("$a-$m").'                     '.$a), 0, 0, 'L');
//---------------------------------------------------
//	Muestro el contenido del pdf.
$pdf->Output();
?>