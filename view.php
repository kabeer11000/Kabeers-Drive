<?php 
function urlExists($url=NULL)  
{  
    if($url == NULL) return false;  
    $ch = curl_init($url);  
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);  
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    $data = curl_exec($ch);  
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
    curl_close($ch);  
    if($httpcode>=200 && $httpcode<300){  
        return true;  
    } else {  
        return false;  
    }  
}  
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$errorHTML = '
<!DOCTYPE html>
<html lang=en>
  <meta charset=utf-8>
  <meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width">
  <title>Error 404 | Kabeer\'s Drive</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

  <style>
    *{margin:0;padding:0}html,code{font:15px/22px arial,sans-serif}html{background:#fff;color:#222;padding:15px}body{margin:7% auto 0;max-width:390px;min-height:180px;padding:30px 0 15px}* > body{background:url(https://www.google.com/images/errors/robot.png) 100% 5px no-repeat;padding-right:205px}p{margin:11px 0 22px;overflow:hidden}ins{color:#777;text-decoration:none}a img{border:0}@media screen and (max-width:772px){body{background:none;margin-top:0;max-width:none;padding-right:0}}@media only screen and (min-resolution:192dpi){}@media only screen and (-webkit-min-device-pixel-ratio:2){}
  </style>
  <a href="#">
  <div class="row"><div class="col-md-12"><img src="kslogo.png" style="width:5em; height:auto"></div><div class="col-md-12 mt-2"> <small style="font-size:17.5px;" class="text-muted display-4"> Kabeer\'s Drive</small></div><hr></div>
  </a>
  <p><b>404.</b> <ins>That’s an error.</ins>
  <p>The requested URL <code>'.$actual_link.'</code> was not found on this server.  <ins>That’s all we know.</ins>
';
function Decrypt($encrypted_string = ''){
$cipher = "AES-128-CTR"; 
$options = 0;  

$decryption_iv = 'Viijp6tGSwlnovzUK9vkc99BwEunEYlxytSQYHlM8565825542115032'; 
// Store the decryption key 
$dec_key = "Viijp6tGSwlnovzUK9vkc99BwEunEYlxytSQYHlM"; 
// Use openssl_decrypt() function to
// Use openssl_decrypt() function to decrypt the data 
//$str = url_encode($str);

$decrypted_string = openssl_decrypt ($encrypted_string, $cipher, $dec_key, $options, $decryption_iv); 
// Display the decrypted string 
return $decrypted_string;
}
if(!isset($_GET['id'])){
    
    echo $errorHTML;

}
else{
    $str = 'http://drive.hosted-kabeersnetwork.unaux.com/u/0/'.Decrypt($_GET['id']); 
$url = str_replace("SLASH","/",$str);
$url = str_replace("SPACE"," ",$url);
$url = str_replace("PLUS","+",$url);
$url = str_replace("TEA","t",$url);
/*
$url = str_replace("FAX","g",$url);
$url = str_replace("GEE","g",$url);
$url = str_replace("BEM","n",$url);
$url = str_replace("FUC","f",$url);
$url = str_replace("GAY","j",$url);
*/

if(urlExists($url) == true){
//echo $url;
echo '<meta charset="utf-8"><title>Kabeer\'s Drive</title><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><style>*{margin:0;padding:0;box-sizing:border-box;}</style><iframe src="'.$url.'" style="width:100vw;height:100vh;padding:0;margin:0;" frameborder="0" sandbox="allow-forms" id="iframe" seamless="seamless"></iframe>';

}
else{
    echo $errorHTML;
}
} 
?>