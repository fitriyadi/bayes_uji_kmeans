<?php
require_once 'koneksi.php';
//2 Sampai dengan 10//
$cross="10";

echo "Pembagian $cross";

//Pembagian Cross Vold
$sql="select * from tb_transformasi";
$result=$mysqli->query($sql);
$x=1;
$status='naik';

while ($data=mysqli_fetch_assoc($result)) {
	if($x==$cross){
		perubahan($mysqli,$data['id'],"Testing");
		$x=1;
	}else{
		perubahan($mysqli,$data['id'],"Training");
		$x+=1;
	}
}	

// mysqli_query($mysqli,"update tb_master set jenis='Training'");

// for ($i=0;$i<=100; $i++) { 
// 	mysqli_query($mysqli,"update tb_master set jenis='Testing' where id='$i'");
// }

function perubahan($mysqli,$id,$jenis){
	mysqli_query($mysqli,"update tb_master set jenis='$jenis' where id='$id'");
}
?>

Cross