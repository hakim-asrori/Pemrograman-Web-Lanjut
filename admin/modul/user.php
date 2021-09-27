<?php 
switch($_GET['act']) {
	default:
	echo '<h2>User</h2>
	<form method=post action="?module=user&act=tambahuser">
	<input type="submit" value="Tambah User">
	</form>
	<table>
	<tr>
	<th>No</th><th>Username</th><th>Password</th><th>Aksi</th>
	</tr>';
	$tampil = $koneksi->query("SELECT * FROM admin ORDER BY id_user");
	$no=1;
	while ($r=$tampil->fetch_assoc()) { 
		echo "<tr><td>$no</td>
		<td>$r[id_user]</td>
		<td>$r[password]</td>
		<td><a href=?module=user&act=edituser&id=$r[id_user]>Edit</a> |
		<a href=\"aksi.php?module=user&act=hapus&id=$r[id_user]\" onClick=\"return confirm('apakah anda benar akan menghapus user $r[id_user]?')\">Hapus</a>
		</td></tr>";
		$no++;
	}
	echo "</table>"; 
	break;

	case 'tambahuser':
	echo "<h2>Tambah User</h2>
	<form method='post' action='aksi.php?module=user&act=input'>
	<table>
	<tr><td>Username</td>

	<td> : <input type='text' name='id_user'></td></tr>
	<tr><td>Password</td>
	<td> : <input type='password' name='password'></td></tr>
	<tr><td colspan='2'><input type='submit' value='Simpan'>
	<input type='button' value='Batal' onclick='self.history.back()'>
	</td></tr>
	</table> </form>"; 
	break;

	case 'edituser':
	$edit=$koneksi->query("SELECT * FROM admin WHERE id_user='$_GET[id]'");
	$r=$edit->fetch_assoc(); 
	echo "<h2>Edit User</h2>
	<form method=post action='aksi.php?module=user&act=update'>
	<input type=hidden name=id value='$r[id_user]'>
	<table>
	<tr><td>Username</td>
	<td> : <input type=text name=id_user value='$r[id_user]'></td>
	</tr>
	<tr><td>Password</td>
	<td> : <input type=password name=password> *) </td></tr>
	<tr><td colspan=2><input type=submit value=Update>
	<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>"; 
	break;
}
?>
