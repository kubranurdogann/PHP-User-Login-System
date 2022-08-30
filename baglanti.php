<?php 

try{
	$db=new PDO("mysql:host=localhost;dbname=site;charset:utf8",'kubra','67ZbLe)B8s.1usU/');
	$db->query("SET CHARACTER SET utf8");

}catch(PDOExpception $e){
	echo $e->getMessage();
}

?>
