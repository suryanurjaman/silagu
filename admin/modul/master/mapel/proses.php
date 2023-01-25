<?php 

if (isset($_POST['add'])) {
    $save= mysqli_query($con,"INSERT INTO tb_master_mapel VALUES(NULL,'$_POST[kode]','$_POST[mapel]') ");
    if ($save) {
        echo "<script>
        alert('Data tersimpan !');
        window.location='?page=master&act=mapel';
        </script>";                        
    }
} elseif (isset($_POST['edit'])) {
    $save= mysqli_query($con,"UPDATE tb_master_mapel SET mapel='$_POST[mapel]' WHERE id_mapel='$_POST[id]' ");
    if ($save) {
        echo "<script>
        alert('Data diubah !');
        window.location='?page=master&act=mapel';
        </script>";                        
    }
}
