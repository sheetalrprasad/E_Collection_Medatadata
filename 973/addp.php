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
	    <a href="../erm/ecollections.php">E-collections</a>
	    <a href="../erm/vendorlist.php">Vendor</a>
	    <div class="subnav">
	    	<button class="subnavbtn" onclick="location.href='../973_all_search.php'">973 <i class="fa fa-caret-down"></i></button>
	    	<div class="subnav-content">
	    		<a href="adde.php">Add E 973</a>
	    		<a href="addp.php">Add P 973</a>
	    		<a href="dm.php">Delete/Modify</a>
	    	</div>
	    </div>
    </div>

	<div>
		<form action="addForm973p.php" method="post">
		973 Value: <input type="text" name="973p"><br>
		Note: <textarea type="text" name="note"></textarea><br>
		<input type ="submit">
		</form>
	</div>

	<div>
		<h3>All 973 p-collection names</h3><br>
		<?php
		require('../db.php');
		$sql = "SELECT `CollectionName`, `Note`
				FROM `973P-CollectionName`
				Order by `CollectionName`";
		$result = $conn->query($sql);

		if ($result->num_rows == 0){
    		print 'No entry is found!';
		}

		else {
    	print('<table style="width:30%">');
		print('<tr>
				<th>Collection Name</th>
				<th>Note</th>
				</tr>');
		 }
		 while ($tuple = mysqli_fetch_row($result)) {
		    print '<tr>';
		    print '<td>'.$tuple[0].'</td>';
		    print '<td>'.$tuple[1].'</td>';
		    print '</tr>';
		}
		$conn->close();
		?>
	</div>




</body>
</html>