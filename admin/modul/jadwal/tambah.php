<?php
$taAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_thajaran WHERE status=1 "));
$semAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_semester WHERE status=1 "));
?>

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Jadwal
        </h2>

        <!-- General elements -->
        <form action="" method="post">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                    <label class="text-sm">
                        <span for="kode" class="block text-gray-700 dark:text-gray-400">Kode Pelajaran</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="kode" id="kode" value="MPL-<?= time(); ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Tahun Pelajaran</span>
                        <input type="hidden" name="ta" value="<?= $taAktif['id_thajaran'] ?>">
                        <input type="hidden" name="semester" value="<?= $semAktif['id_semester'] ?>">
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="kelas" type="text" placeholder="<?= $taAktif['tahun_ajaran'] ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span for="kode" class="block text-gray-700 dark:text-gray-400">Semester</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="<?= $semAktif['semester'] ?>" readonly />
                    </label>
                </div>

                <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Guru Mata Pelajaran</span>
                        <select name="guru" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="">Pilih Guru</option>
                            <?php
                            $guru = mysqli_query($con, "SELECT * FROM tb_guru ORDER BY id_guru ASC");
                            foreach ($guru as $g) {
                                echo "<option value='$g[id_guru]'>$g[nama_guru]</option>";
                            }
                            ?>
                        </select>
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Mata Pelajaran</span>
                        <select name="mapel" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="">Pilih Mata Pelajaran</option>
                            <?php
                            $mapel = mysqli_query($con, "SELECT * FROM tb_master_mapel ORDER BY id_mapel ASC");
                            foreach ($mapel as $g) {
                                echo "<option value='$g[id_mapel]'>[ $g[kode_mapel] ] $g[mapel]</option>";
                            }
                            ?>
                        </select>
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Kelas</span>
                        <select name="kelas" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="">Pilih Kelas</option>
                            <?php
                            $kelas = mysqli_query($con, "SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC");
                            foreach ($kelas as $g) {
                                echo "<option value='$g[id_mkelas]'>$g[nama_kelas]</option>";
                            }
                            ?>
                        </select>
                    </label>
                </div>

                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Hari
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="hari" value="Monday" />
                            <span class="ml-2">Senin</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="hari" value="Tuesday" />
                            <span class="ml-2">Selasa</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="hari" value="Wednesday" />
                            <span class="ml-2">Rabu</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="hari" value="Thursday" />
                            <span class="ml-2">Kamis</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="hari" value="Friday" />
                            <span class="ml-2">Jumat</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="hari" value="Saturday" />
                            <span class="ml-2">Sabtu</span>
                        </label>
                    </div>
                </div>

                <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Waktu</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="waktu" placeholder="00.00 - 00.00" id="waktu" />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Jam Pelajaran</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="jamke" type="text" placeholder="1 - 10" id="jamke" />
                    </label>
                </div>

                <div class="py-2">
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit" name="save">
                        Simpan
                    </button>

                    <button class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        <a href="?page=jadwal">Batal</a>
                    </button>

                </div>
            </div>
        </form>
        <?php

        if (isset($_POST['save'])) {


            $kode = $_POST['kode'];
            $ta = $_POST['ta'];
            $semester = $_POST['semester'];
            $guru = $_POST['guru'];
            $mapel = $_POST['mapel'];
            $hari = $_POST['hari'];
            $kelas = $_POST['kelas'];
            $waktu = $_POST['waktu'];
            $jamke = $_POST['jamke'];

            $insert = mysqli_query($con, "INSERT INTO tb_mengajar VALUES (NOT NULL,'$kode','$hari','$waktu','$jamke','$guru','$mapel','$kelas','$semester','$ta' ) ");

            if (empty($guru) || empty($mapel) || empty($hari) || empty($kelas) || empty($waktu) || empty($guru)) {
                echo "<script>
                alert('Data tidak boleh kosong');
                </script>";
            } elseif ($insert) {
                echo "
                <script>
                alert('Data Berhasil di simpan !');
                window.location='?page=jadwal';
                </script>";
            } 
        }


        ?>
    </div>
</main>