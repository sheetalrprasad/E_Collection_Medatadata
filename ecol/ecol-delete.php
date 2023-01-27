
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-collections</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../source/basic.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
</head>
<body>
<div class="header">
    <h1 style="font-family:verdana;">You can view all e-collections or make changes to the e-collection database</h1>
</div>
<div class="navbar">
    <!-- <a href="../index.html">Home</a> -->
    <a href="../ecollections.php">E-collections</a>
    <a href="../vendor.php">Vendor</a>
    <div class="subnav">
        <button class="subnavbtn active" onclick="location.href='../973_all_search.php'">973 <i
                class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
            <a href="../973/973e.php">973 E-collections</a>
            <a href="../973/973p.php">973 P-collections</a>
        </div>
    </div>
</div>
<div>
    <p><a href="../ecol.php">E-collections</a></p>
    <?php
    require('../db.php');
    $id=$_REQUEST['id'];
    $sql = "DELETE FROM `AllEbookCollections` WHERE `Collection ID` = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Delete ".$id." successfully!<br>";
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
    $conn->close();
    ?>
</div>
</body>
<script>
</script>
</html>