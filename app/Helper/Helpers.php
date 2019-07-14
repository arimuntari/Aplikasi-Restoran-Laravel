<?php
namespace App\Helper;

class helpers {
    public static function cekAktif($aktif)
    {
       if($aktif != 1){
       	 return "<span class='badge bg-red'> Non-Active</span>";
       }else{
       	 return "<span class='badge bg-blue'> Active</span>";
       }
    } 
    public static function tipeUser($tipe)
    {
       if($tipe == 1){
       	 return "Administrator";
       }elseif($tipe == 2){
       	 return "Kasir";
       }elseif($tipe == 3){
       	 return "Dapur";
       }
    }
}
?>