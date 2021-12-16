<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('/template/images/img_4.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="">Contact Us</h1>
                        <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
            <div class="col-md-7 mb-5">

                <form action="#" class="p-5 bg-white">
                    <?php if(!isset($_SESSION['user'])): ?>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="fname">Name</label>
                                <input type="text" name="name" id="fname" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label> 
                                <input type="email" id="email" class="form-control">
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="subject">Subject</label> 
                            <input type="subject" id="subject" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Message</label> 
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                
                <div class="p-4 mb-3 bg-white">
                <p class="mb-0 font-weight-bold">Address</p>
                <p class="mb-4">Akkurgan city, Uzbekistan</p>

                <p class="mb-0 font-weight-bold">Phone</p>
                <p class="mb-4"><a href="#">+998 90 110-56-15</a></p>

                <p class="mb-0 font-weight-bold">Email Address</p>
                <p class="mb-0"><a href="#">saidahmadhosilov134679@gmail.com</a></p>

                </div>

            </div>
            </div>
        </div>
    </div>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 