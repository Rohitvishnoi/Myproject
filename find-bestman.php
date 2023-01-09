<?php
  
  require('include.php');
  session_start();
  $name = $_SESSION['name'];
  $mobile = $_SESSION['mobile'];
  $query = 'select service,des from userserv where mobile="'.$mobile.'"';
  $r = mysqli_query($conn, $query);
  $res = mysqli_fetch_all($r, MYSQLI_ASSOC);
  $json = file_get_contents("assets/services.json");
  $json = json_decode($json,true);
  if(isset($_GET['q'])){
    if($_GET['q'] === 'logout'){
      session_unset();
      session_destroy();
      header('Location: index.php');
    }
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
  <link rel="stylesheet" href="css/findbestman.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <title>Welcome <?php echo $name;?> </title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light fixed-top" id="navbar">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <a href="#" class="navbar-brand animated fadeInRight"><i class="fas fa-user"></i> Hello, <?php echo $name;?></a>
        </ul>
        <ul class="nav navbar-nav navbar-right animated fadeInLeft">
          <li class="nav-item active">
            <a href="find-bestman.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="about.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="find-bestman.php?q=logout" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="showcase">
    <div class="container">
      <div class="cov">
        <div class="row text-center">
          <div class="col content animated fadeInDown">
            <h1>The Best Man</h1>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text searchbar" id="basic-addon1"><i class="fas fa-search"></i></span>
              </div>
              <input type="text" class="form-control searchbar" placeholder="Find Services..." aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <p>Find all solutions at one place. <a href="#" style="text-decoration:underline">Read more.</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid animated fadeInUp" id="message">
    <div class="row">
      <div class="col col-md-8">
        <h1>What service are you looking for?</h1>
        <p>We have a wide range of services for you.</p>
        <?php if($res !== null):?>
        <p>You are the Best Man for these services : </p>
        <ul><?php foreach($res as $key):?>
          <li><?php echo $key['service'];?></li>
          <?php endforeach;?>
        </ul>
        <?php endif;?>
      </div>
      <div class="col-md-4">
        <a class="btn btn-primary my-5 mr-5 float-right" href="bebestman.php" id="prefrence" >CHANGE PREFRENCE</a>
      </div>
    </div>
  </div>

  <section class="main-content animated fadeInUp">
    <div class="container-fluid">
      <div class="row mx-2" id="row1">
        <?php foreach($json as $key):?>      
        <a class="col-md-3 card align-self-center" href="service.php?q=<?php echo $key['val'];?>">
          <img class="card-img-top" src="<?php echo $key['icon']?>">
          <div class="card-body">
            <p class="card-text text-dark"><?php echo $key['name']?></p>
          </div>
        </a>
        <?php endforeach;?>
        
      </div>
    </div>
  </section>
  <section id="links">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 align-self-center">
          <p>Site menu</p>
          <p><a href="#"><i class="fab fa-hubspot"></i> Services</a></p>
          <p><a href="contact.html"><i class="fas fa-phone"></i> Contact</a></p>
          <p><a href="#"><i class="fas fa-users"></i> About Us</a></p>
        </div>
        <div class="col-lg-4 align-self-center">
          <p>Popular services</p>
          <p><a href="#"><i class="fas fa-briefcase-medical"></i> Medical</a></p>
          <p><a href="#"><i class="fas fa-pencil-alt"></i> Speech Writing</a></p>
          <p><a href="#"><i class="fab fa-schlix"></i> Home Decoration</a></p>
          <p><a href="#"><i class="fas fa-utensils"></i> Caterer</a></p>
          <p><a href="#"><i class="fas fa-list"></i> More..</a></p>
        </div>
        <div class="col-lg-4 align-self-center">
          <p>Follow us on...</p>
          <p><a href="#"><i class="fab fa-facebook-square"></i> Facebook</a></p>
          <p><a href="#"><i class="fab fa-twitter"></i> Twitter</a></p>
          <p><a href="#"><i class="fab fa-linkedin"></i> Linkedin</a></p>
        </div>
      </div>
    </div>
  </section>
  <footer id="footer" class="text-center text-white">
    <p>CopyRight &copy; 2018 | Best Man services</p>
  </footer>
  <script>
    window.onscroll = function(){myFunction()};

    var navbar = document.getElementById('navbar');
    var showcase = document.getElementById('message')

    var colchange = showcase.offsetTop;

    function myFunction(){
      if(window.pageYOffset >= colchange){
        navbar.classList.remove('nav-transparent');
        navbar.classList.add('nav-colored');
      }
      else{
        navbar.classList.add('nav-transparent');
        navbar.classList.remove('nav-colored');
      }
    }
  </script>
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/fontawesome-all.js"></script>
</body>
</html>
