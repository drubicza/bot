<?php
function bucin()
{
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,"http://222.124.10.204/kata.php");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"GET");

    $headers   = array();
    $headers[] = "Connection: keep-alive";
    $headers[] = "Cache-Control: max-age=0";
    $headers[] = "Upgrade-Insecure-Requests: 1";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36";
    $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
    $headers[] = "Accept-Encoding: gzip, deflate, br";

    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    $bcin = curl_exec($ch);
    return $bcin;
}

function regis($cref)
{
    $get      = file_get_contents("https://api.randomuser.me");
    $j        = json_decode($get,true);
    $getName  = $j["results"][0]["name"]["first"];
    $getName2 = $j["results"][0]["name"]["last"];
    $emails   = $getName.$getName2."@gmail.com";
    $rand1    = rand(0,99999);
    $body     = "mac_time=e446da".$rand1."R&fullName=".$getName." ".$getName2."&tel=noTel&emailSign=".$emails."&passwordSign=Qwerty123@&";
    $reff     = "passwordLogIn=Qwerty123@&code_share_referal=".$cref."&emailLogIn=".$emails."&";
    $ch       = curl_init();

    curl_setopt($ch,CURLOPT_URL,"https://cash-4u.com//admin/app/regester.php?value=Adam");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$body);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_ENCODING,"gzip");

    $h   = array();
    $h[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
    $h[] = "User-Agent: Dalvik/2.1.0 (Linux; U; Android 6.0.1; Redmi 4A MIUI/V8.5.7.0.MCCMIED)";

    curl_setopt($ch,CURLOPT_HTTPHEADER,$h);

    $result = curl_exec($ch);

    curl_setopt($ch,CURLOPT_URL,"https://cash-4u.com//admin/app/send_referal.php?value=cash4u");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$reff);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_ENCODING,"gzip");

    $h   = array();
    $h[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
    $h[] = "User-Agent: Dalvik/2.1.0 (Linux; U; Android 6.0.1; Redmi 4A MIUI/V8.5.7.0.MCCMIED)";

    curl_setopt($ch,CURLOPT_HTTPHEADER,$h);
    $res = curl_exec($ch);
    return $res;
}

$bcin = bucin();
sleep(2);
echo "\x1b[1;36m[#INFO]\x1b[0m : Create by Charles Giovanni\n";
sleep(3);
echo "\x1b[1;36m[#INFO]\x1b[0m : Bot Invite Cash-4U\n";
sleep(4);
echo "\x1b[1;36m[#INFO]\x1b[0m : Made with \x1b[1;31m ❤ ❤ ❤ ❤ ❤ ❤\x1b[0m\n";
sleep(3);
echo"\033[1;36m[#QUOTE] \033[0m: \033[1;33m $bcin \033[0m\r\n";
echo "\n";
sleep(5);

echo "Reff : ";
$cref = trim(fgets(STDIN));

echo "Jumlah : ";
$jum = trim(fgets(STDIN));

echo "Delay : ";
$delay = trim(fgets(STDIN));

for($a = 0; $a < $jum; $a++) {
    sleep($delay);
    $reslt = regis($cref,$a,$delay);
    echo "".$reslt."\n";
}
?>
