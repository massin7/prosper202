<?php
$vars=@explode(" ",base64_decode($_GET['202v']));

if(isset($vars[1])){
$_GET['pci']=$vars[1];
$expire = time() + 2592000;
@setcookie('tracking202subid',$vars[0],$expire,'/', $_SERVER['SERVER_NAME']);
@setcookie('tracking202subid_a_' . $vars[2],$vars[0],$expire,'/', $_SERVER['SERVER_NAME']);
@setcookie('tracking202pci',$vars[1],$expire,'/', $_SERVER['SERVER_NAME']);
}
$redirect_site_url='';


  //Simple LP redirect
  if (isset($_GET['lpip']) && !empty($_GET['lpip'])) {
    if (isset($_COOKIE['tracking202outbound'])) {
      $tracking202outbound = $_COOKIE['tracking202outbound'];     
    } else {
    	require_once($_SERVER['DOCUMENT_ROOT'] . '/tracking202/redirect/lp.php');
    }

    header('location: '.$tracking202outbound);
  }

  //Advanced LP redirect
  if (isset($_GET['acip']) && !empty($_GET['acip'])) {

  	include_once($_SERVER['DOCUMENT_ROOT'] . '/tracking202/redirect/off.php');
  }  

  die("Missing LPIP or ACIP variable!");
  
?>