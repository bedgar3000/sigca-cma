<?php
// ------------------------------------- ####
include("../lib/fphp.php");
if (!isset($_SESSION['USUARIO_ACTUAL']) || !isset($_SESSION['ORGANISMO_ACTUAL'])) header("Location: ../index.php");
include ("fphp.php");
connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="css1.css" rel="stylesheet" type="text/css" />-->
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="../css/prettyPhoto.css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script type="text/javascript" language="javascript" src="fscript.js"></script>
<script type="text/javascript" language="javascript" src="af_fscript.js"></script>
<script type="text/javascript" src="../js/funciones.js" charset="utf-8"></script>
</head>

<body>
<!--////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@///////////////////////////-->
<table width="100%" cellspacing="0" cellpadding="0">
 <tr>
  <td class="titulo">Maestro P&oacute;liza de Seguros | Nuevo Registro</td>
  <td align="right">
   <a class="cerrar" href="framemain.php">[cerrar]</a>
  </td>
 </tr>
</table>
<!--////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@///////////////////////////-->
<hr width="100%" color="#333333" />
<!--////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@///////////////////////////-->
<form name="fentrada" id="fentrada" action="af_pseguros.php" method="POST" onsubmit="return  guardarPolizaSeguro(this);">
<?php echo "<input type='hidden' name='filtro' id='filtro' value='".$_POST['filtro']."' />"; ?>

<div style="width:700px" class="divFormCaption">Datos</div>
<table width="700" class="tblForm">
  <tr>
    <td width="236" class="tagForm">P&oacute;liza de Seguro:</td>
    <td width="452"><input type="text" name="cod_pseguro"  id="cod_pseguro" size="10" maxlength="8"/>*</td>
  </tr>
  <tr>
    <td class="tagForm">Descripci&oacute;n Local:</td>
    <td><input type="text" name="descp_pseguro"  id="descp_pseguro" size="60" maxlength="30" />*</td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="tagForm">Empresa Aseguradora:</td>
    <td><input type="text" name="empa_pseguro"  id="empa_pseguro" size="60" maxlength="50" />*</td>
  </tr>
  <tr>
    <td class="tagForm">Agente de Seguros:</td>
    <td><input type="text" name="ages_pseguro"  id="ages_pseguro" size="60" maxlength="50" />*</td>
  </tr>
  <tr>
    <td class="tagForm">Fecha Vencimiento:</td>
    <td><input type="text" name="fvenc_pseguro"  id="fvenc_pseguro" size="20" maxlength="25" value="<?=date("d-m-Y H:m:s")?>" />*</td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="tagForm">Monto Cobertura:</td>
    <td><input type="text" name="mcober_pseguro"  id="mcober_pseguro" size="25" maxlength="25" style="text-align:right" />*</td>
  </tr>
  <tr>
    <td class="tagForm">Costo P&oacute;liza:</td>
    <td><input type="text" name="cpoli_pseguro"  id="cpoli_pseguro" size="25" maxlength="25" style="text-align:right" />*</td>
  </tr>
   <tr>
	    <td class='tagForm'>Estado:</td>
	    <td><input type="hidden" name="radioEstado" id="radioEstado" value="A"/>
		   <input name='radio1' type='radio' checked="checked" onclick="estadosPosee(this.form,'a');"/> Activo
		   <input name='radio2' type='radio' onclick="estadosPosee(this.form,'b');"/> Inactivo
	   </td>
  </tr>
  <tr>
   <td height="5"></td>
  </tr>
  <tr><? 
     echo"
	<td class='tagForm'>&Uacute;ltima Modif.:</td>
	<td>
	  <input name='ult_usuario' type='text' id='ult_usuario' size='30'  readonly />
	  <input name='ult_fecha' type='text' id='ult_fecha' size='20'  readonly />
	</td>";
	?>
  </tr>
</table>
  <!--////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@///////////////////////////-->
  <center>
    <input name="guardar" type="submit" id="guardar" value="Guardar Registro"/>
    <input name="cancelar" type="button" id="cancelar" value="Cancelar" onClick="cargarPagina(this.form, 'af_pseguros.php');" />
  </center><br />
  <!--////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@///////////////////////////-->
</form>
<!--////////////////////@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@///////////////////////////-->
<div style="width:700px" class="divMsj">Campos Obligatorios *</div>
</body>
</html>

