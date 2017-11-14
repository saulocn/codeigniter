<?php 


function dataPtBrParaMysql($dataPtBr){
	$partes = explode("/", $dataPtBr);
	return "{$partes[2]}-{$partes[1]}-{$partes[0]}";

}

function dataMysqlParaPtBr($dataMySQL){
	$data = new DateTime($dataMySQL);
	return $data->format("d/m/Y");	

}