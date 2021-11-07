<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

<h1 class="text-center">Edit your comment</h1>
<form action="" method="post" class="container my-5" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="comment" class="form-label">Comment</label>
        <textarea name="comment" id="comment" cols="30" rows="10" class="form-control">
            <?=$comment['text']?>
        </textarea>        
    </div>  
    <div class="row">
        <button type="submit" name="submit" class="btn mx-3 btn-primary">Update</button>
        <a href="/" class="btn btn-warning mx-3">To Site</a>
    </div>
</form>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 