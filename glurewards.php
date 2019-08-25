<?php
error_reporting(0);

function bucin()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://222.124.10.204/kata.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    $headers   = array ();
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko)   Chrome/69.0.3497.100 Safari/537.36';
    $headers[] = 'Accept: text/html,applicat    ion/xhtml+xml,application/xml;q=0.9,image/webp,image/a  png,*/*;q=0.8';
    $headers[] = 'Accept-Encoding: gzip, def    late, br';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $bcin = curl_exec($ch);
    return $bcin;
}

function signup($socks){
    $arr      = array("\r"," ");
    $url      = "http://gluwards.bitloads.com/api/v2/account.signUp.php";
    $h        = explode("\n",str_replace($arr,"","Content-Type: application/x-www-form-urlencoded; charset=UTF-8
    User-Agent: Dalvik/2.1.0 (Linux; U; Android 5.0.2; Redmi Note 2 MIUI/V8.1.2.0.LHMMIDI)
    Connection: Keep-Alive"));
    $get      = file_get_contents("https://api.randomuser.me");
    $j        = json_decode($get, true);
    $getName  = $j['results'][0]['name']['first'];
    $getName2 = $j['results'][0]['name']['last'];
    $rand     = rand(01234,99999);
    $email    = $getName2.$rand."@gmail.com";
    $pwd      = $getName.$rand."404";
    $body     = "email=$email&fullname=$getName%20$getName2&clientId=1&password=$pwd&username=$pwd&";

    return curl($url,$h,$body,$socks);
}

function curl($url,$h,$body,$socks=null)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
    curl_setopt($ch, CURLOPT_PROXY, $socks);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $x = curl_exec($ch); curl_close($ch);
    return json_decode($x,true);
}

function refer($reff,$socks)
{
    $arr  = array("\r"," ");
    $data = signup($socks);
    $aid  = $data['accountId'];
    $atok = $data['accessToken'];
    $user = $data['account'][0]['username'];
    $body = 'data={"clientId":"1","accountId":"'.$aid.'","accessToken":"'.$atok.'","user":"'.$user.'","name":"refer","value":"'.$reff.'","dev_name":"Redmi Note 2","dev_man":"Xiaomi","ver":"2.0","pckg":"com.gluwards.app"}&';
    $url  = "http://gluwards.bitloads.com/api/v2/account.Refer.php";
    $h    = explode("\n",str_replace($arr,"","Content-Type: application/x-www-form-urlencoded; charset=UTF-8
    User-Agent: Dalvik/2.1.0 (Linux; U; Android 5.0.2; Redmi Note 2 MIUI/V8.1.2.0.LHMMIDI)
    Connection: Keep-Alive"));

    return curl($url,$h,$body,$socks);
}

$bcin = bucin();
sleep(2);
echo "\033[1;36m[#INFO]\033[0m : Thanks to SGBTeam | Recode by Charles Giovanni\r\n";
sleep(3);
echo "\033[1;36m[#INFO]\033[0m : Bot Invite Refferal Gluwards\r\n";
sleep(4);
echo "\033[1;36m[#INFO]\033[0m : Made with \033[1;31m ❤ ❤ ❤ ❤ ❤ ❤\033[0m \r\n";
sleep(3);
echo "\033[1;33m[#QUOTE]: $bcin \033[0m\r\n";
echo "\r\n";

echo "SOCKS     ";
$file = trim(fgets(STDIN));

echo "REFF      ";
$ref   = trim(fgets(STDIN));
$socks = explode("\n",str_replace("\r","",file_get_contents($file))); $a=0;

while($a < count($socks)){
    $proxy  = $socks[$a];
    $submit = refer($ref,$proxy)['response_title'];
    echo "[$a] $submit\n";
    $a++;
}
?>
