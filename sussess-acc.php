<?php
require_once 'vendor/autoload.php';
session_start();
include("db.php"); //соединение с SQL
use ExinOne\MixinSDK\MixinSDK;
// Configuration file format
$config0 = array(
    'mixin_id'      => '7000101690',
    'client_id'     => '4d64a975-897f-4609-a67d-a1a976f3211a',
    'client_secret' => '08f78877b91dd76537db8e2beb13195be2c8394adcfdc17d7c6ee450a72789de',
    'pin'           => '563613',
    'pin_token'     => 'mQMvkCd4hJyQTZt2FVyQ/IiGQWt++Znp0ufsdhDrsE1u6jU0eZQGxXO56vqs67dVsGQ7boP7aJspoZ4aPYMvsC9yhyYx5XzhDS9jlTtM04Ww7rDEAyA9APmLt5a0CUZIozz0bUUXwlsFC3wS1tWgz3enkkOiYrgcJkX6KLvLJEE=',
    'session_id'    => 'ee0fcec8-01eb-44f4-b49d-24926d60fdc5',
    'private_key'   => '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQDhZj2zktkgRycLztfDmgTju4ZvzLxPnaAhVejltRyAs98GJnJC
+YoGPoBFFHUfFRcyPAzf6k4OzuoITFZAYYly9csmbZq4RtXb7Ww7SoBXD7xJ7wdS
osOWTODokRYAyaP2AhZAM3IHH3EXbOF93mkOFLJmmBvTDZz1me7cyw1y7wIDAQAB
AoGAHB6VNAHt9Ijr5h037b8ZPQ/4BZqVI5mWkJIXLBEcLTJDcJD7UD+xaHYDqpqS
wf3vluTG9mhUtKQ7ri1X1VBVxTXUEY+NHeh0EKlfP5/2ZFi5MNqOqUJVfi37GoJj
j/X76gEN3xeVg17jyGxP1yQZNMT+XjMW/RTSOG5MDzLKhoECQQDzLSB/5+ihf5xA
lhHH9Bg64RnZ0667V51pCOEs/QT8uWtsMlEr1CXkCixX8C5fGzAGZsizqvD3MWmt
H5A9BQXbAkEA7UkgXfWFU52abrfSXUl6+gF2mnooodMoX8u9Ux/seOGGK+/z3mRs
3f78nPM00nSqguzU9E9P7t1a0B0HdK31fQJAUlcSbRzqkVyzXM8zwB/v4Gf+J9rc
jITzQPCHxoL6IFTsgdtbztpr5hZnw3MJUJzVGyXMicG1DA6ION26Kl88BwJBAIaX
BOHmonJUIcWNRKgfRr7J17E1exiXAf6cPM4KfIHwQb9oQmYxhkLBIB4SITMCc7kB
hqTw28D8E0eaP6FiDq0CQFjYaLfRiZWE3y1vYpB9snbBMF+lqJ5cCjR+ScfVkUGN
xPbnCdMayTQm9jRVORgD/o/iGKaoPjvN+REqSg6zY+E=
-----END RSA PRIVATE KEY-----'
);

/*
$mixin_code = $_SESSION['code'];
$person = $_SESSION['person'];
$url = 'https://api.mixin.one/oauth/token';
$data = array('client_id' => '4d64a975-897f-4609-a67d-a1a976f3211a', 'code' => $mixin_code, 'client_secret' => '08f78877b91dd76537db8e2beb13195be2c8394adcfdc17d7c6ee450a72789de');


$options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( $url, false, $context );
$response = json_decode( $result );
$access_token = $response->data->access_token;

//echo $access_token ;

$url = 'https://api.mixin.one/me';
$headers = array(
            'Authorization: Bearer ' . $access_token,
            'Content-Type: application/json'
        );
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);  
if ($result === FALSE) {
  die('Curl failed: ' . curl_error($ch));
}
curl_close($ch);
$array_mix = json_decode($result);
*/
$u_name = $_SESSION['full_name'];
$u_id = $_SESSION['user_id'];
$message = 'Hello, '.$u_name.'! You booked MI A2 LITE house. Thank you for using MixinKeys! Your password for unlock: 11111111';

$mixinSdk = new \ExinOne\MixinSDK\MixinSDK();
// use setConfig method to save config
$mixinSdk->setConfig('myConfig-A',$config0);
//$mixinSdk->use('myConfig-A')->network()->createConversations('CONTACT', [
//            [
//                'action'  => 'ADD',
//                'role'    => '',
//                'user_id' => $u_id,
//            ],
//        ]);

$mixinSdk->use('myConfig-A')->message()->sendBatchMessage([''.$u_id.'',], ['Hello, '.$u_name.'! You booked MI A2 LITE house. Thank you for using MixinKeys! Your password for unlock: 11111111',]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    MixinKeys
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.5" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="profile-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#">
          MixinKeys </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="houses.php" class="nav-link" data-toggle="dropdown">
              <i class="material-icons">home</i> Search house
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="https://github.com/if1242/MixinKeys/blob/master/MixinKeys%20-%20white%20paper.pdf" >
              <i class="material-icons">cloud_download</i> White paper
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://github.com/if1242/MixinKeys" target="_blank" data-original-title="Follow us on github">
              <i class="fa fa-github"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://youtu.be/TyIUbuKu_OY" target="_blank" data-original-title="Like us on youtube">
              <i class="fa fa-youtube-play"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://vimeo.com/309406253" target="_blank" data-original-title="Vimeo">
              <i class="fa fa-vimeo"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/account.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="name">
                <h3 class="title" style="color:#fff;">Success!</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p><?php $u_name; ?></p>
        </div>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
           <a href="account.php">
		      <button type="submit" class="btn btn-primary btn-raised">
                Success! Return to my orders <i class="material-icons">people</i>
              </button>
		   </a>		   
          </div>
        </div>
        
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <div class="copyright">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="http://www.ibisolutions.team" target="_blank">IBI Solutions team</a>.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.5" type="text/javascript"></script>
</body>

</html>