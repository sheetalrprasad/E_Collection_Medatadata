<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>973 Database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../source/basic.css">

</head>
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

    <div class="tab">
		<button class="tablinks" onclick="openCity(event, 'View')">View/Edit</button>
		<button class="tablinks" onclick="openCity(event, 'Add')">Add New</button>
	</div>

	<div id="View" class="tabcontent" style="display:block">
		<div class="form">
		<form action="973p.php" method="post">
			<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
	        <input type="submit" name="search" value="Filter"><br><br>
			<h2>View Records</h2>
			<table width="100%" border="1" style="border-collapse:collapse;">
				<thead>
				<tr>
				<th><strong>Collection Name</strong></th>
				<th><strong>Note</strong></th>
				<th><strong>Edit</strong></th>
				<th><strong>Delete</strong></th>
				</tr>
				</thead>
				<tbody>
					<?php
					require('../db.php');

					if ($_POST['valueToSearch']){
						$valueToSearch = $_POST['valueToSearch'];
						$sql = "SELECT * FROM `973P-CollectionName` 
						        WHERE CONCAT(`CollectionName`, `Note`) 
						        LIKE '%".$valueToSearch."%'";
					}else{
						$sql = "SELECT * FROM `973P-CollectionName` Order by `CollectionName`";
					}
					

					$result = $conn->query($sql);
					

					while($row = mysqli_fetch_assoc($result)) { 
						print '<tr>';
						print '<td align="left">';
						echo $row["CollectionName"]; 
						print '</td>';

						print '<td align="left">';
						echo $row["Note"]; 
						print '</td>';

						print '<td align="left"><a href="973p-edit.php?id=';
						echo $row["PCID"];
						print '">Edit</a></td>';

						print '<td align="left"><a href="973p-delete.php?id=';
						echo $row["PCID"];
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
		<form action="addForm973p.php" method="post">
			973 Value: <input type="text" name="973p"><br>
			Note: <textarea type="text" name="note"></textarea><br>
			<input type ="submit">
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