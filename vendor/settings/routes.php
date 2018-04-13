<?php

return [

    // АДМИНКА
    /*
    'admin/contacts' => 'admin/instrument/contacts',
    'admin/comments/([0-9]+)/remove' => 'admin/comments/remove/$1',
    'admin/comments/([0-9]+)' => 'admin/comments/index/$1',
    'admin/remove/([0-9]+)' => 'admin/instrument/remove/$1',
    'admin/edit/([0-9]+)' => 'admin/instrument/edit/$1',
    'admin/add' => 'admin/instrument/add',
    'admin/exit' => 'admin/instrument/exit',
    'admin/home' => 'admin/instrument/index',
    'admin' => 'admin/instrument/index',
    */
    '^register$' => 'register/index',
    '^login$' => 'login/index',

    '^search' => 'search/index',
    '^order$' => 'order/index',

    '^me$' => 'me/index',
    '^me/saved$' => 'me/saved',
    '^me/exit$' => 'me/exit',


    '^cart$' => 'cart/index',
    '^cart/add/([0-9]+)$' => 'cart/add/$1',
    '^cart/remove/([0-9]+)$' => 'cart/remove/$1',


    /**
     * Что если передать параметры сразу сдесь
     * '^men$' => 'category/index/men',
     */

    '^all$' => 'product/index/all',
    '^men$' => 'product/index/men',

    // Просмотр одного товара
    '^product/([0-9]+)$' => 'product/view/$1',


    // Роутеры для фильтра ["category","denomination"]
    '^men/all$' => 'product/denomination/men/all',
    '^women/all$' => 'product/denomination/women/all',

//    '^men/hoodies/([0-9]+)$' => 'category/test/men/hoodies/$1',
//    '^men/([0-9]+)$' => 'category/view/men/$1',

//    '^women$' => 'category/index',
//    '^accessories$' => 'category/index',

    '^home/rename$' => 'home/rename',
    '^home/update$' => 'home/update',
    '^home/gets$' => 'home/gets',
    '^home/get$' => 'home/get',
    '^home/request$' => 'home/request',
    '^home$' => 'home/index',
    '^$' => 'home/index',
];