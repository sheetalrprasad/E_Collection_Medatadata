<?php
require('../db.php');

$ecid = (int)$_POST['ecid'];
$cn = $_POST['ecname'];
$rt = $_POST['rtype'];
$bib = $_POST['bib'];
$freq = $_POST['freq'];
$act = $_POST['act'];
$perp = $_POST['perp'];
$agg = $_POST['agg'];
$sync= $_POST['sync'];
$oa = $_POST['oa'];
$reclm = $_POST['reclm'];
$vendor = $_POST['vendor'];
$note= $_POST['note'];

if($ecid==''){
    print 'Please enter a valid collection ID!';
}elseif ($cn==''){
    print 'Please enter a valid collection name!';
}elseif ($rt==''){
    print 'Please select resource type!';
}elseif ($bib==''){
    print 'Please select bib source!';
}else{
	$sql = "INSERT INTO `AllEbookCollections`(`Collection ID`, `Collection Name`, `Resource Type`, `Bib Source`, `Update Frequency`, `Active?`, `Perpetual?`, `Aggregator?`, `Data Sync?`, `OA?`, `Reclamation?`, `Vendor`, `Note`) 
		VALUES ('$ecid','$cn','$rt', '$bib','$freq','$act','$perp','$agg','$sync','$oa','$reclm','$vendor','$note')";
	if ($conn->query($sql) === TRUE) {
			echo "ADDED: ".$ecid.", ".$cn."";
		} else {
			echo "Error: ".$sql."<br>".$conn->error;
		}

}

$conn->close();

?>