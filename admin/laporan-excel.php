<?php
include "../config/koneksi.php";


header("Pragma: no-cache");
header("Expires:0");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-excel.xls");
?>

<table class="table w-full whitespace-no-wrap">
    <thead>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Rekap Absensi
        </h2>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Id Absen</th>
            <th class="px-4 py-3">Kode Pelajaran</th>
            <th class="px-4 py-3">TP/Semester</th>
            <th class="px-4 py-3">Nama Guru</th>
            <th class="px-4 py-3">Kelas</th>
            <th class="px-4 py-3">Hari/Waktu</th>
            <th class="px-4 py-3">Jam Ke</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Tanggal Absen</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <?php
        $no = 1;
        $data = mysqli_query($con, "SELECT * FROM tb_absen");


        foreach ($data as $d) { ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td>
                    <?= $d['kode_pelajaran'] ?>
                </td>
                <td>
                    <?= $d['tahun_ajaran'] ?>/<?= $d['semester'] ?>
                </td>
                <td>
                    <?= $d['guru_pelajaran'] ?>
                </td>
                <td>
                    <?= $d['kelas'] ?>
                </td>
                <td>
                    <?= $d['hari'] ?>/<?= $d['waktu'] ?>
                </td>
                <td>
                    <?= $d['jamke'] ?>
                </td>
                <td>
                    <?= $d['status'] ?>
                </td>
                <td>
                    <?= $d['tgl_absen'] ?>
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>