<?php
session_start();
include("db.php"); //соединение с SQL
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

//$assetId = '43d61dcd-e413-450d-80b8-101d5e903357';
//$opponentId = '3c4c9673-2c0a-4547-bfd0-c1ea66e43634';
//$pin = '563613';
//$amount = 0.00000001;
//$mixinSdk->use('myConfig-A')->wallet()->transfer($assetId, $opponentId, $pin, $amount, '', null);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
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
            <a class="nav-link" target="_blank" href="https://github.com/if1242/MixinKeys/blob/master/MixinKeys%20-%20white%20paper.pdf">
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
                <h3 class="title" style="color:#fff;">Success</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p><?php echo $array_mix->data->full_name; ?></p>
        </div>
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
           <a href="account.php">
		      <button type="submit" class="btn btn-primary btn-raised">
                Success! Continue booking <i class="material-icons">home</i>
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
