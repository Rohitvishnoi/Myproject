<?php 
    $conn = mysqli_connect('localhost', 'root', 'Krishanu#98', 'userdb');

    if(mysqli_connect_errno()){
        echo 'Failed to connect!!';
    }