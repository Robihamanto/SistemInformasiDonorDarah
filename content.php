<?php 
			//Beranda
	if ($_GET[page]==''){
		$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='1'"));
		echo "<article>
			  	<h1>$r[judul]</h1>
				<p >".nl2br($r[isi])."</p>
			  </article>";
			  //Tentang Kami
	}elseif ($_GET[page]=='tentangkami'){
		$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='2'"));
		echo "<article>
			  	<h1>$r[judul]</h1>
				<p >".nl2br($r[isi])."</p>
			  </article>";

			  //Berita
	}elseif ($_GET[page]=='berita'){
		$query = mysql_query("SELECT i.judul, i.isi, i.id_informasi, i.tanggal, ad.nama_lengkap
				FROM informasi i JOIN admin ad 
				WHERE i.id_admin = ad.id_admin 
				ORDER BY id_informasi DESC LIMIT 5");
		while ($r = mysql_fetch_array($query)){
			$isi_berita =(strip_tags($r[isi])); 
			$isi = substr($isi_berita,0,300); 
			$isi = substr($isi_berita,0,strrpos($isi," ")); 
		echo "<article>
			  	<h1>$r[judul]</h1>
			  	<i>Pada $r[tanggal] WIB</i>
			  	<b>Oleh $r[nama_lengkap]</b>
				<p >$isi,... <a href='index.php?page=detailberita&id=$r[id_informasi]'>Baca Selanjutnya</a></p> 
			  </article>";
		}
	}elseif ($_GET[page]=='detailberita'){
		$query = mysql_query("SELECT * FROM informasi WHERE id_informasi='$_GET[id]'");
		while ($r = mysql_fetch_array($query)){
		echo "<article>
			  	<h1>$r[judul]</h1>
			  	<i>Pada $r[tanggal] WIB</i>
			  	<b>Oleh Administrator</b>
				<p >".nl2br($r[isi])."</p> 
			  </article>";
			  $queryk = mysqL_query("SELECT k.komentar, k.time, us.nama_lengkap
			  						FROM komentar k JOIN user_donor us
			  						WHERE k.id_informasi='$_GET[id]' AND us.id_user_donor = k.id_user_donor");
			  while ($r = mysql_fetch_array($queryk)) {
			  	?>
			  	<div class="komentar">
			  		<?php 
			  		echo "<i>Pada .$r[time]</i>
			  		 	  <b>$r[nama_lengkap]<br></b>
			  		 	  <p>Komentar : </p>". $r[komentar]; ?>
			  	</div>
			  	<?php
			  }
			  if($_SESSION[id_user] != ''){
			  ?>
			  <div class="komen">	
				  <form action="" method="POST" accept-charset="utf-8">
				  		<textarea name="komentar" style='border-radius: 5px;margin-top: 10px;margin-bottom: 10px;width: 625px'></textarea>
				  		<input class="float-right" type="submit" name="komentar-submit" value="Komentar">
				  </form>
			  </div>
			  <?php }
			  if (isset($_POST['komentar-submit'])) {
			  	$tanggal_sekarang = date("Y-m-d H:i:s");
			  	mysql_query("INSERT INTO komentar (id_informasi, id_user_donor, komentar, `time`) 
			  		VALUES ('$_GET[id]', '$_SESSION[id_user]','$_POST[komentar]', '$tanggal_sekarang') ");
			  	header('location: ?page=detailberita&id='.$_GET[id].'');
			  }
		}
	}elseif ($_GET[page]=='pendaftaran'){
		include "form_pendaftaran.php";
		
	}elseif ($_GET[page]=='pendonor'){
		echo "<article>
			  <h1>Semua Data Pendonor (Telah Disetujui)</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Berat</th>
			  		<th>Umur</th>
			  		<th>Gol. Darah</th>
			  	</tr>";
			$no = 1;
			$query = mysql_query("SELECT * FROM user_donor a JOIN golongan_darah b 
									ON a.id_golongan_darah=b.id_golongan_darah where a.status_user='aktif'");
			while ($r = mysql_fetch_array($query)){
				echo "<tr>
							<td>$no</td>
							<td>$r[nama_lengkap]</td>
							<td>$r[berat_badan] Kg</td>
							<td>".Umur($r[tanggal_lahir])."</td>
							<td align=center>$r[nama_golongan_darah]</td>
					  </tr>";
				$no++;
			}
		echo "</table></article>";

	}elseif ($_GET[page]=='calonpendonor'){
		echo "<article>
			<h1>Semua Data Calon Pendonor (Belum Disetujui)</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Berat</th>
			  		<th>Umur</th>
			  		<th>Gol. Darah</th>
			  	</tr>";
			$no = 1;
			$query = mysql_query("SELECT * FROM user_donor a JOIN golongan_darah b 
									ON a.id_golongan_darah=b.id_golongan_darah where a.status_user='nonaktif'");
			while ($r = mysql_fetch_array($query)){
				echo "<tr>
							<td>$no</td>
							<td>$r[nama_lengkap]</td>
							<td>$r[berat_badan] Kg</td>
							<td>".Umur($r[tanggal_lahir])."</td>
							<td align=center>$r[nama_golongan_darah]</td>
					  </tr>";
				$no++;
			}
		echo "</table></article>";

	}elseif ($_GET[page]=='stok'){
		echo "<article>
			<h1>Semua Stok Darah</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Gol. Darah</th>
			  		<th>Keterangan</th>
			  		<th>Jumlah/Stok</th>
			  	</tr>";
			$no = 1;
			$query = mysql_query("SELECT * FROM golongan_darah ORDER BY id_golongan_darah");
			while ($r = mysql_fetch_array($query)){
				$s = mysql_fetch_array(mysqL_query("SELECT a.jumlah, a.status, c.nama_golongan_darah, sum(jumlah) as stok 
														FROM `stok_darah` a JOIN user_donor b ON a.id_user_donor=b.id_user_donor 
															JOIN golongan_darah c ON b.id_golongan_darah=c.id_golongan_darah 
																where a.status='masuk' AND c.id_golongan_darah='$r[id_golongan_darah]'"));
				$k = mysql_fetch_array(mysqL_query("SELECT a.jumlah, a.status, c.nama_golongan_darah, sum(jumlah) as stok 
														FROM `stok_darah` a JOIN user_donor b ON a.id_user_donor=b.id_user_donor 
															JOIN golongan_darah c ON b.id_golongan_darah=c.id_golongan_darah 
																where a.status='keluar' AND c.id_golongan_darah='$r[id_golongan_darah]'"));
				if ($s[stok]==''){ $stok = 0;}else{ $stok = $s[stok]; }
				if ($k[stok]==''){ $kstok = 0;}else{ $kstok = $k[stok]; }
				echo "<tr>
							<td>$no</td>
							<td align=center>$r[nama_golongan_darah]</td>
							<td>$r[keterangan]</td>
							<td align=center>".($stok-$kstok)." Liter</td>
					  </tr>";
				$no++;
			}
		echo "</table></article>";

	}elseif ($_GET[page]=='hubungikami'){
		include "hubungi_kami.php";

	}elseif ($_GET[page]=='login'){
		include "login.php";

	}elseif ($_GET[page]=='admin'){
		include "admin.php";
	}
?>
