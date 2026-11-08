<?php
include("../database.php");

// 1. Admin Security Guard
if (!isset($_SESSION['usr_user_role']) || $_SESSION['usr_user_role'] !== 'admin') {
    http_response_code(403);
    die("Akses ditolak. Anda bukan admin. <a href='../index.php'>Kembali ke beranda</a>");
}

// 3. Fetch All News Query
$query = "SELECT * FROM news ORDER BY news_create_date DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel - newsHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
        }

        .brand-n {
            color: #1e4ba1;
        }

        .brand-h {
            color: #f2711c;
        }

        .control-panel-title {
            color: #1e4ba1;
            font-weight: 800;
            font-size: 2rem;
        }

        .section-title {
            color: #f2711c;
            font-weight: 800;
            font-size: 1.8rem;
        }

        .btn-tambah {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            border-radius: 6px;
            padding: 0.4rem 1.2rem;
            border: none;
            text-decoration: none;
        }

        .btn-tambah:hover {
            background-color: #0056b3;
            color: white;
        }

        .btn-daftar {
            background-color: transparent;
            color: #1e4ba1;
            border: 1px solid #1e4ba1;
            border-radius: 50px;
            padding: 0.5rem 2rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-daftar:hover {
            background-color: #f2711c;
            color: white;
            border-color: #f2711c;
        }

        .table-container {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #c8d3e6;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .custom-table {
            margin-bottom: 0;
            width: 100%;
        }

        .custom-table thead th {
            background-color: #1e4ba1 !important;
            color: #ffffff !important;
            padding: 1rem;
            font-weight: 700;
            border: none;
        }

        .custom-table td {
            padding: 0.8rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
        }

        .custom-table td:last-child {
            border-right: none;
        }

        .custom-table tbody tr:nth-child(odd) td {
            background-color: #eaf0fb !important;
        }

        .custom-table tbody tr:nth-child(even) td {
            background-color: #ffffff !important;
        }

        .btn-edit {
            background-color: #28a745;
            color: white;
            border-radius: 6px;
            padding: 0.3rem 0.9rem;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit:hover {
            background-color: #218838;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border-radius: 6px;
            padding: 0.3rem 0.9rem;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete:hover {
            background-color: #c82333;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar mb-4">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                <span class="brand-n">n</span><span class="brand-h">H</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="../logout.php" class="btn-daftar">LOGOUT</a>
                <span class="control-panel-title">Control Panel</span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="section-title mb-0">Daftar berita</h2>
            <a href="save.php" class="btn-tambah">Tambah</a>
        </div>

        <div class="table-container">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th style="width: 8%;">ID</th>
                        <th style="width: 40%;">Title</th>
                        <th style="width: 20%;">Category</th>
                        <th style="width: 17%;">Date Created</th>
                        <th style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= $row['news_id'] ?></td>
                                <td><?= htmlspecialchars($row['news_title']) ?></td>
                                <td><?= htmlspecialchars($row['news_category']) ?></td>
                                <td><?= $row['news_create_date'] ?></td>
                                <td>
                                    <!-- 5. Action Links with IDs -->
                                    <a href="save.php?id=<?= $row['news_id'] ?>" class="btn-edit me-1">Edit</a>
                                    <a href="delete.php?id=<?= $row['news_id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus berita ini?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">Belum ada berita.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>