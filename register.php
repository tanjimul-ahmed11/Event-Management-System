<?php 
include 'db.php'; 

if(isset($_POST['register'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    
    // SQL query-te naya fields gulo add kora hoyeche
    $query = "INSERT INTO users (username, password, email, mobile, address, gender) 
              VALUES ('$user', '$pass', '$email', '$mobile', '$address', '$gender')";
              
    if($conn->query($query)){
        echo "<script>alert('Account created successfully! Please login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - EventPro</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { display: flex; justify-content: center; align-items: center; min-height: 100vh; background: #f4f7fe; padding: 40px 0; }
        .auth-box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); width: 450px; text-align: center; }
        .auth-box h2 { color: #4318ff; margin-bottom: 20px; font-size: 24px; font-weight: 700; }
        .form-group { margin-bottom: 15px; text-align: left; }
        .form-group label { display: block; margin-bottom: 5px; color: #2b3674; font-weight: 600; font-size: 14px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px; outline: none; font-size: 14px; color: #2b3674; transition: 0.3s; }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: #4318ff; background: #f8fafc; }
        .btn-submit { background: #4318ff; color: white; padding: 14px; border: none; border-radius: 10px; width: 100%; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 10px; transition: 0.3s; }
        .btn-submit:hover { background: #3311cc; box-shadow: 0 10px 20px rgba(67, 24, 255, 0.2); }
    </style>
</head>
<body>
    <div class="auth-box">
        <h2>Create Account</h2>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Choose Username" required>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="e.g. example@gmail.com" required>
            </div>
            <div class="form-group">
                <label>Mobile Number</label>
                <input type="text" name="mobile" placeholder="e.g. 017XXXXXXXX" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" required>
                    <option value="">-- Select Gender --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" rows="2" placeholder="Your full address..." required></textarea>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Create Password" required>
            </div>
            <button type="submit" name="register" class="btn-submit">Register</button>
        </form>
        <p style="margin-top: 15px; color: #a3aed1; font-size: 14px;">Already have an account? <a href="login.php" style="color: #4318ff; font-weight: 600; text-decoration: none;">Login</a></p>
    </div>
</body>
</html>