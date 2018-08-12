<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
     function user_verify_session(){
       $CI = &get_instance();
       $user_auth = $CI->session->userdata('user_auth');

       if($user_auth  != 2) {
        redirect("login");
       }
   }

    function admin_verify_session(){
      $CI = &get_instance();
      $user_auth = $CI->session->userdata('user_auth');

      if($user_auth  != 1) {
       redirect('login');
      }
  }


  function only_registered_session()
  {
    $CI = &get_instance();
      $user_auth = $CI->session->userdata('user_auth');

      if($user_auth  != 1 && $user_auth  != 2) {
       redirect('login');
      }
  }
   ?>
