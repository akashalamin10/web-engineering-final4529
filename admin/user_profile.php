<?php
    include('../config.php');
    $id = $_GET['id'] ?? '';
    if (empty($id)) {
        header("Location: index.php");
        exit();
    }
    $sql = "SELECT * FROM `users` WHERE id = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            background: #f4f4f4;
        }

        .card {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .banner {
            text-align: center;
            margin-bottom: 20px;
        }

        .banner img.profile {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        h2.name {
            text-align: center;
            margin: 15px 0;
            font-size: 24px;
        }

        .table-container {
            width: 100%;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
        }

        .footer a {
            text-decoration: none;
            margin: 0 12px;
            font-size: 16px;
            padding: 10px 16px;
            border-radius: 6px;
            display: inline-block;
            background: #f0f0f0;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="banner">
            <img class="profile" src="../upload/users/<?= $row['photo'] ?>" alt="User Photo">
        </div>
        <h2 class="name"><?= ucwords($row['name']) ?></h2>

        <div class="table-container">
            <table>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                </tr>
                <tr>
                    <th>Join Date</th>
                    <td><?= date("d-m-Y", strtotime($row['date'])) ?></td>
                </tr>
                <!-- Add more rows as needed -->
            </table>
        </div>

        <div class="footer">
            <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="all_users.php">Back</a>
        </div>
    </div>

</body>
</html>
