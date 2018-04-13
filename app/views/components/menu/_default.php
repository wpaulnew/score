<?php
//header('Cache-Control: private, no-cache="set-cookie"');
//header('Expires: 0');
//header('Pragma: no-cache');
?>
<div class="container">
    <div class="row between-xs middle-xs">
        <div class="col-xs-1">
            <img src="/public/img/l.mini.png" alt="" class="img-l">
        </div>
        <div class="col-xs-1 strainer-buttons">
            <span class="lnr lnr-menu img-l open-strainer-menu"></span>
        </div>
    </div>
</div>
<div class="container strainer-menu">
    <div class="row">
        <div class="col-xs-12">
            TEXT
            <button class="btn-close-strainer">CLOSE</button>
        </div>
    </div>
</div>
<div class="container bottom-menu">
    <div class="row center-xs middle-xs menu">
        <div class="col-xs-2">
            <a href="/all" class="menu-l"><span class="lnr lnr-shirt"></span></a>
        </div>
        <div class="col-xs-2">
            <!-- ЗАКРЕПЛЕНЫЕ ПУСТЬ БУДУТ ( СОХРАНЕНЫЕ ТИПО ) -->
            <a href="/saved" class="menu-l"><b><span class="lnr lnr-bookmark"></span></b></a>
        </div>
        <div class="col-xs-2">
            <a href="/search" class="icon-search"><span class="lnr lnr-magnifier"></span></a>
        </div>
        <div class="col-xs-2">
            <!-- МУЖЧИНЫ -->
            <a href="/men" class="menu-l"><b><span class="lnr lnr-user"></span></b></a>
        </div>
        <div class="col-xs-2">
            <a href="/cart" class="icon-card"><span class="lnr lnr-cart"></span><span
                        id="count-products"><?php echo \app\models\Cart::count(); ?></span></a>
        </div>
    </div>
</div>