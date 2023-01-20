<?php 

if (isset($_POST['saveGuru'])) {

    $pass = md5($_POST['password']);

		$sumber = @$_FILES['foto']['tmp_name'];
		$target = '../assets/img/user/';
		$nama_gambar = @$_FILES['foto']['name'];
		$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
		if ($pindah) {
			$save= mysqli_query($con,"INSERT INTO tb_guru VALUES(NULL,'$_POST[nip]','$_POST[nama]','$_POST[email]','$pass','$nama_gambar','$_POST[status]') ");
			if ($save) {
				echo "<script>
                        alert('Sukses ! Data berhasil disimpan');
                        window.location.replace('?page=guru');
                        </script>";
			}

		}


  }elseif (isset($_POST['editGuru'])) {

    $pass = md5($_POST['password']);
		$gambar = @$_FILES['foto']['name'];
		if (!empty($gambar)) {
		move_uploaded_file($_FILES['foto']['tmp_name'],"../assets/img/user/$gambar");
		$ganti = mysqli_query($con,"UPDATE tb_guru SET foto='$gambar' WHERE id_guru='$_POST[id]' ");
		}
		$editGuru= mysqli_query($con,"UPDATE tb_guru SET nama_guru='$_POST[nama]',email='$_POST[email]',password='$pass', status='$_POST[status]' WHERE id_guru='$_POST[id]' ");

		if ($editGuru) {
			echo "<script>
            alert('Sukses ! Data berhasil diubah');
            window.location.replace('?page=guru');
            </script>";
		}


  }
