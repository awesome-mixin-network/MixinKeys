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
if (!isset($_SESSION['full_name'])) {
  $_SESSION['user_id'] = $array_mix->data->user_id;
  $_SESSION['full_name'] = $array_mix->data->full_name;
}
$u_name = $_SESSION['full_name']; 
$u_id = $_SESSION['user_id'];
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
            <a href="http://mixinkeys.ibisolutions.ru" class="nav-link" data-toggle="dropdown">
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
                <h3 class="title" style="color:#fff;">Hello, <?php echo $u_name; ?></h3>
              </div>
            </div>
          </div>
        </div>
        <!--<div class="description text-center">
          <p><?php /*echo $array_mix->data->full_name;*/ ?></p>
        </div>-->
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                    <i class="material-icons">calendar_today</i>My books
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                    <i class="material-icons">domain</i>My houses
                  </a>
                </li>
				 <li class="nav-item">
                    <a class="nav-link" href="#orders" role="tab" data-toggle="tab">
                    <i class="material-icons">people</i>My guests
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space">
		<?php if ($person == 0) {?>
          <div class="tab-pane active text-center gallery" id="studio">
		<?php } else { ?>
		  <div class="tab-pane text-center gallery" id="studio">
		<?php } ?>
            <div class="row">
              <div class="col-md-3 mr-auto">	  
			    <div class="card mb-3">
                  <img class="card-img-top" src="assets/img/houses/spb2.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Nevsky Prospect, 34</h4>
                    <p class="card-text">Comfortable option for traveling alone. Large double bed, kitchen, Wi-Fi - all this will be at your disposal. There are many shops near the house.</p>
                    <a href="sussess-guest.php">
					<button type="submit" class="btn btn-primary btn-raised">
                      Confirm and pay Mi A2 Lite (DEMO)
                    </button>
					</a>
                  </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="tab-pane text-center gallery" id="works">
            <div class="row">
              <div class="col-md-3 ml-auto">
                <div class="card mb-3">
                  <img class="card-img-top" src="assets/img/houses/spb2.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Nevsky Prospect, 34</h4>
                    <p class="card-text">Comfortable option for traveling alone. Large double bed, kitchen, Wi-Fi - all this will be at your disposal. There are many shops near the house.</p>
                    <button type="submit" class="btn btn-primary btn-raised">
                      Delete (off) 
                    </button>
					<button type="submit" class="btn btn-primary btn-raised">
                      Add new (off)
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  <?php if ($person == 1) {?>
		  <div class="tab-pane active text-center gallery" id="orders">
		  <?php } else { ?>
		  <div class="tab-pane text-center gallery" id="orders">
		  <?php } ?>
            <div class="row">
              <div class="col-md-3 mr-auto">
                <div class="card mb-3">
                  <img class="card-img-top" src="assets/img/houses/spb2.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">Nevsky Prospect, 34</h4>
                    <p class="card-text">Comfortable option for traveling alone. Large double bed, kitchen, Wi-Fi - all this will be at your disposal. There are many shops near the house.</p>
                    <a href="sussess-acc.php">
					<button type="submit" class="btn btn-primary btn-raised">
                      Сonfirm and send code to <?php echo $u_name; ?>
                    </button>
					</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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