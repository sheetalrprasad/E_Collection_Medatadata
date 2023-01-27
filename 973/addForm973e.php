<?php
require('../db.php');

$ecid = (int)$_POST['ecid'];
$cn = $_POST['973e'];
$allbib = $_POST['973inallbib'];
$norm = $_POST['973normrule'];
$iz= $_POST['izonly'];
$note = $_POST['note'];

if($ecid==''){
    print 'Please enter a valid collection ID!';
}elseif ($cn==''){
    print 'Please enter a valid collection name that is used in 973 field !';
}else{
	$sql = "INSERT INTO `973E-CollectionName`(`CollectionID`,`973Value`,`973inAllBIB`,`973NormRule`,`IZonly?`,`Note`) 
			SELECT `CollectionID`,`973Value`,`973inAllBIB`,`973NormRule`,`IZonly?`,`Note`
			FROM (SELECT '$ecid' AS CollectionID,'$cn' AS 973Value, '$allbib' AS 973inAllBIB, '$norm' AS 973NormRule, '$iz'AS `IZonly?`, '$note' as Note) t";
	if ($conn->query($sql) === TRUE) {
			echo "ADDED: ".$ecid.", ".$cn."";
		} else {
			echo "Error: ".$sql."<br>".$conn->error;
		}

}

$conn->close();

?>