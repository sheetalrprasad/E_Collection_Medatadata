<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <title>973 Database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../source/basic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<body>
	<div class="header">
	    <h1 style="font-family:verdana;">You can view all vendors or make changes to the vendor database</h1>
	</div>
	<div class="navbar">
	    <!-- <a href="../index.html">Home</a> -->
	    <a href="../ecollections.php">E-collections</a>
	    <a href="vendor.php">Vendor</a>
	    <div class="subnav">
	    	<button class="subnavbtn active">973 <i class="fa fa-caret-down"></i></button>
	    	<div class="subnav-content">
	    		<a href="../973/973e.php">973 E-collections</a>
	    		<a href="../973/973p.php">973 P-collections</a>
	    	</div>
	    </div>
    </div>


    <?php 
		$oldid = $_POST['oldID']; 
		require('../db.php');

		if (isset($_POST['namecheck'])){
			if (isset($_POST['vendorname'])) {
				$newvname = $_POST['vendorname'];
				$sql = "UPDATE `VendorList` SET `Vendor Name`='$newvname' WHERE `Vendor ID` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed vendor name<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
			$oldid = $newename;
		}


		if (isset($_POST['webcheck'])){
			if (isset($_POST['vendorweb'])) {
				$newvweb = $_POST['vendorweb'];
				$sql = "UPDATE `VendorList` SET `Vendor Web`='$newvweb' WHERE `Vendor ID` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed vendor login websitebr>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}


		if (isset($_POST['uncheck'])){
			if (isset($_POST['vendorun'])) {
				$newvun = $_POST['vendorun'];
				$sql = "UPDATE `VendorList` SET `Vendor Web UserName`='$newvun' WHERE `Vendor ID` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed username<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}
		if (isset($_POST['pwdcheck'])){
			if (isset($_POST['vendorpwd'])) {
				$newvpwd = $_POST['vendorpwd'];
				$sql = "UPDATE `VendorList` SET `Vendor Web PWD`='$newvpwd' WHERE `Vendor ID` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed password<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}
		
		if (isset($_POST['notecheck'])){
			if (isset($_POST['vendornote'])) {
				$newvnote = $_POST['vendornote'];
				$sql = "UPDATE `VendorList` SET `Note`='$newvnote' WHERE `Vendor ID` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed note<br>";
				} else {
					echo "Error: ".$sql."<br>".$conn->error;
				}
			}
		}

		if (isset($_POST['contactcheck'])){
			if (isset($_POST['vendorcontact'])) {
				$newvcontact = $_POST['vendorcontact'];
				$sql = "UPDATE `VendorList` SET `Vendor Contact?`='$newvcontact' WHERE `Vendor ID` = '$oldid'";
				if ($conn->query($sql) === TRUE) {
					echo "Changed vendor contact information<br>";
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
				<th><strong>Vendor Name</strong></th>
				<th><strong>Login Web</strong></th>
				<th><strong>Username</strong></th>
				<th><strong>Password</strong></th>
				<th><strong>Note</strong></th>
				<th><strong>Contact</strong></th>
				</tr>
				</thead>
				<tbody>
					<?php
					require('../db.php');
					$sql = "SELECT * FROM `VendorList` 
						    WHERE `Vendor ID` = '$oldid'";
					$result = $conn->query($sql);
					while($row = mysqli_fetch_assoc($result)) { 
						print '<tr>';
						print '<td align="left">';
						echo $row["Vendor Name"]; 
						print '</td>';

						print '<td align="left">';
						echo $row["Vendor Web"]; 
						print '</td>';

						print '<td align="left">';
						echo $row["Vendor Web UserName"]; 
						print '</td>';

						print '<td align="left">';
						echo $row["Vendor Web PWD"]; 
						print '</td>';


						print '<td align="left">';
						echo $row["Note"]; 
						print '</td>';

						print '<td align="left">';
						echo $row["Vendor Contact"]; 
						print '</td>';

						print '</tr>';
					}
					$conn->close(); 

			?></tbody></table>
	</div>
</body>
</html>