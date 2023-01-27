<?php
require('../db.php');

$cn = $_POST['973p'];
$note = $_POST['note'];

if($cn==''){
    print 'Please enter a valid collection name that is used in 973 field !';
}else{
	$sql = "INSERT INTO `973P-CollectionName`(`CollectionName`, `Note`) 
				SELECT  `CollectionName`, `Note` 
				FROM (SELECT '$cn' AS CollectionName, '$note' as Note) t 
			";
	if ($conn->query($sql) === TRUE) {
			echo "ADDED: ".$cn."";
		} else {
			echo "Error: ".$sql."<br>".$conn->error;
		}

}

$conn->close();

?>