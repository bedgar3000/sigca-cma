<script type="text/javascript">
	var _A = "CO";
	var menuItems = [

		["Ventas", , , , , , "0", , , , , ],
			["|Cotización &nbsp; &nbsp; &nbsp;", , , , , , , , , , , ],
				["||Nueva Cotización", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cotizacion_form&opcion=nuevo&origen=framemain&concepto=01-0001&_APLICACION="+_A, , , , d['01-0001'], , , , , , ],
				["||Listar Cotizaciones", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cotizacion_lista&filtrar=default&lista=listar&concepto=01-0002&_APLICACION="+_A, , , , d['01-0002'], , , , , , ],
				["||Aprobar Cotizaciones", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cotizacion_lista&filtrar=default&lista=aprobar&concepto=01-0003&_APLICACION="+_A, , , , d['01-0003'], , , , , , ],
				["||Generar Pedidos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cotizacion_generar_lista&filtrar=default&lista=generar&concepto=01-0004&_APLICACION="+_A, , , , d['01-0004'], , , , , , ],
			["|Pedidos &nbsp; &nbsp; &nbsp;", , , , , , , , , , , ],
				["||Nuevo Pedido", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_pedidos_form&opcion=nuevo&origen=framemain&concepto=01-0005&_APLICACION="+_A, , , , d['01-0005'], , , , , , ],
				["||Listar Pedidos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_pedidos_lista&filtrar=default&lista=listar&concepto=01-0006&_APLICACION="+_A, , , , d['01-0006'], , , , , , ],
				<?php if ($_PARAMETRO['PEDAAUTOAP'] <> 'S') { ?>
				["||Aprobar Pedidos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_pedidos_lista&filtrar=default&lista=aprobar&concepto=01-0007&_APLICACION="+_A, , , , d['01-0007'], , , , , , ],
				<?php } ?>
				["||Facturar Pedidos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_pedidos_lista&filtrar=default&lista=facturar&concepto=01-0008&_APLICACION="+_A, , , , d['01-0008'], , , , , , ],
			["|Documentos &nbsp; &nbsp; &nbsp;", , , , , , , , , , , ],
				["||Nuevo Documento", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_documento_form&opcion=nuevo&origen=framemain&concepto=01-0009&_APLICACION="+_A, , , , d['01-0009'], , , , , , ],
				["||Listar Documentos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_documento_lista&filtrar=default&lista=listar&concepto=01-0010&_APLICACION="+_A, , , , d['01-0010'], , , , , , ],
				["||Listar de Adelantos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_documentoadelanto_lista&filtrar=default&lista=listar&concepto=01-0012&_APLICACION="+_A, , , , d['01-0012'], , , , , , ],

		["Cobranzas", , , , , , "0", , , , , ],
			["|Gestión &nbsp; &nbsp; &nbsp;", , , , , , , , , , , ],
				["||Nueva Cobranza &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cobranza_form&opcion=nuevo&origen=framemain&concepto=02-0001&_APLICACION="+_A, , , , d['02-0001'], , , , , , ],
				["||Listar Cobranzas", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cobranza_lista&filtrar=default&lista=listar&concepto=02-0002&_APLICACION="+_A, , , , d['02-0002'], , , , , , ],
				<?php if ($_PARAMETRO['COBSTATAP'] == 'S') { ?>
					["||Aprobar Cobranzas", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cobranza_lista&filtrar=default&lista=aprobar&concepto=02-0003&_APLICACION="+_A, , , , d['02-0003'], , , , , , ],
				<?php } ?>
			["|Cierre de Cajas", , , , , , , , , , , ],
				["||Nuevo Cierre de Caja &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cierrecaja_form&opcion=nuevo&origen=framemain&concepto=02-0004&_APLICACION="+_A, , , , d['02-0004'], , , , , , ],
				["||Listar Cierres de Caja", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cierrecaja_lista&filtrar=default&lista=listar&concepto=02-0005&_APLICACION="+_A, , , , d['02-0005'], , , , , , ],
				["||Aprobar Cierres de Caja", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cierrecaja_lista&filtrar=default&lista=aprobar&concepto=02-0006&_APLICACION="+_A, , , , d['02-0006'], , , , , , ],
			["|Arqueo de Cajas", , , , , , , , , , , ],
				["||Nuevo Arqueo de Caja", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_arqueocaja_form&opcion=nuevo&origen=framemain&concepto=02-0007&_APLICACION="+_A, , , , d['02-0007'], , , , , , ],
				["||Listar Arqueos de Caja", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_arqueocaja_lista&filtrar=default&lista=listar&concepto=02-0008&_APLICACION="+_A, , , , d['02-0008'], , , , , , ],
				["||Aprobar Arqueos de Caja &nbsp; &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_arqueocaja_lista&filtrar=default&lista=aprobar&concepto=02-0009&_APLICACION="+_A, , , , d['02-0009'], , , , , , ],

		["Procesos", , , , , , "0", , , , , ],
			["|Registro de Ventas &nbsp;", , , , , , , , , , , ],
				["||Importar Registros de Compras &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_registroventas_importar&origen=framemain&concepto=03-0001&_APLICACION="+_A, , , , d['03-0001'], , , , , , ],
				["||Listar Registros de Ventas", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_registroventas_lista&filtrar=default&lista=listar&concepto=03-0002&_APLICACION="+_A, , , , d['03-0002'], , , , , , ],
			["|Control de Lista de Precios &nbsp;", , , , , , , , , , , ],
				["||Lista de Precios Items", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_precioshistoria_lista&filtrar=default&lista=listar&concepto=03-0003&_APLICACION="+_A, , , , d['03-0003'], , , , , , ],

		["Reportes", , , , , , "0", , , , , ],
			["|Registros de Ventas &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_reporte_registroventas_filtro&filtrar=default&concepto=07-0001&_APLICACION="+_A, , , , d['07-0001'], , , , , , ],

		["Maestros", , , , , , "0", , , , , ],
			["|Del Sistema SIA", , , , , , , , , , , ],
				["||Propios del Sistema", , , , , , , , , , , ],
					["|||Aplicaciones", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=aplicaciones_lista&filtrar=default&concepto=80-0001&_APLICACION="+_A, , , , d['80-0001'], , , , , , ],
					["|||Par&aacute;metros", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parametros_lista&filtrar=default&concepto=80-0002&_APLICACION="+_A, , , , d['80-0002'], , , , , , ],
				["||Relacionados a Personas", , , , , , , , , , , ],
					["|||Personas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=personas_lista&filtrar=default&concepto=80-0003&_APLICACION="+_A, , , , d['80-0003'], , , , , , ],
					["|||Organismos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=organismos_lista&filtrar=default&concepto=80-0004&_APLICACION="+_A, , , , d['80-0004'], , , , , , ],
					["|||Dependencias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=dependencias_lista&filtrar=default&concepto=80-0005&_APLICACION="+_A, , , , d['80-0005'], , , , , , ],
				["||Relacionados a Contabilidad", , , , , , , , , , , ],
					["|||Plan de Cuentas", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_lista&filtrar=default&concepto=80-0006&_APLICACION="+_A, , , , d['80-0006'], , , , , , ],
					["|||Plan de Cuentas (Pub. 20)", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=plan_cuentas_pub20&filtrar=default&concepto=80-0007&_APLICACION="+_A, , , , d['80-0007'], , , , , , ],
					["|||Grupos de Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=grupo_centro_costos_lista&filtrar=default&concepto=80-0008&_APLICACION="+_A, , , , d['80-0008'], , , , , , ],
					["|||Centros de Costos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=centro_costos_lista&filtrar=default&concepto=80-0009&_APLICACION="+_A, , , , d['80-0009'], , , , , , ],
				["||Relacionados a Presupuesto", , , , , , , , , , , ],
					["|||Tipos de Cuenta", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipo_cuenta_lista&filtrar=default&concepto=80-0010&_APLICACION="+_A, , , , d['80-0010'], , , , , , ],
					["|||Clasificador Presupuestario", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=clasificador_presupuestario_lista&filtrar=default&concepto=80-0011&_APLICACION="+_A, , , , d['80-0011'], , , , , , ],
				["||Otros Maestros", , , , , , , , , , , ],
					["|||Paises", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=paises_lista&filtrar=default&concepto=80-0012&_APLICACION="+_A, , , , d['80-0012'], , , , , , ],
					["|||Estados", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=estados_lista&filtrar=default&concepto=80-0013&_APLICACION="+_A, , , , d['80-0013'], , , , , , ],
					["|||Municipios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=municipios_lista&filtrar=default&concepto=80-0014&_APLICACION="+_A, , , , d['80-0014'], , , , , , ],
					["|||Ciudades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=ciudades_lista&filtrar=default&concepto=80-0015&_APLICACION="+_A, , , , d['80-0015'], , , , , , ],
					["|||Parroquias", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=parroquias_lista&filtrar=default&concepto=80-0016&_APLICACION="+_A, , , , d['80-0016'], , , , , , ],
					["|||Comunidades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=comunidades_lista&filtrar=default&concepto=80-0017&_APLICACION="+_A, , , , d['80-0017'], , , , , , ],
					["|||Localidades", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=localidades_lista&filtrar=default&concepto=80-0023&_APLICACION="+_A, , , , d['80-0023'], , , , , , ],
					["|||Tipos de Pago", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=tipos_pago_lista&filtrar=default&concepto=80-0018&_APLICACION="+_A, , , , d['80-0018'], , , , , , ],
					["|||Bancos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=bancos_lista&filtrar=default&concepto=80-0019&_APLICACION="+_A, , , , d['80-0019'], , , , , , ],
					["|||Unidad Tributaria", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=unidad_tributaria_lista&filtrar=default&concepto=80-0020&_APLICACION="+_A, , , , d['80-0020'], , , , , , ],
			["|Relacionados a Ctas. x Pagar", , , , , , , , , , , ],
				["||Impuestos", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_impuestos_lista&filtrar=default&concepto=08-0022", , , , d['08-0022'], , , , , , ],
				["||Formas de Pago", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_formapago_lista&filtrar=default&concepto=08-0023", , , , d['08-0023'], , , , , , ],
				["||Cuentas Bancarias", "<?=$_PARAMETRO["PATHSIA"]?>ap/gehen.php?anz=ap_cuentas_bancarias_lista&filtrar=default&concepto=08-0024", , , , d['08-0024'], , , , , , ],
			["|Relacionados a Ventas", , , , , , , , , , , ],
				["||Servicios", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_servicios_lista&filtrar=default&concepto=08-0025", , , , d['08-0025'], , , , , , ],
				["||Items", "<?=$_PARAMETRO["PATHSIA"]?>lg/gehen.php?anz=lg_item_lista&filtrar=default&fFlagDisponible=S&concepto=08-0026&_APLICACION="+_A, , , , d['08-0026'], , , , , , ],
				["||Ruta de Despachos &nbsp; &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_rutadespacho_lista&filtrar=default&concepto=08-0027", , , , d['08-0027'], , , , , , ],
				["||Lista de Precios", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_precios_lista&filtrar=default&concepto=08-0028", , , , d['08-0028'], , , , , , ],
				["||Vendedores", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_vendedor_lista&filtrar=default&concepto=08-0034", , , , d['08-0034'], , , , , , ],
			["|Relacionados a Documentos", , , , , , , , , , , ],
				["||Tipos de Documentos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_tipodocumento_lista&filtrar=default&concepto=08-0029", , , , d['08-0029'], , , , , , ],
				["||Establecimientos Fiscal", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_establecimientofiscal_lista&filtrar=default&concepto=08-0030", , , , d['08-0030'], , , , , , ],
				["||Series por Establecimiento", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_seriefiscal_lista&filtrar=default&concepto=08-0031", , , , d['08-0031'], , , , , , ],
				["||Autorización Fiscal", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_fiscalautorizacion_lista&filtrar=default&concepto=08-0032", , , , d['08-0032'], , , , , , ],
				["||Maestro de Correlativos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_correlativodocumento_lista&filtrar=default&concepto=08-0039", , , , d['08-0039'], , , , , , ],
			["|Relacionados a Cobranzas", , , , , , , , , , , ],
				["||Tipos de Pago Clientes", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_tipopago_lista&filtrar=default&concepto=08-0033", , , , d['08-0033'], , , , , , ],
				["||Tarjetas Debitos/Creditos", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_tipotarjeta_lista&filtrar=default&concepto=08-0035", , , , d['08-0035'], , , , , , ],
				["||Cajeros", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_cajeros_lista&filtrar=default&concepto=08-0036", , , , d['08-0036'], , , , , , ],
				["||Fondos de Cobranza", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_fondocaja_lista&filtrar=default&concepto=08-0037", , , , d['08-0037'], , , , , , ],
				["||Conceptos de Caja", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_conceptocaja_lista&filtrar=default&concepto=08-0038", , , , d['08-0038'], , , , , , ],
			["|Otros", , , , , , , , , , , ],
				["||Miscel&aacute;neos", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=miscelaneos_lista&filtrar=default&concepto=80-0021&_APLICACION="+_A, , , , d['80-0021'], , , , , , ],
				["||Cómite Local de Abastecimiento &nbsp; &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_comitelocal_lista&filtrar=default&concepto=08-0040&_APLICACION="+_A, , , , d['08-0040'], , , , , , ],
			
		["Admin.", , , , , , "0", , , , , ],
			["|Seguridad", , , , , , , , , , , ],
				["||Maesto de Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=usuarios&filtrar=default&concepto=90-0001&_APLICACION="+_A, , , , d['90-0001'], , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=autorizaciones&filtrar=default&concepto=90-0002&_APLICACION="+_A, , , , d['90-0002'], , , , , , ],
			["|Seguridad Alterna", , , , , , , , , , , ],
				["||Dar Autorizaciones a Usuarios", "<?=$_PARAMETRO["PATHSIA"]?>comunes/gehen.php?anz=usuarios_lista&lista=alterna&filtrar=default&concepto=90-0003&_APLICACION="+_A, , , , d['90-0003'], , , , , , ],

			<?php if ($_PARAMETRO['CONTONCO'] == 'S' || $_PARAMETRO['CONTPUB20'] == 'S') { ?>
				["|Generación de Vouchers &nbsp;", , , , , , , , , , , ],
					<?php if ($_PARAMETRO['CONTONCO'] == 'S') { ?>
						["||Contabilidad ONCOP &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_generacion_vouchers_lista&lista=oncop&filtrar=default&concepto=90-0004", , , , d['90-0004'], , , , , , ],
					<?php }?>
					<?php if ($_PARAMETRO['CONTPUB20'] == 'S') { ?>
						["||Contabilidad Pub.20 &nbsp;", "<?=$_PARAMETRO["PATHSIA"]?>co/gehen.php?anz=co_generacion_vouchers_lista&lista=pub20&filtrar=default&concepto=90-0005", , , , d['90-0005'], , , , , , ],
					<?php }?>
			<?php }?>
	];
	dm_initFrame("frmSet", 0, 1, 0);
</script>