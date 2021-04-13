<?php

function fungsi_hitung($variabel,$mean){
	$phi=pi();
	$etha=" 2.7183";
	for ($i=0;$i<4;$i++) {
		if ($mean[$i][2]>0){
			$pembagi=1/((sqrt(2*$phi))*$mean[$i][2]);
			$hmean=pow(($variabel-$mean[$i][1]),2);
			$hdeviasi=2*(pow($mean[$i][2],2));
			$pemangkat=-1*($hmean/$hdeviasi);
			$hasil=$pembagi*(pow($etha,$pemangkat));
			$hasilakhir[$i]=$hasil;
		}else{
			$hasilakhir[$i]=0;
		}
	}

	return $hasilakhir; 
}

function cari_mean_deviasi($mysqli,$kriteria,$kelas){
	$tabel="tb_mahasiswa";
	$kolomjenis="jenis";
	$nilaikolom="Training";

	$query = "SELECT $kelas AS KODE,AVG($kriteria) AS mean,
	sqrt(((SELECT COUNT(*) FROM $tabel WHERE $kelas=KODE and $kolomjenis='$nilaikolom')
	*SUM($kriteria*$kriteria)-(SUM($kriteria)*SUM($kriteria)))/(
	(SELECT COUNT(*) FROM $tabel WHERE $kelas=KODE and $kolomjenis='$nilaikolom')
	*
	((SELECT COUNT(*) FROM $tabel WHERE $kelas=KODE and $kolomjenis='$nilaikolom')-1))) AS deviasi
	FROM $tabel where $kolomjenis='$nilaikolom'
	GROUP BY $kelas";

	$result = $mysqli->query($query);
	$num_results = $result->num_rows;
	$i=0;
	if($num_results > 0){ 
		while($row = $result->fetch_assoc() ){
			extract($row); 
			$hasil[$i][0]=$KODE;
			$hasil[$i][1]=$mean;
			$hasil[$i][2]=$deviasi;
			$i+=1;
		}
	}
	return $hasil;
}	


// Contoh Implementasi
// Mean Deviasi
// $N_bb=cari_mean_deviasi($mysqli,"bb",$kelas);
// $N_tb=cari_mean_deviasi($mysqli,"tb",$kelas);


//Loop
// $fungsi_bb = fungsi_hitung($bb,$N_bb); -> Nilai Age, Duration, Value
// Akhir Loop
?>