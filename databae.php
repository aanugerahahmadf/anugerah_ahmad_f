<?php
require_once("mahasiswa.php");

$mhs = new Mhs();

// Jika ada permintaan hapus melalui URL
if (isset($_GET['hapus'])) {
    $mhs->deleteMhs($_GET['hapus']);
}

$data = $mhs->getAllMhs();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $data->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$no}</td>";
            echo "<td>{$row['nama']}</td>";
            echo "<td><a href='data.php?hapus={$row['nama']}' onclick=\"return confirm('Yakin ingin menghapus {$row['nama']}?')\">Hapus</a></td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
    <br>
    <a href="index.php">Kembali ke Beranda</a>
</body>
</html>
