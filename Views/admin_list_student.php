<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản admin</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách tài khoản student</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Fullname</th>
                <th>DOB</th>
                <th>Faculty</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admin as $admin): ?>
                <tr>
                    <td><?php echo $admin['Stu_ID']; ?></td>
                    <td><?php echo $admin['Stu_Username']; ?></td>
                    <td><?php echo $admin['Stu_Email']; ?></td>
                    <td><?php echo $admin['Stu_FullName']; ?></td>
                    <td><?php echo $admin['Stu_DOB']; ?></td>
                    <td><?php echo $admin['Fa_ID']; ?></td>
                    <td>
                        <a href="index.php?action=edit_student&id=<?php echo $admin['Stu_ID']; ?>">Chỉnh sửa</a> | 
                        <a href="index.php?action=delete_student&id=<?php echo $admin['Stu_ID']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <br>
    <a href="index.php?action=add_Stunager">Add new Stunager</a>
    <a href="index.php?action=add_student">Add new student</a>
    <a href="index.php?action=add_coordinator">Add new coordinator</a>
</body>
</html>
