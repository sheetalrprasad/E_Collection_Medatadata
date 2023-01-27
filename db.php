<?php

$hostname = "rohancp.sdsu.edu";
$username = "metadata";
$password = "SDSUmeta22";
$dbname = "metadata_ebook_collection";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>