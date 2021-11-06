<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

<span><?=$errors['emailExists'] ?? ''?></span>
<form action="" method="post" class="container my-5" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" value="<?=$name?>" id="name" name="name" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"> <?=$errors['name'] ?? ''?> </div>
    </div>  
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"><?=$errors['email'] ?? ''?></div>
    </div>
    <div class="mb-3">
        <label for="bio" class="form-label">Information about you</label>
        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control" placeholder="Men kim, Hosilov Saidahmad ..."><?=$bio?></textarea>
    </div>
    <div class="mb-3 row">
        <div class=" col-md-6">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" value="<?=$password?>" class="form-control" name="password" id="exampleInputPassword1">
            <span><?=$errors['password'] ?? ''?></span>
        </div>
        <div class=" col-md-6">
            <label for="exampleInputImage" class="form-label">Image for your profile</label>
            <input type="file" value="<?=$image?>" class="form-control" name="image" id="exampleInputImage">
            <span><?=$errors['image'] ?? ''?></span>
        </div>
    </div>
    <div class="row">
        <button type="submit" name="submit" class="btn mx-3 btn-primary">Submit</button>
        <a href="/login" class="btn btn-success">Login</a>
        <a href="/" class="btn btn-warning mx-3">To Site</a>
    </div>
</form>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 