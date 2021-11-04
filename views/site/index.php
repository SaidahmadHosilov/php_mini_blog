<!-- Header -->
<?php require_once( ROOT . '/views/layouts/header.php' ); ?>
<!-- !Header -->
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row align-items-stretch retro-layout-2">

          <?php 
            foreach( $blogs as $blog ): 
              $datetime = new DateTime($blog['time']);
          ?>
            <div class="col-md-4">
              <a href="#" class="h-entry mb-30 v-height gradient" style="background-image: url(<?=$blog['image']?>);">
                <div class="text">
                  <h2><?=$blog['title']?></h2>
                  <span class="date">July <?= $datetime->format('m') ?>, <?= $datetime->format('Y') ?></span>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts</h2>
          </div>
        </div>
        <div class="row">
          <?php foreach($recentPosts as $post): ?>
            <div class="col-lg-4 mb-4">
              <div class="entry2">
                <a href="/">
                  <img src="/upload/profile_image/<?=$post['image']?>"  
                    alt="Image" class="img-fluid rounded"
                    style="width:100%; height:255px; object-fit:cover;">
                </a>
                <div class="excerpt">
                <span class="post-category text-white bg-secondary mb-3"><?=$post['ctg_name']?></span>

                <h2><a href="single.html"><?=$post['title']?></a></h2>
                <div class="post-meta align-items-center mb-3 d-flex text-left clearfix">
                  <figure class="author-figure d-flex align-items-center mb-0 mr-3 float-left">
                    <img src="/upload/profile_image/<?=$post['user_image']?>" 
                         alt="Image" class="img-fluid m-0"
                         style="width: 50px; height: 50px; object-fit:cover;">
                  </figure>
                  <span class="d-inline-block mt-1">By <a href="#"><?=$post['user_name']?></a></span>
                  <span>&nbsp;-&nbsp; <?=date('F', mktime(0, 0, 0, date( 'm', strtotime($post['created_at'])), 10))?> <?= date( 'm', strtotime($post['created_at'])) ?>, <?= date( 'Y', strtotime($post['created_at'])) ?></span>
                </div>
                
                  <p><?= $post['text']?></p>
                  <p><a href="/" >Read More</a></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">

        <div class="row align-items-stretch retro-layout">
          
          <div class="col-md-5 order-md-2">
            <a href="single.html" class="hentry img-1 h-100 gradient" style="background-image: url('/template/images/img_4.jpg');">
              <span class="post-category text-white bg-danger">Travel</span>
              <div class="text">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span>February 12, 2019</span>
              </div>
            </a>
          </div>

          <div class="col-md-7">
            
            <a href="single.html" class="hentry img-2 v-height mb30 gradient" style="background-image: url('/template/images/img_1.jpg');">
              <span class="post-category text-white bg-success">Nature</span>
              <div class="text text-sm">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span>February 12, 2019</span>
              </div>
            </a>
            
            <div class="two-col d-block d-md-flex">
              <a href="single.html" class="hentry v-height img-2 gradient" style="background-image: url('/template/images/img_2.jpg');">
                <span class="post-category text-white bg-primary">Sports</span>
                <div class="text text-sm">
                  <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                  <span>February 12, 2019</span>
                </div>
              </a>
              <a href="single.html" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('/template/images/img_3.jpg');">
                <span class="post-category text-white bg-warning">Lifestyle</span>
                <div class="text text-sm">
                  <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                  <span>February 12, 2019</span>
                </div>
              </a>
            </div>  
            
          </div>
        </div>

      </div>
    </div>


    <div class="site-section bg-lightx">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-5">
            <div class="subscribe-1 ">
              <h2>Subscribe to our newsletter</h2>
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
              <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 
<!-- Footer -->
<?php require_once( ROOT . '/views/layouts/footer.php' ); ?>
<!-- !Footer --> 