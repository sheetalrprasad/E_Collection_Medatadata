<?php
$servername = "rohancp.sdsu.edu";
$username = "metadata";
$password = "SDSUmeta22";
$dbname = "metadata_ebook_collection";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `AllEbookCollections` ORDER BY `Collection Name`";
$result = $conn->query($sql);

if ($result->num_rows == 0){
    print 'No entry is found!';
}

else {
    print('<table style="width:30%">');
    print('<tr>
                <th>Collection Name</th>
                <th>Collection ID</th>
                <th>Resource Type</th>
                <th>Bib Source</th>
                <th>Update Freq</th>
                <th>Active?</th>
                <th>Perpetual?</th>
                <th>Aggregator?</th>
                <th>Data Sync?</th>
                <th>OA?</th>
                <th>Reclamation?</th>
                <th>Vendor</th>
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
    print '<td>'.$tuple[6].'</td>';
    print '<td>'.$tuple[7].'</td>';
    print '<td>'.$tuple[8].'</td>';
    print '<td>'.$tuple[9].'</td>';
    print '<td>'.$tuple[10].'</td>';
    print '<td>'.$tuple[11].'</td>';
    print '<td>'.$tuple[12].'</td>';
    print '</tr>';
}



$conn->close();
?>