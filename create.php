<?php
include 'db.php';
if (isset($_POST['submit'])) {
    $student_name = $conn->real_escape_string($_POST['student_name']);
    $room_number = $conn->real_escape_string($_POST['room_number']);
    $block_name = $conn->real_escape_string($_POST['block_name']);
    $monthly_fee = $conn->real_escape_string($_POST['monthly_fee']);

    $sql = "INSERT INTO rooms (student_name, room_number, block_name, monthly_fee) VALUES ('$student_name', '$room_number', '$block_name', '$monthly_fee')";
    if ($conn->query($sql) === TRUE) { header("Location: index.php"); exit(); }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Allot Room</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-container { background: white; padding: 30px; border-radius: 8px; width: 350px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn-submit { background-color: #1b5e20; color: white; border: none; padding: 12px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>
<div class="form-container">
    <h3>Room Allotment Form</h3>
    <form action="create.php" method="POST">
        <label>Student Full Name</label><input type="text" name="student_name" required>
        <label>Room Number</label><input type="text" name="room_number" required>
        <label>Hostel Block</label><input type="text" name="block_name" required>
        <label>Monthly Rent Fee (PKR)</label><input type="number" name="monthly_fee" required>
        <input type="submit" name="submit" value="Allot Room" class="btn-submit">
    </form>
</div>
</body>
</html>
