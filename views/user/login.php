<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->
    <div class="col-md-7 mb-5 m-auto">
        <form action="#" method="POST" class="p-5 bg-white">

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
                    <a href="/register" class="btn btn-primary py-2 mr-2 px-4 text-white">Register</a>
                    <a href="/" class="btn btn-primary py-2 px-4 mr-2 text-white">To Site</a>
                </div>
            </div>
        </form>
    </div>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 