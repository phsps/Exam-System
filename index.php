<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mdb.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHSPS</title>

</head>
<body>

    
    <div class="top__line"></div>

    <!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-light orange bg-light lighten-1">
    <div class="container">
        <a class="navbar-brand" href="#">Exam Portal </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
          aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
            <!-- Search form -->
        <div class="md-form mt-0 mx-auto">
            <input class="form-control" type="text" placeholder="Search" id="searchDetails" aria-label="Search">
        </div>
          <ul class="navbar-nav">
            <li class="nav-item mr-4">
              <a class="nav-link" href="#"><i class="fas fa-users"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
            </li>
          </ul>
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item avatar">
              <a class="nav-link p-0" href="#">
                <img src="./images/avatar-5.webp" class="rounded-circle z-depth-0"
                  alt="avatar image" height="35">
              </a>
            </li>
          </ul>
        </div>
    </div>

  </nav>
  <!--/.Navbar -->

  <div class="hero">
      <button id="check_start" sub="Mathematics" short="mth">Mathematics</button>
      <button id="check_start" sub="English Language" short="eng">English</button>
      <button id="check_start" sub="Physics" short="phy">Physics</button>
      <button id="check_start" sub="Chemistry" short="chm">Chemistry</button>
      <button id="check_start" sub="Biology" short="bio">Biology</button>
  </div>
  













    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/mdb.min.js"></script>
    <script src="./js/all.min.js"></script>
    <!-- <script src="./js/timer.js"></script> -->
    <?php require_once './js/timer.js.php'; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
