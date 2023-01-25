<?php 

if (isset($_POST['add'])) {
    $save= mysqli_query($con,"INSERT INTO tb_thajaran VALUES(NULL,'$_POST[tp]','1') ");
    if ($save) {
        echo "<script>
        alert('Data tersimpan !');
        window.location='?page=master&act=ta';
        </script>";                        
    }
} elseif (isset($_POST['edit'])) {
    $save= mysqli_query($con,"UPDATE tb_thajaran SET tahun_ajaran='$_POST[tp]' WHERE id_thajaran='$_POST[id]' ");
    if ($save) {
        echo "<script>
        alert('Data diubah !');
        window.location='?page=master&act=ta';
        </script>";                        
    }
}
