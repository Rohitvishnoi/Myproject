<?php
  require('include.php');
  session_start();
  $name = $_SESSION['name'];
  $mobile = $_SESSION['mobile'];
  $json = file_get_contents("assets/services.json");
  $json = json_decode($json,true);
  if(isset($_GET['q'])){
      $val = $_GET['q'];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/serv.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>The Best Man Services | <?php echo $json[$val]['name'];?></title>
</head>

<body>
    <div class="cov2">
    <nav class="navbar navbar-expand-md navbar-light" id="navbar">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <a href="#" class="navbar-brand">Best Man Service</a>
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
    <section id="main">
        <div class="contain1">
            <div class="row">
                <div class="col-lg-7 mainico text-center align-self-center animated fadeIn">
                    <img src="<?php echo $json[$val]['icon'];?>" alt="">
                </div>
                <div class="col-lg-5 align-self-center animated flipInX">
                    <h1><?php echo $json[$val]['name'];?></h1>
                    <p><small><?php echo $json[$val]['desc'];?></small></p>
                    <p>
                        <ul>
                            <?php foreach($json[$val]['serv'] as $key):?>
                            <li>
                                <a href="men.php?q=<?php echo $key?>"><?php echo $key?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <p>and many more...</p>
                    </p>
                </div>
            </div>
        </div> 
    </section>
    </div>
    <section id="links">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <p>Site menu</p>
                    <p>
                        <a href="index.php">
                            <i class="fab fa-home"></i> Home</a>
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
        <p>CopyRight &copy; 2018 | Best Man services</p>
    </footer>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fontawesome-all.js"></script>
</body>

</html>