<?php 
	if (isset($_POST[submit])){
	  $sekarang = date("Y-m-d H:i:s");
	  mysql_query("INSERT INTO hubungi_kami (nama_lengkap, 
											 alamat_email,
											 isi_pesan,
											 tanggal_pesan)
									 VALUES ('$_POST[a]',
									 		 '$_POST[b]',
									 		 '$_POST[c]',
									 		 '$sekarang')");

		echo "<script>window.alert('Sukses Mengirimkan Pesan.');
				window.location='index.php?page=hubungikami'</script>";
	}
?>

<article>
	<h1>Hubungi Kami</h1>
	<p>Hubungi kami secara online melalui form dibawah ini </p> 
	<form action='' method='POST'>
	<table width="100%">
		<tr>
			<td width=120px>Nama Lengkap</td> 	<td><input type='text' name='a' required></td>
		</tr>
		<tr>
			<td>Alamat Email</td> 	<td><input type='email' name='b' required></td>
		</tr>
		<tr>
			<td>Isi Pesan</td> <td><textarea style='width:100%; height:80px' name='c' required></textarea></td>
		</tr>
		<tr>
			<td></td> <td><input type="submit" name='submit' value='Kirimkan Pesan'></td>
		</tr>
	</table>
	</form>
</article>
<br><br>