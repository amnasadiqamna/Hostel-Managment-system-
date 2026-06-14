<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Management System</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; margin: 40px; }
        .container { max-width: 1100px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); }
        h2 { color: #1b5e20; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background-color: #1b5e20; color: white; }
        .btn { padding: 8px 14px; text-decoration: none; border-radius: 4px; font-weight: bold; display: inline-block; }
        .btn-add { background-color: #1b5e20; color: white; margin-bottom: 20px; }
        .btn-edit { background-color: #0288d1; color: white; }
        .btn-delete { background-color: #d32f2f; color: white; }
    </style>
</head>
<body>
<div class="container">
    <h2>GIU Hostel Management System - Allotment Records</h2>
    <a href="create.php" class="btn btn-add">+ Allot New Room</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Room Number</th>
                <th>Block Name</th>
                <th>Monthly Fee (PKR)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM rooms ORDER BY id DESC";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . htmlspecialchars($row["student_name"]) . "</td>
                            <td>" . htmlspecialchars($row["room_number"]) . "</td>
                            <td>" . htmlspecialchars($row["block_name"]) . "</td>
                            <td>" . htmlspecialchars($row["monthly_fee"]) . "</td>
                            <td>
                                <a href='update.php?id=" . $row["id"] . "' class='btn btn-edit'>Edit</a>
                                <a href='delete.php?id=" . $row["id"] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No rooms currently allotted.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
