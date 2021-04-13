<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$jumlahdata=1000;
$fold=10;
$pembagian=ceil($jumlahdata/$fold);

for ($i=0;$i<$fold;$i++) { 
	echo "Iterasi Ke ".($i+1)."<br>";
	$nilaiawal=(($i*$pembagian)+1);
	$nilaiakhir=(($i+1)*$pembagian);
	if($nilaiakhir>=$jumlahdata)
		$nilaiakhir=$jumlahdata;

	mysqli_query($mysqli,"update tb_master set jenis='Training'");
	echo "Testing ".$nilaiawal." sd ".$nilaiakhir;
	echo "<br>";
	for ($xx=$nilaiawal;$xx<=$nilaiakhir;$xx++) { 
		perubahan($mysqli,$xx,"Testing");
	}

	//Hitung Data
	mysqli_query($mysqli,"update tb_master set target=null");

//Set Nilai Hasil
	$p[1]=All($mysqli,"1");
	$p[2]=All($mysqli,"2");

	$N_duration=cari_mean_deviasi($mysqli,"var1","kelas");
	$N_credit=cari_mean_deviasi($mysqli,"var4","kelas");
	$N_age=cari_mean_deviasi($mysqli,"var12","kelas");
	//$N_baru=cari_mean_deviasi($mysqli,"var10","kelas");
	//$N_barulagi=cari_mean_deviasi($mysqli,"var7","kelas");

// echo "<pre>";
// print_r($N_duration);
// echo "</pre>";

// echo "<pre>";
// print_r($N_credit);
// echo "</pre>";

// echo "<pre>";
// print_r($N_age);
// echo "</pre>";

	$sql="SELECT * FROM v_data_3 where jenis='Testing'";
	$result=$mysqli->query($sql);
	while ($data=mysqli_fetch_assoc($result)) {
	//extract($data);
		$kriteria[1]=1;
		$kriteria[2]=1;
		for ($xyz=0;$xyz<20;$xyz++) { 
			$variabel='var'.$xyz;
//			if($xyz!=1 and $xyz!=4 and $xyz!=12 and $xyz!=10 and $xyz!=7){
			//if($xyz!=1 and $xyz!=4 and $xyz!=12){
			//echo $i."<br>";
				$kriteria[1]*=variabel($mysqli,'1',$variabel,$data[$variabel]);
				$kriteria[2]*=variabel($mysqli,'2',$variabel,$data[$variabel]);
			//}
		}

	//duration
		$fungsi_duration = fungsi_hitung($data['a_duration'],$N_duration);

	//credit
		$fungsi_credit = fungsi_hitung($data['a_credit'],$N_credit);

	//Age
		$fungsi_age = fungsi_hitung($data['a_age'],$N_age);

		//$fungsi_baru = fungsi_hitung($data['var10'],$N_baru);

//		$fungsi_barulagi= fungsi_hitung($data['var7'],$N_barulagi);

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
		//$kriteria[1]*=$fungsi_baru[0];
		//$kriteria[1]*=$fungsi_barulagi[0];

		$kriteria[2]=$kriteria[2]*$p[2];
		$kriteria[2]*=$fungsi_duration[1];
		$kriteria[2]*=$fungsi_credit[1];
		$kriteria[2]*=$fungsi_age[1];
		//$kriteria[2]*=$fungsi_baru[1];
		//$kriteria[2]*=$fungsi_barulagi[1];

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
echo "Jumlah Akurasi $i = ".$row[0];
echo "<hr>";

}


function perubahan($mysqli,$id,$jenis){
	mysqli_query($mysqli,"update tb_master set jenis='$jenis' where id='$id'");
}

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