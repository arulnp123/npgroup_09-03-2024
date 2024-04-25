<?php
    date_default_timezone_set("Asia/Kolkata");

 $mysql_hostname = "localhost";
   /* $mysql_user = "npgroups_admin";
    $mysql_password = "npgroups1";
    $mysql_database = "npgroups_admin";*/
        $mysql_user = "npgroups_app";
    $mysql_password = "app123";
    $mysql_database = "npgroups_app";
    $conn = new mysqli("$mysql_hostname", "$mysql_user", "$mysql_password", "$mysql_database");

    function fromsqldatedmy($input){
        if($input=="") return "";
        $a=explode('-',$input);
        $y=$a[0];
        $m=$a[1];
        $d=$a[2];
        return($d."/".$m."/".$y);
    }