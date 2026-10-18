<?php

$wajib = ["nim", "nama", "jurusan", "email", "nilai", "grade", "status"];
foreach ($wajib as $w) {
    if (!isset($_GET[$w]) || trim($_GET[$w]) == "") {
        header("Location: index.php");
        exit;
    }
}

    $nim     = htmlspecialchars($_GET["nim"]);
    $nama    = htmlspecialchars($_GET["nama"]);
    $jurusan = htmlspecialchars($_GET["jurusan"]);
    $email   = htmlspecialchars($_GET["email"]);
    $nilai   = htmlspecialchars($_GET["nilai"]);
    $grade   = htmlspecialchars($_GET["grade"]);
    $status  = htmlspecialchars($_GET["status"]);
    $warna = ($status == "Lulus") ? "lulus" : "tidak-lulus";
    
    ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #3d3f42;
            margin: 0;
            padding: 30px 15px;
        }

        .box {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 24px;
        }

        h1 {
            margin-top: 0;
            font-size: 22px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px 4px;
            border-bottom: 1px solid #e5e7eb;
        }

        td:first-child {
            width: 110px;
            font-weight: bold;
        }

        .lulus { color: green; font-weight: bold; }
        .tidak-lulus { color: red; font-weight: bold; }

        a.kembali {
            display: inline-block;
            margin-top: 18px;
            padding: 8px 16px;
            background: #bf0dd3;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        a.kembali:hover {
            background: #07080c;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Detail Mahasiswa PSTI 3B</h1>

        <table>
            <tr><td>NIM</td><td><?= $nim ?></td></tr>
            <tr><td>Nama</td><td><?= $nama ?></td></tr>
            <tr><td>Jurusan</td><td><?= $jurusan ?></td></tr>
            <tr><td>Email</td><td><?= $email ?></td></tr>
            <tr><td>Nilai</td><td><?= $nilai ?></td></tr>
            <tr><td>Grade</td><td><?= $grade ?></td></tr>
            <tr><td>Status</td><td class="<?= $warna ?>"><?= $status ?></td></tr>
        </table>

        <a class="kembali" href="index.php">Kembali</a>
    </div>
</body>
</html>