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
	    <a href="../ecollections.php">E-collections</a>
	    <a href="../vendorlist.php">Vendor</a>
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

		if (isset($_POST['namecheck'])){
			echo "namecheck<br>";
			if (isset($_POST['p973name'])) {
				$newename = $_POST['p973name'];
				$sql = "UPDATE `973P-CollectionName` SET `CollectionName`='$newename' WHERE `PCID` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed Collection Name<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}

		if (isset($_POST['notecheck'])){
			echo "notecheck<br>";
			if (isset($_POST['p973note'])) {
				$newenote = $_POST['p973note'];
				$sql = "UPDATE `973P-CollectionName` SET `Note`='$newenote' WHERE `PCID` = '$oldid'";
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
				<th><strong>Collection Name</strong></th>
				<th><strong>Note</strong></th>
				</tr>
				</thead>
				<tbody>
					<?php
					require('../db.php');
					$sql = "SELECT * FROM `973P-CollectionName` 
						    WHERE `PCID` = '$oldid'";
					$result = $conn->query($sql);
					while($row = mysqli_fetch_assoc($result)) { 
						print '<tr>';

						print '<td align="left">';
						echo $row["CollectionName"]; 
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