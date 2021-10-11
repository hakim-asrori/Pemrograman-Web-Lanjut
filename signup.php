<?php 

function insertSecurityImage($inputname) {
	$refid = md5(rand());
	$insertstr = '<img src="securityimage.php?refid='.$refid.'" alt="Security Image" width="150"> <input type="hidden" name="'.$inputname.'" value="'.$refid.'">'; 
	echo($insertstr); 
} 

function checkSecurityImage($referenceid, $enteredvalue) {
	include_once 'include/koneksi.php';

	$referenceid = mysqli_real_escape_string($koneksi, $referenceid); 
	$enteredvalue = mysqli_real_escape_string($koneksi, $enteredvalue); 

	$tempQuery = $koneksi->query("SELECT id FROM security_images WHERE referenceid= '$referenceid' AND hiddentext = '$enteredvalue'");
	if ($tempQuery->num_rows != 0) { 
		return true; 
	} else { 
		return false; 
	} 
} 
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<title>Signup Demo</title> 
</head> 
<body> 
	<?php 
	if (isset($_POST["name"]) && isset($_POST["security_try"])) { 
		$security_refid = $_POST["security_refid"]; 
		$security_try = $_POST["security_try"]; 
		$checkSecurity = checkSecurityImage($security_refid, $security_try); 
		if ($checkSecurity) { 
			$validnot = "correct"; 
		} else { 
			$validnot = "incorrect"; 
		} 

		echo("<b>You entered this as the security text:</b><br>\n ".$security_try."<br>\n This is ".$validnot.".<br>\n -------------------------------<br><br>\n "); 
	} 
	?> 

	<form name="signupform" method="post" action="<?=$_SERVER["PHP_SELF"]?>">
		Please sign up for our website: <br><br> 
		Name: <input name="name" type="text" id="name"><br> 
		<?= insertSecurityImage("security_refid") ?><br> 
		Enter what you see: <input name="security_try" type="text" id="security_try" size="20" maxlength="10"> 
		(can't see? try reloading page) <br><br> 
		<input type="submit" name="Submit" value="Signup!"> 
	</form>
</body> 
</html>