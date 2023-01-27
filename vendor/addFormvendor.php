<?php
require('../db.php');

$name = $_POST['vname'];
$web = $_POST['vweb'];
$un = $_POST['vun'];
$pwd = $_POST['vpwd'];
$con = $_POST['vcontact'];
$note = $_POST['vnote'];


$sql = "INSERT INTO `VendorList`(`Vendor Name`,`Vendor Web`,`Vendor Web UserName`,`Vendor Web PWD`,`Note`,`Vendor Contact`) 
		SELECT `Vendor Name`,`Vendor Web`,`Vendor Web UserName`,`Vendor Web PWD`,`Note`,`Vendor Contact`
		FROM (SELECT '$name' AS `Vendor Name`,'$web' AS `Vendor Web`, '$un' AS `Vendor Web UserName`, '$pwd' AS `Vendor Web PWD`, '$note'AS `Note`, '$con' as `Vendor Contact`) t";
if ($conn->query($sql) === TRUE) {
		echo "ADDED: ".$name." successfully";
	} else {
		echo "Error: ".$sql."<br>".$conn->error;
	}



$conn->close();

?>