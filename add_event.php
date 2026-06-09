<?php 
session_start();
if(!isset($_SESSION['user'])){ 
    header("Location: login.php"); 
    exit();
}
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Event </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2><i class="fa-solid fa-bolt"></i> Book Your Event</h2>
    <a href="index.php" class="nav-link"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
    <a href="add_event.php" class="nav-link active"><i class="fa-solid fa-calendar-plus"></i> Book Event</a>
    <a href="#" class="nav-link"><i class="fa-solid fa-gear"></i> Settings</a>
    <a href="logout.php" class="nav-link" style="margin-top: 50px; color: #ef4444;"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<!-- Main Content Area -->
<div class="main-content">
    <div class="split-container">
        
        <!-- Left Side Image -->
        <div class="split-img">
            <div class="img-text">
                <h2>Create Unforgettable Memories</h2>
                <p>Book your premium event package today.</p>
            </div>
        </div>
        
        <!-- Right Side Form -->
        <div class="split-form">
            <h2 style="color: #2b3674; margin-bottom: 30px;">Add New Event</h2>
            <form action="insert.php" method="POST">
                
                <div class="form-group">
                    <label>Select Event Type</label>
                    <select name="event_name" id="event_name" onchange="autoSetPrice()" required>
                        <option value="">-- Choose Package --</option>
                        <option value="Birthday Party">Birthday Party</option>
                        <option value="Wedding Package">Wedding Package</option>
                        <option value="Campus Fest">Campus Fest</option>
                        <option value="Corporate Seminar">Corporate Seminar</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Event Price (৳)</label>
                    <input type="number" name="price" id="price_box" placeholder="Price will be auto-filled" required readonly style="background: #f1f5f9; cursor: not-allowed;">
                </div>
                
                <div class="form-group">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required>
                </div>
                
                <div class="form-group">
                    <label>Location / Venue</label>
                    <input type="text" name="location" placeholder="e.g. University Campus" required>
                </div>
                
                <button type="submit" name="submit" class="btn-submit">Confirm Booking</button>
            </form>
        </div>
        
    </div>
</div>

<!-- JavaScript for Auto Price Fill -->
<script>
    function autoSetPrice() {
        let event = document.getElementById("event_name").value;
        let priceBox = document.getElementById("price_box");

        if (event === "Birthday Party") {
            priceBox.value = 15000;
        } else if (event === "Wedding Package") {
            priceBox.value = 50000;
        } else if (event === "Campus Fest") {
            priceBox.value = 40000;
        } else if (event === "Corporate Seminar") {
            priceBox.value = 25000;
        } else {
            priceBox.value = ""; 
        }
    }
</script>

</body>
</html>