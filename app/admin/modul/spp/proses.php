<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_spp 
		(idspp,namaspp,harga) 
		VALUES (?,?,?)");

	$stmt->bind_param("sss", 
		$_POST['idspp'],
		$_POST['namaspp'],
		$_POST['hargaspp']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data spp berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=spp/data';</script>";	
	} else {
		echo "<script>alert('Data spp Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

	//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_spp  SET 
		namaspp=?,
		harga=?
		where idspp=?");
	$stmt->bind_param("sss",
		$_POST['namaspp'],
		$_POST['hargaspp'],
		$_POST['idspp']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=spp/data';</script>";	
	} else {
		echo "<script>alert('Data spp Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['aktif'])){

//Proses ubah data
	mysqli_query($mysqli,"UPDATE tb_spp set statusspp='Non'");
	$status='Aktif';
	$stmt = $mysqli->prepare("UPDATE tb_spp  SET 
		statusspp=?
		where idspp=?");

	$stmt->bind_param("ss",
		$status,
		$_GET['aktif']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data SPP di aktifkan')</script>";
		echo "<script>window.location='index.php?hal=spp/data';</script>";	
	} else {
		echo "<script>alert('Data SPP Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_spp where idspp=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data spp Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=spp/data';</script>";	
	} else {
		echo "<script>alert('Data spp Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>