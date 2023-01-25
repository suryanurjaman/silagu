<?php 

$edit = mysqli_query($con,"SELECT * FROM tb_thajaran WHERE id_thajaran='$_GET[id]' ");
foreach ($edit as $t)?>
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Tahun Pelajaran
        </h2>

        <!-- General elements -->
        <form action="?page=master&act=prosesta" method="post" enctype="multipart/form-data">
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tahun Pelajaran</span>
                <input name="id" type="hidden" value="<?=$t['id_thajaran'] ?>">
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                name="tp" value="<?=$t['tahun_ajaran']?>" />
            </label>

            <div class="py-2">
                <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  type="submit" name="edit"
                >
                  Simpan
                </button>
                <button
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                >
                  <a href="?page=master&act=ta">Batal</a>
                </button>
            </div>
        </div>
        </form>
    </div>
</main>
