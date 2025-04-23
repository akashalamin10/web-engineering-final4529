<?php
$conn = new mysqli("localhost", "root", "", "student_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set("Asia/Dhaka");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fetch_attendance'])) {
        $date = $_POST['fetch_attendance'];

        // Select all students and their attendance status (if available) for the selected date
        $stmt = $conn->prepare("SELECT s.id AS student_id, s.roll, s.name, 
                                       IFNULL(a.status, '') AS status, a.id AS attendance_id 
                                FROM students s
                                LEFT JOIN attendance a ON s.id = a.student_id AND a.date = ? 
                                ORDER BY s.roll ASC");
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the data into an array
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Check if there are no attendance records for the selected date
        if (empty($data)) {
            echo json_encode(['no_records' => true]);  // Return a response indicating no records
        } else {
            echo json_encode($data);
        }
        exit;
    }

    if (isset($_POST['update_attendance'])) {
        $attendance_id = $_POST['attendance_id'];
        $student_id = $_POST['student_id'];
        $status = $_POST['status'];
        $date = $_POST['date'];

        if ($attendance_id) {
            // Update existing attendance
            $update = $conn->prepare("UPDATE attendance SET status = ? WHERE id = ?");
            $update->bind_param("si", $status, $attendance_id);
            $update->execute();
        } else {
            // Insert new attendance record
            $insert = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)");
            $insert->bind_param("iss", $student_id, $date, $status);
            $insert->execute();
        }

        echo json_encode(["success" => true]);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Attendance with Checkbox</title>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 60px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2e3094;
        }
        .form-group {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="date"] {
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            padding: 8px 15px;
            background-color: #2e3094;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 10px;
        }
        button:hover {
            background-color: #fcb04c;
            color: black;
        }
        .back-btn {
            background-color: #2e3094;
            margin-top: 40px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 14px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #2e3094;
            color: white;
        }
        .present {
            background-color: #28a745;
            color: white;
        }
        .absent {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📋 Student Attendance List</h2>

    <div class="form-group">
        <label for="attendanceDate">Select Date: </label>
        <input type="date" id="attendanceDate">
        <button onclick="fetchAttendance()">Show Attendance</button>
        <button class="back-btn" onclick="window.location.href='attendance.php';">🔙 Back to Attendance</button>
    </div>

    <div id="attendanceTable"></div>

</div>

<script>
function fetchAttendance() {
    const date = document.getElementById('attendanceDate').value;
    if (!date) {
        alert("Please select a date.");
        return;
    }

    const formData = new FormData();
    formData.append('fetch_attendance', date);

    fetch('', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        const tableDiv = document.getElementById("attendanceTable");

        // Check if no records were found
        if (data.no_records) {
            tableDiv.innerHTML = `<p style="text-align:center; color:red;">😢 Sorry, no records found for that day.</p>`;
            return;
        }

        let table = `
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Present</th>
                    <th>Update</th>
                </tr>
        `;

        data.forEach(row => {
            const isChecked = row.status === 'Present' ? 'checked' : '';
            const rowClass = row.status === 'Present' ? 'present' : 'absent';

            table += `
                <tr class="${rowClass}">
                    <td>${row.roll}</td>
                    <td>${row.name}</td>
                    <td>
                        <input type="checkbox" id="status-${row.student_id}" ${isChecked}>
                        <label for="status-${row.student_id}"></label>
                    </td>
                    <td>
                        <button onclick="updateAttendance('${row.attendance_id}', '${row.student_id}', '${date}')">Update</button>
                    </td>
                </tr>
            `;
        });

        table += "</table>";
        tableDiv.innerHTML = table;
    });
}

function updateAttendance(attendanceId, studentId, date) {
    const checkbox = document.getElementById('status-' + studentId);
    const status = checkbox.checked ? 'Present' : 'Absent';

    const formData = new FormData();
    formData.append('update_attendance', true);
    formData.append('attendance_id', attendanceId);
    formData.append('student_id', studentId);
    formData.append('status', status);
    formData.append('date', date);

    fetch('', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(response => {
        if (response.success) {
            fetchAttendance(); // refresh list
        }
    });
}
</script>

</body>
</html>
