<?php
header('Content-Type: application/json');

// Aktifkan error reporting (untuk debugging sementara)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$host = "localhost"; // Ganti sesuai konfigurasi
$user = "root";
$password = "";
$dbname = "tower_admin"; // Nama database

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}

// Query untuk menghitung jumlah berdasarkan status
$queryStatus = "SELECT status, COUNT(*) AS total FROM tower GROUP BY status";
$resultStatus = $conn->query($queryStatus);

// Data untuk chart berdasarkan status
$dataStatus = [
    "labels" => [],
    "values" => []
];

if ($resultStatus->num_rows > 0) {
    while ($row = $resultStatus->fetch_assoc()) {
        $dataStatus['labels'][] = $row['status'];
        $dataStatus['values'][] = $row['total'];
    }
}

// Query untuk menghitung jumlah berdasarkan tahun instalasi
$queryYear = "
    SELECT YEAR(installation_date) AS year, COUNT(*) AS total
    FROM tower
    WHERE YEAR(installation_date) >= 2000
    GROUP BY year
    ORDER BY year ASC
";
$resultYear = $conn->query($queryYear);

// Data untuk chart berdasarkan tahun instalasi
$dataYear = [
    "labels" => [],
    "values" => []
];

if ($resultYear->num_rows > 0) {
    while ($rowYear = $resultYear->fetch_assoc()) {
        $dataYear['labels'][] = $rowYear['year'];
        $dataYear['values'][] = $rowYear['total'];
    }
}

// Gabungkan kedua data
$response = [
    "statusData" => $dataStatus,
    "yearData" => $dataYear
];

// Kirim data dalam format JSON
echo json_encode($response);

// Tutup koneksi
$conn->close();
?>