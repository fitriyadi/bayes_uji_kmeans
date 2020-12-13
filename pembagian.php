<?php
require_once 'koneksi.php';
//2 Sampai dengan 10//
$cross="10";


//Pembagian Cross Vold
$sql="select * from tb_transformasi";
$result=$mysqli->query($sql);
$x=1;
while ($data=mysqli_fetch_assoc($result)) {
	if($x==$cross){
		perubahan($mysqli,$data['id'],"Testing");
		$x=1;
	}else{
		perubahan($mysqli,$data['id'],"Training");
		$x+=1;
	}
}	

function perubahan($mysqli,$id,$jenis){
	mysqli_query($mysqli,"update tb_master set jenis='$jenis' where id='$id'");
}
?>