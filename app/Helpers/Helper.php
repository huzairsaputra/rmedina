<?php
use Carbon\Carbon;

if ( ! function_exists('photo_exists')){
    function photo_exists($url){
        $headers=get_headers($url);
        return stripos($headers[0],"200 OK")?true:false;
    }
}

if ( ! function_exists('int_to_rupiah')){
    function int_to_rupiah($angka){
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
    }
}

if ( ! function_exists('rupiah_to_int')){
    function rupiah_to_int($rupiah){
        return intval(preg_replace('/,.*|[^0-9]/', '', $rupiah));
    }
}

//tanggal indo, dll pake moment aja
if ( ! function_exists('date_to_form'))
{
    function date_to_form($tanggal){
        $date = Carbon::parse($tanggal);
        return $date->format('d-m-Y');
    }

}

if ( ! function_exists('date_to_db'))
{
    function date_to_db($tanggal){
        $date = Carbon::parse($tanggal);
        return $date->format('Y-m-d');
    }

}

?>
