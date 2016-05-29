<?php 
	if (isset($_POST[submit])){
		$sekarang = date("Y-m-d");
		$pass = md5($_POST[pass]);
		mysql_query("INSERT INTO user_donor (username,
											 password,
											 nama_lengkap, 
											 tempat_lahir, 
											 tanggal_lahir, 
											 no_telpon, 
											 alamat_lengkap, 
											 berat_badan, 
											 id_golongan_darah, 
											 riwayat_penyakit,
											 waktu)
									 VALUES ('$_POST[user]',
									 		 '$pass',
									 		 '$_POST[a]',
									 		 '$_POST[b]',
									 		 '$_POST[c]',
									 		 '$_POST[d]',
									 		 '$_POST[e]',
									 		 '$_POST[f]',
									 		 '$_POST[g]',
									 		 '$_POST[h]',
									 		 '$sekarang')");
		echo "<script>window.alert('Sukses Terdaftar Sebagai Calon Pendonor.');
				window.location='index.php?page=calonpendonor'</script>";
	}
?>

<article>
	<h1>Form Pendaftaran</h1>
	<p>Silahkan mengisi form dibawah ini untuk menjadi pendonor : </p> 
	<form action='' method='POST'>
	<table width="100%">
		<tr>
			<td>Username</td> 	<td><input type='text' name='user' required></td>
		</tr>
		<tr>
			<td>Password</td> 	<td><input type='text' name='pass' required></td>
		</tr>
		<tr>
			<td width=120px>Nama Lengkap</td> 	<td><input type='text' name='a' style='width:55%' required></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td> 	<td><input type='text' name='b' style='width:65%' required></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td> 	<td><input type='date' name='c' required></td>
		</tr>
		<tr>
			<td>No Telpon</td> 		<td><input type='text' name='d' required></td>
		</tr>
		<tr>
			<td>Alamat Lengkap</td> <td><textarea name='e' style='width:100%; height:40px' required></textarea></td>
		</tr>
		<tr>
			<td>Berat Badan</td> 	<td><input type='text' name='f' required></td>
		</tr>
		<tr>
			<td>Gol. Darah</td> 	<td><select name='g'>
											<option value='0' selected>- Pilih Golongan Darah -</option>
											<?php 
												$query = mysql_query("SELECT * FROM golongan_darah");
												while ($g = mysql_fetch_array($query)){
													echo "<option value='$g[id_golongan_darah]'>Golongan darah $g[nama_golongan_darah]</option>";
												}
											?>
										</select></td>
		</tr>
		<tr>
			<td>Riwayat Penyakit</td> <td><textarea style='width:100%; height:80px' name='h' required></textarea></td>
		</tr>
		<tr>
			<td></td> <td><input type="submit" name='submit' value='Kirimkan'></td>
		</tr>
	</table>
	</form>
</article>
<br><br>
