<script type="text/javascript">
      var _A = "AP";
	var menuItems = [
		["Obligaciones", , , , , , "0", , , , , ],
			["|Nueva Obligación", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_obligacion_form&opcion=nuevo", , , , d['01-0001'], , , , , , ],
			["|Revisar Obligaciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_obligacion_lista&lista=revisar&filtrar=default&concepto=01-0002", , , , d['01-0002'], , , , , , ],
			["|Aprobar Obligaciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_obligacion_lista&lista=aprobar&filtrar=default&concepto=01-0003", , , , d['01-0003'], , , , , , ],
			["|Listar Obligaciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_obligacion_lista&lista=todos&filtrar=default&concepto=01-0004", , , , d['01-0004'], , , , , , ],
			["|Facturación de Logística", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_facturacion_lista&lista=todos&filtrar=default&concepto=01-0005", , , , d['01-0005'], , , , , , ],
				
		["Pagos", , , , , , "0", , , , , ],                        
			["|Lista de Ordenes de Pagos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_orden_pago_lista&lista=todos&filtrar=default&concepto=02-0001", , , , d['02-0001'], , , , , , ],
			["|Preparar Prepago", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_orden_pago_prepago_lista&lista=prepago&filtrar=default&concepto=02-0002", , , , d['02-0002'], , , , , , ],
			["|Imprimir/Transferir", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_orden_pago_transferir_lista&filtrar=default&concepto=02-0003", , , , d['02-0003'], , , , , , ],
			["|Lista de Pagos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_pago_lista&filtrar=default&concepto=02-0006", , , , d['02-0006'], , , , , , ],
			["|Entrega/Devolución de Cheques", , , , , , , , , , , ],
				["||Entrega de Cheques", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_cheques_lista&filtrar=default&lista=entregar&concepto=02-0004&limit=0&_APLICACION="+_A, , , , d['02-0004'], , , , , , ],
				["||Devolución de Cheques", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_cheques_lista&filtrar=default&lista=devolver&concepto=02-0005&limit=0&_APLICACION="+_A, , , , d['02-0005'], , , , , , ],
				["||Ingreso de Cheques Cobrados", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_cheques_lista&filtrar=default&lista=cobrar&concepto=02-0011&limit=0&_APLICACION="+_A, , , , d['02-0011'], , , , , , ],
			/*["|Transacciones Bancarias", , , , , , , , , , , ],
				["||Listar Transacciones Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_transacciones_bancarias_lista&lista=todos&filtrar=default&concepto=02-0007", , , , d['02-0007'], , , , , , ],
				["||Actualizar Transacciones Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_transacciones_bancarias_lista&lista=actualizar&filtrar=default&concepto=02-0008", , , , d['02-0008'], , , , , , ],
				["||Saldo de Bancos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_banco_saldos_lista&filtrar=default&concepto=02-0009", , , , d['02-0009'], , , , , , ],*/
			["|Transacciones Bancarias", , , , , , , , , , , ],
				["||Listar Transacciones Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_bancotransaccion_lista&lista=listar&filtrar=default&concepto=02-0007", , , , d['02-0007'], , , , , , ],
				["||Actualizar Transacciones Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_bancotransaccion_lista&lista=actualizar&filtrar=default&concepto=02-0008", , , , d['02-0008'], , , , , , ],
				["||Saldo de Bancos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_banco_saldos_lista&filtrar=default&concepto=02-0009", , , , d['02-0009'], , , , , , ],
			
		["Procesos", , , , , , "0", , , , , ],					
			["|Conciliación Bancaria", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_conciliacion_bancaria&lista=todos&filtrar=default&concepto=03-0003", , , , d['03-0003'], , , , , , ],
			["|Enterar Impuestos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_impuestos_enterar_lista&filtrar=default&concepto=03-0004", , , , d['03-0004'], , , , , , ],
			
		["Reportes", , , , , , "0", , , , , ],
			["|Obligaciones", , , , , , , , , , , ],
				["||Listado de Obligaciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_obligaciones_lista&filtrar=default&concepto=05-0001&limit=0&_APLICACION="+_A, , , , d['05-0001'], , , , , , ],
				["||Obligaciones Pendientes a Proveedores", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_obligaciones_pendientes&filtrar=default&concepto=05-0002&limit=0&_APLICACION="+_A, , , , d['05-0002'], , , , , , ],
				["||Comparación de Pagos y Obligaciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_comparacion&filtrar=default&concepto=05-0003&limit=0&_APLICACION="+_A, , , , d['05-0003'], , , , , , ],
				["||Obligaciones Vs. Distribución Contable", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_obligaciones_cuentas&filtrar=default&concepto=05-0005&limit=0&_APLICACION="+_A, , , , d['05-0005'], , , , , , ],
				["||Registro de Compras", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_registro_compra_filtro&concepto=05-0004&limit=0&filtrar=default", , , , d['05-0004'], , , , , , ],
				["||Estado de Cuenta", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_obligaciones_estado_cuenta&filtrar=default&concepto=05-0006&limit=0&_APLICACION="+_A, , , , d['05-0006'], , , , , , ],
				["||Documentos Emitidos / Cheques Girados", "<?=$_PARAMETRO["PATHSIA"]?>ap/ap_obligaciones_documentos_pdf_filtro.php?filtrar=default&concepto=05-0007", , , , d['05-0007'], , , , , , ],
				["||Obligaciones -> O/P -> Pagos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_obligaciones_pagadas&filtrar=default&concepto=05-0014&limit=0&_APLICACION="+_A, , , , d['05-0014'], , , , , , ],
			["|Pagos", , , , , , , , , , , ],
				["||Ordenes de Pago", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_lista_orden_pago_pdf_filtro&concepto=05-0008&limit=0&filtrar=default", , , , d['05-0008'], , , , , , ],
				["||Pagos a Proveedores", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_pagos_proveedores_pdf_filtro&concepto=05-0009&limit=0&filtrar=default", , , , d['05-0009'], , , , , , ],
			["|Ejecución", , , , , , , , , , , ],
				["||Causadas", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_obligaciones_distribucion&filtrar=default&concepto=05-0015&limit=0&_APLICACION="+_A, , , , d['05-0015'], , , , , , ],            						
				["||Pagadas", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_ordenes_distribucion&filtrar=default&concepto=05-0016&limit=0&_APLICACION="+_A, , , , d['05-0016'], , , , , , ],
			["|Cheques", , , , , , , , , , , ],
				["||Libro de Cheques", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_libro_cheque_pdf_filtro&concepto=05-0010&limit=0&filtrar=default", , , , d['05-0010'], , , , , , ],
				["||Cheques x Estado de Entrega", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_cheque_estado_entrega_pdf_filtro&concepto=05-0011&limit=0&filtrar=default", , , , d['05-0011'], , , , , , ],
			["|Bancos", , , , , , , , , , , ],
				["||Libro Bancos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_libro_banco_pdf_filtro&concepto=05-0012&limit=0&filtrar=default", , , , d['05-0012'], , , , , , ],
				["||Listado de Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_listado_transaccion_pdf_filtro&concepto=05-0013&limit=0&filtrar=default", , , , d['05-0013'], , , , , , ],
				["||Conciliación Bancaria", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_conciliacion_bancaria&filtrar=default&concepto=05-0016&limit=0&_APLICACION="+_A, , , , d['05-0016'], , , , , , ],
			["|Viáticos", , , , , , , , , , , ],
			    ["||Listado de Viáticos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_viaticos_listado_filtro&concepto=05-0017&limit=0&filtrar=default", , , , d['05-0017'], , , , , , ],
			["|Otros", , , , , , , , , , , ],
				["||Gastos Directos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_reporte_certificaciones_listado&lista=listar&concepto=05-0018&limit=0&_APLICACION="+_A, , , , d['05-0018'], , , , , , ],
			
		["Otros", , , , , , "0", , , , , ],
			["|Caja Chica", , , , , , , , , , , ],
				["||Listar Caja Chica", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_caja_chica_lista&lista=todos&filtrar=default&concepto=06-0001", , , , d['06-0001'], , , , , , ],
				["||Aprobar Caja Chica", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_caja_chica_lista&lista=aprobar&filtrar=default&concepto=06-0002", , , , d['06-0002'], , , , , , ],
				["||Listar Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_lista&lista=caja_chica&filtrar=default&concepto=06-0005", , , , d['06-0005'], , , , , , ],
			["|Impuestos", , , , , , , , , , , ],
				["||Importar Registro de Compras", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_registro_compra_importar&concepto=06-0003&limit=0&filtrar=default", , , , d['06-0003'], , , , , , ],
				["||Control de Registro de Compras", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_registro_compra_lista&concepto=06-0004&limit=0&filtrar=default", , , , d['06-0004'], , , , , , ],
			["|Viáticos", , , , , , , , , , , ],
				["||Nuevo Viático", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_viaticos_form&opcion=nuevo&origen=&concepto=06-0006&_APLICACION="+_A, , , , d['06-0006'], , , , , , ],
				["||Listar Viáticos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_viaticos_lista&filtrar=default&lista=todos&concepto=06-0007&_APLICACION="+_A, , , , d['06-0007'], , , , , , ],
				["||Revisar Viáticos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_viaticos_lista&filtrar=default&lista=revisar&concepto=06-0008&_APLICACION="+_A, , , , d['06-0008'], , , , , , ],
				["||Generar Obligación", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_viaticos_lista&filtrar=default&lista=generar&concepto=06-0009&_APLICACION="+_A, , , , d['06-0009'], , , , , , ],
			["|Gastos Directos", , , , , , , , , , , ],
				["||Nuevo Gasto", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_certificaciones_form&opcion=nuevo&concepto=06-0010&_APLICACION="+_A, , , , d['06-0010'], , , , , , ],
				["||Listar Gastos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_certificaciones_lista&filtrar=default&lista=listar&concepto=06-0011&_APLICACION="+_A, , , , d['06-0011'], , , , , , ],
				["||Revisar Gastos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_certificaciones_lista&filtrar=default&lista=revisar&concepto=06-0012&_APLICACION="+_A, , , , d['06-0012'], , , , , , ],
				["||Generar Obligación", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_certificaciones_lista&filtrar=default&lista=generar&concepto=06-0013&_APLICACION="+_A, , , , d['06-0013'], , , , , , ],
				
		["Maestros", , , , , , "0", , , , , ],
			["|Del Sistema SIA", , , , , , , , , , , ],
				["||Propios del Sistema", , , , , , , , , , , ],
					["|||Aplicaciones", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=aplicaciones_lista&filtrar=default&concepto=07-0002", , , , d['07-0002'], , , , , , ],
					["|||Par&aacute;metros", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parametros_lista&filtrar=default&concepto=07-0003", , , , d['07-0003'], , , , , , ],            						
				["||Relacionados a Personas", , , , , , , , , , , ],
					["|||Personas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=personas_lista&filtrar=default&concepto=07-0001", , , , d['07-0001'], , , , , , ],
					["|||Organismos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=organismos_lista&filtrar=default&concepto=07-0029", , , , d['07-0029'], , , , , , ],
					["|||Dependencias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=dependencias_lista&filtrar=default&concepto=07-0030", , , , d['07-0030'], , , , , , ],            						
				["||Relacionados a Contabilidad", , , , , , , , , , , ],
					["|||Plan de Cuentas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_lista&filtrar=default&concepto=07-0010", , , , d['07-0010'], , , , , , ],
					["|||Plan de Cuentas (Pub. 20)", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_pub20&filtrar=default&concepto=07-0033", , , , d['07-0033'], , , , , , ],
					["|||Grupos de Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=grupo_centro_costos_lista&filtrar=default&concepto=07-0010", , , , d['07-0010'], , , , , , ],
					["|||Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=centro_costos_lista&filtrar=default&concepto=07-0011", , , , d['07-0011'], , , , , , ],            						
				["||Relacionados a Presupuesto", , , , , , , , , , , ],
					["|||Tipos de Cuenta", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipo_cuenta_lista&filtrar=default&concepto=07-0014", , , , d['07-0014'], , , , , , ],
					["|||Clasificador Presupuestario", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=clasificador_presupuestario_lista&filtrar=default&concepto=07-0015", , , , d['07-0015'], , , , , , ],            						
				["||Otros Maestros", , , , , , , , , , , ],
					["|||Paises", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=paises_lista&filtrar=default&concepto=07-0004", , , , d['07-0004'], , , , , , ],
					["|||Estados", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=estados_lista&filtrar=default&concepto=07-0005", , , , d['07-0005'], , , , , , ],
					["|||Municipios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=municipios_lista&filtrar=default&concepto=07-0006", , , , d['07-0006'], , , , , , ],
					["|||Ciudades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=ciudades_lista&filtrar=default&concepto=07-0007", , , , d['07-0007'], , , , , , ],
					["|||Parroquias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parroquias_lista&filtrar=default&concepto=07-0031&_APLICACION="+_A, , , , d['07-0031'], , , , , , ],
					["|||Comunidades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=comunidades_lista&filtrar=default&concepto=07-0032&_APLICACION="+_A, , , , d['07-0032'], , , , , , ],
					["|||Tipos de Pago", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipos_pago_lista&filtrar=default&concepto=07-0008", , , , d['07-0008'], , , , , , ],
					["|||Bancos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=bancos_lista&filtrar=default&concepto=07-0009", , , , d['07-0009'], , , , , , ],
					["|||Unidad Tributaria", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=unidad_tributaria_lista&filtrar=default&concepto=07-0029", , , , d['07-0029'], , , , , , ],
					["|||Unidad Aritmetica Umbral", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=unidadaritmetica_lista&filtrar=default&concepto=07-0020", , , , d['07-0020'], , , , , , ],
			["|Relacionado a Obligaciones", , , , , , , , , , , ],
				["||Régimen Fiscal", "<?=$_PARAMETRO["PATHSIA"]?>ap/regimen_fiscal.php?concepto=07-0017", , , , d['07-0017'], , , , , , ],            						
				["||Impuestos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_impuestos_lista&filtrar=default&concepto=07-0018", , , , d['07-0018'], , , , , , ],            						
				["||Tipos de Documentos Ctas. x Pagar", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_tipo_documento_cxp_lista&filtrar=default&concepto=07-0019", , , , d['07-0019'], , , , , , ],            						
				["||Tipos de Servicio", "<?=$_PARAMETRO["PATHSIA"]?>ap/tipos_servicio.php?concepto=07-0020", , , , d['07-0020'], , , , , , ],            						
			["|Relacionado a Pagos", , , , , , , , , , , ],
				["||Cuentas Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_cuentas_bancarias_lista&filtrar=default&concepto=07-0022", , , , d['07-0022'], , , , , , ],
				["||Asignación de Cuentas Bancarias por Defecto", "<?=$_PARAMETRO["PATHSIA"]?>ap/ap_cuentas_bancarias_default.php?concepto=07-0023", , , , d['00-0023'], , , , , , ],
				["||-",, , , , "_", , , , , , ],
				["||-",, , , , "_", , , , , , ],
				["||Tipo de Transacción Bancaria", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_tipo_transaccion_bancaria_lista&filtrar=default&concepto=07-0024", , , , d['07-0024'], , , , , , ],            						
			["|Caja Chica y Reportes de Gastos", , , , , , , , , , , ],
				["||Clasificación de Gastos", "<?=$_PARAMETRO["PATHSIA"]?>ap/ap_clasificacion_gastos.php?limit=0&filtrar=DEFAULT&concepto=07-0027", , , , d['07-0027'], , , , , , ],
				["||Grupo de Concepto de Gastos", "<?=$_PARAMETRO["PATHSIA"]?>ap/ap_grupo_concepto_gastos.php?limit=0&filtrar=DEFAULT&concepto=07-0025", , , , d['07-0025'], , , , , , ],
				["||Concepto de Gastos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_concepto_gastos_lista&filtrar=default&concepto=07-0026", , , , d['07-0026'], , , , , , ],            						
				["||Autorización de Caja Chica", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_autorizacion_cajachica_lista&filtrar=default&concepto=07-0028", , , , d['07-0028'], , , , , , ],            						
			["|Otros", , , , , , , , , , , ],
				["||Miscel&aacute;neos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=miscelaneos_lista&filtrar=default&concepto=07-0016", , , , d['07-0016'], , , , , , ],            						
				["||-",, , , , "_", , , , , , ],
				["||-",, , , , "_", , , , , , ],
				["||Clasificación de Documentos", "<?=$_PARAMETRO["PATHSIA"]?>ap/ap_documentos_clasificacion.php?concepto=07-0021", , , , d['07-0021'], , , , , , ],            						
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Conceptos de Viáticos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_viatico_concepto_lista&filtrar=default&concepto=07-0030&_APLICACION="+_A, , , , d['07-0030'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Tipos de Certificación", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_tiposcertificacion_lista&filtrar=default&concepto=07-0034&_APLICACION="+_A, , , , d['07-0034'], , , , , , ],
				["||Conceptos de Compromisos Directos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_conceptoscertificacion_lista&filtrar=default&concepto=07-0035&_APLICACION="+_A, , , , d['07-0035'], , , , , , ],
			
		["Admin.", , , , , , "0", , , , , ],
			["|Seguridad", , , , , , , , , , , ],
				["||Maesto de Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=usuarios&filtrar=default&concepto=08-0001", , , , d['08-0001'], , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=autorizaciones&filtrar=default&concepto=08-0002", , , , d['08-0002'], , , , , , ],
			["|Seguridad Alterna", , , , , , , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=alterna&filtrar=default&concepto=08-0003", , , , d['08-0003'], , , , , , ],            					
			["|Generación de Vouchers", , , , , , , , , , , ],
				["||Publicación Fiscal", , , , , , , , , , , ],
					["|||Provisión de Obligaciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_voucher_provisionpub20_lista&filtrar=default&concepto=08-0007", , , , d['08-0007'], , , , , , ],            							
					["|||Orden de Pago", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_voucher_ordenacionpub20_lista&filtrar=default&concepto=08-0008", , , , d['08-0008'], , , , , , ],            							
					["|||Pagos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_voucher_pagospub20_lista&filtrar=default&concepto=08-0009", , , , d['08-0009'], , , , , , ],            							
					["|||Transacciones Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_voucher_bancariapub20_lista&filtrar=default&concepto=08-0010", , , , d['08-0010'], , , , , , ],            							
				["||Balance General", , , , , , , , , , , ],
					["|||Provisión de Obligaciones", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_voucher_provision_lista&filtrar=default&concepto=08-0004", , , , d['08-0004'], , , , , , ],
					["|||Pagos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_voucher_pagos_lista&filtrar=default&concepto=08-0005", , , , d['08-0005'], , , , , , ],
					["|||Transacciones Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_voucher_bancaria_lista&filtrar=default&concepto=08-0006", , , , d['08-0006'], , , , , , ],
				
	];
      dm_initFrame("frmSet", 0, 1, 0);
</script>