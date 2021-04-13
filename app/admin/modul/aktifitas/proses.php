<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_aktifitas 
		(idaktifitas,namaaktifitas) 
		VALUES (?,?)");

	$stmt->bind_param("ss", 
		$_POST['idaktifitas'],
		$_POST['namaaktifitas']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Aktifitas berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=aktifitas/data';</script>";	
	} else {
		echo "<script>alert('Data Aktifitas Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_aktifitas  SET 
		namaaktifitas=?
		where idaktifitas=?");
	$stmt->bind_param("ss",
		$_POST['namaaktifitas'],
		$_POST['idaktifitas']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=aktifitas/data';</script>";	
	} else {
		echo "<script>alert('Data Aktifitas Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_aktifitas where idaktifitas=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Aktifitas Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=aktifitas/data';</script>";	
	} else {
		echo "<script>alert('Data Aktifitas Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>