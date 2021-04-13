<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_guru 
		(idguru,nama,notelpon,alamat,username,pass) 
		VALUES (?,?,?,?,?,?)");

	$stmt->bind_param("ssssss", 
		$_POST['idguru'],
		$_POST['nama'],
		$_POST['notelpon'],
		$_POST['alamat'],
		$_POST['username'],
		$_POST['pass']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Guru berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=guru/data';</script>";	
	} else {
		echo "<script>alert('Data Guru Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_guru  SET 
		nama=?,
		notelpon=?,
		alamat=?,
		username=?,
		pass=?
		where idguru=?");
	$stmt->bind_param("ssssss",
		$_POST['nama'],
		$_POST['notelpon'],
		$_POST['alamat'],
		$_POST['username'],
		$_POST['pass'],
		$_POST['idguru']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Guru berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=guru/data';</script>";	
	} else {
		echo "<script>alert('Data Guru Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_guru where idguru=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Guru Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=guru/data';</script>";	
	} else {
		echo "<script>alert('Data Guru Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>