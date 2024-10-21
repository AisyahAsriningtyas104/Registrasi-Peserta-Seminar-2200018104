<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan admin ke database
    $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (aisyah, aisyah123)");
    $stmt->execute([$username, $hashedPassword]);

    echo "Admin berhasil ditambahakan!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
</head>
<body>
    <h2>Tambah Admin Baru</h2>
    <form method="POST" action="tambah_admin.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit">Add Admin</button>
    </form>
</body>
</html>
