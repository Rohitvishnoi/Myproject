<?php 
  session_start();
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $mobile = $_SESSION['mobile'];
  if(isset($_GET['q'])){
    if($_GET['q'] == 'f'){
      header('Location: find-bestman.php');
    }
    if($_GET['q'] == 'b'){
      header('Location: bebestman.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/splitlanding.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <title>The Bestman Landing</title>
</head>
<body>
  <div class="container">
    <div class="split left">
      <h1>Find The Best Man</h1>
      <a href="login.php?q=f" class="button">Let's Go</a>
    </div>
    <div class="split right">
      <h1>Be The Best Man</h1>
      <a href="login.php?q=b" class="button">Let's Go</a>
    </div>
  </div>
  <script src="js/splitlanding.js"></script>
  <script>
    
  </script>
</body>
</html>
