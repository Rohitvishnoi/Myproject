<?php

    if(filter_has_var(INPUT_POST, 'submit')){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if(!empty($name) && !empty($email) && !empty($message)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                echo "<script>alert('Please enter valid email!!');</script>";
            } else {
                $tomail = 'mkrishanu98@gmail.com';
                $subject = 'Contact request from '.$name;
                $body = '<h1>Contact Request</h1>
                    <h3>Name : </h3><p>'.$name.'</p>
                    <h3>Email Id : </h3><p>'.$email.'</p>
                    <h3>Message : </h3><p>'.$message.'</p>
                ';
                $headers = "MIME-Version: 1.0"."\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

                $headers .= "From: ".$name."<".$email.">"."\r\n";

                if(mail($tomail,$subject,$body,$headers)){
                    echo "<script>alert('Your response is submitted!!');</script>";
                } else {
                    echo "<script>alert('Response not submitted!!');</script>";
                }
            }
        }
        else{
            echo "<script>alert('Please enter correct information!!');</script>";
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
    <link rel="stylesheet" href="css/contact.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>The Best Man Services | Contact</title>
</head>
<body>
    <div class="cov1">
        <div class="cov">
            <nav class="navbar navbar-expand-md navbar-dark" id="navbar">
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
                                <a href="index.php" class="nav-link">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="services.php" class="nav-link">
                                    <i class="fab fa-hubspot"></i> Services</a>
                            </li>
                            <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-envelope"></i> Contact</a>
                            </li>
                            <li class="nav-item">
                                <a href="about.php" class="nav-link">
                                    <i class="fas fa-users"></i> About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <section id="head" class="container">
                <h1>Contact Us</h1>
                <p>Here you can contact us to give feedback and complaints regarding our services.</p><hr>
            </section>
            <section id="bodyf" class="container">
                <div class="row">
                    <div class="col">
                        <form class="form-group" action="contact.php" method="post">
                            <input type="text" name="name" class="form-control" placeholder="Your Name"><br>
                            <input type="email" name="email" class="form-control" placeholder="Your Email"><br>
                            <textarea rows="8" name="message" class="form-control" placeholder="Message"></textarea><br>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-outline-light">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col text-center text-white align-self-center">
                        <div class="container">
                            <p><i class="fas fa-map-marker-alt"></i> <strong>A-217, Jurs Country, Jwalapur</strong></p><br>
                            <p><i class="fas fa-phone"></i> <strong>(995)861-7595</strong></p><br>
                            <p><i class="far fa-envelope"></i> <strong>bestman@serivce.com</strong></p><br>
                            <hr>
                            <h3>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </h3>
                            <p>BestMan Service Theme by Bootstrap</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fontawesome-all.js"></script>
</body>
</html>