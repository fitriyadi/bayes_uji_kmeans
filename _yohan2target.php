<?php
require_once 'koneksi.php';
require_once 'fungsi.php';

$jumlahdata=980;
$fold=3;
$pembagian=ceil($jumlahdata/$fold);

for ($i=0;$i<$fold;$i++) { 
	echo "Iterasi Ke ".($i+1)."<br>";
	$nilaiawal=(($i*$pembagian)+1);
	$nilaiakhir=(($i+1)*$pembagian);
	if($nilaiakhir>=$jumlahdata)
		$nilaiakhir=$jumlahdata;

	mysqli_query($mysqli,"update tb_mahasiswa set jenis='Training'");
	echo "Testing ".$nilaiawal." sd ".$nilaiakhir;
	echo "<br>";
	for ($xx=$nilaiawal;$xx<=$nilaiakhir;$xx++) { 
		mysqli_query($mysqli,"update tb_mahasiswa set jenis='Testing' where iddata='$xx'");
	}

	//Hitung Data
	mysqli_query($mysqli,"update tb_mahasiswa set target=null");

//Set Nilai Hasil
	$p[1]=All($mysqli,"L1");
	$p[2]=All($mysqli,"L2");

	$N_1=cari_mean_deviasi($mysqli,"ip1","kelas");
	$N_2=cari_mean_deviasi($mysqli,"ip2","kelas");
	$N_3=cari_mean_deviasi($mysqli,"ip3","kelas");
	$N_4=cari_mean_deviasi($mysqli,"ip4","kelas");
	$N_ipk=cari_mean_deviasi($mysqli,"ipk","kelas");

	$sql="SELECT * FROM tb_mahasiswa where jenis='Testing'";
	$result=$mysqli->query($sql);
	while ($data=mysqli_fetch_assoc($result)) {
	//extract($data);
		$kriteria[1]=1;
		$kriteria[2]=1;

		//jk,jurusan,ip1,ip2,ip3,ip4,ipk

		$kriteria[1]*=variabel($mysqli,'L1','jk',$data['jk']);
		$kriteria[1]*=variabel($mysqli,'L1','jurusan',$data['jurusan']);

		$kriteria[1]*=variabel($mysqli,'L1','k_ip1',$data['k_ip1']);
		$kriteria[1]*=variabel($mysqli,'L1','k_ip2',$data['k_ip2']);
		$kriteria[1]*=variabel($mysqli,'L1','k_ip3',$data['k_ip3']);
		$kriteria[1]*=variabel($mysqli,'L1','k_ip4',$data['k_ip4']);
		$kriteria[1]*=variabel($mysqli,'L1','k_ipk',$data['k_ipk']);

		$kriteria[2]*=variabel($mysqli,'L2','jk',$data['jk']);
		$kriteria[2]*=variabel($mysqli,'L2','jurusan',$data['jurusan']);
		$kriteria[2]*=variabel($mysqli,'L2','k_ip1',$data['k_ip1']);
		$kriteria[2]*=variabel($mysqli,'L2','k_ip2',$data['k_ip2']);
		$kriteria[2]*=variabel($mysqli,'L2','k_ip3',$data['k_ip3']);
		$kriteria[2]*=variabel($mysqli,'L2','k_ip4',$data['k_ip4']);
		$kriteria[2]*=variabel($mysqli,'L2','k_ipk',$data['k_ipk']);


		$fungsi_1 = fungsi_hitung($data['ip1'],$N_1);
		$fungsi_2 = fungsi_hitung($data['ip2'],$N_2);
		$fungsi_3 = fungsi_hitung($data['ip3'],$N_3);
		$fungsi_4 = fungsi_hitung($data['ip4'],$N_4);
		$fungsi_ipk= fungsi_hitung($data['ipk'],$N_ipk);


		// $kriteria[1]=$kriteria[1]*$p[1];
		// $kriteria[1]*=$fungsi_1[0];
		// $kriteria[1]*=$fungsi_2[0];
		// $kriteria[1]*=$fungsi_3[0];
		// $kriteria[1]*=$fungsi_4[0];
		// $kriteria[1]*=$fungsi_ipk[0];

		// $kriteria[2]=$kriteria[2]*$p[2];
		// $kriteria[2]*=$fungsi_1[1];
		// $kriteria[2]*=$fungsi_2[1];
		// $kriteria[2]*=$fungsi_3[1];
		// $kriteria[2]*=$fungsi_4[1];
		// $kriteria[2]*=$fungsi_ipk[1];


		if($kriteria[1]>$kriteria[2]){
			$target='L1';
		}else{
			$target='L2';

		}

		$id=$data['iddata'];
		mysqli_query($mysqli,"update tb_mahasiswa set target='$target' where iddata='$id'");
	}	

//Hitung Akurasi //
	$tp=caridata($mysqli,"select count(*) from tb_mahasiswa where jenis='Testing' and kelas='L1' and target='L1'");
	$fp=caridata($mysqli,"select count(*) from tb_mahasiswa where jenis='Testing' and kelas='L2' and target='L2'");


	// echo "<br>TP + TN : ".$tp."+".$tn; 
	// echo "<br> TP + TN  + Fp + FN : ".$tp."+".$tn."+".$fp."+".$fn;

//Hitung Akurasi //
	$query="SELECT(
	(SELECT COUNT(*) FROM tb_mahasiswa WHERE jenis='Testing' AND kelas=target)/
	(SELECT COUNT(*) FROM tb_mahasiswa WHERE jenis='Testing')
)
AS hasil";
$row = $mysqli->query($query)->fetch_array();
echo "Jumlah Akurasi $i = ".$row[0];
echo "<hr>";

}

function All($mysqli,$kelas){
	$query="SELECT(
	(SELECT COUNT(*)FROM tb_mahasiswa WHERE jenis='Training' AND kelas='$kelas')
	/
	(SELECT COUNT(*)FROM tb_mahasiswa WHERE jenis='Training'))
	AS hasil";
	$row = $mysqli->query($query)->fetch_array();
	return $row[0];

}

function variabel($mysqli,$kelas,$x,$value){
	$query="SELECT(
	(SELECT COUNT(*)FROM tb_mahasiswa WHERE jenis='Training' AND kelas='$kelas' and $x='$value')
	/
	(SELECT COUNT(*)FROM tb_mahasiswa WHERE jenis='Training' AND kelas='$kelas'))
	AS hasil";
	$row = $mysqli->query($query)->fetch_array();
	return $row[0];
}
?>