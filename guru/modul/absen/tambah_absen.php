<?php

$data = mysqli_query($con, "SELECT * FROM tb_mengajar
    INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru
    INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
    INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
    
    INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
    INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
    WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_thajaran.status=1 ");

$taAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_thajaran WHERE status=1 "));
$semAktif = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_semester WHERE status=1 "));

foreach($data as $d)
?>

<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Absensi
        </h2>
        
        <!-- General elements -->
        <form action="" method="post">
            
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <h2 class="flex justify-end"><?php echo date('H:i:s d-m-Y')  ?></h2>
                <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Kode Pelajaran</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="kodpel" id="kodpel" value="MPL-<?= time(); ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Tahun Pelajaran</span>
                        <input type="hidden" name="ta" value="<?= $taAktif['id_thajaran'] ?>">
                        <input type="hidden" name="semester" value="<?= $semAktif['id_semester'] ?>">
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="ta" type="text" value="<?= $taAktif['tahun_ajaran'] ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Semester</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="semester" type="text" value="<?= $semAktif['semester'] ?>" readonly />
                    </label>
                </div>

                <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Guru Mata Pelajaran</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="guru" value="<?= $d['nama_guru']; ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Mata Pelajaran</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="mapel" value="<?= $d['mapel']; ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Kelas</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="kelas" value="<?= $d['nama_kelas']; ?>" readonly />
                    </label>
                </div>

                <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Hari</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="hari" value="<?= $d['hari']; ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Waktu</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="waktu" value="<?= $d['jam_mengajar']; ?>" readonly />
                    </label>

                    <label class="text-sm">
                        <span class="block text-gray-700 dark:text-gray-400">Jam Ke</span>
                        <input class="w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="jamke" value="<?= $d['jamke']; ?>" readonly />
                    </label>
                </div>

                <div class="grid gap-6 mb-2 md:grid-cols-2 xl:grid-cols-4">
                <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Status
                </span>

                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  name="status"
                >
                  <option value="Hadir">Hadir</option>
                  <option value="Tidak Hadir">Tidak Hadir</option>
                </select>
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


            $tanggal = date('H:i:s d-m-Y');
            $kodpel = $_POST['kodpel'];
            $ta = $_POST['ta'];
            $semester = $_POST['semester'];
            $guru = $_POST['guru'];
            $mapel = $_POST['mapel'];
            $kelas = $_POST['kelas'];
            $hari = $_POST['hari'];
            $waktu = $_POST['waktu'];
            $jamke = $_POST['jamke'];
            $status = $_POST['status'];

            $insert = mysqli_query($con, "INSERT INTO tb_absen VALUES (NOT NULL,'$kodpel','$ta','$semester','$guru','$kelas','$hari','$waktu','$jamke','$status','$tanggal' ) ");

            if ($insert) {
                echo "
                <script>
                alert('Data Berhasil di simpan !');
                window.location='?page=rekap';
                </script>";
            } 
        }


        ?>
    </div>
</main>