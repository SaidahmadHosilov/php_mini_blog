<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <span>Category</span>
            <h3><?=$category['name']?></h3>
            <p>Category description here.. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam error eius quo, officiis non maxime quos reiciendis perferendis doloremque maiores!</p>
        </div>
        </div>
    </div>
    </div>

    <div class="site-section bg-white">
    <div class="container">
        <div class="row">
        <?php foreach($ctgPosts as $post): ?>
            <div class="col-lg-4 mb-4">
              <div class="entry2">
                <a href="/post/details/<?=$post['id']?>">
                  <img src="/upload/profile_image/<?=$post['image']?>"  
                    alt="Image" class="img-fluid rounded"
                    style="width:100%; height:255px; object-fit:cover;">
                </a>
                <div class="excerpt">
                <span class="post-category text-white bg-secondary mb-3"><?=$post['ctg_name']?></span>

                <h2><a href="/post/details/<?=$post['id']?>"><?=$post['title']?></a></h2>
                <div class="post-meta align-items-center mb-3 d-flex text-left clearfix">
                  <a href="/user/profile/view/<?=$post['user_id']?>">
                    <figure class="author-figure d-flex align-items-center mb-0 mr-3 float-left">
                      <img src="/upload/profile_image/<?=$post['user_image']?>" 
                          alt="Image" class="img-fluid m-0"
                          style="width: 50px; height: 50px; object-fit:cover;">
                    </figure>
                  </a>
                  <span class="d-inline-block mt-1">By <a href="#"><?=$post['user_name']?></a></span>
                  <span>&nbsp;-&nbsp; <?=date('F', mktime(0, 0, 0, date( 'm', strtotime($post['created_at'])), 10))?> <?= date( 'm', strtotime($post['created_at'])) ?>, <?= date( 'Y', strtotime($post['created_at'])) ?></span>
                </div>
                
                  <p><?= $post['text']?></p>
                  <p><a href="/post/details/<?=$post['id']?>" >Read More</a></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12 d-flex justify-content-center align-items-center">
            <?php
              echo "<div id='pagingg' >";
              echo pagination($statementCount,$limit,$page);
              echo "</div>";
            ?>
          </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 