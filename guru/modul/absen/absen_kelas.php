<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Absensi
    </h2>
    
    <div class="grid gap-6 mb-8 md:grid-cols-2">
    <?php
    $data = mysqli_query($con, "SELECT * FROM tb_mengajar
    INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru
    INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
    INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
    
    INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
    INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
    WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_thajaran.status=1 ");
    
    foreach ($data as $g) { ?>
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <h4 class="inline-flex items-center mb-4 font-semibold text-gray-600 dark:text-gray-300">
                <svg class="mr-2 w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
              </svg>
                <?= $g['mapel'] ?> | <?= $g['kode_mapel'] ?>
                </h4>
                <div class = "flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                ></span>
                <p class="text-gray-600 dark:text-gray-400">
                Nama Guru : <?= $g['nama_guru'] ?> | NIP : <?= $g['nip'] ?>
                </p>
                </div>
                <div class = "flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                ></span>
                <p class="text-gray-600 dark:text-gray-400">
                Hari : <?= $g['hari'] ?> | Jam Ke : <?= $g['jamke'] ?>
                </p>
                </div>
                <div class = "flex items-center">
                <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                ></span>
                <p class="text-gray-600 dark:text-gray-400">
                Kelas : <?= $g['nama_kelas'] ?> | Jam Pelajaran : <?= $g['jam_mengajar'] ?>
                </p>
                </div>
                
                    <!-- Tombol Absen -->
              <div>
              <a href="?page=absen&act=add&id=<?=$g['id_mengajar']?>">
                <button
                  class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  Absen
                </button>
              </a>
              </div>
              </div>
               <?php } ?>
    </div>
   

</div>