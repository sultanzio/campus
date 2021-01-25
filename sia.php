<?php
/**************************************
 * Tools Males v1.2
 * Coded by ./SultanZio x Khatulistiwa
 * https://sultanzio.github.io/
 *-------------------------------------
 *
 * All About Verssion :
 * v1.0 new
 * v1.1 fix bug array kelas
 * v1.2 add handle multi kelas & theme output --> Latest Verssion
 *
 * My Facebook : https://fb.com/www.linux.org
 * Github      : https://github.com/sultanzio
 * Instagram   : @baguslindu_
***************************************/

$nik=$_POST['nik'];
$pass=$_POST['pass'];

// Curl Request
$loginsite = "https://sia.uty.ac.id";
$curllogin = curl_init();
curl_setopt($curllogin, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curllogin, CURLOPT_URL, $loginsite);
curl_setopt($curllogin, CURLOPT_POST, true);
curl_setopt($curllogin, CURLOPT_HTTPHEADER, [
    "X-Requested-With: XMLHttpRequest"
]);
curl_setopt($curllogin, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt(
    $curllogin,
    CURLOPT_POSTFIELDS,
    $datamasuk = array(
        'loginNipNim' => "$nik",
        'loginPsw' => "$pass",
        'mumet' => jumlah()
    )
);
curl_setopt($curllogin, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curllogin, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
$reqlogin = curl_exec($curllogin);
curl_close($curllogin);

//Bypass Login Sia
function jumlah()
{
    preg_match('#<p style="color:white">(.*?)</p>#', $reqlogin, $oke);
    $get0 = $oke[0][0];
    $get1 = $oke[0][1];
    //Array To Strings
    $int0 = (int) $get0;
    $int1 = (int) $get1;
    //Addition From Array
    $add = $int0 + $int1;
}
//Print Data
preg_match_all('/static\">(.*?)<\/p>/', $reqlogin, $res);

// Curl Request Kedua
$loginsite2 = "https://sia.uty.ac.id/std/kuesioner";
$curllogin2 = curl_init();
curl_setopt($curllogin2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curllogin2, CURLOPT_URL, $loginsite2);
curl_setopt($curllogin2, CURLOPT_HTTPHEADER, array(
    "X-Requested-With: XMLHttpRequest"
));
curl_setopt(
    $curllogin2,
    CURLOPT_USERAGENT,
    'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36'
);
curl_setopt($curllogin2, CURLOPT_HTTPGET, true);
curl_setopt($curllogin2, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($curllogin2, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curllogin2, CURLOPT_REFERER, "https://www.sia.uty.ac.id/std");
$reqlogin2 = curl_exec($curllogin2);
curl_close($curllogin2);

//Melakukan Parsing Kelas
preg_match_all('#<strong>[(](.*?)[)]</strong>(.*?)</a>#', $reqlogin2, $kelasMu);
$parseKls = $kelasMu;

//Melakukan Pengisian Request
preg_match_all(
    '#<a\shref="https://sia.uty.ac.id/std/kuesioner/(.*?)" class="list-group-item">\s<strong>[(](.*?)[)]</strong>(.*?)</a>#',
    $reqlogin2,
    $isiKls
);
//Waktu Asia
date_default_timezone_set('Asia/Jakarta');
$waktu = date("H:i:s");
$today = date("Y/m/d");

$pilihanIsi=$_POST['pilihan'];
switch ($pilihanIsi) {
    case 'random':
        //Multi Curl Request
        $caselogin0 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][0];
        $caselogin1 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][1];
        $caselogin2 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][2];
        $caselogin3 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][3];
        $caselogin4 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][4];
        $caselogin5 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin6 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin7 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][7];
        $caselogin8 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][8];
        $caselogin9 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][9];

        // set Options Curl
        // set Options Curl 1
        $curlcase0 = curl_init();
        curl_setopt($curlcase0, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase0, CURLOPT_URL, $caselogin0);
        curl_setopt($curlcase0, CURLOPT_POST, true);
        curl_setopt($curlcase0, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase0, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase0, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase0, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase0,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase0, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase0, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Set Options 2
        $curlcase1 = curl_init();
        curl_setopt($curlcase1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase1, CURLOPT_URL, $caselogin1);
        curl_setopt($curlcase1, CURLOPT_POST, true);
        curl_setopt($curlcase1, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase1, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase1, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase1, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase1,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase1, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 3
        $curlcase2 = curl_init();
        curl_setopt($curlcase2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase2, CURLOPT_URL, $caselogin2);
        curl_setopt($curlcase2, CURLOPT_POST, true);
        curl_setopt($curlcase2, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase2, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase2, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase2, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase2,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase2, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase2, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 4
        $curlcase3 = curl_init();
        curl_setopt($curlcase3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase3, CURLOPT_URL, $caselogin3);
        curl_setopt($curlcase3, CURLOPT_POST, true);
        curl_setopt($curlcase3, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase3, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase3, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase3, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase3,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase3, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase3, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 5
        $curlcase4 = curl_init();
        curl_setopt($curlcase4, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase4, CURLOPT_URL, $caselogin4);
        curl_setopt($curlcase4, CURLOPT_POST, true);
        curl_setopt($curlcase4, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase4, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase4, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase4, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase4,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase4, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase4, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 6
        $curlcase5 = curl_init();
        curl_setopt($curlcase5, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase5, CURLOPT_URL, $caselogin5);
        curl_setopt($curlcase5, CURLOPT_POST, true);
        curl_setopt($curlcase5, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase5, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase5, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase5, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase5,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase5, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase5, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 7
        $curlcase6 = curl_init();
        curl_setopt($curlcase6, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase6, CURLOPT_URL, $caselogin6);
        curl_setopt($curlcase6, CURLOPT_POST, true);
        curl_setopt($curlcase6, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase6, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase6, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase6, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase6,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase6, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase6, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 8
        $curlcase7 = curl_init();
        curl_setopt($curlcase7, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase7, CURLOPT_URL, $caselogin7);
        curl_setopt($curlcase7, CURLOPT_POST, true);
        curl_setopt($curlcase7, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase7, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase7, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase7, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase7,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase7, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase7, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 9
        $curlcase8 = curl_init();
        curl_setopt($curlcase8, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase8, CURLOPT_URL, $caselogin8);
        curl_setopt($curlcase8, CURLOPT_POST, true);
        curl_setopt($curlcase8, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase8, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase8, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase8, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase8,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase8, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase8, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
//Curl set 10
        $curlcase9 = curl_init();
        curl_setopt($curlcase9, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase9, CURLOPT_URL, $caselogin9);
        curl_setopt($curlcase9, CURLOPT_POST, true);
        curl_setopt($curlcase9, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase9, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase9, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase9, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase9,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => rand(1, 4),
                'jwb[2]' => rand(1, 4),
                'jwb[3]' => rand(1, 4),
                'jwb[4]' => rand(1, 4),
                'jwb[5]' => rand(1, 4),
                'jwb[6]' => rand(1, 4),
                'jwb[7]' => rand(1, 4),
                'jwb[8]' => rand(1, 4),
                'jwb[9]' => rand(1, 4),
                'jwb[10]' => rand(1, 4),
                'jwb[11]' => rand(1, 4),
                'jwb[19]' => rand(1, 4),
                'jwb[20]' => rand(1, 4),
                'jwb[21]' => rand(1, 4),
                'jwb[22]' => rand(1, 4),
                'jwb[23]' => rand(1, 4)
            )
        );
        curl_setopt($curlcase9, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase9, CURLOPT_REFERER, "https://www.sia.uty.ac.id");

        //Handle all curl
        $mh = curl_multi_init();

        //Add all curl
        curl_multi_add_handle($mh, $curlcase0);
        curl_multi_add_handle($mh, $curlcase1);
        curl_multi_add_handle($mh, $curlcase2);
        curl_multi_add_handle($mh, $curlcase3);
        curl_multi_add_handle($mh, $curlcase4);
        curl_multi_add_handle($mh, $curlcase5);
        curl_multi_add_handle($mh, $curlcase6);
        curl_multi_add_handle($mh, $curlcase7);
        curl_multi_add_handle($mh, $curlcase8);
        curl_multi_add_handle($mh, $curlcase9);
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                // Wait a short time for more activity
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);
        //Curl close
        curl_multi_remove_handle($mh, $curlcase0);
        curl_multi_remove_handle($mh, $curlcase1);
        curl_multi_remove_handle($mh, $curlcase2);
        curl_multi_remove_handle($mh, $curlcase3);
        curl_multi_remove_handle($mh, $curlcase4);
        curl_multi_remove_handle($mh, $curlcase5);
        curl_multi_remove_handle($mh, $curlcase6);
        curl_multi_remove_handle($mh, $curlcase7);
        curl_multi_remove_handle($mh, $curlcase8);
        curl_multi_remove_handle($mh, $curlcase9);
        curl_multi_close($mh);
        break;
    case 'only1':

//Multi Curl Request
        $caselogin0 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][0];
        $caselogin1 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][1];
        $caselogin2 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][2];
        $caselogin3 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][3];
        $caselogin4 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][4];
        $caselogin5 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin6 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin7 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][7];
        $caselogin8 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][8];
        $caselogin9 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][9];

        // set Options Curl
        // set Options Curl 1
        $curlcase0 = curl_init();
        curl_setopt($curlcase0, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase0, CURLOPT_URL, $caselogin0);
        curl_setopt($curlcase0, CURLOPT_POST, true);
        curl_setopt($curlcase0, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase0, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase0, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase0, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase0,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase0, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase0, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Set Options 2
        $curlcase1 = curl_init();
        curl_setopt($curlcase1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase1, CURLOPT_URL, $caselogin1);
        curl_setopt($curlcase1, CURLOPT_POST, true);
        curl_setopt($curlcase1, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase1, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase1, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase1, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase1,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase1, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 3
        $curlcase2 = curl_init();
        curl_setopt($curlcase2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase2, CURLOPT_URL, $caselogin2);
        curl_setopt($curlcase2, CURLOPT_POST, true);
        curl_setopt($curlcase2, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase2, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase2, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase2, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase2,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase2, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase2, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 4
        $curlcase3 = curl_init();
        curl_setopt($curlcase3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase3, CURLOPT_URL, $caselogin3);
        curl_setopt($curlcase3, CURLOPT_POST, true);
        curl_setopt($curlcase3, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase3, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase3, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase3, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase3,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase3, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase3, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 5
        $curlcase4 = curl_init();
        curl_setopt($curlcase4, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase4, CURLOPT_URL, $caselogin4);
        curl_setopt($curlcase4, CURLOPT_POST, true);
        curl_setopt($curlcase4, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase4, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase4, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase4, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase4,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase4, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase4, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 6
        $curlcase5 = curl_init();
        curl_setopt($curlcase5, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase5, CURLOPT_URL, $caselogin5);
        curl_setopt($curlcase5, CURLOPT_POST, true);
        curl_setopt($curlcase5, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase5, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase5, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase5, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase5,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase5, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase5, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 7
        $curlcase6 = curl_init();
        curl_setopt($curlcase6, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase6, CURLOPT_URL, $caselogin6);
        curl_setopt($curlcase6, CURLOPT_POST, true);
        curl_setopt($curlcase6, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase6, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase6, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase6, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase6,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase6, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase6, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 8
        $curlcase7 = curl_init();
        curl_setopt($curlcase7, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase7, CURLOPT_URL, $caselogin7);
        curl_setopt($curlcase7, CURLOPT_POST, true);
        curl_setopt($curlcase7, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase7, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase7, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase7, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase7,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase7, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase7, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 9
        $curlcase8 = curl_init();
        curl_setopt($curlcase8, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase8, CURLOPT_URL, $caselogin8);
        curl_setopt($curlcase8, CURLOPT_POST, true);
        curl_setopt($curlcase8, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase8, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase8, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase8, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase8,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase8, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase8, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        $curlcase0 = curl_init();
        //set option 10
        curl_setopt($curlcase9, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase9, CURLOPT_URL, $caselogin9);
        curl_setopt($curlcase9, CURLOPT_POST, true);
        curl_setopt($curlcase9, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase9, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase9, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase9, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase9,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 1,
                'jwb[2]' => 1,
                'jwb[3]' => 1,
                'jwb[4]' => 1,
                'jwb[5]' => 1,
                'jwb[6]' => 1,
                'jwb[7]' => 1,
                'jwb[8]' => 1,
                'jwb[9]' => 1,
                'jwb[10]' => 1,
                'jwb[11]' => 1,
                'jwb[19]' => 4,
                'jwb[20]' => 4,
                'jwb[21]' => 4,
                'jwb[22]' => 4,
                'jwb[23]' => 4
            )
        );
        curl_setopt($curlcase9, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase9, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Handle all curl
        $mh = curl_multi_init();

        //Add all curl
        curl_multi_add_handle($mh, $curlcase0);
        curl_multi_add_handle($mh, $curlcase1);
        curl_multi_add_handle($mh, $curlcase2);
        curl_multi_add_handle($mh, $curlcase3);
        curl_multi_add_handle($mh, $curlcase4);
        curl_multi_add_handle($mh, $curlcase5);
        curl_multi_add_handle($mh, $curlcase6);
        curl_multi_add_handle($mh, $curlcase7);
        curl_multi_add_handle($mh, $curlcase8);
        curl_multi_add_handle($mh, $curlcase9);
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                // Wait a short time for more activity
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);
        //Curl close
        curl_multi_remove_handle($mh, $curlcase0);
        curl_multi_remove_handle($mh, $curlcase1);
        curl_multi_remove_handle($mh, $curlcase2);
        curl_multi_remove_handle($mh, $curlcase3);
        curl_multi_remove_handle($mh, $curlcase4);
        curl_multi_remove_handle($mh, $curlcase5);
        curl_multi_remove_handle($mh, $curlcase6);
        curl_multi_remove_handle($mh, $curlcase7);
        curl_multi_remove_handle($mh, $curlcase8);
        curl_multi_remove_handle($mh, $curlcase9);
        curl_multi_close($mh);
        break;
        
    case 'only2':
//Multi Curl Request
        $caselogin0 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][0];
        $caselogin1 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][1];
        $caselogin2 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][2];
        $caselogin3 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][3];
        $caselogin4 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][4];
        $caselogin5 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin6 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin7 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][7];
        $caselogin8 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][8];
         $caselogin9 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][9];

        // set Options Curl
        // set Options Curl 1
        $curlcase0 = curl_init();
        curl_setopt($curlcase0, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase0, CURLOPT_URL, $caselogin0);
        curl_setopt($curlcase0, CURLOPT_POST, true);
        curl_setopt($curlcase0, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase0, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase0, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase0, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase0,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase0, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase0, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Set Options 2
        $curlcase1 = curl_init();
        curl_setopt($curlcase1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase1, CURLOPT_URL, $caselogin1);
        curl_setopt($curlcase1, CURLOPT_POST, true);
        curl_setopt($curlcase1, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase1, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase1, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase1, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase1,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase1, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 3
        $curlcase2 = curl_init();
        curl_setopt($curlcase2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase2, CURLOPT_URL, $caselogin2);
        curl_setopt($curlcase2, CURLOPT_POST, true);
        curl_setopt($curlcase2, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase2, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase2, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase2, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase2,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase2, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase2, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 4
        $curlcase3 = curl_init();
        curl_setopt($curlcase3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase3, CURLOPT_URL, $caselogin3);
        curl_setopt($curlcase3, CURLOPT_POST, true);
        curl_setopt($curlcase3, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase3, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase3, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase3, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase3,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase3, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase3, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 5
        $curlcase4 = curl_init();
        curl_setopt($curlcase4, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase4, CURLOPT_URL, $caselogin4);
        curl_setopt($curlcase4, CURLOPT_POST, true);
        curl_setopt($curlcase4, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase4, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase4, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase4, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase4,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase4, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase4, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 6
        $curlcase5 = curl_init();
        curl_setopt($curlcase5, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase5, CURLOPT_URL, $caselogin5);
        curl_setopt($curlcase5, CURLOPT_POST, true);
        curl_setopt($curlcase5, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase5, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase5, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase5, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase5,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase5, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase5, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 7
        $curlcase6 = curl_init();
        curl_setopt($curlcase6, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase6, CURLOPT_URL, $caselogin6);
        curl_setopt($curlcase6, CURLOPT_POST, true);
        curl_setopt($curlcase6, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase6, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase6, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase6, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase6,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase6, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase6, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 8
        $curlcase7 = curl_init();
        curl_setopt($curlcase7, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase7, CURLOPT_URL, $caselogin7);
        curl_setopt($curlcase7, CURLOPT_POST, true);
        curl_setopt($curlcase7, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase7, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase7, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase7, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase7,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase7, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase7, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 9
        $curlcase8 = curl_init();
        curl_setopt($curlcase8, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase8, CURLOPT_URL, $caselogin8);
        curl_setopt($curlcase8, CURLOPT_POST, true);
        curl_setopt($curlcase8, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase8, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase8, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase8, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase8,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase8, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase8, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 10
        $curlcase9 = curl_init();
        curl_setopt($curlcase9, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase9, CURLOPT_URL, $caselogin9);
        curl_setopt($curlcase9, CURLOPT_POST, true);
        curl_setopt($curlcase9, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase9, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase9, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase9, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase9,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 2,
                'jwb[2]' => 2,
                'jwb[3]' => 2,
                'jwb[4]' => 2,
                'jwb[5]' => 2,
                'jwb[6]' => 2,
                'jwb[7]' => 2,
                'jwb[8]' => 2,
                'jwb[9]' => 2,
                'jwb[10]' => 2,
                'jwb[11]' => 2,
                'jwb[19]' => 3,
                'jwb[20]' => 3,
                'jwb[21]' => 3,
                'jwb[22]' => 3,
                'jwb[23]' => 3
            )
        );
        curl_setopt($curlcase9, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase9, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Handle all curl
        $mh = curl_multi_init();

        //Add all curl
        curl_multi_add_handle($mh, $curlcase0);
        curl_multi_add_handle($mh, $curlcase1);
        curl_multi_add_handle($mh, $curlcase2);
        curl_multi_add_handle($mh, $curlcase3);
        curl_multi_add_handle($mh, $curlcase4);
        curl_multi_add_handle($mh, $curlcase5);
        curl_multi_add_handle($mh, $curlcase6);
        curl_multi_add_handle($mh, $curlcase7);
        curl_multi_add_handle($mh, $curlcase8);
        curl_multi_add_handle($mh, $curlcase9);
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                // Wait a short time for more activity
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);
        //Curl close
        curl_multi_remove_handle($mh, $curlcase0);
        curl_multi_remove_handle($mh, $curlcase1);
        curl_multi_remove_handle($mh, $curlcase2);
        curl_multi_remove_handle($mh, $curlcase3);
        curl_multi_remove_handle($mh, $curlcase4);
        curl_multi_remove_handle($mh, $curlcase5);
        curl_multi_remove_handle($mh, $curlcase6);
        curl_multi_remove_handle($mh, $curlcase7);
        curl_multi_remove_handle($mh, $curlcase8);
        curl_multi_remove_handle($mh, $curlcase9);
        curl_multi_close($mh);
        break;
        
    case 'only3':
//Multi Curl Request
        $caselogin0 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][0];
        $caselogin1 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][1];
        $caselogin2 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][2];
        $caselogin3 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][3];
        $caselogin4 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][4];
        $caselogin5 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin6 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin7 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][7];
        $caselogin8 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][8];
        $caselogin9 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][9];

        // set Options Curl
        // set Options Curl 1
        $curlcase0 = curl_init();
        curl_setopt($curlcase0, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase0, CURLOPT_URL, $caselogin0);
        curl_setopt($curlcase0, CURLOPT_POST, true);
        curl_setopt($curlcase0, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase0, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase0, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase0, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase0,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase0, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase0, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Set Options 2
        $curlcase1 = curl_init();
        curl_setopt($curlcase1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase1, CURLOPT_URL, $caselogin1);
        curl_setopt($curlcase1, CURLOPT_POST, true);
        curl_setopt($curlcase1, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase1, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase1, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase1, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase1,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase1, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 3
        $curlcase2 = curl_init();
        curl_setopt($curlcase2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase2, CURLOPT_URL, $caselogin2);
        curl_setopt($curlcase2, CURLOPT_POST, true);
        curl_setopt($curlcase2, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase2, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase2, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase2, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase2,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase2, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase2, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 4
        $curlcase3 = curl_init();
        curl_setopt($curlcase3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase3, CURLOPT_URL, $caselogin3);
        curl_setopt($curlcase3, CURLOPT_POST, true);
        curl_setopt($curlcase3, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase3, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase3, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase3, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase3,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase3, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase3, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 5
        $curlcase4 = curl_init();
        curl_setopt($curlcase4, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase4, CURLOPT_URL, $caselogin4);
        curl_setopt($curlcase4, CURLOPT_POST, true);
        curl_setopt($curlcase4, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase4, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase4, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase4, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase4,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase4, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase4, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 6
        $curlcase5 = curl_init();
        curl_setopt($curlcase5, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase5, CURLOPT_URL, $caselogin5);
        curl_setopt($curlcase5, CURLOPT_POST, true);
        curl_setopt($curlcase5, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase5, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase5, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase5, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase5,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase5, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase5, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 7
        $curlcase6 = curl_init();
        curl_setopt($curlcase6, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase6, CURLOPT_URL, $caselogin6);
        curl_setopt($curlcase6, CURLOPT_POST, true);
        curl_setopt($curlcase6, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase6, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase6, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase6, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase6,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase6, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase6, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 8
        $curlcase7 = curl_init();
        curl_setopt($curlcase7, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase7, CURLOPT_URL, $caselogin7);
        curl_setopt($curlcase7, CURLOPT_POST, true);
        curl_setopt($curlcase7, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase7, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase7, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase7, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase7,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase7, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase7, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 9
        $curlcase8 = curl_init();
        curl_setopt($curlcase8, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase8, CURLOPT_URL, $caselogin8);
        curl_setopt($curlcase8, CURLOPT_POST, true);
        curl_setopt($curlcase8, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase8, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase8, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase8, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase8,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase8, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase8, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 10
        $curlcase9 = curl_init();
        curl_setopt($curlcase9, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase9, CURLOPT_URL, $caselogin9);
        curl_setopt($curlcase9, CURLOPT_POST, true);
        curl_setopt($curlcase9, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase9, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase9, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase9, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase9,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 3,
                'jwb[2]' => 3,
                'jwb[3]' => 3,
                'jwb[4]' => 3,
                'jwb[5]' => 3,
                'jwb[6]' => 3,
                'jwb[7]' => 3,
                'jwb[8]' => 3,
                'jwb[9]' => 3,
                'jwb[10]' => 3,
                'jwb[11]' => 3,
                'jwb[19]' => 2,
                'jwb[20]' => 2,
                'jwb[21]' => 2,
                'jwb[22]' => 2,
                'jwb[23]' => 2
            )
        );
        curl_setopt($curlcase9, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase9, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Handle all curl
        $mh = curl_multi_init();

        //Add all curl
        curl_multi_add_handle($mh, $curlcase0);
        curl_multi_add_handle($mh, $curlcase1);
        curl_multi_add_handle($mh, $curlcase2);
        curl_multi_add_handle($mh, $curlcase3);
        curl_multi_add_handle($mh, $curlcase4);
        curl_multi_add_handle($mh, $curlcase5);
        curl_multi_add_handle($mh, $curlcase6);
        curl_multi_add_handle($mh, $curlcase7);
        curl_multi_add_handle($mh, $curlcase8);
        curl_multi_add_handle($mh, $curlcase9);
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                // Wait a short time for more activity
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);
        //Curl close
        curl_multi_remove_handle($mh, $curlcase0);
        curl_multi_remove_handle($mh, $curlcase1);
        curl_multi_remove_handle($mh, $curlcase2);
        curl_multi_remove_handle($mh, $curlcase3);
        curl_multi_remove_handle($mh, $curlcase4);
        curl_multi_remove_handle($mh, $curlcase5);
        curl_multi_remove_handle($mh, $curlcase6);
        curl_multi_remove_handle($mh, $curlcase7);
        curl_multi_remove_handle($mh, $curlcase8);
        curl_multi_remove_handle($mh, $curlcase9);
        curl_multi_close($mh);
        break;
        
    case 'only4':
//Multi Curl Request
        $caselogin0 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][0];
        $caselogin1 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][1];
        $caselogin2 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][2];
        $caselogin3 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][3];
        $caselogin4 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][4];
        $caselogin5 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin6 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][5];
        $caselogin7 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][7];
        $caselogin8 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][8];
        $caselogin9 = "https://sia.uty.ac.id/std/kuesionerin/" . $isiKls[1][9];

        // set Options Curl
        // set Options Curl 1
        $curlcase0 = curl_init();
        curl_setopt($curlcase0, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase0, CURLOPT_URL, $caselogin0);
        curl_setopt($curlcase0, CURLOPT_POST, true);
        curl_setopt($curlcase0, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase0, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase0, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase0, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase0,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase0, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase0, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Set Options 2
        $curlcase1 = curl_init();
        curl_setopt($curlcase1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase1, CURLOPT_URL, $caselogin1);
        curl_setopt($curlcase1, CURLOPT_POST, true);
        curl_setopt($curlcase1, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase1, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase1, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase1, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase1,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase1, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 3
        $curlcase2 = curl_init();
        curl_setopt($curlcase2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase2, CURLOPT_URL, $caselogin2);
        curl_setopt($curlcase2, CURLOPT_POST, true);
        curl_setopt($curlcase2, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase2, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase2, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase2, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase2,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase2, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase2, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 4
        $curlcase3 = curl_init();
        curl_setopt($curlcase3, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase3, CURLOPT_URL, $caselogin3);
        curl_setopt($curlcase3, CURLOPT_POST, true);
        curl_setopt($curlcase3, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase3, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase3, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase3, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase3,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase3, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase3, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 5
        $curlcase4 = curl_init();
        curl_setopt($curlcase4, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase4, CURLOPT_URL, $caselogin4);
        curl_setopt($curlcase4, CURLOPT_POST, true);
        curl_setopt($curlcase4, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase4, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase4, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase4, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase4,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase4, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase4, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 6
        $curlcase5 = curl_init();
        curl_setopt($curlcase5, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase5, CURLOPT_URL, $caselogin5);
        curl_setopt($curlcase5, CURLOPT_POST, true);
        curl_setopt($curlcase5, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase5, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase5, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase5, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase5,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase5, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase5, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 7
        $curlcase6 = curl_init();
        curl_setopt($curlcase6, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase6, CURLOPT_URL, $caselogin6);
        curl_setopt($curlcase6, CURLOPT_POST, true);
        curl_setopt($curlcase6, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase6, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase6, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase6, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase6,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase6, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase6, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 8
        $curlcase7 = curl_init();
        curl_setopt($curlcase7, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase7, CURLOPT_URL, $caselogin7);
        curl_setopt($curlcase7, CURLOPT_POST, true);
        curl_setopt($curlcase7, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase7, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase7, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase7, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase7,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase7, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase7, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 9
        $curlcase8 = curl_init();
        curl_setopt($curlcase8, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase8, CURLOPT_URL, $caselogin8);
        curl_setopt($curlcase8, CURLOPT_POST, true);
        curl_setopt($curlcase8, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase8, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase8, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase8, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase8,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase8, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase8, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        // set Options Curl 10
        $curlcase9 = curl_init();
        curl_setopt($curlcase9, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlcase9, CURLOPT_URL, $caselogin9);
        curl_setopt($curlcase9, CURLOPT_POST, true);
        curl_setopt($curlcase9, CURLOPT_HTTPHEADER, [
            "X-Requested-With: XMLHttpRequest"
        ]);
        curl_setopt($curlcase9, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curlcase9, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlcase9, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt(
            $curlcase9,
            CURLOPT_POSTFIELDS,
            $casemasuk1 = array(
                'wktawal' => $today + $waktu,
                'jwb[1]' => 4,
                'jwb[2]' => 4,
                'jwb[3]' => 4,
                'jwb[4]' => 4,
                'jwb[5]' => 4,
                'jwb[6]' => 4,
                'jwb[7]' => 4,
                'jwb[8]' => 4,
                'jwb[9]' => 4,
                'jwb[10]' => 4,
                'jwb[11]' => 4,
                'jwb[19]' => 1,
                'jwb[20]' => 1,
                'jwb[21]' => 1,
                'jwb[22]' => 1,
                'jwb[23]' => 1
            )
        );
        curl_setopt($curlcase9, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlcase9, CURLOPT_REFERER, "https://www.sia.uty.ac.id");
        //Handle all curl
        $mh = curl_multi_init();

        //Add all curl
        curl_multi_add_handle($mh, $curlcase0);
        curl_multi_add_handle($mh, $curlcase1);
        curl_multi_add_handle($mh, $curlcase2);
        curl_multi_add_handle($mh, $curlcase3);
        curl_multi_add_handle($mh, $curlcase4);
        curl_multi_add_handle($mh, $curlcase5);
        curl_multi_add_handle($mh, $curlcase6);
        curl_multi_add_handle($mh, $curlcase7);
        curl_multi_add_handle($mh, $curlcase8);
        curl_multi_add_handle($mh, $curlcase9);
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                // Wait a short time for more activity
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);
        //Curl close
        curl_multi_remove_handle($mh, $curlcase0);
        curl_multi_remove_handle($mh, $curlcase1);
        curl_multi_remove_handle($mh, $curlcase2);
        curl_multi_remove_handle($mh, $curlcase3);
        curl_multi_remove_handle($mh, $curlcase4);
        curl_multi_remove_handle($mh, $curlcase5);
        curl_multi_remove_handle($mh, $curlcase6);
        curl_multi_remove_handle($mh, $curlcase7);
        curl_multi_remove_handle($mh, $curlcase8);
        curl_multi_remove_handle($mh, $curlcase9);
        curl_multi_close($mh);
        break;
        
    default:
        echo "<script>alert('Pilihan salah, Isi dengan benar!')</script>";
        break;
}
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hallo :)</title>
    <style>
      body {
      background: #445;
      color: #FFF;
      }
      #main {
      background: linear-gradient(to bottom, rgba(0,0,0,0.66) 100%, transparent), url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/336999/shinokubo_test.jpg);
      background-size: cover, cover;
      background-position: center, center;
      height: 100vh;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      }
      p {
      font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", sans-serif;
      font-size: 18px;
      display: inline-block;
      padding-left: 1rem;
      font-weight: 30;
      position: relative;
      opacity: 1;
      transform: scale(1);
      transition: transform 0.5s ease, opacity 1s ease;
      }
     
    </style>
  </head>
  <body>
    <div id="main" class="is-loading">
      <h1>
<?php
foreach ($res[1] as $value) {
    echo "<p color:white;>".$value . "</p>";
}
    echo "<p>Kelas Kamu : </p><br />";
foreach ($kelasMu[2] as $kul) {
    echo "<p color:white;>" . $kul . "</p>";
}
echo "<br /><p color:white;>Done, Silahkan Dicek kembali.</p>";

?>
      </h1>
    </div>
  </body>
  <script>
    $(document).ready(function() {
    setTimeout(function() {
    $("#main").removeClass("is-loading");
    }, 100)
    });
  </script>
</html>