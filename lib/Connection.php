<?php
$username = 'root';
$password = '';
$database = 'dasar_web';
try {
    $db = new mysqli('localhost', $username, $password, $database);
    if ($db->connect_error) {
        die('Connection DB failed: ' . $db->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}

// Fungsi untuk mengambil data kategori
function getKategori() {
    global $db;
    $query = "SELECT * FROM m_kategori ORDER BY kategori_nama ASC";
    $result = $db->query($query);
    $kategori = [];
    while ($row = $result->fetch_assoc()) {
        $kategori[] = $row;
    }
    return $kategori;
}
?>