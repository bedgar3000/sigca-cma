<?php
// ------------------------------------- ####
include("../lib/fphp.php");
if (!isset($_SESSION['USUARIO_ACTUAL']) || !isset($_SESSION['ORGANISMO_ACTUAL'])) header("Location: ../index.php");
//	------------------------------------
include ("fphp.php");
include ("controlActivoFijo.php");
connect();
list ($_SHOW, $_ADMIN, $_INSERT, $_UPDATE, $_DELETE) = opcionesPermisos('03', $concepto);
//	------------------------------------
//$parametro[0] = $_PARAMETRO['CONFACTIVOPOR']; echo $parametro[0]; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="css1.css" rel="stylesheet" type="text/css" />-->
<link href="css2.css" rel="stylesheet" type="text/css" />
<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="../css/custom-theme/jquery-ui-1.8.16.custom.css" charset="utf-8" />
<link type="text/css" rel="stylesheet" href="../css/prettyPhoto.css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script type="text/javascript" language="javascript" src="fscript.js"></script>
<script type="text/javascript" language="javascript" src="af_fscript.js"></script>
<script type="text/javascript" language="javascript" src="af_fscript2.js"></script>
<script type="text/javascript" src="../js/jquery-1.7.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/jquery.prettyPhoto.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/funciones.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/fscript.js" charset="utf-8"></script>
<style type="text/css">
<!--
UNKNOWN {FONT-SIZE: small}
#header {FONT-SIZE: 93%; BACKGROUND: url(imagenes/bg.gif) #dae0d2 repeat-x 50% bottom; FLOAT: left; WIDTH: 100%; LINE-HEIGHT: normal}
#header UL {PADDING-RIGHT: 10px; PADDING-LEFT: 10px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 10px; LIST-STYLE-TYPE: none}
#header LI {
        PADDING-RIGHT: 0px; PADDING-LEFT: 9px; BACKGROUND: url(imagenes/left.gif) no-repeat left top; FLOAT: left; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px}
#header A {
        PADDING-RIGHT: 15px; DISPLAY: block; PADDING-LEFT: 6px; FONT-WEIGHT: bold; BACKGROUND: url(imagenes/right.gif) no-repeat right top; FLOAT: left; PADDING-BOTTOM: 4px; COLOR: #765; PADDING-TOP: 5px; TEXT-DECORATION: none}
#header A { FLOAT: none}
#header A:hover {  COLOR: #333 }
#header #current { BACKGROUND-IMAGE: url(imagenes/left_on.gif)}
#header #current A { BACKGROUND-IMAGE: url(imagenes/right_on.gif); PADDING-BOTTOM: 5px; COLOR: #333 }
-->
</style>
</head>
<body>
<div id="cajaModal"></div>
<!-- pretty -->
<span class="gallery clearfix"></span>
<?

if($p==1){
  $det = explode(";", $detalles);
  
  foreach($det as $detalle){	
    list($CodOrganismo, $Activo)=split( '[|]', $detalle); 
  }
}else list($CodOrganismo, $Activo) = split('[|]', $detalles);

//// CONSULTA PRINCIPAL
$sa = "select 
             * 
		 from 
		     af_activo 
	    where 
		     CodOrganismo = '".$CodOrganismo."' and 
			 Activo= '".$Activo."'";  
$qa = mysql_query($sa) or die ($sa.mysql_error()); 
$ra = mysql_num_rows($qa); 

if($ra!='0')$fa=mysql_fetch_array($qa);
/// Condición para activar pestaña voucher ingreso
if($fa['GenerarVoucherIngresoFlag']!='S')$_PARAMETRO['VOUINGP20']=N; 




if($accion=="ver"){
  $bt_aprobar= "hidden";
  $bt_cerrar= "hidden";
  $titulo = "Alta Activos";
  $titulo2 = "Ver";
  $activado= "disabled";
  $chekeado = "onclick='this.checked=true;'";
  $visibility = "hidden";
  
}elseif($accion=="modificar"){
  $funcion = "guardarActivosModificados";	
  $titulo = "Alta Activos";
  $titulo2 = "Modificar";
  $bt_aprobar = "";
  $bt_cerrrar = "visible";
  $t_boton = "Guardar Registro" ;
  $onclick = "cargarPagina(this.form,'af_procaprobacionactalta.php');";
  $activado= "";
  $visibility = "visible";
  	
}elseif($accion=="aprobar"){
  $funcion = "AprobarActivo";
  $bt_aprobar= "";
  $bt_cerrar= "";
  $titulo = "Alta Activos";
  $titulo2 = "Aprobar";
  $t_boton = "Aprobar" ;
  $onclick = "window.close();";
  $activado= "disabled";
  $chekeado = "onclick='this.checked=true;'";
  $visibility = "hidden";
}

?>

<table width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="titulo"><?=$titulo;?> | <?=$titulo2;?></td>
		<td align="right"><a class="cerrar" href="" onclick="window.close();">[cerrar]</a></td>
	</tr>
</table>
<hr width="100%" color="#333333" />

<form id="frmentrada" name="frmentrada" action="af_listactivosagregar.php"  onsubmit="return <?=$funcion;?>(this);">
<? echo"<input type='hidden' id='registro' name='registro' value='".$registro."'/>

        <input type='hidden' id='fechaingreso' name='fechaingreso' value='".$fa['FechaIngreso']."'/>
		<input type='hidden' id='fechainventario' name='fechainventario' value='".$fa['InventarioFisicoFecha']."'/>"; 
?>

<table width="908" align="center">
<tr>
  <td>
	<div id="header">
	<ul>
	<!-- CSS Tabs PESTA�AS OPCIONES -->
	<li><a onClick="document.getElementById('tab1').style.display='block'; 
    document.getElementById('tab2').style.display='none';  
    document.getElementById('tab3').style.display='none'; 
    document.getElementById('tab4').style.display='none';
    <? if($fa['GenerarVoucherIngresoFlag']=='S'){?>document.getElementById('tab5').style.display='none';<? }?>" href="#">Informaci&oacute;n General</a></li>
	<li><a onClick="document.getElementById('tab1').style.display='none'; 
    document.getElementById('tab2').style.display='block'; 
    document.getElementById('tab3').style.display='none'; 
    document.getElementById('tab4').style.display='none';
    <? if($fa['GenerarVoucherIngresoFlag']=='S'){?>document.getElementById('tab5').style.display='none';<? }?>" href="#">Informaci&oacute;n Adicional</a></li> 
    <li><a onclick="document.getElementById('tab1').style.display='none'; 
    document.getElementById('tab2').style.display='none'; 
    document.getElementById('tab3').style.display='block'; 
    document.getElementById('tab4').style.display='none';
    <? if($fa['GenerarVoucherIngresoFlag']=='S'){?>document.getElementById('tab5').style.display='none';<? }?>" href="#">Informaci&oacute;n Contable</a></li>
    <li><a onclick="document.getElementById('tab1').style.display='none'; 
    document.getElementById('tab2').style.display='none'; 
    document.getElementById('tab3').style.display='none'; 
    document.getElementById('tab4').style.display='block';
    <? if($fa['GenerarVoucherIngresoFlag']=='S'){?>document.getElementById('tab5').style.display='none';<? }?>" href="#">Car. T&eacute;cnicas y Documentaci&oacute;n</a></li>
    <? if($fa['GenerarVoucherIngresoFlag']=='S'){?><li><a  onclick="document.getElementById('tab1').style.display='none'; 
    document.getElementById('tab2').style.display='none'; 
    document.getElementById('tab3').style.display='none'; 
    document.getElementById('tab4').style.display='none';
    document.getElementById('tab5').style.display='block';" href="#">Voucher Ingreso</a></li><? }?>
	</ul>
	</div>
  </td>
  </td>
</tr>
</table>
<? 
   echo" <input type='hidden' id='regresar' name='regresar' value='".$_GET['regresar']."' />";
   if($fa['Estado']=='PE') $estado_activo = 'Pendiente de Activar'; else $estado_activo = 'Aprobado';
?>
<!-- ****************************************************** COMIENZO TAB1 ************************************************ -->
<div id="tab1" style="display: block;">
<div style="width:900px; height=15px;" class="divFormCaption">Informaci&oacute;n General</div>
<table class="tblForm" width="900">
<tr>
   <td class="tagForm">Activo #:</td>
   <td><input type="hidden" name="clas_public20" id="clas_public20" />
   	   <input type="text" id="nro_activo" name="nro_activo" size="30" value="<?=$fa['Activo'];?>" disabled style="text-align:right"/></td>
   <td class="tagForm">Estado:</td>
   <td><input type="text" name="estado" id="estado" size="30" value="<?=$estado_activo;?>" disabled/></td>
   <td></td>
</tr>
<tr>
  <td class="tagForm">Descripci&oacute;n:</td>
  <td colspan="3"><textarea id="descripcion" name="descripcion" cols="160" rows="4" <?=$activado;?>><?=$fa['Descripcion']; ?></textarea></td>
  <td></td>
</tr>
</table>

<table class="tblForm" width="900">
<tr>
   <td class="tagForm">Situaci&oacute;n Activo:</td>
   <td>
       <select id="situacion_activo" class="selectMed" <?=$activado;?>>
        <? 
		   $s_activo = "select * from af_situacionactivo";
           $q_activo = mysql_query($s_activo) or die ($s_activo.mysql_error());
           $r_activo = mysql_num_rows($q_activo);
          
           if($r_activo!='0'){
		    for($i=0; $i<$r_activo; $i++){
               $f_activo = mysql_fetch_array($q_activo);
               if($fa['SituacionActivo']==$f_activo['CodSituActivo'])echo"<option value='".$f_activo['CodSituActivo']."' selected>".$f_activo['Descripcion']."</option>";
			   else echo"<option value='".$f_activo['CodSituActivo']."'>".$f_activo['Descripcion']."</option>";
            }
		   }
        ?>         
       </select>
   </td> 
   <td class="tagForm" width="131">Organismo:</td>
   <td><select id="organismo" name="organismo" class="selectBig" <?=$activado;?>>
       <?
        $s_org = "select * from mastorganismos";
        $q_org = mysql_query($s_org) or die ($s_org.mysql_error());
        $r_org = mysql_num_rows($q_org);
        if($r_org!='0'){
            for($i=0;$i<$r_org;$i++){
              $f_org = mysql_fetch_array($q_org);
              if($fa['CodOrganismo']==$f_org['CodOrganismo'])echo"<option value='".$f_org['CodOrganismo']."' selected>".$f_org['Organismo']."</option>";
			  else echo"<option value='".$f_org['CodOrganismo']."'>".$f_org['Organismo']."</option>";
            }	
        }
       ?>
       </select></td>
</tr>

<tr>
   <td class="tagForm">Concep. de Movimiento:</td>
   <td>
       <select id="conceptoMovimiento" name="conceptoMovimiento" class="selectMed" <?=$activado;?>>
       <?
	   	   $s_cm = "select * from af_tipomovimientos";
           $q_cm = mysql_query($s_cm) or die ($s_cm.mysql_error());
           $r_cm = mysql_num_rows($q_cm);
          
           if($r_cm!='0'){
		    for($i=0;$i<$r_cm;$i++){
               $f_cm = mysql_fetch_array($q_cm);
			   if($f_cm['CodTipoMovimiento']==$fa['CodTipoMovimiento'])
				   echo"<option value='".$f_cm['CodTipoMovimiento']."' selected>".htmlentities($f_cm['DescpMovimiento'])."</option>";
			   else
			       echo"<option value='".$f_cm['CodTipoMovimiento']."'>".htmlentities($f_cm['DescpMovimiento'])."</option>";	
            }
		   }
        ?>         
       </select>
   </td> 
   <td class="tagForm">Dependencia:</td>
   <td>
   	   <select id="dependencia" name="dependencia" class="selectBig" <?=$activado;?>>
         <?
          $s_dep = "select * from mastdependencias where CodOrganismo = '".$fa['CodOrganismo']."'";
          $q_dep = mysql_query($s_dep) or die ($s_dep.mysql_error()); //echo $s_dep;
          $r_dep = mysql_num_rows($q_dep);
  
		  if($r_dep!='0'){
			for($i=0;$i<$r_dep;$i++){
			   $f_dep = mysql_fetch_array($q_dep);
			   if($f_dep['CodDependencia']==$fa['CodDependencia'])echo"<option value='".$f_dep['CodDependencia']."' selected>".$f_dep['Dependencia']."</option>"; 
			   else echo"<option value='".$f_dep['CodDependencia']."'>".$f_dep['Dependencia']."</option>"; 
			}
		  }
		 ?>
       </select>
   </td>  
</tr>

<tr>
   <td class="tagForm">Tipo de Activo:</td>
   <td>
   		<select id="tipo_activo" class="selectMed" <?=$activado;?>>
        <?
         $s_tactivo = "select * from mastmiscelaneosdet where CodMaestro = 'TIPOACTIVO'";
		 $q_tactivo = mysql_query($s_tactivo) or die ($s_tactivo.mysql_error());
		 $r_tactivo = mysql_num_rows($q_tactivo);
		 
		 if($r_tactivo != 0){
	       for($i=0; $i<$r_tactivo; $i++){
			 $f_tactivo = mysql_fetch_array($q_tactivo); 
			 if($f_tactivo['CodDetalle']== $fa['TipoActivo']) echo"<option value='".$f_tactivo['CodDetalle']."' selected>".$f_tactivo['Descripcion']."</option>";
			 else echo"<option value='".$f_tactivo['CodDetalle']."'>".$f_tactivo['Descripcion']."</option>";
		   }
		 }
		?>
        </select>
  </td>
  <td class="tagForm">Categor&iacute;a:</td>
   <td width="303">
   <select id="select_categoria" style="width:66px;" onchange="cargarCampoCategoria(this.id);" <?=$activado;?>>
   <?
   $s_categoria = "select * from af_categoriadeprec";
   $q_categoria = mysql_query($s_categoria) or die ($s_categoria.mysql_error());
   $r_categoria = mysql_num_rows($q_categoria);
   
   if($r_categoria!=0){
	   for($i=0; $i<$r_categoria; $i++){
		  $f_categoria = mysql_fetch_array($q_categoria);
		  if($fa['Categoria']== $f_categoria['CodCategoria']) 
		     echo"<option value='".$f_categoria['CodCategoria']."' selected>".$f_categoria['CodCategoria'].'-'.$f_categoria['DescripcionLocal']."</option>"; 
		  else echo"<option value='".$f_categoria['CodCategoria']."'>".$f_categoria['CodCategoria'].'-'.$f_categoria['DescripcionLocal']."</option>"; 
	   }
	}
   ?>
   </select>
  <?
   $s_catdescp = "select * from af_categoriadeprec where CodCategoria = '".$fa['Categoria']."'";
   $q_catdescp = mysql_query($s_catdescp) or die ($s_catdescp.mysql_error());
   $r_catdescp = mysql_num_rows($q_catdescp); $f_catdescp = mysql_fetch_array($q_catdescp);
   ?>
   <input type="text" id="categoria" name="categoria" size="51" value="<?=$f_catdescp['DescripcionLocal'];?>" <?=$activado;?>/>
   </td>
   <td width="42"></td> 
</tr>
<tr>
   <td class="tagForm">Naturaleza:</td>
  <? 
     if($fa['Naturaleza']=='AN') $natu = 'Activo Normal'; 
  ?>
   <td><input type="text" id="naturaleza" name="naturaleza" size="30" value="<?=$natu;?>" <?=$activado;?>/></td>
   <td class="tagForm">Clasificaci&oacute;n20:</td>
   <td>
       <?
        $s_clactivo = "select * from af_clasificacionactivo where CodClasificacion= '".$fa['Clasificacion']."'";
		$q_clactivo = mysql_query($s_clactivo) or die ($s_clactivo.mysql_error());
		$f_clactivo = mysql_fetch_array($q_clactivo);
	   ?>
       <input type="hidden" id="clasificacion20" name="clasificacion20" value="<?=$f_clactivo['CodClasificacion'];?>" disabled/> 
       <input type="text" id="clasificacion20Descp" name="clasificacion20Descp" size="67" value="<?=$f_clactivo['Descripcion'];?>" disabled/>
   </td>
   <td class="gallery clearfix"><input type="hidden" name="btClasificacion20" id="btClasificacio20" value="..." onclick="cargarVentanaLista(this.form, 'af_listaclasificacionPub20.php?limit=0&campo=1&ventana=insertarClasificacionPub20','height=500, width=800, left=200, top=100, resizable=yes');"/> 
   <a href="af_listadoclasificacion20.php?filtrar=default&limit=0&campo=1&ventana=insertarClasificacionPub20&iframe=true&width=70%&height=90%" rel="prettyPhoto[iframe1]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer; visibility:<?=$visibility;?>"/>
            </a></td>
</tr>
<tr>
   <td class="tagForm">Origen Activo:</td> <? if($fa['OrigenActivo']=='AT')$manual="Automático";else $manual="Manual"; ?>
   <td><input type="text" id="origen_activo" name="origen_activo" size="30" value="<?=$manual;?>" disabled/></td>
   <td class="tagForm">Clasificaci&oacute;n:</td>
       <?
        $s_clactivo = "select * from af_clasificacionactivo where CodClasificacion= '".$fa['Clasificacion']."'";
		$q_clactivo = mysql_query($s_clactivo) or die ($s_clactivo.mysql_error());
		$f_clactivo = mysql_fetch_array($q_clactivo);
	   ?>
   <td><input type="text" id="clasificacion" name="clasificacion" size="8" value="<?=$f_clactivo['CodClasificacion'];?>" disabled/>
       <input type="text" id="clasificacion2" name="clasificacion2" size="51" value="<?=$f_clactivo['Descripcion'];?>" disabled/></td>
   <td class="gallery clearfix"><input type="hidden" name="btClasificacion" id="btClasificacion" value="..." onclick="cargarVentanaLista(this.form, 'af_listaclasificacionactivo.php?limit=0&campo=1','height=500, width=800, left=200, top=100, resizable=yes');" disabled/> <a href="af_listaclasificacionactivo.php?filtrar=default&limit=0&campo=1&ventana=cargarClasificacionActivo&iframe=true&width=70%&height=90%" rel="prettyPhoto[iframe2]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer; visibility:<?=$visibility;?>"/>
            </a></td>
</tr>
<tr>
   <td class="tagForm" width="156">Estado Conserv.:</td>
   <td><select id="estado_conserv" name="estado_conserv" class="selectMed" <?=$activado;?>>
        <?
         //// CONSULTA PARA CARGAR EL SELECT  DE TIPO MEJORA
         $s_estconv = "select * from mastmiscelaneosdet where CodMaestro = 'ESTCONSERV'";
         $q_estconv = mysql_query($s_estconv) or die ($s_estconv.mysql_error());
         $r_estconv = mysql_num_rows($q_estconv);
         if($r_estconv!=0){
            for($i=0;$i<$r_estconv;$i++){
              $f_estconv = mysql_fetch_array($q_estconv);
			  if($fa['CodDetalle']==$fa['EstadoConserv']){
               echo"<option value='".$f_estconv['CodDetalle']."' selected>".$f_estconv['Descripcion']."</option>";
			  }else{
			    echo"<option value='".$f_estconv['CodDetalle']."'>".$f_estconv['Descripcion']."</option>";
			  }
            }
          }
        ?>
        </select></td>
   <td class="tagForm">Ubicaci&oacute;n:</td>
   <?
    $s_ubicacion = "select * from af_ubicaciones where CodUbicacion = '".$fa['Ubicacion']."'";
	$q_ubicacion = mysql_query($s_ubicacion) or die ($s_ubicacion.mysql_error());
	$f_ubicacion = mysql_fetch_array($q_ubicacion);
   ?>
   <td><input type="text" name="ubicacion" id="ubicacion" size="8" value="<?=$f_ubicacion['CodUbicacion'];?>" disabled/>
       <input type="text" name="ubicacion2" id="ubicacion2" size="51" value="<?=$f_ubicacion['Descripcion'];?>" disabled/></td>
   <td class="gallery clearfix"><input type="hidden" name="btUbicacion" id="btUbicacion" value="..." onclick="cargarVentanaLista(this.form, 'af_listaubicacionesactivo.php?limit=0&campo=2','height=500, width=800, left=200, top=100, resizable=yes');" disabled/> <a href="af_listaubicacionesactivo.php?filtrar=default&limit=0&campo=2&iframe=true&width=70%&height=90%" rel="prettyPhoto[iframe3]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer; visibility:<?=$visibility;?>"/>
            </a></td>
</tr>
<tr>
   <td class="tagForm">C&oacute;digo Barras:</td>
   <td><input type="text" id="codigo_barras" name="codigo_barras" size="30" style="text-align:right" value="<?=$fa['CodigoBarras'];?>" <?=$activado;?>/></td>
   <td class="tagForm">Tipo Mejora:</td>
   <td><select id="tipo_mejora" style="width: 72px;" <?=$activado;?>>
       <?
         //// CONSULTA PARA CARGAR EL SELECT  DE TIPO MEJORA
         $s_miscelaneos = "select * from mastmiscelaneosdet where CodMaestro = 'TIPOMEJORA' and CodAplicacion='AF'";
         $q_miscelaneos = mysql_query($s_miscelaneos) or die ($s_miscelaneos.mysql_error());
         $r_miscelaneos = mysql_num_rows($q_miscelaneos);
         if($r_miscelaneos!=0){
            for($i=0;$i<$r_miscelaneos;$i++){
              $f_miscelaneos = mysql_fetch_array($q_miscelaneos);
			  if($f_miscelaneos['CodDetalle']==$fa['TipoMejora'])
                 echo"<option value='".$f_miscelaneos['CodDetalle']."' selected>".$f_miscelaneos['Descripcion']."</option>";
			  else
			     echo"<option value='".$f_miscelaneos['CodDetalle']."'>".$f_miscelaneos['Descripcion']."</option>";
            }
          }
        ?>
       </select> 
       <?
         $s_actconsolidado = "select * from af_activo where Activo = '".$fa['ActivoConsolidado']."'";
		 $q_actconsolidado = mysql_query($s_actconsolidado) or die ($s_actconsolidado.mysql_error());
		 $f_actconsolidado = mysql_fetch_array($q_actconsolidado);
	   ?>
       Act. Principal:<input type="hidden" name="activo_principal" id="activo_principal"  value="<?=$f_actconsolidado['Activo'];?>"/>
       <input type="text" name="activo_principal2" id="activo_principal2" size="28" value="<?=$f_actconsolidado['Descripcion'];?>" disabled/></td>
   <td class="gallery clearfix"><input type="hidden" name="btActivop" id="btActivop" value="..." onclick="cargarVentanaLista(this.form, 'af_listaactivosfijos.php?limit=0&campo=16','height=500, width=800, left=200,top=100,resizable=yes');" disabled/><a href="af_listaactivosfijos.php?filtrar=default&limit=0&campo=16&iframe=true&width=80%&height=90%" rel="prettyPhoto[iframe4]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer; visibility:<?=$visibility;?>"/>
            </a></td>
</tr>
<tr>
   <td class="tagForm">C&oacute;digo Interno:</td>
   <td><input type="text" id="codigo_interno" name="codigo_interno" size="30" style="text-align:right" value="<?=$fa['CodigoInterno'];?>" <?=$activado;?>/></td>
   <td class="tagForm" width="131">Empleado Usuario:</td>
   <?
    $s_empusuario = "select *  from mastpersonas where CodPersona = '".$fa['EmpleadoUsuario']."'";
	$q_empusuario = mysql_query($s_empusuario) or die ($s_empusuario.mysql_error());
	$f_empusuario = mysql_fetch_array($q_empusuario);
   ?>
   <td><input type="hidden" name="cod_usuario" id="cod_usuario" value="" /> 
   	   <input type="text" id="nomb_usuario" name="nomb_usuario" size="67" value="<?=$f_empusuario['NomCompleto'];?>" disabled/>
   </td>
   <td class="gallery clearfix"><input type="hidden" name="btEmpleado" id="btEmpleado" value="..." onclick="cargarVentanaLista(this.form,'af_listaempleados.php?limit=0&campo=7','height=500, width=800,left=200,top=100,resizable=yes');" disabled/> <a href="af_listaempleados.php?filtrar=default&limit=0&campo=7&iframe=true&width=70%&height=90%" rel="prettyPhoto[iframe5]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer; visibility:<?=$visibility;?>"/>
            </a></td>
</tr>
<tr>
   <td class="tagForm">T. Seguro:</td>
   <td width="244">
   <?
	$s_tseguro = "select * from af_tiposeguro where CodTipoSeguro='".$fa['TipoSeguro']."'";
	$q_tseguro = mysql_query($s_tseguro) or die ($s_tseguro.mysql_error());
	$f_tseguro = mysql_fetch_array($q_tseguro);
   ?>
   <input type="text" id="t_seguro" name="t_seguro" size="10" value="<?=$f_tseguro['CodTipoSeguro'];?>" disabled/> 
   <select id="select_TSeguro" class="selectSma" onchange="valorTSeguro(this.id);" <?=$activado;?>>
   <?
	$s_tseguro = "select * from af_tiposeguro";
	$q_tseguro = mysql_query($s_tseguro) or die ($s_tseguro.mysql_error()); $r_tseguro = mysql_num_rows($q_tseguro);
	for($i=0; $i<$r_tseguro; $i++){
	 $f_tseguro = mysql_fetch_array($q_tseguro);
	 if($f_tseguro['CodTipoSeguro']==$fa['TipoSeguro'])echo"<option value='".$f_tseguro['CodTipoSeguro']."' selected>".$f_tseguro['Descripcion']."</option>";
	 else echo"<option value='".$f_tseguro['CodTipoSeguro']."'>".$f_tseguro['Descripcion']."</option>";
	}
   ?>      
   </select></td>
   <td class="tagForm" width="131">Empl. Responsable:</td>
   <?
    $s_empresp = "select *  from mastpersonas where CodPersona = '".$fa['EmpleadoResponsable']."'";
	$q_empresp= mysql_query($s_empresp) or die ($s_empresp.mysql_error());
	$f_empresp = mysql_fetch_array($q_empresp);
   ?>
   <td><input type="hidden" id="cod_empresponsable" name="cod_empresponsable" value="" disabled="true"/> 
       <input type="text" id="empleado_responsable" name="empleado_responsable" size="67" value="<?=$f_empresp['NomCompleto'];?>" disabled/></td>
   <td class="gallery clearfix"><input type="hidden" name="btEmpleadoResp" id="btEmpleadoResp" value="..." onclick="cargarVentanaLista(this.form,'af_listaempleados.php?limit=0&campo=8','height=500,width=800,left=200,top=100,resizable=yes');" disabled/> <a href="af_listaempleados.php?filtrar=default&limit=0&campo=8&iframe=true&width=65%&height=100%" rel="prettyPhoto[iframe6]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer; visibility:<?=$visibility;?>"/>
            </a></td>
</tr>
<tr>
   <td class="tagForm">T. Veh&iacute;culo:</td>
                   <?
                    $s_tvehiculo = "select * from af_tipovehiculo where CodTipoVehiculo='".$fa['TipoVehiculo']."'";
					$q_tvehiculo = mysql_query($s_tvehiculo) or die ($s_tvehiculo.mysql_error());
					$f_tvehiculo = mysql_fetch_array($q_tvehiculo);
				   ?>
   <td><input type="text" id="t_vehiculo" name="t_vehiculo" size="10" value="<?=$f_tvehiculo['CodTipoVehiculo'];?>" disabled/> <select id="select_TVehiculo" class="selectSma" onchange="valorTVehiculo(this.id);" <?=$activado;?>>
   <option value="<?=$f_tvehiculo['CodTipoVehiculo'];?>"><?=$f_tvehiculo['Descripcion'];?></option>
       <?
        $s_tvehiculo = "select * from af_tipovehiculo";
		$q_tvehiculo = mysql_query($s_tvehiculo) or die ($s_tvehiculo.mysql_error());
		
		while($f_tvehiculo=mysql_fetch_array($q_tvehiculo)){
		 echo"<option value='".$f_tvehiculo['CodTipoVehiculo']."'>".$f_tvehiculo['Descripcion']."</option>";
		}
	   ?>
   </select></td>
   <td class="tagForm"><u>Informaci&oacute;n Contable</u></td>
</tr>
<tr>
   <td colspan="2">
   <?
    if($fa['FlagParaMantenimiento']=='S'){ ?>
    <input type="checkbox" name="disp_mantenimientoflag" id="disp_mantenimientoflag"  checked <?=$chekeado;?>/>
    <? }else{ ?>
    <input type="checkbox" name="disp_mantenimientoflag" id="disp_mantenimientoflag"  <?=$activado;?>/>
    <? }?> Disponible Para Mantenimiento</td>
   <td class="tagForm">Centro Costos:</td>
   <?
    $s_cencosto = "select * from ac_mastcentrocosto where CodCentroCosto = '".$fa['CentroCosto']."'";
	$q_cencosto = mysql_query($s_cencosto) or die ($s_cencosto.mysql_error());
	$f_cancosto = mysql_fetch_array($q_cencosto);
   ?>
   <td><input type="text" id="centro_costos" name="centro_costos" size="8" value="<?=htmlentities($f_cancosto['CodCentroCosto']);?>" disabled/>
       <input type="text" id="centro_costos2" name="centro_costos2" size="51" value="<?=htmlentities($f_cancosto['Descripcion']);?>" disabled/></td>
   <td class="gallery clearfix"><input type="hidden" name="btCentroCostos" id="btCentroCostos" value="..." onclick="cargarVentanaLista(this.form,'af_listacentroscostos.php?limit=0&campo=9','height=500,width=800,left=200,top=100,resizable=yes');" disabled/> <a href="af_listacentroscostos.php?filtrar=default&limit=0&campo=9&iframe=true&width=80%&height=100%" rel="prettyPhoto[iframe7]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer; visibility:<?=$visibility;?>"/>
            </a></td>
</tr>
<tr>
   <td colspan="2">
   <?
    if($fa['FlagParaOperaciones']=='S'){ ?>
    <input type="checkbox" name="disp_operacionesflag" id="disp_operacionesflag" checked <?=$chekeado;?>/>
    <? }else{?>
    <input type="checkbox" name="disp_operacionesflag" id="disp_operacionesflag" <?=$activado;?>/> 
    <? }?>Disponible Para Operaciones</td>
</tr>
<tr>
   <td class="tagForm">Preparado por:</td>
   <td colspan="2">
   <? $s_usuario = "select  NomCompleto from mastpersonas where CodPersona = '".$fa['PreparadoPor']."'";
	  $q_usuario = mysql_query($s_usuario) or die ($s_usuario.mysql_error());
	  $f_usuario = mysql_fetch_array($q_usuario);
	  
	  list($a, $m, $d) = split('[-]', $fa['FechaPreparacion']); $fecha_preparacion = $d.'-'.$m.'-'.$a; 
   ?>
   <input type="text" id="cod_prepor" name="cod_prepor" size="50" disabled="true" value="<?=$f_usuario['NomCompleto'];?>"/>
   <input type="text" name="fecha_preparado" id="fecha_preparado" size="8" disabled="true" value="<?=$fecha_preparacaion;?>"/></td>
</tr>
<tr>
   <td class="tagForm">Aprobado por:</td>
   <?
     $s_aprobpor = "select NomCompleto from mastpersonas  where CodPersona = '".$fa['AprobadoPor']."'";
	 $q_aprobpor = mysql_query($s_aprobpor) or die ($s_aprobpor.mysql_error());
	 $f_aprobpor = mysql_fetch_array($q_aprobpor);
	 	 
	 if($fa['FechaRevisadoPor']!="0000-00-00"){ 
	    list($a, $m, $d) = split('[-]', $fa['FechaRevisadoPor']);
		$fechaRevisado = $d.'-'.$m.'-'.$a;
	 }
   ?>
   <td colspan="2"><input type="text" id="aprobadoPor" name="aprobadoPor" size="50" value="<?=$f_aprobpor['NomCompleto'];?>" disabled/>
                   <input type="text" name="fecha_aprobado" id="fecha_aprobado" size="8" value="<?=$fechaRevisado;?>" disabled/></td>
</tr>
<tr><td align="center" colspan="5">Ultima Modif.:<input type="text" name="ultimo_usuario" value="<?=$fa['UltimoUsuario'];?>" size="25" disabled/>
<input type="text" name="ultima_fecha" value="<?=$fa['UltimaFechaModif'];?>" size="20" disabled/></td></tr>
</table>
</div>
<!-- ****************************************************** COMIENZO TAB2 ************************************************ -->
<div id="tab2" style="display: none;">
<div style="width:900px; height=15px;" class="divFormCaption">Informaci&oacute;n Adicional</div>
<table class="tblForm" width="900">
<tr>
  <td width="133" class="tagForm"><u>Informaci&oacute;n del Activo</u></td>
</tr>
<tr>
  <td class="tagForm">Fabricante(Marca):</td>
  <td width="199">
  <select id="fabricante" name="fabricante" class="selectMed" <?=$activado;?>/>
   <?
    $scon2 = "select * from lg_marcas";
    $qcon2= mysql_query($scon2) or die ($scon2.mysql_error()); 
	$rcon2 = mysql_num_rows($qcon2); 
    
	if($rcon2 != 0)
	for($i=0; $i<$rcon2; $i++){
       $fcon2= mysql_fetch_array($qcon2);
       if($fcon2['CodMarca']==$fa['Marca']) echo"<option value='".$fcon2['CodMarca']."' selected>".htmlentities($fcon2['Descripcion'])."</option>";
       else echo"<option value='".$fcon2['CodMarca']."'>".htmlentities($fcon2['Descripcion'])."</option>";
    }
    ?>
    </select>
  </td>
  <td width="118" class="tagForm">Material:</td>
  <td width="190"><input type="text" id="material" name="material" size="25" value="<?=$fa['Material'];?>" <?=$activado;?>/></td>
  <td width="141" class="tagForm">Fecha Ingreso:</td>
  <? 
	list($a, $m, $d) = SPLIT('[-]', $fa['FechaIngreso']); 
	$fecha_ingreso = $d.'-'.$m.'-'.$a;
  ?>
  <td width="91"><input type="text" id="fecha_ingreso" name="fecha_ingreso" size="8" value="<?=$fecha_ingreso;?>" onchange="crearPeriodo(this.form, this.id);" <?=$activado;?>/></td>
</tr>
<tr>
  <td class="tagForm">Modelo:</td>
  <td><input type="text" name="modelo" id="modelo" size="40" value="<?=$fa['Modelo'];?>" <?=$activado;?>/></td>
  <td class="tagForm">Dimensiones:</td>
  <td><input type="text" id="dimensiones" name="dimensiones" size="25" value="<?=$fa['Dimensiones'];?>" <?=$activado;?>/></td>
  <td class="tagForm">Per&iacute;odo Registro:</td>
  <td><input type="text" id="periodo_registro" name="periodo_registro" size="8" disabled value="<?=$fa['PeriodoIngreso'];?>" style="text-align:center;"/></td>
</tr>
<tr>
  <td class="tagForm">N&uacute;mero de Serie:</td>
  <td><input type="text" name="nro_serie" id="nro_serie" size="40" value="<?=$fa['NumeroSerie'];?>" <?=$activado;?>/></td>
  <td class="tagForm">Nro. Parte:</td>
  <td><input type="text" id="nro_parte" name="nro_parte" size="25" value="<?=$fa['NumerodeParte'];?>" <?=$activado;?>/></td>
  <td class="tagForm">Inicio Depreciaci&oacute;n:</td>
  <td><input type="text" id="ini_depreciacion" name="ini_depreciacion" size="8" style="text-align:center" value="<?=$fa['PeriodoInicioDepreciacion'];?>" disabled/></td>
</tr>
<tr>
  <td class="tagForm">Nro. Serie Motor:</td>
  <td><input type="text" name="nro_seriemotor" id="nro_seriemotor" size="40" value="<?=$fa['NumeroSerieMotor'];?>" <?=$activado;?>/></td>
  <td class="tagForm">Color:</td>
  <td><select id="color" class="selectMed" <?=$activado;?>>
       <?
       $s_color = "select * from mastmiscelaneosdet where CodMaestro='COLOR'";
	   $q_color = mysql_query($s_color) or die ($s_color.mysql_error());
	   
	   while($f_color = mysql_fetch_array($q_color)){
		  if ($f_color['CodDetalle']==$fa['Color']) echo"<option value='".$f_color['CodDetalle']."' selected>".$f_color['Descripcion']."</option>";
		  else echo"<option value='".$f_color['CodDetalle']."'>".$f_color['Descripcion']."</option>";
	   }
	  ?>
      </select></td>
  <td class="tagForm">Inicio Ajust.x Inflac.:</td>
  <td><input type="text" name="ini_ajuste" id="ini_ajuste" size="8" style="text-align:center" value="<?=$fa['PeriodoInicioRevaluacion'];?>" disabled/></td>
</tr>
<tr>
  <td class="tagForm">N&uacute;mero Placa:</td>
  <td><input type="text" name="nro_placa" id="nro_placa" size="40" value="<?=$fa['NumeroPlaca'];?>" <?=$activado;?> /></td>
  <td class="tagForm">Pa&iacute;s de Fabricaci&oacute;n:</td>
  <td><select id="pais_fabricacion" class="selectMed" <?=$activado;?>>
      <?
	     $spaises = "select * from mastpaises";
		 $qpaises = mysql_query($spaises) or die ($spaises.mysql_error());
		 $rpaises = mysql_num_rows($qpaises);
		 
		 for($i=0;$i<$rpaises;$i++){
		   $fpaises = mysql_fetch_array($qpaises);
		   echo"<option value='".$fpaises['CodPais']."'>".$fpaises['Pais']."</option>";
		 }
		 
	   ?>
      </select></td>
  <td class="tagForm"><u>Informaci&oacute;n de la Baja</u></td>
</tr>
<tr>
  <td class="tagForm">Marca Motor:</td>
<?
$scon2 = "select Descripcion as DescpMarcas from lg_marcas where CodMarca = '".$fa['MarcaMotor']."'";
$qcon2= mysql_query($scon2) or die ($scon2.mysql_error());
$fcon2= mysql_fetch_array($qcon2);
?>
  <td><input type="text" name="marca_motor" id="marca_motor" size="40" value="<?=$fcon2['DescpMarcas'];?>" <?=$activado;?>/></td>
  <td class="tagForm">A&ntilde;o de Fabricaci&oacute;n:</td>
  <td><input type="text" id="ano_fabricacion" name="ano_fabricacion"  size="8" style="text-align: right;" value="<?=$fa['FabricacionAno'];?>" <?=$activado;?>/></td>
  <td class="tagForm">Per&iacute;odo de Baja:</td>
  <td><input type="text" id="periodo_baja" name="periodo_baja" size="8" value="<?=$fa['PeriodoBaja'];?>" style="text-align:center" disabled/></td>
</tr>
<tr>
  <td class="tagForm">N&uacute;mero Asientos:</td>
  <td><input type="text" name="nro_asientos" id="nro_asientos" size="5" value="<?=$fa['NumeroAsiento'];?>" style="text-align:right" <?=$activado;?>/></td>
  <td colspan="2"></td>
  <td class="tagForm">Voucher de Baja:</td>
  <td><input type="text" id="voucher_baja" name="voucher_baja" size="8" value="<?=$fa['VoucherBaja'];?>" style="text-align:right" disabled/></td>
</tr>

<tr>
  <td class="tagForm"></td>
  <td></td>
  <td colspan="2"></td>
  <td class="tagForm">Voucher Baja Pub20:</td>
  <td><input type="text" id="voucher_bajapub20" name="voucher_bajapub20" size="8" value="<?=$fa['VoucherBajaPub20'];?>" style="text-align:right" disabled/></td>
</tr>

<tr>
  <td class="tagForm"><u>Informaci&oacute;n Adicional</u></td>
  <td></td>
  <td colspan="2" align="left"><u>Informaci&oacute;n para Inmuebles</u></td>
  <td colspan="2" align="left">
    <? 
	   if($fa['DepreEspecificaFlag']=='S'){?>
          <input type="checkbox" name="depre_especifica" id="depre_especifica" checked  <?=$chekeado;?>/>
	<? }else{?>
          <input type="checkbox" name="depre_especifica" id="depre_especifica" <?=$activado;?>/><? }?> Depreciaci&oacute;n Espec&iacute;fica</td>
</tr>
<tr>
  <td class="tagForm">Poliza de Seguro:</td>
  <td><select id="poliza_seguro" class="selectSma" <?=$activado;?>>
      <?
       $s_polseguro = "select * from af_polizaseguro";
	   $q_polseguro = mysql_query($s_polseguro) or die ($s_polseguro.mysql_error());
	   $r_polseguro = mysql_num_rows($q_polseguro);
	   
	   for($i=0; $i<$r_polseguro; $i++){
		 $f_polseguro = mysql_fetch_array($q_polseguro);
		 if($f_polseguro['CodPolizaSeguro']==$fa['PolizaSeguro']) 
		    echo"<option value='".$f_polseguro['CodPolizaSeguro']."' selected>".$f_polseguro['DescripcionLocal']."</option>";
		 else
		    echo"<option value='".$f_polseguro['CodPolizaSeguro']."'>".$f_polseguro['DescripcionLocal']."</option>";
	   }
	  ?>
      </select></td>
  <td class="tagForm">C&oacute;digo Catastro:</td>
  <td><select id="cod_catastro" name="cod_catastro" class="selectSma" onchange="valorTerreno(this.form, this.id);" <?=$activado;?>>
  <?
       $s_catastro = "select * from af_catastro";
	   $q_catastro = mysql_query($s_catastro) or die ($s_catastro.mysql_error());
	   $r_catastro = mysql_num_rows($q_catastro);
	   
	   for($i=0; $i<$r_catastro; $i++){
	      $f_catastro = mysql_fetch_array($q_catastro);
		  if($f_catastro['CodCatastro']==$fa['CodigoCatastro'])
		     echo"<option value='".$f_catastro['CodCatastro']."' selected>".$f_catastro['Descripcion']."</option>";
		  else
		     echo"<option value='".$f_catastro['CodCatastro']."'>".$f_catastro['Descripcion']."</option>";
	   }
	  ?>
  </select></td>
  <td colspan="2" align="left"></td>
</tr>
<tr>
  <td class="tagForm">N&uacute;mero Unidades:</td>
  <td><input type="text" id="nro_unidades" name="nro_unidades" size="5" value="<?=$fa['NumeroUnidades'];?>" style="text-align:right" <?=$activado;?>/></td>
  <td class="tagForm">&Aacute;rea Terreno(m2)</td><? $montoCatastro = number_format($fa['MontoCatastro'],2,',','.');?>
  <td><input type="text" name="area_terreno" id="area_terreno" size="10" style="text-align:right" value="<?=$fa['AreaFisicaCatastro'];?>" <?=$activado;?>/><input type="text" name="area_terreno2" id="area_terreno2" size="20" style="text-align:right" value="<?=$montoCatastro;?>" <?=$activado;?>/></td>
</tr>

<tr>
  <td class="tagForm">Unidad de Medida:</td>
  <td><select id="unidad_medida" name="unidad_medida" class="selectMed" <?=$activado;?>>
      <?
       $sunidad = "select * from mastunidades";
	   $qunidad = mysql_query($sunidad) or die ($sunidad.mysql_error()); $runidad = mysql_num_rows($qunidad);
       for($i=0; $i<$runidad;$i++){
	    $funidad = mysql_fetch_array($qunidad);
	    if($funidad['CodUnidad']==$fa['UnidadMedida'])
		  echo"<option value='".$funidad['CodUnidad']."' selected>".$funidad['Descripcion']."</option>";
		  else echo"<option value='".$funidad['CodUnidad']."' selected>".$funidad['Descripcion']."</option>";
	   }
	  ?>
      </select></td>
  <td colspan="2">
    <? if($fa['GenerarVoucherIngresoFlag']=='S'){?>
      <input type="checkbox" name="gen_voucher" id="gen_voucher" checked <?=$chekeado;?>/><? 
	  }else{?>
      <input type="checkbox" name="gen_voucher" id="gen_voucher" <?=$activado;?>/><? }?>Generar Voucher de Ingreso del Activo</td>
</tr>

<tr>
 <td height="5"></td>
</tr>

<tr>
  <td align="left" colspan="2"><u>Informaci&oacute;n Documentaria</u></td>
  <td class="tagForm"></td>
  <td class="tagForm"><u>Informaci&oacute;n Monetaria</u></td>
</tr>

<tr>
  <td class="tagForm">Proveedor:</td>
     <?
	 $s_proveedor = "select 
							p.CodProveedor as codProveedor,
							mp.NomCompleto as NombProveedor
					   from 
							mastproveedores p
							inner join mastpersonas mp on (p.CodProveedor = mp.CodPersona)
					   where
							p.CodProveedor = '".$fa['CodProveedor']."'";
	 $q_proveedor = mysql_query($s_proveedor) or die ($s_proveedor.mysql_error());
	 $f_proveedor = mysql_fetch_array($q_proveedor);
	 ?>
  <td colspan="2" class="gallery clearfix">
      <input type="text" id="proveedor" name="proveedor" size="8" value="<?=$f_proveedor['codProveedor'];?>" disabled/> 
      <input type="text" id="nomb_proveedor" name="nomb_proveedor" size="50" value="<?=$f_proveedor['NombProveedor'];?>" disabled/>
      <input type="hidden" id="btProveedor" name="btProveedor" value="..." onclick="cargarVentanaLista(this.form, 'af_listaproveedor.php?limit=0&campo=1','height=500, width=800, left=200,top=100,resizable=yes');" disabled/>
  <a href="af_listaproveedor.php?filtrar=default&limit=0&campo=1&iframe=true&width=70%&height=100%" rel="prettyPhoto[iframe8]">
            	<img src="../imagenes/f_boton.png" width="20" title="Seleccionar" align="absbottom" style="cursor:pointer;visibility:<?=$visible;?>"/>
            </a>
  </td>
  <td class="tagForm">Monto Local:</td>
  <? $monto_local = number_format($fa['MontoLocal'],2,',','.');?>
<td><input type="text" id="monto_local" name="monto_local" value="<?=$monto_local;?>" style="text-align:right" <?=$activado;?>/>Bs.F</td>
</tr>

<tr>
  <td class="tagForm">Obligaci&oacute;n:</td>
  <td colspan="2"><select id="obligacionTipoDocumento" name="obligacionTipoDocumento" style="width:130px;" <?=$activado;?>>
                  <option value=""></option>
                  <?
                  $s_facnumerodoc = "select * from ap_tipodocumento";
				  $q_facnumerodoc = mysql_query($s_facnumerodoc) or die ($s_facnumerodoc.mysql_error());
				  
				  while($f_facnumerodoc = mysql_fetch_array($q_facnumerodoc)){
					if($f_facnumerodoc['CodTipoDocumento']==$fa['FacturaTipoDocumento']){  
				    echo"<option value='".$f_facnumerodoc['CodTipoDocumento']."' selected>".$f_facnumerodoc['Descripcion']."</option>";
					}else{
				    echo"<option value='".$f_facnumerodoc['CodTipoDocumento']."'>".$f_facnumerodoc['Descripcion']."</option>";
					}
				  }
				  ?>
                  </select> <input type="text" id="numObligacion" name="numObligacion" size="20" value="<?=$fa['FacturaNumeroDocumento'];?>" style="text-align:right" <?=$activado;?>/>
				  <? 
				     if($fa['FechaObligacion']!="" and $fa['FechaObligacion']!="0000-00-00"){ 
					    list($a,$b,$c)= split('[-]',$fa['FechaObligacion']); 
						$obligacionfdoc = $c.'-'.$b.'-'.$a; 
					  }
				  ?><input type="text" id="fechaObligacion" name="fechaObligacion" size="8" value="<?=$obligacionfdoc;?>"  <?=$activado;?>/></td>
  <td class="tagForm">Voucher Ingreso:</td>
  <td><input type="text" name="voucher_ingreso" id="voucher_ingreso" value="<?=$fa['VoucherIngreso'];?>"  <?=$activado;?>/></td>
</tr>

<tr>
  <td class="tagForm">Nro. Factura:</td>
   <? 
     if($fa['FacturaFecha']!="" and $fa['FacturaFecha']!="0000-00-00"){
		 list($a,$m,$d)= split('[-]',$fa['FacturaFecha']); 
		 $factura_fecha = $d.'-'.$m.'-'.$a;
	 }
   ?>
   <td><input type="text" id="nrofactura" name="nrofactura" size="25" value="<?=$fa['NroFactura'];?>" style="text-align:right" <?=$activado;?>/>
       <input type="text" id="factura_fecha" name="factura_fecha" size="8" value="<?=$factura_fecha;?>" <?=$activado;?>/></td>
 <td></td>
  <td class="tagForm">Voucher Ingreso Pub20:</td>
  <td><input type="text" name="voucherPub20" id="voucherPub20" value="<?=$fa['VoucherIngPub20'];?>" style="text-align:right" disabled/></td>
</tr>

<tr>
  <td class="tagForm">Orden Compra:</td>
  <? 
     if($fa['NumeroOrdenFecha']!="" and $fa['NumeroOrdenFecha']!="0000-00-00"){
	   list($a,$m,$d)= split('[-]',$fa['NumeroOrdenFecha']); 
       $fechaOrdenCompra = $d.'-'.$m.'-'.$a;
     }
  ?>
  <td><input type="text" id="orden_compra" name="orden_compra" size="25" value="<?=$fa['NumeroOrden']?>" style="text-align:right;"  <?=$activado;?>/> <input type="text" id="fecha_ordencompra" name="fecha_ordencompra" size="8" value="<?=$fechaOrdenCompra;?>"  <?=$activado;?>/></td>
  <td></td>
  <td class="tagForm">Valor Mercado:</td><? $montoMercado = number_format($fa['MontoMercado'],2,',','.');?>
  <td><input type="text" name="valor_mercado" id="valor_mercado" style="text-align:right" value="<?=$montoMercado;?>"  <?=$activado;?>/></td>
</tr>

<tr>
   <td class="tagForm">Gu&iacute;a Remisi&oacute;n #:</td>
   <? 
      if($fa['NumeroGuiaFecha']!="" and $fa['NumeroGuiaFecha']!="0000-00-00"){ 
	     list($a,$m,$d)= split('[-]',$fa['NumeroGuiaFecha']); $fechaGuiaRemision = $d.'-'.$m.'-'.$a;
	  }
   ?>
   <td><input type="text" id="nro_guiaremision" name="nro_guiaremision" size="25" value="<?=$fa['NumeroGuia'];?>" style="text-align:right;"  <?=$activado;?>/> 
       <input type="text" id="fecha_guiaremision" name="fecha_guiaremision" size="8" value="<?=$fechaGuiaRemision;?>"  <?=$activado;?>/></td>
   <td></td>
   <td class="tagForm">Monto Referencial:</td><? $montoReferencia = number_format($fa['MontoReferencia'],2,',','.');?>
   <td><input type="text" name="monto_referencial" id="monto_referencial" value="<?=$montoReferencia;?>" style="text-align:right" <?=$activado;?>/></td>
</tr>

<tr>
   <td class="tagForm">Docum. Almacen:</td>
   <? if($fa['DocAlmacenFecha']!="" and $fa['DocAlmacenFecha']!="0000-00-00"){
	     list($a,$m,$d)=split('[-]',$fa['DocAlmacenFecha']);$fechaAlmacen = $d.'-'.$m.'-'.$a;
	  }
   ?>
   <td><input type="text" id="nro_documalmacen" name="nro_documalmacen" size="25" value="<?=$fa['NumeroDocAlmacen'];?>" style="text-align:right" <?=$activado;?>/>
       <input type="text" id="fecha_documalmacen" name="fecha_documalmacen" size="8" value="<?=$fechaAlmacen;?>" <?=$activado;?>/></td>
   <td></td>
</tr>

<tr>
   <td colspan="2" align="left"><u>Informaci&oacute;n Inventario F&iacute;sico</u></td>
</tr>

<tr>
   <td class="tagForm">Fecha Inventario:</td>
   <td><input type="text" name="fecha_inventario" id="fecha_inventario" size="8" value="<?=$fecha_ingreso;?>" <?=$activado;?>/></td>
   <td class="tagForm">Observaciones</td>
   <td colspan="3"><textarea name="observacion" id="observacion" rows="2" cols="80" <?=$activado;?>><?=$fa['DescpCorta'];?></textarea></td>
</tr>

</table>
</div>
<!-- ****************************************************** COMIENZO TAB3 ************************************************ -->
<div id="tab3" style="display: none;">
<div style="width:900px; height=15px;" class="divFormCaption">Informaci&oacute;n Contable</div>
<? 
 $s_hc = "select *  from af_activohistoricontable where CodActivo='".$fa['Activo']."'";
 $q_hc = mysql_query($s_hc) or die ($s_hc.mysql_error());
 $r_hc = mysql_num_rows($q_hc);
 if($r_hc!=0)$f_hc=mysql_fetch_array($q_hc);
?>
<table id="principal" name="principal" width="900" align="center" class="tblForm">
<table id="tabla01" name="table01" width="900" class="tblForm">
<tr>
 <td><input type="button" id="btCatDeprec" name="btCatDeprec" value="Ver Deprec. por Categor&iacute;a" onclick="cargarOpcionVerCategoriaAprobarActivo(this.form,'af_listactivosvercategoria.php','height=600, width=920, left=250, top=50, resizable=no');"/></td>
 <td align="left"><b>Contabilidad</b> <select id="contabilidad" name="contabilidad" <?=$activado;?>>
     <option value=""></option>
     <?
      $s_balance = "select * from ac_contabilidades";
	  $q_balance = mysql_query($s_balance) or die ($s_balance.mysql_error());
	  while($f_balance=mysql_fetch_array($q_balance)){
		if($f_balance['CodContabilidad']==$f_hc['CodContabilidad']) 
		 echo"<option value='".$f_balance['CodContabilidad']."' selected>".$f_balance['Descripcion']."</option>";
		else 
		echo"<option value='".$f_balance['CodContabilidad']."'>".$f_balance['Descripcion']."</option>";
	  }
	 ?>
     
     </select></td>
 <td align="left"></td><? list($a, $m) = split('[-]',$f_hc['Periodo']); $periodoHC = $m.'-'.$a;?>
 <td>Per&iacute;odo <input type="text" id="Periodo" name="Periodo" size="6" value="<?=$periodoHC;?>" readonly/></td>
 <td></td>
 <td width="100"></td>
</tr>
<tr>
 <td><input type="button" id="btDetalles" name="btDetalles" value="Ver Detalles" onclick="cargarVentanaDetallesActivosAprobar(this.form,'af_listactivosagregarverdetallesinfcontable.php','height=600, width=1100, left=200, top=50, resizable=yes');"/></td>
 <td align="left"><b><u>Hist&oacute;rico</u></b></td>
 <td align="center"><b><u>Local</u></b></td>
 <td align="center"><b><u>Hist.Ajustado</u></b></td>
 <td align="center"><b><u>Loc.Ajustado</u></b></td>
</tr>
<tr>
 <td></td>
 <td align="left">Inicio de A&ntilde;o</td> <? $h_inicioAnoLocal = number_format($f_hc['LocalInicio'],2,',','.'); ?>
 <td align="center"><input type="text" id="h_inicioAnoLocal" name="h_inicioAnoLocal" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" onchange="cambioFormatoMonto();" disabled/></td>
 <td align="center"><input type="text" id="h_inicioAnoHistAjust" name="h_inicioAnoHistAjust" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_inicioAnoLocalAjust" name="h_inicioAnoLocalAjust" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">Acum. Mes Anterior</td>
 <td align="center"><input type="text" id="h_acumMesAntLocal" name="h_acumMesAntLocal" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_acumMesAntHistAjust" name="h_acumMesAntHistAjust" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_acumMesAntLocalAjust" name="h_acumMesAntLocalAjust" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">+ Ajustes Inflaci&oacute;n Mes</td>
 <td align="center"><input type="text" id="h_ajustInfMesLocal" name="h_ajustInfMesLocal" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_ajustInfMesHistAjust" name="h_ajustInfMesHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_ajustInfMesLocalAjust" name="h_ajustInfMesLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">+ Adiciones/-Retiros</td>
 <td align="center"><input type="text" id="h_adicRetLocal" name="h_adicRetLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_adicRetHistAjust" name="h_adicRetHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_adicRetLocalAjust" name="h_adicRetLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left"></td>
 <td align="center">---------------------</td>
 <td align="center">---------------------</td>
 <td align="center">---------------------</td>
</tr>
<tr>
 <td></td>
 <td align="left">Monto Inicio Mes</td>
 <td align="center"><input type="text" id="h_montoIniMesLocal" name="h_montoIniMesLocal" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_montoIniMesHistAjust" name="h_montoIniMesHistAjust" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="h_montoIniMesLocalAjust" name="h_montoIniMesLocalAjust" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left"><b><u>Depreciaci&oacute;n</u></b></td>
 <td align="center"></td>
 <td align="center"></td>
 <td align="center"></td>
</tr>
<tr>
 <td></td>
 <td align="left">Inicio de A&ntilde;o</td>
 <td align="center"><input type="text" id="d_iniAnoLocal" name="d_iniAnoLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_iniAnoHistAjust" name="d_iniAnoHistAjust" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_iniAnoLocalAjust" name="d_iniAnoLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">Acum. Mes Anterior</td>
 <td align="center"><input type="text" id="d_acumMesAntLocal" name="d_acumMesAntLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_acumMesAntHistAjust" name="d_acumMesAntHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_acumMesAntLocalAjust" name="d_acumMesAntLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">+ Ajust. Inflaci&oacute;n Mes</td>
 <td align="center"><input type="text" id="d_ajustInfMesLocal" name="d_ajustInfMesLocal" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_ajustInfMesHistAjust" name="d_ajustInfMesHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_ajustInfMesLocalAjust" name="d_ajustInfMesLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">[+/-] Ajustes</td>
 <td align="center"><input type="text" id="d_ajusteLocal" name="d_ajusteLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_ajusteHistAjust" name="d_ajusteHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_ajusteLocalAjust" name="d_ajusteLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">Depreciaci&oacute;n Mes</td>
 <td align="center"><input type="text" id="d_depreMesLocal" name="d_depreMesLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_depreMesHistAjust" name="d_depreMesHistAjust" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_depreMesLocalAjust" name="d_depreMesLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left"></td>
 <td align="center">---------------------</td>
 <td align="center">---------------------</td>
 <td align="center">---------------------</td>
</tr>
<tr>
 <td></td>
 <td align="left">Deprec. Acumulada</td>
 <td align="center"><input type="text" id="d_depreAcumLocal" name="d_depreAcumLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_depreAcumHistAjust" name="d_depreAcumHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="d_depreAcumLocalAjustado" name="d_depreAcumLocalAjustado" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr><td height="5"></td></tr>
<tr>
 <td></td>
 <td align="left"><b><u>Informaci&oacute;n Adicional</u></b></td>
 <td align="center"></td>
 <td align="center"></td>
 <td align="center"></td>
</tr>
<tr>
 <td></td>
 <td align="left">Monto Neto</td>
 <td align="center"><input type="text" id="ia_montoNetoLocal" name="ia_montoNetoLocal" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_montoNetoHistAjust" name="ia_montoNetoHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_montoNetoLocalAjust" name="ia_montoNetoLocalAjust" value="<?=$h_inicioAnoLocal;?>" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">Depreciaci&oacute;n Anual</td>
 <td align="center"><input type="text" id="ia_depreAnualLocal" name="ia_depreAnualLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_depreAnualHistAjust" name="ia_depreAnualHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_depreAnualLocalAjust" name="ia_depreAnualLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">Adiciones/Retiros A&ntilde;o</td>
 <td align="center"><input type="text" id="ia_adiRetAnoLocal" name="ia_adiRetAnoLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_adiRetAnoHistAjust" name="ia_adiRetAnoHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_adiRetAnoLocalAjust" name="ia_adiRetAnoLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">Inflaci&oacute;n Anual Hist&oacute;rico</td>
 <td align="center"><input type="text" id="ia_infAnualHistLocal" name="ia_infAnualHistLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_infAnualHistAjust" name="ia_infAnualHistAjust" value="" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_infAnualHistLocalAjust" name="ia_infAnualHistLocalAjust" value="" style="text-align:right" disabled/></td>
</tr>
<tr>
 <td></td>
 <td align="left">Inflaci&oacute;n Anual Depreciaci&oacute;n</td>
 <td align="center"><input type="text" id="ia_infAnualDepreLocal" name="ia_infAnualDepreLocal" value="0,00" style="text-align:right" disabled/></td>
 <td align="center"><input type="text" id="ia_infAnualDepreHistAjust" name="ia_infAnualDepreHistAjust" value="R.E.I" style="text-align:center" disabled/></td>
 <td align="center"><input type="text" id="ia_infAnualDepreLocalAjust" name="ia_infAnualDepreLocalAjust" value="0,00" style="text-align:right" disabled/></td>
</tr>
<tr><td height="15"></td></tr>
</table>
</table>
</div>
<!-- ****************************************************** COMIENZO TAB4 ************************************************ -->
<div id="tab4" style="display:none;">
<div style="width:900px;height:15px;" class="divFormCaption">Caracter&iacute;sticas T&eacute;cnicas del Activo</div>
<!--<form name="frmdetalles" id="frmdetalles">-->
<input type="hidden" id="seldetalle" /><input type="hidden" id="seldetalle2" />
<input type="hidden" id="candetalle" /><input type="hidden" id="candetalle2" />

<table width="900" class="tblBotones">
 <tr>
    <td>Caracter&iacute;cas T&eacute;cnicas del Activo</td>
	<td align="right">
    	<input type="button" class="btLista" id="btInsertar" value="Insertar" onclick="insertarLineaCaracTecnicasActivo();" disabled/>
        <input name="btEliminar" type="button" class="btLista" id="btEliminar" value="Eliminar" onclick="quitarLinea(document.getElementById('seldetalle').value);" disabled/>
	</td>
 </tr>
</table>

<table align="center" cellpadding="0" cellspacing="0">
<tr>
   <td valign="top" style="height:100px; width:150px;">
   <table align="center" width="900"><tr><td align="center">
     <div style="overflow:scroll; height:150px; width:900px;">
     <table width="900" class="tblLista">
     <thead>
     <tr class="trListaHead">
        <th scope="col" width="10">#</th>
        <th scope="col" width="200">Caracter&iacute;stica T&eacute;cnica</th>
        <th scope="col" width="80">Cantidad</th>
        <th scope="col" width="200">Comentario</th>
        <th scope="col" width="200">Observaciones</th>
     </tr>
     </thead>
     <tbody id="listaDetalles">
     </tbody>
   </table>
   </div>
  </td>
</tr>
</table>
</td></tr></table>
<? /// ------------------------------------------------------- /// ?>
<table width="900" class="tblBotones">
 <tr>
	<td>Partes del Activo(Solo para Activos Compuestos)</td>
    <td align="right">
    	<input type="button" class="btLista" id="btInsertar" value="Insertar" onclick="insertarLineaCaracTecnicasActivo2();" disabled/>
        <input name="btEliminar" type="button" class="btLista" id="btEliminar" value="Eliminar" onclick="quitarLineaCompuestoActivos(document.getElementById('seldetalle2').value);" disabled/>
	</td>
 </tr>
</table>

<table align="center" cellpadding="0" cellspacing="0">
<tr>
   <td valign="top" style="height:100px; width:150px;">
   <table align="center" width="900"><tr><td align="center">
     <div style="overflow:scroll; height:150px; width:900px;">
     <table width="900" class="tblLista">
     <thead>
     <tr class="trListaHead">
        <th scope="col" width="10">#</th>
        <th scope="col" width="200">Tipo de Equipo</th>
        <th scope="col" width="200">Descripci&oacute;n</th>
        <th scope="col" width="200">Marca</th>
        <th scope="col" width="100">N&uacute;mero Serie</th>
        <th scope="col" width="200">Fecha Asignaci&oacute;n</th>
     </tr>
     </thead>
     <tbody id="listaDetalles2">
     </tbody>
   </table>
   </div>
  </td>
</tr>
</table>
</td></tr></table>
<!--</form>-->
</div>
<!-- ****************************************************** COMIENZO TAB5 ************************************************ -->
<div id="tab5" style="display: none;">
<div style="width:900px; height=15px;" class="divFormCaption">Voucher Ingreso</div>
<!--<form id="frmdetalles3" name="frmdetalles3">-->
<input type="hidden" id="seldetalle3" />
<input type="hidden" id="candetalle3" />
<table width="900" class="tblForm">
<? echo"<input type='hidden' id='inform' name='inform' value=''/>
        <input type='hidden' id='monto' name='monto' value='$monto'/>";

/// Consulto para verfificar si el activo tiene asignada transacción
$sql_a = "select * from af_activodistribcontable where Activo='".$fa['Activo']."'";	
$qry_a = mysql_query($sql_a) or die ($sql_a.mysql_error());	
$row_a = mysql_num_rows($qry_a);
if($row_a!=0)$field_a = mysql_fetch_array($qry_a);	

?>
<tr>
  <td class="tagForm">Tipo Transacci&oacute;n:</td>
  <td colspan="3">
  <select id="tipobaja" name="tipobaja" class="selectSma" <?=$activado;?> onchange="CargarInformacion(this.form, this.id, 'insertarDatos_1')">
  <?
       $st = "select * from af_tipotransaccion where FlagAltaBaja='A'";
       $qt = mysql_query($st) or die ($st.mysql_error());
       $rt = mysql_num_rows($qt);
       if($rt!=0) 
          for($i=0; $i<$rt; $i++){
            $ft= mysql_fetch_array($qt);
            if($ft['TipoTransaccion']==$field_a['TipoTransaccion'])echo" <option value='".$ft['TipoTransaccion']."' selected>".$ft['Descripcion']."</option>";	
            else echo" <option value='".$ft['TipoTransaccion']."'>".$ft['Descripcion']."</option>";	
          } 
     ?>
  </select></td>
</tr>
</table>
<table width="900" class="tblLista">
<tr>
  <td width="50" class="trListaColor"><font color="#FFFFFF">#</font></td>
  <td width="150" class="trListaColor"><font color="#FFFFFF">Cuenta</font></td>
  <td width="450" class="trListaColor"><font color="#FFFFFF">Descripci&oacute;n</font></td>
  <td width="60" class="trListaColor"><font color="#FFFFFF">Monto</font></td>
  <td width="50" class="trListaColor"><font color="#FFFFFF">Signo</font></td>
</tr>
<tr><td colspan="5">
 <div id="resultados" name="resultados" style="width:880px">
 <? 
 echo"<table width='890' border='0' align='center'>";
 
 $s = "select * from af_activodistribcontable where Activo='".$fa['Activo']."'"; 
 $q = mysql_query($s) or die ($s.mysql_error()); 
 $r = mysql_num_rows($q);

 if($r!=0) 
 	 for($i=0; $i<$r; $i++){
		 
		 $f = mysql_fetch_array($q);
		 
		 $sql = "select 
			  			a.* ,
			  			b.Descripcion as DescpContabilidad
		 			from 
		      			af_tipotranscuenta a 
			  			inner join ac_contabilidades b on (b.CodContabilidad=a.Contabilidad) 
		 			where 
		      			a.TipoTransaccion='".$f['TipoTransaccion']."' and 
						a.Contabilidad='".$f['Contabilidad']."' and 
						a.CuentaContable='".$f['CuentaContable']."'
					order by Contabilidad, Secuencia"; 
 		$qry = mysql_query($sql) or die ($sql.mysql_error());
 		$row = mysql_num_rows($qry);
  		$field = mysql_fetch_array($qry);
		
       if($field['SignoFlag']=='')$SignoFlag='+';else $SignoFlag='-';
           $monto = number_format($f['Monto'],2,',','.');
  
       if($field['Contabilidad']=='F')$tabla='ac_mastplancuenta20'; else $tabla='ac_mastplancuenta'; 
  
       	$sql_b = "select * from $tabla where CodCuenta='".$field['CuentaContable']."'";
  		$qry_b = mysql_query($sql_b) or die ($sql_b.mysql_error());
  		$row_b = mysql_num_rows($qry_b);
  		
		if($row_b!=0)$field_b=mysql_fetch_array($qry_b);
  
  		if($contabilidad!=$field['Contabilidad']){
  		echo"<tr >
         <td align='center' width='31' style='font-family:Lucida Grande, Verdana, Arial, Helvetica, sans-serif;font-size:10px;background-color:#C0C0C0;border-style:outset;'><b>".$field['Contabilidad']."</b></td>
		 <td align='center' width='117' style='font-family:Lucida Grande, Verdana, Arial, Helvetica, sans-serif;font-size:10px;background-color:#C0C0C0;border-style:outset;'><b>".$field['DescpContabilidad']."</b></td>
      </tr>";
  		$contabilidad =$field['Contabilidad'];
        }
  		echo"<tr>
    	<td width='31' align='right' style='font-family:Lucida Grande, Verdana, Arial, Helvetica, sans-serif;font-size:10px;'>".$field['Secuencia']."</td>
		<td width='211' style='font-family:Lucida Grande, Verdana, Arial, Helvetica, sans-serif;font-size:10px;'>".$field['CuentaContable']." <b>- ".$field_b['Descripcion']."</b></td>
		<td width='360' style='font-family:Lucida Grande, Verdana, Arial, Helvetica, sans-serif;font-size:10px;'>".$field['Descripcion']."</td>
		<td width='40' style='font-family:Lucida Grande, Verdana, Arial, Helvetica, sans-serif;font-size:10px;text-align:right;'>".$monto."</td>
		<td width='35' style='font-family:Lucida Grande, Verdana, Arial, Helvetica, sans-serif;font-size:10px;' align='center'>".$SignoFlag."</td>
  	</tr>";
 }

echo"</table>"; 
?>
 </div>
</td></tr>
</table>
</div>
<center><input type="submit" name="btAprobar" id="btAprobar" value="<?=$t_boton;?>"  <?=$bt_aprobar;?>/> 
		<input type="button" name="btCancelar" id="btCancelar" value="Cancelar" onclick="<?=$onclick;?>" style="visibility:<?=$bt_cerrar;?>"/>
        
</center>
</form>

<div style="width:850px" class="divMsj">Campos Obligatorios *</div>
</body>
</html>