<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Semester
    </h2>


    <!-- New Table -->
    <div class="flex justify-between flex-1">
        <div>
            <a href="?page=master&act=addsemester">
                <button class="px-4 justify-start py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </a>
        </div>
        <div class="relative w-full max-w-xl mb-2 focus-within:text-purple-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4 text-black dark:text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" id="search" type="text" placeholder="Cari Guru" aria-label="Search" />
        </div>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="table w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Semester</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $semester = mysqli_query($con, "SELECT * FROM tb_semester");
                    $jumlah_data = mysqli_num_rows($semester);
                    $total_halaman = ceil($jumlah_data / $batas);

                    $data = mysqli_query($con, "SELECT * FROM tb_semester limit $halaman_awal, $batas");
                    $nomor = $halaman_awal + 1;
                    $nomor_akhir = $halaman_awal + $batas;
                    if ($nomor_akhir > $jumlah_data) {
                        $nomor_akhir = $jumlah_data;
                    }

                    $offset = ($halaman - 1) * $batas;
                    $no = $offset + 1;

                    foreach ($data as $k) { ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="font-semibold w-8 mr-3 md:block">
                                        <b><?= $no++; ?>.</b>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?= $k['semester']; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php
                                if ($k['status'] == 0) {
                                    echo "<span class='px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100'>Tidak Aktif</span>";
                                } else {
                                    echo "<span class='px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'>Sedang Aktif</span>";
                                } ?>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">

                                    <?php
                                    if ($k['status'] == 0) {
                                    ?>
                                        <a onclick="return confirm('Yakin Aktifkan Semester  ??')" href="?page=master&act=set_semester&id=<?= $k['id_semester'] ?>&status=1" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Aktifkan</a>
                                    <?php

                                    } else {
                                    ?>
                                        <a onclick="return confirm('Yakin NonAktifkan Semester  ??')" href="?page=master&act=set_semester&id=<?= $k['id_semester'] ?>&status=0" class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100"> Nonaktif</a>
                                    <?php
                                    }

                                    ?>


                                    <a href="?page=master&act=editsemester&id=<?=$k['id_semester'] ?>">
                                        <button @click="openModalEditSemester" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                    </a>

                                    <a onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delsemester&id=<?=$k['id_semester'] ?>">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
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
                                        echo "href='?page=master&act=semester&halaman=$previous'";
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
                                    <a href="?page=master&act=semester&halaman=<?php echo $x ?>">
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
                                        echo "href='?page=master&act=semester&halaman=$next'";
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