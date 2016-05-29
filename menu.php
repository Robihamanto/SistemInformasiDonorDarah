				<ul>
					<li><a href="index.php">Beranda</a></li>
					<li><a href="index.php?page=tentangkami">Tentang Kami</a></li>
					<li><a href="index.php?page=berita">Berita</a></li>
					<?php if ($_SESSION[id_user] == ''){ ?>
						<li><a href="index.php?page=pendaftaran">Form Pendaftaran</a></li>
					<?php } ?>

					<?php if ($_SESSION[id_user] != '' OR $_SESSION[id_admin]!=''){ ?>
						<li><a href="#">Data Pendonor <span class="caret"></span></a>
							<div>
								<ul>
									<li><a href="index.php?page=pendonor">Pendonor </a></li>
									<li><a href="index.php?page=calonpendonor">Colon Pendonor</a></li>
									<li><a href="index.php?page=stok">Stok Darah</a></li>
								</ul>
							</div>
						</li>
					<?php } ?>

					<li><a href="index.php?page=hubungikami">Hubungi Kami</a></li>

					<?php if ($_SESSION[id_user] != ''){ 
						echo "<li><a href='#'>Welcome! <b style='color:black'>$_SESSION[nama_lengkap]</b></a>
								<div>
									<ul>
										<li><a href='logout.php'>Logout</a></li>
									</ul>
								</div>
							  </li>"; ?>
					<?php } ?>

					<?php if ($_SESSION[id_admin]=='' AND $_SESSION[id_user]==''){ ?>
						<li><a href="index.php?page=login">Login</a></li>
					<?php } ?>
				</ul>
