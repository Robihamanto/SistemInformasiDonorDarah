<?php 
	if ($_GET[page]=='kelolaberanda'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='1'"));
		echo "<article>
				<h1>Kelola Beranda</h1>
				<form action='index.php?page=aksihalaman' method='POST'>
				<table width=100%>
					<input type='hidden' name='id' value='$r[id_halaman]'>
					<tr><td><input name='a' type='text' style='width:70%' value='$r[judul]'></td></tr>
					<tr><td><textarea style='width:100%; height:250px' name='b'>$r[isi]</textarea></td></tr>
					<tr><td><input type='submit' value='Update Beranda'></td></tr>
				</table>
				</form>
			  </article>";
	}elseif ($_GET[page]=='kelolatentangkami'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		$r = mysql_fetch_array(mysql_query("SELECT * FROM halaman where id_halaman='2'"));
		echo "<article>
				<h1>Kelola Tentang Kami</h1>
				<form action='index.php?page=aksihalaman' method='POST'>
				<table width=100%>
					<input type='hidden' name='id' value='$r[id_halaman]'>
					<tr><td><input name='a' type='text' style='width:70%' value='$r[judul]'></td></tr>
					<tr><td><textarea style='width:100%; height:250px' name='b'>$r[isi]</textarea></td></tr>
					<tr><td><input type='submit' value='Update Data'></td></tr>
				</table>
				</form>
			  </article>";
	}elseif ($_GET[page]=='aksihalaman'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		mysql_query("UPDATE halaman SET judul = '$_POST[a]',
										isi   = '$_POST[b]' where id_halaman='$_POST[id]'");
		if ($_POST[id]=='1'){
			echo "<script>window.alert('Sukses Update Data Halaman Beranda.');
					window.location='index.php?page=kelolaberanda'</script>";
		}else{
			echo "<script>window.alert('Sukses Update Data Halaman Tentang Kami.');
					window.location='index.php?page=kelolatentangkami'</script>";
		}

	}elseif ($_GET[page]=='kelolapendonor'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		echo "<article>
			  <h1>Semua Data Pendonor (Telah Disetujui)</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Berat</th>
			  		<th>Umur</th>
			  		<th>Gol. Darah</th>
			  		<th></th>
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
							<td align=center>
								<a href='index.php?page=kelolapendonor&aksi=aktif&id=$r[id_user_donor]'>Nonaktifkan</a> | 
								<a href='index.php?page=kelolapendonor&delete=$r[id_user_donor]'>Hapus</a>
							</td>
					  </tr>";
				$no++;
			}

			if ($_GET[aksi]=='aktif'){
				if ($_SESSION[id_admin]==''){
					header('Location: index.php');
				}
				mysql_query("UPDATE user_donor SET status_user='nonaktif' where id_user_donor='$_GET[id]'");
				echo "<script>window.alert('Sukses Nonaktifkan User Donor Terpilih.');
						window.location='index.php?page=kelolapendonor'</script>";
			}

			if ($_GET[delete]!=''){
				if ($_SESSION[id_admin]==''){
					header('Location: index.php');
				}
				mysql_query("DELETE user_donor where id_user_donor='$_GET[id]'");
				echo "<script>window.alert('Sukses Hapus User Donor Terpilih.');
						window.location='index.php?page=kelolapendonor'</script>";
			}
		echo "</table></article>";

		}elseif ($_GET[page]=='caripendonor'){
			if ($_SESSION[id_admin]==''){
				header('Location: index.php');
			}
		echo "<article>
			  <h1>Semua Data Pendonor (Telah Disetujui)</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Berat</th>
			  		<th>Umur</th>
			  		<th>Gol. Darah</th>
			  		<th></th>
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
							<td align=center>
								<a href='index.php?page=updatestok&id=$r[id_user_donor]'>Pilih</a>
							</td>
					  </tr>";
				$no++;
			}
		echo "</table></article>";

	}elseif ($_GET[page]=='kelolacalonpendonor'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		echo "<article>
			<h1>Semua Data Calon Pendonor (Belum Disetujui)</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Berat</th>
			  		<th>Umur</th>
			  		<th>Gol. Darah</th>
			  		<th></th>
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
							<td align=center>
								<a href='index.php?page=kelolacalonpendonor&aksi=aktif&id=$r[id_user_donor]'>Aktifkan</a> | 
								<a href='index.php?page=kelolacalonpendonor&delete=$r[id_user_donor]'>Hapus</a>
							</td>
					  </tr>";
				$no++;
			}

			if ($_GET[aksi]=='aktif'){
				if ($_SESSION[id_admin]==''){
					header('Location: index.php');
				}
				mysql_query("UPDATE user_donor SET status_user='aktif' where id_user_donor='$_GET[id]'");
				echo "<script>window.alert('Sukses Aktifkan User Donor Terpilih.');
						window.location='index.php?page=kelolacalonpendonor'</script>";
			}

			if ($_GET[delete]!=''){
				if ($_SESSION[id_admin]==''){
					header('Location: index.php');
				}
				mysql_query("DELETE user_donor where id_user_donor='$_GET[id]'");
				echo "<script>window.alert('Sukses Hapus User Donor Terpilih.');
						window.location='index.php?page=kelolacalonpendonor'</script>";
			}
		echo "</table></article>";

	}elseif ($_GET[page]=='kelolastok'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		echo "<article>
				<h1>Semua Data Stok Darah Masuk dan Keluar</h1>
				<a href='index.php?page=updatestok'>Tambahkan Data Baru</a>
				<a style='float:right' href='index.php?page=stok'>Lihat Semua Stok</a>
				<table width=100% border=1>
					<tr bgcolor=cf0b0b>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Umur</th>
						<th>Gol. Darah</th>
						<th>Jumlah</th>
						<th>Status</th>
					</tr>";
			$query = mysql_query("SELECT a.status, b.nama_lengkap, a.jumlah, b.tanggal_lahir, c.nama_golongan_darah 
						FROM `stok_darah` a JOIN user_donor b ON a.id_user_donor=b.id_user_donor 
							JOIN golongan_darah c ON b.id_golongan_darah=c.id_golongan_darah
								ORDER by a.id_stok_darah DESC LIMIT 10");
			$no = 1;
			while ($r = mysql_fetch_array($query)){
				if ($r[status]=='masuk'){
					$status = 'green';
				}else{
					$status = 'red';
				}
				echo "<tr>
						<td>$no</td>
						<td>$r[nama_lengkap]</td>
						<td>".umur($r[tanggal_lahir])."</td>
						<td align=center>$r[nama_golongan_darah]</td>
						<td>$r[jumlah] Liter</td>
						<td style='color:$status; text-transform:capitalize'>$r[status]</td>
					 </tr>";
				$no++;
			}
			echo "</table>";

	}elseif ($_GET[page]=='updatestok'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		include "input_stok.php";

	}elseif ($_GET[page]=='kelolapesanmasuk'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		echo "<article>
			<h1>Semua Pesan masuk</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Nama Lengkap</th>
			  		<th>Isi Pesan</th>
			  		<th>Aksi</th>
			  	</tr>";
			$no = 1;
			$query = mysql_query("SELECT * FROM hubungi_kami ORDER BY id_hubungi_kami");
			while ($r = mysql_fetch_array($query)){
				echo "<tr>
							<td valign=top>$no</td>
							<td width='140px' align=center valign=top>$r[nama_lengkap]</td>
							<td>$r[isi_pesan]</td>
							<td valign=top><a href='index.php?page=kelolapesanmasuk&id=$r[id_hubungi_kami]'>Hapus</a></td>
					  </tr>";
				$no++;
			}
		echo "</table></article>";

		if ($_GET[id]!=''){
			if ($_SESSION[id_admin]==''){
				header('Location: index.php');
			}
			mysql_query("DELETE FROM hubungi_kami where id_hubungi_kami='$_GET[id]'");
			echo "<script>window.alert('Sukses Hapus Pesan terpilih.');
					window.location='index.php?page=kelolapesanmasuk'</script>";
		}

	}elseif ($_GET[page]=='kelolaberita'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		echo "<article>
			<h1>Semua Daftar Informasi/Berita</h1>
			  <table width=100% border=1>
			  	<tr bgcolor=cf0b0b>
			  		<th>No</th>
			  		<th>Judul Info</th>
			  		<th>tanggal</th>
			  		<th></th>
			  	</tr>";
			$no = 1;
			$query = mysql_query("SELECT * FROM informasi ORDER BY id_informasi DESC");
			while ($r = mysql_fetch_array($query)){
				echo "<tr>
							<td valign=top>$no</td>
							<td valign=top>$r[judul]</td>
							<td width='140px' >$r[tanggal]</td>
							<td valign=top><a href='index.php?page=kelolaberita&id=$r[id_informasi]'>Delete</a></td>
					  </tr>";
				$no++;
			}
		echo "</table>
		<a href='index.php?page=tambahberita'>Tambah Berita</a>
		</article>";

		if ($_GET[id]!=''){
			if ($_SESSION[id_admin]==''){
				header('Location: index.php');
			}
			mysql_query("DELETE FROM informasi where id_informasi='$_GET[id]'");
			echo "<script>window.alert('Sukses Hapus Berita Terpilih.');
					window.location='index.php?page=kelolaberita'</script>";
		}

	}elseif ($_GET[page]=='tambahberita'){
		if ($_SESSION[id_admin]==''){
			header('Location: index.php');
		}
		echo "<article>
				<h1>Tambah Berita</h1>
				<form action='index.php?page=tambahberita' method='POST'>
				<table width=100%>
					<tr><td><input name='a' type='text' style='width:70%'></td></tr>
					<tr><td><textarea style='width:100%; height:250px' name='b'></textarea></td></tr>
					<tr><td><input type='submit' name='tambah' value='Tambahkan'></td></tr>
				</table>
				</form>
			  </article>";

		if (isset($_POST[tambah])){
			if ($_SESSION[id_admin]==''){
				header('Location: index.php');
			}
			$tanggal_sekarang = date("Y-m-d H:i:s");
			mysql_query("INSERT INTO informasi (id_admin, judul, isi, tanggal) VALUES ('$_SESSION[id_admin]','$_POST[a]','$_POST[b]','$tanggal_sekarang')");
			echo "<script>window.alert('Sukses Tambah Berita Baru.');
					window.location='index.php?page=kelolaberita'</script>";
		}
	}
?>
