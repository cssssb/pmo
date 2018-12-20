<?php
defined('IN_LION') or exit('No permission resources.');
$corpid = 'ding33c0349684398ce235c2f4657eb6378f';
$corpsecret = 'm6Pk3bGwq3BdwEwEvMgwt-0O5194aSR0kNG0zEcIhcNlDyHbjdXzqra-VbrT2xIk';
$url = "https://oapi.dingtalk.com/gettoken?corpid=" . $corpid . "&corpsecret=" . $corpsecret;
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
if ($data === false) {
    return "CURL Error:" . curl_error($ch);
}
return json_decode($data, true)["access_token"];
