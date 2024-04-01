<?php
require_once('dbhelp.php');

$s_StudentCode = $s_FullName = $s_Dateofbirth = $s_Class = $s_Address = $s_PhoneNumber = $s_Subject = $s_Email = "";

// Xử lý khi nhấn nút Submit
if (!empty($_POST)) {
    // Lấy dữ liệu từ form
    $s_StudentCode = $_POST['studentcode'];
    $s_FullName = $_POST['fullname'];
    $s_Dateofbirth = $_POST['dob'];
    $s_Class = $_POST['class'];
    $s_Address = $_POST['address'];
    $s_PhoneNumber = $_POST['phonenumber'];
    $s_Subject = $_POST['subject'];
    $s_Email = $_POST['email'];

    // Escape dữ liệu để tránh SQL Injection
    $s_FullName = addslashes($s_FullName);
    $s_Class = addslashes($s_Class);
    $s_Address = addslashes($s_Address);
    $s_PhoneNumber = addslashes($s_PhoneNumber);
    $s_Subject = addslashes($s_Subject);
    $s_Email = addslashes($s_Email);

    // Thực hiện câu lệnh SQL để cập nhật thông tin sinh viên
    $sql = "UPDATE student SET FullName = '$s_FullName', Dateofbirth = '$s_Dateofbirth', Class = '$s_Class', Address = '$s_Address', PhoneNumber = '$s_PhoneNumber', Subject ='$s_Subject', Email = '$s_Email' WHERE StudentCode = '$s_StudentCode'";
    execute($sql);

    // Chuyển hướng sau khi thực hiện xong
    header('Location: student.php');
    die();
}

// Kiểm tra và lấy thông tin sinh viên cần chỉnh sửa
if (!empty($_GET['StudentCode'])) {
    $studentCode = $_GET['StudentCode'];
    $sql = "SELECT * FROM student WHERE StudentCode = '$studentCode'";
    $student = executeResult($sql);
    if ($student) {
        $student = $student[0];
        $s_StudentCode = $student['StudentCode'];
        $s_FullName = $student['FullName'];
        $s_Dateofbirth = $student['Dateofbirth'];
        $s_Class = $student['Class'];
        $s_Address = $student['Address'];
        $s_PhoneNumber = $student['PhoneNumber'];
        $s_Subject = $student['Subject'];
        $s_Email = $student['Email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <form method="post"> 
                   
                    <input type="hidden" name="studentcode" value="<?php echo $s_StudentCode; ?>">

                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $s_FullName; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $s_Dateofbirth; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="class">Class:</label>
                        <input type="text" class="form-control" id="class" name="class" value="<?php echo $s_Class; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $s_Address; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Phone Number:</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $s_PhoneNumber; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $s_Subject; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label> 
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $s_Email; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
