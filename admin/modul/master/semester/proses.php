<?php 

if (isset($_POST['add'])) {
    $save= mysqli_query($con,"INSERT INTO tb_semester VALUES(NULL,'$_POST[semester]','1') ");
    if ($save) {
        echo "<script>
        alert('Data tersimpan !');
        window.location='?page=master&act=semester';
        </script>";                        
    }
} elseif (isset($_POST['edit'])) {
    $save= mysqli_query($con,"UPDATE tb_semester SET semester='$_POST[semester]' WHERE id_semester='$_POST[id]' ");
    if ($save) {
        echo "<script>
        alert('Data diubah !');
        window.location='?page=master&act=semester';
        </script>";                        
    }
}
