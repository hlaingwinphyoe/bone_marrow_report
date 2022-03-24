<?php

function con(){
    return mysqli_connect("localhost","root","","bm_report");
}

$url = "http://{$_SERVER['HTTP_HOST']}/bone_marrow_report";

$role = ['Admin','User'];

$genderArr = ['Male','Female'];

$pro_performArr = ['Aspirate','Trephine biopsy','Aspirate / Trephine biopsy'];
$tre_pro_performArr = ['Aspirate biopsy','Trephine biopsy'];

date_default_timezone_set("Asia/Yangon");