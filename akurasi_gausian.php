<?php
require_once 'koneksi.php';
require_once 'fungsi.php';


//Set Nilai Hasil
$p[1]=All($mysqli,"1");
$p[2]=All($mysqli,"2");

// echo "<pre>";
// print_r($p);
// echo "<pre>";
//Setting UP Mean dan Deviasi //1,4,12, 
//1 : duration
//4 : credit
//12: Age

$N_duration=cari_mean_deviasi($mysqli,"var1","kelas");
$N_credit=cari_mean_deviasi($mysqli,"var4","kelas");
$N_age=cari_mean_deviasi($mysqli,"var12","kelas");

// echo "<pre>";
// print_r($N_duration);
// echo "</pre>";

// echo "<pre>";
// print_r($N_credit);
// echo "</pre>";

// echo "<pre>";
// print_r($N_age);
// echo "</pre>";

$sql="SELECT * FROM tb_master where jenis='Testing'";
$result=$mysqli->query($sql);
while ($data=mysqli_fetch_assoc($result)) {
	//extract($data);
	$kriteria[1]=1;
	$kriteria[2]=1;
	for ($i=0;$i<20;$i++) { 
		$variabel='var'.$i;
		if($i!=1 and $i!=4 and $i!=12){
			//echo $i."<br>";
			$kriteria[1]*=variabel($mysqli,'1',$variabel,$data[$variabel]);
			$kriteria[2]*=variabel($mysqli,'2',$variabel,$data[$variabel]);
		}
	}

	//duration
	$fungsi_duration = fungsi_hitung($data['var1'],$N_duration);

	//credit
	$fungsi_credit = fungsi_hitung($data['var4'],$N_credit);

	//Age
	$fungsi_age = fungsi_hitung($data['var12'],$N_age);

	// echo "<pre>";
	// print_r($fungsi_duration);
	// echo "</pre>";

	// echo "<pre>";
	// print_r($fungsi_credit);
	// echo "</pre>";

	// echo "<pre>";
	// print_r($fungsi_age);
	// echo "</pre>";

	// echo "<hr>";


	// echo "<pre>";
	// print_r($kriteria);
	// echo "</pre>";


	// echo "<pre>";
	// print_r($p);
	// echo "</pre>";


	$kriteria[1]=$kriteria[1]*$p[1];
	$kriteria[1]*=$fungsi_duration[0];
	$kriteria[1]*=$fungsi_credit[0];
	$kriteria[1]*=$fungsi_age[0];

	$kriteria[2]=$kriteria[2]*$p[2];
	$kriteria[2]*=$fungsi_duration[1];
	$kriteria[2]*=$fungsi_credit[1];
	$kriteria[2]*=$fungsi_age[1];

	// echo "<pre>";
	// print_r($kriteria);
	// echo "</pre>";

	// echo "<hr>";

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