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
		<form action="addForm973e.php" method="post">
			Collection ID: <input type="text" name="ecid"><br>
			973 Value: <input type="text" name="973e"><br>
			973 in All Bibs: <select name="973inallbib">
				<option value=1>Yes</option>
				<option value=0>No</option>
				</select><br>
			973 Norm Rule Has Created: <select name="973normrule">
				<option value=1>Yes</option>
				<option value=0>No</option>
				</select><br>
			Is It IZ Only?: <select name="izonly">
				<option value=1>Yes</option>
				<option value=0>No</option>
				</select><br>
			Note: <textarea type="text" name="note"></textarea><br>
			<input type ="submit" onClick="return empty()">
		</form>
	</div>

	<div>
		<h3>All 973 e-collection names</h3><br>
		<?php
		require('../db.php');
		$sql = "SELECT *
				FROM `973E-CollectionName`
				Order by `973Value`";
		$result = $conn->query($sql);

		if ($result->num_rows == 0){
    		print 'No entry is found!';
		}

		else {
    	print('<table style="width:30%">');
		print('<tr>
				<th>Collection ID</th>
				<th>Collection Name</th>
				<th>973 in Bib?</th>
				<th>973 Norm Rule?</th>
				<th>IZ Only?</th>
				<th>Note</th>
				</tr>');
		 }
		 while ($tuple = mysqli_fetch_row($result)) {
		    print '<tr>';
		    print '<td>'.$tuple[0].'</td>';
		    print '<td>'.$tuple[1].'</td>';
		    print '<td>'.$tuple[2].'</td>';
		    print '<td>'.$tuple[3].'</td>';
		    print '<td>'.$tuple[4].'</td>';
		    print '<td>'.$tuple[5].'</td>';
		    print '</tr>';
		}
		$conn->close();
		?>
	</div>




</body>
</html>