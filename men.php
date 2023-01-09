<?php 
  session_start();
  require('include.php');
  $json = file_get_contents("assets/services.json");
  $json = json_decode($json,true);
  foreach($json as $key){
    foreach($key['serv'] as $k){
      if($k === $_GET['q']){
        $icon = $key['icon'];
      }
    }
  }
  $serv = $_GET['q'];
  $query = 'select mobile from userserv where service="'.$serv.'"';
  $r = mysqli_query($conn, $query);
  $res = mysqli_fetch_all($r, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/men.css">
  <title>The Best Man | Services</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light" id="navbar">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <a href="#" class="navbar-brand">The Best Man</a>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a href="find-bestman.php" class="nav-link">
                            <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">
                            <i class="fas fa-envelope"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">
                            <i class="fas fa-users"></i> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="find-bestman.php?q=logout" class="nav-link">
                            <i class="fab fa-hubspot"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <div class="container">
    <div class="showcase">
      <div class="row">
        <div class="col col-md-6 animated bounceInDown" id="relative">
          <img src="<?php echo $icon;?>" id="service-icon" alt="Home Services">
        </div>
        <div class="col col-md-6 align-self-center" id="service-details">
          <h1 id="service-name"><?php echo $_GET['q'];?></h1>
          <p class="text-secondary">Here are the listing for the best men -:</p>
        </div>
      </div>
    </div>
  </div>

  <section class="main-content animated fadeInUp">
    <div class="container">
      <div class="row mx-2" id="row">
        <?php foreach($res as $key):?>
        <?php 
        $q = 'select name,email from users where users.mobile="'.$key['mobile'].'"';
        $res2 = mysqli_query($conn, $q);
        $fin = mysqli_fetch_assoc($res2);
        ?>
        <div class="col-md-6 card" href="#"><div class="row">
          <div class="col-5"><i style="color:#0066ff" class="card-img-top fas fa-user"></i></div>
          <div class="card-body col-7">
            <p class="card-text text-dark"><?php echo $fin['name'];?></p>
            <p class="card-text text-dark">Mobile: <?php echo $key['mobile'];?></p>
            <p class="card-text text-dark"><?php echo $fin['email'];?></p>
          </div>
          </div>
        </div>
      <?php endforeach;?>
      </div>
    </div>
    <section id="links">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <p>Site menu</p>
                    <p>
                        <a href="index.php">
                            <i class="fas fa-home"></i> Home</a>
                    </p>
                    <p>
                        <a href="contact.php">
                            <i class="fas fa-phone"></i> Contact</a>
                    </p>
                    <p>
                        <a href="about.php">
                            <i class="fas fa-users"></i> About Us</a>
                    </p>
                </div>
                <div class="col-lg-4 align-self-center">
                    <p>Popular services</p>
                    <p>
                        <a href="#">
                            <i class="fas fa-briefcase-medical"></i> Medical</a>
                    </p>
                    <p>
                        <a href="#">
                            <i class="fas fa-pencil-alt"></i> Speech Writing</a>
                    </p>
                    <p>
                        <a href="#">
                            <i class="fab fa-schlix"></i> Home Decoration</a>
                    </p>
                    <p>
                        <a href="#">
                            <i class="fas fa-utensils"></i> Caterer</a>
                    </p>
                    <p>
                        <a href="#">
                            <i class="fas fa-list"></i> More..</a>
                    </p>
                </div>
                <div class="col-lg-4 align-self-center">
                    <p>Follow us on...</p>
                    <p>
                        <a href="#">
                            <i class="fab fa-facebook-square"></i> Facebook</a>
                    </p>
                    <p>
                        <a href="#">
                            <i class="fab fa-twitter"></i> Twitter</a>
                    </p>
                    <p>
                        <a href="#">
                            <i class="fab fa-linkedin"></i> Linkedin</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer" class="text-center text-white">
        <p>CopyRight &copy; 2018 | The Best Man services</p>
    </footer>
  </section>
  

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fontawesome-all.js"></script>
  </body>
</html>
