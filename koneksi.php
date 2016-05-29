<?php 
	$server     = 'localhost';
	$username   = 'root';
	$password   = '';
	$database   = 'db_donor';
	
	mysql_connect($server, $username, $password) OR DIE ();
	mysql_select_db($database) OR DIE ();
	
function Umur($tgl){
	$hitunghari['awal'] = $tgl;
	$hitunghari['akhir'] = date('Y-m-d');
	$lahir=$hitunghari['awal'];
	$selisih = time()-strtotime ($lahir);
	$tahun = floor ($selisih / 31536000);
	$bulan = floor (($selisih % 31536000) / 2592000);
	foreach ($hitunghari as $key => $val){
		$hitunghari[$key] = strtotime ($val);
	}
	$hitunghari['selisih'] = $hitunghari['akhir'] - $hitunghari['awal'];
	$hitunghari['selisih'] = number_format ($hitunghari['selisih'] / 86400, 2) . 'hari';

	return $tahun.' Tahun';
}

?>
