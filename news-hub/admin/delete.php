<?php
include("../database.php");

// 1. Admin Security Guard
if (!isset($_SESSION['usr_user_role']) || $_SESSION['usr_user_role'] !== 'admin') {
    http_response_code(403);
    die("Akses ditolak.");
}

// 2. Read Article ID
$id = $_GET['id'] ?? null;

if ($id) {
    // Escape string for safety
    $id_safe = mysqli_real_escape_string($conn, $id);
    
    // 3. Run Delete Query
    $query = "DELETE FROM news WHERE news_id = '$id_safe'";
    mysqli_query($conn, $query);
}

// 4. Redirect back to admin table
header("Location: index.php");
exit();
?>