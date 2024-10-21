<?php
include 'config.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("UPDATE registrasi SET is_deleted = 1 WHERE id = ?");
    $stmt->execute([$id]);
}

$stmt = $pdo->query("SELECT * FROM registrasi WHERE is_deleted = 0");
$registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Registrations</title>
</head>
<body>
    <h2>Manage Registrasi Seminar</h2>

    <table border="1">
        <tr>
            <th>Email</th>
            <th>Nama</th>
            <th>Institusi</th>
            <th>Negara</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        <?php foreach ($registrations as $registration): ?>
        <tr>
            <td><?= $registration['email'] ?></td>
            <td><?= $registration['nama'] ?></td>
            <td><?= $registration['institusi'] ?></td>
            <td><?= $registration['negara'] ?></td>
            <td><?= $registration['alamat'] ?></td>
            <td><a href="manage.php?delete=<?= $registration['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
