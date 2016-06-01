<?php 
	if (isset($_POST[submit])){
		$tanggal_sekarang = date("Y-m-d");
		mysql_query("INSERT INTO stok_darah (id_user_donor, 
											 jumlah, 
											 status, 
											 tanggal)
									 VALUES ('$_POST[a]',
									 		 '$_POST[c]',
									 		 '$_POST[b]',
									 		 '$tanggal_sekarang')");

		echo "<script>window.alert('Sukses Tambah data Darah $_POST[b]...');
				window.location='index.php?page=kelolastok'</script>";
	}
	$r = mysql_fetch_array(mysql_query("SELECT * FROM user_donor a 
		JOIN golongan_darah b 
		ON a.id_golongan_darah=b.id_golongan_darah 
		WHERE a.id_user_donor='$_GET[id]'"));
?>

<article>
	<h1>Form Input Darah Keluar dan Masuk</h1>
	<form action='' method='POST'>
	<table width="100%">
		<tr><input name='a' type="hidden" value='<?php echo "$r[id_user_donor]"; ?>'>
			<td width=120px>Nama Lengkap</td> 	<td><input type='text' value='<?php echo "$r[nama_lengkap]"; ?>' style='width:70%; background:#e3e3e3; border:1px solid #cecece' readonly='on'>
				<button><a href='index.php?page=caripendonor'>Cari</a></button></td>
		</tr>
		<tr>
			<td>Gol. Darah</td> 	<td><input type='text' name='c' style='width:30%; background:#e3e3e3; border:1px solid #cecece' value='<?php echo "$r[nama_golongan_darah]"; ?>' required></td>
		</tr>
		<tr>
			<td>Status</td> <td><select name='b'>
										<option value='masuk'>- Pilih Status -</option>
										<option value='masuk'>Darah Masuk</option>
										<option value='keluar'>Darah Keluar</option>
							</select>
			</td>
		</tr>
		<tr>
			<td>Jumlah</td> 	<td><input type='text' name='c' style='width:40px' required> Liter</td>
		</tr>

		
		<tr>
			<td></td> <td><input style='margin-top:25px' type="submit" name='submit' value='Simpan Data'></td>
		</tr>
	</table>
	</form>
</article>
<br><br>
