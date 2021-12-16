<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('/template/images/img_4.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="">Login</h1>
                        <p class="lead mb-4 text-white">Welcome Back!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="col-md-5 mb-5 m-auto">
            <form action="#" method="POST" class="p-5 bg-white">
                <h1 class="text-body h5 text-center">Don't have an account? <a href="/register">Click here.</a> </h1>
                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="email">Email address</label> 
                        <input type="email" id="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="password">Password</label> 
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12 mt-3">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary mr-2 py-2 px-4 text-white">
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 