<?
// ---------------------------------------------- ####
//	FUNCION PARA IMPRIMIR EN UNA TABLA VALORES
function printValores($tabla, $codigo) {
	switch ($tabla) {
		case "ESTADO":
			$c[0] = "A"; $v[0] = "Activo";
			$c[1] = "I"; $v[1] = "Inactivo";
			break;
	}
	
	$i=0;
	foreach ($c as $cod) {
		if ($cod == $codigo) return htmlentities($v[$i]);
		$i++;
	}
}
// ---------------------------------------------- ####
// ---------------------------------------------- ####
// ---------------------------------------------- ####
// ---------------------------------------------- ####
// ---------------------------------------------- ####
// ---------------------------------------------- ####


?>