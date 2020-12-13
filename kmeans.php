<?php
require_once 'koneksi.php';
$jumlahcluster='3';
$variabel='age';


//for ($jumlahcluster=2;$jumlahcluster<10;$jumlahcluster++) { 

$min=caridata($mysqli,"select min($variabel) from tb_transformasi");
$max=caridata($mysqli,"select max($variabel) from tb_transformasi");

for ($i=1;$i<=1000;$i++) { 
	$clusterawal[$i]="C0";
}

for ($i=1;$i<=$jumlahcluster; $i++) { 
	$cluster[$i]=$min+((($i-1)*($max-$min))/($jumlahcluster))+(($max-$min)/(2*$jumlahcluster));
}

//batas($cluster);

$status="false";//Awal Belum Ketemu
$loop=0;
while($status=='false') {
	$sql="select * from tb_transformasi";
	$result=$mysqli->query($sql);
	$x=0;
	while ($data=mysqli_fetch_assoc($result)) {
		extract($data);

	//Operasi
		for ($i=1;$i<=$jumlahcluster;$i++) { 
			$hasilc[$i]=sqrt(pow($age-$cluster[$i],2));
		}

	//Perhitungan Nilai Terkecil
		//batas($hasilc);
		$hasil=array_search(min($hasilc), $hasilc);
		//echo $hasil;
		$clusterakhir[$x+=1]=$hasil;

	//Simpan Satu Satu
		mysqli_query($mysqli,"UPDATE tb_transformasi SET c_$variabel='C$hasil' where id='$id'");

	}

	//CLuster Baru
	$loop+=1;
	for ($i=1;$i<=$jumlahcluster; $i++) {
		$cluster[$i]=caridata($mysqli,"select avg($variabel) from tb_transformasi where c_$variabel='C$i'");
	}

	$status='true';


	for ($i=1;$i<=1000; $i++) { 
		if($clusterawal[$i]!=$clusterakhir[$i]){
			$status='false'; //Jika  Masih Ada Yang belum sama, maka akan diulang,
		}
	}

//Jika Belum Ketemu Maka Hasil CLuster Akhir Dijadikan Nilai Awal.
	if($status=='false'){
		$clusterawal=$clusterakhir;
	}

	//echo $loop.' => '.batas($cluster);


	//Simpan Ke Centroid Akhir
	mysqli_query($mysqli,"delete from tb_centroid where number='$jumlahcluster'");

	foreach ($cluster as $key => $value) {
		$centro="C".$key;
	//echo "INSERT INTO tb_centroid(number,centro,value) values($loop,$centro,$value)";
		mysqli_query($mysqli,"INSERT INTO tb_centroid(number,centro,value) values('$jumlahcluster','$centro','$value')");
	}

	if ($loop==100){
		exit;
		echo "Batas maksimal 100";
	}

}

echo caridata($mysqli,"SELECT FORMAT(SUM((VALUE-$variabel)*(VALUE-$variabel)),4) FROM tb_transformasi JOIN tb_centroid ON centro=c_$variabel where number='$jumlahcluster'");
echo "<br>";
//}

function batas($cluster){
	echo "<hr>";
	echo "<pre>";
	print_r($cluster);
	echo "</pre>";
	echo "<hr>";
}



// $nilai = Array(2,4,1,12,20,14,45,62,56,12,16,17,16,34,32,31,10);  

// echo max($nilai).' Ada pada indeks : ';
// echo array_search(max($nilai), $nilai);
?>