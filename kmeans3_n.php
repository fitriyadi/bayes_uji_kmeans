<?php
// n_credit + n_duration + n_age
require_once 'koneksi.php';
$jumlahcluster=$_GET['id'];
$cluster=array();

//for ($jumlahcluster=2;$jumlahcluster<10;$jumlahcluster++) { 
//$variabel='n_duration';

$min_n_credit=caridata($mysqli,"select min(n_credit) from tb_transformasi");
$max_n_credit=caridata($mysqli,"select max(n_credit) from tb_transformasi");

$min_n_duration=caridata($mysqli,"select min(n_duration) from tb_transformasi");
$max_n_duration=caridata($mysqli,"select max(n_duration) from tb_transformasi");

$min_n_age=caridata($mysqli,"select min(n_age) from tb_transformasi");
$max_n_age=caridata($mysqli,"select max(n_age) from tb_transformasi");


for ($i=1;$i<=1000;$i++) { 
	$clusterawal[$i]="C0";
}

for ($i=1;$i<=$jumlahcluster; $i++) { 
	$cluster[$i][0]=$min_n_credit+((($i-1)*($max_n_credit-$min_n_credit))/($jumlahcluster))+(($max_n_credit-$min_n_credit)/(2*$jumlahcluster));

	$cluster[$i][1]=$min_n_duration+((($i-1)*($max_n_duration-$min_n_duration))/($jumlahcluster))+(($max_n_duration-$min_n_duration)/(2*$jumlahcluster));

	$cluster[$i][2]=$min_n_age+((($i-1)*($max_n_age-$min_n_age))/($jumlahcluster))+(($max_n_age-$min_n_age)/(2*$jumlahcluster));
}

echo "Variabel : n_credit, n_duration, n_age";
echo "<br>Jumlah Cluster : ".$jumlahcluster;
batas($cluster);

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
			$hasilc[$i]=sqrt(pow($n_credit-$cluster[$i][0],2)+pow($n_duration-$cluster[$i][1],2)+pow($n_age-$cluster[$i][2],2));
		}

		//Perhitungan Nilai Terkecil
		//batas($hasilc);
		$hasil=array_search(min($hasilc), $hasilc);
		//echo $hasil;
		$clusterakhir[$x+=1]=$hasil;

	//Simpan Satu Satu
		mysqli_query($mysqli,"UPDATE tb_transformasi SET c_3variabel='C$hasil' where id='$id'");
	}

	//CLuster Baru
	$loop+=1;
	for ($i=1;$i<=$jumlahcluster; $i++) {
		$cluster[$i][0]=caridata($mysqli,"select avg(n_credit) from tb_transformasi where c_3variabel='C$i'");

		$cluster[$i][1]=caridata($mysqli,"select avg(n_duration) from tb_transformasi where c_3variabel='C$i'");

		$cluster[$i][2]=caridata($mysqli,"select avg(n_age) from tb_transformasi where c_3variabel='C$i'");
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

	echo $loop.' => '.batas($cluster);
	$sql="select c_3variabel,count(c_3variabel) as jumlah from tb_transformasi
	group by c_3variabel";

//echo $sql;
	$result=$mysqli->query($sql);
	$x=0;
	while ($data=mysqli_fetch_assoc($result)) {
		extract($data);
		echo $c_3variabel."->".$jumlah;
		echo "<br>";
	}

	if($status=='true'){
		echo "Centroid Akhir : <br>";
		echo $loop.' => '.batas($cluster);
	}

	//Simpan Ke Centroid Akhir
	mysqli_query($mysqli,"delete from tb_centro_new where number='$jumlahcluster'");

	foreach ($cluster as $key => $value) {
		$centro="C".$key;
	//echo "INSERT INTO tb_centroid(number,centro,value) values($loop,$centro,$value)";
		$x=$value['0'];
		$y=$value['1'];
		$z=$value['2'];
		mysqli_query($mysqli,"INSERT INTO tb_centro_new(number,centro,value_x,value_y,value_z) values('$jumlahcluster','$centro','$x','$y','$z')");

		// echo "INSERT INTO tb_centro_new(number,centro,value_x,value_y) values('$jumlahcluster','$centro',$value[0],$value[1])";
	}

	if ($loop==100){
		exit;
		echo "Batas maksimal 100";
	}

}

echo "Loop : ".$loop;
echo "<br>";
$x=caridata($mysqli,"SELECT SUM((value_x-n_credit)*(value_x-n_credit)) FROM tb_transformasi JOIN tb_centro_new ON centro=c_3variabel where number='$jumlahcluster'");

$y=caridata($mysqli,"SELECT SUM((value_y-n_duration)*(value_y-n_duration)) FROM tb_transformasi JOIN tb_centro_new ON centro=c_3variabel where number='$jumlahcluster'");

$z=caridata($mysqli,"SELECT SUM((value_z-n_age)*(value_z-n_age)) FROM tb_transformasi JOIN tb_centro_new ON centro=c_3variabel where number='$jumlahcluster'");

echo "<br>";
echo ($x+$y+$z);
echo "<br>";
//}

function batas($cluster){
	echo "<hr>";
	echo "<pre>";
	print_r($cluster);
	echo "</pre>";
	echo "<hr>";
}

// $sql="select c_$variabel,count(c_$variabel) as jumlah from tb_transformasi
// group by c_$variabel";
// //echo $sql;
// $result=$mysqli->query($sql);
// $x=0;
// while ($data=mysqli_fetch_assoc($result)) {
// 	extract($data);
// 	echo $c_n_duration."->".$jumlah;
// 	echo "<br>";
// }

?>