<?php

return array(

    'auth/login'       => 'auth/login',
    'auth/register'    => 'auth/register',
    'auth/logout'      => 'auth/logout',
    'users/login_list' => 'auth/loginList',
    'my/show'          => 'users/index',
    'my/edit'          => 'users/edit',
    'my/icon'          => 'users/editAvatar',
    'icon/crop'        => 'users/cropAvatar',
    'my/delete'        => 'users/delete',
    'contacts'         => 'pages/contacts',
    'news/([0-9]+)'    => 'news/show',
    'news'             => 'news/index',

   // ''              => 'pages/index',
);