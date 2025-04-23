<?php include('header.php'); ?>
<?php
$conn = new mysqli("localhost", "root", "", "student_management");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attendance'])) {
    $date = $_POST['date'];

    foreach ($_POST['attendance'] as $roll => $status) {
        // Get student ID from roll
        $stmt = $conn->prepare("SELECT id FROM students WHERE roll = ?");
        $stmt->bind_param("s", $roll);
        $stmt->execute();
        $stmt->bind_result($student_id);
        $stmt->fetch();
        $stmt->close();

        if (!empty($student_id)) {
            $status = ($status == 'Present') ? 'Present' : 'Absent';

            // Insert or update attendance record
            $insert = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)
                                      ON DUPLICATE KEY UPDATE status = VALUES(status)");
            $insert->bind_param("iss", $student_id, $date, $status);
            $insert->execute();
        }
    }

    echo "<p style='color:green;text-align:center;'>✅ Attendance submitted successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mark Attendance</title>
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-container {
            max-width: 800px;
            background: white;
            margin: 60px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2e3094;
        }
        .date-select {
            text-align: center;
            margin-bottom: 10px;
        }
        .date-select input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
        }
        .view-link {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 20px;
        }
        .view-btn {
            padding: 6px 14px;
            background-color: #2e3094;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .view-btn:hover {
            background-color: #fcb04c;
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #2e3094;
            color: white;
        }
        .tick-radio {
            appearance: none;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 2px solid #2e3094;
            border-radius: 4px;
            cursor: pointer;
            position: relative;
        }
        .tick-radio:checked::after {
            content: "✅";
            position: absolute;
            top: -2px;
            left: -1px;
            font-size: 18px;
        }
        input[type="submit"] {
            background-color: #2e3094;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #fcb04c;
            color: black;
        }
        .select-all-container {
            text-align: right;
            margin-bottom: 10px;
        }
        .select-all-btn {
            background-color: #fcb04c;
            padding: 6px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .select-all-btn:hover {
            background-color: #2e3094;
            color: white;
        }
        #attendanceForm {
            display: none;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Mark Attendance</h2>

    <div class="date-select">
        <label for="selectDate">Select Date:</label>
        <input type="date" id="selectDate" onchange="showForm()" />
    </div>

    <div class="view-link">
        <a href="attendance_list.php" class="view-btn">📋 View Full List</a>
    </div>

    <div id="attendanceForm">
        <form method="POST">
            <input type="hidden" name="date" id="attendanceDate">

            <div class="select-all-container">
                <button type="button" class="select-all-btn" onclick="toggleAll()">Select All</button>
            </div>

            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Present ✅</th>
                </tr>
                <?php
                $students = $conn->query("SELECT roll, name FROM students");
                while ($row = $students->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['roll'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td>
                            <input type="checkbox" class="tick-radio" name="attendance[<?= $row['roll'] ?>]" value="Present">
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>

            <input type="submit" value="Submit Attendance">
        </form>
    </div>
</div>

<script>
function showForm() {
    const selectedDate = document.getElementById('selectDate').value;
    if (selectedDate) {
        document.getElementById('attendanceDate').value = selectedDate;
        document.getElementById('attendanceForm').style.display = 'block';
    }
}

let allSelected = false;
function toggleAll() {
    allSelected = !allSelected;
    document.querySelectorAll('.tick-radio').forEach(el => el.checked = allSelected);
}
</script>

</body>
</html>
