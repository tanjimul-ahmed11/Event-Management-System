<?php
$conn = new mysqli("localhost", "root", "", "event_db");
if ($conn->connect_error) { die("Connection Failed: " . $conn->connect_error); }
?>