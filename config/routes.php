<?php

return array(

    // blog
    'blog/details/([0-9]+)' => 'blog/view/$1',
    // blog

    // post
    'post/comment/delete/([0-9]+)' => 'post/deleteComment/$1',
    'post/comment/create' => 'post/createComment',
    'post/details/([0-9]+)' => 'post/view/$1',
    'post/create' => 'post/create',
    // post

    // Access system
    'user/profile/view/([0-9]+)' => 'user/profileView/$1',
    'login' => 'user/login',
    'register' => 'user/register',
    'logout' => 'user/logout',
    // Access system

    'category' => 'category/index',
    'contact' => 'contact/index',
    'about' => 'about/index',
    '' => 'site/index',
);