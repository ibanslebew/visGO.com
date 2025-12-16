<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Visual Algoritma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #3498db;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 8px 0;
            display: flex;
            align-items: center;
            padding: 8px;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .sidebar i {
            margin-right: 10px;
        }

        /* Main content */
        .main-content {
            flex: 1;
            background: #f0f2f5;
            padding: 20px;
            overflow-y: auto;
        }

        /* Card container */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Card */
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .card .icon {
            font-size: 40px;
            color: #3498db;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .card:hover .icon {
            transform: rotate(15deg);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            font-size: 14px;
            color: #666;
            min-height: 40px;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: white;
            background: #3498db;
            padding: 8px 15px;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .card a:hover {
            background: #2980b9;
        }

        /* Navbar (optional di atas main content) */
        .navbar {
            background: #3498db;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2><i class="bi bi-diagram-3-fill"></i>visGO</h2>
        <a href="home.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="detail_array.php"><i class="bi bi-bar-chart-steps"></i> Array</a>
        <a href="detail_stack.php"><i class="bi bi-layers-fill"></i> Stack</a>
        <a href="logout.php" onclick="return confirmLogout()"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <script>
        function confirmLogout() {
            return confirm("Apakah Anda yakin ingin logout?");
        }
    </script>

    <div class="main-content">
        <div class="navbar">
            <span>Dashboard Visual Algoritma</span>
        </div>

        <div class="cards">
            <div class="card">
                <div class="icon"><i class="bi bi-grid-1x2-fill"></i></div>
                <h3>Array</h3>
                <p>Visualisasi sorting array interaktif</p>
                <a href="visual/array.php">Lihat Visualisasi</a>
            </div>

            <div class="card">
                <div class="icon"><i class="bi bi-stack"></i></div>
                <h3>Stack</h3>
                <p>Visualisas Stack sederhana</p>
                <a href="visual/stack.php">Lihat Visualisasi</a>
            </div>
        </div>
    </div>

</body>

</html>