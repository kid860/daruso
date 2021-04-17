
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Winstone Mjule">
    <title>University of Dar es Salaam Student's Organisation | DARUSO</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/images/logo_ud.png"/>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom css -->
    <link href="custom/css/style.css" rel="stylesheet">
    <link href="custom/css/fresco.css" rel="stylesheet">
    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">


    <!-- file input -->
    <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">

    <!-- Custom fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">

    <!-- fullCalendar 2.2.5
    <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.print.css" media="print"> -->

    <!-- jquery -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/fresco.min.js"></script>
 
    <!-- pannellum -->
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">

    <!-- Mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />

    <!-- Custom -->
    <script src="custom/js/index.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head> 

  <body data-spy="scroll" data-target=".navbar1" data-offset="50">
    <header>
      
    <center>
      <nav class="navbar1 row">
        <div class=" col-4">
          <div class="logo"><a href="/daruso/"><img src="assets/images/logo_ud.png"></a></div>
        </div>

        <div class="col-4"><strong>UNIVERSITY OF DAR ES SALAAM</strong></div>

        <div class="col-4" id="myNavbar">
        <button type="button" class="navbar-toggle">
            <i class="fa fa-bars text-daruso"></i>                    
        </button>
        </div>
      </nav>

      <div class="nav-list" id="nav-list">
          <ul class="">
            <li><a href="#"><img src="assets/images/logo_ud.png"></li>
            <li><a href="#home" style="color: rgb(0,123,255) !important;">Home</a></li>
            <li><a href="#about" style="color: rgb(0,123,255) !important;">About</a></li>
            <li><a href="#leaders" style="color: rgb(0,123,255) !important;">Leaders</a></li>
            <li><a href="#gallery" style="color: rgb(0,123,255) !important;">Gallery</a></li>
            <li><a href="#news" style="color: rgb(0,123,255) !important;">News</a></li>
          </ul>
      </div>  
    </center>
    </header>

    <main data-spy="scroll" data-target="#daruso-heading" data-offset="0">
      <!-- Carousel (Announcements) Home-->
      <section id="home">
        <!-- overlay -->
        <div class="overlay1"></div>
        <div id="carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          </ol>
          <center><div class="carousel-inner">
            <div class="carousel-item active" data-interval="6000">
              <!-- Carousel content -->
              <div class="carousel-text-item">
                <strong><h1 class="display-header">Bunge 360</h1></strong><br>
                <p>Experience the glimpse of the hall that houses the debates that shape of our future. Explore Bunge in 360 below.</p>
                <p><button class="btn btn-daruso-outline p-3 btn-panorama" style="letter-spacing: 0.2px; font-size: 120%; cursor: context-menu;"><b>EXPLORE BUNGE (360&deg;)</b></button></p>
              </div>
              <img src="assets/images/grad.jpg" class="d-block w-100 carousel-image" alt="...">
              
            </div>

          </div></center>

          <a class="carousel-control-prev" style="position:absolute; z-index: 12"  href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" style="position:absolute; z-index: 12" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
      </section>

      <!-- About -->
      <section id="about">
        <center>
          <h3 class="section-heading pt-5 mt-5">About Us</h3>
          <p class="lead">
            We have a short but exciting history, this is how the University of Dar es Salaam<br> Student's Organisation was formed and it's mission.
          </p>
      </center>
        <div class="about over">
        </div>
      </section>

      <!-- Leaders -->
      <section id="leaders">
        <center><h3 class="section-heading pt-5" style="color: white;">The Government</h3>
        <p class="lead">
          The government for the year <?php echo date("Y");?>/<?php echo date("Y") + 1;?> as elected by the students<br> and making "DARUSO GREAT AGAIN" is their Motto.
        </p></center>
        <!-- Leader Tab -->
        <center>
        <ul class="nav nav-pills leader-nav justify-content-center pb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active px-3" id="pills-cabinet-tab" data-toggle="pill" href="#pills-cabinet" role="tab" aria-controls="pills-cabinet" aria-selected="true"><b>Cabinet</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" style="color: white;" id="pills-judicial-tab" data-toggle="pill" href="#pills-judicial" role="tab" aria-controls="pills-judicial" aria-selected="false"><b>Judicial</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3" style="color: white;" id="pills-uscr-tab" data-toggle="pill" href="#pills-uscr" role="tab" aria-controls="pills-uscr" aria-selected="false"><b>USCR</b></a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <!-- Cabinet -->
          <div class="tab-pane fade show active" id="pills-cabinet" role="tabpanel" aria-labelledby="pills-cabinet-tab">
            <div class="leaders p-4">
              <div class="leaders-cabinet">
              </div>
            </div>
          </div>

          <!-- Judicial -->
          <div class="tab-pane fade" id="pills-judicial" role="tabpanel" aria-labelledby="pills-judicial-tab">
            <div class="leaders p-4">
              <div class="leaders-judicial">
              </div>
            </div>
          </div>

          <!-- USCR -->
          <div class="tab-pane fade" id="pills-uscr" role="tabpanel" aria-labelledby="pills-uscr-tab">
            <div class="leaders p-4">
              <div class="leaders-uscr">
              </div>
            </div>
          </div>
        </div>
        </center>
      </section>

      <!-- Gallery -->
      <section id="gallery">
        <center>
          <h3 class="section-heading pb-3" style="color: #121212;">Gallery</h3>
          <p class="lead">
            The Student's Government organises various events.<br> The following is a pictorial description of the events categorized by each DARUSO arm.
          </p>
        </center>

        <div class="album">
          <div class=" gallery-container">

            <div class="row">
            
              <div class="cabinet-gallery col-md-4 p-0">
              </div>

              <div class="judicial-gallery col-md-4 p-0">
              </div>

              <div class="uscr-gallery col-md-4 p-0">
              </div>
            </div>
            
          </div></div>
      </section>

      <!-- Bunge 360 -->
      <div class="overlay-panorama"></div>
      <div class="pb-4">
        <center>
          <div id="panorama"></div>
        </center>
      </div>

      <!-- News, Announce & Events -->
      <section id="news">
        <center><h3 class="section-heading pb-4" style="color: black;">News & Events</h3></center>
        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active px-5" id="pills-news-tab" data-toggle="pill" href="#pills-news" role="tab" aria-controls="pills-news" aria-selected="true"><b>News</b></a>
          </li>
          <li class="nav-item px-5">
            <a class="nav-link" id="pills-events-tab" data-toggle="pill" href="#pills-events" role="tab" aria-controls="pills-events" aria-selected="false"><b>Events</b></a>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="pills-tabContent">
          <!-- news -->
          <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
            <?php include('newsportal/index.php');?>
          </div>

          <!-- Events -->
          <div class="tab-pane fade m-5 p-5" id="pills-events" role="tabpanel" aria-labelledby="pills-events-tab">
            <div class="row event-list">
            </div>
          </div>
          
        </div>
        
      </section> 

      <!-- Social -->
      <section id="social" >
      <center><h3 class="section-heading pb-3" style="color: white;">Contact Us</h3></center>

        <div class="container justify-content-center tags">
          <ul class="list-group list-group-horizontal justify-content-center">
            <li class="list-daruso-item"><a href="mailto:mlimanidaruso2020@gmail.com"><i class="fa fa-envelope"></i></a></li>
            <li class="list-daruso-item"><a href="https://www.facebook.com/darusomlimani/"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-daruso-item"><a href="https://www.instagram.com/darusomlimani/"><i class="fa fa-instagram"></i></a></li>
            <li class="list-daruso-item"><a href="https://www.twitter.com/daruso2020/"><i class="fa fa-twitter"></i></a></li>
            <li class="list-daruso-item" data-toggle="tooltip" data-placement="right" data-html="true" title="+255711381100"><i class="fa fa-phone"></i></li>
          </ul>
        </div>

        <div style="padding: 5%; color: white;">
        <center>
          <span><b>"MAKE DARUSO GREAT AGAIN"</b></span><br>
          <a class="text-muted" style="font-size: 14px"> University of Dar es Salaam - Dar Es Salaam University Students Organisation</a><br><br>
          &copy;<?php echo date("Y");?>
        </center>
        </div>
        
      </section> 

      <!-- Map -->
      <div id='map' style='width: 100%; height: 70vh; padding: 0%;'></div>
    </main>

  </body>
</html>
