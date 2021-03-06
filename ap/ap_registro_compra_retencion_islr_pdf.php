<?php
require('../lib/fpdf.php');
include("../lib/fphp.php");
include("lib/fphp.php");
//---------------------------------------------------
if ($fCodOrganismo != "") $filtro .=" AND (r.CodOrganismo = '".$fCodOrganismo."')";
if ($fPeriodod != "" || $fPeriodoh != "") {
	if ($fPeriodod != "") $filtro .=" AND (r.PeriodoFiscal >= '".$fPeriodod."')";
	if ($fPeriodoh != "") $filtro .=" AND (r.PeriodoFiscal <= '".$fPeriodoh."')";
}
if ($fCodProveedor != "") $filtro .=" AND (r.CodProveedor = '".$fCodProveedor."')";
if ($fEstado != "") {
	if ($fEstado == "PA/EN") $filtro .=" AND (r.Estado = 'PA' OR r.Estado = 'EN')";
	else $filtro .=" AND (r.Estado = '".$fEstado."')";
}
if ($fCodBanco != "") $filtro .=" AND (cb.CodBanco = '".$fCodBanco."')";
if ($fNroCuenta != "") $filtro .=" AND (ob.NroCuenta = '".$fNroCuenta."')";
//---------------------------------------------------

class PDF extends FPDF {
	//	Cabecera de página.
	function Header() {
		global $_PARAMETRO;
		global $Ahora;
		global $_POST;
		global $field;
		extract($_POST);
		##	membrete (logo)
		$Logo = getValorCampo("mastorganismos", "CodOrganismo", "Logo", $fCodOrganismo);
		$NomOrganismo = getValorCampo("mastorganismos", "CodOrganismo", "Organismo", $fCodOrganismo);
		$NomDependencia = getValorCampo("mastdependencias", "CodDependencia", "Dependencia", $_PARAMETRO["DEPLOGCXP"]);
		##	membrete (titulo)
		$this->SetFillColor(255, 255, 255);
		$this->SetDrawColor(0, 0, 0);
		$this->Image($_PARAMETRO["PATHLOGO"].$Logo, 10, 5, 13, 10);		
		$this->SetFont('Arial', '', 8);
		$this->SetXY(25, 5); $this->Cell(100, 5, $NomOrganismo, 0, 1, 'L');
		$this->SetXY(25, 10); $this->Cell(100, 5, $NomDependencia, 0, 0, 'L');	
		##	fecha, pagina
		$this->SetFont('Arial', '', 8);
		$this->SetXY(300, 5); $this->Cell(15, 5, utf8_decode('Fecha: '), 0, 0, 'L');
		$this->Cell(30, 5, formatFechaDMA(substr($Ahora, 0, 10)), 0, 1, 'L');
		$this->SetXY(300, 10); $this->Cell(15, 5, utf8_decode('Página: '), 0, 0, 'L'); 
		$this->Cell(30, 5, $this->PageNo().' de {nb}', 0, 1, 'L');
		##	titulo
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(345, 5, utf8_decode('RELACION DETALLADA DEL I.S.L.R RETENIDO'), 0, 0, 'C');
		##
		$this->SetTextColor(0, 0, 0);
		$this->SetDrawColor(0, 0, 0);
		$this->SetFillColor(255, 255, 255);
		##
		$this->Ln(10);
		if ($fCodBanco) {
			$Banco = getVar3("SELECT Banco FROM mastbancos WHERE CodBanco = '$fCodBanco'");
			$this->SetFont('Arial', 'B', 8);
			$this->Cell(268, 5, utf8_decode($Banco), 0, 1, 'L');
		}
		if ($fCodBanco) {
			$this->SetFont('Arial', 'B', 8);
			$this->Cell(268, 5, utf8_decode('Nro. Cta. '.$fNroCuenta), 0, 1, 'L');
		}
		$this->Ln(2);
		##	imprimir titulos
		$this->SetFillColor(255, 255, 255);
		$this->SetDrawColor(0, 0, 0);
		$this->SetFont('Arial', 'B', 6);
		$this->SetWidths(array(20, 78, 20, 20, 12, 16, 35, 35, 16, 16, 16, 16, 16, 13, 16));
		$this->SetAligns(array('C', 'L', 'C', 'C', 'C', 'C', 'L', 'L', 'C', 'R', 'R', 'R', 'R', 'R', 'R'));
		$this->Row(array('Comprobante',
						 utf8_decode('Nombre o Razón Social'),
						 'Doc. Fiscal',
						 'Orden de Pago',
						 'Periodo Fiscal',
						 'Fecha Comprobante',
						 'Nro. Control',
						 'Nro. Factura',
						 'Fecha Factura',
						 'Monto Imponible',
						 'Monto Exento',
						 'Monto Impuesto',
						 'Monto Factura',
						 'Porcentaje',
						 'Monto Retenido'));
		$this->Ln(1);	
	}
	
	//	Pie de página.
	function Footer() {
	}
}
//---------------------------------------------------

//---------------------------------------------------
//	Creación del objeto de la clase heredada.
$pdf = new PDF('L', 'mm', 'Legal');
$pdf->AliasNbPages();
$pdf->SetMargins(5, 5, 5);
$pdf->SetAutoPageBreak(5, 5);
$pdf->AddPage();
//---------------------------------------------------
$i = 0;
//	consulto
$sql = "SELECT
			CONCAT(SUBSTRING(PeriodoFiscal, 1, 4), SUBSTRING(PeriodoFiscal, 6, 2), NroComprobante) AS NroComprobante,
			p.NomCompleto AS NomProveedor,
			p.DocFiscal,
			r.NroOrden,
			r.AnioOrden,
			r.PeriodoFiscal,
			r.FechaComprobante,
			r.NroDocumento,
			r.NroControl,
			r.NroFactura,
			r.FechaFactura,
			r.MontoAfecto,
			r.MontoNoAfecto,
			r.MontoImpuesto,
			r.MontoFactura,
			i.FactorPorcentaje,
			ABS(r.MontoRetenido) AS MontoRetenido
		FROM
			ap_retenciones r
			INNER JOIN mastorganismos o ON (o.CodOrganismo = r.CodOrganismo)
			INNER JOIN mastpersonas p ON (p.CodPersona = r.CodProveedor)
			INNER JOIN mastimpuestos i ON (i.CodImpuesto = r.CodImpuesto)
			LEFT JOIN ap_obligaciones ob ON (ob.CodProveedor = r.CodProveedor AND
											 ob.CodTipoDocumento = r.CodTipoDocumento AND
											 ob.NroDocumento = r.NroDocumento)
			LEFT JOIN ap_ctabancaria cb ON (cb.NroCuenta = ob.NroCuenta)
		WHERE
			r.TipoComprobante = 'ISLR'
			$filtro
		ORDER BY FechaComprobante, NroComprobante";
$query = mysql_query($sql) or die(getErrorSql(mysql_errno(), mysql_error(), $sql));
while ($field = mysql_fetch_array($query)) {
	$MontoRetenido += $field['MontoRetenido'];
	##	imprimo linea
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetDrawColor(255, 255, 255);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetFont('Arial', '', 6);
	$pdf->Row(array($field['NroComprobante'],
					$field['NomProveedor'],
					$field['DocFiscal'],
					$field['PeriodoFiscal'],
					$field['PeriodoFiscal'],
					formatFechaDMA($field['FechaComprobante']),
					$field['NroControl'],
					$field['NroFactura'],
					formatFechaDMA($field['FechaFactura']),
					number_format($field['MontoAfecto'], 2, ',', '.'),
					number_format($field['MontoNoAfecto'], 2, ',', '.'),
					number_format($field['MontoImpuesto'], 2, ',', '.'),
					number_format($field['MontoFactura'], 2, ',', '.'),
					number_format($field['FactorPorcentaje'], 2, ',', '.'),
					number_format($field['MontoRetenido'], 2, ',', '.')));
}
$pdf->SetFont('Arial', 'B', 6);
$pdf->Row(array('',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'TOTAL:',
				'',
				number_format($MontoRetenido, 2, ',', '.')));
//---------------------------------------------------

//---------------------------------------------------
//	Muestro el contenido del pdf.
$pdf->Output();
?>  
