<?php 
include 'db.php'; 
if(isset($_POST['submit'])){
    $name = $conn->real_escape_string($_POST['event_name']);
    $price = $conn->real_escape_string($_POST['price']);
    $date = $conn->real_escape_string($_POST['event_date']);
    $loc = $conn->real_escape_string($_POST['location']);
    
    $conn->query("INSERT INTO events (event_name, price, event_date, location) VALUES ('$name', '$price', '$date', '$loc')");
    header("Location: index.php");
}
?>