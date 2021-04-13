<?php
require_once 'koneksi.php';

$cros="2";
$x=1;
$z=0;
$status='naik';
for ($i=1;$i<=1000;$i+=$cros) { 
	for($j=$i;$j<=($i+$cros-1);$j++){
		if(($i+$z)==$j){
			//Testing
			//echo "<b>(".($i+$z).")</b>";
			perubahan($mysqli,$i+$z,"Testing");
			$x+=1;
		}else{
			//Training
			//echo $j;
			perubahan($mysqli,$j,"Training");
		}
		
	}

	if($status=='naik'){
		$z+=1;
	}else{
		$z+=1;
	}

	if($z==$cros){
		$status='turun';
		$z-=2;

	}else if($z==0){
		$status='naik';
		//$z+=1;
	}

	//echo "<br>";

}

echo "Pembagian dengan Cross $cros";

function perubahan($mysqli,$id,$jenis){
	mysqli_query($mysqli,"update tb_master set jenis='$jenis' where id='$id'");
}
?>