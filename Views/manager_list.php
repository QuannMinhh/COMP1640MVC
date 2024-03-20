<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản Manager</title>
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
    <h2>Danh sách tài khoản Manager</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($managers as $manager): ?>
                <tr>
                    <td><?php echo $manager['Ma_ID']; ?></td>
                    <td><?php echo $manager['Ma_Username']; ?></td>
                    <td><?php echo $manager['Ma_Email']; ?></td>
                    <td><?php echo $manager['Ma_DOB']; ?></td>
                    <td>
                        <a href="index.php?action=edit&id=<?php echo $manager['Ma_ID']; ?>">Chỉnh sửa</a> | 
                        <a href="index.php?action=delete&id=<?php echo $manager['Ma_ID']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php?action=add">Thêm mới tài khoản Manager</a>
</body>
</html>
