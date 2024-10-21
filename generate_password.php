<?php
// Ganti 'password123' dengan password yang ingin dienkripsi
$hashedPassword = password_hash('aisyah123', PASSWORD_DEFAULT);

// Cetak password terenkripsi
echo "Encrypted Password: " . $hashedPassword;
?>