<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>973 Database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../erm/source/basic.css">
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
	    	<button class="subnavbtn active">973 <i class="fa fa-caret-down"></i></button>
	    	<div class="subnav-content">
	    		<a href="973/973e.php">973 E-collections</a>
	    		<a href="973/973p.php">973 P-collections</a>
	    	</div>
	    </div>
    </div>

	<div>
	</div>

	<div>
		<h3>All 973 collection names</h3><br>
		<?php
		require('db.php');
		$sql = "SELECT `CollectionName`, 'P' AS `P/E`
				FROM `973P-CollectionName`
				Union 
				SELECT 	`973Value` AS `CollectionName`, 'E' AS `P/E`
				FROM `973E-CollectionName`
				Order by `CollectionName`";
		$result = $conn->query($sql);
		if ($result->num_rows == 0){
    		print 'No entry is found!';
		}

		else {
    	print('<table style="width:30%">');
		print('<tr>
				<th>Collection Name</th>
				<th>P/E?</th>
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