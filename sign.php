<?php
    require('include.php');
    if(isset($_POST['submit'])){
        if($_GET['q'] == 'up'){
            if($_POST['password'] == $_POST['conpass'] and $_POST['password'] !== ''){
                session_start();
                $query = 'select mobile from users where mobile="'.$_POST['mobile'].'"';
                $res = mysqli_query($conn, $query);
                $result = mysqli_fetch_assoc($res);
                if($result!==null) {
                    echo '<script>alert("User already exists !!");</script>';
                }
                else{
                    $_SESSION['name'] = $_POST['name'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['mobile'] = $_POST['mobile'];
                    $query = 'insert into users(name,email,mobile,city,address,password) values("'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['mobile'].'","'.$_POST['city'].'","'.$_POST['address'].'","'.$_POST['password'].'")';
                    mysqli_query($conn, $query);
                    header('Location: login.php');
                }
                
            }
            else if($_POST['password'] != $_POST['conpass'] or $_POST['name'] == '' and $_POST['email'] == '' and $_POST['mobile'] == ''){
                echo '<script>alert("Please enter correct info !!");</script>';
            }
        }
        else if($_GET['q'] == 'in'){
            if($_POST['password'] !== '' and $_POST['mobile'] !== ''){
                session_start();
                $query = 'select * from users where mobile = "'.$_POST['mobile'].'" and password = "'.$_POST['password'].'"';
                $res = mysqli_query($conn, $query);
                $result = mysqli_fetch_assoc($res);
                if($result === null){
                    echo '<script>alert("User does not exists!!");</script>';
                }
                else{
                    $_SESSION['name'] = $result['name'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['mobile'] = $_POST['mobile'];
                    header('Location: login.php');
                }
            }
            else{
                echo '<script>alert("Please enter correct info!!");</script>';
            }
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
    <link rel="stylesheet" href="css/sign.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Sign <?php echo $_GET['q'];?></title>
</head>
<body>
    <div class="cover">
        <h1 class="text-center text-white">Sign <?php echo $_GET['q'];?></h1>
    <div class="con animated fadeIn">
    
        <?php if($_GET['q'] === 'up'):?>
        <form class="form-group text-bold" action="sign.php?q=up" method="post">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
            <label>Email Id</label>
            <input type="email" class="form-control" name="email">
            <label>Mobile no.</label>
            <input type="text" pattern="[7-9]{1}[0-9]{9}" class="form-control" name="mobile">
            <label>City</label>
            <input type="text" class="form-control" name="city">
            <label>Address</label>
            <input type="text" class="form-control" name="address">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="conpass">
            <br>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-success form-control">Sign Up</button>
            </div>
            </form>
        <?php endif;?>
        <?php if($_GET['q'] === 'in'):?>
        <form class="form-group text-bold" action="sign.php?q=in" method="post">
            <label>Mobile no.</label>
            <input type="text" pattern="[7-9]{1}[0-9]{9}" class="form-control" name="mobile">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            <br>
            <input type="checkbox">
            <label>Remember me</label>
            <div class="text-center">
                <br>
            <button type="submit" name="submit" class="btn btn-success form-control">Sign in</button>
            </div>
            </form>
        <?php endif;?>
    </div>
    </div>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fontawesome-all.js"></script>
</body>
</html>