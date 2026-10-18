<?php

function hitungGrade($nilai) {
    if ($nilai >= 80) {
        return "A";
    } elseif ($nilai >= 70) {
        return "B";
    } elseif ($nilai >= 60) {
        return "C";
    } else {
        return "D";
    }
}

function hitungStatus($nilai) {
    if ($nilai >= 70) {
        return "Lulus";
    } else {
        return "Tidak Lulus";
    }
}

function e($teks) {
    return htmlspecialchars((string)$teks, ENT_QUOTES, 'UTF-8');
}

$mahasiswa = [
    ["nim" => "25001", "nama" => "Andi Pratama",  "jurusan" => "Pendidikan Sistem dan Teknologi Informasi", "email" => "andi@upi.edu",  "nilai" => 88],
    ["nim" => "25002", "nama" => "Budi Santoso",  "jurusan" => "Sistem Telekomunikasi",                     "email" => "budi@upi.edu",  "nilai" => 76],
    ["nim" => "25003", "nama" => "Citra Lestari", "jurusan" => "Mekatronika dan Kecerdasan Buatan",         "email" => "citra@upi.edu", "nilai" => 67],
    ["nim" => "25004", "nama" => "Dina Maharani", "jurusan" => "Pendidikan Sistem dan Teknologi Informasi", "email" => "dina@upi.edu",  "nilai" => 92],
    ["nim" => "25005", "nama" => "Eko Saputra",   "jurusan" => "Sistem Telekomunikasi",                     "email" => "eko@upi.edu",   "nilai" => 58],
];

$total = count($mahasiswa);
$jumlahNilai = 0;
$jumlahLulus = 0;
$tertinggi = $mahasiswa[0];

foreach ($mahasiswa as $m) {
    $jumlahNilai += $m["nilai"];

    if (hitungStatus($m["nilai"]) === "Lulus") {
        $jumlahLulus++;
    }

    if ($m["nilai"] > $tertinggi["nilai"]) {
        $tertinggi = $m;
    }
}

$rataRata = $jumlahNilai / $total;
$persenLulus = ($jumlahLulus / $total) * 100;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa UPI Kamda PSTI 3B</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 40px 16px; min-height: 100vh; font-family: "Segoe UI", Roboto, Arial, sans-serif; color: #2c2d2f; background: linear-gradient(135deg, #0c0c0d 0%, #f8fafc 100%); }
        .card { max-width: 960px; margin: 0 auto; background: #fff; padding: 28px 32px; border-radius: 14px; box-shadow: 0 10px 30px rgba(30,64,175,.10); }
        .card.sempit { max-width: 560px; }

        h1 { margin: 0 0 6px; font-size: 1.7rem; }
        .sub { margin: 0; color: #050608; }
        .header-row { display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 20px; }

        .btn { display: inline-block; padding: 9px 16px; border: 0; border-radius: 6px; cursor: pointer; font-size: .9rem; font-weight: 600; text-decoration: none; color: #fff; background: #c10de4; transition: background .2s, transform .1s; }
        .btn:hover { background: #050406; transform: translateY(-1px); }
        .btn.abu { background: #4b5563; }
        .btn.abu:hover { background: #e0e5ec; }
        .btn.kecil { padding: 6px 12px; font-size: .8rem; }

        .ringkasan { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 12px; margin-bottom: 20px; }
        .ringkasan .item { background: #d116c4; border-radius: 10px; padding: 12px 14px; }
        .ringkasan .item span { display: block; font-size: .75rem; color: #eff1f4; text-transform: uppercase; letter-spacing: .04em; }
        .ringkasan .item strong { font-size: 1.3rem; }

        .tabel-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: .92rem; }
        th, td { padding: 12px 10px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background: #e40fe1; font-size: .85rem; }
        tbody tr:hover { background: #f8fafc; }

        .lulus { color: #15803d; font-weight: 600; }
        .tidak-lulus { color: #dc2626; font-weight: 600; }

        .grade { display: inline-block; min-width: 26px; text-align: center; padding: 2px 8px; border-radius: 999px; font-weight: 700; font-size: .82rem; }
        .grade-A { background: #170808; color: #cddad1; }
        .grade-B { background: #010203; color: #ffffff; }
        .grade-C { background: #1a1a14; color: #ffffff; }
        .grade-D { background: #070606; color: #ffffff; }

        .baris { background: #f1f5f9; padding: 12px 14px; border-radius: 8px; margin-bottom: 10px; }
        .baris b { margin-right: 4px; }

        label { display: block; font-weight: 600; margin: 14px 0 6px; }
        input[type=text], textarea { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; font: inherit; background: #f8fafc; }
        input:focus, textarea:focus { outline: 2px solid #1d4ed8; background: #fff; }
        textarea { min-height: 110px; resize: vertical; }
        .aksi { margin-top: 20px; display: flex; gap: 8px; }
        .error { background: #fee2e2; color: #991b1b; padding: 10px 14px; border-radius: 8px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header-row">
            <div>
                <h1>Daftar Mahasiswa PSTI Kelas 3B</h1>
                <p class="sub">Mini Website PHP Dasar Farrel</p>
            </div>
            <a class="btn" href="form_pesan.php">Tolong Segera Isi Form Pesan ie</a>
        </div>

        <div class="ringkasan">
            <div class="item"><span>Total Mahasiswa</span><strong><?= $total ?></strong></div>
            <div class="item"><span>Rata-rata Nilai</span><strong><?= number_format($rataRata, 1) ?></strong></div>
            <div class="item"><span>Lulus</span><strong><?= $jumlahLulus ?> (<?= round($persenLulus) ?>%)</strong></div>
            <div class="item"><span>Nilai Tertinggi</span><strong><?= $tertinggi["nilai"] ?></strong> <small><?= e($tertinggi["nama"]) ?></small></div>
        </div>

        <div class="tabel-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Nilai</th>
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($mahasiswa as $m): ?>
                    <?php
                        $grade  = hitungGrade($m["nilai"]);
                        $status = hitungStatus($m["nilai"]);
                        $kelasStatus = ($status === "Lulus") ? "lulus" : "tidak-lulus";

                        $query = http_build_query([
                            "nim"     => $m["nim"],
                            "nama"    => $m["nama"],
                            "jurusan" => $m["jurusan"],
                            "email"   => $m["email"],
                            "nilai"   => $m["nilai"],
                            "grade"   => $grade,
                            "status"  => $status,
                        ]);
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= e($m["nim"]) ?></td>
                        <td><?= e($m["nama"]) ?></td>
                        <td><?= e($m["jurusan"]) ?></td>
                        <td><?= $m["nilai"] ?></td>
                        <td><span class="grade grade-<?= $grade ?>"><?= $grade ?></span></td>
                        <td class="<?= $kelasStatus ?>"><?= $status ?></td>
                        <td><a class="btn kecil" href="detail.php?<?= e($query) ?>">Lihat Detail</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>