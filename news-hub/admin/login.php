<?php
include("database.php");

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE usr_username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    if ($user && password_verify($password, $user["usr_password_hash"])) {
        $_SESSION["usr_id"] = $user["usr_id"];
        $_SESSION["usr_username"] = $user["usr_username"];
        $_SESSION["usr_user_role"] = $user["usr_user_role"];

        if ($user["usr_user_role"] == "admin") {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - newsHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f7;
        }

        .brand-n {
            color: #1e4ba1;
        }

        .brand-h {
            color: #f2711c;
        }

        .back-arrow {
            font-size: 1.8rem;
            font-weight: 300;
            color: #000;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .back-arrow:hover {
            color: #000;
        }

        .card-custom {
            width: 90%;
            max-width: 420px;
            border: 1px solid #d2d2d7;
            border-radius: 12px;
        }

        .login-header {
            position: relative;
            text-align: center;
        }

        .login-header .back-arrow {
            position: absolute;
            left: 0;
            top: 0;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #000;
        }

        .logo-text {
            font-size: 2rem;
            font-weight: 800;
        }

        .subtitle {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 1.1rem;
            color: #000;
        }

        .btn-login-submit {
            background-color: #f2711c;
            color: white;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-login-submit:hover {
            background-color: #d8631a;
            color: white;
        }

        .footer-text {
            font-size: 0.95rem;
            color: #6b7280;
        }

        .footer-link {
            color: #1e4ba1;
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">

    <div class="card shadow-sm card-custom">
        <div class="card-body p-4">
            <?php if ($error): ?>
                <div class="alert alert-danger mb-3" style="font-size: 0.9rem;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <div class="login-header">
                <a href="index.php" class="back-arrow">←</a>
                <h2 class="text-center page-title">Login</h2>
            </div>

            <div class="text-start mb-3">
                <span class="logo-text">
                    <span class="brand-n">n</span><span class="brand-h">H</span>
                </span>
                <p class="subtitle mb-0">Selamat datang di newsHub</p>
            </div>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-login-submit w-100 py-2 mb-3">MASUK</button>
            </form>

            <div class="text-center">
                <p class="footer-text mb-0">
                    Belum punya akun? <a href="register.php" class="footer-link">Daftar</a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>