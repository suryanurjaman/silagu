<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Rekap Absensi
    </h2>

    <!-- New Table -->
    <div class="flex justify-end flex-1">
        <div class="relative w-full max-w-xl mb-2 focus-within:text-purple-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4 text-black dark:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" id="search" type="text" placeholder="Cari Absen" aria-label="Search" />
        </div>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="table w-full whitespace-no-wrap">
                <thead>
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
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $jadwal = mysqli_query($con, "SELECT * FROM tb_absen");
                    $jumlah_data = mysqli_num_rows($jadwal);
                    $total_halaman = ceil($jumlah_data / $batas);

                    $data = mysqli_query($con, "SELECT * FROM tb_absen limit $halaman_awal, $batas");
                    $nomor = $halaman_awal + 1;
                    $nomor_akhir = $halaman_awal + $batas;
                    if ($nomor_akhir > $jumlah_data) {
                        $nomor_akhir = $jumlah_data;
                    }

                    $offset = ($halaman - 1) * $batas;
                    $no = $offset + 1;

                    foreach ($data as $d) { ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="font-semibold w-8 mr-3 md:block">
                                        <b><?= $no++; ?>.</b>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?=$d['kode_pelajaran'] ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?=$d['tahun_ajaran'] ?>/<?=$d['semester'] ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?=$d['guru_pelajaran'] ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?=$d['kelas'] ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?=$d['hari'] ?>/<?=$d['waktu'] ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            <?=$d['jamke'] ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            <?=$d['status'] ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            <?=$d['tgl_absen'] ?>
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing <?php echo $nomor ?> - <?php echo $nomor_akhir ?> of <?php echo $nomor_akhir ?> data
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <a <?php if ($halaman > 1) {
                                        echo "href='?page=master&act=kelas&halaman=$previous'";
                                    } ?>>
                                    <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </a>
                            </li>
                            <?php
                            for ($x = 1; $x <= $total_halaman; $x++) {
                            ?>
                                <li>
                                    <a href="?page=master&act=kelas&halaman=<?php echo $x ?>">
                                        <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                            <?php echo $x; ?>
                                        </button>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            <li>
                                <a <?php if ($halaman < $total_halaman) {
                                        echo "href='?page=master&act=kelas&halaman=$next'";
                                    } ?>>
                                    <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </span>
            </div>
        </div>
    </div>
</div>
</div>