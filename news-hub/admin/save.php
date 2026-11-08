<?php
include("../database.php");

// 1. Admin Security Guard
if (!isset($_SESSION['usr_user_role']) || $_SESSION['usr_user_role'] !== 'admin') {
    http_response_code(403);
    die("Akses ditolak.");
}

$id = $_GET['id'] ?? null;
$news = ['news_title' => '', 'news_category' => 'Nasional', 'news_content' => ''];
$page_title = $id ? "Edit Berita" : "Tambah Berita Baru";

// 2. If editing, fetch data
if ($id) {
    $id_safe = mysqli_real_escape_string($conn, $id);
    $query = "SELECT * FROM news WHERE news_id = '$id_safe'";
    $result = mysqli_query($conn, $query);
    $news = mysqli_fetch_assoc($result);
}

// 3. Process Form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    if ($id) {
        // UPDATE
        $sql = "UPDATE news SET news_title='$title', news_category='$category', news_content='$content' WHERE news_id='" . (int)$id . "'";
    } else {
        // INSERT
        $author_id = $_SESSION['usr_id'];
        $sql = "INSERT INTO news (news_title, news_category, news_content, news_author_id) VALUES ('$title', '$category', '$content', '$author_id')";
    }
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?> - newsHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f7;
        }

        .brand-n { color: #1e4ba1; }
        .brand-h { color: #f2711c; }

        .back-arrow {
            font-size: 1.8rem;
            font-weight: 300;
            color: #000;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .back-arrow:hover { color: #000; }

        .card-custom {
            width: 95%;
            max-width: 700px;
            border: 1px solid #d2d2d7;
            border-radius: 12px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .form-label {
            font-weight: 600;
            color: #1e4ba1;
        }

        .form-input {
            border: 1px solid #d2d2d7;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            width: 100%;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #1e4ba1;
            box-shadow: 0 0 0 2px rgba(30, 75, 161, 0.2);
        }

        .btn-save-submit {
            background-color: #f2711c;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.7rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-save-submit:hover {
            background-color: #d8631a;
            color: white;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">

    <div class="card shadow-sm card-custom my-4">
        <div class="card-body p-4">
            <a href="index.php" class="back-arrow">←</a>
            <h2 class="text-center page-title mb-4"><?= $page_title ?></h2>

            <form action="save.php<?= $id ? '?id=' . $id : '' ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" name="title" class="form-control form-control-lg form-input" value="<?= htmlspecialchars($news['news_title']) ?>" placeholder="Masukkan judul..." required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category" class="form-select form-select-lg form-input" required>
                        <option value="Nasional" <?= $news['news_category'] == 'Nasional' ? 'selected' : '' ?>>Nasional</option>
                        <option value="Teknologi" <?= $news['news_category'] == 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
                        <option value="Olahraga" <?= $news['news_category'] == 'Olahraga' ? 'selected' : '' ?>>Olahraga</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Isi Berita</label>
                    <textarea name="content" class="form-control form-input" rows="8" placeholder="Tulis isi berita di sini..." required><?= htmlspecialchars($news['news_content']) ?></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-save-submit">SIMPAN BERITA</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>