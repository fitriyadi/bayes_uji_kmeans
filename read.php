<?php
require_once 'koneksi.php';

$testfile = "german.txt";
$file = fopen($testfile,"r");
$filedata = fread($file,filesize($testfile));
fclose($file);

$datas=split("-",$filedata);

$x=-1;
foreach ($datas as $key => $value) {
	$x+=1;
	if ($x%20==0 && $x!=0){
		//echo substr($datas[$x],0,1);
		//echo "<hr>";
		//echo substr($datas[$x],3,3).'-';
	}else{
		//echo $datas[$x].'-';
	}

	// $n=$x+1;
	// if($n%22==0 || $x==1){
	// 	echo $datas[$x];
	// 	echo "<br>";
	// }
}

$par='';
for ($i=1;$i<20000;$i+=20) { 
	//echo $datas[$i].' - '.$datas[$i+3].' - '.$datas[$i+11];
	//echo "<br>";
	$duration=$datas[$i];
	$credit=$datas[$i+3];
	$age=$datas[$i+11];

	if($par=='')
		$par=$par."('$duration','$credit','$age')";
	else
		$par=$par.",('$duration','$credit','$age')";

}

$sql="INSERT INTO TB_TRANSFORMASI (duration,credit,age) values ";
$sql=$sql.$par;
//echo $sql;

//mysqli_query($mysqli,$sql);


?>