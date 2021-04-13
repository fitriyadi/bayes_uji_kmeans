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

    mysqli_query($mysqli,$sql);
}
?>
