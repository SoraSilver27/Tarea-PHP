<?php

$entrada = $_GET;
$cantidad_entradas = count($entrada);

$son_5_o_menos = true;
if ($cantidad_entradas > 5) {
	$son_5_o_menos = false;
}

$son_numeros = true;
for ($i=0; $i < $cantidad_entradas ; $i++) {
	$e = $entrada[$i];
	
	if (!is_numeric($e)) {
		if ($e == null ) {
			unset($entrada[$i]);
		} else {
			$son_numeros = false;
		}
	}
}?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Tarea de PHP </title>
	</head>
	<body>
	
    <h3>Ingreso de valores en formulario para suma y promedio</h3> <br>

	<form method="get">
		<label for="Número 1"> Número 1:</label>
		<input type="number" id="Numero1" name="0">
		<br>
		<label for="Número 2"> Número 2:</label>
		<input type="number" id="Numero2" name="1">
		<br>
		<label for="Número 3"> Número 3:</label>
		<input type="number" id="Numero3" name="2">
		<br>
		<label for="Número 4"> Número 4:</label>
		<input type="number" id="Numero4" name="3">
		<br>
		<label for="Número 5"> Número 5:</label>
		<input type="number" id="Numero5" name="4">
		<br> <br>
		<input type="submit" value="Enviar números">
	</form>
	</body>
	<p> Nota: los campos vacíos serán ignorados. </p>

    <?php
	if (!$son_5_o_menos) {echo("<p> Se ingresaron más de 5 números </p>");}
	if (!$son_numeros) {echo("<p> Uno o más de los valores ingresados no son números </p>");}

	
	if ($entrada == array()) {
		echo("Aún no se han ingresado valores");

	} elseif ($son_numeros && $son_5_o_menos) {
		echo("Valores: <br> <br>");

		foreach ($entrada as $indice => $valor) {
			$indice++;
			echo("Número $indice: $valor <br>");
		}
		echo("<br>");

		$suma_valores = array_sum($entrada);
		echo("La suma de los valores es: $suma_valores <br>");

		$promedio_valores = $suma_valores / count($entrada);
		echo("El promedio de los valores es: $promedio_valores <br> <br>");
	}?>
</html>