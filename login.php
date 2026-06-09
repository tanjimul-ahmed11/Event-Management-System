<?php 
session_start();
include 'db.php'; 
if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
    if($result->num_rows > 0){
        $_SESSION['user'] = $user;
        header("Location: index.php");
    } else {
        echo "<script>alert('Incorrect Username or Password!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - EventPro</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { justify-content: center; align-items: center; height: 100vh; background: #f4f7fe; }
        .auth-box { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); width: 400px; text-align: center; }
        .auth-box h2 { color: #4318ff; margin-bottom: 20px; font-size: 24px; }
        .form-group input { width: 100%; padding: 15px; margin-bottom: 15px; border: 2px solid #e2e8f0; border-radius: 10px; outline: none; }
        .form-group input:focus { border-color: #4318ff; }
        .btn-submit { background: #4318ff; color: white; padding: 15px; border: none; border-radius: 10px; width: 100%; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <div class="auth-box">
        <h2>Welcome to EventPro</h2>
        <form method="POST">
            <div class="form-group"><input type="text" name="username" placeholder="Username" required></div>
            <div class="form-group"><input type="password" name="password" placeholder="Password" required></div>
            <button type="submit" name="login" class="btn-submit">Login</button>
        </form>
        <p style="margin-top: 15px; color: #a3aed1;">Don't have an account? <a href="register.php" style="color: #4318ff;">Register</a></p>
    </div>
</body>
</html>