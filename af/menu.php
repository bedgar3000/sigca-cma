<?php
include("../lib/fphp.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
		<!-- Deluxe Menu -->
    <script type="text/javascript">var dmWorkPath = "<?=$_PARAMETRO["PATHSIA"]?>rh/data.files/";</script>
    <script type="text/javascript" src="<?=$_PARAMETRO["PATHSIA"]?>rh/data.files/dmenu.js"></script>
    <!-- (c) 2007, by Deluxe-Menu.com -->
</head>
<body style="background:url(../imagenes/fondo_menu.jpg)">

<input type="hidden" name="menu" id="menu" value="<?=$_SESSION["PERMISOS_ACTUAL"]?>" />
<input type="hidden" name="admin" id="admin" value="<?=$_SESSION["ADMINISTRADOR_ACTUAL"]?>" />
<table width="100%">
	<tr>
    	<td>
         <script type="text/javascript">
			/*
               Deluxe Menu Data File
               Created by Deluxe Tuner v3.2
               http://deluxe-menu.com
            */
            // -- Deluxe Tuner Style Names
            var itemStylesNames=["Top Item",];
            var menuStylesNames=["Top Menu",];
            // -- End of Deluxe Tuner Style Names
            
            //--- Common
            var isHorizontal=1;
            var smColumns=1;
            var smOrientation=0;
            var dmRTL=0;
            var pressedItem=-2;
            var itemCursor="default";
            var itemTarget="_self";
            var statusString="link";
            var blankImage="<?=$_PARAMETRO["PATHSIA"]?>rh/data.files/blank.gif";
            var pathPrefix_img="";
            var pathPrefix_link="";
            
            //--- Dimensions
            var menuWidth="";
            var menuHeight="23px";
            var smWidth="";
            var smHeight="";
            
            //--- Positioning
            var absolutePos=0;
            var posX="10px";
            var posY="10px";
            var topDX=0;
            var topDY=1;
            var DX=-5;
            var DY=0;
            var subMenuAlign="center";
            var subMenuVAlign="top";
            
            //--- Font
            var fontStyle=["normal 10px Tahoma","normal 10px Tahoma"];
            var fontColor=["#FFFFFF","#F5FDF4"];
            var fontDecoration=["none","none"];
            var fontColorDisabled="#585858";
            
            //--- Appearance
            var menuBackColor="#000000";
            var menuBackImage="";
            var menuBackRepeat="repeat";
            var menuBorderColor="#727272";
            var menuBorderWidth=1;
            var menuBorderStyle="ridge";
            
            //--- Item Appearance
            var itemBackColor=["#000000","#8F0303"];
            var itemBackImage=["",""];
            var beforeItemImage=["",""];
            var afterItemImage=["",""];
            var beforeItemImageW="";
            var afterItemImageW="";
            var beforeItemImageH="";
            var afterItemImageH="";
            var itemBorderWidth=0;
            var itemBorderColor=["#FA1D1D","#DD0404"];
            var itemBorderStyle=["solid","groove"];
            var itemSpacing=2;
            var itemPadding="3px";
            var itemAlignTop="center";
            var itemAlign="left";
            
            //--- Icons
            var iconTopWidth=16;
            var iconTopHeight=16;
            var iconWidth=16;
            var iconHeight=16;
            var arrowWidth=7;
            var arrowHeight=7;
            var arrowImageMain=["<?=$_PARAMETRO["PATHSIA"]?>rh/data.files/arrv_white.gif",""];
            var arrowWidthSub=0;
            var arrowHeightSub=0;
            var arrowImageSub=["<?=$_PARAMETRO["PATHSIA"]?>rh/data.files/arr_white.gif",""];
            
            //--- Separators
            var separatorImage="";
            var separatorWidth="100%";
            var separatorHeight="3px";
            var separatorAlignment="left";
            var separatorVImage="";
            var separatorVWidth="3px";
            var separatorVHeight="100%";
            var separatorPadding="0px";
            
            //--- Floatable Menu
            var floatable=0;
            var floatIterations=6;
            var floatableX=1;
            var floatableY=1;
            var floatableDX=15;
            var floatableDY=15;
            
            //--- Movable Menu
            var movable=0;
            var moveWidth=12;
            var moveHeight=20;
            var moveColor="#DECA9A";
            var moveImage="";
            var moveCursor="move";
            var smMovable=0;
            var closeBtnW=15;
            var closeBtnH=15;
            var closeBtn="";
            
            //--- Transitional Effects & Filters
            var transparency="100";
            var transition=24;
            var transOptions="gradientSize=0.4, wipestyle=1, motion=forward";
            var transDuration=350;
            var transDuration2=200;
            var shadowLen=3;
            var shadowColor="#B1B1B1";
            var shadowTop=0;
            
            //--- CSS Support (CSS-based Menu)
            var cssStyle=0;
            var cssSubmenu="";
            var cssItem=["",""];
            var cssItemText=["",""];
            
            //--- Advanced
            var dmObjectsCheck=0;
            var saveNavigationPath=1;
            var showByClick=0;
            var noWrap=1;
            var smShowPause=200;
            var smHidePause=1000;
            var smSmartScroll=1;
            var topSmartScroll=0;
            var smHideOnClick=1;
            var dm_writeAll=1;
            var useIFRAME=0;
            var dmSearch=0;
            
            //--- AJAX-like Technology
            var dmAJAX=0;
            var dmAJAXCount=0;
            var ajaxReload=0;
            
            //--- Dynamic Menu
            var dynamic=0;
            
            //--- Keystrokes Support
            var keystrokes=0;
            var dm_focus=1;
            var dm_actKey=113;
            
            //--- Sound
            var onOverSnd="";
            var onClickSnd="";
            
            var itemStyles = [
                ["itemWidth=94px","itemHeight=21px","itemBackColor=transparent,transparent","itemBackImage=<?=$_PARAMETRO["PATHSIA"]?>rh/data.files/btn_black.gif,<?=$_PARAMETRO["PATHSIA"]?>rh/data.files/btn_black2.gif","itemBorderWidth=0","fontStyle='bold 10px Tahoma','bold 10px Tahoma'","fontColor=#FFFFFF,#FFFFFF"],
            ];
            var menuStyles = [
                ["menuBackColor=transparent","menuBorderWidth=0","itemSpacing=0","itemPadding=5px 6px 5px 6px","smOrientation=undefined"],
            ];
            
            var d = new Array();
            var admin=document.getElementById("admin").value;
            var opciones=document.getElementById("menu").value;
		
			opciones=opciones.split(";");
			for (i=0; i<opciones.length; i++) {
				var items=opciones[i].split(",");
				if (items[1]=="S") d[items[0]]=""; else d[items[0]]="_";
			}
    
var menuItems = [
["Activos", , , , , , "0", , , , , ],
  ["|Activos Menores","<?=$_PARAMETRO['PATHSIA']?>af/af_activosmenores.php?concepto=01-0001&limit=0&filtrar=DEFAULT",,,,d['01-0001'],,,,,,], 
  ["|Lista de Activos","<?=$_PARAMETRO['PATHSIA']?>af/af_listactivos.php?concepto=01-0002&limit=0&filtrar=DEFAULT", , , , d['01-0002'], , , , , , ],
  ["|Transferir Activos de Logística","<?=$_PARAMETRO['PATHSIA']?>af/af_transferiractivos.php?concepto=01-0005&limit=0&filtrar=DEFAULT", , , ,d['01-0003'] , , , , , , ],
  //["|Transacciones","<?=$_PARAMETRO['PATHSIA']?>af/af_transaccioneslista.php?concepto=01-0002&limit=0&filtrar=DEFAULT", , , ,d['01-0004'] , , , , , , ],
  
["Procesos", , , , , , "0", , , , , ],
 ["|Aprobaci&oacute;n de Alta de Activos","<?=$_PARAMETRO['PATHSIA']?>af/af_procaprobacionactalta.php?concepto=02-0001&limit=0&filtrar=DEFAULT",,,,d['02-0001'],,,,,,],
 ["|Baja de Activos", , , , , , , , , , , ],
  ["||Nueva Transacción","<?=$_PARAMETRO['PATHSIA']?>af/af_bajactivosnuevo.php?concepto=02-0002&limit=0&filtrar=DEFAULT&regresar=framemain",,,,d['02-0002'],,,,,,],
  ["||Listar Transacción","<?=$_PARAMETRO['PATHSIA']?>af/af_bajactivoslistar.php?concepto=02-0003&limit=0&filtrar=DEFAULT&regresar=framemain",,,,d['02-0003'],,,,,,],
  ["||Revisar Transacción","<?=$_PARAMETRO['PATHSIA']?>af/af_bajactivosrevisar.php?concepto=02-0004&limit=0&filtrar=DEFAULT&regresar=framemain",,,,d['02-0004'],,,,,,],
  ["||Aprobar Transacción","<?=$_PARAMETRO['PATHSIA']?>af/af_bajactivosaprobar.php?concepto=02-0005&limit=0&filtrar=DEFAULT&regresar=framemain",,,,d['02-0005'],,,,,,],
  ["||Generar Acta de Transacción","<?=$_PARAMETRO['PATHSIA']?>af/af_bajactivosgeneraracta.php?concepto=02-0010&limit=0&filtrar=DEFAULT&regresar=framemain",,,,d['02-0010'],,,,,,],

["|Movimientos de Activos", , , , , , , , , , , ],
  ["||Nuevo Movimiento","<?=$_PARAMETRO['PATHSIA']?>af/af_movimientoactivonuevo.php?concepto=02-0006&limit=0&filtrar=DEFAULT&regresar=framemain",,,,d['02-0006'],,,,,,],
  ["||Listar Movimiento","<?=$_PARAMETRO['PATHSIA']?>af/af_movimientoactivos.php?concepto=02-0007&limit=0&filtrar=DEFAULT",,,,d['02-0007'],,,,,,],
  ["||Revisar Movimiento","<?=$_PARAMETRO['PATHSIA']?>af/af_movimientorevisar.php?concepto=02-0008&limit=0&filtrar=DEFAULT",,,,d['02-0008'],,,,,,],
  ["||Aprobar Movimiento","<?=$_PARAMETRO['PATHSIA']?>af/af_aprobarmovimientoactivos.php?concepto=02-0009&limit=0&filtrar=DEFAULT",,,,d['02-0009'],,,,,,],

["|Acta Responsabilidad Uso","<?=$_PARAMETRO['PATHSIA']?>af/af_actaresponuso.php?concepto=02-0011&limit=0&filtrar=DEFAULT",,,,d['02-0011'] , , , , , , ],

["Consultas", , , , , , "0", , , , , ],
	["|Activos", "<?=$_PARAMETRO['PATHSIA']?>af/xxx.php?concepto=03-0001&limit=0&filtrar=DEFAULT",,,,d['03-0001'],,,,,,],
	["|Componentes", "<?=$_PARAMETRO['PATHSIA']?>af/xxx.php?concepto=03-0002&limit=0&filtrar=DEFAULT",,,,d['03-0002'],,,,,,],
	["|Características Técnicas", "<?=$_PARAMETRO['PATHSIA']?>af/xxx.php?concepto=03-0003&limit=0&filtrar=DEFAULT",,,,d['03-0003'],,,,,,],
						
["Reportes", , , , , , "0", , , , , ],

 ["|Activos", , , , , , , , , , , ],
   ["||Inventario a la Fecha", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpinventarioalafecha.php?concepto=04-0001&limit=0&filtrar=DEFAULT", , , ,d['04-0001'],,,,,,],
   ["||Inventario X Dependencia", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpinventarioxdependencia.php?concepto=04-0002&limit=0&filtrar=DEFAULT", , , ,d['04-0002'],,,,,,],
   ["||Inventario Activos Costo", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpinventarioactivoscosto.php?concepto=04-0003&limit=0&filtrar=DEFAULT", , , ,d['04-0003'],,,,,,],
   ["||Movimiento de Activos", "<?=$_PARAMETRO['PATHSIA']?>af/af_rptabmovimientoactivos.php?concepto=04-0004&limit=0&filtrar=DEFAULT", , , ,d['04-0004'],,,,,,],
   ["||Ingreso de Activos","<?=$_PARAMETRO['PATHSIA']?>af/af_rptabingresoactivos.php?concepto=04-0005&limit=0&filtrar=DEFAULT", , , , d['04-0005'], , , , , , , ],
   ["||Catálogo de Activos","<?=$_PARAMETRO['PATHSIA']?>af/af_rptabcatalogoactivos.php?concepto=04-0006&limit=0&filtrar=DEFAULT", , , , d['04-0006'], , , , , , , ],
   ["||Ingreso y Egreso de Activos","<?=$_PARAMETRO['PATHSIA']?>af/af_rptabingresoegresoactivos.php?concepto=04-0007&limit=0&filtrar=DEFAULT", , , ,d['04-0007'], , , , , , , ],
   ["||Activos x Empleado","<?=$_PARAMETRO['PATHSIA']?>af/af_rptabactivosxempleado.php?concepto=04-0008&limit=0&filtrar=DEFAULT", , , , d['04-0008'], , , , , , , ],
   ["||Inventario General","<?=$_PARAMETRO['PATHSIA']?>af/af_rpinventariogeneral.php?concepto=04-0009&limit=0&filtrar=DEFAULT", , , , d['04-0009'], , , , , , , ],
   ["||Inventario General Costo","<?=$_PARAMETRO['PATHSIA']?>af/af_rpinventarioactivoscostogen.php?concepto=04-0010&limit=0&filtrar=DEFAULT", , , , d['04-0010'],,,,,,],
   ["||Inventario X Usuario Responsable ","<?=$_PARAMETRO['PATHSIA']?>af/af_rpinventxdepusuarioresp.php?concepto=04-0011&limit=0&filtrar=DEFAULT", , , , d['04-0011'],,,,,,],
   						
  ["|Clasificaci&oacute;n20", , , , , , , , , , , ],
	["||Formulario BM-1", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpformulariobm_1.php?concepto=04-0011&limit=0$filtrar=DEFAULT", , , ,d['04-0011'],,,,,,],	
	["||Formulario BM-2", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpformulariobm_2.php?concepto=04-0012&limit=0$filtrar=DEFAULT", , , ,d['04-0012'],,,,,,],	
	//["||Formulario BM-3", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpformulariobm_3.php?concepto=04-0013&limit=0$filtrar=DEFAULT", , , , d['04-0013'] , , , , , , ],	

  ["|Actas", , , , , , , , , , , ],
    ["||Responsabilidad Uso", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpresponsabilidaduso.php?concepto=04-0014&limit=0$filtrar=DEFAULT",,,,d['04-0014'],,,,,,],
	["||Incorporación de Bienes", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpincorporacionbienes.php?concepto=04-0015&limit=0$filtrar=DEFAULT", , , ,d['04-0015'] , , , , , , ],
	["||Entrega de Bienes", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpentregabienes.php?concepto=04-0016&limit=0$filtrar=DEFAULT", , , ,d['04-0016'],,,,,,],
	["||Desincorporación de Bienes", "<?=$_PARAMETRO['PATHSIA']?>af/af_rpdesincorporacion.php?concepto=04-0017&limit=0$filtrar=DEFAULT", , , ,d['04-0017'],,,,,,],
    ["||Lista de Actas", "<?=$_PARAMETRO['PATHSIA']?>af/af_rplistadoactas.php?concepto=04-0018&limit=0$filtrar=DEFAULT",,,,d['04-0018'],,,,,,],
  					
["Otros", , , , , , "0", , , , , ],
	["|Agrupar/Consolidar Activos","<?=$_PARAMETRO['PATHSIA']?>af/af_agruparconsolidaract.php?concepto=05-0001&limit=0&filtrar=DEFAULT", , , ,d['05-0001'],,,,,,],
	["|Impuestos de Activos", "<?=$_PARAMETRO['PATHSIA']?>af/xxx.php?concepto=05-0002&limit=0&filtrar=DEFAULT", , , ,d['05-0002'],,,,,,],
	["|Inventario Físico", "<?=$_PARAMETRO['PATHSIA']?>af/xxx.php?concepto=05-0003&limit=0&filtrar=DEFAULT", , , ,d['05-0003'],,,,,,],
											
["Maestros", , , , , , "0", , , , , ],
["|Del Sistema SIA", , , , , , , , , , , ],
  ["||Propios del Sistema", , , , , , , , , , , ],
	["|||Aplicaciones","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=aplicaciones_lista&filtrar=default&concepto=06-0001", , , ,d['06-0001'],,,,,,],
	["|||Par&aacute;metros","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parametros_lista&filtrar=default&concepto=06-0002", , , ,d['06-0002'],,,,,,],
  ["||Relacionados a Personas", , , , , , , , , , , ],
	["|||Personas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=personas_lista&filtrar=default&concepto=06-0003", , , ,d['06-0003'],,,,,,],
	["|||Organismos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=organismos_lista&filtrar=default&concepto=06-0004", , , ,d['06-0004'],,,,,,],
	["|||Dependencias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=dependencias_lista&filtrar=default&concepto=06-0005", , , ,d['06-0005'],,,,,,],
  ["||Relacionados a Contabilidad", , , , , , , , , , , ],
	["|||Plan de Cuentas","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_lista&filtrar=default&concepto=06-0006", , , ,d['06-0006'],,,,,,],
	["|||Grupos de Centros de Costos","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=grupo_centro_costos_lista&filtrar=default&concepto=06-0007", , , ,d['06-0007'],,,,,,],
	["|||Centros de Costos","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=centro_costos_lista&filtrar=default&concepto=06-0008", , , ,d['06-0008'],,,,,,],
  ["||Relacionados a Presupuesto", , , , , , , , , , , ],
	["|||Tipos de Cuenta", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipo_cuenta_lista&filtrar=default&concepto=06-0009", , , ,d['06-0009'], , , , , , ],
	["|||Clasificador Presupuestario","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=clasificador_presupuestario_lista&filtrar=default&concepto=06-0010", , , ,d['06-0010'],,,,,,],
  ["||Otros Maestros", , , , , , , , , , , ],
	["|||Paises", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=paises_lista&filtrar=default&concepto=06-0011", , , , d['06-0011'],,,,,,],
	["|||Estados", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=estados_lista&filtrar=default&concepto=06-0012", , , , d['06-0012'],,,,,,],
	["|||Municipios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=municipios_lista&filtrar=default&concepto=06-0013", , , , d['06-0013'],,,,,,],
	["|||Ciudades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=ciudades_lista&filtrar=default&concepto=06-0014", , , , d['06-0014'],,,,,,],
	["|||Tipos de Pago","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipos_pago_lista&filtrar=default&concepto=06-0015", , , ,d['06-0015'],,,,,,],
	["|||Bancos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=bancos_lista&filtrar=default&concepto=06-0016", , , , d['06-0016'],,,,,,],

["|Del Activo", , , , , , , , , , , ],
  ["||Clasificación de Activos","<?=$_PARAMETRO["PATHSIA"]?>af/af_clasificacion_activos.php?limit=0&filtrar=DEFAULT&concepto=06-0017", , , ,d['06-0017'],,,,,,],
  ["||Clasificación de Activos Pub. 20","<?=$_PARAMETRO["PATHSIA"]?>af/af_clasificacion_activos_20.php?limit=0&filtrar=DEFAULT&concepto=06-0018", , , , d['06-0018'],,,,,,],
  ["||Característica T&eacute;cnica","<?=$_PARAMETRO["PATHSIA"]?>af/af_caracteristicatecnica.php?limit=0&concepto=06-0019", , , ,d['06-0019'],,,,,,],
  ["||Componentes de un Equipo","<?=$_PARAMETRO["PATHSIA"]?>af/af_componentesequipo.php?limit=0&concepto=06-0020", , , , d['06-0020'],,,,,,],
  ["||Categoría de Depreciación","<?=$_PARAMETRO["PATHSIA"]?>af/af_categoriadepreciacion.php?limit=0&concepto=06-0021", , , ,d['06-0021'],,,,,,],
  ["||Situación del Activo","<?=$_PARAMETRO["PATHSIA"]?>af/af_situacion.php?limit=0&concepto=06-0022", , , ,d['06-0022'] , , , , , , ],
  ["||Tipo de Transacción","<?=$_PARAMETRO["PATHSIA"]?>af/af_transaccionestipotransaccion.php?concepto=06-0023", , , , d['06-0023'],,,,,,],
  ["||Tipo de Movimiento","<?=$_PARAMETRO["PATHSIA"]?>af/af_tipomovimientoactivo.php?limit=0&concepto=06-0024", , , ,d['06-0024'] , , , , , , ],
  ["||Ubicaciones del Activo", "<?=$_PARAMETRO["PATHSIA"]?>af/af_ubicaciones_activo.php?limit=0&filtrar=DEFAULT&concepto=06-0025", , , ,d['06-0025'] ,,,,,,],
["|Contabilidades", , , , , , , , , , , ],
  ["||Libro Contable", "<?=$_PARAMETRO["PATHSIA"]?>af/af_librocontable.php?limit=0&filtrar=DEFAULT&concepto=06-0026", , , ,d['06-0026'],,,,,,],
  ["||Contabilidades", "<?=$_PARAMETRO["PATHSIA"]?>af/af_contabilidades.php?limit=0&filtrar=DEFAULT&concepto=06-0027", , , , d['06-0027'],,,,,,],
["|C&oacute;digos Internos", , , , , , , , , , , ],
  ["||Tipo de Seguro", "<?=$_PARAMETRO["PATHSIA"]?>af/af_tseguros.php?lconcepto=06-0028", , , ,d['06-0028'] , , , , , , ],
  ["||Tipo de Vehículos", "<?=$_PARAMETRO["PATHSIA"]?>af/af_tvehiculos.php?limit=0&concepto=06-0029", , , ,d['06-0029'] , , , , , , ],
["|Otros", , , , , , , , , , , ],
  ["||Miscel&aacute;neos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=miscelaneos_lista&filtrar=default&concepto=06-0030", , , , d['06-0030'], , , , , , ],
  ["||Póliza de Seguros", "<?=$_PARAMETRO["PATHSIA"]?>af/af_pseguros.php?concepto=06-0031", , , , d['06-0031'], , , , , , ],
  ["||Catastro", "<?=$_PARAMETRO["PATHSIA"]?>af/af_catastro.php?limit=0&concepto=06-0032&filtrar=DEFAULT", , , , d['06-0032'], , , , , , ],
						
["Admin.", , , , , , "0", , , , , ],
 ["|Seguridad", , , , , , , , , , , ],
  ["||Maesto de Usuarios","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=usuarios&filtrar=default&concepto=07-0001", , , ,d['07-0001'], , , , , , ],
  ["||Dar Autorizaciones a Usuarios","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=autorizaciones&filtrar=default&concepto=07-0002", , , ,d['07-0002'], , , , , , ],
["|Seguridad Alterna", , , , , , , , , , , ],
  ["||Dar Autorizaciones a Usuarios","<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=alterna&filtrar=default&concepto=07-0003", , , ,d['07-0003'], , , , , , ],
["|Generación de Voucher", , , , , , , , , , , ],
  ["||Publicación 20", , , , , , , , , , , ],
    ["|||Nuevo", "<?=$_PARAMETRO["PATHSIA"]?>af/af_genvouchernuevoactivo.php?limit=0&concepto=07-0004", , , , , , , , , ,],
	["|||Transacción de Baja","<?=$_PARAMETRO["PATHSIA"]?>af/af_genvouchertransaccionactivo.php?cont=F&limit=0&concepto=07-0005", , , , , , , , , , ],
  ["||Contabilidad Onco", , , , , , , , , , , ],
    ["|||Nuevo", "<?=$_PARAMETRO["PATHSIA"]?>af/af_genvouchernuevoactivo.php?limit=0&concepto=07-0006", , , , , , , , , ,],
	["|||Transacción de Baja","<?=$_PARAMETRO["PATHSIA"]?>af/af_genvouchertransaccionactivo.php?cont=T&limit=0&concepto=07-0007", , , , , , , , , , ],	
  //["||Nuevos Activos", "<?=$_PARAMETRO["PATHSIA"]?>af/af_genvouchernuevoactivo.php?limit=0&concepto=07-0004", , , , , , , , , , ],
  //["||Ajustes por Inflación", "<?=$_PARAMETRO["PATHSIA"]?>af/af_genvoucherajusteinflacion.php?limit=0&concepto=07-0005", , , , , , , , , , ],
  //["||Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>af/af_genvouchertransacciones.php?limit=0&concepto=07-0006", , , , , , , , , , ],
  ];	
		dm_initFrame("frmSet", 0, 1, 0);
	 </script>
	</td>
</tr>
</table>
</body>
</html>