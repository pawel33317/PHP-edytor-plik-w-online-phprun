<?php 
error_reporting(0);
	$operation = $_POST['operation'];
	$fileName = $_POST['fileName'];
	$data = $_POST['data'];
	if(file_put_contents($fileName, stripslashes  ($data)))
		echo 'Zapis zakończony powodzeniem';
	else
		echo 'Błąd zapisu';
	
?>