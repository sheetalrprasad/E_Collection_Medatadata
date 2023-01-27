
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
	<div class="form">
		<p><a href="../973_all_search.php">973</a> > <a href="973p.php">973 P-collections</a></p>
		<h2>Update Record</h2>
		<table width="100%" border="1" style="border-collapse:collapse;">
				<thead>
				<tr>
				<th><strong>Collection Name</strong></th>
				<th><strong>Note</strong></th>
				</tr>
				</thead>
				<tbody>
					<?php
					$id=$_REQUEST['id'];
					require('../db.php');
					$sql = "SELECT * FROM `973P-CollectionName` 
						    WHERE `PCID` = '$id'";
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
	<div>
		<h3>Modify:</h3>
		<p>Check the field that you would like to change first and enter the new value.</p>
		<form id="modifyp973" action="modify973p.php" method="post">
		
			<input type="checkbox" id="namecheck" name="namecheck" class="fieldcheck">
			<label>Collection Name in 973: </label>
			<input type="text" name="p973name" id="p973name"><br>

			<input type="checkbox" id="notecheck" name="notecheck" class="fieldcheck">
			<label>Note: </label>
			<textarea type="text" name="p973note" id="p973note"></textarea><br>

			<input type="hidden" name='oldID' value= "<?php echo  $id; ?>"><br>

			<input type ="submit">
			<p id="msgfail1"  hidden="hidden" style="color: red">Please select at least one field to modify before submit.</p>
			<p id="msgfail2"  hidden="hidden" style="color: red">Enter new value for the checked fields</p>
		</div>
		</form>
</body>

<script>
jQuery(function ($) {
    //form submit handler
    $('#modifyp973').submit(function (e) {
        //check atleat 1 checkbox is checked
        if (!$('.fieldcheck').is(':checked')) {
            //prevent the default form submit if it is not checked
            $('#msgfail1').show();
			setTimeout(function() { $('#msgfail1').hide(); }, 3000);
            e.preventDefault();
        }else{

        	if ($('#namecheck').is(':checked')){
        		if (document.getElementById("p973name").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#notecheck').is(':checked')){
        		if (document.getElementById("p973note").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}
        }
    })
})
</script>
</html>