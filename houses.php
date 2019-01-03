<?php
include("db.php"); //соединение с SQL
$country = $_SESSION['country'];
$result = $db->query("SELECT * 
                        FROM houses WHERE country = '$country'");

$query = "UPDATE
                sessions
             SET
                state = 0
";
 
$db->query($query);


						
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
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
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
            <a href="account.php" class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="material-icons">face</i>My account
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="material-icons">cloud_download</i> White paper
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on github">
              <i class="fa fa-github"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on youtube">
              <i class="fa fa-youtube-play"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Vimeo">
              <i class="fa fa-vimeo"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="name">
                <h3 class="title" style="color:#fff;">Booking in Russia</h3>
              </div>
            </div>
          </div>
        </div>
        
  
<div class="team">
          <div class="row">
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="assets/img/houses/spb1.jpg" alt="Thumbnail Image" class="img-raised  img-fluid">
                  </div>
                  <div class="card-body">
                    <p class="card-description"> <?php echo $country; ?>Cheap accommodation. With you will live another 6 people. In the room shower, TV, kitchen, Wi-Fi. There are many shops near the house.</p>
                  </div>
                  <button type="submit" class="btn btn-primary btn-raised">
                    Book (1XIN per day)
                  </button>       
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="assets/img/houses/spb2.jpg" alt="Thumbnail Image" class="img-raised img-fluid">
                  </div>
                  <div class="card-body">
                    <p class="card-description">Comfortable option for traveling alone. Large double bed, kitchen, Wi-Fi - all this will be at your disposal. There are many shops near the house.</p>
                  </div>
				  <a href="account.php">
                  <button type="submit" class="btn btn-primary btn-raised">
                    Book (5XIN per day)
                  </button>
				  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="assets/img/houses/spb3.jpg" alt="Thumbnail Image" class="img-raised img-fluid">
                  </div>
                  <div class="card-body">
                    <p class="card-description">Gorgeous panoramic view overlooking the city. 
					The house has everything you need: wi-fi, shower, wardrobe, 5 beds, TV.
                    </p>
                  </div>
				  
                  <button type="submit" class="btn btn-primary btn-raised">
                    Book (10XIN per day)
                  </button>
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