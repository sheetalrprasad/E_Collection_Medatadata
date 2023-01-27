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
    <?php
    $oldid = $_POST['oldID'];
    require('../db.php');

    if (isset($_POST['namecheck'])){
        if (isset($_POST['ecolname'])) {
            $newename = $_POST['ecolname'];
            $sql = "UPDATE `AllEbookCollections` SET `Collection Name`='$newename' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Collection Name<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['idcheck'])){
        if (isset($_POST['ecolid'])) {
            $neweid = $_POST['ecolid'];
            $sql = "UPDATE `AllEbookCollections` SET `Collection ID`='$neweid' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Collection ID<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
        $oldid = $neweid;
    }

    if (isset($_POST['rtypecheck'])){
        if (isset($_POST['ecolrtype'])) {
            $newertype = $_POST['ecolrtype'];
            $sql = "UPDATE `AllEbookCollections` SET `Resource Type`='$newertype' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Resource Type<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['bibcheck'])){
        if (isset($_POST['ecolbib'])) {
            $newebib = $_POST['ecolbib'];
            $sql = "UPDATE `AllEbookCollections` SET `Bib Source`='$newebib' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Bib Source<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['frqcheck'])){
        if (isset($_POST['ecolfrq'])) {
            $newefrq = $_POST['ecolfrq'];
            $sql = "UPDATE `AllEbookCollections` SET `Update Frequency`='$newefrq' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Update Frequency<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['actcheck'])){
        if (isset($_POST['ecolact'])) {
            $neweact = $_POST['ecolact'];
            $sql = "UPDATE `AllEbookCollections` SET `Active?`='$neweact' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Active Value<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['perpcheck'])){
        if (isset($_POST['ecolperp'])) {
            $neweperp = $_POST['ecolperp'];
            $sql = "UPDATE `AllEbookCollections` SET `Perpetual?`='$neweperp' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Perpetual Value<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['aggcheck'])){
        if (isset($_POST['ecolagg'])) {
            $neweagg = $_POST['ecolagg'];
            $sql = "UPDATE `AllEbookCollections` SET `Aggregator?`='$neweagg' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Aggregator Value<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['synccheck'])){
        if (isset($_POST['ecolsync'])) {
            $newesync = $_POST['ecolsync'];
            $sql = "UPDATE `AllEbookCollections` SET `Data Sync?`='$newesync' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Data Sync Value<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['oacheck'])){
        if (isset($_POST['ecoloa'])) {
            $neweoa = $_POST['ecoloa'];
            $sql = "UPDATE `AllEbookCollections` SET `OA?`='$neweoa' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed OA Value<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['claimcheck'])){
        if (isset($_POST['ecolclaim'])) {
            $neweclaim = $_POST['ecolclaim'];
            $sql = "UPDATE `AllEbookCollections` SET `Reclamation?`='$neweclaim' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Reclamation Value<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['vendorcheck'])){
        if (isset($_POST['ecolvendor'])) {
            $newevendor = $_POST['ecolvendor'];
            $sql = "UPDATE `AllEbookCollections` SET `Vendor`='$newevendor' WHERE `Collection ID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Vendor<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }

    if (isset($_POST['notecheck'])){
        if (isset($_POST['ecolnote'])) {
            $newenote = $_POST['ecolnote'];
            $sql = "UPDATE `973P-CollectionName` SET `Note`='$newenote' WHERE `PCID` = '$oldid'";
            if ($conn->query($sql) === TRUE) {
                echo "Changed Collection Note value<br>";
            } else {
                echo "Error: ".$sql."<br>".$conn->error;
            }
        }
    }
    $conn->close();
    ?>
</div>
</body>
</html>