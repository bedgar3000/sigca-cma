﻿// JavaScript Document

$(document).ready(function() {
	inicializar();
});
		
$.fn.extend({
	insertAtCaret: function(myValue) {
		var obj;
		if( typeof this[0].name !='undefined' ) obj = this[0];
		else obj = this;
	
		if ($.browser.msie) {
			obj.focus();
			sel = document.selection.createRange();
			sel.text = myValue;
			obj.focus();
		}
		else if ($.browser.mozilla || $.browser.webkit) {
			var startPos = obj.selectionStart;
			var endPos = obj.selectionEnd;
			var scrollTop = obj.scrollTop;
			obj.value = obj.value.substring(0, startPos)+myValue+obj.value.substring(endPos,obj.value.length);
			obj.focus();
			obj.selectionStart = startPos + myValue.length;
			obj.selectionEnd = startPos + myValue.length;
			obj.scrollTop = scrollTop;
		} else {
			obj.value += myValue;
			obj.focus();
		}
	}
});

function inicializar() {
	$(".datepicker").datepicker();
	$(".datepicker").datepicker("option", "showAnim", "slideDown");
	$("#cajaModal").dialog({
		autoOpen: false,
		modal: true,
		show: "fold",
		hide: "scale"
	});
	$("input:button").addClass("boton");
	$("input:submit").addClass("boton");
	$(".progressbar").progressbar({
		value: 100
	});
	if (typeof jQuery.fn.formatCurrency == 'function') {
		$(".currency").blur(function() {
			if ($(this).val().trim() == "") $(this).val("0,00")
			else $(this).formatCurrency();
		});
		$(".currency5").blur(function() {
			if ($(this).val().trim() == "") $(this).val("0,00000")
			else $(this).formatCurrency({ roundToDecimalPlace: 5 });
		});
	}
	if (typeof jQuery.fn.timeEntry == 'function') {
		$('.time').timeEntry();
	}
	if (typeof jQuery.fn.mask == 'function') {
		$('.integer').mask("###0", {reverse: true, maxlength: false});
		$('.documento').mask('Z000000000', {translation: {'Z': {pattern: /[0-9JGVEjgve]/, optional: true}}});
		$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});
		$('.mac_address').mask('AA-AA-AA-AA-AA-AA');
		$('.datepicker').mask('D0-M0-0000', {translation: {'D': {pattern: /[0-3]/}, 'M': {pattern: /[0-1]/} }} );
		$('.periodo').mask('0000-00');
		$('.phone').mask('0000-0000000');
	}
	if (typeof jQuery.fn.fancytree == 'function') {
		$(".tree").fancytree({ icons: false });
	}
	if (typeof jQuery.fn.validCampoFranz == 'function') {
		$('.number').validCampoFranz('1234567890');
	}
	if (typeof jQuery.fn.number == 'function') {
		$('input.number').number( true, 2, ',', '.');
		$('input.number5').number( true, 5, ',', '.');
	}
}
function inicializarParent() {
	parent.$(".datepicker").datepicker();
	parent.$(".datepicker").datepicker("option", "showAnim", "slideDown");
	parent.$("#cajaModal").dialog({
		autoOpen: false,
		modal: true,
		show: "fold",
		hide: "scale"
	});
	$("input:button").addClass("boton");
	$("input:submit").addClass("boton");
	parent.$(".progressbar").progressbar({
		value: 100
	});
	if (typeof jQuery.fn.formatCurrency == 'function') {
		parent.$(".currency").blur(function() {
			if ($(this).val().trim() == "") $(this).val("0,00")
			else $(this).formatCurrency();
		});
		parent.$(".currency5").blur(function() {
			if ($(this).val().trim() == "") $(this).val("0,00000")
			else $(this).formatCurrency({ roundToDecimalPlace: 5 });
		});
	}
	if (typeof jQuery.fn.timeEntry == 'function') {
		parent.$('.time').timeEntry();
	}
	if (typeof jQuery.fn.mask == 'function') {
		parent.$('.integer').mask("#", {reverse: true, maxlength: false});
		parent.$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {translation: {'Z': {pattern: /[0-9]/, optional: true}}});
		parent.$('.mac_address').mask('AA-AA-AA-AA-AA-AA');
		parent.$('.datepicker').mask('D0-M0-0000', {translation: {'D': {pattern: /[0-3]/}, 'M': {pattern: /[0-1]/} }} );
		parent.$('.periodo').mask('0000-00');
		parent.$('.phone').mask('0000-0000000');
	}
	if (typeof jQuery.fn.fancytree == 'function') {
		parent.$(".tree").fancytree({ icons: false });
	}
	if (typeof jQuery.fn.validCampoFranz == 'function') {
		parent.$('.number').validCampoFranz('1234567890');
	}
	if (typeof jQuery.fn.number == 'function') {
		parent.$('input.number').number( true, 2, ',', '.');
		parent.$('input.number5').number( true, 5, ',', '.');
	}
}
function inicializarOpener() {
	opener.$(".datepicker").datepicker();
	opener.$(".datepicker").datepicker("option", "showAnim", "slideDown");
	opener.$("#cajaModal").dialog({
		autoOpen: false,
		modal: true,
		show: "fold",
		hide: "scale"
	});
	opener.$(".progressbar").progressbar({
		value: 100
	});
}

//	valido formulario
function formSubmit(url, data, form, flagContinuar) {
	bloqueo(true);
	if (!form) var form = document.getElementById($('form').attr('id'));
	var idform = form.id;
	//	ajax
	$.ajax({
		type: "POST",
		url: url + ".php",
		data: data+"&"+$('#'+idform).serialize(),
		async: false,
		success: function(resp) {
			if (resp.trim() != '') cajaModal(resp.trim(), 'error', 400);
			else if (flagContinuar) location.reload();
			else {
				if ($('#'+idform).data('ventana') == 'modal') {
					var parent_form = parent.document.getElementById(parent.$('form').attr('id'));
					parent_form.submit();
					//parent.$.prettyPhoto.close();
				}
				else form.submit();
			}
		}
	});
	return false;
}

//	valido formulario
function formSubmitWithReturn(url, data, form, flagContinuar) {
	bloqueo(true);
	if (!form) var form = document.getElementById($('form').attr('id'));
	var idform = form.id;
	//	ajax
	$.ajax({
		type: "POST",
		url: url + ".php",
		data: data+"&"+$('#'+idform).serialize(),
		async: false,
		success: function(resp) {
			var data = resp.split("|");

			if (data[0].trim() != '') cajaModal(data[0].trim(), 'error', 400);
			else if (flagContinuar) {
				if (data[1].trim()) {
					cajaModal(data[1].trim(), 'success', 400, 'location.reload();');
				}
				else location.reload();
			}
			else {
				if (data[1].trim()) {
					cajaModal(data[1].trim(), 'success', 500, 'document.getElementById(\''+idform+'\').submit();');
				}
				else form.submit();
			}
		}
	});
	return false;
}

//	muestro una caja modal
function cajaModal(texto, tipo, w, funct) {
	if (!tipo) var tipo = 'error';
	if (!w) var w = 400;
	bloqueo(false);
	$("#cajaModal").dialog({
		buttons: {
			"Aceptar": function() { 
				if (funct) eval(funct);
				$(this).dialog("close");
			}
		}
	});
	
	if (tipo == "info") $("#cajaModal").dialog({ title: "<img src='../imagenes/info.png' width='24' align='absmiddle' />Información", width: w });
	else if (tipo == "exito") $("#cajaModal").dialog({ title: "<img src='../imagenes/exito.png' width='24' align='absmiddle' />Exito", width: w });
	else if (tipo == "error") $("#cajaModal").dialog({ title: "<img src='../imagenes/warning.png' width='24' align='absmiddle' />Error", width: w });
	else if (tipo == "error_lista") $("#cajaModal").dialog({ title: "<img src='../../imagenes/warning.png' width='24' align='absmiddle' />Error", width: w });
	else if (tipo == "info_lista") $("#cajaModal").dialog({ title: "<img src='../../imagenes/info.png' width='24' align='absmiddle' />Información", width: w });
	else $("#cajaModal").dialog({ title: "<img src='../imagenes/info.png' width='24' align='absmiddle' />Información", width: w });
	$("#cajaModal").html(texto);
	$('#cajaModal').dialog('open');
}
//	------------------------------------------

//	muestro una caja modal
function cajaModalExito(texto, w, form) {
	$("#cajaModal").dialog({
		buttons: {
			"Aceptar": function() { 
				form.submit();
			}
		}
	});	
	$("#cajaModal").dialog({ 
		title: "<img src='../imagenes/info.png' width='24' align='absmiddle' />Información", 
		width: w 
	});
	$("#cajaModal").html(texto);
	$('#cajaModal').dialog('open');
}
//	------------------------------------------

//	muestro una caja modal
function cajaModalConfirm(texto, w, raiz) {	
	if (raiz) {
		$("#cajaModal").dialog({ 
			title: "<img src='imagenes/info.png' width='24' align='absmiddle' />Confirmación", 
			width: w 
		});
	} else {
		$("#cajaModal").dialog({ 
			title: "<img src='../imagenes/info.png' width='24' align='absmiddle' />Confirmación", 
			width: w 
		});
	}
	$("#cajaModal").html(texto);
	$('#cajaModal').dialog('open');
}
//	------------------------------------------

//	muestro una caja modal
function cajaModalParent(texto, tipo, w, funct) {
	parent.$(".div-progressbar").css("display", "none");
	parent.$(".boton").prop("disabled", false);
	parent.$("#cajaModal").dialog({
		buttons: {
			"Aceptar": function() { 
				parent.$(this).dialog("close");
				if (funct) eval(funct);
			}
		}
	});
	
	if (tipo == "info") parent.$("#cajaModal").dialog({ title: "<img src='../imagenes/info.png' width='24' align='absmiddle' />Información", width: w });
	else if (tipo == "exito") parent.$("#cajaModal").dialog({ title: "<img src='../imagenes/exito.png' width='24' align='absmiddle' />Exito", width: w });
	else if (tipo == "error") parent.$("#cajaModal").dialog({ title: "<img src='../imagenes/warning.png' width='24' align='absmiddle' />Error", width: w });
	else if (tipo == "error_lista") parent.$("#cajaModal").dialog({ title: "<img src='../../imagenes/warning.png' width='24' align='absmiddle' />Error", width: w });
	parent.$("#cajaModal").html(texto);
	parent.$('#cajaModal').dialog('open');
}
//	------------------------------------------

//	muestro una caja modal
function cajaModalConfirmParent(texto, w) {	
	parent.$("#cajaModal").dialog({ 
		title: "<img src='../imagenes/info.png' width='24' align='absmiddle' />Confirmación", 
		width: w 
	});
	parent.$("#cajaModal").html(texto);
	parent.$('#cajaModal').dialog('open');
}
//	------------------------------------------

//	FUNCION SELECT DEPENDIENTE
function loadSelect(selectDestino, data, php, destinos) {
	//	valor vacio
	var option = "<option value=''>&nbsp;</option>";
	selectDestino.empty().append(option);
	//	recorro si hay otras listas
	if (destinos) {
		for(var i=0; i<destinos.length; i++) {
			var idSelectDestino = "#" + destinos[i];
			if ($(idSelectDestino).length > 0) $(idSelectDestino).empty().append(option);
		}
	}
	//	si no selecciono un valor limpio lista destino sino ejecuto el ajax
	if (php) var url = "../lib/fphp_selects.php";
	else var url = "../fphp_selects.php";
	//	ajax
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		async: true,
		success: function(resp) {
			selectDestino.empty().append(resp);
		}
	});
}
//	------------------------------------------

//	FUNCION SELECT DEPENDIENTE
function loadSelectParent(selectDestino, data, php, destinos) {
	//	valor vacio
	var option = "<option value=''>&nbsp;</option>";
	selectDestino.empty().append(option);
	//	recorro si hay otras listas
	if (destinos) {
		for(var i=0; i<destinos.length; i++) {
			var idSelectDestino = "#" + destinos[i];
			if (parent.$(idSelectDestino).length > 0) parent.$(idSelectDestino).empty().append(option);
		}
	}
	//	si no selecciono un valor limpio lista destino sino ejecuto el ajax
	if (php) var url = "../lib/fphp_selects.php";
	else var url = "../fphp_selects.php";
	//	ajax
	$.ajax({
		type: "POST",
		url: url,
		data: data,
		async: true,
		success: function(resp) {
			selectDestino.empty().append(resp);
		}
	});
}
//	------------------------------------------

//	FUNCION SELECT DEPENDIENTE (HASTA 3 SELECTS)
function getOptionsSelect(optSelectOrigen, tabla, idSelectDestino1, php, idSelectDestino2, idSelectDestino3) {
	var selectDestino1 = "#" + idSelectDestino1;
	if (idSelectDestino2) var selectDestino2 = "#" + idSelectDestino2;
	if (idSelectDestino3) var selectDestino3 = "#" + idSelectDestino3;
	var option = "<option value=''>&nbsp;</option>";
	//
	if (idSelectDestino2) $(selectDestino2).empty().append(option);
	if (idSelectDestino3) $(selectDestino3).empty().append(option);
	//
	if (optSelectOrigen == "") {
		$(selectDestino1).empty().append(option);
	} else {
		if (php) var url = "../lib/fphp_selects.php";
		else var url = "../fphp_selects.php";
		$.ajax({
			type: "POST",
			url: url,
			data: "tabla="+tabla+"&idSelectDestino="+idSelectDestino1+"&opcion="+optSelectOrigen,
			async: true,
			success: function(resp) {
				$(selectDestino1).empty().append(resp);
			}
		});
	}
}
//	------------------------------------------

//	FUNCION SELECT DEPENDIENTE
function getOptionsSelect2(tabla, idSelectDestino1, php, optSelectOrigen1, optSelectOrigen2) {
	var selectDestino1 = "#" + idSelectDestino1;
	var option = "<option value=''>&nbsp;</option>";
	//
	if (optSelectOrigen1 == "" || optSelectOrigen2 == "") {
		$(selectDestino1).empty().append(option);
	} else {
		if (php) var url = "../lib/fphp_selects.php";
		else var url = "../fphp_selects.php";
		$.ajax({
			type: "POST",
			url: url,
			data: "tabla="+tabla+"&idSelectDestino="+idSelectDestino1+"&opcion1="+optSelectOrigen1+"&opcion2="+optSelectOrigen2,
			async: false,
			success: function(resp) {
				$(selectDestino1).empty().append(resp);
			}
		});
	}
}
//	------------------------------------------

//	FUNCION SELECT DEPENDIENTE MULTIPLE
function getOptionsSelectMultiple(selectDestino, tabla, data, php) {
	var option = "<option value=''>&nbsp;</option>";
	selectDestino.empty().append(option);
	if (php) var url = "../lib/fphp_selects.php";
	else var url = "../fphp_selects.php";
	//
	$.ajax({
		type: "POST",
		url: url,
		data: "tabla="+tabla+"&"+data,
		async: true,
		success: function(resp) {
			selectDestino.empty().append(resp);
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListado(codvalor, nomvalor, cod, nom, valor3, campo3, valor4, campo4) {
	opener.document.getElementById(cod).value = codvalor;
	opener.document.getElementById(nom).value = nomvalor;
	if (campo3) opener.document.getElementById(campo3).value = valor3;
	if (campo4) opener.document.getElementById(campo4).value = valor4;
	window.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selLista(valores, inputs) {
	if (inputs) {
		for(var i=0; i<inputs.length; i++) {
			if (parent.$("#"+inputs[i]).length > 0) parent.$("#"+inputs[i]).val(valores[i]);
		}
	}
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListaOpener(valores, inputs) {
	if (inputs) {
		for(var i=0; i<inputs.length; i++) {
			if (opener.$("#"+inputs[i]).length > 0) opener.$("#"+inputs[i]).val(valores[i]);
		}
	}
	window.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListado2(codvalor, nomvalor, cod, nom, valor3, campo3, valor4, campo4, valor5, campo5, valor6, campo6, valor7, campo7) {
	parent.$("#"+cod).val(codvalor);
	parent.$("#"+nom).val(nomvalor);
	parent.$("#"+campo3).val(valor3);
	parent.$("#"+campo4).val(valor4);
	parent.$("#"+campo5).val(valor5);
	parent.$("#"+campo6).val(valor6);
	parent.$("#"+campo7).val(valor7);
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListado3(codvalor, nomvalor, campo, cod, nom ) {
	if(campo==1){
	   parent.$("#"+cod).val(codvalor);
	   parent.$("#"+nom).val(nomvalor);
	}else 
	 if(campo==2){
	   opener.document.getElementById("cod").value = "codvalor"; 
	   opener.document.getElementById("nom").value = "nomvalor";
	 }
	
	parent.$.prettyPhoto.close();
}

//	------------------------------------------
// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoPartidaItem(cod_partida, CodCuenta, CodCuentaPub20) {
	parent.$("#PartidaPresupuestal").val(cod_partida);
	parent.$("#CtaGasto").val(CodCuenta);
	parent.$("#CtaGastoPub20").val(CodCuentaPub20);
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

function selListadoIFrame(iframe, codvalor, nomvalor, cod, nom, valor3, campo3, valor4, campo4) {
	parent.$("#"+iframe).contents().find("body #"+cod).val(codvalor);
	parent.$("#"+iframe).contents().find("body #"+nom).val(nomvalor);
	parent.$("#"+iframe).contents().find("body #"+campo3).val(valor3);
	parent.$("#"+iframe).contents().find("body #"+campo4).val(valor4);
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoVacacionPeriodo(codvalor, nomvalor, cod, nom, valor3, campo3, valor4, campo4) {
	parent.$("#"+cod).val(codvalor);
	parent.$("#"+nom).val(nomvalor);
	parent.$("#"+campo3).val(valor3);
	parent.$("#"+campo4).val(valor4);
	parent.$("#lista_detalles").append("");
	parent.$("#TotalPendientes").val("0,00");
	parent.$("#TotalNroDias").val("0,00");
	var FechaSalida = parent.$("#FechaSalida").val();
	
	//	ajax
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoVacacionPeriodo&CodPersona="+valor3+"&FechaSalida="+FechaSalida,
		async: false,
		success: function(resp) {
			var partes = resp.split("|");
			parent.$("#divTotalPendientes").html(partes[0]);
			parent.$("#CodOrganismo").html(partes[1]);
			parent.$("#CodDependencia").html(partes[2]);
			parent.$("#NroDias").val(partes[0]);
			//
			if (!valFecha(FechaSalida)) parent.$("#lista_detalles").html("");
			else {
				parent.$("#lista_detalles").html(partes[3]);
				parent.$("#FechaTermino").val(partes[4]);
				parent.$("#FechaIncorporacion").val(partes[5]);
			}
			//
			totalizarPeriodoVacaciones2();
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoTransaccionCommodity(codvalor, nomvalor, cod, nom) {
	parent.document.getElementById(cod).value = codvalor;
	parent.document.getElementById(nom).value = nomvalor;
	parent.$(".cell.ubicacion").val(codvalor);
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoLista(sel, codvalor, nomvalor, cod, nom, valor3, campo3, valor4, campo4, valor5, campo5, valor6, campo6) {
	var seldetalle = parent.document.getElementById(sel).value;
	var partes = seldetalle.split("_");
	var campocod = cod + "_" + partes[1];
	var camponom = nom + "_" + partes[1];
	
	if (parent.document.getElementById(campocod)) {
		parent.document.getElementById(campocod).value = codvalor;
	}	
	if (parent.document.getElementById(camponom)) {
		parent.document.getElementById(camponom).value = nomvalor;
	}
	if (campo3) {
		var campo3 = campo3 + "_" + partes[1];
		parent.document.getElementById(campo3).value = valor3;
	}
	if (campo4) {
		var campo4 = campo4 + "_" + partes[1];
		parent.document.getElementById(campo4).value = valor4;
	}
	if (campo5) {
		var campo5 = campo5 + "_" + partes[1];
		parent.document.getElementById(campo5).value = valor5;
	}
	if (campo6) {
		var campo6 = campo6 + "_" + partes[1];
		parent.document.getElementById(campo6).value = valor6;
	}
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoListaParent(sel, campos, valores) {
	var seldetalle = parent.$('#'+sel).val();
	var partes = seldetalle.split("_");
	//	
	if (campos) {
		for(var i=0; i<campos.length; i++) {
			var campo = "#" + campos[i] + "_" + partes[1];
			if (parent.$(campo).length > 0) parent.$(campo).val(valores[i]);
		}
	}
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoListaOpener(sel, campos, valores) {
	var seldetalle = opener.$('#'+sel).val();
	var partes = seldetalle.split("_");
	//	
	if (campos) {
		for(var i=0; i<campos.length; i++) {
			var campo = "#" + campos[i] + "_" + partes[1];
			if (opener.$(campo).length > 0) opener.$(campo).val(valores[i]);
		}
	}
	window.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function conceptos_perfil_partida_sel(sel, cod_partida, CodCuenta, CodCuentaPub20, TipoSaldo) {
	var sel_conceptos = parent.$("#"+sel).val();
	var partes = sel_conceptos.split("_");
	var id = partes[1];
	parent.$("#cod_partida_"+id).val(cod_partida);
	if (TipoSaldo == "D") {
		parent.$("#CuentaDebe_"+id).val(CodCuenta);
		parent.$("#CuentaDebePub20_"+id).val(CodCuentaPub20);
	} else {
		parent.$("#CuentaHaber_"+id).val(CodCuenta);
		parent.$("#CuentaHaberPub20_"+id).val(CodCuentaPub20);
	}
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoOrdenCompraPersona(CodPersona) {
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoOrdenCompraPersona&CodPersona="+CodPersona,
		async: false,
		success: function(resp) {
			var datos = resp.split("|");
			//	valores
			parent.$("#CodProveedor").val(CodPersona);
			parent.$("#NomProveedor").val(datos[0]);
			parent.$("#CodFormaPago").val(datos[2]);
			parent.$("#FactorImpuesto").val(datos[3]);
			parent.$("#CodTipoServicio").html("").append(datos[4]);
			parent.document.getElementById("CodTipoServicio").value = datos[1];
			parent.$("#btItem").removeAttr("disabled");
			parent.$("#btCommodity").removeAttr("disabled");
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoOrdenServicioPersona(CodPersona) {
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoOrdenServicioPersona&CodPersona="+CodPersona,
		async: false,
		success: function(resp) {
			var datos = resp.split("|");
			//	valores
			parent.$("#CodProveedor").val(CodPersona);
			parent.$("#NomProveedor").val(datos[0]);
			parent.$("#CodFormaPago").val(datos[2]);
			parent.$("#CodTipoPago").val(datos[3]);
			parent.$("#FactorImpuesto").val(datos[4]);
			parent.$("#CodTipoServicio").html("").append(datos[5]);
			parent.document.getElementById("CodTipoServicio").value = datos[1];
			parent.$("#btCommodity").removeAttr("disabled");
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoProrrogas(CodActuacion) {
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoProrrogas&CodActuacion="+CodActuacion,
		async: false,
		success: function(resp) {
			parent.$("#CodActuacion").val(CodActuacion);
			parent.$("#tabla_actividades").html(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoProrrogasValoracionJuridica(CodValJur) {
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoProrrogasValoracionJuridica&CodValJur="+CodValJur,
		async: false,
		success: function(resp) {
			parent.$("#CodValJur").val(CodValJur);
			parent.$("#tabla_actividades").html(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoProrrogasDeterminacionValoracion(CodValJurDet) {
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoProrrogasDeterminacionValoracion&CodValJurDet="+CodValJurDet,
		async: false,
		success: function(resp) {
			parent.$("#CodValJurDet").val(CodValJurDet);
			parent.$("#tabla_actividades").html(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoProrrogasPotestadInvestigativa(CodPotestad) {
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoProrrogasPotestadInvestigativa&CodPotestad="+CodPotestad,
		async: false,
		success: function(resp) {
			parent.$("#CodPotestad").val(CodPotestad);
			parent.$("#tabla_actividades").html(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function selListadoProrrogasDeterminacionResponsabilidad(CodDeterminacion) {
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=selListadoProrrogasDeterminacionResponsabilidad&CodDeterminacion="+CodDeterminacion,
		async: false,
		success: function(resp) {
			parent.$("#CodDeterminacion").val(CodDeterminacion);
			parent.$("#tabla_actividades").html(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

//	FUNCION PARA SELECCIONAR DE UNA LISTA UNA LINEA Y COLOCAR EL VALOR SELECCIONADO EN OTRA LINEA
function selListadoOC(codigo, descripcion, cod, nom, codservicio, nomservicio, impuesto, codformapago) {
	opener.document.getElementById(cod).value = codigo;
	opener.document.getElementById(nom).value = descripcion;
	opener.document.getElementById("codservicio").value = codservicio;
	opener.document.getElementById("nomservicio").value = nomservicio;
	opener.document.getElementById("impuesto").value = impuesto;
	opener.document.getElementById("codformapago").value = codformapago;
	opener.document.getElementById("lista_detalle").innerHTML = "";
	opener.document.getElementById("nro_detalle").value = "0.00";
	opener.document.getElementById("can_detalle").value = "0.00";
	opener.document.getElementById("monto_afecto").value = "0,00";
	opener.document.getElementById("monto_noafecto").value = "0,00";
	opener.document.getElementById("monto_bruto").value = "0,00";
	opener.document.getElementById("monto_impuestos").value = "0,00";
	opener.document.getElementById("monto_total").value = "0,00";
	opener.document.getElementById("monto_pendiente").value = "0,00";
	opener.document.getElementById("monto_otros").value = "0,00";
	opener.document.getElementById("btItem").disabled = false;
	opener.document.getElementById("btCommodity").disabled = false;
	opener.document.getElementById("btCCosto").disabled = false;
	opener.document.getElementById("btBorrar").disabled = false;
	window.close();
}
//	------------------------------------------

//	FUNCION PARA SELECCIONAR DE UNA LISTA UNA LINEA Y COLOCAR EL VALOR SELECCIONADO EN OTRA LINEA
function selListadoOS(codigo, descripcion, cod, nom, codservicio, nomservicio, impuesto, codformapago, codtipopago, dias_pagar, hasta) {
	opener.document.getElementById(cod).value = codigo;
	opener.document.getElementById(nom).value = descripcion;
	opener.document.getElementById("codservicio").value = codservicio;
	opener.document.getElementById("nomservicio").value = nomservicio;
	opener.document.getElementById("impuesto").value = impuesto;
	opener.document.getElementById("codformapago").value = codformapago;
	opener.document.getElementById("codtipopago").value = codtipopago;
	opener.document.getElementById("dias_pagar").value = dias_pagar;
	opener.document.getElementById("hasta").value = hasta;
	opener.document.getElementById("lista_detalle").innerHTML = "";
	opener.document.getElementById("nro_detalle").value = "0.00";
	opener.document.getElementById("can_detalle").value = "0.00";
	opener.document.getElementById("monto_original").value = "0,00";
	opener.document.getElementById("monto_impuestos").value = "0,00";
	opener.document.getElementById("monto_total").value = "0,00";
	opener.document.getElementById("btCommodity").disabled = false;
	opener.document.getElementById("btCCosto").disabled = false;
	opener.document.getElementById("btBorrar").disabled = false;
	window.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function desarrollo_carreras_empleado_sel(CodPersona, CodEmpleado, NomPersona, Ndocumento, Fingreso, CodOrganismo, CodDependencia, CodCargo, CategoriaCargo, Grado) {
	parent.$("#CodPersona").val(CodPersona);
	parent.$("#CodEmpleado").val(CodEmpleado);
	parent.$("#NomPersona").val(NomPersona);
	parent.$("#Ndocumento").val(Ndocumento);
	parent.$("#Fingreso").val(Fingreso);
	parent.$("#CodOrganismo").val(CodOrganismo);
	parent.$("#CodDependencia").val(CodDependencia);
	parent.$("#CodCargo").val(CodCargo);
	parent.$("#CategoriaCargo").val(CategoriaCargo);
	parent.$("#Grado").val(Grado);
	parent.$("#Secuencia").val("");
	parent.$(".fichas_carrera").html("");
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function actuacion_fiscal_auditores_insertar(CodPersona) {
	var accion = "actuacion_fiscal_auditores_insertar";
	var detalle = "auditores";
	var php_ajax = "../fphp_funciones_ajax.php";
	//
	var nro = "nro_" + detalle;
	var can = "can_" + detalle;
	var sel = "sel_" + detalle;
	var lista = "lista_" + detalle;
	var nrodetalle = new Number(parent.document.getElementById(nro).value); nrodetalle++;
	var candetalle = new Number(parent.document.getElementById(can).value); candetalle++;	
	//	ajax
	$.ajax({
		type: "POST",
		url: php_ajax,
		data: "accion="+accion+"&CodPersona="+CodPersona+"&nrodetalle="+nrodetalle+"&candetalle="+candetalle,
		async: true,
		success: function(resp) {
			parent.$("#"+nro).val(nrodetalle);
			parent.$("#"+can).val(candetalle);
			var idtr = detalle + "_" + CodPersona;
			if (parent.document.getElementById(idtr)) cajaModal("Empleado ya insertado", "error_lista", 400);
			else {
				var newTr = parent.document.createElement("tr");
				newTr.className = "trListaBody";
				newTr.setAttribute("onclick", "mClk(this, '"+sel+"');");
				newTr.id = idtr
				parent.document.getElementById(lista).appendChild(newTr);
				parent.document.getElementById(idtr).innerHTML = resp;
				parent.$.prettyPhoto.close();
			}
		}
	});
}
//	------------------------------------------

//	insertar lista de actividades
function setListaActividades() {
	var CodProceso = $("#CodProceso").val();
	var FechaInicio = $("#FechaInicio").val();
	
	if (CodProceso == "" || FechaInicio == "" || !valFecha(FechaInicio)) {
		$("#lista_actividades").html("");
	} else {
		$.ajax({
			type: "POST",
			url: "../lib/fphp_funciones_ajax.php",
			data: "accion=setListaActividades&CodProceso="+CodProceso+"&FechaInicio="+FechaInicio,
			async: false,
			success: function(resp) {
				var datos = resp.split("||");
				if (datos[0].trim() != "") $("#FechaInicio").val(datos[0]);
				$("#FechaInicioReal").val($("#FechaInicio").val());
				$("#lista_actividades").html(datos[1]);
				$("#FechaTermino").val(datos[2]);
				$("#FechaTerminoReal").val(datos[2]);
				$("#Duracion").val(datos[3]);
				$("#total_duracion").html(datos[3]);
				$("#total_prorroga").html(datos[4]);
				$("#Prorroga").val(datos[4]);
				$("#DuracionNo").val(datos[5]);
				var DuracionTotal = new Number(parseInt(datos[3]) + parseInt(datos[4]) + parseInt(datos[5]));
				$("#DuracionTotal").val(DuracionTotal);
			}
		});
	}
}
//	------------------------------------------

//	insertar lista de actividades
function setListaActividadesSel(CodActividad) {
	//	campos
	var CodProceso = parent.$("#CodProceso").val();
	var FechaInicio = parent.$("#FechaInicio").val();
	
	//	listado actividades
	var detalles_actividades = "";
	var frm_actividades = parent.document.getElementById("frm_actividades");
	for(var i=0; n=frm_actividades.elements[i]; i++) {
		if (n.name == "CodActividad") detalles_actividades += n.value + ";";
	}
	var len = detalles_actividades.length; len--;
	detalles_actividades = detalles_actividades.substr(0, len);
	
	if (CodProceso == "" || FechaInicio == "" || !valFecha(FechaInicio)) {		
		parent.$("#lista_actividades").html("");
	} else {
		$.ajax({
			type: "POST",
			url: "../fphp_funciones_ajax.php",
			data: "accion=setListaActividades&CodProceso="+CodProceso+"&FechaInicio="+FechaInicio+"&CodActividad="+CodActividad+"&detalles="+detalles_actividades,
			async: false,
			success: function(resp) {
				var datos = resp.split("||");
				if (!parent.document.getElementById(CodActividad)) {
					if (datos[0].trim() != "") parent.$("#FechaInicio").val(datos[0]);
					parent.$("#FechaInicioReal").val(parent.$("#FechaInicio").val());
					parent.$("#lista_actividades").html(datos[1]);
					parent.$("#FechaTermino").val(datos[2]);
					parent.$("#FechaTerminoReal").val(datos[2]);
					parent.$("#Duracion").val(datos[3]);
					parent.$("#total_duracion").html(datos[3]);
					parent.$("#total_prorroga").html(datos[4]);
					parent.$.prettyPhoto.close();
				} else cajaModal("Actividad ya ingresada", "error_lista", 400);
			}
		});
	}
}
//	------------------------------------------

function selListadoIFrameRequerimientoPostulante(Postulante, TipoPostulante) {
	var CodOrganismo = parent.$("#CodOrganismo").val();
	var Requerimiento = parent.$("#Requerimiento").val();
	var nro_candidato = parseInt(parent.$("#postulantes").contents().find("body #nro_candidato").val());	nro_candidato++;
	var can_candidato = parseInt(parent.$("#postulantes").contents().find("body #can_candidato").val());	can_candidato++;
	var NumeroPendiente = parseInt(parent.$("#NumeroPendiente").val());
	var idtr = "candidato_" + TipoPostulante + Postulante;
	//	ajax
	/*if (can_candidato > NumeroPendiente) cajaModal("El numero de postulantes no puede ser mayor a "+NumeroPendiente, "error_lista", 400);
	else */
	if (parent.$("#postulantes").contents().find("body #"+idtr).hasClass("trListaBody")) cajaModal("Candidato ya insertado", "error_lista", 400);
	else {
		$.ajax({
			type: "POST",
			url: "../../rh/lib/form_ajax.php",
			data: "modulo=requerimientos&accion=insertar-candidato&CodOrganismo="+CodOrganismo+"&Requerimiento="+Requerimiento+"&Postulante="+Postulante+"&TipoPostulante="+TipoPostulante+"&nro_candidato="+nro_candidato,
			async: false,
			success: function(resp) {
				var datos = resp.split("|");
				if (datos[0].trim() != "") cajaModal(datos[0], "error_lista", 400);
				else {
					parent.$("#postulantes").contents().find("body #nro_candidato").val(nro_candidato);
					parent.$("#postulantes").contents().find("body #can_candidato").val(can_candidato);
					parent.$("#postulantes").contents().find("body #lista_candidato").append(datos[1]);
					parent.$.prettyPhoto.close();
				}
			}
		});
	}
}
//	------------------------------------------

//	seleccionar 
function listadoPartidas(cod, seldetalle) {
	opener.document.getElementById("cod_partida"+seldetalle).value = cod;
	window.close();
}
//	------------------------------------------

function validarErroresVoucher() {
	var Creditos = new Number(setNumero($("#Creditos").val()));
	var Debitos = new Number(setNumero($("#Debitos").val()));
	var Periodo = $("#Periodo").val();
	var PeriodoEstado = $("#PeriodoEstado").val();
	var i = 0;
	
	//	valido diferencias de saldos
	if ((Creditos + Debitos) != 0) {
		i++;
		$("#lista_errores").append("<tr>");
		$("#lista_errores").append("<td align='center'>"+i+"</td>");
		$("#lista_errores").append("<td style='color:red;'>Monto de créditos y débitos deben ser igual</td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("</tr>");
		$("#btAceptar").attr("disabled", "disabled");
	}
	
	//	valido diferencias de saldos
	if (Creditos == 0 || Debitos == 0) {
		i++;
		$("#lista_errores").append("<tr>");
		$("#lista_errores").append("<td align='center'>"+i+"</td>");
		$("#lista_errores").append("<td style='color:red;'>Monto de créditos y débitos no puede ser cero</td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("</tr>");
		$("#btAceptar").attr("disabled", "disabled");
	}
	
	//	valido periodo
	if (PeriodoEstado == "") {
		i++;
		$("#lista_errores").append("<tr>");
		$("#lista_errores").append("<td align='center'>"+i+"</td>");
		$("#lista_errores").append("<td style='color:red;'>El Periodo "+Periodo+" no se ha creado</td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("</tr>");
		$("#btAceptar").attr("disabled", "disabled");
	}
	
	//	valido periodo
	if (PeriodoEstado == "C") {
		i++;
		$("#lista_errores").append("<tr>");
		$("#lista_errores").append("<td align='center'>"+i+"</td>");
		$("#lista_errores").append("<td style='color:red;'>El Periodo "+Periodo+" esta cerrado</td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("<td></td>");
		$("#lista_errores").append("</tr>");
		$("#btAceptar").attr("disabled", "disabled");
	}
}
//	------------------------------------------

//	ACTUALIZO LOS MONTOS DE LA OBLIGACION
function actualizarMontosObligacionDocumento() {
	//	impuestos
	var impuesto_total = new Number(0);
	var frm_impuesto = opener.document.getElementById("frm_impuesto");
	for(var i=0; n=frm_impuesto.elements[i]; i++) {
		if (n.name == "MontoImpuesto") {
			var monto = new Number(setNumero(n.value));
			impuesto_total += monto;
		}
	}
	
	//	documentos
	var documento_total = new Number(0);
	var documento_afecto = new Number(0);
	var documento_impuesto = new Number(0);
	var documento_noafecto = new Number(0);
	var frm_documento = opener.document.getElementById("frm_documento");
	for(var i=0; n=frm_documento.elements[i]; i++) {
		if (n.name == "MontoAfecto") {
			var monto = new Number(setNumero(n.value));
			documento_afecto += monto;
		}
		else if (n.name == "MontoNoAfecto") {
			var monto = new Number(setNumero(n.value));
			documento_noafecto += monto;
		}
	}
	
	//	distribucion
	var distribucion_total = new Number(0);
	var MontoAfecto = new Number(0);
	var MontoNoAfecto = new Number(0);
	var frm_distribucion = opener.document.getElementById("frm_distribucion");
	for(var i=0; n=frm_distribucion.elements[i]; i++) {
		if (n.name == "FlagNoAfectoIGV") {
			if (n.checked) var FlagNoAfectoIGV = "S";
			else var FlagNoAfectoIGV = "N";
		}
		if (n.name == "Monto") {
			var monto = new Number(setNumero(n.value));
			distribucion_total += monto;
			if (FlagNoAfectoIGV == "S") MontoNoAfecto += monto;
			else MontoAfecto += monto;
		}
	}
	
	//	calculo montos
	var FactorImpuesto = new Number(opener.$("#FactorImpuesto").val());
	var documento_impuesto = new Number(documento_afecto * FactorImpuesto / 100);
	var documento_total = new Number(documento_afecto + documento_noafecto + documento_impuesto);
	var MontoImpuesto = new Number(MontoAfecto * FactorImpuesto / 100);
	var MontoObligacion = new Number(MontoAfecto + MontoNoAfecto + MontoImpuesto + impuesto_total);
	var MontoAdelanto = new Number(0);
	var MontoPagar = new Number(MontoObligacion - MontoAdelanto);
	var MontoPagoParcial = new Number(0);
	var MontoPendiente = new Number(MontoPagar - MontoPagoParcial);
	
	//	asigno montos a la lista
	opener.$("#impuesto_total").val(setNumeroFormato(impuesto_total, 2, ".", ","));
	opener.$("#documento_total").val(setNumeroFormato(documento_total, 2, ".", ","));
	opener.$("#documento_afecto").val(setNumeroFormato(documento_afecto, 2, ".", ","));
	opener.$("#documento_impuesto").val(setNumeroFormato(documento_impuesto, 2, ".", ","));
	opener.$("#documento_noafecto").val(setNumeroFormato(documento_noafecto, 2, ".", ","));	
	opener.$("#distribucion_total").val(setNumeroFormato(distribucion_total, 2, ".", ","));
	
	//	asigno montos generales
	opener.$("#MontoAfecto").val(setNumeroFormato(MontoAfecto, 2, ".", ","));
	opener.$("#MontoNoAfecto").val(setNumeroFormato(MontoNoAfecto, 2, ".", ","));
	opener.$("#MontoImpuesto").val(setNumeroFormato(MontoImpuesto, 2, ".", ","));
	opener.$("#MontoImpuestoOtros").val(setNumeroFormato(impuesto_total, 2, ".", ","));
	opener.$("#MontoObligacion").val(setNumeroFormato(MontoObligacion, 2, ".", ","));
	opener.$("#MontoAdelanto").val(setNumeroFormato(MontoAdelanto, 2, ".", ","));
	opener.$("#MontoPagar").val(setNumeroFormato(MontoPagar, 2, ".", ","));
	opener.$("#MontoPagoParcial").val(setNumeroFormato(MontoPagoParcial, 2, ".", ","));
	opener.$("#MontoPendiente").val(setNumeroFormato(MontoPendiente, 2, ".", ","));
}

//	ACTUALIZO LOS MONTOS DE LA OBLIGACION
function actualizarMontosObligacionImpuesto2() {
	//	impuestos
	var impuesto_total = new Number(0);
	var frm_impuesto = parent.document.getElementById("frm_impuesto");
	for(var i=0; n=frm_impuesto.elements[i]; i++) {
		if (n.name == "MontoImpuesto") {
			var monto = new Number(setNumero(n.value));
			impuesto_total += monto;
		}
	}
	
	//	documentos
	var documento_total = new Number(0);
	var documento_afecto = new Number(0);
	var documento_impuesto = new Number(0);
	var documento_noafecto = new Number(0);
	var frm_documento = parent.document.getElementById("frm_documento");
	for(var i=0; n=frm_documento.elements[i]; i++) {
		if (n.name == "MontoAfecto") {
			var monto = new Number(setNumero(n.value));
			documento_afecto += monto;
		}
		else if (n.name == "MontoNoAfecto") {
			var monto = new Number(setNumero(n.value));
			documento_noafecto += monto;
		}
	}
	
	//	distribucion
	var distribucion_total = new Number(0);
	var MontoAfecto = new Number(0);
	var MontoNoAfecto = new Number(0);
	var frm_distribucion = parent.document.getElementById("frm_distribucion");
	for(var i=0; n=frm_distribucion.elements[i]; i++) {
		if (n.name == "FlagNoAfectoIGV") {
			if (n.checked) var FlagNoAfectoIGV = "S";
			else var FlagNoAfectoIGV = "N";
		}
		if (n.name == "Monto") {
			var monto = new Number(setNumero(n.value));
			distribucion_total += monto;
			if (FlagNoAfectoIGV == "S") MontoNoAfecto += monto;
			else MontoAfecto += monto;
		}
	}
	
	//	calculo montos
	var FactorImpuesto = new Number(parent.$("#FactorImpuesto").val());
	var documento_impuesto = new Number(documento_afecto * FactorImpuesto / 100);
	var documento_total = new Number(documento_afecto + documento_noafecto + documento_impuesto);
	var MontoImpuesto = new Number(MontoAfecto * FactorImpuesto / 100);
	var MontoObligacion = new Number(MontoAfecto + MontoNoAfecto + MontoImpuesto + impuesto_total);
	var MontoAdelanto = new Number(0);
	var MontoPagar = new Number(MontoObligacion - MontoAdelanto);
	var MontoPagoParcial = new Number(0);
	var MontoPendiente = new Number(MontoPagar - MontoPagoParcial);
	
	//	asigno montos a la lista
	parent.$("#impuesto_total").val(setNumeroFormato(impuesto_total, 2, ".", ","));
	parent.$("#documento_total").val(setNumeroFormato(documento_total, 2, ".", ","));
	parent.$("#documento_afecto").val(setNumeroFormato(documento_afecto, 2, ".", ","));
	parent.$("#documento_impuesto").val(setNumeroFormato(documento_impuesto, 2, ".", ","));
	parent.$("#documento_noafecto").val(setNumeroFormato(documento_noafecto, 2, ".", ","));	
	parent.$("#distribucion_total").val(setNumeroFormato(distribucion_total, 2, ".", ","));
	
	//	asigno montos generales
	parent.$("#MontoAfecto").val(setNumeroFormato(MontoAfecto, 2, ".", ","));
	parent.$("#MontoNoAfecto").val(setNumeroFormato(MontoNoAfecto, 2, ".", ","));
	parent.$("#MontoImpuesto").val(setNumeroFormato(MontoImpuesto, 2, ".", ","));
	parent.$("#MontoImpuestoOtros").val(setNumeroFormato(impuesto_total, 2, ".", ","));
	parent.$("#MontoObligacion").val(setNumeroFormato(MontoObligacion, 2, ".", ","));
	parent.$("#MontoAdelanto").val(setNumeroFormato(MontoAdelanto, 2, ".", ","));
	parent.$("#MontoPagar").val(setNumeroFormato(MontoPagar, 2, ".", ","));
	parent.$("#MontoPagoParcial").val(setNumeroFormato(MontoPagoParcial, 2, ".", ","));
	parent.$("#MontoPendiente").val(setNumeroFormato(MontoPendiente, 2, ".", ","));
}

//	VALIDO QUE SE SELECCIONE UN REGISTRO
function validarAbrirLista(sel, aSel) {
	if ($("#"+sel).val().trim() == "") cajaModal("Debe seleccionar una linea", "error", 400);
	else document.getElementById(aSel).click();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function requerimiento_detalles_insertar(Codigo, Tipo) {
	if (parent.document.getElementById("FlagCompras").checked) var FlagCompraAlmacen = "C"; else var FlagCompraAlmacen = "A";
	var CodCentroCosto = parent.$("#CodCentroCosto").val();
	var CodPresupuesto = parent.$("#CodPresupuesto").val();
	var CategoriaProg = parent.$("#CategoriaProg").val();
	var Ejercicio = parent.$("#Ejercicio").val();
	var CodFuente = parent.$("#CodFuente").val();
	var nrodetalle = new Number(parent.$("#nro_detalles").val());	nrodetalle++;
	var candetalle = new Number(parent.$("#can_detalles").val());	candetalle++;
	$.ajax({
		type: "POST",
		url: "../../lg/lg_requerimiento_ajax.php",
		data: "modulo=ajax&accion=requerimiento_detalles_insertar&Codigo="+Codigo+"&Tipo="+Tipo+"&FlagCompraAlmacen="+FlagCompraAlmacen+"&nrodetalle="+nrodetalle+"&candetalle="+candetalle+"&CodCentroCosto="+CodCentroCosto+"&CategoriaProg="+CategoriaProg+"&Ejercicio="+Ejercicio+"&CodPresupuesto="+CodPresupuesto+"&CodFuente="+CodFuente,
		async: false,
		success: function(resp) {
			parent.$("#nro_detalles").val(nrodetalle);
			parent.$("#can_detalles").val(candetalle);
			parent.$("#lista_detalles").append(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function orden_compra_detalles_insertar(Codigo, Tipo) {
	var CodTipoServicio = parent.$("#CodTipoServicio").val();
	var nrodetalles = new Number(parent.$("#nro_detalles").val());	nrodetalles++;
	var candetalles = new Number(parent.$("#can_detalles").val());	candetalles++;
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=orden_compra_detalles_insertar&Codigo="+Codigo+"&Tipo="+Tipo+"&nrodetalles="+nrodetalles+"&candetalles="+candetalles+"&CodTipoServicio="+CodTipoServicio+"&CategoriaProg="+parent.$("#CategoriaProg").val()+"&Ejercicio="+parent.$("#Ejercicio").val()+"&CodPresupuesto="+parent.$("#CodPresupuesto").val()+"&CodFuente="+parent.$("#CodFuente").val(),
		async: false,
		success: function(resp) {
			var partes = resp.split("|");
			parent.$("#nro_detalles").val(nrodetalles);
			parent.$("#can_detalles").val(candetalles);
			parent.$("#TipoClasificacion").val(partes[0]);
			parent.$("#lista_detalles").append(partes[1]);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function transaccion_almacen_sel(CodTransaccion, NomTransaccion, TipoMovimiento, CodDocumento, CodDocumentoReferencia) {
	parent.$("#CodTransaccion").val(CodTransaccion);
	parent.$("#NomTransaccion").val(NomTransaccion);
	parent.$("#TipoMovimiento").val(TipoMovimiento);
	parent.$("#CodDocumento").val(CodDocumento);
	parent.$("#CodDocumentoReferencia").val(CodDocumentoReferencia);
	parent.$("#btItem").removeAttr("disabled");
	parent.$("#btBorrar").removeAttr("disabled");
	parent.$.prettyPhoto.close();
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function almacen_detalles_insertar(CodItem) {
	var CodCentroCosto = parent.$("#CodCentroCosto").val();
	var CodAlmacen = parent.$("#CodAlmacen").val();
	var CodDocumentoReferencia = parent.$("#CodDocumentoReferencia").val();
	var NroDocumentoReferencia = parent.$("#NroDocumentoReferencia").val();
	if (parent.document.getElementById("FlagManual").checked) var FlagManual = "S"; else var FlagManual = "N";
	var nrodetalles = new Number(parent.$("#nro_detalles").val());	nrodetalles++;
	var candetalles = new Number(parent.$("#can_detalles").val());	candetalles++;
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=almacen_detalles_insertar&CodItem="+CodItem+"&nrodetalles="+nrodetalles+"&candetalles="+candetalles+"&CodCentroCosto="+CodCentroCosto+"&FlagManual="+FlagManual+"&CodAlmacen="+CodAlmacen+"&CodDocumentoReferencia="+CodDocumentoReferencia+"&NroDocumentoReferencia="+NroDocumentoReferencia,
		async: false,
		success: function(resp) {
			parent.$("#nro_detalles").val(nrodetalles);
			parent.$("#can_detalles").val(candetalles);
			parent.$("#lista_detalles").append(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function commodity_detalles_insertar(CommoditySub) {
	var CodCentroCosto = parent.$("#CodCentroCosto").val();
	var CodAlmacen = parent.$("#CodAlmacen").val();
	var CodDocumentoReferencia = parent.$("#CodDocumentoReferencia").val();
	var NroDocumentoReferencia = parent.$("#NroDocumentoReferencia").val();
	if (parent.document.getElementById("FlagManual").checked) var FlagManual = "S"; else var FlagManual = "N";
	var nrodetalles = new Number(parent.$("#nro_detalles").val());	nrodetalles++;
	var candetalles = new Number(parent.$("#can_detalles").val());	candetalles++;
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=commodity_detalles_insertar&CommoditySub="+CommoditySub+"&nrodetalles="+nrodetalles+"&candetalles="+candetalles+"&CodCentroCosto="+CodCentroCosto+"&FlagManual="+FlagManual+"&CodAlmacen="+CodAlmacen+"&CodDocumentoReferencia="+CodDocumentoReferencia+"&NroDocumentoReferencia="+NroDocumentoReferencia,
		async: false,
		success: function(resp) {
			parent.$("#nro_detalles").val(nrodetalles);
			parent.$("#can_detalles").val(candetalles);
			parent.$("#lista_detalles").append(resp);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function vacaciones_insertar_linea(NroPeriodo, Anio, Derecho, TotalUtilizados, Pendientes, FlagUtilizarPeriodo, i) {
	if (parent.document.getElementById(NroPeriodo)) {
		cajaModal("Periodo vacacional ya insertado", "error_lista", 400);
	}
	else if (FlagUtilizarPeriodo == "N") {
		cajaModal("El periodo no tienes dias pendientes", "error_lista", 400);
	}
	else {
		var UltimaFechaTermino = "";
		var TotalDias = new Number(0);
		var form = parent.document.getElementById("frm_detalles");
		for(var i=0; n=form.elements[i]; i++) {
			if (n.name == "NroDias") TotalDias += parseFloat(setNumero(n.value));
			else if (n.name == "FechaFin") UltimaFechaTermino = n.value;
		}
		
		var NroDias = parseFloat(setNumero(parent.$("#NroDias").val()));
		var FechaSalida = parent.$("#FechaSalida").val();
		var FechaTermino = parent.$("#FechaTermino").val();
		//	ajax
		$.ajax({
			type: "POST",
			url: "../fphp_funciones_ajax.php",
			data: "accion=vacaciones_insertar_linea&NroPeriodo="+NroPeriodo+"&Anio="+Anio+"&Derecho="+Derecho+"&TotalUtilizados="+TotalUtilizados+"&Pendientes="+Pendientes+"&NroDias="+NroDias+"&FechaSalida="+FechaSalida+"&FechaTermino="+FechaTermino+"&i="+i+"&UltimaFechaTermino="+UltimaFechaTermino+"&TotalDias="+TotalDias,
			async: false,
			success: function(resp) {
				parent.$("#lista_detalles").append(resp);
				totalizarPeriodoVacaciones2();
				parent.$.prettyPhoto.close();
			}
		});
	}
}
//	------------------------------------------

//	funcion para totalizar los dias en la ficha de periodos vacacionales
function totalizarPeriodoVacaciones2() {
	var TotalNroDias = new Number(0);
	var TotalPendientes = new Number(0);
	var form = parent.document.getElementById("frm_detalles");
	for(var i=0; n=form.elements[i]; i++) {
		if (n.name == "NroDias") {
			var NroDias = new Number(setNumero(n.value));
			TotalNroDias += NroDias;
		}
		else if (n.name == "Pendientes") {
			var Pendientes = new Number(setNumero(n.value));
			TotalPendientes += Pendientes;
		}
	}
	parent.$("#TotalNroDias").val(setNumeroFormato(TotalNroDias, 2, '.', ','));
	parent.$("#TotalPendientes").val(setNumeroFormato(TotalPendientes, 2, '.', ','));
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function requerimientos_cargo_selector(CodCargo, CodDesc, DescripCargo) {
	parent.$("#CodCargo").val(CodCargo);
	parent.$("#CodDesc").val(CodDesc);
	parent.$("#DescripCargo").val(DescripCargo);
	//	ajax
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "accion=requerimientos_cargo_selector&CodCargo="+CodCargo,
		async: false,
		success: function(resp) {
			var datos = resp.split("|");
			parent.$("#lista_evaluacion").html(datos[0]);
			parent.$("#nro_evaluacion").val(datos[1]);
			parent.$("#can_evaluacion").val(datos[1]);
			parent.$("#lista_competencias").html(datos[2]);
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function listado_insertar_linea(detalle, data, id, url) {
	//	lista
	var nro_detalles = parent.$("#nro_"+detalle);
	var can_detalles = parent.$("#can_"+detalle);
	var lista_detalles = parent.$("#lista_"+detalle);
	var nro = new Number(nro_detalles.val());	nro++;
	var can = new Number(can_detalles.val());	can++;
	if (!id) var idtr = detalle+"_"+nro; else var idtr = detalle+"_"+id;
	if (!url) var url = "../fphp_funciones_ajax.php";
	//	ajax
	$.ajax({
		type: "POST",
		url: url,
		data: "nro_detalles="+nro+"&can_detalles="+can+"&"+data,
		async: false,
		success: function(resp) {
			if (parent.document.getElementById(idtr)) cajaModal("Registro ya insertado", "error_lista", 400);
			else {
				nro_detalles.val(nro);
				can_detalles.val(can);
				lista_detalles.append(resp);
				parent.$.prettyPhoto.close();
				inicializarParent();
			}
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function listado_insertar_linea2(detalle, data, id, url) {
	//	lista
	var nro_detalles = opener.$("#nro_"+detalle);
	var can_detalles = opener.$("#can_"+detalle);
	var lista_detalles = opener.$("#lista_"+detalle);
	var idtr = detalle+"_"+id;
	var nro = new Number(nro_detalles.val());	nro++;
	var can = new Number(can_detalles.val());	can++;
	if (!url) var url = "../fphp_funciones_ajax.php";
	//	ajax
	$.ajax({
		type: "POST",
		url: url,
		data: "nro_detalles="+nro+"&can_detalles="+can+"&"+data,
		async: false,
		success: function(resp) {
			if (opener.document.getElementById(idtr)) cajaModal("Registro ya insertado", "error_lista", 400);
			else {
				nro_detalles.val(nro);
				can_detalles.val(can);
				lista_detalles.append(resp);
				window.close();
				inicializarOpener();
			}
		}
	});
}
//	------------------------------------------

// 	funcion para seleccionar de una lista un registro y colocar su valor en la ventana que lo llamo
function caja_chica_distribucion_insertar(detalle, data, id, idconcepto) {
	//	lista
	var nro_detalles = parent.$("#nro_"+detalle);
	var can_detalles = parent.$("#can_"+detalle);
	var lista_detalles = parent.$("#lista_"+detalle);
	var idtr = detalle+"_"+id;
	var nro = new Number(nro_detalles.val());	nro++;
	var can = new Number(can_detalles.val());	can++;
	
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: "nro_detalles="+nro+"&can_detalles="+can+"&"+data,
		async: false,
		success: function(resp) {
			if (parent.document.getElementById(idtr)) cajaModal("Registro ya insertado", "error_lista", 400);
			else {
				nro_detalles.val(nro);
				can_detalles.val(can);
				lista_detalles.append(resp);
				parent.$.prettyPhoto.close();
				inicializarParent();
			}
		}
	});
}
//	------------------------------------------

//	funcion para obtener la edad de una fecha
function getEdad(FechaDesde, FechaHasta, Anios, Meses, Dias) {
	if (valFecha(FechaDesde) && formatFechaAMD(FechaDesde) <= formatFechaAMD(FechaHasta)) {
		//	ajax
		$.ajax({
			type: "POST",
			url: "../lib/fphp_funciones_ajax.php",
			data: "accion=getEdad&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta,
			async: false,
			success: function(resp) {
				var partes = resp.split("|");
				Anios.val(partes[0]);
				Meses.val(partes[1]);
				Dias.val(partes[2]);
			}
		});
	} else {
		Anios.val("");
		Meses.val("");
		Dias.val("");
	}
}
//	------------------------------------------

//	funcion para copiar una imagen temporal a servidor y mostrarla
function copiarImagenTMP(form, id, img) {
	form.action = "../lib/cargar_img_tmp.php?_imagen="+id+"&imgFoto="+img;
	form.target = "imagen_tmp";
	form.submit();
	$("#FlagCopiarImagen").val("S");
}
//	------------------------------------------

//	
function obtenerFechaFin(iFechaInicial, iFechaTermino, iDias) {
	var FechaInicial = iFechaInicial.val();
	var Dias = parseInt(iDias);
	if (!valFecha(FechaInicial) || isNaN(Dias)) {
		iFechaTermino.val("");
	} else {
		//	ajax
		$.ajax({
			type: "POST",
			url: "../lib/fphp_funciones_ajax.php",
			data: "accion=obtenerFechaFin&FechaInicial="+FechaInicial+"&Dias="+Dias,
			async: false,
			success: function(resp) {
				$(iFechaTermino).val(resp);
			}
		});
	}
}
//	------------------------------------------

//	obtener la ddiferencia entre dos horas
function getDiffHora(Desde, Hasta, Total) {
	if (valHora(Desde) && valHora(Hasta)) {
		$.ajax({
			type: "POST",
			url: "../lib/fphp_funciones_ajax.php",
			data: "accion=getDiffHora&Desde="+formatHora(Desde)+"&Hasta="+formatHora(Hasta),
			async: true,
			success: function(resp) {
				Total.val(resp);
			}
		});
	} else Total.val("");
}
//	------------------------------------------

//	seleccionar de la lista de empleados desde jubilaciones
function jubilaciones_empleados_sel(CodPersona) {
	$.ajax({
		type: "POST",
		url: "../../rh/lib/fphp_funciones_ajax.php",
		data: "accion=jubilaciones_empleados_sel&CodPersona="+CodPersona,
		async: false,
		success: function(resp) {
			var datos = resp.split("|char:sep|");
			parent.$("#CodPersona").val(datos[1]);
			parent.$("#CodEmpleado").val(datos[2]);
			parent.$("#NomPersona").val(datos[3]);
			parent.$("#CodOrganismo").val(datos[4]);
			parent.$("#CodDependencia").val(datos[5]);
			parent.$("#CodCargo").val(datos[6]);
			parent.$("#SueldoActual").val(datos[7]);
			parent.$("#Ndocumento").val(datos[8]);
			parent.$("#Sexo").val(datos[9]);
			parent.$("#Fnacimiento").val(datos[10]);
			parent.$("#Edad").val(datos[11]);
			parent.$("#Fingreso").val(datos[12]);
			
			parent.$("#lista_antecedentes").html(datos[13]);
			parent.$("#anios_antecedentes").html(datos[14]);
			parent.$("#meses_antecedentes").html(datos[15]);
			parent.$("#dias_antecedentes").html(datos[16]);
			parent.$("#anios_organismo_antecedentes").html(datos[17]);
			parent.$("#meses_organismo_antecedentes").html(datos[18]);
			parent.$("#dias_organismo_antecedentes").html(datos[19]);
			parent.$("#AniosServicio").val(datos[20]);
			parent.$("#_AniosServicio").html(datos[20]);
			parent.$("#MesesServicio").html(datos[21]);
			parent.$("#DiasServicio").html(datos[22]);
			
			parent.$("#lista_sueldos").html(datos[23]);
			
			//	si cumple con los requisitos
			parent.$("#FlagCumple").val(datos[24]);
			if (datos[24] == "S") {
				parent.$("#cumple").css("display", "block");
				parent.$("#nocumple").css("display", "none");
			} else {
				parent.$("#cumple").css("display", "none");
				parent.$("#nocumple").css("display", "block");
			}
			
			//	si se tomaron en cuenta los años en exceso de los años de servicio
			if (datos[25] == "S") {
				parent.$("#exceso").css("display", "block");
			} else {
				parent.$("#exceso").css("display", "none");
			}
			
			parent.$("#_AniosServicioExceso").html(datos[26]);
			parent.$("#AniosServicioExceso").val(datos[26]);
			
			parent.$("#Coeficiente").val(datos[27]);
			parent.$("#TotalSueldo").val(datos[28]);
			parent.$("#TotalPrimas").val(datos[29]);
			parent.$("#Total").val(datos[30]);
			parent.$("#MontoJubilacion").val(datos[31]);
			parent.$("#SueldoBase").val(datos[32]);
			//--
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

//	seleccionar de la lista de empleados desde pensiones x invalidez
function pensiones_invalidez_empleados_sel(CodPersona) {
	$.ajax({
		type: "POST",
		url: "../../rh/lib/fphp_funciones_ajax.php",
		data: "accion=pensiones_invalidez_empleados_sel&CodPersona="+CodPersona,
		async: false,
		success: function(resp) {
			var datos = resp.split("|char:sep|");
			parent.$("#CodPersona").val(datos[1]);
			parent.$("#CodEmpleado").val(datos[2]);
			parent.$("#NomPersona").val(datos[3]);
			parent.$("#CodOrganismo").val(datos[4]);
			parent.$("#CodDependencia").val(datos[5]);
			parent.$("#CodCargo").val(datos[6]);
			parent.$("#UltimoSueldo").val(datos[7]);
			parent.$("#Ndocumento").val(datos[8]);
			parent.$("#Sexo").val(datos[9]);
			parent.$("#Fnacimiento").val(datos[10]);
			parent.$("#Edad").val(datos[11]);
			parent.$("#Fingreso").val(datos[12]);
			parent.$("#AniosServicio").val(datos[13]);
			
			//	si cumple con los requisitos
			parent.$("#FlagCumple").val(datos[14]);
			if (datos[14] == "S") {
				parent.$("#cumple").css("display", "block");
				parent.$("#nocumple").css("display", "none");
			} else {
				parent.$("#cumple").css("display", "none");
				parent.$("#nocumple").css("display", "block");
			}
			//--
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

//	seleccionar de la lista de empleados desde pensiones x sobreviviente
function pensiones_sobreviviente_empleados_sel(CodPersona) {
	$.ajax({
		type: "POST",
		url: "../../rh/lib/fphp_funciones_ajax.php",
		data: "accion=pensiones_sobreviviente_empleados_sel&CodPersona="+CodPersona,
		async: false,
		success: function(resp) {
			var datos = resp.split("|char:sep|");
			parent.$("#CodPersona").val(datos[1]);
			parent.$("#CodEmpleado").val(datos[2]);
			parent.$("#NomPersona").val(datos[3]);
			parent.$("#CodOrganismo").val(datos[4]);
			parent.$("#CodDependencia").val(datos[5]);
			parent.$("#CodCargo").val(datos[6]);
			parent.$("#UltimoSueldo").val(datos[7]);
			parent.$("#Ndocumento").val(datos[8]);
			parent.$("#Sexo").val(datos[9]);
			parent.$("#Fnacimiento").val(datos[10]);
			parent.$("#Edad").val(datos[11]);
			parent.$("#Fingreso").val(datos[12]);
			
			parent.$("#lista_antecedentes").html(datos[13]);
			parent.$("#anios_antecedentes").html(datos[14]);
			parent.$("#meses_antecedentes").html(datos[15]);
			parent.$("#dias_antecedentes").html(datos[16]);
			parent.$("#anios_organismo_antecedentes").html(datos[17]);
			parent.$("#meses_organismo_antecedentes").html(datos[18]);
			parent.$("#dias_organismo_antecedentes").html(datos[19]);
			parent.$("#AniosServicio").val(datos[20]);
			parent.$("#_AniosServicio").html(datos[20]);
			parent.$("#MesesServicio").html(datos[21]);
			parent.$("#DiasServicio").html(datos[22]);
			
			parent.$("#lista_sueldos").html(datos[23]);
			
			//	si cumple con los requisitos
			parent.$("#FlagCumple").val(datos[24]);
			if (datos[24] == "S") {
				parent.$("#cumple").css("display", "block");
				parent.$("#nocumple").css("display", "none");
			} else {
				parent.$("#cumple").css("display", "none");
				parent.$("#nocumple").css("display", "block");
			}
			
			//	si se tomaron en cuenta los años en exceso de los años de servicio
			if (datos[25] == "S") {
				parent.$("#exceso").css("display", "block");
			} else {
				parent.$("#exceso").css("display", "none");
			}
			
			parent.$("#_AniosServicioExceso").html(datos[26]);
			parent.$("#AniosServicioExceso").val(datos[26]);
			
			parent.$("#Coeficiente").val(datos[27]);
			parent.$("#TotalSueldo").val(datos[28]);
			parent.$("#TotalPrimas").val(datos[29]);
			parent.$("#Total").val(datos[30]);
			parent.$("#MontoJubilacion").val(datos[31]);
			parent.$("#MontoPension").val(datos[32]);
			parent.$("#SueldoBase").val(datos[33]);
			
			parent.$("#lista_beneficiarios").html(datos[34]);
			//--
			parent.$.prettyPhoto.close();
		}
	});
}
//	------------------------------------------

//	funcion para obtener el presupuesto segun el año
function setPresupuesto(Organismo, Fecha, iCodPresupuesto, iAnio, CategoriaProg) {
	var EjercicioPpto = Fecha.substr(6, 4);
	if (valFecha(Fecha)) {
		iAnio.val(EjercicioPpto);
		$.ajax({
			type: "POST",
			url: "../lib/fphp_funciones_ajax.php",
			data: "accion=setPresupuesto&EjercicioPpto="+EjercicioPpto+"&Organismo="+Organismo+"&CategoriaProg="+CategoriaProg,
			async: false,
			success: function(resp) {
				iCodPresupuesto.val(resp);
			}
		});
	}
}
//	------------------------------------------

//
function innerHtml(obj, data) {
	obj.html("Cargando...");
	//	ajax
	$.ajax({
		type: "POST",
		url: "lib/fphp_funciones_ajax.php",
		data: data,
		async: false,
		success: function(resp) {
			obj.html(resp);
		}
	});
}
//	------------------------------------------

//	
function selListadoData(data) {
	//	ajax
	$.ajax({
		type: "POST",
		url: "../fphp_funciones_ajax.php",
		data: data,
		async: false,
		success: function(resp) {
			eval(resp);
		}
	});
}
//	------------------------------------------

//	seleccionar todas las lineas de una lista
function selTodos(lista, chk) {
	if (chk) var check = chk; else var check = lista;
	$("#lista_"+lista+" tr").removeClass("trListaBody").addClass("trListaBodySel");
	$("#lista_"+lista+" tr [name="+check+"]").prop("checked", true);
}
//	------------------------------------------

//	seleccionar todas las lineas de una lista
function selNinguno(lista, chk) {
	if (chk) var check = chk; else var check = lista;
	$("#lista_"+lista+" tr").removeClass("trListaBodySel").addClass("trListaBody");
	$("#lista_"+lista+" tr [name="+check+"]").prop("checked", false);
}
//	------------------------------------------

//	seleccionar todas las lineas de una lista
function selTodos2(lista, chk) {
	if (chk) var check = chk; else var check = lista;
	$("#lista_"+lista+" tr").removeClass("trListaBody").addClass("trListaBodySel");
	$("#lista_"+lista+" tr input[name='"+check+"[]']").prop("checked", true);
}
//	------------------------------------------

//	seleccionar todas las lineas de una lista
function selNinguno2(lista, chk) {
	if (chk) var check = chk; else var check = lista;
	$("#lista_"+lista+" tr").removeClass("trListaBodySel").addClass("trListaBody");
	$("#lista_"+lista+" tr input[name='"+check+"[]']").prop("checked", false);
}
//	------------------------------------------

//	------------------------------------------
//	ABRIR GENERAR VOUCHERS
function generar_vouchers_abrir(registro, pagina, valor, cont) {
	//alert(cont);
	if(registro=="")alert('!Debe Seleccionar un Registro¡');
	else window.open(pagina+"?registro="+registro+"&opcion="+valor+"&cont="+cont, pagina, "toolbar=no, menubar=no, location=no, scrollbars=yes, width=1000, height=600");
}
//	------------------------------------------

function abrir_selector(detalle, inputs, href, selector) {
    var sel_detalle = $('#sel_'+detalle).val();
    if (!selector) var selector = $('#a_' + detalle); else var selector = $('#a_' + selector);
    var id = sel_detalle.split('_');
    var campos = "&";

    var j = 0;
    for(var i=0; i<inputs.length; i++) {
        ++j;
        campos = campos + "campo" + j + "=" + detalle+"_"+inputs[i]+id[1] + "&";
    }

    if (sel_detalle == '') cajaModal('Debe seleccionar un registro', 'error');
    else {
        var url = href.split('?');
        var href = url[0] + '?' + campos + url[1];
        selector.attr('href', href);
        selector.click();
    }
}