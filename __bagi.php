<?php
require_once 'koneksi.php';
$jumlahdata=1000;
$fold=10;
$pembagian=ceil($jumlahdata/$fold);

for ($i=0;$i<$fold;$i++) { 
	echo "<br>Iterasi Ke ".($i+1)."<br>";
	$nilaiawal=(($i*$pembagian)+1);
	$nilaiakhir=(($i+1)*$pembagian);
	if($nilaiakhir>=$jumlahdata)
		$nilaiakhir=$jumlahdata;

	echo "".$nilaiawal." - ".$nilaiakhir;
}
?>

<!-- Iterasi Ke 1
1 - 334

335 - 668

669 - 1000 -->

<!-- Iterasi Ke 1
1 - 250
251 - 500
501 - 750
751 - 1000  -->

<!-- Iterasi Ke 1
1 - 200
201 - 400
401 - 600
601 - 800
801 - 1000  -->

<!-- Iterasi Ke 1
1 - 167
168 - 334
335 - 501
502 - 668
669 - 835
836 - 1000  -->

<!-- Iterasi Ke 1
1 - 143
144 - 286
287 - 429
430 - 572
573 - 715
716 - 858
859 - 1000  -->

<!-- Iterasi Ke 1
1 - 125
126 - 250
251 - 375
376 - 500
501 - 625
626 - 750
751 - 875
876 - 1000  -->

<!-- Iterasi Ke 1
1 - 125
126 - 250
251 - 375
376 - 500
501 - 625
626 - 750
751 - 875
876 - 1000  -->

<!-- Iterasi Ke 1
1 - 112
113 - 224
225 - 336
337 - 448
449 - 560
561 - 672
673 - 784
785 - 896
897 - 1000  -->

<!-- Iterasi Ke 1
1 - 100
101 - 200
201 - 300
301 - 400
401 - 500
501 - 600
601 - 700
701 - 800
801 - 900
901 - 1000 -->