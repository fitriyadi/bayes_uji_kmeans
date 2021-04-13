<?php
require_once 'koneksi.php';
$jumlahdata=1000;
$fold=3;
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

	//echo "<pre>";
	//print_r($p);
	//echo "<pre>";

	$sql="SELECT * FROM v_data where jenis='Testing'";
	$result=$mysqli->query($sql);
	while ($data=mysqli_fetch_assoc($result)) {
	//extract($data);

		$kriteria[1]=1;
		$kriteria[2]=1;
		for ($xyz=0;$xyz<20;$xyz++) { 
			$variabel='var'.$xyz;

		//if($i!=1 or $i!=4 or $i!=12 or $i!=7 or $i!=10){
			$kriteria[1]*=variabel($mysqli,'1',$variabel,$data[$variabel]);
			$kriteria[2]*=variabel($mysqli,'2',$variabel,$data[$variabel]);

			//echo "Kriteria : ".$xyz."<br>";
			//echo variabel($mysqli,'1',$variabel,$data[$variabel]);
			//echo "<br>";
			//echo variabel($mysqli,'2',$variabel,$data[$variabel]);
			//echo "<hr>";
		//}
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

		//print_r($kriteria);
		//echo $target;
	}	


//Hitung Akurasi //
$tp=caridata($mysqli,"select count(*) from tb_master where jenis='Testing' and kelas='1' and target='1'");
$fp=caridata($mysqli,"select count(*) from tb_master where jenis='Testing' and kelas='1' and target='2'");
$fn=caridata($mysqli,"select count(*) from tb_master where jenis='Testing' and kelas='2' and target='1'");
$tn=caridata($mysqli,"select count(*) from tb_master where jenis='Testing' and kelas='2' and target='2'");

echo "<br>TP + TN : ".$tp."+".$tn; 
echo "<br> TP + TN  + Fp + FN : ".$tp."+".$tn."+".$fp."+".$fn;
	
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
	(SELECT COUNT(*)FROM v_data WHERE jenis='Training')
	)
	AS hasil";
	$row = $mysqli->query($query)->fetch_array();
	return $row[0];

}

function variabel($mysqli,$kelas,$x,$value){
	$query="SELECT(
	(SELECT COUNT(*)FROM v_data WHERE jenis='Training' AND kelas='$kelas' and $x='$value')
	/
	(SELECT COUNT(*)FROM v_data WHERE jenis='Training' AND kelas='$kelas')
	)
	AS hasil";
	$row = $mysqli->query($query)->fetch_array();
	return $row[0];
}
?>