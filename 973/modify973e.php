<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <title>973 Database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../source/basic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<body>
	<div class="header">
	    <h1 style="font-family:verdana;">You can view all 973 collection names or make changes to the 973 database</h1>
	</div>
	<div class="navbar">
	    <!-- <a href="../index.html">Home</a> -->
	    <a href="../erm/ecollections.php">E-collections</a>
	    <a href="../erm/vendorlist.php">Vendor</a>
	    <div class="subnav">
	    	<button class="subnavbtn" onclick="location.href='../973_all_search.php'">973 <i class="fa fa-caret-down"></i></button>
	    	<div class="subnav-content">
	    		<a href="973e.php">973 E-collections</a>
	    		<a href="973p.php">973 P-collections</a>
	    	</div>
	    </div>
    </div>
    <?php 
		$oldid = $_POST['oldID']; 
		require('../db.php');

		if (isset($_POST['idcheck'])){
			echo "idcheck<br>";
			if (isset($_POST['e973id'])) {
				$neweid = $_POST['e973id'];
				$sql = "UPDATE `973E-CollectionName` SET `CollectionID`='$neweid' WHERE `973Value` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed Collection ID<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}
		if (isset($_POST['namecheck'])){
			echo "namecheck<br>";
			if (isset($_POST['e973name'])) {
				$newename = $_POST['e973name'];
				$sql = "UPDATE `973E-CollectionName` SET `973Value`='$newename' WHERE `973Value` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed Collection Name<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
			$oldid = $newename;
		}
		if (isset($_POST['bibcheck'])){
			echo "bibcheck<br>";
			if (isset($_POST['e973bib'])) {
				$newebib = $_POST['e973bib'];
				$sql = "UPDATE `973E-CollectionName` SET `973inAllBIB`='$newebib' WHERE `973Value` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed Collection Bib<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}
		if (isset($_POST['nrcheck'])){
			echo "nrcheck<br>";
			if (isset($_POST['e973nr'])) {
				$newenr = $_POST['e973nr'];
				$sql = "UPDATE `973E-CollectionName` SET `973NormRule`='$newenr' WHERE `973Value` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed Collection NR<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}
		if (isset($_POST['izcheck'])){
			echo "izcheck<br>";
			if (isset($_POST['e973iz'])) {
				$neweiz = $_POST['e973iz'];
				$sql = "UPDATE `973E-CollectionName` SET `IZonly?`='$neweiz' WHERE `973Value` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed Collection IZ only value<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}
		if (isset($_POST['notecheck'])){
			echo "notecheck<br>";
			if (isset($_POST['e973note'])) {
				$newenote = $_POST['e973note'];
				$sql = "UPDATE `973E-CollectionName` SET `Note`='$newenote' WHERE `973Value` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed Collection Note value<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}

		$conn->close();
		?>
		<div class="form">
			<h2>Updated Record</h2>
			<table width="100%" border="1" style="border-collapse:collapse;">
				<thead>
				<tr>
				<th><strong>Collection ID</strong></th>
				<th><strong>Collection Name</strong></th>
				<th><strong>973 in Bib?</strong></th>
				<th><strong>973 Norm Rule?</strong></th>
				<th><strong>IZ Only?</strong></th>
				<th><strong>Note</strong></th>
				</tr>
				</thead>
				<tbody>
					<?php
					require('../db.php');
					$sql = "SELECT * FROM `973E-CollectionName` 
						    WHERE `973Value` = '$oldid'";
					$result = $conn->query($sql);
					while($row = mysqli_fetch_assoc($result)) { 
						print '<tr>';
						print '<td align="left">';
						echo $row["CollectionID"]; 
						print '</td>';

						print '<td align="left">';
						echo $row["973Value"]; 
						print '</td>';

						print '<td align="left">';
						if ($row["973inAllBIB"] == 1){
							echo "Y"; 
						}else{
							echo "N";
						}
						print '</td>';

						print '<td align="left">';
						if ($row["973NormRule"] == 1){
							echo "Y"; 
						}else{
							echo "N";
						}
						print '</td>';

						print '<td align="left">';
						if ($row["IZonly?"] == 1){
							echo "Y"; 
						}else{
							echo "N";
						}
						print '</td>';

						print '<td align="left">';
						echo $row["Note"]; 
						print '</td>';

						print '</tr>';
					}
					$conn->close(); 

			?></tbody></table>
	</div>
</body>
</html>