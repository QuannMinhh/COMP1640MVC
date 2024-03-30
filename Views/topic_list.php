<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic List</title>
</head>
<body>
    <h1>Topic List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>Closure Date</th>
            <th>Finale Date</th>
            <th>Description</th>
            <th>Actions</th>
            <th>Comment</th>
        </tr>
        <?php foreach ($topics as $topic): ?>
        <tr>
            <td><?php echo $topic['Topic_ID']; ?></td>
            <td><?php echo $topic['Topic_Name']; ?></td>
            <td><?php echo $topic['Topic_StartDate']; ?></td>
            <td><?php echo $topic['Topic_ClosureDate']; ?></td>
            <td><?php echo $topic['Topic_FinaleDate']; ?></td>
            <td><?php echo $topic['Topic_Description']; ?></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $topic['Topic_ID']; ?>">Edit</a> | 
                <a href="index.php?action=delete&id=<?php echo $topic['Topic_ID']; ?>">Delete</a>
              
            </td>
            <td> <a href ="#"> comment </a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php?action=add">Add New Topic</a>
    <p1>hi</p1>
</body>
</html>
