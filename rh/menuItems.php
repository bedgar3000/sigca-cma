<script type="text/javascript">
	var _A = "RH";
	var menuItems = [
		["Gesti&oacute;n", , , , , , "0", , , , , ],
			["|Empleados", "<?=$_PARAMETRO["PATHSIA"]?>empleados/gehen.php?anz=empleados_lista&filtrar=default&concepto=01-0001&_APLICACION="+_A, , , , d['01-0001'], , , , , , ],
			["|Relaciones Laborales", , , , , , , , , , , ],
				["||Control de Contratos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_contratos_lista&filtrar=default&concepto=01-0002&_APLICACION="+_A, , , , d['01-0002'], , , , , , ],
			["|Reclutamiento y Selecci&oacute;n", , , , , , , , , , , ],
				["||Agregar Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_requerimientos_form&opcion=nuevo&concepto=01-0003&_APLICACION="+_A, , , , d['01-0003'], , , , , , ],
				["||Lista de Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_requerimientos_lista&lista=todos&filtrar=default&concepto=01-0005&_APLICACION="+_A, , , , d['01-0005'], , , , , , ],
				["||Aprobar Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_requerimientos_lista&lista=aprobar&filtrar=default&concepto=01-0006&_APLICACION="+_A, , , , d['01-0006'], , , , , , ],
				["||Registro de Postulantes", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_postulantes_lista&filtrar=default&concepto=01-0004&_APLICACION="+_A, , , , d['01-0004'], , , , , , ],
				["||Evaluaci&oacute;n de Candidatos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_requerimientos_lista&lista=asignar&filtrar=default&concepto=01-0007&_APLICACION="+_A, , , , d['01-0007'], , , , , , ],
				["||Contratar Candidato", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_requerimientos_lista&lista=contratar&filtrar=default&concepto=01-0008&_APLICACION="+_A, , , , d['01-0008'], , , , , , ],
				["||Finalizar Requerimiento", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_requerimientos_lista&lista=finalizar&filtrar=default&concepto=01-0009&_APLICACION="+_A, , , , d['01-0009'], , , , , , ],
			["|Capacitaci&oacute;n", , , , , , , , , , , ],
				["||Nueva Capacitaci&oacute;n", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_capacitaciones_form&opcion=nuevo&concepto=01-0010&_APLICACION="+_A, , , , d['01-0010'], , , , , , ],
				["||Lista de Capacitaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_capacitaciones_lista&lista=todos&filtrar=default&concepto=01-0011&_APLICACION="+_A, , , , d['01-0011'], , , , , , ],
				["||Aprobar Capacitaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_capacitaciones_lista&lista=aprobar&filtrar=default&concepto=01-0012&_APLICACION="+_A, , , , d['01-0012'], , , , , , ],
				["||Iniciar/Terminar Capacitaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_capacitaciones_lista&lista=iniciar&filtrar=default&concepto=01-0013&_APLICACION="+_A, , , , d['01-0013'], , , , , , ],
		   	["|Evaluaci&oacute;n del Desempeño", , , , , , , , , , , ],
				["||Per&iacute;odo de Evaluaci&oacute;n", "<?=$_PARAMETRO["PATHSIA"]?>rh/evaluacion_periodo.php?concepto=01-0014&_APLICACION="+_A, , , , d['01-0014'], , , , , , ],
				["||Evaluaci&oacute;n", "<?=$_PARAMETRO["PATHSIA"]?>rh/evaluacion_desempenio.php?filtrar=DEFAULT&limit=0&concepto=01-0015&_APLICACION="+_A, , , , d['01-0015'], , , , , , ],
			["|Permisos", , , , , , , , , , , ],
				["||Crear Permisos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_permisos_form&opcion=nuevo&concepto=01-0016&_APLICACION="+_A, , , , d['01-0016'], , , , , , ],
				["||Lista Permisos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_permisos_lista&filtrar=default&lista=todos&concepto=01-0017&_APLICACION="+_A, , , , d['01-0017'], , , , , , ],
				["||Aprobar Permisos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_permisos_lista&filtrar=default&lista=aprobar&concepto=01-0018&_APLICACION="+_A, , , , d['01-0018'], , , , , , ],
			["|Vacaciones", , , , , , , , , , , ],
				["||Nueva Solicitud", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_vacaciones_form&opcion=nuevo&concepto=01-0025&_APLICACION="+_A, , , , d['01-0025'], , , , , , ],
				["||Listar Solicitudes", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_vacaciones_lista&lista=todos&filtrar=default&concepto=01-0026&_APLICACION="+_A, , , , d['01-0026'], , , , , , ],
				//["||Autorizar Solicitud", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_vacaciones_lista&lista=revisar&filtrar=default&concepto=01-0029&_APLICACION="+_A, , , , d['01-0029'], , , , , , ],
				//["||Revisar Solicitud", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_vacaciones_lista&lista=conformar&filtrar=default&concepto=01-0028&_APLICACION="+_A, , , , d['01-0028'], , , , , , ],
				["||Aprobar Solicitud", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_vacaciones_lista&lista=aprobar&filtrar=default&concepto=01-0027&_APLICACION="+_A, , , , d['01-0027'], , , , , , ],
		 	["|Carreras y Sucesión", , , , , , , , , , , ],
		 		["||Listar Carreras", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_desarrollo_carreras_lista&lista=todos&filtrar=default&concepto=01-0024&_APLICACION="+_A, , , , d['01-0024'], , , , , , ],
		 		["||Actualizar Carreras", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_desarrollo_carreras_lista&lista=modificar&filtrar=default&concepto=01-0030&_APLICACION="+_A, , , , d['01-0030'], , , , , , ],
		 		["||Terminar Carreras", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_desarrollo_carreras_lista&lista=terminar&filtrar=default&concepto=01-0031&_APLICACION="+_A, , , , d['01-0031'], , , , , , ],
			["|Clima Laboral", , , , , , , , , , , ],
				["||Control de Encuestas", "<?=$_PARAMETRO["PATHSIA"]?>rh/encuestas.php?limit=0&filtrar=DEFAULT&concepto=01-0020&_APLICACION="+_A, , , , d['01-0020'], , , , , , ],
			["|Retenciones Judiciales", , , , , , , , , , , ],
				["||Lista de Retenciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_retencion_judicial_lista&filtrar=default&concepto=01-0024&_APLICACION="+_A, , , , d['01-0024'], , , , , , ],
		
		["Procesos", , , , , , "0", , , , , ],
			["|Control de Asistencias", , , , , , , , , , , ],
				["||Transferencias de Eventos", "<?=$_PARAMETRO["PATHSIA"]?>rh/eventos_control.php?concepto=05-0001&_APLICACION="+_A, , , , d['05-0001'], , , , , , ],
				["||Control de Asistencias", "<?=$_PARAMETRO["PATHSIA"]?>rh/control_asistencias.php?concepto=05-0002&_APLICACION="+_A, , , , d['05-0002'], , , , , , ],            						
			["|Bono de Alimentación", , , , , , , , , , , ],
				["||Apertura de Periodo", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_bono_periodos_lista&filtrar=default&lista=todos&concepto=05-0003&_APLICACION="+_A, , , , d['05-0003'], , , , , , ],            						
				["||Registro de Eventos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_bono_periodos_lista&filtrar=default&lista=eventos&concepto=05-0004&_APLICACION="+_A, , , , d['05-0004'], , , , , , ],            						
			["|Jubilaciones", , , , , , , , , , , ],
				["||Listar Jubilaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_jubilaciones_lista&filtrar=default&lista=todos&concepto=05-0005&_APLICACION="+_A, , , , d['05-0005'], , , , , , ],            						
				["||Conformar Jubilaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_jubilaciones_lista&filtrar=default&lista=conformar&concepto=05-0006&_APLICACION="+_A, , , , d['05-0006'], , , , , , ],            						
				["||Aprobar Jubilaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_jubilaciones_lista&filtrar=default&lista=aprobar&concepto=05-0007&_APLICACION="+_A, , , , d['05-0007'], , , , , , ],            						
			["|Pensiones", , , , , , , , , , , ],
				["||Invalidez", , , , , , , , , , , ],
					["|||Listar Pensiones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_pensiones_invalidez_lista&filtrar=default&lista=todos&concepto=05-0008&_APLICACION="+_A, , , , d['05-0008'], , , , , , ],
					["|||Conformar Pensiones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_pensiones_invalidez_lista&filtrar=default&lista=conformar&concepto=05-0009&_APLICACION="+_A, , , , d['05-0009'], , , , , , ],
					["|||Aprobar Pensiones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_pensiones_invalidez_lista&filtrar=default&lista=aprobar&concepto=05-0010&_APLICACION="+_A, , , , d['05-0010'], , , , , , ],            							
				["||Sobreviviente", , , , , , , , , , , ],
					["|||Listar Pensiones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_pensiones_sobreviviente_lista&filtrar=default&lista=todos&concepto=05-0011&_APLICACION="+_A, , , , d['05-0011'], , , , , , ],
					["|||Conformar Pensiones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_pensiones_sobreviviente_lista&filtrar=default&lista=conformar&concepto=05-0012&_APLICACION="+_A, , , , d['05-0012'], , , , , , ],
					["|||Aprobar Pensiones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_pensiones_sobreviviente_lista&filtrar=default&lista=aprobar&concepto=05-0013&_APLICACION="+_A, , , , d['05-0013'], , , , , , ],            							
			["|Cese/Reingreso", , , , , , , , , , , ],
				["||Nuevo Cese/Reingreso", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_reingreso_form&opcion=nuevo&action=&concepto=05-0014&_APLICACION="+_A, , , , d['05-0014'], , , , , , ],            						
				["||Listar Cese/Reingreso", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_reingreso_lista&filtrar=default&lista=todos&concepto=05-0015&_APLICACION="+_A, , , , d['05-0015'], , , , , , ],            						
				["||Conformar Cese/Reingreso", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_reingreso_lista&filtrar=default&lista=conformar&concepto=05-0016&_APLICACION="+_A, , , , d['05-0016'], , , , , , ],            						
				["||Aprobar Cese/Reingreso", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_reingreso_lista&filtrar=default&lista=aprobar&concepto=05-0017&_APLICACION="+_A, , , , d['05-0017'], , , , , , ],
		
		["Reportes", , , , , , "0", , , , , ],
			["|Empleados", , , , , , , , , , , ],
				["||Empleados", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=reporte_empleados&filtrar=default&concepto=02-0004&limit=0&_APLICACION="+_A, , , , d['02-0004'], , , , , , ],            						
				["||Carga Familiar", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=reporte_carga_familiar&filtrar=default&concepto=02-0001&limit=0&_APLICACION="+_A, , , , d['02-0001'], , , , , , ],            						
				["||Constancias de Trabajo", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=reporte_constancia&filtrar=default&concepto=02-0005&limit=0&_APLICACION="+_A, , , , d['02-0005'], , , , , , ],            						
				["||Antecedentes de Servicios", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_reporte_antecedentes&filtrar=default&concepto=02-0012&limit=0&_APLICACION="+_A, , , , d['02-0012'], , , , , , ],            						
				["||Listado de Ceses/Reingresos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_reporte_reingreso&filtrar=default&concepto=02-0013&limit=0&_APLICACION="+_A, , , , d['02-0013'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],            						
				["||Aniversarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=reporte_aniversarios&filtrar=default&concepto=02-0003&limit=0&_APLICACION="+_A, , , , d['02-0003'], , , , , , ],            						
				["||Cumpleaños", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=reporte_cumpleanios&filtrar=default&concepto=02-0002&limit=0&_APLICACION="+_A, , , , d['02-0002'], , , , , , ],            						
			["|Bono de Alimentación", , , , , , , , , , , ],
				["||Control de Asistencias", "<?=$_PARAMETRO["PATHSIA"]?>rh/reportes_eventos_control.php?filtrar=DEFAULT&concepto=02-0006&_APLICACION="+_A, , , , d['02-0006'], , , , , , ],            						
				["||Resumen de Eventos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_eventos_resumen_reporte&filtrar=default&concepto=02-0011&_APLICACION="+_A, , , , d['02-0011'], , , , , , ],            						
			["|Vacaciones", , , , , , , , , , , ],
				["||Lista de Solicitudes", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_vacaciones_lista_reporte&filtrar=default&concepto=02-0008&_APLICACION="+_A, , , , d['02-0008'], , , , , , ],            						
				["||Disfrute de Vacaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_vacaciones_disfrute_reporte&filtrar=default&concepto=02-0009&_APLICACION="+_A, , , , d['02-0009'], , , , , , ],            						
				["||Pago de Vacaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_reporte_vacaciones_pago&filtrar=default&concepto=02-0009&_APLICACION="+_A, , , , d['02-0009'], , , , , , ],            						
			["|Retenciones Judiciales", , , , , , , , , , , ],
				["||Retenciones Judiciales", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_retenciones_judiciales_reporte&filtrar=default&concepto=02-0010&_APLICACION="+_A, , , , d['02-0010'], , , , , , ],            						
			["|Evaluación de Desempeño", , , , , , , , , , , ],
				["||Evaluación de Desempeño", "<?=$_PARAMETRO["PATHSIA"]?>rh/rh_evaluacion_desempenio_reporte.php?filtrar=default&concepto=02-0007&_APLICACION="+_A, , , , d['02-0007'], , , , , , ],
			
		["Maestros", , , , , , "0", , , , , ],
			["|Del Sistema SIA", , , , , , , , , , , ],
				["||Propios del Sistema", , , , , , , , , , , ],
					["|||Aplicaciones", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=aplicaciones_lista&filtrar=default&concepto=03-0002&_APLICACION="+_A, , , , d['03-0002'], , , , , , ],
					["|||Par&aacute;metros", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parametros_lista&filtrar=default&concepto=03-0003&_APLICACION="+_A, , , , d['03-0003'], , , , , , ],
				["||Relacionados a Personas", , , , , , , , , , , ],
					["|||Personas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=personas_lista&filtrar=default&concepto=03-0001&_APLICACION="+_A, , , , d['03-0001'], , , , , , ],
					["|||Organismos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=organismos_lista&filtrar=default&concepto=03-0010&_APLICACION="+_A, , , , d['03-0010'], , , , , , ],
					["|||Dependencias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=dependencias_lista&filtrar=default&concepto=03-0011&_APLICACION="+_A, , , , d['03-0011'], , , , , , ],
				["||Relacionados a Contabilidad", , , , , , , , , , , ],
					["|||Plan de Cuentas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_lista&filtrar=default&concepto=03-0043&_APLICACION="+_A, , , , d['03-0043'], , , , , , ],
                              ["|||Plan de Cuentas (Pub. 20)", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_pub20&filtrar=default&concepto=03-0060", , , , d['03-0060'], , , , , , ],
					["|||Grupos de Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=grupo_centro_costos_lista&filtrar=default&concepto=03-0044&_APLICACION="+_A, , , , d['03-0044'], , , , , , ],
					["|||Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=centro_costos_lista&filtrar=default&concepto=03-0045&_APLICACION="+_A, , , , d['03-0045'], , , , , , ],
				["||Relacionados a Presupuesto", , , , , , , , , , , ],
					["|||Tipos de Cuenta", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipo_cuenta_lista&filtrar=default&concepto=03-0053&_APLICACION="+_A, , , , d['03-0053'], , , , , , ],
					["|||Clasificador Presupuestario", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=clasificador_presupuestario_lista&filtrar=default&concepto=03-0054&_APLICACION="+_A, , , , d['03-0054'], , , , , , ],
				["||Otros Maestros", , , , , , , , , , , ],
					["|||Paises", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=paises_lista&filtrar=default&concepto=03-0004&_APLICACION="+_A, , , , d['03-0004'], , , , , , ],
					["|||Estados", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=estados_lista&filtrar=default&concepto=03-0005&_APLICACION="+_A, , , , d['03-0005'], , , , , , ],
					["|||Municipios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=municipios_lista&filtrar=default&concepto=03-0006&_APLICACION="+_A, , , , d['03-0006'], , , , , , ],
					["|||Ciudades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=ciudades_lista&filtrar=default&concepto=03-0007&_APLICACION="+_A, , , , d['03-0007'], , , , , , ],
					["|||Parroquias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parroquias_lista&filtrar=default&concepto=03-0059&_APLICACION="+_A, , , , d['03-0059'], , , , , , ],
					["|||Comunidades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=comunidades_lista&filtrar=default&concepto=03-0061&_APLICACION="+_A, , , , d['03-0061'], , , , , , ],
					["|||Localidades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=localidades_lista&filtrar=default&concepto=03-0063&_APLICACION="+_A, , , , d['03-0063'], , , , , , ],
					["|||Tipos de Pago", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipos_pago_lista&filtrar=default&concepto=03-0008", , , , d['03-0008'], , , , , , ],
					["|||Bancos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=bancos_lista&filtrar=default&concepto=03-0009", , , , d['03-0009'], , , , , , ],
					["|||Unidad Tributaria", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=unidad_tributaria_lista&filtrar=default&concepto=03-0056&_APLICACION="+_A, , , , d['03-0056'], , , , , , ],            							
			["|Organizaci&oacute;n", , , , , , , , , , , ],
				["||Tipos de Cargo", "<?=$_PARAMETRO["PATHSIA"]?>organizacion/gehen.php?anz=tipo_cargo_lista&filtrar=default&concepto=03-0014&_APLICACION="+_A, , , , d['03-0014'], , , , , , ],            						
				["||Nivel de Tipos de Cargo", "<?=$_PARAMETRO["PATHSIA"]?>organizacion/gehen.php?anz=nivel_tipo_cargo_lista&filtrar=default&concepto=03-0015&_APLICACION="+_A, , , , d['03-0015'], , , , , , ],            						
				["||Grupo Ocupacional", "<?=$_PARAMETRO["PATHSIA"]?>organizacion/gehen.php?anz=grupo_ocupacional_lista&filtrar=default&concepto=03-0012&_APLICACION="+_A, , , , d['03-0012'], , , , , , ],            									
				["||Serie Ocupacional", "<?=$_PARAMETRO["PATHSIA"]?>organizacion/gehen.php?anz=serie_ocupacional_lista&filtrar=default&concepto=03-0013&_APLICACION="+_A, , , , d['03-0013'], , , , , , ],            						
				["||Grado Salarial", "<?=$_PARAMETRO["PATHSIA"]?>organizacion/gehen.php?anz=nivelsalarial_lista&filtrar=default&concepto=03-0042&_APLICACION="+_A, , , , d['03-0042'], , , , , , ],
				["||Cargos", "<?=$_PARAMETRO["PATHSIA"]?>organizacion/gehen.php?anz=cargos_lista&filtrar=default&concepto=03-0016&_APLICACION="+_A, , , , d['03-0016'], , , , , , ],            						
			["|Capacitaci&oacute;n", , , , , , , , , , , ],
				["||Grados de Intrucción", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_grado_instruccion_lista&filtrar=default&concepto=03-0017&_APLICACION="+_A, , , , d['03-0017'], , , , , , ],            						
				["||Profesiones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_profesiones_lista&filtrar=default&concepto=03-0018&_APLICACION="+_A, , , , d['03-0018'], , , , , , ],            						
				["||Centros de Estudio", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_centro_estudio_lista&filtrar=default&concepto=03-0019&_APLICACION="+_A, , , , d['03-0019'], , , , , , ],            						
				["||Cursos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_cursos_lista&filtrar=default&concepto=03-0020&_APLICACION="+_A, , , , d['03-0020'], , , , , , ],            						
				["||Idiomas", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_idiomas_lista&filtrar=default&concepto=03-0021&_APLICACION="+_A, , , , d['03-0021'], , , , , , ],            						
			["|Relaciones Laborales", , , , , , , , , , , ],
				["||Tipos de Trabajador", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=tipo_trabajador_lista&filtrar=default&concepto=03-0022&_APLICACION="+_A, , , , d['03-0022'], , , , , , ],
				["||Tipos de N&oacute;mina", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=tipo_nomina_lista&filtrar=default&concepto=03-0023&_APLICACION="+_A, , , , d['03-0023'], , , , , , ],
				["||Perfiles de Nómina", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=perfil_nomina_lista&filtrar=default&concepto=03-0024&_APLICACION="+_A, , , , d['03-0024'], , , , , , ],
				["||Tipos de Contrato", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=tipo_contrato_lista&filtrar=default&concepto=03-0025&_APLICACION="+_A, , , , d['03-0025'], , , , , , ],
				["||Formatos de Contrato", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=formato_contrato_lista&filtrar=default&concepto=03-0026&_APLICACION="+_A, , , , d['03-0026'], , , , , , ],
				["||Motivos de Cese", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=motivo_cese_lista&filtrar=default&concepto=03-0027&_APLICACION="+_A, , , , d['03-0027'], , , , , , ],
				["||Horario Laboral", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=horario_laboral_lista&filtrar=default&concepto=03-0057&_APLICACION="+_A, , , , d['03-0057'], , , , , , ],
				["||Cuadrillas", "<?=$_PARAMETRO["PATHSIA"]?>relaciones_laborales/gehen.php?anz=cuadrillas_lista&filtrar=default&concepto=03-0062&_APLICACION="+_A, , , , d['03-0062'], , , , , , ],
			["|Clima Laboral", , , , , , , , , , , ],
				["||Preguntas", "<?=$_PARAMETRO["PATHSIA"]?>rh/preguntas.php?concepto=03-0032&_APLICACION="+_A, , , , d['03-0032'], , , , , , ],
				["||Plantillas", "<?=$_PARAMETRO["PATHSIA"]?>rh/plantillas.php?concepto=03-0033&_APLICACION="+_A, , , , d['03-0033'], , , , , , ],            						
			["|Gesti&oacute;n de Evaluaciones", , , , , , , , , , , ],
				["||Tipos de Evaluaci&oacute;n", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_evaluacion_tipo_lista&lista=todos&filtrar=default&concepto=03-0035&_APLICACION="+_A, , , , d['03-0035'], , , , , , ],
				["||Evaluaciones", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_evaluacion_lista&lista=todos&filtrar=default&concepto=03-0034&_APLICACION="+_A, , , , d['03-0034'], , , , , , ],
				["||Items o Preguntas", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_evaluacion_items_lista&lista=todos&filtrar=default&concepto=03-0055&_APLICACION="+_A, , , , d['03-0055'], , , , , , ],            						
			["|Gesti&oacute;n de Competencias", , , , , , , , , , , ],
				["||Grupos de Competencias", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_competencias_grupo_lista&lista=todos&filtrar=default&concepto=03-0036&_APLICACION="+_A, , , , d['03-0036'], , , , , , ],
				["||Competencias", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_competencias_lista&lista=todos&filtrar=default&concepto=03-0038&_APLICACION="+_A, , , , d['03-0038'], , , , , , ],
				["||Plantilla de Competencias", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_competencias_plantilla_lista&lista=todos&filtrar=default&concepto=03-0039&_APLICACION="+_A, , , , d['03-0039'], , , , , , ],
				["||Grados de Calificación General", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_grados_calificacion_lista&lista=todos&filtrar=default&concepto=03-0052&_APLICACION="+_A, , , , d['03-0052'], , , , , , ],            					
			["|Otros", , , , , , , , , , , ],
				["||Miscel&aacute;neos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=miscelaneos_lista&filtrar=default&concepto=03-0040&_APLICACION="+_A, , , , d['03-0040'], , , , , , ],
				["||Maestro de Feriados", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_feriados_lista&filtrar=default&concepto=03-0041&_APLICACION="+_A, , , , d['03-0041'], , , , , , ],
				["||Tabla de Sueldos Mínimos", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_sueldos_minimos_lista&filtrar=default&concepto=03-0051&_APLICACION="+_A, , , , d['03-0051'], , , , , , ],
				["||Tabla de Disfrutes Vacacionales", "<?=$_PARAMETRO["PATHSIA"]?>rh/gehen.php?anz=rh_disfrute_vacacionales_lista&filtrar=default&concepto=03-0058&_APLICACION="+_A, , , , d['03-0058'], , , , , , ],            					

		["Admin.", , , , , , "0", , , , , ],
			["|Seguridad", , , , , , , , , , , ],
				["||Maesto de Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=usuarios&filtrar=default&concepto=04-0001&_APLICACION="+_A, , , , d['04-0001'], , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=autorizaciones&filtrar=default&concepto=04-0002&_APLICACION="+_A, , , , d['04-0002'], , , , , , ],            					
			["|Seguridad Alterna", , , , , , , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=alterna&filtrar=default&concepto=04-0003&_APLICACION="+_A, , , , d['04-0003'], , , , , , ],
	];
	dm_initFrame("frmSet", 0, 1, 0);
</script>