<script type="text/javascript">
      var _A = "LG";
	var menuItems = [
		["Compras", , , , , , "0", , , , , ],
			["|Requerimientos", , , , , , , , , , , ],
				["||Nuevo Requerimiento", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_form&opcion=nuevo&origen=&concepto=01-0001", , , , d['01-0001'], , , , , , ],
				["||Listar Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_lista&lista=todos&filtrar=default&concepto=01-0002", , , , d['01-0002'], , , , , , ],
				["||Listar Requerimientos (Detalle)", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_detalle&filtrar=default&concepto=01-0003", , , , d['01-0003'], , , , , , ],
				["||Revisar Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_lista&lista=revisar&filtrar=default&concepto=01-0004", , , , d['01-0004'], , , , , , ],
				["||Conformar Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_lista&lista=conformar&filtrar=default&concepto=01-0018", , , , d['01-0018'], , , , , , ],
				<?php
				if ($_PARAMETRO['REQAPROB'] == 'N') {
					?>
					["||Aprobar Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_lista&lista=aprobar&filtrar=default&concepto=01-0005", , , , d['01-0005'], , , , , , ],
					<?php
				}
				?>
				["||Requerimientos Pendientes", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_requerimiento_pendiente_lista&lista=todos&filtrar=default&concepto=01-0019", , , , d['01-0019'], , , , , , ],
			["|Cotizaciones", , , , , , , , , , , ],
				["||Invitar/Cotizar Proveedores", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_cotizaciones_items_invitar_lista&filtrar=default&concepto=01-0006", , , , d['01-0006'], , , , , , ],
				["||Listar Invitaciones de Proveedores", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_cotizaciones_proveedores_invitar_lista&filtrar=default&concepto=01-0007", , , , d['01-0007'], , , , , , ],
				["||Generar Ordenes Pendientes", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_ordenes_pendientes_lista&lista=todos&filtrar=default&concepto=01-0008", , , , d['01-0008'], , , , , , ],
			["|Ordenes de Compras", , , , , , , , , , , ],
				["||Listar Ordenes de Compras", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_compra_lista&lista=todos&filtrar=default&concepto=01-0009", , , , d['01-0009'], , , , , , ],
				["||Listar Ordenes de Compras (Detalle)", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_compra_detalle&lista=todos&filtrar=default&concepto=01-0010", , , , d['01-0010'], , , , , , ],
				["||Revisar Ordenes de Compras", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_compra_lista&lista=revisar&filtrar=default&concepto=01-0012", , , , d['01-0012'], , , , , , ],
				["||Aprobar Ordenes de Compras", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_compra_lista&lista=aprobar&filtrar=default&concepto=01-0011", , , , d['01-0011'], , , , , , ],
			["|Ordenes de Servicios", , , , , , , , , , , ],
				["||Listar Ordenes de Servicios", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_servicio_lista&lista=todos&filtrar=default&concepto=01-0013", , , , d['01-0013'], , , , , , ],
				["||Listar Ordenes de Servicios (Det)", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_servicio_detalle&lista=todos&filtrar=default&concepto=01-0014", , , , d['01-0014'], , , , , , ],
				["||Revisar Ordenes de Servicios", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_servicio_lista&lista=revisar&filtrar=default&concepto=01-0015", , , , d['01-0015'], , , , , , ],
				["||Aprobar Ordenes de Servicios", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_servicio_lista&lista=aprobar&filtrar=default&concepto=01-0016", , , , d['01-0016'], , , , , , ],
				["||Confirmar Realización de Servicios", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_orden_servicio_confirmacion_lista&filtrar=default&concepto=01-0017", , , , d['01-0017'], , , , , , ],
		["Almacen", , , , , , "0", , , , , ],
			["|Recepción en Almacen", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_almacen_recepcion_lista&lista=todos&filtrar=default&concepto=05-0003", , , , d['05-0003'], , , , , , ],
			["|Despachos de Almacen", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_almacen_despacho_lista&lista=todos&filtrar=default&concepto=05-0001", , , , d['05-0001'], , , , , , ],
			["|Despachos de Ventas", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_almacen_despacho_ventas_lista&lista=todos&filtrar=default&concepto=05-0010&_APLICACION="+_A, , , , d['05-0010'], , , , , , ],
			["|Control de Almacen", , , , , , , , , , , ],
				["||Listado de Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_transaccion_almacen_lista&lista=todos&filtrar=default&concepto=05-0002", , , , d['05-0002'], , , , , , ],
				["||Ejecutar Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_transaccion_almacen_lista&lista=ejecutar&filtrar=default&concepto=05-0006", , , , d['05-0006'], , , , , , ],            						
			["|Control de Commodities", , , , , , , , , , , ],
				["||Transacciones Especiales", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_transaccion_commodity_especial_lista&filtrar=default&concepto=05-0004", , , , d['05-0004'], , , , , , ],
				["||Listado de Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_transaccion_commodity_lista&lista=todos&filtrar=default&concepto=05-0004", , , , d['05-0005'], , , , , , ],
				["||Ejecutar Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_transaccion_commodity_lista&lista=ejecutar&filtrar=default&concepto=05-0007", , , , d['05-0007'], , , , , , ],            						
			["|Control de Caja Chica", , , , , , , , , , , ],
				["||Transacciones de Caja Chica", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_transaccion_cajachica_lista&lista=todos&filtrar=default&concepto=05-0008", , , , d['05-0008'], , , , , , ],            						
				["||Confirmación de Servicios", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_cajachica_confirmar_lista&filtrar=default&concepto=05-0009", , , , d['05-0009'], , , , , , ],            							
		["Procesos", , , , , , "0", , , , , ],
			["|Compras", , , , , , , , , , , ],
				["||Facturación de Activos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_facturacion_activos_lista&filtrar=default&concepto=08-0001", , , , d['08-0001'], , , , , , ],
			["|Guias de Remisión &nbsp;", , , , , , , , , , , ],
				["||Nueva Guia", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_guiaremision_form&opcion=nuevo&origen=framemain&concepto=08-0002&_APLICACION="+_A, , , , d['08-0002'], , , , , , ],
				["||Listar Guias", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_guiaremision_lista&filtrar=default&lista=listar&concepto=08-0003&_APLICACION="+_A, , , , d['08-0003'], , , , , , ],
				["||Confirmar Guias", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_guiaremision_lista&filtrar=default&lista=confirmar&concepto=08-0004&_APLICACION="+_A, , , , d['08-0004'], , , , , , ],
		["Consultas", , , , , , "0", , , , , ],
			["|Sobre Item", , , , , , , , , , , ],
				["||Inventario Actual", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_consulta_inventario_actual&filtrar=default&&concepto=06-0001&_APLICACION="+_A, , , , d['06-0001'], , , , , , ],
				["||Stock Actual de un Item", "<?=$_PARAMETRO["PATHSIA"]?>lg/lg_stock_actual_item.php?limit=0&filtrar=default&concepto=06-0002", , , , d['06-0002'], , , , , , ],
		["Reportes", , , , , , "0", , , , , ],
			["|Maestros", , , , , , , , , , , ],
				["||Catálogo de Proveedores", "<?=$_PARAMETRO["PATHSIA"]?>lg/reporte_catalogo_proveedores.php?limit=0&filtrar=DEFAULT&concepto=07-0001", , , , d['07-0001'], , , , , , ],
				["||Listado de Items", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_item&filtrar=default&concepto=07-0009&limit=0&_APLICACION="+_A, , , , d['07-0009'], , , , , , ],
				["||Listado de Commodities", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_commodity&filtrar=default&concepto=07-0010&limit=0&_APLICACION="+_A, , , , d['07-0010'], , , , , , ],            							
			["|Requerimientos", , , , , , , , , , , ],
				["||Detallado x Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_requerimiento_detallado&filtrar=default&concepto=07-0002&limit=0&_APLICACION="+_A, , , , d['07-0002'], , , , , , ],            					
                        ["||Listado de Requerimientos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_requerimiento_filtro&filtrar=default&lista=todos&concepto=07-0019", , , , d['07-0019'], , , , , , ],
			["|Cotizaciones", , , , , , , , , , , ],
				["||Listado de Invitaciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_invitaciones&filtrar=default&concepto=07-0012&limit=0&_APLICACION="+_A, , , , d['07-0012'], , , , , , ],
				["||Cuadros Comparativos de Ofertas", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_cuadros_comparativos&filtrar=default&concepto=07-0013&limit=0&_APLICACION="+_A, , , , d['07-0013'], , , , , , ],            					
			["|Compras", , , , , , , , , , , ],
				["||Ordenes de Compras", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_orden_compra&filtrar=default&concepto=07-0006&limit=0&_APLICACION="+_A, , , , d['07-0006'], , , , , , ],
				["||Últimas Compras Realizadas", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_ultimas_compras&filtrar=default&concepto=07-0008&limit=0&_APLICACION="+_A, , , , d['07-0008'], , , , , , ],
				["||Ordenes Comprometidas", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_ordenes_comprometidas&filtrar=default&concepto=07-0016&limit=0&_APLICACION="+_A, , , , d['07-0016'], , , , , , ],            					
			["|Servicios", , , , , , , , , , , ],
				["||Ordenes de Servicios", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_orden_servicio&filtrar=default&concepto=07-0007&limit=0&_APLICACION="+_A, , , , d['07-0007'], , , , , , ],
				["||Ordenes Comprometidas", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_ordenesos_comprometidas&filtrar=default&concepto=07-0018&limit=0&_APLICACION="+_A, , , , d['07-0018'], , , , , , ],            					
			["|Almacen", , , , , , , , , , , ],
				["||Movimientos de Almacen", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_almacen_movimientos&filtrar=default&concepto=07-0004&limit=0&_APLICACION="+_A, , , , d['07-0004'], , , , , , ],
				["||Inventario Valorizado", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_inventario_valorizado&filtrar=default&concepto=07-0005&limit=0&_APLICACION="+_A, , , , d['07-0005'], , , , , , ],
				["||Items sin Movimiento", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_items_sin_movimiento&filtrar=default&concepto=07-0014&limit=0&_APLICACION="+_A, , , , d['07-0014'], , , , , , ],
				["||Stock por Punto de Reposición", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_stock_reposicion&filtrar=default&concepto=07-0015&limit=0&_APLICACION="+_A, , , , d['07-0015'], , , , , , ],
                        ["||Listado de Stock", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_stock&filtrar=default&concepto=07-0011&limit=0&_APLICACION="+_A, , , , d['07-0011'], , , , , , ],
                        ["||Inventario Actual", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_inventario&filtrar=default&concepto=07-0017&limit=0&_APLICACION="+_A, , , , d['07-0017'], , , , , , ],            					
			["|Transacciones por Item", , , , , , , , , , , ],
				["||Consumo por Dependencia", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_reporte_consumo_dependencia&filtrar=default&concepto=07-0003&limit=0&_APLICACION="+_A, , , , d['07-0003'], , , , , , ],            						
			["|Cierre Mensual", , , , , , , , , , , ],
				["||...", "xxx.php?limit=0&filtrar=DEFAULT&concepto=00-0000", , , , d['00-0000'], , , , , , ],
		["Maestros", , , , , , "0", , , , , ],
			["|Del Sistema SIA", , , , , , , , , , , ],
				["||Propios del Sistema", , , , , , , , , , , ],
					["|||Aplicaciones", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=aplicaciones_lista&filtrar=default&concepto=03-0002", , , , d['03-0002'], , , , , , ],
					["|||Par&aacute;metros", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parametros_lista&filtrar=default&concepto=03-0003", , , , d['03-0003'], , , , , , ],
				["||Relacionados a Personas", , , , , , , , , , , ],
					["|||Personas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=personas_lista&filtrar=default&concepto=03-0001", , , , d['03-0001'], , , , , , ],
					["|||Organismos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=organismos_lista&filtrar=default&concepto=03-0004", , , , d['03-0004'], , , , , , ],
					["|||Dependencias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=dependencias_lista&filtrar=default&concepto=03-0005", , , , d['03-0005'], , , , , , ],
				["||Relacionados a Contabilidad", , , , , , , , , , , ],
					["|||Plan de Cuentas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_lista&filtrar=default&concepto=03-0025", , , , d['03-0025'], , , , , , ],
                              ["|||Plan de Cuentas (Pub. 20)", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_pub20&filtrar=default&concepto=03-0041", , , , d['03-0041'], , , , , , ],
					["|||Grupos de Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=grupo_centro_costos_lista&filtrar=default&concepto=03-0026", , , , d['03-0026'], , , , , , ],
					["|||Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=centro_costos_lista&filtrar=default&concepto=03-0027", , , , d['03-0027'], , , , , , ],
				["||Relacionados a Presupuesto", , , , , , , , , , , ],
					["|||Tipos de Cuenta", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipo_cuenta_lista&filtrar=default&concepto=03-0034", , , , d['03-0034'], , , , , , ],
					["|||Clasificador Presupuestario", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=clasificador_presupuestario_lista&filtrar=default&concepto=03-0035", , , , d['03-0035'], , , , , , ],
				["||Otros Maestros", , , , , , , , , , , ],
					["|||Paises", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=paises_lista&filtrar=default&concepto=03-0004", , , , d['03-0004'], , , , , , ],
					["|||Estados", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=estados_lista&filtrar=default&concepto=03-0005", , , , d['03-0005'], , , , , , ],
					["|||Municipios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=municipios_lista&filtrar=default&concepto=03-0006", , , , d['03-0006'], , , , , , ],
					["|||Ciudades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=ciudades_lista&filtrar=default&concepto=03-0007", , , , d['03-0007'], , , , , , ],
					["|||Parroquias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parroquias_lista&filtrar=default&concepto=03-0040&_APLICACION="+_A, , , , d['03-0040'], , , , , , ],
					["|||Comunidades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=comunidades_lista&filtrar=default&concepto=07-0042&_APLICACION="+_A, , , , d['07-0042'], , , , , , ],
					["|||Localidades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=localidades_lista&filtrar=default&concepto=03-0043&_APLICACION="+_A, , , , d['03-0043'], , , , , , ],
					["|||Tipos de Pago", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipos_pago_lista&filtrar=default&concepto=03-0008", , , , d['03-0008'], , , , , , ],
					["|||Bancos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=bancos_lista&filtrar=default&concepto=03-0009", , , , d['03-0009'], , , , , , ],
					["|||Unidad Tributaria", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=unidad_tributaria_lista&filtrar=default&concepto=03-0039", , , , d['03-0039'], , , , , , ],            							
			["|Relativos a Compras", , , , , , , , , , , ],
				["||Formas de Pago", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_formapago_lista&filtrar=default&concepto=03-0033", , , , d['03-0033'], , , , , , ],
				["||Clasificaciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/lg_clasificaciones_lista.php?limit=0&concepto=03-0011", , , , d['03-0011'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Clasificaci&oacute;n de Commodities", "<?=$_PARAMETRO["PATHSIA"]?>lg/clasificacion_commodities.php?limit=0&concepto=03-0012", , , , d['03-0012'], , , , , , ],
				["||Commodities", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_commodity_lista&filtrar=default&concepto=03-0013", , , , d['03-0013'], , , , , , ],            						
			["|Relativos a Almacen", , , , , , , , , , , ],
				["||Almacén", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_almacen_lista&filtrar=default&concepto=03-0014&_APLICACION="+_A, , , , d['03-0014'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Tipos de Documentos", "<?=$_PARAMETRO["PATHSIA"]?>lg/tipos_documentos.php?limit=0&concepto=03-0015", , , , d['03-0015'], , , , , , ],
				["||Tipos de Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/tipos_transacciones.php?limit=0&concepto=03-0016", , , , d['03-0016'], , , , , , ],
			["|Relativos a Items", , , , , , , , , , , ],
				["||Items", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_item_lista&filtrar=default&concepto=03-0017&_APLICACION="+_A, , , , d['03-0017'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Items x Almacén", "<?=$_PARAMETRO["PATHSIA"]?>lg/items_x_almacen.php?limit=0&concepto=03-0037&filtrar=DEFAULT", , , , d['03-0037'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Lineas", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_claselinea_lista&filtrar=default&concepto=03-0018", , , , d['03-0018'], , , , , , ],
				["||Familias", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_clasefamilia_lista&filtrar=default&concepto=03-0019", , , , d['03-0018'], , , , , , ],
				["||Sub-Familias", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_clasesubfamilia_lista&filtrar=default&concepto=03-0020", , , , d['03-0020'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Tipos de Items", "<?=$_PARAMETRO["PATHSIA"]?>lg/tipos_items.php?limit=0&concepto=03-0021", , , , d['03-0021'], , , , , , ],
				["||Procedencias", "<?=$_PARAMETRO["PATHSIA"]?>lg/procedencias.php?limit=0&concepto=03-0022", , , , d['03-0022'], , , , , , ],
				["||Unidades de Medida", "<?=$_PARAMETRO["PATHSIA"]?>lg/unidades_medida.php?limit=0&concepto=03-0023", , , , d['03-0023'], , , , , , ],
				["||-",, , , , , , , , , , ],
				["||-",, , , , , , , , , , ],
				["||Marcas", "<?=$_PARAMETRO["PATHSIA"]?>lg/marcas.php?limit=0&concepto=03-0024", , , , d['03-0024'], , , , , , ],
			["|Relativos a Commodities", , , , , , , , , , , ],
				["||Tipos de Transacciones", "<?=$_PARAMETRO["PATHSIA"]?>lg/tipos_transacciones_commodities.php?limit=0&concepto=03-0038", , , , d['03-0038'], , , , , , ],
			["|Otros", , , , , , , , , , , ],
				["||Misceláneos &nbsp; &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=miscelaneos_lista&filtrar=default&concepto=03-0010&_APLICACION="+_A, , , , d['03-0010'], , , , , , ],
				["||Choferes", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_choferes_lista&filtrar=default&concepto=03-0044", , , , d['03-0044'], , , , , , ],
				["||Vehículos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_vehiculos_lista&filtrar=default&concepto=03-0045", , , , d['03-0045'], , , , , , ],
		["Admin.", , , , , , "0", , , , , ],
			["|Seguridad", , , , , , , , , , , ],
				["||Maesto de Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=usuarios&filtrar=default&concepto=04-0001", , , , d['04-0001'], , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=autorizaciones&filtrar=default&concepto=04-0002", , , , d['04-0002'], , , , , , ],
			["|Seguridad Alterna", , , , , , , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=alterna&filtrar=default&concepto=04-0003", , , , d['04-0003'], , , , , , ],
			["|Control de Periodos", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_periodocontrol_lista&concepto=04-0004&filtrar=default", , , , d['04-0004'], , , , , , ],            					
			["|Cierre Mensual", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_cierre_mensual&filtrar=default&concepto=04-0005&limit=0&_APLICACION="+_A, , , , d['04-0005'], , , , , , ],
	];
      dm_initFrame("frmSet", 0, 1, 0);
</script>