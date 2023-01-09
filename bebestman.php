<?php
  require('include.php');
  session_start();
  $name = $_SESSION['name'];
  $mobile = $_SESSION['mobile'];
  $sel = '';
  $json = file_get_contents("assets/services.json");
  $json = json_decode($json,true);
  if(isset($_GET['q'])){
    $sel = $_GET['q'];
  }
  if(isset($_POST['service'])){
    $query = 'insert into userserv values("'.$mobile.'","'.$_POST['service'].'","'.$_POST['desc'].'")';
    echo $query;
    mysqli_query($conn, $query);
    header('Location: find-bestman.php');
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
  <link rel="stylesheet" href="css/bebestman.css">
  <title>The Best Man | Be Best Man </title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-light fixed-top" id="navbar">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <a href="#" class="navbar-brand animated fadeInRight"><i class="fas fa-user"></i> Hello, <?php echo $name?></a>
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
      <div class="container-fluid">
          <div class="row">
            <div class="col content animated fadeInDown">
              <h1>Be <span class="text-light" style="text-decoration:underline;">The Best</span> Man</h1>
              <p>Have Skill? | Get Hired!</p>
              <hr>
            </div>
          </div>
      </div>
      <form action="bebestman.php" method="post" class="animated fadeInUp">
        <div class="row">
          <div class="col col-md-4 m-4 p-3" id="form">
            <div class="form-group">
              <label for="service">What Service you can Provide</label>
              <select class="form-control" id="service" onchange="location = this.value;">
                <option selected><?php if(isset($_GET['q'])){
                  echo $json[$sel]['name'];
                }
                else{
                  echo 'Select service';
                }
                  ?></option>
                <?php foreach($json as $key):?>
                  <option value="bebestman.php?q=<?php echo $key['val'];?>"><?php echo $key['name'];?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label for="subcategory">Select the sub-category</label>
              <select class="form-control" id="subcategory" name="service">
                <option selected>Select Service..</option>
                <?php if(isset($_GET['q'])):?>
                  <?php foreach($json[$sel]['serv'] as $key):?>
                    <option value="<?php echo $key;?>"><?php echo $key;?></option>
                  <?php endforeach;?>
                <?php endif;?>
              </select>
              </div>
              <div class="form-group">
              <label for="description">Please Fill in some details about your skill</label>
              <textarea name="desc" class="form-control" id="description"></textarea>
            </div>
              <div class="form-group">
                <button type="submit" class="btn btn-outline-light form-control">Submit</button>
              </div>
          </div>
        </div>
      </form>
    </section>



  <!-- <footer id="footer" class="text-center text-white">
    <p>CopyRight &copy; 2018 | Best Man services</p>
  </footer> -->
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/fontawesome-all.js"></script>
</body>
</html>
