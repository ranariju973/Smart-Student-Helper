<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/index.css')?>">
    <!-- <link rel="stylesheet" href="index.css"> -->
</head>
<body>
<div>
        <div id="main0nav" data-scroll-sticky data-scroll-target="#main">
            <nav id="mainNav">
                <div id="nav-part2">
                    <!-- <img src="https://uploads-ssl.webflow.com/64d3dd9edfb41666c35b15b7/64d3dd9edfb41666c35b15c2_Sundown%20logo.svg" -->
                    <!-- alt=""> -->
                    <h4 style="text-decoration: none;"  class="navh4"><a href="#">Home</a></h4>
                    <h4  class="navh4"><a href="#">Content</a></h4>
                    <h4  class="navh4"><a href="#">Contact</a></h4>
                </div>
                <div id="navSearch">
                    <input type="text" placeholder="Search">
                </div>
                <div id="navBtn">
                    <!-- <button  id="signupBtn" class="btn1">sign Up</button>
                    <button  id="loginBtn" class="btn1">Login</button> -->

                    <?php
                        if (empty($this->session->userdata('userdata')['name'])) {
                                echo '<button  id="signupBtn" class="btn1">Sign Up</button>
                                      <button id="loginBtn" class="btn1">Login</button>';
                        } else {
                                echo '<button id="userStatus" class="btn1"><i class="fa-solid fa-user"></i> '
                             .$this->session->userdata('userdata')['name'] .
                             '</button>
                             <button id="logoutBtn" class="btn1">logout</button>';
                            }
                    ?>

                </div>
    </div>