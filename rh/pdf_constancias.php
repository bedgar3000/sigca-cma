<?php
define('FPDF_FONTPATH','font/');
require('mc_table2.php');
require('fphp.php');
connect();
$dia_actual=date("d");
$mes_actual=date("m"); 
$anio_actual=date("Y");
//---------------------------------------------------
$sql = "SELECT ValorParam FROM mastparametros WHERE ParametroClave = 'INICONSTANCIA'";
$query_param = mysql_query($sql) or die ($sql.mysql_error());
if (mysql_num_rows($query_param) != 0) $field_param = mysql_fetch_array($query_param);
//---------------------------------------------------

//---------------------------------------------------
//	Imprime la cabedera del documento
function Cabecera($pdf) {
	$pdf->AddPage();
	$pdf->Image('../imagenes/logos/contraloria.jpg', 40, 11, 20, 18);
	$pdf->Image('../imagenes/logos/LOGOSNCF.jpg', 175, 240, 20, 18);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->SetTextColor(50, 50, 50);
	$pdf->SetXY(20, 12); $pdf->Cell(180, 5, utf8_decode('República Bolivariana de Venezuela'), 0, 1, 'C');
	$pdf->SetXY(20, 17); $pdf->Cell(180, 5, utf8_decode('Alcaldía de Angostura'), 0, 1, 'C');
	$pdf->SetXY(20, 22); $pdf->Cell(180, 5, ('Despacho del Alcalde'), 0, 1, 'C');
	
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetXY(25, 40); $pdf->Cell(170, 10, 'CONSTANCIA', 0, 1, 'C');
	$pdf->Ln(10);
}
//---------------------------------------------------

//---------------------------------------------------
//	Creación del objeto de la clase heredada
$pdf=new PDF_MC_Table('P', 'mm', 'Letter');
$pdf->Open();
$pdf->SetMargins(25, 10, 30);
$pdf->SetAutoPageBreak(1, 2);

$dia_letras = convertir_a_letras($dia_actual, "entero");
$dia_actual = ("$dia_letras ($dia_actual)");
$anio_letras = convertir_a_letras($anio_actual, "entero");
$anio_actual = ("$anio_letras ($anio_actual)");
$m = (int) $mes_actual; 
$mes_actual = getNombreMes($m);

$trabajadores = split(";", $registros);
foreach ($trabajadores as $persona) {
	$sql = "SELECT
				mp.Nacionalidad,
				mp.Ndocumento,
				mp.NomCompleto,
				mp.Sexo,
				me.Fingreso,
				me.CodTipoNom,
				c.NivelSalarial,
				c.DescripCargo,
				ptne.*
			FROM
				pr_tiponominaempleado ptne
				INNER JOIN mastpersonas mp ON (ptne.CodPersona = mp.CodPersona)
				INNER JOIN mastempleado me ON (mp.CodPersona = me.CodPersona)
				INNER JOIN rh_puestos c ON (me.CodCargo = c.CodCargo)
			WHERE
				ptne.CodPersona = '".$persona."' AND 
				ptne.CodTipoProceso = 'FIN' AND
				ptne.Periodo = (SELECT
									MAX(Periodo)
								FROM
									pr_tiponominaempleado
								WHERE
									CodPersona = '".$persona."' AND
									CodTipoProceso = 'FIN')";
	$query = mysql_query($sql) or die ($sql.mysql_error());
	while ($field = mysql_fetch_array($query)) {
		Cabecera($pdf);
		
		$sueldo = number_format($field['SueldoBasico'], 2, ',', '.');
		$sueldo = "(Bs. $sueldo)";
		$sueldo_letras = convertir_a_letras($field['SueldoBasico'], "moneda");
		$sueldo_basico = (strtoupper("$sueldo_letras")." $sueldo");
		
		$p = $field['TotalIngresos'] - $field['SueldoBasico'];
		$p = number_format($p, 2, '.', '');
		$primas_letras = convertir_a_letras($p, "moneda");
		$primas = (strtoupper("$primas_letras (")."Bs. ".number_format($p, 2, ',', '.').")");
		
		$sueldo_normal = number_format($field['TotalIngresos'], 2, ',', '.');
		$sueldo_normal_letras = convertir_a_letras($field['TotalIngresos'], "moneda");
		$SueldoNormal = (strtoupper("$sueldo_normal_letras")." (Bs. $sueldo_normal)");
		
		if ($field['Sexo']=="F") 
			if ($field['CodTipoNom'] == "02") $funcionario = "la trabajadora"; else $funcionario="la funcionaria"; 
		else 
			if ($field['CodTipoNom'] == "02") $funcionario = "el trabajador"; else $funcionario="el funcionario";
		
		$parrafo1 = ("Quien suscribe, ABOG. MAGALIS DEL VALLE BARRIOS MORENO, titular de la cédula de identidad V-9.867.265, en mi condición de Contralora del Estado Delta Amacuro (P), hago constar que ".$funcionario." ").strtoupper(trim($field['NomCompleto'])).(", titular de la cédula de identidad número: ").$field['Nacionalidad']."-".number_format($field['Ndocumento'], 0, '', '.').(", labora en este Órgano de Control Fiscal desde la fecha ").formatFechaDMA($field['Fingreso']).(", y actualmente ocupa el cargo de ").strtoupper($field['DescripCargo']).(", devengando una remuneración salarial básica mensual de ").$sueldo_basico.(", más primas por la cantidad de ").$primas.("; totalizando una remuneración normal de ").$SueldoNormal.".";
		
		$parrafo2 = ("Constancia que se expide a petición de la parte interesada. En la Ciudad de Tucupita, Estado Delta Amacuro, a los ".$dia_actual." día(s) del mes de ".$mes_actual." de ".$anio_actual.".");
		
		$parrafo3 = ("Válida por tres meses.");
		
		$pie1 = ("ABOG. MAGALIS DEL VALLE BARRIOS MORENO");
		$pie2 = ("CONTRALORA DEL ESTADO DELTA AMACURO (P)");
		$pie3 = ("Según Resolución Nº. 01-00-129  de fecha 12-06-2012,");
		$pie4 = ("Emanada del Despacho del  la Contralora General de la República,");
		$pie5 = ("Publicada en G. O. Nº  39.943  de fecha 13-06-2012");
		
		$pdf->SetFont('Arial', '', 12);
		$pdf->MultiCell(170, 6, utf8_decode($parrafo1), 0, 'J');
		$pdf->Ln(5);
		$pdf->MultiCell(170, 6, utf8_decode($parrafo2), 0, 'J');
		$pdf->Ln(5);
		$pdf->MultiCell(170, 6, utf8_decode($parrafo3), 0, 'J');
		
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->SetXY(25, 170); $pdf->Cell(170, 10, utf8_decode($pie1), 0, 1, 'C');
		$pdf->SetXY(25, 175); $pdf->Cell(170, 10, utf8_decode($pie2), 0, 1, 'C');
		
		$pdf->SetFont('Arial', '', 8);
		$pdf->SetXY(25, 180); $pdf->Cell(170, 10, utf8_decode($pie3), 0, 1, 'C');
		$pdf->SetXY(25, 184); $pdf->Cell(170, 10, utf8_decode($pie4), 0, 1, 'C');
		$pdf->SetXY(25, 188); $pdf->Cell(170, 10, utf8_decode($pie5), 0, 1, 'C');
		
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetXY(25, 190); $pdf->Cell(170, 10, utf8_decode($field_param['ValorParam']), 0, 1, 'L');
		
		$pie6 = "Hacia la Consolidación y Fortalecimiento del Sistema Nacional de Control Fiscal. ";
		$pie7 = "Calle Centurión - Quinta Paola  Nro. 36 / Teléfono (0287) 7211344 – Fax (0287) 7211655";
		$pie8 = "Tucupita Edo Delta Amacuro.";
		
		$pdf->SetFont('Arial', 'I', 6);
		$pdf->SetTextColor(100, 100, 100);
		$pdf->SetXY(25, 252); $pdf->Cell(170, 10, utf8_decode($pie6), 0, 1, 'C');
		$pdf->SetXY(25, 256); $pdf->Cell(170, 10, utf8_decode($pie7), 0, 1, 'C');
		$pdf->SetXY(25, 260); $pdf->Cell(170, 10, utf8_decode($pie8), 0, 1, 'C');
	}
}
//---------------------------------------------------

$pdf->Output();
?>  
