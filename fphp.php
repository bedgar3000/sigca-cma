<?php
include("lib/fphp.php");
//	----------------------
if ($accion=="VALIDAR") {
	$_SESSION["MAXLIMIT"] = 100;
	if ($Usuario == $_SESSION["SUPER_USUARIO"] && $Clave == $_SESSION["SUPER_USUARIO_CLAVE"]) {
		$_SESSION["APLICACION_ACTUAL"]=strtoupper($modulo);
		$_SESSION["MODULO"] = $modulo;
		$_SESSION["USUARIO_ACTUAL"]=$_SESSION["SUPER_USUARIO"];
		$_SESSION["CODEMPLEADO_ACTUAL"]=$_SESSION["SUPER_USUARIO"];
		$_SESSION["CODPERSONA_ACTUAL"]=$_SESSION["SUPER_USUARIO"];
		$_SESSION["NOMBRE_USUARIO_ACTUAL"]=$_SESSION["SUPER_USUARIO"];
		$_SESSION["ORGANISMO_ACTUAL"]=$CodOrganismo;
		$_SESSION["NOMBRE_ORGANISMO_ACTUAL"]="";
		$_SESSION["RIF_ORGANISMO_ACTUAL"]="";
		$_SESSION["DEPENDENCIA_ACTUAL"]="";
		$_SESSION["NOMBRE_DEPENDENCIA_ACTUAL"]="";
		$_SESSION["CCOSTO_ACTUAL"]="";
		$_SESSION["NOMBRE_CCOSTO_ACTUAL"]="";
		$_SESSION["FILTRO_ORGANISMO_ACTUAL"]=$CodOrganismo;
		$_SESSION["NOMINA_ACTUAL"]="";
		$_SESSION["NOMBRE_NOMINA_ACTUAL"]="";
		$_SESSION["ADMINISTRADOR_ACTUAL"]="S";
		$_SESSION["PERMISOS_ACTUAL"]="S";
		$_SESSION["NRO_ORGANISMOS"]=0;
		$_SESSION["PRIMERA_VEZ"]=true;
		die("|");
	} else {
		$CodAplicacion = strtoupper($modulo);
		$sql = "SELECT
					u.*,
					p.CodPersona,
					p.NomCompleto,
					p.Foto,
					e.CodOrganismo,
					e.CodEmpleado,
					o.Organismo,
					e.CodOrganismo,
					d.CodDependencia,
					d.Dependencia,
					d.FlagControlFiscal,
					e.CodTipoNom,
					e.CodCentroCosto,
					tn.Nomina,
					cc.Abreviatura AS NomCentroCosto,
					o.DocFiscal,
					(SELECT CodSistemaFuente FROM mastaplicaciones WHERE CodAplicacion = '".$CodAplicacion."') AS SistemaFuente
				FROM
					usuarios u
					INNER JOIN mastpersonas p ON (u.CodPersona = p.CodPersona)
					LEFT JOIN mastempleado e ON (u.CodPersona = e.CodPersona)
					LEFT JOIN mastorganismos o ON (e.CodOrganismo = o.CodOrganismo)
					LEFT JOIN mastdependencias d ON (e.CodDependencia = d.CodDependencia)
					LEFT JOIN tiponomina tn ON (e.CodTipoNom = tn.CodTipoNom)
					LEFT JOIN ac_mastcentrocosto cc ON (e.CodCentroCosto = cc.CodCentroCosto)
				WHERE
					u.Usuario = '".($Usuario)."' AND
					u.Clave = '".sha1($Clave)."'";
		$query=mysql_query($sql) or die ($sql.mysql_error());
		$rows=mysql_num_rows($query);
		if ($rows!=0) {
			$field = mysql_fetch_array($query); 
			if ($field['FechaExpirar'] <= $FechaActual && $field['FlagFechaExpirar'] == 'S') {
				die("|Contraseña Expirada");
			} else {
				$sql = "SELECT * FROM mastorganismos WHERE CodOrganismo = '$CodOrganismo'";
				$field_organismo = getRecord($sql);
				$_SESSION["APLICACION_ACTUAL"] = strtoupper($modulo);
				$_SESSION["MODULO"] = $modulo;
				if ($field['Estado'] != "A") die("Usuario Inactivo");
				$_SESSION["USUARIO_ACTUAL"]=$field['Usuario'];
				$_SESSION["CODEMPLEADO_ACTUAL"]=$field['CodEmpleado'];
				$_SESSION["CODPERSONA_ACTUAL"]=$field['CodPersona'];
				$_SESSION["NOMBRE_USUARIO_ACTUAL"]=$field['NomCompleto'];
				$_SESSION["ORGANISMO_ACTUAL"]=$CodOrganismo;
				$_SESSION["NOMBRE_ORGANISMO_ACTUAL"]=$field_organismo['Organismo'];
				$_SESSION["FILTRO_ORGANISMO_ACTUAL"]=$CodOrganismo;
				$_SESSION["RIF_ORGANISMO_ACTUAL"]=$field_organismo['DocFiscal'];
				$_SESSION["DEPENDENCIA_ACTUAL"]=$field['CodDependencia'];
				$_SESSION["NOMBRE_DEPENDENCIA_ACTUAL"]=$field['Dependencia'];
				$_SESSION["CONTROL_FISCAL_ACTUAL"]=$field['FlagControlFiscal'];
				$_SESSION["NOMINA_ACTUAL"]=$field['CodTipoNom'];
				$_SESSION["NOMBRE_NOMINA_ACTUAL"]=$field['Nomina'];
				$_SESSION["CCOSTO_ACTUAL"]=$field['CodCentroCosto'];
				$_SESSION["NOMBRE_CCOSTO_ACTUAL"]=$field['NomCentroCosto'];
				$_SESSION["SISTEMA_FUENTE"]=$field['SistemaFuente'];
				$_SESSION["FOTO"]=$field['Foto'];
				$_SESSION["PERMISOS_ACTUAL"]="";
				$_SESSION["ADMINISTRADOR_ACTUAL"]="S";
				$_SESSION["PERMISOS_ACTUAL"]="S";
				$_SESSION["NRO_ORGANISMOS"]=0;
				$_SESSION["FILTRO_ORGANISMO_ACTUAL"]=$CodOrganismo;
				$_SESSION["PRIMERA_VEZ"]=true;
				//	--------------------------------
				$sql = "SELECT CodDependencia FROM seguridad_alterna WHERE CodAplicacion = '".$_SESSION["APLICACION_ACTUAL"]."' AND Usuario = '".$_SESSION["USUARIO_ACTUAL"]."' AND CodOrganismo = '".$organismo."' AND CodDependencia = '".$_SESSION["DEPENDENCIA_ACTUAL"]."' AND FlagMostrar = 'S'";
				$query_dep=mysql_query($sql) or die ($sql.mysql_error());
				if (mysql_num_rows($query_dep) != 0) {
					$field_dep = mysql_fetch_array($query_dep);
					$_SESSION["FILTRO_DEPENDENCIA_ACTUAL"] = $field_dep['CodDependencia'];
				} else {
					$sql = "SELECT CodDependencia FROM seguridad_alterna WHERE CodAplicacion = '".$_SESSION["APLICACION_ACTUAL"]."' AND Usuario = '".$_SESSION["USUARIO_ACTUAL"]."' AND CodOrganismo = '".$organismo."' AND FlagMostrar = 'S'";
					$query_dep=mysql_query($sql) or die ($sql.mysql_error());
					if (mysql_num_rows($query_dep) != 0) $_SESSION["FILTRO_DEPENDENCIA_ACTUAL"] = $field_dep['CodDependencia'];
				}
				//	--------------------------------
				$sql = "SELECT Organismo FROM mastorganismos WHERE CodOrganismo = '".$_SESSION["FILTRO_ORGANISMO_ACTUAL"]."'";
				$query_org = mysql_query($sql) or die ($sql.mysql_error());
				if (mysql_num_rows($query_org) != 0) {
					$field_org = mysql_fetch_array($query_org);
					$_SESSION["FILTRO_NOMBRE_ORGANISMO_ACTUAL"] = $field_org['Organismo'];
				}
				//	--------------------------------
				$sql = "SELECT Dependencia, FlagControlFiscal FROM mastdependencias WHERE CodDependencia = '".$_SESSION["FILTRO_DEPENDENCIA_ACTUAL"]."'";
				$query_org = mysql_query($sql) or die ($sql.mysql_error());
				if (mysql_num_rows($query_org) != 0) {
					$field_org = mysql_fetch_array($query_org);
					$_SESSION["FILTRO_NOMBRE_DEPENDENCIA_ACTUAL"] = $field_org['Dependencia'];
					$_SESSION["CONTROL_FISCAL"] = $field_org['FlagControlFiscal'];
				}
				//	--------------------------------
				$sql="SELECT PeriodoContable FROM mastaplicaciones WHERE CodAplicacion='".$_SESSION["APLICACION_ACTUAL"]."'";
				$query_apli=mysql_query($sql) or die ($sql.mysql_error());
				$rows_apli=mysql_num_rows($query_apli);
				if ($rows_apli!=0) {
					$field_apli=mysql_fetch_array($query_apli);
					$_SESSION["PERIODO_CONTABLE_ACTUAL"]=$field_apli['PeriodoContable'];
				}
				//	--------------------------------
				$sql="SELECT FlagAdministrador FROM seguridad_autorizaciones WHERE Usuario='".$_SESSION["USUARIO_ACTUAL"]."' AND CodAplicacion='".$_SESSION["APLICACION_ACTUAL"]."' AND FlagAdministrador='S'";
				$query_admin=mysql_query($sql) or die ($sql.mysql_error());
				$rows_admin=mysql_num_rows($query_admin);
				if ($rows_admin!=0) {
					$_SESSION["ADMINISTRADOR_ACTUAL"]="S";
					$_SESSION["PERMISOS_ACTUAL"]="S";
					$_SESSION["NRO_ORGANISMOS"]=0;
				} else {
					$_SESSION["ADMINISTRADOR_ACTUAL"]="N";
					$_SESSION["PERMISOS_ACTUAL"]="";
					
					$sql = "SELECT * FROM seguridad_concepto WHERE CodAplicacion='".$_SESSION["APLICACION_ACTUAL"]."'";
					$query_conceptos = mysql_query($sql) or die ($sql.mysql_error());
					while ($field_conceptos = mysql_fetch_array($query_conceptos)) {
						$sql = "SELECT FlagMostrar 
								FROM seguridad_autorizaciones 
								WHERE 
									Usuario='".$_SESSION["USUARIO_ACTUAL"]."' AND 
									CodAplicacion='".$_SESSION["APLICACION_ACTUAL"]."' AND
									Grupo = '".$field_conceptos['Grupo']."' AND
									Concepto = '".$field_conceptos['Concepto']."'";
						$query_permisos = mysql_query($sql) or die ($sql.mysql_error());
						if (mysql_num_rows($query_permisos) != 0) {
							$field_permisos = mysql_fetch_array($query_permisos);
							$_SESSION["PERMISOS_ACTUAL"].=$field_conceptos['Concepto'].",".$field_permisos['FlagMostrar'].";";
						} else {
							$_SESSION["PERMISOS_ACTUAL"].=$field_conceptos['Concepto'].",N;";
						}
					}
					if ($_SESSION["PERMISOS_ACTUAL"] == "") $_SESSION["PERMISOS_ACTUAL"] = "N"; 
				}
				die("|");
			}
		}
		else die("Usuario o Clave incorrecta|");
	}
}
elseif ($accion=="ORGANISMOS") {
	$aplicacion=strtoupper($modulo);
	if ($usuario==$_SESSION["SUPER_USUARIO"]) {
		echo "<select name='organismo' id='organismo' style='width:250px;'>";
			loadSelect("mastorganismos", "CodOrganismo", "Organismo", "", 0);
		echo "</select>";
	} else {
		$sql="SELECT u.CodPersona, e.CodOrganismo, o.Organismo FROM usuarios u INNER JOIN mastempleado e ON (u.CodPersona=e.CodPersona) INNER JOIN mastorganismos o ON (e.CodOrganismo=o.CodOrganismo) WHERE u.Usuario='".$usuario."'";
		$query=mysql_query($sql) or die ($sql.mysql_error());
		$rows=mysql_num_rows($query);
		if ($rows!=0) $field=mysql_fetch_array($query);
		$organismo_usuario=$field['CodOrganismo'];
		//	----------------------
		$sql="SELECT sa.CodOrganismo, o.Organismo FROM seguridad_alterna sa INNER JOIN mastorganismos o ON (sa.CodOrganismo=o.CodOrganismo) WHERE sa.Usuario='".$usuario."'AND sa.CodAplicacion='".$aplicacion."' AND sa.FlagMostrar='S' GROUP BY sa.CodOrganismo ORDER BY sa.CodOrganismo";
		$query_permisos=mysql_query($sql) or die ($sql.mysql_error());
		$rows_permisos=mysql_num_rows($query_permisos);
		echo "
		<select name='organismo' id='organismo' style='width:250px;'>";
			if ($rows_permisos==0) echo "<option value=''></option>";
			while($field_permisos=mysql_fetch_array($query_permisos)) {
				if ($organismo_usuario==$field_permisos['CodOrganismo']) 
					echo "<option value='".$field_permisos['CodOrganismo']."' selected>".$field_permisos['Organismo']."</option>";
				else 
					echo "<option value='".$field_permisos['CodOrganismo']."'>".$field_permisos['Organismo']."</option>";
			}
		echo "</select>";
	}
}
elseif ($accion == "getOrganismos") {
	$CodAplicacion = strtoupper($modulo);
	if ($Usuario == $_SESSION["SUPER_USUARIO"]) {
		echo loadSelect("mastorganismos", "CodOrganismo", "Organismo", "", 0);
	} else {
		echo getOrganismos('', 3, $Usuario, $CodAplicacion);
	}
}
elseif($accion == "cambiarClave") {
	$FechaExpirar = obtenerFechaFin(formatFechaDMA($FechaActual), $_PARAMETRO['DIASEXPIRA']);
	$sql = "UPDATE usuarios
			SET
				Clave = '".sha1($ClaveNueva)."',
				FechaExpirar = '".formatFechaAMD($FechaExpirar)."'
			WHERE Usuario = '".$Usuario."'";
	execute($sql);
}
?>
