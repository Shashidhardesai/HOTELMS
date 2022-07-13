<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 10/23/17
 * Time: 1:45 PM
 */ ?>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">
</head>
<body>
<div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Hotel Management System</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index1.php">HOME</a></li>
                    <li><a href="">ABOUT</a></li>
                    <li><a href="register.php">BOOK_ROOMS</a></li>
                    <li><a href="login.php">ADMIN</a></li>
                    <!-- <li><a href="">CONTACT</a></li> -->
                </ul>
            </div>
        </div> 

<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="img/htl.png"/>
        
        <br>
        <div class="result">
            <?php
            if (isset($_GET['empty'])){
                echo '<div class="alert alert-danger">Enter Username or Password</div>';
            }elseif (isset($_GET['loginE'])){
                echo '<div class="alert alert-danger">Username or Password Don\'t Match</div>';
            } ?>
        </div>
        <form class="form-signin" data-toggle="validator" action="ajax.php" method="post">
            <div class="row">
                <div class="form-group col-lg-12">
                    <label>Username or Email</label>
                    <input type="text" name="email" class="form-control" placeholder="" required
                           data-error="Enter Username or Email">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-lg-12">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="" required
                           data-error="Enter Password">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <button class="btn btn-lg btn-success btn-block btn-signin" type="submit" name="login">LOGIN</button>

        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
</body>
</html>