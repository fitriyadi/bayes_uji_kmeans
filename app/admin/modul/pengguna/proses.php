<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_pengguna 
		(idpengguna,nama,username,password,level) 
		VALUES (?,?,?,?,?)");

	$stmt->bind_param("sssss", 
		$_POST['idpengguna'],
		$_POST['nama'],
		$_POST['username'],
		$_POST['password'],
		$_POST['level']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pengguna berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=pengguna/data';</script>";	
	} else {
		echo "<script>alert('Data Pengguna Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_pengguna  SET 
		nama=?,
		username=?,
		password=?,
		level=?
		where idpengguna=?");
	$stmt->bind_param("sssss",
		$_POST['nama'],
		$_POST['username'],
		$_POST['password'],
		$_POST['level'],
		$_POST['idpengguna']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pengguna berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=pengguna/data';</script>";	
	} else {
		echo "<script>alert('Data Pengguna Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_pengguna where idpengguna=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Pengguna Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=pengguna/data';</script>";	
	} else {
		echo "<script>alert('Data Pengguna Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>