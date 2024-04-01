<?php
require_once('dbhelp.php');

// Xử lý khi nhấn nút Submit
if (!empty($_POST)) {
    // Lấy dữ liệu từ form
    $s_StudentCode = $_POST['studentcode'];
    $s_FullName = $_POST['fullname'];
    $s_Dateofbirth = $_POST['dob'];
    $s_Class = $_POST['class'];
    $s_Address = $_POST['address'];
    $s_PhoneNumber = $_POST['phonenumber'];
    $s_Subject = $_POST['subject']; // Thêm trường Subject
    $s_Email = $_POST['email']; // Thêm trường Email

    // Escape dữ liệu để tránh SQL Injection
    $s_FullName = addslashes($s_FullName);
    $s_Class = addslashes($s_Class);
    $s_Address = addslashes($s_Address);
    $s_PhoneNumber = addslashes($s_PhoneNumber);
    $s_Subject = addslashes($s_Subject);
    $s_Email = addslashes($s_Email);

    // Thực hiện câu lệnh SQL để thêm thông tin sinh viên
    $sql = "INSERT INTO student (StudentCode, FullName, Dateofbirth, Class, Address, PhoneNumber, Subject, Email) 
            VALUES ('$s_StudentCode', '$s_FullName', '$s_Dateofbirth', '$s_Class', '$s_Address', '$s_PhoneNumber', '$s_Subject', '$s_Email')";
    execute($sql);

    // Chuyển hướng sau khi thực hiện xong
    header('Location: student.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .container {
            margin-top: 50px;
        }
        .panel-primary {
            border-color: #337ab7;
        }
        .panel-heading {
            background-color: #337ab7;
            color: #fff;
        }
        .panel-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #337ab7;
        }
        .btn-add {
            background-color: #337ab7;
            color: #fff;
            border: none;
        }
        .btn-add:hover {
            background-color: #286090;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Add Student
            </div>
            <div class="panel-body">
                <form method="post"> 
                    <div class="form-group">
                        <label for="studentcode">Student Code:</label>
                        <input type="text" class="form-control" id="studentcode" name="studentcode" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname"  required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob"  required>
                    </div>
                    <div class="form-group">
                        <label for="class">Class:</label>
                        <input type="text" class="form-control" id="class" name="class" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address"  required>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Phone Number:</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label> 
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label> 
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-add">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
