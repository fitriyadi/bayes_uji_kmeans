<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_kelompok 
		(idkelompok,kelompok,keterangan) 
		VALUES (?,?,?)");

	$stmt->bind_param("sss", 
		$_POST['idkelompok'],
		$_POST['kelompok'],
		$_POST['keterangan']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Kelompok berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=kelompok/data';</script>";	
	} else {
		echo "<script>alert('Data Kelompok Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_kelompok  SET 
		kelompok=?,
		keterangan=?
		where idkelompok=?");
	$stmt->bind_param("sss",
		$_POST['kelompok'],
		$_POST['keterangan'],
		$_POST['idkelompok']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=kelompok/data';</script>";	
	} else {
		echo "<script>alert('Data Kelompok Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_kelompok where idkelompok=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Kelompok Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=kelompok/data';</script>";	
	} else {
		echo "<script>alert('Data Kelompok Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>