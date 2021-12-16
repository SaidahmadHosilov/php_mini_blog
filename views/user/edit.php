<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

    <div class="bg-light py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 border">
                <span><?=$errors['emailExists'] ?? ''?></span>
                <form action="" method="post" class="container my-5" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" value="<?=$user['name']?>" id="name" name="name" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"> <?=$errors['name'] ?? ''?> </div>
                    </div>  
                    <div class="mb-3">
                        <label for="bio" class="form-label">Information about you</label>
                        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control" placeholder="Men kim, Hosilov Saidahmad ..."><?=$user['bio']?></textarea>
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
                        <img class="ml-3" src="/upload/profile_image/<?=$user['image']?>"
                        style="width: 100px; height:100px; object-fit:cover;">
                        <div class=" col-md-7">
                            <label for="exampleInputImage" class="form-label">Image for your profile</label>
                            <input type="file" value="" class="form-control" name="image" id="exampleInputImage">
                            <span><?=$errors['image'] ?? ''?></span>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" name="submit" class="btn mx-3 btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 