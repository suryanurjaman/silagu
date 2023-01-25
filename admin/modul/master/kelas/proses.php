<?php 

if (isset($_POST['add'])) {
	$save = mysqli_query($con, "INSERT INTO tb_mkelas VALUES(NULL,'$_POST[kode]','$_POST[kelas]') ");
	if ($save) {
		echo "<script>
alert('Data tersimpan !');
window.location='?page=master&act=kelas';
</script>";
	}
} elseif (isset($_POST['edit'])) {
	$save = mysqli_query($con, "UPDATE tb_mkelas SET nama_kelas='$_POST[kelas]' WHERE id_mkelas='$_POST[id]' ");
	if ($save) {
		echo "<script>
alert('Data diubah !');
window.location='?page=master&act=kelas';
</script>";
	}
}
