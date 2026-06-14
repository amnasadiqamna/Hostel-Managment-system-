<?php
include 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM rooms WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $student_name = $conn->real_escape_string($_POST['student_name']);
    $room_number = $conn->real_escape_string($_POST['room_number']);
    $block_name = $conn->real_escape_string($_POST['block_name']);
    $monthly_fee = $conn->real_escape_string($_POST['monthly_fee']);

    $update_sql = "UPDATE rooms SET student_name='$student_name', room_number='$room_number', block_name='$block_name', monthly_fee='$monthly_fee' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) { header("Location: index.php"); exit(); }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Allotment</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-container { background: white; padding: 30px; border-radius: 8px; width: 350px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-update { background-color: #0288d1; color: white; border: none; padding: 12px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
<div class="form-container">
    <h3>Update Details</h3>
    <form action="" method="POST">
        <label>Student Name</label><input type="text" name="student_name" value="<?php echo htmlspecialchars($row['student_name']); ?>" required>
        <label>Room Number</label><input type="text" name="room_number" value="<?php echo htmlspecialchars($row['room_number']); ?>" required>
        <label>Hostel Block</label><input type="text" name="block_name" value="<?php echo htmlspecialchars($row['block_name']); ?>" required>
        <label>Monthly Fee</label><input type="number" name="monthly_fee" value="<?php echo htmlspecialchars($row['monthly_fee']); ?>" required>
        <input type="submit" name="update" value="Apply Changes" class="btn-update">
    </form>
</div>
</body>
</html>
