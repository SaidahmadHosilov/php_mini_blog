<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('/template/images/img_4.jpg');">
    <div class="container">
        <div class="row same-height justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
            <h1 class="">About Us</h1>
            <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
            </div>
        </div>
        </div>
    </div>
    </div>
    
    
    <div class="site-section bg-light">
    <div class="container">
        <div class="row">
        <div class="col-md-6 order-md-2">
            <img src="/template/images/img_1.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-5 mr-auto order-md-1">
            <h2>We Love To Explore</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti vitae cupiditate explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe non eligendi possimus autem repellendus nesciunt, est deleniti libero recusandae officiis. Voluptatibus quisquam voluptatum expedita recusandae architecto quibusdam.</p>
            <ul class="ul-check list-unstyled success">
            <li>Onsectetur adipisicing elit</li>
            <li>Dolorem saepe non eligendi possimus</li>
            <li>Voluptate odit corrupti vitae</li>
            </ul>
        </div>
        </div>
    </div>
    </div>

    <div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
        <div class="col-md-5 text-center">
            <h2>Meet The Team</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus commodi blanditiis, soluta magnam atque laborum ex qui recusandae</p>
        </div>
        </div>
        <div class="row">
            <?php foreach($team as $person): ?>
                <div class="col-md-6 col-lg-4 mb-5 text-center">
                    <a href="/user/profile/view/<?=$person['id']?>">
                        <img src="/upload/profile_image/<?=$person['image']?>" alt="Image" 
                        class="rounded-circle mb-4"
                        style="width: 184px; height: 184px; object-fit:cover;">
                    </a>
                    
                    <a href="/user/profile/view/<?=$person['id']?>">
                        <h2 class="mb-3 h5"><?=$person['name']?></h2>
                    </a>

                    <p class="about-bio"><?=$person['bio']?></p>

                    <p class="mt-5">
                    <a href="#" class="p-3"><span class="icon-facebook"></span></a>
                    <a href="#" class="p-3"><span class="icon-instagram"></span></a>
                    <a href="#" class="p-3"><span class="icon-twitter"></span></a>
                    </p>
                </div>
            <?php endforeach; ?>
    </div>
    </div>
    
    <div class="site-section bg-light">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <img src="/template/images/img_1.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-5 ml-auto">
            <h2>Learn From Us</h2>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti vitae cupiditate explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe non eligendi possimus autem repellendus nesciunt, est deleniti libero recusandae officiis. Voluptatibus quisquam voluptatum expedita recusandae architecto quibusdam.</p>
            
            <ul class="ul-check list-unstyled success">
            <li>Onsectetur adipisicing elit</li>
            <li>Dolorem saepe non eligendi possimus</li>
            <li>Voluptate odit corrupti vitae</li>
            </ul>
        </div>
        </div>
    </div>
    </div>


    <div class="site-section bg-white">
    <div class="container">
        <div class="row justify-content-center text-center">
        <div class="col-md-5">
            <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
            <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 