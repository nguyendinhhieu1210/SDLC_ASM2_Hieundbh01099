<?php
require_once('dbhelp.php');

// Lấy danh sách sinh viên từ cơ sở dữ liệu
$sql = 'SELECT * FROM student';
$studentList = executeResult($sql);

// Kiểm tra nếu có yêu cầu xóa sinh viên
if (!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['StudentCode'])) {
    $s_StudentCode = $_GET['StudentCode'];
    // Thực hiện câu lệnh SQL để xóa sinh viên
    $sql = "DELETE FROM student WHERE StudentCode = '$s_StudentCode'";
    execute($sql);

    // Chuyển hướng sau khi xóa xong
    header('Location: student.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        a{
            text-decoration: none;
            padding: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Student Information Management
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Code</th>
                            <th>Full Name</th>
                            <th>Date Of Birth</th>
                            <th>Class</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th width="60px"></th>
                            <th width="60px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($studentList)) : ?>
                            <?php foreach ($studentList as $std) : ?>
                                <tr>
                                    <td><?php echo $std['StudentCode']; ?></td>
                                    <td><?php echo $std['FullName']; ?></td>
                                    <td><?php echo $std['Dateofbirth']; ?></td>
                                    <td><?php echo $std['Class']; ?></td>
                                    <td><?php echo $std['Address']; ?></td>
                                    <td><?php echo $std['PhoneNumber']; ?></td>
                                    <td><?php echo isset($std['Subject']) ? $std['Subject'] : ''; ?></td>
                                    <td><?php echo isset($std['Email']) ? $std['Email'] : ''; ?></td>
                                    <td><button class="btn btn-edit" onclick="window.open('input.php?StudentCode=<?php echo $std['StudentCode']; ?>', '_self')">Edit</button></td>
                                    <td><button class="btn btn-delete" onclick="deleteStudent('<?php echo $std['StudentCode']; ?>')">Delete</button></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10">No records found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <button class="btn btn-add" onclick="window.open('add.php?id=' , '_self')">Add Student</button>
               <a href="./login.php">Exit</a>
            </div>
        </div>
    </div>

    <script>
        function deleteStudent(studentCode) {
            if (confirm('Are you sure you want to delete this student?')) {
                window.location.href = 'student.php?action=delete&StudentCode=' + studentCode;
            }
        }
    </script>
</body>
</html>
