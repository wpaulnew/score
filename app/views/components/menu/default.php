<div class="header-elements another-menu">
    <div class="l-imgs">
        <img src="/public/img/l.mini.png" alt="">
        <img src="/public/img/L.png" alt="">
    </div>
    <!-- К примеру может быть кнопка do-link-delete -->
    <div>
        <?php if (isset($_SESSION["id"])) : ?>
            <a href="/me" class="do-link-login"><b><span class="lnr lnr-user"></span></b></a>
        <?php else: ?>
            <a href="/login" class="do-link-login"><b>LOGIN</b></a>
        <?php endif; ?>
    </div>
</div>