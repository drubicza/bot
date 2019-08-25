<?php
function asw($reff)
{
    $uuid   = 'a8205250-d1bb-4845-87f3-8'.rand(00000000000,99999999999);
    $udid   = 'c956db25-32c5-365b-885b-aed'.rand(000000000,999999999);
    $rands  = rand(900,999);
    $rand   = rand(900000,999999);
    $iklan  = "channelId=67&episodeId=0&displayAdId=47&engagementId=43&videoTime=59$rands&eventCode=1540900$rand";
    $invite = "inviteCode=".$reff."";
    $body   = '--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="udid"
Content-Length: 36

'.$udid.'
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="deviceOS"
Content-Length: 7

android
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="deviceBrand"
Content-Length: 6

Xiaomi
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="deviceModel"
Content-Length: 8

Redmi 4X
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="appVersion"
Content-Length: 5

1.5.5
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="timeZone"
Content-Length: 2

+7
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="timeZoneName"
Content-Length: 12

Asia/Jakarta
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="osVersion"
Content-Length: 5

6.0.1
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="osLanguage"
Content-Length: 2

in
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="appLanguage"
Content-Length: 2

in
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="carrier"
Content-Length: 13

IND TELKOMSEL
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="carrierId"
Content-Length: 5

51010
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="screenWidth"
Content-Length: 4

1280
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="screenHeight"
Content-Length: 3

720
--394b9f6f-d402-482f-93f3-e2d3c91bf259
Content-Disposition: form-data; name="appLanguage"
Content-Length: 2

id
--394b9f6f-d402-482f-93f3-e2d3c91bf259--';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.watchoona.com/api/v1/register-device");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

    $headers   = array ();
    $headers[] = "uuid: ".$uuid."";
    $headers[] = "Content-Type: multipart/form-data; boundary=394b9f6f-d402-482f-93f3-e2d3c91bf259";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    curl_setopt($ch, CURLOPT_URL, "https://api.watchoona.com/api/v1/verify-invite-code");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $invite);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

    $headers   = array ();
    $headers[] = "uuid: ".$uuid."";
    $headers[] = "Content-Type: application/x-www-form-urlencoded";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    curl_setopt($ch, CURLOPT_URL, "https://api.watchoona.com/api/v1/analytics/event/display-ad-engagement");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $iklan);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

    $headers   = array ();
    $headers[] = "uuid: ".$uuid."";
    $headers[] = "Content-Type: application/x-www-form-urlencoded";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($ch);
    return $res;
}

echo "Refferal : ";
$reff = trim(fgets(STDIN));

echo "Delay : ";
$delay = trim(fgets(STDIN));

echo "Jumlah : ";
$jum = trim(fgets (STDIN));

for ($a = 0; $a < $jum; $a++) {
    sleep($delay);
    $oce = asw($reff,$a,$delay);
    //$bhh = $oce->status;
    echo "".$oce."\n";
}
?>
