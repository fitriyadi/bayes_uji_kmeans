<?php
if(isset($_POST['tambah'])){	
//Proses penambahan index
	$stmt = $mysqli->prepare("INSERT INTO tb_komponen 
		(idkomponen,namakomponen,indikator,idkelompok) 
		VALUES (?,?,?,?)");

	$stmt->bind_param("ssss", 
		$_POST['idkomponen'],
		$_POST['namakomponen'],
		$_POST['indikator'],
		$_POST['idkelompok']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Komponen berhasil disimpan')</script>";
		echo "<script>window.location='index.php?hal=komponen/data';</script>";	
	} else {
		echo "<script>alert('Data Komponen Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_POST['ubah'])){

//Proses ubah data
	$stmt = $mysqli->prepare("UPDATE tb_komponen  SET 
		namakomponen=?,
		indikator=?,
		idkelompok=?
		where idkomponen=?");
	$stmt->bind_param("ssss",
		$_POST['namakomponen'],
		$_POST['indikator'],
		$_POST['idkelompok'],
		$_POST['idkomponen']);	

	if ($stmt->execute()) { 
		echo "<script>alert('Data Komponen berhasil diubah')</script>";
		echo "<script>window.location='index.php?hal=komponen/data';</script>";	
	} else {
		echo "<script>alert('Data Komponen Gagal Disimpan')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}else if(isset($_GET['hapus'])){

	//Proses hapus
	$stmt = $mysqli->prepare("DELETE FROM tb_komponen where idkomponen=?");
	$stmt->bind_param("s",$_GET['hapus']); 

	if ($stmt->execute()) { 
		echo "<script>alert('Data Komponen Berhasil Dihapus')</script>";
		echo "<script>window.location='index.php?hal=komponen/data';</script>";	
	} else {
		echo "<script>alert('Data Komponen Gagal Dihapus')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}

}
?>