
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
	<div class="form">
		<p><a href="../973_all_search.php">973</a> > <a href="973e.php">973 E-collections</a></p>
		<h2>Update Record</h2>
		<?php
			$id=$_REQUEST['id'];
			print "<h3>Old Record: ";
			echo $id;
			print " collection</h3>";
		?>
		<table width="100%" border="1" style="border-collapse:collapse;">
				<thead>
				<tr>
				<th><strong>Collection ID</strong></th>
				<th><strong>Collection Name</strong></th>
				<th><strong>973 in Bib?</strong></th>
				<th><strong>973 Norm Rule?</strong></th>
				<th><strong>IZ Only?</strong></th>
				<th><strong>Note</strong></th>
				</tr>
				</thead>
				<tbody>
					<?php
					require('../db.php');
					$sql = "SELECT * FROM `973E-CollectionName` 
						    WHERE `973Value` = '$id'";
					$result = $conn->query($sql);
					while($row = mysqli_fetch_assoc($result)) { 
						print '<tr>';
						print '<td align="left">';
						echo $row["CollectionID"]; 
						print '</td>';

						print '<td align="left">';
						echo $row["973Value"]; 
						print '</td>';

						print '<td align="left">';
						if ($row["973inAllBIB"] == 1){
							echo "Y"; 
						}else{
							echo "N";
						}
						print '</td>';

						print '<td align="left">';
						if ($row["973NormRule"] == 1){
							echo "Y"; 
						}else{
							echo "N";
						}
						print '</td>';

						print '<td align="left">';
						if ($row["IZonly?"] == 1){
							echo "Y"; 
						}else{
							echo "N";
						}
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
		<form id="modifye973" action="modify973e.php" method="post">
			<input type="checkbox" id="idcheck" name="idcheck" class="fieldcheck">
			<label>Collection ID: </label>
			<input type="number" name="e973id" id="e973id"><br>

			<input type="checkbox" id="namecheck" name="namecheck" class="fieldcheck">
			<label>Collection Name in 973: </label>
			<input type="text" name="e973name" id="e973name"><br>

			<input type="checkbox" id="bibcheck" name="bibcheck" class="fieldcheck">
			<label>973 in All BIB? </label>
			<select name="e973bib" id="e973bib">
				<option value=3>No Change Needed</option>
				<option value=1>Yes</option>
				<option value=0>No</option>
			</select><br>

			<input type="checkbox" id="nrcheck" name="nrcheck" class="fieldcheck">
			<label>973 Norm Rule? </label>
			<select name="e973nr" id="e973nr">
				<option value=3>No Change Needed</option>
				<option value=1>Yes</option>
				<option value=0>No</option>
			</select><br>

			<input type="checkbox" id="izcheck" name="izcheck" class="fieldcheck">
			<label>IZ Only? </label>
			<select name="e973iz" id="e973iz">
				<option value=3>No Change Needed</option>
				<option value=1>Yes</option>
				<option value=0>No</option>
			</select><br>

			<input type="checkbox" id="notecheck" name="notecheck" class="fieldcheck">
			<label>Note: </label>
			<textarea type="text" name="e973note" id="e973note"></textarea><br>

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
    $('#modifye973').submit(function (e) {
        //check atleat 1 checkbox is checked
        if (!$('.fieldcheck').is(':checked')) {
            //prevent the default form submit if it is not checked
            $('#msgfail1').show();
			setTimeout(function() { $('#msgfail1').hide(); }, 3000);
            e.preventDefault();
        }else{
        	if ($('#idcheck').is(':checked')){
        		if (document.getElementById("e973id").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#namecheck').is(':checked')){
        		if (document.getElementById("e973name").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#bibcheck').is(':checked')){
        		if (document.getElementById("e973bib").value == 3){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#nrcheck').is(':checked')){
        		if (document.getElementById("e973nr").value == 3){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#izcheck').is(':checked')){
        		if (document.getElementById("e973iz").value == 3){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#notecheck').is(':checked')){
        		if (document.getElementById("e973note").value == ""){
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