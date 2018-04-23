<?php

return [

    // АДМИНКА

    'admin/panel' => 'admin/panel/index',
    'admin/exit' => 'admin/login/exit',
    'admin/login' => 'admin/login/index',
    'admin' => 'admin/panel/index',

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
    '^men/hoodies$' => 'product/denomination/men/hoodies',
    '^men/cups$' => 'product/denomination/men/cups',
    '^women/all$' => 'product/denomination/women/all',
    '^women/hoodies$' => 'product/denomination/women/hoodies',
    '^women/cups$' => 'product/denomination/women/cups',

//    '^men/hoodies/([0-9]+)$' => 'category/test/men/hoodies/$1',
//    '^men/([0-9]+)$' => 'category/view/men/$1',

//    '^women$' => 'category/index',
//    '^accessories$' => 'category/index',

    '^request/api$' => 'request/index',


    '^home/rename$' => 'home/rename',
    '^home/update$' => 'home/update',
    '^home/gets$' => 'home/gets',
    '^home/get$' => 'home/get',
    '^home/request$' => 'home/request',
    '^home$' => 'home/index',
    '^$' => 'home/index',
];