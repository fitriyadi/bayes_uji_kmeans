<?php
$credit=$_POST['credit'];
$duration=$_POST['duration'];
$age=$_POST['age'];
$t_credit=array('1890','5742','11695');
$t_duration=array('12','27','46','60');
$t_age=array('27','40','59');

function  transformasi($centroid,$data){
	$selisih=99999;
	$cluster='0';
	for ($i=0;$i<count($centroid);$i++) { 
		if(abs($centroid[$i]-$data)<$selisih){
			$cluster=$i;
			$selisih=abs($centroid[$i]-$data);
		}
	}
	return ($cluster+1);
}
?>