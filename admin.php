<?php
//BY MR REY AND MRCCROOT
//JANGAN RECODE BANGSAT PAKAI OTAK //NJENK BIAR LU TAU BETAPA //SUSAHNYANYA NJENG

print "   
	
 __  __ ____     ____  _______   __
|  \/  |  _ \   |  _ \| ____\ \ / /
| |\/| | |_) |  | |_) |  _|  \ V /
| |  | |  _ <   |  _ <| |___  | |
|_|  |_|_| \_\  |_| \_\_____| |_|


  __________________________
  | $ ADMIN FINDER         |
  | $ BY MR REY            |
  | $ BY MR CROOT          |
  |                        |
  |________________________|
     _____||_______||____                 
     |__________________|
     
     
 #________________________________#
 |  Admin Finder - by MR REY      |
 | mencari informasi login admin  |
 | jadilah Jahat Ketika Baikmu    |
 | Di Injak Injak                 |
 | GOBLOK V                       |
 |________________________________|                                
 |PERINGATAN                      |
 |1.GUNAKAN DENGAN BIJAK          |
 |2.JANGAN DI SALAHGUNAKAN        |
 |3.KALAU TERCYDUK MAMPUS V       |
 |4.AWOKAWOKAWOK                  |
 ##################################

  
";

echo "masukan situs  : ";
$target = trim(fgets(STDIN));
$list = "Rey.txt";
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
	$targetnya = "http://$target";
}else{
	$targetnya = $target;
}

$buka = fopen("$list","r");
$ukuran = filesize("$list");
$baca = fread($buka,$ukuran);
$lists = explode("\r\n",$baca);

foreach($lists as $login){
	$log = "$targetnya/$login";
	$ch = curl_init("$log");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode == 200){
		 $handle = fopen("result.txt", "a+");
		fwrite($handle, "$log\n");
		print "\n\n [".date('H:m:s')."] Mencoba : $log => Ditemukan\n";
	}else{
		print "\n[".date('H:m:s')."] Mencoba : $log => tidak di temukan";
	}
}
  
?>
