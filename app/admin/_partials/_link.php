<?php

function _edit($link){
	echo "<a href='$link' class='btn btn-secondary btn-sm'>Edit</a>";
}

function _hapus($link){ ?>
	 <a class="btn btn-danger btn-sm" href="<?=$link?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
<?php }




?>