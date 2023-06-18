<?php

try {
		$access=new pdo("mysql:host=localhost;dbname=juvestore;charset=utf8", "root", "Karmusa1");
		
		$access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
	$e->getMessage();
}
    
    


?>