<?php
include("../../lib/fphp.php");
include("fphp.php");
//	$__archivo = fopen("_"."$modulo-$accion-".$AnioActual.$MesActual.$DiaActual."_".$HorasActual.$MinutosActual.$SegundosActual.".sql", "w+");
//	$__archivo = fopen("_"."$modulo-$accion".".sql", "w+");
///////////////////////////////////////////////////////////////////////////////
//	PARA AJAX
///////////////////////////////////////////////////////////////////////////////
//	maestro de personas
if ($modulo == "personas") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	verifico si cedula existe
		if (valorExiste("mastpersonas", "Ndocumento", $Ndocumento)) die("Cédula se encuentra registrada");
		
		//	verifico si documento existe
		if (valorExiste("mastpersonas", "DocFiscal", $DocFiscal)) die("Documento Fiscal se encuentra registrado");
		
		//	genero correlativo para la persona
		$CodPersona = getCodigo("mastpersonas", "CodPersona", 6);
		
		//	inserto persona
		$sql = "INSERT INTO mastpersonas (
							CodPersona,
							Apellido1,
							Apellido2,
							Nombres,
							Busqueda,
							NomCompleto,
							EstadoCivil,
							Sexo,
							Fnacimiento,
							CiudadNacimiento,
							Direccion,
							Telefono1,
							Telefono2,
							CiudadDomicilio,
							Fax,
							Lnacimiento,
							NomEmerg1,
							DirecEmerg1,
							DocFiscal,
							TipoPersona,
							Estado,
							Ndocumento,
							EsCliente,
							EsProveedor,
							EsEmpleado,
							EsOtros,
							TipoDocumento,
							Email,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodPersona."',
							'".$Apellido1."',
							'".$Apellido2."',
							'".$Nombres."',
							'".$Busqueda."',
							'".$NomCompleto."',
							'".$EstadoCivil."',
							'".$Sexo."',
							'".formatFechaAMD($Fnacimiento)."',
							'".$CodCiudad."',
							'".$Direccion."',
							'".$Telefono1."',
							'".$Telefono2."',
							'".$CodCiudad."',
							'".$Fax."',
							'".$Lnacimiento."',
							'".$NomEmerg1."',
							'".$DirecEmerg1."',
							'".$DocFiscal."',
							'".$TipoPersona."',
							'".$Estado."',
							'".$Ndocumento."',
							'".$EsCliente."',
							'".$EsProveedor."',
							'".$EsEmpleado."',
							'".$EsOtros."',
							'".$TipoDocumento."',
							'".$Email."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
		
		echo "|$CodPersona";
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	verifico si cedula existe
		if (valorExisteUp("mastpersonas", "Ndocumento", $Ndocumento, "CodPersona", $CodPersona)) die("Cédula se encuentra registrada");
		
		//	verifico si documento existe
		if (valorExisteUp("mastpersonas", "DocFiscal", $DocFiscal, "CodPersona", $CodPersona)) die("Documento Fiscal se encuentra registrado");
		
		//	modifico persona
		$sql = "UPDATE mastpersonas
				SET
					Apellido1 = '".$Apellido1."',
					Apellido2 = '".$Apellido2."',
					Nombres = '".$Nombres."',
					Busqueda = '".$Busqueda."',
					NomCompleto = '".$NomCompleto."',
					EstadoCivil = '".$EstadoCivil."',
					Sexo = '".$Sexo."',
					Fnacimiento = '".formatFechaAMD($Fnacimiento)."',
					CiudadNacimiento = '".$CodCiudad."',
					Direccion = '".$Direccion."',
					Telefono1 = '".$Telefono1."',
					Telefono2 = '".$Telefono2."',
					CiudadDomicilio = '".$CodCiudad."',
					Fax = '".$Fax."',
					Lnacimiento = '".$Lnacimiento."',
					NomEmerg1 = '".$NomEmerg1."',
					DirecEmerg1 = '".$DirecEmerg1."',
					DocFiscal = '".$DocFiscal."',
					TipoPersona = '".$TipoPersona."',
					Estado = '".$Estado."',
					Ndocumento = '".$Ndocumento."',
					EsCliente = '".$EsCliente."',
					EsProveedor = '".$EsProveedor."',
					EsEmpleado = '".$EsEmpleado."',
					EsOtros = '".$EsOtros."',
					TipoDocumento = '".$TipoDocumento."',
					Email = '".$Email."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodPersona = '".$CodPersona."'";
		execute($sql);
		
		//	si es empleado entonces
		if ($EsEmpleado == "S") {			
			//	consulto si existe el empleado
			$sql = "SELECT * FROM mastempleado WHERE CodPersona = '".$CodPersona."'";
			$query_empleado = mysql_query($sql) or die(getErrorSql(mysql_errno(), mysql_error(), $sql));
			if (mysql_num_rows($query_empleado) != 0) {
				//	verifico si cedula existe
				if (valorExisteUp("mastempleado", "Usuario", $Usuario, "CodEmpleado", $CodEmpleado)) die("Nombre de Usuario ya existe");
				
				//	si existe entonces
				$sql = "UPDATE mastempleado
						SET
							CodDependencia = '".$CodDependencia."',
							CodOrganismo = '".$CodOrganismo."',
							Estado = '".$EstadoEmpleado."',
							CodCentroCosto = '".$CodCentroCosto."',
							Usuario = '".$Usuario."',
							UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
							Ultimafecha = NOW()
						WHERE CodEmpleado = '".$CodEmpleado."'";
				execute($sql);
			} else {
				//	verifico si usuario existe
				if (valorExiste("mastempleado", "Usuario", $Usuario)) die("Nombre de Usuario ya existe");
		
				//	genero correlativo para el empleado
				$CodEmpleado = getCodigo("mastempleado", "CodEmpleado", 6);
				
				//	si no existe el empleado entonces inserto un nuevo registro
				$sql = "INSERT INTO mastempleado (
									CodEmpleado,
									CodPersona,
									CodDependencia,
									CodOrganismo,
									Estado,
									CodCentroCosto,
									Usuario,
									UltimoUsuario,
									Ultimafecha
						) VALUES (
									'".$CodEmpleado."',
									'".$CodPersona."',
									'".$CodDependencia."',
									'".$CodOrganismo."',
									'".$EstadoEmpleado."',
									'".$CodCentroCosto."',
									'".$Usuario."',
									'".$_SESSION["USUARIO_ACTUAL"]."',
									NOW()
						)";				
				execute($sql);
			}
		}
		
		//	si es proveedor entonces
		if ($EsProveedor == "S") {
			//	consulto si existe el empleado
			$sql = "SELECT * FROM mastproveedores WHERE CodProveedor = '".$CodPersona."'";
			$query_proveedor = mysql_query($sql) or die(getErrorSql(mysql_errno(), mysql_error(), $sql));
			if (mysql_num_rows($query_proveedor) != 0) {
				//	si existe entonces
				$sql = "UPDATE mastproveedores
						SET
							CodTipoDocumento = '".$CodTipoDocumento."',
							CodTipoPago = '".$CodTipoPago."',
							CodFormaPago = '".$CodFormaPago."',
							CodTipoServicio = '".$CodTipoServicio."',
							DiasPago = '".$DiasPago."',
							RegistroPublico = '".$RegistroPublico."',
							LicenciaMunicipal = '".$LicenciaMunicipal."',
							FechaConstitucion = '".$FechaConstitucion."',
							RepresentanteLegal = '".$RepresentanteLegal."',
							ContactoVendedor = '".$ContactoVendedor."',
							FlagSNC = '".$FlagSNC."',
							NroInscripcionSNC = '".$NroInscripcionSNC."',
							FechaEmisionSNC = '".$FechaEmisionSNC."',
							FechaValidacionSNC = '".$FechaValidacionSNC."',
							Nacionalidad = '".$Nacionalidad."',
							UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
							Ultimafecha = NOW()
						WHERE CodProveedor = '".$CodPersona."'";
				execute($sql);
			} else {
				//	si no existe el proveedor entonces inserto un nuevo registro
				$sql = "INSERT INTO mastproveedores (
									CodProveedor,
									CodTipoDocumento,
									CodTipoPago,
									CodFormaPago,
									CodTipoServicio,
									DiasPago,
									RegistroPublico,
									LicenciaMunicipal,
									FechaConstitucion,
									RepresentanteLegal,
									ContactoVendedor,
									FlagSNC,
									NroInscripcionSNC,
									FechaEmisionSNC,
									FechaValidacionSNC,
									Nacionalidad,
									UltimoUsuario,
									Ultimafecha
						) VALUES (
									'".$CodPersona."',
									'".$CodTipoDocumento."',
									'".$CodTipoPago."',
									'".$CodFormaPago."',
									'".$CodTipoServicio."',
									'".$DiasPago."',
									'".$RegistroPublico."',
									'".$LicenciaMunicipal."',
									'".$FechaConstitucion."',
									'".$RepresentanteLegal."',
									'".$ContactoVendedor."',
									'".$FlagSNC."',
									'".$NroInscripcionSNC."',
									'".$FechaEmisionSNC."',
									'".$FechaValidacionSNC."',
									'".$Nacionalidad."',
									'".$_SESSION["USUARIO_ACTUAL"]."',
									NOW()
						)";
				execute($sql);
			}
		}
	}
}

//	maestro de aplicaciones
elseif ($modulo == "aplicaciones") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	inserto aplicacion
		$sql = "INSERT INTO mastaplicaciones (
							CodAplicacion,
							Descripcion,
							PeriodoContable,
							PrefVoucherPD,
							CodSistemaFuente,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodAplicacion."',
							'".$Descripcion."',
							'".$PeriodoContable."',
							'".$PrefVoucherPD."',
							'".$CodSistemaFuente."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico aplicacion
		$sql = "UPDATE mastaplicaciones
				SET
					Descripcion = '".$Descripcion."',
					PeriodoContable = '".$PeriodoContable."',
					PrefVoucherPD = '".$PrefVoucherPD."',
					PrefVoucherPA = '".$PrefVoucherPA."',
					PrefVoucherLP = '".$PrefVoucherLP."',
					PrefVoucherTB = '".$PrefVoucherTB."',
					CodSistemaFuente = '".$CodSistemaFuente."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodAplicacion = '".$CodAplicacion."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico aplicacion
		$sql = "DELETE FROM mastaplicaciones WHERE CodAplicacion = '".$registro."'";
		execute($sql);
	}
}

//	maestro de parametros
elseif ($modulo == "parametros") {
	if (trim($ValorTexto) != "") $ValorParam = $ValorTexto;
	if (trim($ValorNumero) != "") $ValorParam = $ValorNumero;
	if (trim($ValorFecha) != "") $ValorParam = $ValorFecha;
	//	nuevo registro
	if ($accion == "nuevo") {
		//	inserto parametro
		$sql = "INSERT INTO mastparametros (
							ParametroClave,
							TipoValor,
							ValorParam,
							Estado,
							DescripcionParam,
							Explicacion,
							CodOrganismo,
							CodAplicacion,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$ParametroClave."',
							'".$TipoValor."',
							'".$ValorParam."',
							'".$Estado."',
							'".$DescripcionParam."',
							'".$Explicacion."',
							'".$CodOrganismo."',
							'".$CodAplicacion."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico parametro
		$sql = "UPDATE mastparametros
				SET
					TipoValor = '".$TipoValor."',
					ValorParam = '".$ValorParam."',
					Estado = '".$Estado."',
					DescripcionParam = '".$DescripcionParam."',
					Explicacion = '".$Explicacion."',
					CodOrganismo = '".$CodOrganismo."',
					CodAplicacion = '".$CodAplicacion."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE ParametroClave = '".$ParametroClave."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico parametro
		$sql = "DELETE FROM mastparametros WHERE ParametroClave = '".$registro."'";
		execute($sql);
	}
}

//	maestro de organismos
elseif ($modulo == "organismos") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	genero correlativo
		$CodOrganismo = getCodigo("mastorganismos", "CodOrganismo", 4);
		
		//	inserto parametro
		$sql = "INSERT INTO mastorganismos (
							CodOrganismo,
							Organismo,
							CodPersona,
							DescripComp,
							RepresentLegal,
							DocRepreLeg,
							PaginaWeb,
							DocFiscal,
							FechaFundac,
							Direccion,
							CodCiudad,
							Telefono1,
							Telefono2,
							Telefono3,
							Fax1,
							Fax2,
							Logo,
							Estado,
							NumReg,
							TomoReg,
							CodPersonaDesign,
							Designacion,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodOrganismo."',
							'".$Organismo."',
							'".$CodPersona."',
							'".$DescripComp."',
							'".$RepresentLegal."',
							'".$DocRepreLeg."',
							'".$PaginaWeb."',
							'".$DocFiscal."',
							'".formatFechaAMD($FechaFundac)."',
							'".$Direccion."',
							'".$CodCiudad."',
							'".$Telefono1."',
							'".$Telefono2."',
							'".$Telefono3."',
							'".$Fax1."',
							'".$Fax2."',
							'".$Logo."',
							'".$Estado."',
							'".$NumReg."',
							'".$TomoReg."',
							'".$CodPersonaDesign."',
							'".$Designacion."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico parametro
		$sql = "UPDATE mastorganismos
				SET
					Organismo = '".$Organismo."',
					DescripComp = '".$DescripComp."',
					CodPersona = '".$CodPersona."',
					RepresentLegal = '".$RepresentLegal."',
					DocRepreLeg = '".$DocRepreLeg."',
					PaginaWeb = '".$PaginaWeb."',
					DocFiscal = '".$DocFiscal."',
					FechaFundac = '".formatFechaAMD($FechaFundac)."',
					Direccion = '".$Direccion."',
					CodCiudad = '".$CodCiudad."',
					Telefono1 = '".$Telefono1."',
					Telefono2 = '".$Telefono2."',
					Telefono3 = '".$Telefono3."',
					Fax1 = '".$Fax1."',
					Fax2 = '".$Fax2."',
					Logo = '".$Logo."',
					Estado = '".$Estado."',
					NumReg = '".$NumReg."',
					TomoReg = '".$TomoReg."',
					CodPersonaDesign = '".$CodPersonaDesign."',
					Designacion = '".$Designacion."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodOrganismo = '".$CodOrganismo."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico parametro
		$sql = "DELETE FROM mastorganismos WHERE CodOrganismo = '".$registro."'";
		execute($sql);
	}
}

//	maestro de dependencias
elseif ($modulo == "dependencias") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	genero correlativo
		$CodDependencia = getCodigo("mastdependencias", "CodDependencia", 4);
		
		//	genero correlativo estructura
		$CodEstructura = getCodigo_2("mastdependencias", "Estructura", "EntidadPadre", $EntidadPadre, 2);
		$Estructura = $EstructuraPadre.$CodEstructura;
		
		//	inserto parametro
		$sql = "INSERT INTO mastdependencias (
							CodDependencia,
							CodOrganismo,
							Dependencia,
							Telefono1,
							Telefono2,
							Extencion1,
							Extencion2,
							CodPersona,
							CodInterno,
							Estructura,
							EstructuraPadre,
							CodEstructura,
							EntidadPadre,
							Nivel,
							FlagControlFiscal,
							FlagPrincipal,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodDependencia."',
							'".$CodOrganismo."',
							'".$Dependencia."',
							'".$Telefono1."',
							'".$Telefono2."',
							'".$Extencion1."',
							'".$Extencion2."',
							'".$CodPersona."',
							'".$CodInterno."',
							'".$Estructura."',
							'".$EstructuraPadre."',
							'".$CodEstructura."',
							'".$EntidadPadre."',
							'".$Nivel."',
							'".$FlagControlFiscal."',
							'".$FlagPrincipal."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico parametro
		$sql = "UPDATE mastdependencias
				SET
					CodOrganismo = '".$CodOrganismo."',
					Dependencia = '".$Dependencia."',
					Telefono1 = '".$Telefono1."',
					Telefono2 = '".$Telefono2."',
					Extencion1 = '".$Extencion1."',
					Extencion2 = '".$Extencion2."',
					CodPersona = '".$CodPersona."',
					CodInterno = '".$CodInterno."',
					FlagControlFiscal = '".$FlagControlFiscal."',
					FlagPrincipal = '".$FlagPrincipal."',
					Estado = '".$Estado."',
					Nivel = '".$Nivel."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodDependencia = '".$CodDependencia."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico parametro
		$sql = "DELETE FROM mastdependencias WHERE CodDependencia = '".$registro."'";
		execute($sql);
	}
}

//	maestro de plan de cuentas
elseif ($modulo == "plan_cuentas") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	valido nivel
		if ($Nivel > 1) {
			if ($Nivel == 2)
				$sql = "SELECT * FROM ac_mastplancuenta WHERE Grupo = '".$Grupo."'";
			elseif ($Nivel == 3)
				$sql = "SELECT * FROM ac_mastplancuenta WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."'";
			elseif ($Nivel == 4)
				$sql = "SELECT * FROM ac_mastplancuenta WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."'";
			elseif ($Nivel == 5)
				$sql = "SELECT * FROM ac_mastplancuenta WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."' AND Cuenta = '".$Cuenta."'";
			elseif ($Nivel == 6)
				$sql = "SELECT * FROM ac_mastplancuenta WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."' AND Cuenta = '".$Cuenta."' AND SubCuenta1 = '".$SubCuenta1."'";
			elseif ($Nivel == 7)
				$sql = "SELECT * FROM ac_mastplancuenta WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."' AND Cuenta = '".$Cuenta."' AND SubCuenta2 = '".$SubCuenta2."'";				
			$query = mysql_query($sql) or die(getErrorSql(mysql_errno(), mysql_error(), $sql));
			if (mysql_num_rows($query) == 0) die("No existe la cuenta que se le está asociando al registro");
		}
		
		//	inserto parametro
		$sql = "INSERT INTO ac_mastplancuenta (
							CodCuenta,
							Grupo,
							SubGrupo,
							Rubro,
							Cuenta,
							SubCuenta1,
							SubCuenta2,
							SubCuenta3,
							Descripcion,
							Nivel,
							FlagTipo,
							TipoCuenta,
							TipoSaldo,
							Naturaleza,
							FlagReqCC,
							FlagReqActivo,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodCuenta."',
							'".$Grupo."',
							'".$SubGrupo."',
							'".$Rubro."',
							'".$Cuenta."',
							'".$SubCuenta1."',
							'".$SubCuenta2."',
							'".$SubCuenta3."',
							'".$Descripcion."',
							'".$Nivel."',
							'".$FlagTipo."',
							'".$TipoCuenta."',
							'".$TipoSaldo."',
							'".$Naturaleza."',
							'".$FlagReqCC."',
							'".$FlagReqActivo."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
							
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico parametro
		$sql = "UPDATE ac_mastplancuenta
				SET
					Descripcion = '".$Descripcion."',
					FlagTipo = '".$FlagTipo."',
					TipoCuenta = '".$TipoCuenta."',
					TipoSaldo = '".$TipoSaldo."',
					Naturaleza = '".$Naturaleza."',
					FlagReqCC = '".$FlagReqCC."',
					FlagReqActivo = '".$FlagReqActivo."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodCuenta = '".$CodCuenta."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico parametro
		$sql = "DELETE FROM ac_mastplancuenta WHERE CodCuenta = '".$registro."'";
		execute($sql);
	}
}

//	maestro de grupo de centro de costos
elseif ($modulo == "grupo_centro_costos") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	verifico los valores del subgrupo
		$i = 0;
		$detalle_sub = split(";", $detalles_sub);
		foreach ($detalle_sub as $linea) {
			list($_CodSubGrupoCentroCosto, $_Descripcion, $_Estado) = split("[|]", $linea);
			$CodSubGrupoCentroCosto[$i] = $_CodSubGrupoCentroCosto;
			for ($j=0; $j<$i; $j++) {
				if ($_CodSubGrupoCentroCosto == $CodSubGrupoCentroCosto[$j]) 
					die("Los códigos del subgrupo debe ser únicos para cada registro");
			}
			$i++;
		}
		
		//	inserto grupo
		$sql = "INSERT INTO ac_grupocentrocosto (
							CodGrupoCentroCosto,
							Descripcion,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodGrupoCentroCosto."',
							'".$Descripcion."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
		
		//	sub-grupo
		if ($detalles_sub != "") {
			$secuencia = 0;
			$detalle_sub = split(";", $detalles_sub);
			foreach ($detalle_sub as $linea) {
				list($_CodSubGrupoCentroCosto, $_Descripcion, $_Estado) = split("[|]", $linea);
				$secuencia++;
				
				//	inserto
				$sql = "INSERT INTO ac_subgrupocentrocosto (
									CodGrupoCentroCosto,
									CodSubGrupoCentroCosto,
									Descripcion,
									Estado,
									UltimoUsuario,
									UltimaFecha
						) VALUES (
									'".$CodGrupoCentroCosto."',
									'".$_CodSubGrupoCentroCosto."',
									'".$_Descripcion."',
									'".$_Estado."',
									'".$_SESSION["USUARIO_ACTUAL"]."',
									NOW()
						)";
				execute($sql);
			}
		}
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	verifico los valores del subgrupo
		$i = 0;
		$detalle_sub = split(";", $detalles_sub);
		foreach ($detalle_sub as $linea) {
			list($_CodSubGrupoCentroCosto, $_Descripcion, $_Estado) = split("[|]", $linea);
			$CodSubGrupoCentroCosto[$i] = $_CodSubGrupoCentroCosto;
			for ($j=0; $j<$i; $j++) {
				if ($_CodSubGrupoCentroCosto == $CodSubGrupoCentroCosto[$j]) 
					die("Los códigos del subgrupo debe ser únicos para cada registro");
			}
			$i++;
		}
		
		//	modifico grupo
		$sql = "UPDATE ac_grupocentrocosto
				SET
					Descripcion = '".$Descripcion."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodGrupoCentroCosto = '".$CodGrupoCentroCosto."'";
		execute($sql);
		
		//	sub-grupo
		if ($detalles_sub != "") {
			$secuencia = 0;
			$filtro = '';
			$detalle_sub = split(";", $detalles_sub);
			foreach ($detalle_sub as $linea) {
				list($_CodSubGrupoCentroCosto, $_Descripcion, $_Estado) = split("[|]", $linea);
				$secuencia++;

				$sql = "SELECT * FROM ac_subgrupocentrocosto WHERE CodGrupoCentroCosto = '".$CodGrupoCentroCosto."' AND CodSubGrupoCentroCosto = '".$_CodSubGrupoCentroCosto."'";
				$field_sub = getRecord($sql);
				if (count($field_sub)) {
					$sql = "UPDATE ac_subgrupocentrocosto
							SET
								Descripcion = '".$Descripcion."',
								Estado = '".$Estado."',
								UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
								UltimaFecha = NOW()
							WHERE
								CodGrupoCentroCosto = '".$CodGrupoCentroCosto."' AND
								CodSubGrupoCentroCosto = '".$_CodSubGrupoCentroCosto."'";
					execute($sql);
				} else {
					//	inserto
					$sql = "INSERT INTO ac_subgrupocentrocosto (
										CodGrupoCentroCosto,
										CodSubGrupoCentroCosto,
										Descripcion,
										Estado,
										UltimoUsuario,
										UltimaFecha
							) VALUES (
										'".$CodGrupoCentroCosto."',
										'".$_CodSubGrupoCentroCosto."',
										'".$_Descripcion."',
										'".$_Estado."',
										'".$_SESSION["USUARIO_ACTUAL"]."',
										NOW()
							)";
					execute($sql);
				}
				if ($filtro) $filtro .= "AND CodSubGrupoCentroCosto <> '$_CodSubGrupoCentroCosto'";
				else $filtro .= "CodSubGrupoCentroCosto <> '$_CodSubGrupoCentroCosto'";
			}
			$sql = "DELETE FROM ac_subgrupocentrocosto WHERE CodGrupoCentroCosto = '".$CodGrupoCentroCosto."' AND ($filtro)";
			execute($sql);
		}
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	elimino subgrupo
		$sql = "DELETE FROM ac_subgrupocentrocosto WHERE CodGrupoCentroCosto = '".$registro."'";
		execute($sql);
		
		//	elimino grupo
		$sql = "DELETE FROM ac_grupocentrocosto WHERE CodGrupoCentroCosto = '".$registro."'";
		execute($sql);
	}
}

//	maestro de centro de costos
elseif ($modulo == "centro_costos") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	genero correlativo
		$CodCentroCosto = getCodigo("ac_mastcentrocosto", "CodCentroCosto", 4);
		//	inserto grupo
		$sql = "INSERT INTO ac_mastcentrocosto (
							CodCentroCosto,
							Codigo,
							Descripcion,
							Abreviatura,
							CodPersona,
							TipoCentroCosto,
							CodDependencia,
							CodGrupoCentroCosto,
							CodSubGrupoCentroCosto,
							FlagAdministrativo,
							FlagVentas,
							FlagFinanciero,
							FlagProduccion,
							FlagCentroIngreso,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodCentroCosto."',
							'".$Codigo."',
							'".$Descripcion."',
							'".$Abreviatura."',
							'".$CodPersona."',
							'".$TipoCentroCosto."',
							'".$CodDependencia."',
							'".$CodGrupoCentroCosto."',
							'".$CodSubGrupoCentroCosto."',
							'".$FlagAdministrativo."',
							'".$FlagVentas."',
							'".$FlagFinanciero."',
							'".$FlagProduccion."',
							'".$FlagCentroIngreso."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE ac_mastcentrocosto
				SET
					Codigo = '".$Codigo."',
					Descripcion = '".$Descripcion."',
					Abreviatura = '".$Abreviatura."',
					CodPersona = '".$CodPersona."',
					TipoCentroCosto = '".$TipoCentroCosto."',
					CodDependencia = '".$CodDependencia."',
					CodGrupoCentroCosto = '".$CodGrupoCentroCosto."',
					CodSubGrupoCentroCosto = '".$CodSubGrupoCentroCosto."',
					FlagAdministrativo = '".$FlagAdministrativo."',
					FlagVentas = '".$FlagVentas."',
					FlagFinanciero = '".$FlagFinanciero."',
					FlagProduccion = '".$FlagProduccion."',
					FlagCentroIngreso = '".$FlagCentroIngreso."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodCentroCosto = '".$CodCentroCosto."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	elimino subgrupo
		$sql = "DELETE FROM ac_mastcentrocosto WHERE CodCentroCosto = '".$registro."'";
		execute($sql);
	}
}

//	maestro de tipo de cuentas
elseif ($modulo == "tipo_cuenta") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	inserto grupo
		$sql = "INSERT INTO pv_tipocuenta (
							cod_tipocuenta,
							descp_tipocuenta,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$cod_tipocuenta."',
							'".$descp_tipocuenta."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE pv_tipocuenta
				SET
					descp_tipocuenta = '".$descp_tipocuenta."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE cod_tipocuenta = '".$cod_tipocuenta."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	elimino subgrupo
		$sql = "DELETE FROM pv_tipocuenta WHERE cod_tipocuenta = '".$registro."'";
		execute($sql);
	}
}

//	maestro de clasificador presupuestario
elseif ($modulo == "clasificador_presupuestario") {
	//	nuevo registro
	if ($accion == "nuevo") {
		if ($partida1 != "00" && $generica != "00" && $especifica != "00" && $subespecifica != "00") {
			$sql = "SELECT * FROM pv_partida WHERE cod_partida LIKE '$cod_tipocuenta$partida1.$generica.$especifica.00%'";
		}
		elseif ($partida1 != "00" && $generica != "00" && $especifica != "00") {
			$sql = "SELECT * FROM pv_partida WHERE cod_partida LIKE '$cod_tipocuenta$partida1.$generica.00%'";
		}
		elseif ($partida1 != "00" && $generica != "00") {
			$sql = "SELECT * FROM pv_partida WHERE cod_partida LIKE '$cod_tipocuenta$partida1.00%'";
		}
		$query = mysql_query($sql) or die(getErrorSql(mysql_errno(), mysql_error(), $sql));
		if (mysql_num_rows($query) == 0) die("No se encontro el clasificador padre asociado");
		
		$cod_partida = "$cod_tipocuenta$partida1.$generica.$especifica.$subespecifica";
		//	inserto grupo
		$sql = "INSERT INTO pv_partida (
							cod_partida,
							cod_tipocuenta,
							partida1,
							generica,
							especifica,
							subespecifica,
							denominacion,
							tipo,
							nivel,
							CodCuenta,
							CodCuentaPub20,
							CtaOrdPagoPub20,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$cod_partida."',
							'".$cod_tipocuenta."',
							'".$partida1."',
							'".$generica."',
							'".$especifica."',
							'".$subespecifica."',
							'".$denominacion."',
							'".$tipo."',
							'".$nivel."',
							'".$CodCuenta."',
							'".$CodCuentaPub20."',
							'".$CtaOrdPagoPub20."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE pv_partida
				SET
					denominacion = '".$denominacion."',
					tipo = '".$tipo."',
					CodCuenta = '".$CodCuenta."',
					CodCuentaPub20 = '".$CodCuentaPub20."',
					CtaOrdPagoPub20 = '".$CtaOrdPagoPub20."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE cod_partida = '".$cod_partida."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	elimino subgrupo
		$sql = "DELETE FROM pv_partida WHERE cod_partida = '".$registro."'";
		execute($sql);
	}
}

//	maestro de paises
elseif ($modulo == "paises") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	genero correlativo
		$CodPais = getCodigo("mastpaises", "CodPais", 4);
		//	inserto
		$sql = "INSERT INTO mastpaises (
							CodPais,
							Pais,
							Observaciones,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodPais."',
							'".$Pais."',
							'".$Observaciones."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE mastpaises
				SET
					Pais = '".$Pais."',
					Observaciones = '".$Observaciones."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodPais = '".$CodPais."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico
		$sql = "DELETE FROM mastpaises WHERE CodPais = '".$registro."'";
		execute($sql);
	}
}

//	maestro de estados
elseif ($modulo == "estados") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	genero correlativo
		$CodEstado = getCodigo("mastestados", "CodEstado", 4);
		//	inserto
		$sql = "INSERT INTO mastestados (
							CodEstado,
							Estado,
							CodPais,
							Status,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodEstado."',
							'".$Estado."',
							'".$CodPais."',
							'".$Status."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE mastestados
				SET
					Estado = '".$Estado."',
					CodPais = '".$CodPais."',
					Status = '".$Status."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodEstado = '".$CodEstado."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico
		$sql = "DELETE FROM mastestados WHERE CodEstado = '".$registro."'";
		execute($sql);
	}
}

//	maestro de municipios
elseif ($modulo == "municipios") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	genero correlativo
		$CodMunicipio = getCodigo("mastmunicipios", "CodMunicipio", 4);
		//	inserto
		$sql = "INSERT INTO mastmunicipios (
							CodMunicipio,
							Municipio,
							CodEstado,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodMunicipio."',
							'".$Municipio."',
							'".$CodEstado."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE mastmunicipios
				SET
					Municipio = '".$Municipio."',
					CodEstado = '".$CodEstado."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodMunicipio = '".$CodMunicipio."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico
		$sql = "DELETE FROM mastmunicipios WHERE CodMunicipio = '".$registro."'";
		execute($sql);
	}
}

//	maestro de ciudades
elseif ($modulo == "ciudades") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	genero correlativo
		$CodCiudad = getCodigo("mastciudades", "CodCiudad", 4);
		//	inserto
		$sql = "INSERT INTO mastciudades (
							CodCiudad,
							Ciudad,
							CodMunicipio,
							CodPostal,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodCiudad."',
							'".$Ciudad."',
							'".$CodMunicipio."',
							'".$CodPostal."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE mastciudades
				SET
					Ciudad = '".$Ciudad."',
					CodMunicipio = '".$CodMunicipio."',
					CodPostal = '".$CodPostal."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodCiudad = '".$CodCiudad."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico
		$sql = "DELETE FROM mastciudades WHERE CodCiudad = '".$registro."'";
		execute($sql);
	}
}

//	tipos de pago
elseif ($modulo == "tipos_pago") {
	//	nuevo registro
	if ($accion == "nuevo") {
		$CodTipoPago = getCodigo("masttipopago", "CodTipoPago", 2);
		//	inserto
		$sql = "INSERT INTO masttipopago (
							CodTipoPago,
							TipoPago,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodTipoPago."',
							'".$TipoPago."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE masttipopago
				SET
					TipoPago = '".$TipoPago."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodTipoPago = '".$CodTipoPago."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico
		$sql = "DELETE FROM masttipopago WHERE CodTipoPago = '".$registro."'";
		execute($sql);
	}
}

//	bancos
elseif ($modulo == "bancos") {
	//	nuevo registro
	if ($accion == "nuevo") {
		$CodBanco = getCodigo("mastbancos", "CodBanco", 4);
		//	inserto
		$sql = "INSERT INTO mastbancos (
							CodBanco,
							Banco,
							CodPersona,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodBanco."',
							'".$Banco."',
							'".$CodPersona."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE mastbancos
				SET
					Banco = '".$Banco."',
					CodPersona = '".$CodPersona."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodBanco = '".$CodBanco."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico
		$sql = "DELETE FROM mastbancos WHERE CodBanco = '".$registro."'";
		execute($sql);
	}
}

//	miscelaneos
elseif ($modulo == "miscelaneos") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	verifico los valores del detalle
		$i = 0;
		$detalle_det = split(";", $detalles_det);
		foreach ($detalle_det as $linea) {
			list($_CodDetalle, $_Descripcion, $_Estado) = split("[|]", $linea);
			$CodDetalle[$i] = $_CodDetalle;
			for ($j=0; $j<$i; $j++) {
				if ($_CodDetalle == $CodDetalle[$j]) 
					die("Los códigos del detale debe ser únicos para cada registro");
			}
			$i++;
		}
		
		//	inserto
		$sql = "INSERT INTO mastmiscelaneoscab (
							CodAplicacion,
							CodMaestro,
							Descripcion,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodAplicacion."',
							'".$CodMaestro."',
							'".$Descripcion."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
		
		//	detalles
		if ($detalles_det != "") {
			$secuencia = 0;
			$detalle_det = split(";", $detalles_det);
			foreach ($detalle_det as $linea) {
				list($_CodDetalle, $_Descripcion, $_Estado) = split("[|]", $linea);
				$secuencia++;
				
				//	inserto
				$sql = "INSERT INTO mastmiscelaneosdet (
									CodAplicacion,
									CodMaestro,
									CodDetalle,
									Descripcion,
									Estado,
									UltimoUsuario,
									UltimaFecha
						) VALUES (
									'".$CodAplicacion."',
									'".$CodMaestro."',
									'".$_CodDetalle."',
									'".$_Descripcion."',
									'".$_Estado."',
									'".$_SESSION["USUARIO_ACTUAL"]."',
									NOW()
						)";
				execute($sql);
			}
		}
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	verifico los valores del detalle
		$i = 0;
		$detalle_det = split(";", $detalles_det);
		foreach ($detalle_det as $linea) {
			list($_CodDetalle, $_Descripcion, $_Estado) = split("[|]", $linea);
			$CodDetalle[$i] = $_CodDetalle;
			for ($j=0; $j<$i; $j++) {
				if ($_CodDetalle == $CodDetalle[$j]) 
					die("Los códigos del subgrupo debe ser únicos para cada registro");
			}
			$i++;
		}
		
		//	modifico
		$sql = "UPDATE mastmiscelaneoscab
				SET
					Descripcion = '".$Descripcion."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE
					CodAplicacion = '".$CodAplicacion."' AND
					CodMaestro = '".$CodMaestro."'";
		execute($sql);
		
		//	detalles
		$sql = "DELETE FROM mastmiscelaneosdet
				WHERE
					CodAplicacion = '".$CodAplicacion."' AND
					CodMaestro = '".$CodMaestro."'";
		execute($sql);
		if ($detalles_det != "") {
			$secuencia = 0;
			$detalle_det = split(";", $detalles_det);
			foreach ($detalle_det as $linea) {
				list($_CodDetalle, $_Descripcion, $_Estado) = split("[|]", $linea);
				$secuencia++;
				
				//	inserto
				$sql = "INSERT INTO mastmiscelaneosdet (
									CodAplicacion,
									CodMaestro,
									CodDetalle,
									Descripcion,
									Estado,
									UltimoUsuario,
									UltimaFecha
						) VALUES (
									'".$CodAplicacion."',
									'".$CodMaestro."',
									'".$_CodDetalle."',
									'".$_Descripcion."',
									'".$_Estado."',
									'".$_SESSION["USUARIO_ACTUAL"]."',
									NOW()
						)";
				execute($sql);
			}
		}
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		list($CodAplicacion, $CodMaestro) = split("[.]", $registro);
		//	elimino
		$sql = "DELETE FROM mastmiscelaneosdet
				WHERE
					CodAplicacion = '".$CodAplicacion."' AND
					CodMaestro = '".$CodMaestro."'";
		execute($sql);
		
		//	elimino
		$sql = "DELETE FROM mastmiscelaneoscab
				WHERE
					CodAplicacion = '".$CodAplicacion."' AND
					CodMaestro = '".$CodMaestro."'";
		execute($sql);
	}
}

//	maestro de usuarios
elseif ($modulo == "usuarios") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	inserto
		$sql = "INSERT INTO usuarios (
							Usuario,
							CodPersona,
							Clave,
							FlagFechaExpirar,
							FechaExpirar,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$Usuario."',
							'".$CodPersona."',
							'".sha1($Clave)."',
							'".$FlagFechaExpirar."',
							'".formatFechaAMD($FechaExpirar)."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	consulto si se modifico la clave
		$sql = "SELECT Clave FROM usuarios WHERE Usuario = '".$Usuario."'";
		$ClaveOriginal = getVar3($sql);
		if ($ClaveOriginal != $Clave) $_clave = "Clave = '".sha1($Clave)."',";
				
		//	modifico
		$sql = "UPDATE usuarios
				SET
					$_clave
					FlagFechaExpirar = '".$FlagFechaExpirar."',
					FechaExpirar = '".formatFechaAMD($FechaExpirar)."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE Usuario = '".$Usuario."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico
		$sql = "DELETE FROM usuarios WHERE Usuario = '".$registro."'";
		execute($sql);
	}
	
	//	autorizaciones
	elseif ($accion == "autorizaciones") {
		execute('BEGIN');
		//	elimino anteriores
		$sql = "DELETE FROM seguridad_autorizaciones
				WHERE
					CodAplicacion = '".$_SESSION["APLICACION_ACTUAL"]."' AND
					Usuario = '".$Usuario."'";	
		execute($sql);
		
		//	autorizaciones
		$autorizacion = split(";", $autorizaciones);
		foreach ($autorizacion as $linea) {
			list($Concepto, $FlagMostrar, $FlagAgregar, $FlagModificar, $FlagEliminar) = split("[|]", $linea);
			list($Grupo, $CodConcepto) = split("[-]", $Concepto);
			$secuencia++;
			
			//	inserto
			$sql = "INSERT INTO seguridad_autorizaciones (
								CodAplicacion,
								Grupo,
								Concepto,
								Usuario,
								FlagAdministrador,
								FlagMostrar,
								FlagAgregar,
								FlagModificar,
								FlagEliminar,
								UltimoUsuario,
								UltimaFecha
					) VALUES (
								'".$_SESSION["APLICACION_ACTUAL"]."',
								'".$Grupo."',
								'".$Concepto."',
								'".$Usuario."',
								'".$FlagAdministrador."',
								'".$FlagMostrar."',
								'".$FlagAgregar."',
								'".$FlagModificar."',
								'".$FlagEliminar."',
								'".$_SESSION["USUARIO_ACTUAL"]."',
								NOW()
					)";
			execute($sql);
		}
		execute('COMMIT');
	}
	
	//	alterna
	elseif ($accion == "alterna") {
		execute('BEGIN');
		//	elimino anteriores
		$sql = "DELETE FROM seguridad_alterna
				WHERE
					CodAplicacion = '".$_SESSION["APLICACION_ACTUAL"]."' AND
					Usuario = '".$Usuario."'";
		execute($sql);
		
		//	autorizaciones
		$autorizacion = split(";", $autorizaciones);
		foreach ($autorizacion as $linea) {
			list($Concepto, $FlagMostrar) = split("[|]", $linea);
			list($CodOrganismo, $CodDependencia) = split("[.]", $Concepto);
			$secuencia++;
			//	inserto
			$sql = "INSERT INTO seguridad_alterna (
								CodAplicacion,
								Usuario,
								CodOrganismo,
								CodDependencia,
								FlagMostrar,
								UltimoUsuario,
								UltimaFecha
					) VALUES (
								'".$_SESSION["APLICACION_ACTUAL"]."',
								'".$Usuario."',
								'".$CodOrganismo."',
								'".$CodDependencia."',
								'".$FlagMostrar."',
								'".$_SESSION["USUARIO_ACTUAL"]."',
								NOW()
					)";
			execute($sql);
		}
		
		$sql = "SELECT CodOrganismo FROM seguridad_alterna GROUP BY CodOrganismo";
		$field_organismos = getRecords($sql);
		foreach ($field_organismos as $f) {
			//	inserto
			$sql = "INSERT INTO seguridad_alterna (
								CodAplicacion,
								Usuario,
								CodOrganismo,
								FlagMostrar,
								UltimoUsuario,
								UltimaFecha
					) VALUES (
								'".$_SESSION["APLICACION_ACTUAL"]."',
								'".$Usuario."',
								'".$f['CodOrganismo']."',
								'S',
								'".$_SESSION["USUARIO_ACTUAL"]."',
								NOW()
					)";
			execute($sql);
		}
		execute('COMMIT');
	}
}

//	unidad tributaria
elseif ($modulo == "unidad_tributaria") {
	//	nuevo
	if ($accion == "nuevo") {
		//	genero codigo
		$Secuencia = getCodigo_2("mastunidadtributaria", "Secuencia", "Anio", $Anio, 10);
		$Secuencia = intval($Secuencia);
		
		//	inserto
		$sql = "INSERT INTO mastunidadtributaria
				SET
					Anio = '".$Anio."',
					Secuencia = '".$Secuencia."',
					Fecha = '".formatFechaAMD($Fecha)."',
					Valor = '".setNumero($Valor)."',
					GacetaOficial = '".changeUrl($GacetaOficial)."',
					ProvidenciaNro = '".changeUrl($ProvidenciaNro)."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico
		$sql = "UPDATE mastunidadtributaria
				SET
					Fecha = '".formatFechaAMD($Fecha)."',
					Valor = '".setNumero($Valor)."',
					GacetaOficial = '".changeUrl($GacetaOficial)."',
					ProvidenciaNro = '".changeUrl($ProvidenciaNro)."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE
					Anio = '".$Anio."' AND
					Secuencia = '".$Secuencia."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		list($Anio, $Secuencia) = split("[_]", $registro);
		//	alimino
		$sql = "DELETE FROM mastunidadtributaria
				WHERE
					Anio = '".$Anio."' AND
					Secuencia = '".$Secuencia."'";
		execute($sql);
	}
}

//	maestro de plan de cuentas pub20
elseif ($modulo == "plan_cuentas_pub20") {
	//	nuevo registro
	if ($accion == "nuevo") {
		//	valido nivel
		if ($Nivel > 1) {
			if ($Nivel == 2)
				$sql = "SELECT * FROM ac_mastplancuenta20 WHERE Grupo = '".$Grupo."'";
			elseif ($Nivel == 3)
				$sql = "SELECT * FROM ac_mastplancuenta20 WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."'";
			elseif ($Nivel == 4)
				$sql = "SELECT * FROM ac_mastplancuenta20 WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."'";
			elseif ($Nivel == 5)
				$sql = "SELECT * FROM ac_mastplancuenta20 WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."' AND Cuenta = '".$Cuenta."'";
			elseif ($Nivel == 6)
				$sql = "SELECT * FROM ac_mastplancuenta20 WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."' AND Cuenta = '".$Cuenta."' AND SubCuenta1 = '".$SubCuenta1."'";
			elseif ($Nivel == 7)
				$sql = "SELECT * FROM ac_mastplancuenta20 WHERE Grupo = '".$Grupo."' AND SubGrupo = '".$SubGrupo."' AND Rubro = '".$Rubro."' AND Cuenta = '".$Cuenta."' AND SubCuenta2 = '".$SubCuenta2."'";				
			$query = mysql_query($sql) or die(getErrorSql(mysql_errno(), mysql_error(), $sql));
			if (mysql_num_rows($query) == 0) die("No existe la cuenta que se le está asociando al registro");
		}
		
		//	inserto parametro
		$sql = "INSERT INTO ac_mastplancuenta20 (
							CodCuenta,
							Grupo,
							SubGrupo,
							Rubro,
							Cuenta,
							SubCuenta1,
							SubCuenta2,
							SubCuenta3,
							Descripcion,
							Nivel,
							FlagTipo,
							TipoCuenta,
							TipoSaldo,
							Naturaleza,
							FlagReqCC,
							FlagReqActivo,
							Estado,
							UltimoUsuario,
							UltimaFecha
				) VALUES (
							'".$CodCuenta."',
							'".$Grupo."',
							'".$SubGrupo."',
							'".$Rubro."',
							'".$Cuenta."',
							'".$SubCuenta1."',
							'".$SubCuenta2."',
							'".$SubCuenta3."',
							'".$Descripcion."',
							'".$Nivel."',
							'".$FlagTipo."',
							'".$TipoCuenta."',
							'".$TipoSaldo."',
							'".$Naturaleza."',
							'".$FlagReqCC."',
							'".$FlagReqActivo."',
							'".$Estado."',
							'".$_SESSION["USUARIO_ACTUAL"]."',
							NOW()
							
				)";
		execute($sql);
	}
	
	//	modificar registro
	elseif ($accion == "modificar") {
		//	modifico parametro
		$sql = "UPDATE ac_mastplancuenta20
				SET
					Descripcion = '".$Descripcion."',
					FlagTipo = '".$FlagTipo."',
					TipoCuenta = '".$TipoCuenta."',
					TipoSaldo = '".$TipoSaldo."',
					Naturaleza = '".$Naturaleza."',
					FlagReqCC = '".$FlagReqCC."',
					FlagReqActivo = '".$FlagReqActivo."',
					Estado = '".$Estado."',
					UltimoUsuario = '".$_SESSION["USUARIO_ACTUAL"]."',
					UltimaFecha = NOW()
				WHERE CodCuenta = '".$CodCuenta."'";
		execute($sql);
	}
	
	//	eliminar registro
	elseif ($accion == "eliminar") {
		//	modifico parametro
		$sql = "DELETE FROM ac_mastplancuenta20 WHERE CodCuenta = '".$registro."'";
		execute($sql);
	}
}
?>