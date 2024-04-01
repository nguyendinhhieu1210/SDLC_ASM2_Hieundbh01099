

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: darkkhaki;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 320px; 
            padding: 30px; 
            background-color: navajowhite;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
        }
        h2 {
            text-align: center;
            margin-bottom: 30px; 
            color: #333;
        }
        form {
            margin-bottom: 30px;
        }
        label, input {
            display: block;
            margin-bottom: 15px;
        }
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #ffe066; 
        input[type="submit"] {
            background-color: #ffcc00;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #e6b800; 
        }
        .signup-link {
            text-align: center;
            margin-top: 15px;
        }
        .signup-link a {
            text-decoration: none;
            color: darkkhaki;
            font-weight: bold;
        }
    </style>

</head>
<body>
<div class="container">
        <h2>Login Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Please enter in your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Please enter your password" required>

            <input type="submit" value="Login">
        </form>
        <div class="signup-link">
            <p>Do not have an account  ? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>    
</body>
</html>
<?php
// Thông tin kết nối đến cơ sở dữ liệu
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "signup"; 

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            header("Location: student.php");
        } 
    }
}
?>


