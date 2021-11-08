<?php

return array(
    // Comment
    'comment/edit/([0-9]+)/([0-9]+)' => 'comment/edit/$1/$2',
    // Comment

    // Category
    'category/([0-9]+)' => 'category/index/$1/',
    // Category

    // blog
    'blog/details/([0-9]+)' => 'blog/view/$1',
    // blog

    // post
    'post/comment/delete/([0-9]+)' => 'post/deleteComment/$1',
    'post/comment/create' => 'post/createComment',
    'post/details/([0-9]+)' => 'post/view/$1',
    'post/edit/([0-9]+)' => 'post/editPost/$1',
    'post/delete/([0-9]+)' => 'post/deletePost/$1',
    'post/search' => 'post/search',
    'post/create' => 'post/create',
    // post

    // Access system
    'user/profile/delete/([0-9]+)' => 'user/profileDelete/$1',
    'user/profile/edit/([0-9]+)' => 'user/profileEdit/$1',
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