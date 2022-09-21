<?php
function getAmount($amount, $length = 0)
{
    if (0 < $length) {
        return round($amount + 0, $length);
    }
    return $amount + 0;
}



if (!function_exists('decimalFormat')) {
    function decimalFormat($number, $format = NULL)
    {
        return number_format($number, 2, '.', '');
    }
}

function konversi($x)
{
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";

    if ($x < 12) {
        $temp = " " . $angka[$x];
    } else if ($x < 20) {
        $temp = konversi($x - 10) . " belas";
    } else if ($x < 100) {
        $temp = konversi($x / 10) . " puluh" . konversi($x % 10);
    } else if ($x < 200) {
        $temp = " seratus" . konversi($x - 100);
    } else if ($x < 1000) {
        $temp = konversi($x / 100) . " ratus" . konversi($x % 100);
    } else if ($x < 2000) {
        $temp = " seribu" . konversi($x - 1000);
    } else if ($x < 1000000) {
        $temp = konversi($x / 1000) . " ribu" . konversi($x % 1000);
    } else if ($x < 1000000000) {
        $temp = konversi($x / 1000000) . " juta" . konversi($x % 1000000);
    } else if ($x < 1000000000000) {
        $temp = konversi($x / 1000000000) . " milyar" . konversi($x % 1000000000);
    }

    return $temp;
}

function tkoma($x)
{
    $str = stristr($x, "."); //  mencari nominal desimal
    $ex = explode('.', $x);

    if (($ex[1] / 10) >= 1) { //04
        $a = abs($ex[1]);
    } else {
        $a = 0;
    }

    $string = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";

    $a2 = $ex[1] / 10;
    $pjg = strlen($str);
    $i = 1;

    if ($a >= 1 && $a < 12) {
        $temp .= " " . $string[$a];
    } else if ($a > 12 && $a < 20) {
        $temp .= konversi($a - 10) . " belas"; //bisa menghapus "BELAS" bila menggunakan EYD yang benar
    } else if ($a > 20 && $a < 100) {
        $temp .= konversi($a / 10) . " puluh" . konversi($a % 10); //bisa menghapus "PULUH" bila menggunakan EYD yang benar
    } else {
        if ($a2 < 1) {
            while ($i < $pjg) {
                $char = substr($str, $i, 1);
                $i++;
                $temp .= " " . $string[$char];
            }
        }
    }
    return $temp;
} // end of tkoma

function terbilang($x)
{
    if ($x < 0) {
        $hasil = "minus " . trim(konversi(x));
    } else {

        $ex = explode('.', $x); // karena pemisah desimal didatabase menggunakan titik bukan koma

        if (empty($ex[1])) { // cek bilangan bulat atau bilangan desimal
            $hasil = trim(konversi($x));
            $poin = null;
        } else {
            $poin = trim(tkoma($x));
            $hasil = trim(konversi($x));
        }
    }

    if ($poin) {
        $hasil = $hasil . " koma " . $poin;
    } else {
        $hasil = $hasil;
    }

    return $hasil;
}
