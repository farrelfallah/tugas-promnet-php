<?php

function e($teks) {
    return htmlspecialchars((string)$teks, ENT_QUOTES, 'UTF-8');
}

// kalau halaman dibuka tanpa lewat form, balik ke form
if (!isset($_POST["nama"], $_POST["kelas"], $_POST["pesan"])) {
    header("Location: form_pesan.php");
    exit;
}

$nama  = trim($_POST["nama"]);
$kelas = trim($_POST["kelas"]);
$pesan = trim($_POST["pesan"]);

if ($nama === "" || $kelas === "" || $pesan === "") {
    header("Location: form_pesan.php?error=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pesan</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 40px 16px; min-height: 100vh; font-family: "Segoe UI", Roboto, Arial, sans-serif; color: #1f2937; background: linear-gradient(135deg, #000000 0%, #f8fafc 100%); }
        .card { max-width: 960px; margin: 0 auto; background: #fff; padding: 28px 32px; border-radius: 14px; box-shadow: 0 10px 30px rgba(30,64,175,.10); }
        .card.sempit { max-width: 560px; }

        h1 { margin: 0 0 6px; font-size: 1.7rem; }
        .sub { margin: 0; color: #6b7280; }
        .header-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 20px; }

        .btn { display: inline-block; padding: 9px 16px; border: 0; border-radius: 6px; cursor: pointer; font-size: .9rem; font-weight: 600; text-decoration: none; color: #fff; background: #b61dd8; transition: background .2s, transform .1s; }
        .btn:hover { background: #060506; transform: translateY(-1px); }
        .btn.abu { background: #4b5563; }
        .btn.abu:hover { background: #374151; }
        .btn.kecil { padding: 6px 12px; font-size: .8rem; }

        .ringkasan { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 12px; margin-bottom: 20px; }
        .ringkasan .item { background: #f1f5f9; border-radius: 10px; padding: 12px 14px; }
        .ringkasan .item span { display: block; font-size: .75rem; color: #6b7280; text-transform: uppercase; letter-spacing: .04em; }
        .ringkasan .item strong { font-size: 1.3rem; }

        .tabel-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: .92rem; }
        th, td { padding: 12px 10px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background: #f1f5f9; font-size: .85rem; }
        tbody tr:hover { background: #f8fafc; }

        .lulus { color: #15803d; font-weight: 600; }
        .tidak-lulus { color: #dc2626; font-weight: 600; }

        .grade { display: inline-block; min-width: 26px; text-align: center; padding: 2px 8px; border-radius: 999px; font-weight: 700; font-size: .82rem; }
        .grade-A { background: #000000; color: #ffffff; }
        .grade-B { background: #000000; color: #ffffff; }
        .grade-C { background: #000000; color: #ffffff; }
        .grade-D { background: #000000; color: #ffffff; }

        .baris { background: #f1f5f9; padding: 12px 14px; border-radius: 8px; margin-bottom: 10px; }
        .baris b { margin-right: 4px; }

        label { display: block; font-weight: 600; margin: 14px 0 6px; }
        input[type=text], textarea { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; font: inherit; background: #f8fafc; }
        input:focus, textarea:focus { outline: 2px solid #b91dd8; background: #fff; }
        textarea { min-height: 110px; resize: vertical; }
        .aksi { margin-top: 20px; display: flex; gap: 8px; }
        .error { background: #fee2e2; color: #991b1b; padding: 10px 14px; border-radius: 8px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="card sempit">
        <h1>Pesan Berhasil Dikirim</h1>
        <p>Thank you so much barudaks, <b><?= e($nama) ?></b>!</p>

        <div class="baris"><b>Nama:</b> <?= e($nama) ?></div>
        <div class="baris"><b>Kelas:</b> <?= e($kelas) ?></div>
        <div class="baris"><b>Pesan / Kesan:</b> <?= nl2br(e($pesan)) ?></div>

        <div class="aksi">
            <a class="btn" href="index.php">Kembali ke Data Mahasiswa</a>
        </div>
    </div>
</body>
</html>