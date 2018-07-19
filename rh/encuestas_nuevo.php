<?php
session_start();
if (!isset($_SESSION['USUARIO_ACTUAL']) || !isset($_SESSION['ORGANISMO_ACTUAL'])) header("Location: ../index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="fscript.js"></script>
<style type="text/css">
<!--
UNKNOWN {
        FONT-SIZE: small
}
#header {
        FONT-SIZE: 93%; BACKGROUND: url(bg.gif) #dae0d2 repeat-x 50% bottom; FLOAT: left; WIDTH: 100%; LINE-HEIGHT: normal
}
#header UL {
        PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 10px; LIST-STYLE-TYPE: none
}
#header LI {
        PADDING-RIGHT: 0px; PADDING-LEFT: 9px; BACKGROUND: url(left.gif) no-repeat left top; FLOAT: left; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px
}
#header A {
        PADDING-RIGHT: 15px; DISPLAY: block; PADDING-LEFT: 6px; FONT-WEIGHT: bold; BACKGROUND: url(right.gif) no-repeat right top; FLOAT: left; PADDING-BOTTOM: 4px; COLOR: #765; PADDING-TOP: 5px; TEXT-DECORATION: none
}
#header A {
        FLOAT: none
}
#header A:hover {
        COLOR: #333
}
#header #current {
        BACKGROUND-IMAGE: url(left_on.gif)
}
#header #current A {
        BACKGROUND-IMAGE: url(right_on.gif); PADDING-BOTTOM: 5px; COLOR: #333
}
-->
</style>
</head>

<body>
<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="titulo">Control de Encuestas | Nuevo Registro</td>
		<td align="right"><a class="cerrar" href="javascript:" onclick="cargarPagina(document.getElementById('frmentrada'), 'encuestas.php?limit=0');">[cerrar]</a></td>
	</tr>
</table><hr width="100%" color="#333333" />

<?php
include("fphp.php");
connect();
$annio_actual=date("Y");
$mes_actual=date("m"); $m=(int) $mes_actual;
$dia_actual=date("d");
$periodo_actual="$annio_actual-$mes_actual";
$fecha_actual="$dia_actual-$mes_actual-$annio_actual";
?>

<table width="750" align="center">
  <tr>
   	<td>
		<div id="header">
		<ul>
		<!-- CSS Tabs -->
		<li><a onClick="document.getElementById('tab1').style.display='block'; document.getElementById('tab2').style.display='none'; document.getElementById('tab3').style.display='none'; document.getElementById('tab4').style.display='none';" href="#">Encuesta</a></li>
		<li><a onClick="javascript:alert('¡DEBE GUARDAR LOS DATOS PRIMERO!');" href="#">Preguntas</a></li>
		<li><a onClick="javascript:alert('¡DEBE GUARDAR LOS DATOS PRIMERO!');" href="#">Respuestas</a></li>
		<li><a onClick="javascript:alert('¡DEBE GUARDAR LOS DATOS PRIMERO!');" href="#">Resumen</a></li>
		</ul>
		</div>
	</td>
  </tr>
</table>


<form id="frmentrada" name="frmentrada" action="encuestas.php" method="POST" onsubmit="return verificarEncuesta(this, 'GUARDAR');">
<div name="tab1" id="tab1" style="display:block;">
<?php
echo "
<div style='width:750px' class='divFormCaption'>Datos de la Encuesta</div>
<table width='750' class='tblForm'>
	<tr>
		<td class='tagForm'>Organismo:</td>
		<td>
			<select name='organismo' id='organismo' class='selectBig'>
				<option value=''></option>";
				getOrganismos("", 0);
			echo "
			</select>*
		</td>
		<td class='tagForm'>Secuencia:</td>			
		<td><input name='codigo' type='text' id='codigo' size='10' maxlength='7' disabled /></td>
		<td class='tagForm'>Per&iacute;odo:</td>
		<td><input name='periodo' type='text' id='periodo' size='10' maxlength='7' value='".$periodo_actual."' />*<em>(yyyy-mm)</em></td>
	</tr>
	<tr>
		<td class='tagForm'>Titulo:</td>
		<td colspan='5'><input name='titulo' type='text' id='titulo' size='125' maxlength='255' />*</td>
	</tr>
	<tr>
		<td class='tagForm'>Fecha:</td>
		<td><input name='fecha' type='text' id='fecha' size='15' maxlength='10' value='".$fecha_actual."' />*<em>(dd-mm-yyyy)</em></td>
		<td class='tagForm'>Muestra:</td>
		<td colspan='3'><input name='muestra' type='text' id='muestra' size='10' disabled /></td>
	</tr>
	<tr>
		<td class='tagForm'>Observaciones:</td>
		<td colspan='5'><textarea name='obs' id='obs' cols='125' rows='3'></textarea></td>
	</tr>
	<tr>
		<td class='tagForm'>&Uacute;ltima Modif.:</td>
		<td>
			<input name='ult_usuario' type='text' id='ult_usuario' size='30' value='".$field['UltimoUsuario']."' readonly />
			<input name='ult_fecha' type='text' id='ult_fecha' size='25' value='".$field['UltimaFecha']."' readonly />
		</td>
	</tr>
</table>
<center> 
<input type='submit' value='Guardar Registro' />
<input name='bt_cancelar' type='button' id='bt_cancelar' value='Cancelar' onClick='cargarPagina(this.form, \"encuestas.php?limit=0\");' />
</center><br />";
?>
<div style="width:750px" class="divMsj">Campos Obligatorios *</div>
</div>

<div name="tab2" id="tab2" style="display:none;">
</div>

<div name="tab3" id="tab3" style="display:none;">
</div>

<div name="tab4" id="tab4" style="display:none;">
</div>

<?php
//	FILTRO..............
echo "
<input type='hidden' name='chkorganismo' value='".$chkorganismo."' />
<input type='hidden' name='forganismo' value='".$forganismo."' />
<input type='hidden' name='chkperiodo' value='".$chkperiodo."' />
<input type='hidden' name='fperiodo' value='".$fperiodo."' />
<input type='hidden' name='filtro' value='".$filtro."' />";
?>
</form>
</body>
</html>
