<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vendor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../source/basic.css">
</head>
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

	<div>
	</div>

	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'View')">View/Edit</button>
		<button class="tablinks" onclick="openCity(event, 'Add')">Add New</button>
	</div>

<div id="View" class="tabcontent" style="display:block">
		<div class="form">
		<form action="vendor.php" method="post">
			<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
	        <input type="submit" name="search" value="Filter"><br><br>
			<h2>View Records</h2>
			<table width="100%" border="1" style="border-collapse:collapse;">
				<thead>
				<tr>
				<th><strong>Vendor Name</strong></th>
				<th><strong>Login Web</strong></th>
				<th><strong>Username</strong></th>
				<th><strong>Password</strong></th>
				<th><strong>Note</strong></th>
				<th><strong>Contact</strong></th>
				<th><strong>Edit</strong></th>
				<th><strong>Delete</strong></th>
				</tr>
				</thead>
				<tbody>
					<?php
					require('../db.php');

					if ($_POST['valueToSearch']){
						$valueToSearch = $_POST['valueToSearch'];
						$sql = "SELECT * FROM `VendorList` 
						        WHERE CONCAT(`Vendor Name`, `Vendor Web`, `Vendor Web UserName`, `Vendor Web PWD`, `Note`,`Vendor Contact`) 
						        LIKE '%".$valueToSearch."%'";
					}else{
						$sql = "SELECT * FROM `VendorList` Order by `Vendor Name`";
					}
					

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

						print '<td align="left"><a href="vendor-edit.php?id=';
						echo $row["Vendor ID"];
						print '">Edit</a></td>';

						print '<td align="left"><a href="vendor-delete.php?id=';
						echo $row["Vendor ID"];
						print '">Delete</a></td>';

						print '</tr>';
					}
					$conn->close();
					?>
					</tbody>
				</table>
		</form>
	</div>
	</div>

	<div id="Add" class="tabcontent">
		<form action="addFormvendor.php" method="post">
			Vendor Name: <input type="text" name="vname"><br>
			Login Web: <input type="text" name="vweb"><br>
			Username: <input type="text" name="vun"><br>
			Password: <input type="text" name="vpwd"><br>
			Note: <textarea type="text" name="vnote"></textarea><br>
			Contact: <input type="text" name="vcontact"><br>
			<input type ="submit" onClick="return empty()">
		</form>
	</div>



</body>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</html>