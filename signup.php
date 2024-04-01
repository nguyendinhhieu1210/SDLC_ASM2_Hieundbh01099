<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: antiquewhite;
    }
    .container {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 300px;
    }
    .form {
        border: 2px solid #ccc; 
        border-radius: 10px;
        padding: 20px;
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }
    label {
        font-weight: bold;
        color: #555;
    }
    input[type="email"],
    input[type="password"],
    input[type="text"],
    input[type="radio"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-color: #ff3333;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
        background-color: #cc0000;
    }
    p {
        text-align: center;
        margin-top: 15px;
        color: #555;
    }
    p a {
        text-decoration: none;
        color: #ff3333;
        font-weight: bold;
    }
    button {
        display: block;
        width: 100%;
        padding: 12px;
        margin-top: 15px;
        border: none;
        border-radius: 5px;
        background-color: #ff3333;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #cc0000;
    }
</style>
</style>
</head>
<body>
<div class="container">
        <h2>Sign Up</h2>
        <form action="" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Please enter your full name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Please enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Please enter your password" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Please enter your address" required>

            <input type="submit" value="Sign Up">
        </form>
        <p>Do you already have an account? <a href="login.php">Log in</a></p>
    </div>   
</body>
</html>

<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "signup"; 

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$address = $_POST['address'];

$hash_pass = password_hash($pass, PASSWORD_DEFAULT);

// Chèn dữ liệu vào bảng tương ứng
$sql = "INSERT INTO users (fullname, email, password, address) VALUES ('$fullname', '$email', '$hash_pass', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "Đăng ký thành công!";
    header("Location: login.php");
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
}
?>