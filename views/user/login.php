<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

<form action="" method="post" class="container my-5">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        <span><?=$errors['email'] ?? ''?></span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" value="<?=$password?>" class="form-control" name="password" id="exampleInputPassword1">
        <span><?=$errors['password'] ?? ''?></span>
    </div>
    <div class="row">
        <button type="submit" name="submit" class="btn mx-3 btn-primary">Submit</button>
        <a href="/register" class="btn btn-success">Register</a>
        <a href="/" class="btn btn-warning mx-3">To Site</a>
    </div>
</form>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 