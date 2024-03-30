<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
        .main--content {
        position: relative;
        background: #ebe9e9;
        width: 100%;
        padding: 1rem;
        }
        .main--content .tabular--wrapper {
            background: #fff;
            margin-top: 1rem;
            border-radius: 10px;
            padding: 10px 2rem;
        }

        h2 {
            color: rgba(113, 99, 186, 255);
            padding-bottom: 10px;
            font-size: 25px;
            text-align: center;
            text-transform: uppercase;
        }
</style>
<body>
    <!-- <?php 
        include 'Layout/admin_sidebar.php'
    ?> -->
    <div class="main--content">
        <?php  $search = true; include 'Layout/admin_navbar.php' ?>
        <div class="tabular--wrapper">
        <h2>Danh sách Contribution</h2>
<table border="1">
    <thead>
        <tr>
            <th>Tên Contribution</th>
            <th>Thời gian nộp</th>
            <th>Trạng thái</th>
            <th>ID Sinh viên</th>
            <th>ID Chủ đề</th>
            <th>ID Bình luận</th>
            <th>ID Tạp chí</th>
            <th>Tệp DOC</th>
            <th>Ảnh</th>
            <th>Thao tác</th>
            <th>comment</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contributions as $contribution): ?>
        <tr>
            <td><?php echo $contribution['Con_Name']; ?></td>
            <td><?php echo $contribution['Con_SubmissionTime']; ?></td>
            <td><?php echo $contribution['Con_Status']; ?></td>
            <td><?php echo $contribution['Stu_ID']; ?></td>
            <td><?php echo $contribution['Topic_ID']; ?></td>
            <td><?php echo $contribution['Maga_ID']; ?></td>
            <td><?php echo $contribution['Com_ID']; ?></td>
            <!-- <td><a href="index.php?action=viewWordContent&filePath=<?php echo $contribution['con_doc']; ?>" class="doc-preview-link">Xem tài liệu</a></td> -->
            <td><?php echo $contribution['con_doc']; ?></td>
            <td><img src="data:image/*;base64,<?php echo base64_encode($contribution['Con_Image']); ?>" alt="Ảnh" class="img-thumbnail"></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $contribution['Con_ID']; ?>">Sửa</a>
                <a href="index.php?action=delete&id=<?php echo $contribution['Con_ID']; ?>">Xóa</a>
            </td>
            
            <td> 
            <a href="index.php?action=add_comment&id=<?php echo $contribution['Con_ID']; ?>">comment</a>
            </td>
        </form>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
