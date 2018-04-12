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
echo $B."\nVersion : 0.5                        ".$R."+";
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
    	echo $R . "=========================== Cvar1984 ))=====(@)>" . $X . "\n";
    	die($Y."Writed To --> result.txt".$X."\n");
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
    }	else {
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
            $write  = "true";
        } else {
            $header = $R . $header . $G;
        }
        echo "Url    : " . $Y . $url . $G . "\n";
        echo "Header : " . $header . "\n";
    }
    echo $R . "=========================== Cvar1984 ))=====(@)>" . $X . "\n";
    if(!($write == "" OR $write != "true")) { //NOR
        echo $Y . "Maybe This Is Posible --> result.txt" . $X . "\n";
    }
} else {
    echo $Y . "--admin,  -a\tSearch Admin Pages\n";
    echo "--upload, -u\tSearch Upload Pages\n";
    echo "--cms,    -c\tCMS Scan\n";
    echo "--domain, -d\tSubdomain Scan\n";
    echo "--update, -U\tUpdate Wordlist\n\n";
    echo "Example : " . $GG . "php spyder.php http://example.com --admin" . $X . "\n";
}