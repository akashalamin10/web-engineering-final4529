<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DIU - User Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('bg37.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .panel {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 450px;
            width: 100%;
        }

        .panel h2 {
            margin-bottom: 10px;
            font-size: 28px;
            color: #2e3094;
        }

        .panel p {
            margin-bottom: 30px;
            font-size: 16px;
            color: #666;
        }

        .role-buttons a {
            display: block;
            text-decoration: none;
            padding: 15px;
            margin: 10px 0;
            background-color: #2e3094;
            color: white;
            border-radius: 8px;
            font-size: 18px;
            transition: 0.3s ease;
        }

        .role-buttons a:hover {
            background-color: rgb(252, 176, 76);
            color: #222;
        }

        footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        @media (max-width: 768px) {
            .panel {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="panel">
        <h2>Daffodil International University</h2>
        <p>Choose your role to continue</p>

        <div class="role-buttons">
            <a href="login.php">👨‍💼 Admin</a>
            <a href="login.php">👨‍🏫 Teacher</a>
            <a href="students_queary.php">🎓 Students</a>
        </div>
    </div>
</div>

<footer>
    2009-<?= date('Y') ?> All Rights Reserved. Daffodil International University
</footer>

</body>
</html>
