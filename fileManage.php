<?php 
error_reporting(0);
	$op = $_POST['op'];
	if ($op == "usunfolder"){
		usunFolder($_POST['folder']);
		echo 'Usunieto folder: '.$_POST['folder'];
	}
	else if ($op == "usunplik"){
		usunPlik($_POST['plik']);
		echo 'Usunieto plik: '.$_POST['plik'];
	}
	else if ($op == "zmiennazwe"){
		zmienNazwe($_POST['old'],$_POST['new']);
		echo 'Zmieniono nazwę z: '.$_POST['old'].' na: '.$_POST['new'];
	}
	else if ($op == "dodajplik"){
		dodajPlik($_POST['plik']);
		echo 'Utworzono plik: '.$_POST['plik'];
	}
	else if ($op == "dodajfolder"){
		mkdir($_POST['plik'],0700);
		echo 'Utworzono folder: '.$_POST['plik'];
	}
	else {
		echo 'error';
	}
	
	
	function usunFolder($folderr){
		foreach(new DirectoryIterator($folderr) as  $entry){
			if($entry->isDir() && $entry->getFilename()!='..' && $entry->getFilename()!='.'){
				usunFolder($folderr.'/'.$entry->getFilename());
			}
			if(!$entry->isDir()){
				@unlink($folderr.'/'.$entry->getFilename()); 
			}
		}
		rmdir($folderr);
	}
	function usunPlik($dousuniecia){
			@unlink($dousuniecia);
	}
	function zmienNazwe($stary,$nowy){
		rename($stary,$nowy);
	}
	function dodajPlik($ourFileName){
		$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
		fclose($ourFileHandle);
	}
?>