
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
	<div class="form">
		<p><a href="vendor.php">vendor</a></p>
		<h2>Update Record</h2>
		<?php
			$id=$_REQUEST['id'];
			print "<h3>Old Record: </h3>";
		?>
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
						    WHERE `Vendor ID` = '$id'";
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
	<div>
		<h3>Modify:</h3>
		<p>Check the field that you would like to change first and enter the new value.</p>
		<form id="modifyvendor" action="modifyvendor.php" method="post">

			<input type="checkbox" id="namecheck" name="namecheck" class="fieldcheck">
			<label>Vendor Name: </label>
			<input type="text" name="vendorname" id="vendorname"><br>

			<input type="checkbox" id="webcheck" name="webcheck" class="fieldcheck">
			<label>Login Web: </label>
			<input type="text" name="vendorweb" id="vendorweb"><br>

			<input type="checkbox" id="uncheck" name="uncheck" class="fieldcheck">
			<label>Username: </label>
			<input type="text" name="vendorun" id="vendorun"><br>

			<input type="checkbox" id="pwdcheck" name="pwdcheck" class="fieldcheck">
			<label>Password: </label>
			<input type="text" name="vendorpwd" id="vendorpwd"><br>

			<input type="checkbox" id="notecheck" name="notecheck" class="fieldcheck">
			<label>Note: </label>
			<textarea type="text" name="vendornote" id="vendornote"></textarea><br>

			<input type="checkbox" id="contactcheck" name="contactcheck" class="fieldcheck">
			<label>Contact: </label>
			<input type="text" name="vendorcontact" id="vendorcontact"><br>

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
    $('#modifyvendor').submit(function (e) {
        //check atleat 1 checkbox is checked
        if (!$('.fieldcheck').is(':checked')) {
            //prevent the default form submit if it is not checked
            $('#msgfail1').show();
			setTimeout(function() { $('#msgfail1').hide(); }, 3000);
            e.preventDefault();
        }else{
        	if ($('#contactcheck').is(':checked')){
        		if (document.getElementById("vendorcontact").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#namecheck').is(':checked')){
        		if (document.getElementById("vendorname").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#webcheck').is(':checked')){
        		if (document.getElementById("vendorweb").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#uncheck').is(':checked')){
        		if (document.getElementById("vendorun").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#pwdcheck').is(':checked')){
        		if (document.getElementById("vendorpwd").value == ""){
        			$('#msgfail2').show();
					setTimeout(function() { $('#msgfail2').hide(); }, 3000);
           			e.preventDefault();
        		}
        	}

        	if ($('#notecheck').is(':checked')){
        		if (document.getElementById("vendornote").value == ""){
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