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
    <title>SaaS Event Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2><i class="fa-solid fa-bolt"></i> Events</h2>
    <a href="index.php" class="nav-link"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
    <a href="add_event.php" class="nav-link"><i class="fa-solid fa-calendar-plus"></i> Book Event</a>
    
    <a href="logout.php" class="nav-link" style="margin-top: 50px; color: #ef4444;"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <div>
            <h1>Overview Dashboard</h1>
            <p style="color: #a3aed1; font-weight: 500;">Welcome back, here is your event summary.</p>
        </div>
        <div class="user-profile">
            <i class="fa-solid fa-circle-user" style="font-size: 24px;"></i> Tanjim_11
        </div>
    </div>

    <!-- PHP Logic for Summary Cards -->
    <?php
        $res1 = $conn->query("SELECT COUNT(*) as total FROM events");
        $tot_events = $res1->fetch_assoc()['total'];

        $res2 = $conn->query("SELECT SUM(price) as expense FROM events");
        $tot_expense = $res2->fetch_assoc()['expense'] ?? 0;

        $res3 = $conn->query("SELECT event_date FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC LIMIT 1");
        $next_date = ($res3->num_rows > 0) ? $res3->fetch_assoc()['event_date'] : "No Upcoming";
    ?>

    <!-- Cards -->
    <div class="cards-grid">
        <div class="card">
            <div class="card-icon c-1"><i class="fa-solid fa-calendar-check"></i></div>
            <div class="card-info">
                <h4>Total Events</h4>
                <h3><?php echo $tot_events; ?></h3>
            </div>
        </div>
        <div class="card">
            <div class="card-icon c-2"><i class="fa-solid fa-wallet"></i></div>
            <div class="card-info">
                <h4>Total Expense</h4>
                <h3>৳ <?php echo number_format($tot_expense); ?></h3>
            </div>
        </div>
        <div class="card">
            <div class="card-icon c-3"><i class="fa-solid fa-clock-rotate-left"></i></div>
            <div class="card-info">
                <h4>Next Event</h4>
                <h3><?php echo $next_date; ?></h3>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="table-container">
        <h3 style="color: #2b3674; margin-bottom: 20px;">Recent Bookings</h3>
        <table>
            <tr>
                <th>Event Name</th>
                <th>Price</th>
                <th>Date</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['event_name']}</td>
                        <td><span class='badge'>৳ {$row['price']}</span></td>
                        <td><i class='fa-regular fa-calendar' style='color: #a3aed1; margin-right: 5px;'></i> {$row['event_date']}</td>
                        <td>{$row['location']}</td>
                        <td>
                            <a href='delete.php?id={$row['id']}' class='btn-delete' onclick=\"return confirm('Are you sure?')\">
                                <i class='fa-solid fa-trash-can'></i>
                            </a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>