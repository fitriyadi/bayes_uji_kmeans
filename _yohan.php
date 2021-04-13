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
	$p[3]=All($mysqli,"L3");
	$p[4]=All($mysqli,"L4");

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
		$kriteria[3]=1;
		$kriteria[4]=1;

		//jk,jurusan,ip1,ip2,ip3,ip4,ipk

		$kriteria[1]*=variabel($mysqli,'L1','jk',$data['jk']);
		$kriteria[1]*=variabel($mysqli,'L1','jurusan',$data['jurusan']);

		$kriteria[2]*=variabel($mysqli,'L2','jk',$data['jk']);
		$kriteria[2]*=variabel($mysqli,'L2','jurusan',$data['jurusan']);

		$kriteria[3]*=variabel($mysqli,'L3','jk',$data['jk']);
		$kriteria[3]*=variabel($mysqli,'L3','jurusan',$data['jurusan']);

		$kriteria[4]*=variabel($mysqli,'L4','jk',$data['jk']);
		$kriteria[4]*=variabel($mysqli,'L4','jurusan',$data['jurusan']);


		$fungsi_1 = fungsi_hitung($data['ip1'],$N_1);
		$fungsi_2 = fungsi_hitung($data['ip2'],$N_2);
		$fungsi_3 = fungsi_hitung($data['ip3'],$N_3);
		$fungsi_4 = fungsi_hitung($data['ip4'],$N_4);
		$fungsi_ipk= fungsi_hitung($data['ipk'],$N_ipk);


		$kriteria[1]=$kriteria[1]*$p[1];
		$kriteria[1]*=$fungsi_1[0];
		$kriteria[1]*=$fungsi_2[0];
		$kriteria[1]*=$fungsi_3[0];
		$kriteria[1]*=$fungsi_4[0];
		$kriteria[1]*=$fungsi_ipk[0];

		$kriteria[2]=$kriteria[2]*$p[2];
		$kriteria[2]*=$fungsi_1[1];
		$kriteria[2]*=$fungsi_2[1];
		$kriteria[2]*=$fungsi_3[1];
		$kriteria[2]*=$fungsi_4[1];
		$kriteria[2]*=$fungsi_ipk[1];

		$kriteria[3]=$kriteria[3]*$p[3];
		$kriteria[3]*=$fungsi_1[2];
		$kriteria[3]*=$fungsi_2[2];
		$kriteria[3]*=$fungsi_3[2];
		$kriteria[3]*=$fungsi_4[2];
		$kriteria[3]*=$fungsi_ipk[2];

		$kriteria[4]=$kriteria[4]*$p[4];
		$kriteria[4]*=$fungsi_1[3];
		$kriteria[4]*=$fungsi_2[3];
		$kriteria[4]*=$fungsi_3[3];
		$kriteria[4]*=$fungsi_4[3];
		$kriteria[4]*=$fungsi_ipk[3];

		

		if($kriteria[1]>$kriteria[2] && $kriteria[1]>$kriteria[3] && $kriteria[1]>$kriteria[4]){
			$target='L1';

		}else if ($kriteria[2]>$kriteria[1] && $kriteria[2]>$kriteria[3] && $kriteria[2]>$kriteria[4]){
			$target='L2';

		}else if ($kriteria[3]>$kriteria[2] && $kriteria[3]>$kriteria[1] && $kriteria[3]>$kriteria[4]){
			$target='L3';

		}else{
			$target='L4';

		}

		$id=$data['iddata'];
		mysqli_query($mysqli,"update tb_mahasiswa set target='$target' where iddata='$id'");
	}	

//Hitung Akurasi //
	$tp=caridata($mysqli,"select count(*) from tb_mahasiswa where jenis='Testing' and kelas='L1' and target='L1'");
	$fp=caridata($mysqli,"select count(*) from tb_mahasiswa where jenis='Testing' and kelas='L2' and target='L2'");
	$fn=caridata($mysqli,"select count(*) from tb_mahasiswa where jenis='Testing' and kelas='L3' and target='L3'");
	$tn=caridata($mysqli,"select count(*) from tb_mahasiswa where jenis='Testing' and kelas='L4' and target='L4'");

	echo "<br>TP + TN : ".$tp."+".$tn; 
	echo "<br> TP + TN  + Fp + FN : ".$tp."+".$tn."+".$fp."+".$fn;

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