<?php
require_once 'excel_reader2.php';
require_once 'koneksi.php';

$name="german.xls";
$data = new Spreadsheet_Excel_Reader($name);
$baris=$data->rowcount();


 mysqli_query($mysqli,"truncate table tb_master");


for($i=1;$i<=$baris;$i++){
    $master = explode(" ",$data->val($i,1));

    $par="(";
    foreach ($master as $key => $value) {
        $par=$par."'".$value."',";
    }
     $par=$par.")";
    
    $par=str_replace(",)",")",$par);

    $sql="INSERT INTO tb_master(var0,var1,var2,var3,var4,var5,var6,var7,var8,var9,var10,var11,var12,var13,var14,var15,var16,var17,var18,var19,kelas) values $par";

    //mysqli_query($mysqli,$sql);

}


// function insertkata($mysqli,$nama,$jk,$umur,$bb,$tb,$kelas_bb_u,$kelas_tb_u,$kelas_bb_tb){
//     $stmt = $mysqli->prepare("INSERT INTO tb_master_data(nama,jk,umur,bb,tb,kelas_bb_u,kelas_tb_u,kelas_bb_tb) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssssss",
//         mysqli_real_escape_string($mysqli, $nama),
//         mysqli_real_escape_string($mysqli, $jk),  
//         mysqli_real_escape_string($mysqli, $umur),
//         mysqli_real_escape_string($mysqli, $bb),
//         mysqli_real_escape_string($mysqli, $tb),  
//         mysqli_real_escape_string($mysqli, $kelas_bb_u),
//         mysqli_real_escape_string($mysqli, $kelas_tb_u),
//         mysqli_real_escape_string($mysqli, $kelas_bb_tb));
//     $stmt->execute();
// }
?>
