<?php

require_once("config.php");

if(empty($_POST)) {
http_response_code(403);
die($language['forbidden']);
}

date_default_timezone_set($language['timezone']);

$suankizaman = date('d.m.Y H:i:s');

function gelen_sms($aboneno, $sifre) {
$xml_data ='<?xml version=\'1.0\' encoding=\'UTF-8\'?>
<increport aboneno="' . $aboneno . '" pwd="' . $sifre . '"/>';
 
$URL = "https://smsgw.mutlucell.com/smsgw-ws/gtincmngapi";
 
                 $ch = curl_init($URL);
                 curl_setopt($ch, CURLOPT_MUTE, 1);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                 curl_setopt($ch, CURLOPT_POST, 1);
                 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
                 curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                 $output = curl_exec($ch);
                 curl_close($ch);
return $output;
}

$sonuc = gelen_sms($aboneno, $sifre);

$listeler = explode("\n", $sonuc);

if($sonuc == "20" || $sonuc == "23" || $sonuc == "30") {

if($sonuc == "20") {
# echo "#20, Post edilen xml eksik veya hatalı.";

echo '<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>'.$language["error_code"].'</th>
                    <th class="text-center">'.$language["error_description"].'</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>'.$language["error_code_20"].'</td>
                        <td>'.$language["error_description_20"].'</td>
                    </tr>
            </tbody>
        </table>
    </div>';

}

if($sonuc == "23") {
# echo "#23, Abone no ya da parolanız hatalı.";

echo '<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>'.$language["error_code"].'</th>
                    <th class="text-center">'.$language["error_description"].'</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>'.$language["error_code_23"].'</td>
                        <td>'.$language["error_description_23"].'</td>
                    </tr>
            </tbody>
        </table>
    </div>';
}

if($sonuc == "30") {
# echo "#30, Hesap Aktivasyonu sağlanmamış.";

echo '<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>'.$language["error_code"].'</th>
                    <th class="text-center">'.$language["error_description"].'</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>'.$language["error_code_30"].'</td>
                        <td>'.$language["error_description_30"].'</td>
                    </tr>
            </tbody>
        </table>
    </div>';
}

} else {
# echo "Mesajların sorgulanma zamanı: " . $suankizaman . "<br />";

echo '<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>'.$language["messages_query_time"].'</th>
                </tr>
            </thead>
            <tbody>
                    <tr class="info">
                        <td>' . $suankizaman . '</td>
                    </tr>
            </tbody>
        </table>
    </div>';

echo '		<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>'.$language["time"].'</th>
                    <th>'.$language["sender"].'</th>
                    <th>'.$language["message"].'</th>
                </tr>
            </thead>
            <tbody>';
                    foreach($listeler as $liste) {
echo "<tr>";

$listeogeleri = explode("\t", $liste);

foreach($listeogeleri as $oge) {
echo "                        <td>" . $oge . "</td>";
}

echo "                    </tr>";
}
echo '            </tbody>
        </table>
    </div>';
}

?>