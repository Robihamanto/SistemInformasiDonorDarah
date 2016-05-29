<?php 
	if (isset($_POST[login])){
		$userlogin = $_POST[user];
		$passlgoin = md5($_POST[pass]);
		$login = mysql_query("SELECT * FROM user_donor 
					where username='$userlogin' AND password='$passlgoin'");
		$cek = mysql_num_rows($login);
		$r = mysql_fetch_assoc($login);
		if ($cek >= 1){
			$_SESSION[id_user] 	= $r[id_user_donor];
			$_SESSION[nama_lengkap] = $r[nama_lengkap];
			$_SESSION[status] = $r[status_user];
				echo "<script>window.alert('Anda Sukses Login.');
					window.location='index.php'</script>";
		}else{
				echo "<script>window.alert('Maaf, Login anda Gagal !!!.');
					window.location='index.php?page=login'</script>";
		}
	}
?>

			<article>
				<h1>Form Login Members</h1>
				<form  action='' method='POST'>
					<center><table style='width:299px; margin:10% 0 10% 0; background:#e3e3e3; padding:30px; border:1px solid #cecece'>
						<tr>
							<td>Username</td> <td> <input type='text' name='user'></td>
						</tr>
						<tr>
							<td>Password</td> <td> <input type='password' name='pass'></td>
						</tr>
						<tr>
							<td colspan='2'><input style='float:right' type='submit' value='Login' name='login'></td>
						</tr>
					</table></center>
				</form>
			</article>