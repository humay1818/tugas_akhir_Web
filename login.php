<?php 
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$op = $_GET['op'];

if($op == "in"){

	$query_l="SELECT * from register where username = '$username' AND password = '$password'";
	$h_l = $conn ->query($query_l);
	
	if(mysqli_num_rows($h_l)==1){
		$d_l = $h_l ->fetch_array();

		$_SESSION['username'] = $d_l['username'];
		$_SESSION['password'] = $d_l['password'];

	$level = $_POST['level'];

		if($d_l['level']=="user"){
			header("location:home-siswa.php");
			
		}elseif ($d_l['level']=="admin") {
			header("location:home-admin.php");
			
		}

	}else{
?>
    <script language="JavaScript">
        alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
        document.location='login.php';
    </script>
<?php
    }

}else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['password']);
	unset($_SESSION['level']);
}
?>

 <?php 
setcookie($username, time() + (86400 * 30), "/"); 
 ?>