<?php
require_once 'koneksi.php';
$max=caridata($mysqli,"select max(duration) from tb_transformasi");


$sql="select * from tb_transformasi";
$result=$mysqli->query($sql);
$x=0;
while ($data=mysqli_fetch_assoc($result)) {
	extract($data);
	$n=$duration/$max;
	mysqli_query($mysqli,"update tb_transformasi set n_duration='$n' where id='$id'");
}

?>