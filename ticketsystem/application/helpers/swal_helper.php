<?php

$status = false;

   function doSwalAlert($title, $exp, $type){
       $CI = &get_instance();
       $status = true;

       $CI->session->set_flashdata(array(
         "title"  => $title,
         "exp"    => $exp,
         "type"   => $type,
         "status" => $status
       ));
    }
?>
