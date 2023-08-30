<?php 
header('Content-Type: application/json');

error_reporting(0);

$plaka = $_GET['plaka'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ccis.cordisnetwork.com/CWC/bridgeDebt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPGET, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; Android 11; Redmi Note 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Mobile Safari/537.36");
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "query=plakatabtoplamborc&PlateNumber=$plaka&IsTotalDebtQuery=1&Hash=99331");

$resp = curl_exec($ch);
$resp = preg_replace('/lang="tr"[\s\S]+?td style="height:5px;"/', '', $resp);
$resp = str_replace("</html>", "verxnqwe", $resp);
$resp = preg_replace('/tbody[\s\S]+?verxnqwe/', '', $resp);
$resp = str_replace('<html ></td>', "basla", $resp);
$resp = preg_replace('/basla[\s\S]+?style="height:5px;"/', '', $resp);
$resp = str_replace('></td>
                    </tr>', "basladık", $resp);
$resp = str_replace('<td style="height:5px;"basladık
                </', "", $resp);
$resp = str_replace('basladık', "", $resp);
$resp = str_replace('<!DOCTYPE html>', "", $resp);
$resp = str_replace("<tr class='printtr'>", "", $resp);
$resp = str_replace('<tr>', "", $resp);
$resp = str_replace('</tr>', "", $resp);

$resp = str_replace('> <', ">-<", $resp);
$resp = str_replace('><', ">-<", $resp);
preg_match_all('@<td class="textStyle" >(.*?)</td>@', $resp, $resp);

$plaka = $plaka;
$borcturu = $resp[1][0];
$isimsoyisim = $resp[1][7];
$tc = $resp[1][8];
$buro = $resp[1][9];
$burotel = $resp[1][10];
$ceza = $resp[1][5];
$toplamceza = $resp[1][11];


$result = array(
    array(
        "owner" => "verxn", 
        "data" => array(
            "plaka" => $plaka,
            "borcturu" => $borcturu,
            "adsoyad" => $isimsoyisim,
            "tc" => $tc,
            "buro" => $buro,
            "burotelefon" => $burotel,
            "yazilanceza" => $ceza,
            "toplamceza" => $toplamceza
        )
    )
);
echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
