<?php

// Conexion a la base de datos
require_once('bdd.php');

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){
	
	
	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];

	$sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";

	
	mysqli_query($conn, $sql);

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
