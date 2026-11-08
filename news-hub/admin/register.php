<?php
include("database.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";

    if (empty($username) || empty($password)) {
        $error = "Username dan password wajib diisi.";
    } elseif ($password !== $confirm_password) {
        $error = "Konfirmasi password tidak cocok.";
    } else {
        $stmt = mysqli_prepare($conn, "SELECT usr_id FROM users WHERE usr_username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $check_result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($check_result) > 0) {
            $error = "Username sudah digunakan.";
        } else {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conn, "INSERT INTO users (usr_username, usr_password_hash, usr_user_role) VALUES (?, ?, 'user')");
            mysqli_stmt_bind_param($stmt, "ss", $username, $password_hash);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: login.php?registered=success");
                exit;
            } else {
                $error = "Terjadi kesalahan pada database.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - newsHub</title>
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

        .terms-label {
            font-size: 0.9rem;
        }

        .terms-link {
            color: #f2711c;
            text-decoration: none;
        }

        .terms-link:hover {
            color: #d8631a;
            text-decoration: underline;
        }

        .btn-register-submit {
            background-color: #f2711c;
            color: white;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-register-submit:hover {
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
                <a href="login.php" class="back-arrow">←</a>
                <h2 class="text-center page-title">Registrasi</h2>
            </div>

            <div class="text-start mb-3">
                <span class="logo-text">
                    <span class="brand-n">n</span><span class="brand-h">H</span>
                </span>
                <p class="subtitle mb-0">Selamat datang di newsHub</p>
            </div>

            <form action="register.php" method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Konfirmasi Password" required>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                        <label class="form-check-label terms-label" for="terms">
                            Dengan membuat akun, saya menyetujui<br>
                            <a href="#" class="terms-link">Ketentuan Penggunaan</a> dan
                            <a href="#" class="terms-link">Kebijakan Privasi.</a>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-register-submit w-100 py-2 mb-3">BUAT AKUN</button>
            </form>

            <div class="text-center">
                <p class="footer-text mb-0">
                    Sudah punya akun? <a href="login.php" class="footer-link">Login</a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>