<?php

function insertSecurityImage($inputname) {
	$refid = md5(rand());
	$insertstr = '<img src="captcha.php?refid='.$refid.'" alt="Security Image" width="150"> <input type="hidden" name="'.$inputname.'" value="'.$refid.'">'; 
	echo($insertstr); 
} 

function checkSecurityImage($referenceid, $enteredvalue) {
	include '../include/koneksi.php';

	$referenceid = mysqli_real_escape_string($koneksi, $referenceid); 
	$enteredvalue = mysqli_real_escape_string($koneksi, $enteredvalue); 

	$tempQuery = $koneksi->query("SELECT id FROM security_images WHERE referenceid= '$referenceid' AND hiddentext = '$enteredvalue'");
	if ($tempQuery->num_rows != 0) { 
		return true; 
	} else { 
		return false; 
	} 
}