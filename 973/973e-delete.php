
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
    <div>
    	<p><a href="../973_all_search.php">973</a> > <a href="973e.php">973 E-collections</a></p>
		<?php
		require('../db.php');
		$id=$_REQUEST['id'];
		$sql = "DELETE FROM `973E-CollectionName` WHERE `973Value` = '$id'";
		if ($conn->query($sql) === TRUE) {
			echo "Delete ".$id." successfully!<br>";
		} else {
			echo "Error: ".$sql."<br>".$conn->error;
		}
		$conn->close(); 
		?>
	</div>
	
</body>
</html>