<?php
		
$db = new mysqli('localhost', 'pawel33317_test', 'haslo01k', 'pawel33317_test');
	
	//echo $db->query("create table osoby(id int, name varchar(255))").'<br>';

	//echo $db->query("INSERT INTO osoby (id, name) VALUES ('1', 'pawel44'), ('1', 'pawel22'), ('1', 'pawel33');").'<br>';
	
	
if($db->connect_errno > 0){
    die('Error: ' . $db->connect_error.'<br>');
}
else {echo 'Connecti ok'.'<br>';}

$sql = <<<SQL
    SELECT *
    FROM `osoby`
SQL;

if(!$result = $db->query($sql)){
    die('error: ' . $db->error.'<br>');
}

while($row = $result->fetch_assoc()){
    echo $row['name'] . '<br />';
}

//echo 'Total results: ' . $result->num_rows.'<br>';

$result->free();







?>