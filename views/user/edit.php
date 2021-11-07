<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

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
    <div class="mb-3 row">
        <img class="ml-3" src="/upload/profile_image/<?=$user['image']?>"
        style="width: 100px; height:100px; object-fit:cover;">
        <div class=" col-md-3">
            <label for="exampleInputImage" class="form-label">Image for your profile</label>
            <input type="file" value="" class="form-control" name="image" id="exampleInputImage">
            <span><?=$errors['image'] ?? ''?></span>
        </div>
    </div>
    <div class="row">
        <button type="submit" name="submit" class="btn mx-3 btn-primary">Update</button>
        <a href="/" class="btn btn-warning mx-3">To Site</a>
    </div>
</form>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 