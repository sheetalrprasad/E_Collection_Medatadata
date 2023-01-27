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

$sql = "SELECT * FROM `VendorList` ORDER BY `Vendor ID`";
$result = $conn->query($sql);

if ($result->num_rows == 0){
    print 'No entry is found!';
}

else {
    print('<table style="width:30%">');
    print('<tr>
                <th>Vendor ID</th>
                <th>Vendor Name</th> 
                <th>Vendor Web</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Note</th>
                <th>Contact</th>
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
    print '</tr>';
}



$conn->close();
?>