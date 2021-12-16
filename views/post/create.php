<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->
<div class="bg-light py-5">
    <div class="col-lg-7 mb-5 m-auto">
        <form action="" method="post" class="container my-5" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" value="<?=$title?>" name="title" class="form-control">
                <span><?=$errors['title'] ?? ''?></span>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea rows="5" type="text" id="text" name="text" class="form-control"><?=$text?></textarea>
                <span><?=$errors['text'] ?? ''?></span>
            </div>
            <div class="mb-3">
                <label for="editor" class="form-label">Main Text</label>
                <textarea name="post-content" id="editor" class="form-control"><?=base64_decode($mainText)?></textarea>
                <span><?=$errors['mainText'] ?? ''?></span>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4">
                    <label for="image" class="form-label">Image of your post</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <span><?=$errors['image'] ?? ''?></span>
                </div>
                <div class="col-md-4">
                    <label for="ctg_name" class="form-label">Category</label>
                    <select id="ctg_name" name="ctg_name" class="form-control">
                        <option value="test" selected>...</option>
                        <option value="Food">Food</option>
                        <option value="Travel">Travel</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Business">Business</option>
                        <option value="Adventure">Adventure</option>
                    </select>
                    <span><?=$errors['ctg_name'] ?? ''?></span>
                </div>
                <div class="col-md-4" id="tags-container">
                    <label for="tagInput" class="form-label">Tag</label>
                    <input type="text" id="tagInput" class="form-control" value="" name="tag_name">
                    <span><?= $errors['tag_name'] ?? ''?></span> 
                </div>
            </div>
            <div class="row">
                <button type="submit" name="submit" class="btn mx-3 btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 