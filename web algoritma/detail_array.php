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
    <title>Pengertian Array - Visual Algoritma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            display: flex;
            min-height: 100vh;
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

        .main-content {
            flex: 1;
            background: #f0f2f5;
            padding: 20px;
            overflow-y: auto;
        }

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

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            font-size: 14px;
            color: #555;
            min-height: 50px;
        }

        .back-btn {
            margin-top: 20px;
            display: inline-block;
            padding: 8px 15px;
            background: #3498db;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .back-btn:hover {
            background: #2980b9;
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
    <!-- Script Logout -->
    <script>
        function confirmLogout() {
            return confirm("Apakah Anda yakin ingin logout?");
        }
    </script>

    <div class="main-content">
        <div class="navbar">
            <span>Pengertian Array</span>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Apa itu Array?</h3>
                <p>Array adalah struktur data yang menyimpan sekumpulan elemen dengan tipe data yang sama, di mana setiap elemen dapat diakses menggunakan indeks.</p>
            </div>

            <div class="card">
                <h3>Contoh Array</h3>
                <p>Misal: int arr[5] = {1,2,3,4,5}; <br>Indeks dimulai dari 0.</p>
            </div>

            <div class="card">
                <h3>Operasi Array</h3>
                <p>Terdapat operasi seperti: tambah elemen, hapus elemen, update elemen, mencari elemen, dan sorting.</p>
            </div>

            <div class="card">
                <h3>Kelebihan & Kekurangan</h3>
                <p>Kelebihan: Akses cepat menggunakan indeks.<br>Kekurangan: Ukuran tetap (fixed size) jika menggunakan array statis.</p>
            </div>
        </div>

    </div>

</body>

</html>
