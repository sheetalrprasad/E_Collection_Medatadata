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

    <div>
    	<p><a href="vendor.php">vendor</a></p>
		<?php
		require('../db.php');
		$id=$_REQUEST['id'];
		$sql = "DELETE FROM `VendorList` WHERE `Vendor ID` = '$id'";
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