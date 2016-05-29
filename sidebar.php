			<?php if ($_SESSION[id_admin] != ''){ ?>
				<a href='index.php?page=kelolaberanda'><button class='button'>Kelola Beranda</button></a>
				<a href='index.php?page=kelolatentangkami'><button class='button'>Kelola Tentang Kami</button></a>
				<a href='index.php?page=kelolaberita'><button class='button'>Kelola Berita</button></a>
				<a href='index.php?page=kelolapendonor'><button class='button'>Kelola Data Pendonor</button></a>
				<a href='index.php?page=kelolacalonpendonor'><button class='button'>Kelola Calon Pendonor</button></a>
				<a href='index.php?page=kelolastok'><button class='button'>Kelola Data Stok Darah</button></a>
				<a href='index.php?page=kelolapesanmasuk'><button class='button'>Kelola Pesan Masuk</button></a>
				<a href='logout.php'><button class='button'>Logout</button></a>
			<?php }else{ 

				if ($_SESSION[id_user] != ''){
					if ($_SESSION[status]=='aktif'){
						echo "<center><br><span style='color:green'>Selamat! <b>$_SESSION[nama_lengkap]</b></span><br>
							  Setelah Melihat Profile anda, Maka Anda Telah Disetujui Untuk Menjadi Pendonor,..</center>";
					}else{
						echo "<center><br><span style='color:red'>Maaf, <b>$_SESSION[nama_lengkap]</b></span><br>
							  Setelah Melihat Profile anda, Maka Anda Belum Disetujui Untuk Menjadi Pendonor,..</center>";
					}
				}
			?>
			<h2 class='author'>Data Pendonor Terbaru</h2>
					<?php
						echo "<table width=89% border=1 style='margin:10px 20px 0px 20px'>
								<tr bgcolor=ed1b24>
									<th>No</th>
									<th>Nama Lengkap</th>
									<th>Jumlah</th>
								</tr>";
								$query = mysql_query("SELECT b.nama_lengkap, a.jumlah 
														FROM `stok_darah` a JOIN user_donor b ON a.id_user_donor=b.id_user_donor 
															ORDER by a.id_stok_darah DESC LIMIT 10");
								$no = 1;
								while ($r = mysql_fetch_array($query)){
									echo "<tr>
											<td>$no</td>
											<td>$r[nama_lengkap]</td>
											<td>$r[jumlah] Liter</td>
										  </tr>";
									$no++;
								}
							  echo "</table>";
			}
			?>
<br><br>