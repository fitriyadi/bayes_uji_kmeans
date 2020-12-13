<?php
require_once 'koneksi.php';


//Set Nilai Hasil
$p[1]=All($mysqli,"1");
$p[2]=All($mysqli,"2");

// echo "<pre>";
// print_r($p);
// echo "<pre>";

$sql="SELECT * FROM v_data where jenis='Testing'";
$result=$mysqli->query($sql);
while ($data=mysqli_fetch_assoc($result)) {
	//extract($data);

	$kriteria[1]=1;
	$kriteria[2]=1;
	for ($i=0;$i<20;$i++) { 
		$variabel='var'.$i;

		$kriteria[1]*=variabel($mysqli,'1',$variabel,$data[$variabel]);
		$kriteria[2]*=variabel($mysqli,'2',$variabel,$data[$variabel]);
	}

	$kriteria[1]*=$p[1];
	$kriteria[2]*=$p[2];

	if($kriteria[1]>$kriteria[2]){
		$target='1';
	}else{
		$target='2';
	}

	$id=$data['id'];
	mysqli_query($mysqli,"update tb_master set target='$target' where id='$id'");
}	


//Hitung Akurasi //
$query="SELECT(
(SELECT COUNT(*) FROM tb_master WHERE jenis='Testing' AND kelas=target)/
(SELECT COUNT(*) FROM tb_master WHERE jenis='Testing')
)
AS hasil";
$row = $mysqli->query($query)->fetch_array();
echo "Jumlah Akurasi = ".$row[0];



function All($mysqli,$kelas){
	$query="SELECT(
	(SELECT COUNT(*)FROM v_data WHERE jenis='Training' AND kelas='$kelas')
	/
	(SELECT COUNT(*)FROM v_data WHERE jenis='Training'))
	AS hasil";
	$row = $mysqli->query($query)->fetch_array();
	return $row[0];

}

function variabel($mysqli,$kelas,$x,$value){
	$query="SELECT(
	(SELECT COUNT(*)FROM v_data WHERE jenis='Training' AND kelas='$kelas' and $x='$value')
	/
	(SELECT COUNT(*)FROM v_data WHERE jenis='Training' AND kelas='$kelas'))
	AS hasil";
	$row = $mysqli->query($query)->fetch_array();
	return $row[0];
}


?>