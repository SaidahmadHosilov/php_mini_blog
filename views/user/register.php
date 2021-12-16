<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('/template/images/img_4.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="">Register</h1>
                        <p class="lead mb-4 text-white">Join Us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<span><?=$errors['emailExists'] ?? ''?></span>
    <div class="bg-light py-5">
        <div class="col-md-6 mb-5 m-auto bg-white px-4 p-1">
            <form action="" method="post" class="container my-5" enctype="multipart/form-data">
                <h1 class="text-body h5 text-center">Already have an account? <a href="/login">Click here.</a> </h1>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="<?=$name?>" id="name" name="name" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text text-danger h6"> <?=$errors['name'] ?? ''?> </div>
                </div>  
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text text-danger h6"><?=$errors['email'] ?? ''?></div>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Information about you</label>
                    <textarea name="bio" id="bio" cols="30" rows="10" class="form-control" placeholder="Men kim, ..."><?=$bio?></textarea>
                </div>
                <div class="mb-3 links-register-box">
                    <div class="link-in">
                        <i class="fas fa-at register-icon-at t-0"></i>
                        <input type="hidden" name="telegram_id" value="1">
                        <input type="text" name="telegram" placeholder="Telegram" class="form-control">
                    </div>
                    <div class="link-in">
                        <i class="fas fa-at register-icon-at t-0"></i>
                        <input type="hidden" name="facebook_id" value="2">
                        <input type="text" name="facebook" placeholder="Facebook" class="form-control">
                    </div>
                    <div class="link-in">
                        <i class="fas fa-at register-icon-at t-0"></i>
                        <input type="hidden" name="instagram_id" value="3">
                        <input type="text" name="instagram" placeholder="Instagram" class="form-control">
                    </div>
                    <div class="link-in">
                        <i class="fas fa-at register-icon-at t-0"></i>
                        <input type="hidden" name="twitter_id" value="4">
                        <input type="text" name="twitter" placeholder="Twitter" class="form-control">
                    </div>
                    <div class="link-in-lg link-in">
                        <i class="fas fa-at register-icon-at t-0"></i>
                        <input type="hidden" name="linkedin_id" value="5">
                        <input type="text" name="linkedIn" placeholder="Linked In" class="form-control">
                    </div>
                    <span class="text-danger h6"><?=$errors['links'] ?? ''?></span>
                </div>
                <div class="mb-3 row">
                    <div class=" col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" value="<?=$password?>" class="form-control" name="password" id="exampleInputPassword1">
                        <span class="text-danger h6"><?=$errors['password'] ?? ''?></span>
                    </div>
                    <div class=" col-md-6 d-flex align-items-end">
                        <span class="form-label pb-3 pr-3">Image for your profile</span>
                        <label for="exampleInputImage" class="form-label register-image">
                            <i class="far fa-images"></i>
                        </label>
                        <input type="file" value="<?=$image?>" class="form-control d-none" name="image" id="exampleInputImage">
                        <span class="text-danger h6"><?=$errors['image'] ?? ''?></span>
                    </div>
                </div>
                <div class="row px-3">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mr-2 mb-2 py-2 px-4 text-white">
                </div>
            </form>
        </div>
    </div>
<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 