<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

<div class="bg-light py-5">
    <div class="col-md-5 mb-5 m-auto">
        <h1 class="text-center">Edit your comment</h1>
        <form action="" method="post" class="container my-5" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"><?=$comment['text']?></textarea>        
            </div>  
            <div class="row">
                <button type="submit" name="submit" class="btn mx-3 btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 