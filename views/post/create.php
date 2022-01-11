<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->
<div class="bg-light py-5">
    <div class="col-lg-7 mb-5 m-auto">
        <form action="" method="post" class="container my-5" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" value="<?=$title?>" name="title" class="form-control">
                <span class="text-danger"><?=$errors['title'] ?? ''?></span>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea rows="5" type="text" id="text" name="text" class="form-control"><?=$text?></textarea>
                <span class="text-danger"><?=$errors['text'] ?? ''?></span>
            </div>
            <div class="mb-3">
                <label for="editor" class="form-label">Main Text</label>
                <textarea name="post-content" id="editor" class="form-control"><?=base64_decode($mainText)?></textarea>
                <span class="text-danger"><?=$errors['mainText'] ?? ''?></span>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4">
                    <label for="image" class="form-label">Image of your post</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <span class="text-danger"><?=$errors['image'] ?? ''?></span>
                </div>
                <div class="col-md-4">
                    <label for="ctg_name" class="form-label">Category</label>
                    <div>
                        <select class="form-control multiple-select" name="categories[]" multiple="multiple">
                            <?php foreach($categories as $ctg): ?>
                                <option value="<?=$ctg['id']?>"><?=$ctg['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <span class="text-danger"><?=$errors['ctg_name'] ?? ''?></span>
                </div>
                <div class="col-md-4">
                    <label for="tagInput" class="form-label">Tag</label>
                    <div>
                        <select class="form-control multiple-select" name="states[]" multiple="multiple">
                            <?php foreach($tags as $tag): ?>
                                <option value="<?=$tag['id']?>"><?=$tag['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <span class="text-danger"><?= $errors['tag_name'] ?? ''?></span> 
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