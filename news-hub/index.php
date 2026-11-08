<?php
include("database.php");

$category = $_GET['category'] ?? '';
if ($category !== '' && $category !== 'Semua') {
    $cat_safe = mysqli_real_escape_string($conn, $category);
    $query = "SELECT * FROM news WHERE news_category = '$cat_safe' ORDER BY news_create_date DESC";
} else {
    $query = "SELECT * FROM news ORDER BY news_create_date DESC";
}

$result = mysqli_query($conn, $query);
$news = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newsHub - Berita Terkini</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter or similar for a clean look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
        }

        /* Navbar Styling */
        .navbar {
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

        .btn-login {
            background-color: #1e4ba1;
            color: white;
            border-radius: 50px;
            padding: 0.5rem 2rem;
            font-weight: 600;
            border: none;
        }

        .btn-login:hover {
            background-color: #f2711c;
            color: white;

        }

        .btn-daftar {
            background-color: transparent;
            color: #1e4ba1;
            border: 1px solid #1e4ba1;
            border-radius: 50px;
            padding: 0.5rem 2rem;
            font-weight: 600;
        }

        .btn-daftar:hover {
            background-color: #f2711c;
            color: white;
        }

        /* Hero Header */
        .hero-title {
            font-size: 5rem;
            font-weight: 800;
            margin-top: 3rem;
            margin-bottom: 1rem;
        }

        .text-blue {
            color: #1e4ba1;
        }

        .text-orange {
            color: #f2711c;
        }

        /* Category Nav Bar */
        .category-nav {
            background-color: #1e4ba1;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            display: flex;
            gap: 2.5rem;
            margin-bottom: 3rem;
        }

        .category-link {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.3rem;
        }

        .category-link:hover {
            color: #f2711c;
        }

        /* News Cards */
        .news-card {
            border: 1px solid #1e4ba1;
            border-radius: 12px;
            height: 250px;
            /* Fixed height for visual consistency in the grid */
            padding: 2rem;
            display: flex;
            align-items: center;
            /* Center text vertically like in figma */
            transition: transform 0.2s;
            cursor: pointer;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .news-title {
            font-size: 2.2rem;
            font-weight: 500;
            color: #000;
            line-height: 1.2;
            margin: 0;
        }

        /* News Grid Container */
        .news-grid-container {
            max-height: 600px;
            overflow-y: auto;
            overflow-x: hidden;
            padding-right: 8px;
        }

        /* Custom scrollbar for news grid */
        .news-grid-container::-webkit-scrollbar {
            width: 8px;
        }

        .news-grid-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .news-grid-container::-webkit-scrollbar-thumb {
            background: #1e4ba1;
            border-radius: 4px;
        }

        .news-grid-container::-webkit-scrollbar-thumb:hover {
            background: #163a7a;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 3.5rem;
            }

            .category-nav {
                gap: 1rem;
                flex-wrap: wrap;
            }

            .news-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="./">
                <span class="brand-n">n</span><span class="brand-h">H</span>
            </a>
            <div class="ms-auto d-flex gap-3">
                <?php if (isset($_SESSION['usr_id'])): ?>
                    <span class="text-black align-self-center ">Halo, <strong><?= htmlspecialchars($_SESSION['usr_username']) ?></strong></span>
                    <?php if ($_SESSION['usr_user_role'] === 'admin'): ?>
                        <a href="admin/index.php" class="btn btn-login">ADMIN PANEL</a>
                    <?php endif; ?>
                    <a href="logout.php" class="btn btn-daftar">LOGOUT</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-login">LOGIN</a>
                    <a href="register.php" class="btn btn-daftar">DAFTAR</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Main Logo/Title -->
        <h1 class="hero-title">
            <span class="text-blue">news</span><span class="text-orange">Hub</span>
        </h1>

        <!-- Category Menu -->
        <div class="category-nav mb-5">
            <a href="index.php" class="category-link">Semua</a>
            <a href="index.php?category=Nasional" class="category-link">Nasional</a>
            <a href="index.php?category=Teknologi" class="category-link">Teknologi</a>
            <a href="index.php?category=Olahraga" class="category-link">Olahraga</a>
        </div>

        <!-- News Grid -->
        <div class="news-grid-container pt-3">
            <div class="row g-4 mb-5">
                <?php foreach ($news as $item): ?>
                    <div class="col-md-6">
                        <div class="news-card">
                            <h2 class="news-title"><?= htmlspecialchars($item['news_title']) ?></h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>