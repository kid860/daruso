

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>DARUSO Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/images/logo_ud.png"/>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">

  <!-- file input -->
  <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">

  <!-- Data Tables -->
  <link rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">

  <!-- jquery -->
	<script src="assets/js/jquery.min.js"></script>
  <!-- jquery ui -->  
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/feather.min.js"></script>

  <!-- include summernote css/js -->
  <link href="assets/plugins/summernote/summernote.min.css" rel="stylesheet">
  <script src="assets/plugins/summernote/summernote.min.js"></script>

  <style>
    body{
      overflow-x: hidden;
    }
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

    .sub-heading{
      color: black !important;
    }

    .ui-datepicker-calendar {
      display: none;
    }

    .img-round{
      height: 40px;
      width: 50px;
    }

    .dropdown-menu li{
      padding: 10px;
      border-bottom: 1px solid grey;
    }

    .dropdown-menu i{
      padding-right: 5px;
    }

    .dropdown-menu{
      padding: 0px;
      margin: 0px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      text-align: left;
    }

    li.active{
      background-color: rgba(0, 26, 51, 0.75);
      border-left: 6px solid rgb(0, 26, 51);
      color: white;
    }

    li.active a{
      color: white;
    }

    #sidebarMenu{
      padding: 0px;
      position: fixed;
      height: 100vh;
    }

    #sidebarMenu ul li{
      padding: 3px 13px;
    }

    .profilePicture{
      width: 3%;
      height: 3%;
      border-radius: 50%;
    }
  </style>
    <!-- Custom styles for this template -->
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
        <img src="assets/images/logo_ud.png" class="profilePicture" id="profilePicture" alt="">
        <a class="navbar-brand" href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['username'] ?></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="logout.php">Sign out&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item" id="navHome">
            <a class="nav-link" href="dashboard.php">
              <span class="disabled" data-feather="home"></span>
              Home 
            </a>
          </li>
          <li class="nav-item" id="navAbout">
            <a href="about.php" class=" nav-link" aria-expanded="false"> 
                <span data-feather="file"></span>
                About
            </a>
          </li> 
          <li class="nav-item" id="navLeaders">
            <a class="nav-link" href="leaders.php">
              <span data-feather="archive"></span>
              Leaders
            </a>
          </li>
          <li class="nav-item" id="navGallery">
            <a class="nav-link" href="gallery.php">
              <span data-feather="image"></span>
              Gallery
            </a>
          </li>
          <li class="nav-item" id="navNews">
            <a class="nav-link" href="newsportal/admin/">
              <span data-feather="package"></span>
              News
            </a>
          </li>
          <li class="nav-item" id="navEvents">
            <a class="nav-link" href="events.php">
              <span data-feather="map-pin"></span>
              Events
            </a>
          </li>
          <li class="nav-item" id="navSetting">
            <a class="nav-link" href="setting.php">
              <span data-feather="settings"></span>
              Settings
            </a>
          </li>
        </ul>
      </div>
    </nav>