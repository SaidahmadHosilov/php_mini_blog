<?php

if(isset($_SESSION['user'])){
  $userInfo = User::getUser($_SESSION['user']);
}

$categories = Post::getCategoriesList();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="/template/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/magnific-popup.css">
    <link rel="stylesheet" href="/template/css/jquery-ui.css">
    <link rel="stylesheet" href="/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/template/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/template/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/template/css/aos.css">
    <link rel="stylesheet" href="/template/css/tags.css">
    <!-- Pagination -->
    <link rel="stylesheet" href="/components/pagination/css/pagination.css">
    <link rel="stylesheet" href="/components/pagination/css/A_green.css">
    <!-- Pagination -->

    <link rel="stylesheet" href="/template/css/style.css">
  </head>
  <body>
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="" action="#">
              <div style="position:relative">
                <input type="text" id="search-input" class="form-control" placeholder="Search...">
                <button class="search-btn" type="submit"><span class="icon-search"></span></button>
              </div>
              <div id="search_result" style="border-top:1px solid grey;"> 
                <ul style="list-style:none;" class="p-0">
                  
                </ul>
              </div>
            </form>
          </div>

          <div class="col-4 site-logo">
            <a href="/" class="text-black h2 mb-0">Mini Blog</a>
          </div>

          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto p-0 d-none d-lg-block mb-0">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li class="drop-menu-ctg">
                  <a >Categories &#10136;</a>
                  <div>
                    <?php foreach($categories as $ctg): ?>
                      <a href="/category/<?=$ctg['id']?>/"> <?=$ctg['name']?> </a>
                    <?php endforeach; ?>
                  </div>
                </li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="/post/create">Posts</a></li>
                    <li><a href="/logout"> Logout </a></li>
                <?php else: ?>
                    <li><a href="/login"> Login </a></li>
                    <li><a href="/register"> Register </a></li>
                <?php endif; ?>
                    <!-- <li><a href="/admin/"> Admin</a> </li>  -->
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li><a href="/user/profile/view/<?=$userInfo['id']?>"><abbr title="<?=$userInfo['name']?>"><img src="/upload/profile_image/<?=$userInfo['image']?>" style="width: 50px; height:50px; border-radius:50%; object-fit:cover;"></abbr></a></li>
                <?php endif; ?>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>

      </div>
    </header>