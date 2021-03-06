<!-- Header -->
<?php require_once(ROOT . '/views/layouts/header.php'); ?>
<!-- !Header -->

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('/upload/profile_image/<?= $currentPost[0]['image'] ?>');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <?php foreach ($categoriesList as $ctg_n) : ?>
                        <span class="post-category text-white bg-success mb-3"><?= $ctg_n['ctg_name'] ?></span>
                    <?php endforeach; ?>
                    <h1 class="mb-4"><a href="#"><?= $currentPost[0]['title'] ?></a></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block">
                            <img style="width: 50px; height: 50px; object-fit:cover;" src="/upload/profile_image/<?= $currentPost[0]['user_image'] ?>" alt="Image" class="img-fluid">
                        </figure>
                        <span class="d-inline-block mt-1">By <?= $currentPost[0]['username'] ?></span>
                        <span>&nbsp;-&nbsp; <?= date('F', mktime(0, 0, 0, date('m', strtotime($currentPost[0]['created_at'])), 10)) ?> <?= date('m', strtotime($currentPost[0]['created_at'])) ?>, <?= date('Y', strtotime($currentPost[0]['created_at'])) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    <?= base64_decode($currentPost[0]['main_text']) ?>
                </div>


                <div class="pt-5">
                    <p>
                        Categories:
                        <?php foreach ($categoriesList as $ctg_n) : ?>
                            <a href="/category/<?= $ctg_n['ctg_id'] ?>"><?= $ctg_n['ctg_name'] ?></a>
                        <?php endforeach; ?>
                        Tags:
                        <?php foreach ($post_tags as $tg) : ?>
                            <a href="#"> <?= $tg['name'] ?> | </a>
                        <?php endforeach; ?>
                    </p>
                </div>


                <div class="pt-5">
                    <h3 class="mb-5"><span id="comment_count"><?= $countComment['total'] ?></span> Comments</h3>
                    <ul class="comment-list" id="comment-container">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <form method="POST" action="/post/shortmsgEdit/" data-owner="<?= $_SESSION['user'] ?>" class="doNotTouch w-100 mt-3 bg-light p-3 short-comment-edit mt-2" data-post-id="<?= $currentPost[0]['id'] ?>">
                                <input class="doNotTouch px-3 py-1 border w-100 rounded-left" type="text" value="test">
                                <button type="submit" class="doNotTouch btn btn-primary border-0 px-5 rounded-right" id="short-edit-btn">Edit</button>
                            </form>
                            <form method="POST" action="/post/shortmsg/" data-owner="<?= $_SESSION['user'] ?>" class="doNotTouch w-100 mt-3 bg-light p-3 short-comment mt-2" data-post-id="<?= $currentPost[0]['id'] ?>">
                                <input class="doNotTouch px-3 py-1 rounded-left" type="text" placeholder="reply...">
                                <button type="submit" class="doNotTouch btn btn-primary border-0 px-5 rounded-right" id="short-comment-btn">Send</button>
                            </form>
                        <?php endif; ?>
                        <?php foreach ($comments as $comment) : ?>
                            <li class="comment">
                                <div class="vcard">
                                    <img src="/upload/profile_image/<?= $comment['image'] ?>" alt="Image placeholder">
                                </div>
                                <div class="comment-body" data-comment-id="<?= $comment['id'] ?>">
                                    <h3><?= $comment['name'] ?></h3>
                                    <div class="meta"><?= $comment['time'] ?></div>
                                    <p><?= $comment['text'] ?></p>
                                    <?php
                                    $user = $_SESSION['user'] ?? '';
                                    if ($user == $comment['user_id']) :
                                    ?>
                                        <a comment-id="<?= $comment['id'] ?>" class="delete text-white btn btn-sm btn-danger rounded">Delete</a>
                                        <a class="edit-comment-btn btn text-white mr-1 doNotTouch btn-sm btn-secondary rounded" data-user-id="<?= $comment['user_id'] ?>" data-user-session="<?= $user ?>">
                                            Edit
                                        </a>
                                    <?php
                                    endif;
                                    if ($user != '') :
                                    ?>
                                        <a style="cursor: pointer;" data-user-id="<?= $comment['user_id'] ?>" data-user-session="<?= $user ?>" class="reply pb-2 reply-btn pt-1 rounded doNotTouch">Reply</a>

                                    <?php endif; ?>
                                </div>

                                <ul class="children">
                                    <?php
                                    foreach ($childrenComments as $childCm) :
                                        if ($childCm['parent_id'] == $comment['id']) :
                                    ?>
                                            <li class="comment">
                                                <div class="vcard">
                                                    <img src="/upload/profile_image/<?= $childCm['image'] ?>" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body" data-comment-id="<?= $childCm['id'] ?>">
                                                    <h3><?= $childCm['name'] ?></h3>
                                                    <div class="meta"><?= $childCm['time'] ?></div>
                                                    <p><?= $childCm['text'] ?></p>
                                                    <?php
                                                    if ($user == $childCm['user_id']) :
                                                    ?>
                                                        <a comment-id="<?= $comment['id'] ?>" class="delete-child text-white btn btn-sm btn-danger rounded">Delete</a>
                                                        <a class="edit-comment-btn btn text-white mr-1 doNotTouch btn-sm btn-secondary rounded" data-user-id="<?= $childCm['user_id'] ?>" data-user-session="<?= $user ?>">
                                                            Edit
                                                        </a>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </div>
                                            </li>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <?php if (!empty($_SESSION['user'])) : ?>
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" method="post" class="p-5 bg-light">
                                <div class="form-group">
                                    <input type="hidden" id="postId" value="<?= $currentPost[0]['id'] ?>">
                                    <input type="hidden" value="<?= $_SESSION['user'] ?>" name="userId">
                                    <label for="comment">Message</label>
                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" data-id="<?= $_SESSION['user'] ?>" value="Post Comment" id="comment_btn" class="btn btn-primary">
                                </div>
                            </form>
                        <?php else : ?>
                            <h3 class="mb-5">Leave a comment</h3>
                            <h5>Please, register or login to our website for leaving comment.</h5>
                            <a href="/login" class="btn btn-primary rounded">Login</a>
                            <a href="/register" class="btn btn-dark rounded">Register</a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <a href="/user/profile/view/<?= $currentPost[0]['user_id'] ?>">
                            <img src="/upload/profile_image/<?= $currentPost[0]['user_image'] ?>" alt="Image Placeholder" class="img-fluid mb-5" style="width: 100px; height: 100px; object-fit:cover;">
                        </a>
                        <div class="bio-body">
                            <h2><?= $currentPost[0]['username'] ?></h2>
                            <p class="mb-4"><?= $currentPost[0]['bio'] ?></p>
                            <p><a href="/user/profile/view/<?= $currentPost[0]['user_id'] ?>" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <?php foreach ($popularPosts as $post) : ?>
                                <li>
                                    <a href="/post/details/<?= $post['id'] ?>" class="d-flex align-items-center">
                                        <img src="/upload/profile_image/<?= $post['image'] ?>" alt="Image placeholder" class="mr-4" style="max-width: 100px; height: 80px; object-fit:cover;">
                                        <div class="text">
                                            <h4><?= $post['title'] ?></h4>
                                            <div class="post-meta">
                                                <span class="mr-2">
                                                    <?php
                                                    echo date('F', mktime(0, 0, 0, date('m', strtotime($post['created_at'])), 10)) . " ";
                                                    echo date('m', strtotime($post['created_at'])) . ", ";
                                                    echo date('Y', strtotime($post['created_at']));
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <?php foreach ($categories as $ctg) : ?>
                            <li>
                                <a href="/category/<?= $ctg['id'] ?>">
                                    <?= $ctg['name'] ?>
                                    <span>(<?= $ctg['ctg_count']['count'] ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        <?php foreach ($tags as $tag) : ?>
                            <li><a href="#"><?= $tag['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

<div class="site-section bg-light">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12">
                <h2>More Related Posts</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5 order-md-2">
                <a href="/post/details/<?= $posts[0]['id'] ?>" class="hentry img-1 h-100 gradient" style="background-image: url('/upload/profile_image/<?= $posts[0]['image'] ?>');">
                    <?php foreach ($posts[0]['ctg_name'] as $post_ctg) : ?>
                        <span class="post-category text-white bg-danger"><?= $post_ctg['ctg_name'] ?></span>
                    <?php endforeach; ?>
                    <div class="text">
                        <h2><?= $posts[0]['title'] ?></h2>
                        <span><?= $posts[0]['created_at'] ?></span>
                    </div>
                </a>
            </div>

            <div class="col-md-7">

                <a href="/post/details/<?= $posts[1]['id'] ?>" class="hentry img-2 v-height mb30 gradient" style="background-image: url('/upload/profile_image/<?= $posts[1]['image'] ?>');">
                    <?php foreach ($posts[1]['ctg_name'] as $post_ctg) : ?>
                        <span class="post-category text-white bg-success"><?= $post_ctg['ctg_name'] ?></span>
                    <?php endforeach; ?>
                    <div class="text text-sm">
                        <h2><?= $posts[1]['title'] ?></h2>
                        <span><?= $posts[1]['created_at'] ?></span>
                    </div>
                </a>

                <div class="two-col d-block d-md-flex">
                    <a href="/post/details/<?= $posts[2]['id'] ?>" class="hentry v-height img-2 gradient" style="background-image: url('/upload/profile_image/<?= $posts[2]['image'] ?>');">
                        <?php foreach ($posts[2]['ctg_name'] as $post_ctg) : ?>
                            <span class="post-category text-white bg-primary"><?= $post_ctg['ctg_name'] ?></span>
                        <?php endforeach; ?>
                        <div class="text text-sm">
                            <h2><?= $posts[2]['title'] ?></h2>
                            <span><?= $posts[2]['created_at'] ?></span>
                        </div>
                    </a>
                    <a href="/post/details/<?= $posts[3]['id'] ?>" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('/upload/profile_image/<?= $posts[3]['image'] ?>');">
                        <?php foreach ($posts[2]['ctg_name'] as $post_ctg) : ?>
                            <span class="post-category text-white bg-warning"><?= $post_ctg['ctg_name'] ?></span>
                        <?php endforeach; ?>
                        <div class="text text-sm">
                            <h2><?= $posts[3]['title'] ?></h2>
                            <span><?= $posts[3]['created_at'] ?></span>
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
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
<!-- !Footer -->